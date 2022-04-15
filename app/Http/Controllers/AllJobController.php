<?php

namespace App\Http\Controllers;

use App\AllJob;
use App\Cities;
use App\Candidate_details;
use App\FeeChargedReason;
use App\JobCategories;
use App\States;
use App\WorkingDay;
use App\Employer_detail;
use App\MainJobCategory;
use App\Qualification;
use App\User;
use Illuminate\Http\Request;
use App\JobAppliedByEmployee;

use Mail;

class AllJobController extends Controller {
	
	/*show dashboard panel, start here*/
	public function showDashboard(Request $request){

		$totalJobs=AllJob::where('status', '1');
		$total_jobs=$totalJobs->count();

		$totalCandidates=Candidate_details::where('status', '1');
		$total_candidates=$totalCandidates->count();

		$totalEmployers=Employer_detail::where('status', '1');
		$total_employers=$totalEmployers->count();

		$all_applied_jobs = JobAppliedByEmployee::where('job_applied_by_employees.is_deleted', '0')
			->where('job_applied_by_employees.applied_date', '>=', date('Y-m-d').' 00:00:00')
			->leftJoin('candidate_details', 'candidate_details.user_id', '=', 'job_applied_by_employees.user_id')
			->leftJoin('all_jobs', 'all_jobs.id', '=', 'job_applied_by_employees.job_id')
			->leftJoin('cities', 'cities.id', '=', 'all_jobs.job_location_id')
			->leftJoin('employer_details', 'employer_details.employer_id', '=', 'all_jobs.employer_id')
			->orderBy('job_applied_by_employees.id', 'DESC')
			->select('job_applied_by_employees.id', 'job_applied_by_employees.job_id as job_id', 'job_applied_by_employees.user_id as user_id', 'job_applied_by_employees.applied_date', 'job_applied_by_employees.is_deleted', 'job_applied_by_employees.status as status', 'candidate_details.name as candidate_name', 'candidate_details.email as candidate_email', 'candidate_details.mobile_number as candidate_mobile_number', 'all_jobs.job_title as job_title', 'all_jobs.ctc as ctc', 'all_jobs.employer_id as employer_id', 'all_jobs.job_location_id as job_location_id','cities.name as job_location_name','employer_details.company_name as company_name','all_jobs.employer_id as employer_id')
			->paginate(10);

		return view('admin/dashboard', compact('total_jobs','total_candidates','total_employers','all_applied_jobs'));
	}
	/*show dashboard panel, end here*/


	/*this function show all jobs in admin panel*/
	public function showAllJobs(Request $request){

		$job_locations = Cities::where('status', '1')
			->where('is_deleted', '0')
			->where('country_id', '101')
			->orderBy('name', 'ASC')
			->get();		
		
		$query = AllJob::leftJoin('states', 'states.id', '=', 'all_jobs.state_id')
			->leftJoin('cities', 'cities.id', '=', 'all_jobs.city_id')
			->leftJoin('job_categories', 'job_categories.id', '=', 'all_jobs.types_of_job_id')
			->leftJoin('working_days', 'working_days.id', '=', 'all_jobs.working_days')
			->leftJoin('main_job_categories', 'main_job_categories.id', '=', 'all_jobs.job_category_id')
			->leftJoin('employer_details', 'employer_details.employer_id', '=', 'all_jobs.employer_id')
			->leftJoin('work_experiences', 'work_experiences.id', '=', 'all_jobs.max_experience_required')
			->orderBy('all_jobs.id','DESC')
			->select('all_jobs.id', 'all_jobs.employer_id', 'all_jobs.job_title', 'all_jobs.salary', 'all_jobs.no_of_opening', 'all_jobs.job_location_id', 'states.name as state_name', 'cities.name as city_name', 'job_categories.name as job_category_name', 'working_days.name as working_day_name', 'all_jobs.working_hours', 'all_jobs.experience_required', 'all_jobs.min_experience_required', 'work_experiences.name as max_experiencerequired', 'all_jobs.skills','employer_details.company_name','employer_details.id as employer_details_id');
		
		if($request->searching_keyword){
			$query->where('all_jobs.job_title', 'like', '%'.$request->searching_keyword.'%');
		}
		if($request->searching_city){
			$query->where('all_jobs.job_location_id', '=', $request->searching_city);
		}
		if($request->searching_category){
			$query->where('all_jobs.job_category_id', '=', $request->searching_category);
		}		
			
		$job_lists=$query->paginate(12);
		$total_no_of_jobs = $job_lists->count();
		
		return view('admin/job-list', compact('job_locations','job_lists'));

	}


