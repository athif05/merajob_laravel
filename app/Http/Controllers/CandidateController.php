<?php

namespace App\Http\Controllers;

use App\CandidateQualification;
use App\Candidate_details;
use App\Cities;
use App\JobCategories;
use App\NoticePeriod;
use App\States;
use App\User;
use App\WorkExperience;
use App\CandidateWorkExperience;
use App\JobAppliedByEmployee;
use App\AllJob;
use App\CompanyDomain;
use App\Employer_detail;
use App\FeeChargedReason;
use App\Qualification;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;




class CandidateController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	
	/* show single candidate deatails */
	public function showSingleCandidateAdmin($cand_id) {
		
		$candidates = Candidate_details::where('candidate_details.id',$cand_id)
				->leftJoin('cities', 'cities.id', '=', 'candidate_details.city_id')
				->leftJoin('states', 'states.id', '=', 'candidate_details.state_id')
				->leftJoin('work_experiences', 'work_experiences.id', '=', 'candidate_details.work_experience')
				->leftJoin('notice_periods', 'notice_periods.id', '=', 'candidate_details.notice_period')
				->select('candidate_details.id', 'candidate_details.name', 'candidate_details.email', 'candidate_details.mobile_number', 'candidate_details.alternate_number', 'candidate_details.permanent_address', 'candidate_details.current_address', 'candidate_details.job_title', 'candidate_details.job_keywords', 'candidate_details.state_id', 'states.name as state_name', 'cities.name as city_name', 'work_experiences.name as work_experience', 'candidate_details.last_ctc', 'candidate_details.skills', 'candidate_details.describe_job_profile', 'notice_periods.name as notice_period', 'candidate_details.image', 'candidate_details.user_id','candidate_details.resume_file','candidate_details.status as candidate_status')
				->first();

			//$wordCount = $candidates->count();
			//dd($wordCount);

			/*for print sql query, start here */
			//$quries = DB::getQueryLog();
			//dd($quries);
			
			$candidate_qualifications=CandidateQualification::where('user_id', $candidates['user_id'])
				->orderBy('year', 'DESC')
				->get();
				
			$candidate_work_experiences=CandidateWorkExperience::where('user_id', $candidates['user_id'])
				->where('status', '1')
				->orderBy('id', 'DESC')
				->get();
			
			return view('admin/candidate-details', compact('candidates','candidate_qualifications','candidate_work_experiences'));
	}
	
	
	/*here we delete candidate from admin*/
	public function deleteCandidate(Request $request) {

		$input = Candidate_details::where('id', $request->candidate_id)
			->update([
				'is_deleted' => $request->candidate_del_status,
			]);

		return $request->candidate_del_status;

	}
	
	/* update candidate status from admin */
	public function updateCandidateStatus(Request $request){
		
		$input = Candidate_details::where('id', $request->candidate_id)
			->update([
				'status' => $request->candidate_status,
		]);
		
		return $request->candidate_status;
	}
	
	/* show all candidate list in admin panel */
	public function showAllCandidateAdmin(){
			
			$candidates = Candidate_details::leftJoin('cities', 'cities.id', '=', 'candidate_details.city_id')
				->leftJoin('states', 'states.id', '=', 'candidate_details.state_id')
				->leftJoin('work_experiences', 'work_experiences.id', '=', 'candidate_details.work_experience')
				->leftJoin('notice_periods', 'notice_periods.id', '=', 'candidate_details.notice_period')
				->select('candidate_details.id', 'candidate_details.name', 'candidate_details.email', 'candidate_details.mobile_number', 'candidate_details.alternate_number', 'candidate_details.permanent_address', 'candidate_details.current_address', 'candidate_details.job_title', 'candidate_details.job_keywords', 'candidate_details.state_id', 'states.name as state_name', 'cities.name as city_name', 'work_experiences.name as work_experience', 'candidate_details.last_ctc', 'candidate_details.skills', 'candidate_details.describe_job_profile', 'notice_periods.name as notice_period', 'candidate_details.image', 'candidate_details.user_id','candidate_details.resume_file','candidate_details.status as candidate_status')
				->paginate(10);

			$wordCount = $candidates->count();
			//dd($wordCount);

			/*for print sql query, start here */
			//$quries = DB::getQueryLog();
			//dd($quries);
			
			$candidate_qualifications=CandidateQualification::orderBy('year', 'DESC')
				->get();
				
			$candidate_work_experiences=CandidateWorkExperience::where('status', '1')
				->orderBy('id', 'DESC')
				->get();
			
			return view('admin/candidate-list', compact('candidates','candidate_qualifications','candidate_work_experiences'));
	}
	
	public function show_all_jobs_list($id) {
		
		if(!empty(session('login_user_data')[0]['id']) && (session('login_user_data')[0]['user_type']==1)){
						
			$qualifications = Qualification::where('status', '1')
				->where('is_deleted', '0')
				->orderBy('name', 'ASC')
				->get();
				
			$cities = Cities::where('status', '1')
				->where('is_deleted', '0')
				->orderBy('name', 'ASC')
				->get();
				
			$employer_details = Employer_detail::where('status', '1')
				->where('is_deleted', '0')
				->select('employer_id', 'company_name', 'city_id')
				->get();

			$job_lists = JobAppliedByEmployee::where('user_id', $id)
				->Join('all_jobs', 'all_jobs.id', '=', 'job_applied_by_employees.job_id')
				->leftJoin('cities', 'cities.id', '=', 'all_jobs.job_location_id')
				->leftJoin('working_days', 'working_days.id', '=', 'all_jobs.working_days')
				->where('job_applied_by_employees.is_deleted', '0')
				->select('all_jobs.id', 'all_jobs.employer_id', 'all_jobs.job_title', 'cities.name as job_location_name', 'working_days.name as working_day_name', 'all_jobs.ctc', 'all_jobs.qualification_ids','all_jobs.employer_id')
				->get();
			$total_jobs = $job_lists->count();

			return view('candidate-jobs-list', compact('job_lists','total_jobs','qualifications','employer_details','cities'));
			
		} else {
			
			return redirect('/login');
			
		}
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {

		if(!empty(session('login_user_data')[0]['id']) && (session('login_user_data')[0]['user_type']==1)){
			
			DB::enableQueryLog(); //for print sql query

			$candidates = Candidate_details::where('user_id', $id)
				->leftJoin('cities', 'cities.id', '=', 'candidate_details.city_id')
				->leftJoin('states', 'states.id', '=', 'candidate_details.state_id')
				->leftJoin('work_experiences', 'work_experiences.id', '=', 'candidate_details.work_experience')
				->leftJoin('notice_periods', 'notice_periods.id', '=', 'candidate_details.notice_period')
				->where('candidate_details.status', '1')
				->where('candidate_details.is_deleted', '0')
				->select('candidate_details.id', 'candidate_details.name', 'candidate_details.email', 'candidate_details.mobile_number', 'candidate_details.alternate_number', 'candidate_details.permanent_address', 'candidate_details.current_address', 'candidate_details.job_title', 'candidate_details.job_keywords', 'candidate_details.state_id', 'states.name as state_name', 'cities.name as city_name', 'work_experiences.name as work_experience', 'candidate_details.last_ctc', 'candidate_details.skills', 'candidate_details.describe_job_profile', 'notice_periods.name as notice_period', 'candidate_details.image', 'candidate_details.user_id','candidate_details.resume_file')
				->get();

			$wordCount = $candidates->count();
			//dd($wordCount);

			/*for print sql query, start here */
			//$quries = DB::getQueryLog();
			//dd($quries);
			
			$candidate_qualifications=CandidateQualification::where('user_id', $id)
				->orderBy('year', 'DESC')
				->get();
				
			$candidate_work_experiences=CandidateWorkExperience::where('user_id', $id)
				->orderBy('id', 'DESC')
				->get();
				
			//return view('candidate-details')->with('candidates', $candidates);

			//$job_location_array = array();
			//$job_location_array = explode(',', $candidates[0]['job_locations_id']);
			
			return view('candidate-details', compact('candidates','candidate_qualifications','candidate_work_experiences'));
		
		} else {
			
			return redirect('/login');
			
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		
		$candidates = Candidate_details::where('user_id', $id)
			->leftJoin('cities', 'cities.id', '=', 'candidate_details.city_id')
			->where('candidate_details.status', '1')
			->where('candidate_details.is_deleted', '0')
			->select('candidate_details.id', 'candidate_details.name', 'candidate_details.email', 'candidate_details.mobile_number', 'candidate_details.alternate_number', 'candidate_details.permanent_address', 'candidate_details.current_address', 'candidate_details.job_title', 'candidate_details.job_keywords', 'candidate_details.state_id', 'cities.name as city_name', 'candidate_details.last_ctc', 'candidate_details.work_experience', 'candidate_details.skills', 'candidate_details.describe_job_profile', 'candidate_details.notice_period', 'candidate_details.image', 'candidate_details.user_id','candidate_details.resume_file')
			->get();

		$wordCount = $candidates->count();

		$states_names = States::where('status', '1')
			->where('is_deleted', '0')
			->where('countries_id', '101')
			->orderBy('name', 'ASC')
			->get();

		$cities_names = Cities::where('status', '1')
			->where('is_deleted', '0')
			->orderBy('name', 'ASC')
			->where('state_id', $candidates[0]['state_id'])
			->get();

		$job_categories = JobCategories::where('status', '1')
			->where('is_deleted', '0')
			->orderBy('name', 'ASC')
			->get();

		$job_locations = Cities::where('status', '1')
			->where('is_deleted', '0')
			->where('country_id', '101')
			->orderBy('name', 'ASC')
			->get();

		$notice_periods = NoticePeriod::where('status', '1')
			->where('is_deleted', '0')
			->orderBy('id', 'ASC')
			->get();

		$work_experiences = WorkExperience::where('status', '1')
			->where('is_deleted', '0')
			->orderBy('id', 'ASC')
			->get();
			
		$candidate_qualifications=CandidateQualification::where('user_id', $id)
			->orderBy('year', 'DESC')
			->get();
			
		$candidate_work_experiences=CandidateWorkExperience::where('user_id', $id)
			->orderBy('id', 'DESC')
			->get();

		$job_location_array = array();
		$job_location_array = explode(',', $candidates[0]['job_locations_id']);

		return view('candidate-edit', compact('candidates', 'states_names', 'cities_names', 'job_categories', 'job_locations', 'job_location_array', 'notice_periods', 'work_experiences','candidate_qualifications','candidate_work_experiences'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request) {

		//dd($request);

		$request->validate([
			'name' => 'required|max:50|regex:/^[\pL\s]+$/u',
			'mobile_number' => 'required|digits:10|numeric',
			'permanent_address' => 'required|max:500',
			'current_address' => 'required|max:500',
			'state_id' => 'required',
			'city_id' => 'required',
			'work_experience' => 'required|max:100',
			'describe_job_profile' => 'required|max:300',
			'skills' => 'required',
			'notice_period' => 'required',
			'last_ctc' => 'required',
		], [
			'name.required' => 'User Name is required',
			'mobile_number.required' => 'Mobile number is required',
			'permanent_address.required' => 'Permanent address is required',
			'current_address.required' => 'Current address is required',
			'state_id.required' => 'State is required',
			'city_id.required' => 'City is required',
			'work_experience.required' => 'Work experience is required',
			'describe_job_profile.required' => 'Describe job profile is required',
			'skills.required' => 'Skills is required',
			'notice_period.required' => 'Notice period is required',
			'last_ctc.required' => 'Last CTC  is required',
		]);

		$email = !empty($request->email) ? $request->email : $request->mobile_number;

		//$job_locations_id = implode(',', $request->job_locations_id);

		DB::enableQueryLog(); //for print sql query

		User::where('id', $request->edit_id)->update(['name' => $request->name, 'email' => $email, 'mobile_number' => $request->mobile_number]);

		/*for print sql query, start here */
		//$quries = DB::getQueryLog();
		//dd($quries);

		Candidate_details::where('user_id', $request->edit_id)->update(['name' => $request->name, 'email' => $email, 'mobile_number' => $request->mobile_number, 'alternate_number' => $request->alternate_number, 'permanent_address' => $request->permanent_address, 'current_address' => $request->current_address, 'state_id' => $request->state_id, 'city_id' => $request->city_id, 'work_experience' => $request->work_experience, 'describe_job_profile' => $request->describe_job_profile, 'skills' => $request->skills, 'notice_period' => $request->notice_period, 'last_ctc' => $request->last_ctc]);			
		
		if ($request->profile_image) {

			$profile_filePath=$request->file('profile_image')->store('candidates-profile');

			$profile_pic_file_path = '/storage/app/' . $profile_filePath;
			
			Candidate_details::where('user_id', $request->edit_id)->update(['image'=>$profile_pic_file_path]);
		}
		
		if ($request->resume_file) {

			$filePath=$request->file('resume_file')->store('candidates-resume');

			$resume_file_path = '/storage/app/' . $filePath;
			
			Candidate_details::where('user_id', $request->edit_id)->update(['resume_file'=>$resume_file_path]);
		}
		
		/* save qualification, start here */
		CandidateQualification::where('user_id', $request->edit_id)->delete();

		$qualification_counter=count($request->addmore_qualification);
		
		for($j=0;$j<$qualification_counter;$j++){
				$input = CandidateQualification::insert([
				'user_id' => $request->edit_id,
				'qualification' => $request->addmore_qualification[$j],
				'college_university' => $request->addmore_college_university[$j],
				'year' => $request->addmore_year[$j],
				'marks' => $request->addmore_marks[$j],
			]);
		}
		/* save qualification, end here */
		
		/* save work experience, start here */
		
		CandidateWorkExperience::where('user_id', $request->edit_id)->delete();
		$experience_counter=count($request->addmore_designation);
		
		if($request->work_experience!=1){
				
			for($k=0;$k<$experience_counter;$k++){
					$input = CandidateWorkExperience::insert([
					'user_id' => $request->edit_id,
					'designation_name' => $request->addmore_designation[$k],
					'organization_name' => $request->addmore_company_name[$k],
					'date_from' => $request->addmore_from[$k],
					'date_to' => $request->addmore_to[$k],
					'describe_role' => $request->addmore_describe_role[$k],
					'status' => '1',
				]);
			}
		}
		
		/* save work experience, end here */
		
		
		return redirect('/candidate-details/'.$request->edit_id)->with('success', 'Profile updated successfully.');
		
		//return back()->with('success', 'User created successfully.');

		//return response()->json(['success' => 'Profile updated successfully.']);

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function delete_job(Request $request) {
		
		$input = JobAppliedByEmployee::where('job_id',$request->job_id)
		->update([
			'is_deleted' => '1',
		]);

		return response()->json([
			'success' => 'Job has been deleted successfully!'
		]);
		
	}
}