	/*this function show all applied jobs in admin panel*/
	public function showAllAppliedJobs(){
		
		$all_applied_jobs = JobAppliedByEmployee::where('job_applied_by_employees.is_deleted', '0')
			->leftJoin('candidate_details', 'candidate_details.user_id', '=', 'job_applied_by_employees.user_id')
			->leftJoin('all_jobs', 'all_jobs.id', '=', 'job_applied_by_employees.job_id')
			->leftJoin('cities', 'cities.id', '=', 'all_jobs.job_location_id')
			->leftJoin('employer_details', 'employer_details.employer_id', '=', 'all_jobs.employer_id')
			->orderBy('job_applied_by_employees.id', 'DESC')
			->select('job_applied_by_employees.id', 'job_applied_by_employees.job_id as job_id', 'job_applied_by_employees.user_id as user_id', 'job_applied_by_employees.applied_date', 'job_applied_by_employees.is_deleted', 'job_applied_by_employees.status as status', 'candidate_details.name as candidate_name', 'candidate_details.email as candidate_email', 'candidate_details.mobile_number as candidate_mobile_number', 'all_jobs.job_title as job_title', 'all_jobs.ctc as ctc', 'all_jobs.employer_id as employer_id', 'all_jobs.job_location_id as job_location_id','cities.name as job_location_name','employer_details.company_name as company_name','all_jobs.employer_id as employer_id')
			->paginate(10);

		return view('admin/all-applied-jobs', compact('all_applied_jobs'));
		
	}
	
	public function showSingleJobAdmin ($empr_id, $job_id){
		
		$employer_details = Employer_detail::where('employer_id', $empr_id)
			->leftJoin('states', 'states.id', '=', 'employer_details.state_id')
			->leftJoin('cities', 'cities.id', '=', 'employer_details.city_id')
			->leftJoin('company_domains', 'company_domains.id', '=', 'employer_details.company_domain_id')
			->where('employer_details.status', '1')
			->where('employer_details.is_deleted', '0')
			->select('employer_details.id', 'employer_details.employer_id', 'employer_details.company_logo', 'employer_details.company_name', 'states.name as state_name', 'cities.name as city_name',  'employer_details.company_phone', 'employer_details.facebook_links', 'employer_details.twitter_links', 'employer_details.skype_links', 'employer_details.pinterest_links','employer_details.about_company')
			->get();

		$job_locations = Cities::where('status', '1')
			->where('is_deleted', '0')
			->where('country_id', '101')
			->orderBy('name', 'ASC')
			->get();

		$states_names = States::where('status', '1')
			->where('is_deleted', '0')
			->where('countries_id', '101')
			->orderBy('name', 'ASC')
			->get();

		$cities_names = Cities::where('status', '1')
			->where('is_deleted', '0')
			->orderBy('name', 'ASC')
			->get();

		$fee_charged_reasons = FeeChargedReason::where('status', '1')
			->where('is_deleted', '0')
			->orderBy('id', 'ASC')
			->get();
		
		$qualifications = Qualification::where('status', '1')
			->where('is_deleted', '0')
			->orderBy('name', 'ASC')
			->get();
			
		$job_lists = AllJob::where('all_jobs.id', $job_id)
			->where('employer_id', $empr_id)
			->leftJoin('states', 'states.id', '=', 'all_jobs.state_id')
			->leftJoin('cities', 'cities.id', '=', 'all_jobs.city_id')
			->leftJoin('job_categories', 'job_categories.id', '=', 'all_jobs.types_of_job_id')
			->leftJoin('working_days', 'working_days.id', '=', 'all_jobs.working_days')
			->leftJoin('main_job_categories', 'main_job_categories.id', '=', 'all_jobs.job_category_id')
			->leftJoin('fee_charged_reasons', 'fee_charged_reasons.id', '=', 'all_jobs.candidate_fee_reasons')
			->where('all_jobs.status', '1')
			->where('all_jobs.is_deleted', '0')
			->select('all_jobs.id', 'all_jobs.employer_id', 'all_jobs.job_title', 'all_jobs.salary', 'all_jobs.no_of_opening', 'all_jobs.job_location_id', 'states.name as state_name', 'cities.name as city_name', 'job_categories.name as job_category_name', 'working_days.name as working_day_name', 'all_jobs.working_hours', 'all_jobs.experience_required', 'all_jobs.min_experience_required', 'all_jobs.max_experience_required', 'all_jobs.ctc', 'all_jobs.gender', 'all_jobs.candidate_requirements', 'all_jobs.skills', 'all_jobs.english_required', 'all_jobs.interview_information_company_name', 'all_jobs.interview_information_hr_name', 'all_jobs.interview_information_hr_number', 'all_jobs.interview_information_hr_email', 'all_jobs.job_address_state', 'all_jobs.job_address_flat_address', 'all_jobs.interview_address_city', 'all_jobs.interview_address_state', 'all_jobs.interview_address_full_address', 'all_jobs.candidate_fee_charged', 'all_jobs.candidate_fee_amount','all_jobs.candidate_fee_reasons','all_jobs.candidate_fee_other_reasons', 'fee_charged_reasons.name as candidate_fee_reasons_name', 'all_jobs.job_address_city','all_jobs.created_at','all_jobs.job_description','all_jobs.job_responsibilities','all_jobs.job_requirements','main_job_categories.name as main_job_category_name','all_jobs.qualification_ids')
			->first();


		$total_jobs_applied = JobAppliedByEmployee::where('job_id', $job_id)
			->where('is_deleted', '0')
			->get();
		$total_no_of_jobs_applied =$total_jobs_applied->count();
		
		return view('admin/job-details', compact('employer_details','job_locations','states_names','cities_names','fee_charged_reasons', 'qualifications', 'job_lists','total_no_of_jobs_applied'));
		
	}
	
	/* here admin update applied job status */
	public function updateAppliedJobStatus (Request $request){
		
		//DB::enableQueryLog(); //for print sql query
		
		$input = JobAppliedByEmployee::where('id', $request->id)
			->update([
				'status' => $request->status_id,
			]);
		
		if($request->status_id=='0'){
			
			return "Rejected";
			
		} else if($request->status_id=='1'){
			
			return "New";
			
		} elseif($request->status_id=='2'){
			
			return "Progress";
			
		} elseif($request->status_id=='3'){
			
			return "Selected";
		}
		/*for print sql query, start here */
		//$quries = DB::getQueryLog();
		//dd($quries);
		/*for print sql query, end here */
		
		
		
	}
	
	/* this function is call when candidate applied on job */
	public function apply_job_candidate(Request $request){
		
		$msg='';
		
		if(empty(session('login_user_data')[0]['id'])){
			
			/*redirect login page if candidate is not login*/
			$msg='Login';
			return $msg;
			
		} else {
			
			$job_apply = JobAppliedByEmployee::where('job_id', $request->job_id)
			->where('user_id', session('login_user_data')[0]['id'])
			->where('is_deleted', '0')
			->where('status', '1')
			->first();
			
			if(empty($job_apply['id'])){
				$input = JobAppliedByEmployee::insert([
					'job_id' => $request->job_id,
					'user_id' => session('login_user_data')[0]['id'],
					'is_deleted' => '0',
					'status' => '1',
				]);
				
				
				$job_id=$request->job_id;
				$candidate_id=session('login_user_data')[0]['id'];
				
				$candidate = Candidate_details::where('user_id', $candidate_id)
					->leftJoin('cities', 'cities.id', '=', 'candidate_details.city_id')
					->leftJoin('states', 'states.id', '=', 'candidate_details.state_id')
					->where('candidate_details.status', '1')
					->where('candidate_details.is_deleted', '0')
					->select('candidate_details.id', 'candidate_details.name as candidate_name', 'candidate_details.email', 'candidate_details.mobile_number', 'candidate_details.permanent_address', 'states.name as candidate_state_name', 'cities.name as candidate_city_name')
					->first();
				
				
				$query = AllJob::where('all_jobs.id', '=', $job_id)
				->where('all_jobs.is_deleted', '0')
				->leftJoin('cities', 'cities.id', '=', 'all_jobs.job_location_id')
				->leftJoin('employer_details', 'employer_details.employer_id', '=', 'all_jobs.employer_id')
				->select('all_jobs.id', 'all_jobs.employer_id', 'all_jobs.job_title', 'cities.name as job_location_name','employer_details.company_name as company_name','employer_details.city_id as company_city_id','employer_details.state_id as company_state_id')
				->first();
				
				$company_state_name = States::where('id', $query['company_state_id'])
				->where('is_deleted', '0')
				->where('countries_id', '101')
				->first();
				
				$company_city_name = Cities::where('id', $query['company_city_id'])
				->where('is_deleted', '0')
				->where('state_id', $company_state_name['id'])
				->first();
				
				
				
				$candidate_name=$candidate['candidate_name'];
				$candidate_email=$candidate['email'];
				$candidate_mobile=$candidate['mobile_number'];
				$candidate_address=ucwords($candidate['permanent_address']).', '.$candidate['candidate_city_name'].', '.$candidate['candidate_state_name'];
				
				$job_title=$query['job_title'];
				$job_location_name=$query['job_location_name'];
				$company_name=$query['company_name'];
				
				
				$data=array('candidate_name'=>$candidate_name, 'candidate_email'=>$candidate_email, 'candidate_mobile'=>$candidate_mobile, 'candidate_address'=>$candidate_address, 'company_city_name'=>$company_city_name, 'company_state_name'=>$company_state_name,'job_title'=>$job_title,'job_location_name'=>$job_location_name,'company_name'=>$company_name);
				
				$admin_email='athif.hussain05@gmail.com';
				
				Mail::send('mail',$data, function($message) use ($candidate_name, $admin_email) {
					$message->to($admin_email)
					->subject("Job Applied By $candidate_name");
				});
			

				$msg='Applied';
			} else {
				$msg='AlreadyApplied';
			}
			
			
			return $msg;
		}
		
	}
	
	/* this function is call when we update job status by employer */
	public function update_job_status(Request $request){
		
		$input = AllJob::where('id',$request->job_id)
		->update([
			'status' => $request->job_status,
		]);

		return $request->job_status;
		
	}
	
	/* this function is call when we delete job by employer */
	public function delete_job(Request $request){
		
		//dd($request->job_id);
		
		$input = AllJob::where('id',$request->job_id)
		->update([
			'is_deleted' => '1',
		]);

		return response()->json([
			'success' => 'Job has been deleted successfully!'
		]);
		
	}
	
	/* this function is call when we search job by search bar */
	public function show_jobs_search(Request $request){
		
		$job_locations = Cities::where('status', '1')
			->where('is_deleted', '0')
			->where('country_id', '101')
			->orderBy('name', 'ASC')
			->get();

		$states_names = States::where('status', '1')
			->where('is_deleted', '0')
			->where('countries_id', '101')
			->orderBy('name', 'ASC')
			->get();

		$cities_names = Cities::where('status', '1')
			->where('is_deleted', '0')
			->orderBy('name', 'ASC')
			->where('state_id', '10')
			->get();

		$fee_charged_reasons = FeeChargedReason::where('status', '1')
			->where('is_deleted', '0')
			->orderBy('id', 'ASC')
			->get();
		
		$qualifications = Qualification::where('status', '1')
			->where('is_deleted', '0')
			->orderBy('name', 'ASC')
			->get();
			
		$main_job_categories = MainJobCategory::where('status', '1')
			->where('is_deleted', '0')
			->orderBy('name', 'ASC')
			->get();
		
		$query = AllJob::where('all_jobs.status', '1')
			->where('all_jobs.is_deleted', '0')
			->leftJoin('states', 'states.id', '=', 'all_jobs.state_id')
			->leftJoin('cities', 'cities.id', '=', 'all_jobs.city_id')
			->leftJoin('job_categories', 'job_categories.id', '=', 'all_jobs.types_of_job_id')
			->leftJoin('working_days', 'working_days.id', '=', 'all_jobs.working_days')
			->leftJoin('main_job_categories', 'main_job_categories.id', '=', 'all_jobs.job_category_id')
			->leftJoin('employer_details', 'employer_details.employer_id', '=', 'all_jobs.employer_id')
			->orderBy('all_jobs.id','DESC')
			->select('all_jobs.id', 'all_jobs.employer_id', 'all_jobs.job_title', 'all_jobs.salary', 'all_jobs.no_of_opening', 'all_jobs.job_location_id', 'states.name as state_name', 'cities.name as city_name', 'job_categories.name as job_category_name', 'working_days.name as working_day_name', 'all_jobs.working_hours', 'all_jobs.experience_required', 'all_jobs.min_experience_required', 'all_jobs.max_experience_required', 'all_jobs.ctc', 'all_jobs.gender', 'all_jobs.candidate_requirements', 'all_jobs.skills', 'all_jobs.english_required', 'all_jobs.interview_information_company_name', 'all_jobs.interview_information_hr_name', 'all_jobs.interview_information_hr_number', 'all_jobs.interview_information_hr_email', 'all_jobs.job_address_city', 'all_jobs.job_address_state', 'all_jobs.job_address_flat_address', 'all_jobs.interview_address_city', 'all_jobs.interview_address_state', 'all_jobs.interview_address_full_address', 'all_jobs.candidate_fee_charged', 'all_jobs.candidate_fee_amount','all_jobs.created_at','all_jobs.job_description','all_jobs.job_responsibilities','all_jobs.job_requirements','main_job_categories.name as main_job_category_name','all_jobs.qualification_ids','employer_details.company_logo','employer_details.company_name');
		
		if($request->searching_keyword){
			$query->where('all_jobs.job_title', 'like', '%'.$request->searching_keyword.'%');
		}
		if($request->searching_city){
			$query->where('all_jobs.job_location_id', '=', $request->searching_city);
		}
		if($request->searching_category){
			$query->where('all_jobs.job_category_id', '=', $request->searching_category);
		}		
			
		$job_lists=$query->paginate(12);
		$total_no_of_jobs = $job_lists->count();
		
		return view('job', compact('job_locations','states_names','cities_names','fee_charged_reasons', 'qualifications', 'job_lists','total_no_of_jobs','main_job_categories'));
		
	}
	
	
	/* this function is call when we show all job list to candidate or visitors */
	public function show_jobs(){

		$job_locations = Cities::where('status', '1')
			->where('is_deleted', '0')
			->where('country_id', '101')
			->orderBy('name', 'ASC')
			->get();

		$states_names = States::where('status', '1')
			->where('is_deleted', '0')
			->where('countries_id', '101')
			->orderBy('name', 'ASC')
			->get();

		$cities_names = Cities::where('status', '1')
			->where('is_deleted', '0')
			->orderBy('name', 'ASC')
			->where('state_id', '10')
			->get();

		$fee_charged_reasons = FeeChargedReason::where('status', '1')
			->where('is_deleted', '0')
			->orderBy('id', 'ASC')
			->get();
		
		$qualifications = Qualification::where('status', '1')
			->where('is_deleted', '0')
			->orderBy('name', 'ASC')
			->get();
			
		$main_job_categories = MainJobCategory::where('status', '1')
			->where('is_deleted', '0')
			->orderBy('name', 'ASC')
			->get();
			
		$job_lists = AllJob::where('all_jobs.status', '1')
		->where('all_jobs.is_deleted', '0')
			->leftJoin('states', 'states.id', '=', 'all_jobs.state_id')
			->leftJoin('cities', 'cities.id', '=', 'all_jobs.city_id')
			->leftJoin('job_categories', 'job_categories.id', '=', 'all_jobs.types_of_job_id')
			->leftJoin('working_days', 'working_days.id', '=', 'all_jobs.working_days')
			->leftJoin('main_job_categories', 'main_job_categories.id', '=', 'all_jobs.job_category_id')
			->leftJoin('employer_details', 'employer_details.employer_id', '=', 'all_jobs.employer_id')
			->orderBy('all_jobs.id','DESC')
			->select('all_jobs.id', 'all_jobs.employer_id', 'all_jobs.job_title', 'all_jobs.salary', 'all_jobs.no_of_opening', 'all_jobs.job_location_id', 'states.name as state_name', 'cities.name as city_name', 'job_categories.name as job_category_name', 'working_days.name as working_day_name', 'all_jobs.working_hours', 'all_jobs.experience_required', 'all_jobs.min_experience_required', 'all_jobs.max_experience_required', 'all_jobs.ctc', 'all_jobs.gender', 'all_jobs.candidate_requirements', 'all_jobs.skills', 'all_jobs.english_required', 'all_jobs.interview_information_company_name', 'all_jobs.interview_information_hr_name', 'all_jobs.interview_information_hr_number', 'all_jobs.interview_information_hr_email', 'all_jobs.job_address_city', 'all_jobs.job_address_state', 'all_jobs.job_address_flat_address', 'all_jobs.interview_address_city', 'all_jobs.interview_address_state', 'all_jobs.interview_address_full_address', 'all_jobs.candidate_fee_charged', 'all_jobs.candidate_fee_amount','all_jobs.created_at','all_jobs.job_description','all_jobs.job_responsibilities','all_jobs.job_requirements','main_job_categories.name as main_job_category_name','all_jobs.qualification_ids','employer_details.company_logo','employer_details.company_name')
			->paginate(12);
		$total_no_of_jobs = $job_lists->count();
		
		return view('job', compact('job_locations','states_names','cities_names','fee_charged_reasons', 'qualifications', 'job_lists','total_no_of_jobs','main_job_categories'));
		
	}
	
	
	
	/* this function is call when we show single job details */
	public function show_job_Details($empr_id, $job_id) {
		
		$employer_details = Employer_detail::where('employer_id', $empr_id)
			->leftJoin('states', 'states.id', '=', 'employer_details.state_id')
			->leftJoin('cities', 'cities.id', '=', 'employer_details.city_id')
			->leftJoin('company_domains', 'company_domains.id', '=', 'employer_details.company_domain_id')
			->where('employer_details.status', '1')
			->where('employer_details.is_deleted', '0')
			->select('employer_details.id', 'employer_details.employer_id', 'employer_details.company_logo', 'employer_details.company_name', 'states.name as state_name', 'cities.name as city_name',  'employer_details.company_phone', 'employer_details.facebook_links', 'employer_details.twitter_links', 'employer_details.skype_links', 'employer_details.pinterest_links','employer_details.about_company')
			->get();

		$job_locations = Cities::where('status', '1')
			->where('is_deleted', '0')
			->where('country_id', '101')
			->orderBy('name', 'ASC')
			->get();

		$states_names = States::where('status', '1')
			->where('is_deleted', '0')
			->where('countries_id', '101')
			->orderBy('name', 'ASC')
			->get();

		$cities_names = Cities::where('status', '1')
			->where('is_deleted', '0')
			->orderBy('name', 'ASC')
			->where('state_id', '10')
			->get();

		$fee_charged_reasons = FeeChargedReason::where('status', '1')
			->where('is_deleted', '0')
			->orderBy('id', 'ASC')
			->get();
		
		$qualifications = Qualification::where('status', '1')
			->where('is_deleted', '0')
			->orderBy('name', 'ASC')
			->get();
			
		$job_lists = AllJob::where('all_jobs.id', $job_id)
			->where('employer_id', $empr_id)
			->leftJoin('states', 'states.id', '=', 'all_jobs.state_id')
			->leftJoin('cities', 'cities.id', '=', 'all_jobs.city_id')
			->leftJoin('job_categories', 'job_categories.id', '=', 'all_jobs.types_of_job_id')
			->leftJoin('working_days', 'working_days.id', '=', 'all_jobs.working_days')
			->leftJoin('main_job_categories', 'main_job_categories.id', '=', 'all_jobs.job_category_id')
			->where('all_jobs.status', '1')
			->where('all_jobs.is_deleted', '0')
			->select('all_jobs.id', 'all_jobs.employer_id', 'all_jobs.job_title', 'all_jobs.salary', 'all_jobs.no_of_opening', 'all_jobs.job_location_id', 'states.name as state_name', 'cities.name as city_name', 'job_categories.name as job_category_name', 'working_days.name as working_day_name', 'all_jobs.working_hours', 'all_jobs.experience_required', 'all_jobs.min_experience_required', 'all_jobs.max_experience_required', 'all_jobs.ctc', 'all_jobs.gender', 'all_jobs.candidate_requirements', 'all_jobs.skills', 'all_jobs.english_required', 'all_jobs.interview_information_company_name', 'all_jobs.interview_information_hr_name', 'all_jobs.interview_information_hr_number', 'all_jobs.interview_information_hr_email', 'all_jobs.job_address_city', 'all_jobs.job_address_state', 'all_jobs.job_address_flat_address', 'all_jobs.interview_address_city', 'all_jobs.interview_address_state', 'all_jobs.interview_address_full_address', 'all_jobs.candidate_fee_charged', 'all_jobs.candidate_fee_amount','all_jobs.created_at','all_jobs.job_description','all_jobs.job_responsibilities','all_jobs.job_requirements','main_job_categories.name as main_job_category_name','all_jobs.qualification_ids')
			->get();
		
		return view('job-details', compact('employer_details','job_locations','states_names','cities_names','fee_charged_reasons', 'qualifications', 'job_lists'));
	}
	
	/* this function is call when employer post a new job */
	public function show($id) {

		$job_locations = Cities::where('status', '1')
			->where('is_deleted', '0')
			->where('country_id', '101')
			->orderBy('name', 'ASC')
			->get();

		$states_names = States::where('status', '1')
			->where('is_deleted', '0')
			->where('countries_id', '101')
			->orderBy('name', 'ASC')
			->get();

		$cities_names = Cities::where('status', '1')
			->where('is_deleted', '0')
			->orderBy('name', 'ASC')
			->where('state_id', '10')
			->get();

		$job_categories = JobCategories::where('status', '1')
			->where('is_deleted', '0')
			->orderBy('name', 'ASC')
			->get();

		$working_days = WorkingDay::where('status', '1')
			->where('is_deleted', '0')
			->orderBy('id', 'ASC')
			->get();

		$fee_charged_reasons = FeeChargedReason::where('status', '1')
			->where('is_deleted', '0')
			->orderBy('id', 'ASC')
			->get();
			
		$main_job_categories = MainJobCategory::where('status', '1')
			->where('is_deleted', '0')
			->orderBy('name', 'ASC')
			->get();
			
		$qualifications = Qualification::where('status', '1')
			->where('is_deleted', '0')
			->orderBy('name', 'ASC')
			->get();

		$employer_id = $id;

		if(!empty(session('login_user_data')[0]['id'])){
			
			return view('post-job', compact('employer_id', 'job_locations', 'states_names', 'cities_names', 'job_categories', 'working_days', 'fee_charged_reasons','main_job_categories','qualifications'));
			
		} else {
			
			return redirect('/login');
			
		}
		
		

	}

	/* this function is call when employer submit job post form */
	public function create(Request $request) {
		//dd($request);

		$request->validate([
			'job_title' => 'required|max:100',
			'salary' => 'required|max:15',
			'no_of_opening' => 'required|max:10',
			'job_location_id' => 'required',
			'state_id' => 'required',
			'city_id' => 'required',
			'types_of_job_id' => 'required',
			'working_days' => 'required',
			'working_hours' => 'required|max:15',
			'ctc' => 'required',
			'gender' => 'required',
			'skills' => 'required',
			'interview_information_company_name' => 'required|max:100',
			'interview_information_hr_name' => 'required|max:50',
			'interview_information_hr_number' => 'required|digits:10|numeric',
			'interview_information_hr_email' => 'required|max:50|email',
			'job_address_flat_address' => 'required|max:500',
			'job_address_state' => 'required',
			'job_address_city' => 'required',
			'interview_address_full_address' => 'required|max:300',
			'interview_address_state' => 'required',
			'interview_address_city' => 'required',
			'min_experience_required' => 'required_if:experience_required,=,Experience',
			'max_experience_required' => 'required_if:experience_required,=,Experience',
			'job_description' => 'required',
			'job_responsibilities' => 'required',
			'job_requirements' => 'required',
			'job_category_id' => 'required',
			'qualification_ids' => 'required',
		], [
			'job_title.required' => 'Job title is required',
			'salary.required' => 'Salary is required',
			'no_of_opening.required' => 'No of opening is required',
			'job_location_id.required' => 'Job location is required',
			'state_id.required' => 'State is required',
			'city_id.required' => 'City is required',
			'types_of_job_id.required' => 'Types of job is required',
			'working_days.required' => 'Working days is required',
			'working_hours.required' => 'Working hours is required',
			'ctc.required' => 'CTC is required',
			'skills.required' => 'Skills is required',
			'interview_information_company_name.required' => 'Company name is required',
			'interview_information_hr_name.required' => 'HR name is required',
			'interview_information_hr_number.required' => 'HR number  is required',
			'interview_information_hr_email.required' => 'HR Email is required',
			'job_address_flat_address.required' => 'Address is required',
			'job_address_state.required' => 'State is required',
			'job_address_city.required' => 'City is required',
			'interview_address_full_address.required' => 'Address is required',
			'interview_address_state.required' => 'State is required',
			'interview_address_city.required' => 'City is required',
			'min_experience_required.required_if' => 'Min Exp is required',
			'max_experience_required.required_if' => 'Max Exp is required',
			'job_description.required' => 'Job description is required',
			'job_responsibilities.required' => 'Job responsibilities is required',
			'job_requirements.required' => 'Job requirements is required',
			'job_category_id.required' => 'Job category is required',
			'qualification_ids.required' => 'Qualification is required',
		]);
		
		$qualification_ids=implode(',',$request->qualification_ids);
		$candidate_requirements=implode(', ',$request->candidate_requirements);
		
		$input = AllJob::insert([
			'employer_id' => $request->employer_id,
			'job_title' => $request->job_title,
			'salary' => $request->salary,
			'no_of_opening' => $request->no_of_opening,
			'job_location_id' => $request->job_location_id,
			'state_id' => $request->state_id,
			'city_id' => $request->city_id,
			'types_of_job_id' => $request->types_of_job_id,
			'working_days' => $request->working_days,
			'working_hours' => $request->working_hours,
			'experience_required' => $request->experience_required,
			'min_experience_required' => $request->min_experience_required,
			'max_experience_required' => $request->max_experience_required,
			'ctc' => $request->ctc,
			'gender' => $request->gender,
			'candidate_requirements' => $candidate_requirements,
			'skills' => $request->skills,
			'english_required' => $request->english_required,
			'interview_information_company_name' => $request->interview_information_company_name,
			'interview_information_hr_name' => $request->interview_information_hr_name,
			'interview_information_hr_number' => $request->interview_information_hr_number,
			'interview_information_hr_email' => $request->interview_information_hr_email,
			'job_address_city' => $request->job_address_city,
			'job_address_state' => $request->job_address_state,
			'job_address_flat_address' => $request->job_address_flat_address,
			'interview_address_city' => $request->interview_address_city,
			'interview_address_state' => $request->interview_address_state,
			'interview_address_full_address' => $request->interview_address_full_address,
			'candidate_fee_charged' => $request->candidate_fee_charged,
			'candidate_fee_amount' => $request->candidate_fee_amount,
			'candidate_fee_reasons' => $request->candidate_fee_reasons,
			'candidate_fee_other_reasons' => $request->candidate_fee_other_reasons,
			'job_description' => addslashes($request->job_description),
			'job_responsibilities' => addslashes($request->job_responsibilities),
			'job_requirements' => addslashes($request->job_requirements),
			'job_category_id' => $request->job_category_id,
			'qualification_ids' => $qualification_ids,
			'status' => '1',
		]);

		return back()->with('success', 'Job posted successfully...');

	}

	public function edit_job($empr_id, $job_id) {
		//dd($empr_id.'/'.$id);
		
		$job_detail = AllJob::where('all_jobs.id', $job_id)
			->where('employer_id', $empr_id)
			->where('all_jobs.status', '1')
			->where('all_jobs.is_deleted', '0')
			->first();
			
		$job_locations = Cities::where('status', '1')
			->where('is_deleted', '0')
			->where('country_id', '101')
			->orderBy('name', 'ASC')
			->get();

		$states_names = States::where('status', '1')
			->where('is_deleted', '0')
			->where('countries_id', '101')
			->orderBy('name', 'ASC')
			->get();

		$cities_names = Cities::where('status', '1')
			->where('is_deleted', '0')
			->orderBy('name', 'ASC')
			->where('state_id', $job_detail['state_id'])
			->get();

		$job_categories = JobCategories::where('status', '1')
			->where('is_deleted', '0')
			->orderBy('name', 'ASC')
			->get();

		$working_days = WorkingDay::where('status', '1')
			->where('is_deleted', '0')
			->orderBy('id', 'ASC')
			->get();

		$fee_charged_reasons = FeeChargedReason::where('status', '1')
			->where('is_deleted', '0')
			->orderBy('id', 'ASC')
			->get();
			
		$main_job_categories = MainJobCategory::where('status', '1')
			->where('is_deleted', '0')
			->orderBy('name', 'ASC')
			->get();
		
		$qualifications = Qualification::where('status', '1')
			->where('is_deleted', '0')
			->orderBy('name', 'ASC')
			->get();
		
		$employer_id=$empr_id;

		return view('edit-job', compact('job_locations','states_names','cities_names','job_categories','working_days','fee_charged_reasons','main_job_categories', 'qualifications', 'job_detail','employer_id','job_id'));
		
	}

	public function update(Request $request) {
		//dd("update".$request);
		
		$request->validate([
			'job_title' => 'required|max:100',
			'salary' => 'required|max:15',
			'no_of_opening' => 'required|max:10',
			'job_location_id' => 'required',
			'state_id' => 'required',
			'city_id' => 'required',
			'types_of_job_id' => 'required',
			'working_days' => 'required',
			'working_hours' => 'required|max:15',
			'ctc' => 'required',
			'gender' => 'required',
			'skills' => 'required',
			'interview_information_company_name' => 'required|max:100',
			'interview_information_hr_name' => 'required|max:50',
			'interview_information_hr_number' => 'required|digits:10|numeric',
			'interview_information_hr_email' => 'required|max:50|email',
			'job_address_flat_address' => 'required|max:500',
			'job_address_state' => 'required',
			'job_address_city' => 'required',
			'interview_address_full_address' => 'required|max:300',
			'interview_address_state' => 'required',
			'interview_address_city' => 'required',
			'min_experience_required' => 'required_if:experience_required,=,Experience',
			'max_experience_required' => 'required_if:experience_required,=,Experience',
			'job_description' => 'required',
			'job_responsibilities' => 'required',
			'job_requirements' => 'required',
			'job_category_id' => 'required',
			'qualification_ids' => 'required',
		], [
			'job_title.required' => 'Job title is required',
			'salary.required' => 'Salary is required',
			'no_of_opening.required' => 'No of opening is required',
			'job_location_id.required' => 'Job location is required',
			'state_id.required' => 'State is required',
			'city_id.required' => 'City is required',
			'types_of_job_id.required' => 'Types of job is required',
			'working_days.required' => 'Working days is required',
			'working_hours.required' => 'Working hours is required',
			'ctc.required' => 'CTC is required',
			'skills.required' => 'Skills is required',
			'interview_information_company_name.required' => 'Company name is required',
			'interview_information_hr_name.required' => 'HR name is required',
			'interview_information_hr_number.required' => 'HR number  is required',
			'interview_information_hr_email.required' => 'HR Email is required',
			'job_address_flat_address.required' => 'Address is required',
			'job_address_state.required' => 'State is required',
			'job_address_city.required' => 'City is required',
			'interview_address_full_address.required' => 'Address is required',
			'interview_address_state.required' => 'State is required',
			'interview_address_city.required' => 'City is required',
			'min_experience_required.required_if' => 'Min Exp is required',
			'max_experience_required.required_if' => 'Max Exp is required',
			'job_description.required' => 'Job description is required',
			'job_responsibilities.required' => 'Job responsibilities is required',
			'job_requirements.required' => 'Job requirements is required',
			'job_category_id.required' => 'Job category is required',
			'qualification_ids.required' => 'Qualification is required',
		]);
		
		$qualification_ids=implode(',',$request->qualification_ids);
		$candidate_requirements=implode(', ',$request->candidate_requirements);

		$input = AllJob::where('id',$request->job_id)
		->where('employer_id',$request->employer_id)
		->update([
			'job_title' => $request->job_title,
			'salary' => $request->salary,
			'no_of_opening' => $request->no_of_opening,
			'job_location_id' => $request->job_location_id,
			'state_id' => $request->state_id,
			'city_id' => $request->city_id,
			'job_description' => addslashes($request->job_description),
			'job_responsibilities' => addslashes($request->job_responsibilities),
			'job_requirements' => addslashes($request->job_requirements),
			'job_category_id' => $request->job_category_id,
			'types_of_job_id' => $request->types_of_job_id,
			'working_days' => $request->working_days,
			'working_hours' => $request->working_hours,
			'experience_required' => $request->experience_required,
			'min_experience_required' => $request->min_experience_required,
			'max_experience_required' => $request->max_experience_required,
			'ctc' => $request->ctc,
			'skills' => $request->skills,
			'qualification_ids' => $qualification_ids,
			'gender' => $request->gender,
			'candidate_requirements' => $candidate_requirements,
			'english_required' => $request->english_required,
			'interview_information_company_name' => $request->interview_information_company_name,
			'interview_information_hr_name' => $request->interview_information_hr_name,
			'interview_information_hr_number' => $request->interview_information_hr_number,
			'interview_information_hr_email' => $request->interview_information_hr_email,
			'job_address_city' => $request->job_address_city,
			'job_address_state' => $request->job_address_state,
			'job_address_flat_address' => $request->job_address_flat_address,
			'interview_address_city' => $request->interview_address_city,
			'interview_address_state' => $request->interview_address_state,
			'interview_address_full_address' => $request->interview_address_full_address,
			'candidate_fee_charged' => $request->candidate_fee_charged,
			'candidate_fee_amount' => $request->candidate_fee_amount,
			'candidate_fee_reasons' => $request->candidate_fee_reasons,
			'candidate_fee_other_reasons' => $request->candidate_fee_other_reasons,
		]);

		return back()->with('success', 'Job updated successfully...');
		
	}
	
	
}
