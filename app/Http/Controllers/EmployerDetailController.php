<?php

namespace App\Http\Controllers;

use App\AllJob;
use App\Cities;
use App\CompanyDomain;
use App\Employer_detail;
use App\FeeChargedReason;
use App\States;
use App\User;
use Illuminate\Http\Request;

class EmployerDetailController extends Controller {

	/*show all employer detail in a list in admin panel*/
	public function fetchEmployerDetail(Request $request) {

		$employer_details = Employer_detail::leftJoin('cities', 'cities.id', '=', 'employer_details.city_id')
			->leftJoin('company_domains', 'company_domains.id', '=', 'employer_details.company_domain_id')
			->orderBy('company_name', 'ASC')
			->select('employer_details.id', 'employer_details.employer_id', 'employer_details.company_logo', 'employer_details.company_name', 'cities.name as city_name', 'employer_details.email', 'employer_details.mobile_number', 'employer_details.company_phone', 'employer_details.company_address', 'company_domains.name as company_domains_name', 'employer_details.company_established_year', 'employer_details.company_website', 'employer_details.status', 'employer_details.is_deleted')
			->paginate(10);

		return view('admin/employers-list', compact('employer_details'));
	}
	
	/*show single employer details in admin panel*/
	public function showEmployerDetailAdmin($id) {
		//dd($id);

		$employer_details = Employer_detail::where('id', $id)
			->leftJoin('states', 'states.id', '=', 'employer_details.state_id')
			->leftJoin('cities', 'cities.id', '=', 'employer_details.city_id')
			->leftJoin('company_domains', 'company_domains.id', '=', 'employer_details.company_domain_id')
			->where('employer_details.status', '1')
			->where('employer_details.is_deleted', '0')
			->select('employer_details.id', 'employer_details.employer_id', 'employer_details.company_logo', 'employer_details.company_name', 'states.name as state_name', 'cities.name as city_name', 'employer_details.email', 'employer_details.mobile_number', 'employer_details.company_phone', 'employer_details.alternate_number', 'employer_details.company_address', 'employer_details.about_company', 'company_domains.name as company_domains_name', 'employer_details.company_established_year', 'employer_details.team_member', 'employer_details.company_website', 'employer_details.company_views', 'employer_details.facebook_links', 'employer_details.twitter_links', 'employer_details.skype_links', 'employer_details.pinterest_links')
			->get();

		$job_locations = Cities::where('status', '1')
			->where('is_deleted', '0')
			->where('country_id', '101')
			->orderBy('name', 'ASC')
			->get();

		$fee_charged_reasons = FeeChargedReason::where('status', '1')
			->where('is_deleted', '0')
			->orderBy('id', 'ASC')
			->get();

		$job_lists = AllJob::where('employer_id', $id)
			->leftJoin('states', 'states.id', '=', 'all_jobs.state_id')
			->leftJoin('cities', 'cities.id', '=', 'all_jobs.city_id')
			->leftJoin('job_categories', 'job_categories.id', '=', 'all_jobs.types_of_job_id')
			->leftJoin('working_days', 'working_days.id', '=', 'all_jobs.working_days')
			->where('all_jobs.status', '1')
			->where('all_jobs.is_deleted', '0')
			->select('all_jobs.id', 'all_jobs.employer_id', 'all_jobs.job_title', 'all_jobs.salary', 'all_jobs.no_of_opening', 'all_jobs.job_location_id', 'states.name as state_name', 'cities.name as city_name', 'job_categories.name as job_category_name', 'working_days.name as working_day_name', 'all_jobs.working_hours', 'all_jobs.experience_required', 'all_jobs.min_experience_required', 'all_jobs.max_experience_required', 'all_jobs.ctc', 'all_jobs.gender', 'all_jobs.candidate_requirements', 'all_jobs.skills', 'all_jobs.english_required', 'all_jobs.interview_information_company_name', 'all_jobs.interview_information_hr_name', 'all_jobs.interview_information_hr_number', 'all_jobs.interview_information_hr_email', 'all_jobs.job_address_city', 'all_jobs.job_address_state', 'all_jobs.job_address_flat_address', 'all_jobs.interview_address_city', 'all_jobs.interview_address_state', 'all_jobs.interview_address_full_address', 'all_jobs.candidate_fee_charged', 'all_jobs.candidate_fee_amount', 'all_jobs.job_address_city', 'all_jobs.job_address_city', 'all_jobs.job_address_city', 'all_jobs.job_address_city', 'all_jobs.job_address_city', 'all_jobs.job_address_city', 'all_jobs.job_address_city', 'all_jobs.job_address_city', 'all_jobs.job_address_city')
			->get();
		$total_jobs = $job_lists->count();

		return view('admin/employer-details', compact('employer_details', 'job_locations', 'states_names', 'cities_names', 'fee_charged_reasons', 'job_lists','total_jobs'));

		//return view('employers-details');
	}
	
	
	/* this function is call when we update employer detail status by admin */
	public function updateEmployerDetailStatusAdmin(Request $request) {

		$input = Employer_detail::where('id', $request->employer_detail_id)
			->update([
				'status' => $request->employer_detail_status,
			]);

		return $request->employer_detail_status;

	}
	
	/*here we delete employer detail from admin*/
	public function deleteEmployerDetailAdmin(Request $request) {

		$input = Employer_detail::where('id', $request->employer_detail_id)
			->update([
				'is_deleted' => $request->employer_detail_del_status,
			]);

		return $request->employer_detail_del_status;

	}
	
	public function show($id) {
		//dd($id);

		$employer_details = Employer_detail::where('employer_id', $id)
			->leftJoin('states', 'states.id', '=', 'employer_details.state_id')
			->leftJoin('cities', 'cities.id', '=', 'employer_details.city_id')
			->leftJoin('company_domains', 'company_domains.id', '=', 'employer_details.company_domain_id')
			->where('employer_details.status', '1')
			->where('employer_details.is_deleted', '0')
			->select('employer_details.id', 'employer_details.employer_id', 'employer_details.company_logo', 'employer_details.company_name', 'states.name as state_name', 'cities.name as city_name', 'employer_details.email', 'employer_details.mobile_number', 'employer_details.company_phone', 'employer_details.alternate_number', 'employer_details.company_address', 'employer_details.about_company', 'company_domains.name as company_domains_name', 'employer_details.company_established_year', 'employer_details.team_member', 'employer_details.company_website', 'employer_details.company_views', 'employer_details.facebook_links', 'employer_details.twitter_links', 'employer_details.skype_links', 'employer_details.pinterest_links')
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

		$job_lists = AllJob::where('employer_id', $id)
			->leftJoin('states', 'states.id', '=', 'all_jobs.state_id')
			->leftJoin('cities', 'cities.id', '=', 'all_jobs.city_id')
			->leftJoin('job_categories', 'job_categories.id', '=', 'all_jobs.types_of_job_id')
			->leftJoin('working_days', 'working_days.id', '=', 'all_jobs.working_days')
			->where('all_jobs.status', '1')
			->where('all_jobs.is_deleted', '0')
			->select('all_jobs.id', 'all_jobs.employer_id', 'all_jobs.job_title', 'all_jobs.salary', 'all_jobs.no_of_opening', 'all_jobs.job_location_id', 'states.name as state_name', 'cities.name as city_name', 'job_categories.name as job_category_name', 'working_days.name as working_day_name', 'all_jobs.working_hours', 'all_jobs.experience_required', 'all_jobs.min_experience_required', 'all_jobs.max_experience_required', 'all_jobs.ctc', 'all_jobs.gender', 'all_jobs.candidate_requirements', 'all_jobs.skills', 'all_jobs.english_required', 'all_jobs.interview_information_company_name', 'all_jobs.interview_information_hr_name', 'all_jobs.interview_information_hr_number', 'all_jobs.interview_information_hr_email', 'all_jobs.job_address_city', 'all_jobs.job_address_state', 'all_jobs.job_address_flat_address', 'all_jobs.interview_address_city', 'all_jobs.interview_address_state', 'all_jobs.interview_address_full_address', 'all_jobs.candidate_fee_charged', 'all_jobs.candidate_fee_amount', 'all_jobs.job_address_city', 'all_jobs.job_address_city', 'all_jobs.job_address_city', 'all_jobs.job_address_city', 'all_jobs.job_address_city', 'all_jobs.job_address_city', 'all_jobs.job_address_city', 'all_jobs.job_address_city', 'all_jobs.job_address_city')
			->get();
		$total_jobs = $job_lists->count();

		return view('employers-details', compact('employer_details', 'job_locations', 'states_names', 'cities_names', 'fee_charged_reasons', 'job_lists','total_jobs'));

		//return view('employers-details');
	}

	public function edit($id) {

		$employer_details = Employer_detail::where('employer_id', $id)
			->leftJoin('states', 'states.id', '=', 'employer_details.state_id')
			->leftJoin('cities', 'cities.id', '=', 'employer_details.city_id')
			->leftJoin('company_domains', 'company_domains.id', '=', 'employer_details.company_domain_id')
			->where('employer_details.status', '1')
			->where('employer_details.is_deleted', '0')
			->select('employer_details.id', 'employer_details.employer_id', 'employer_details.company_logo', 'employer_details.company_name', 'states.name as state_name', 'cities.name as city_name', 'employer_details.email', 'employer_details.mobile_number', 'employer_details.company_phone', 'employer_details.alternate_number', 'employer_details.company_address', 'employer_details.about_company', 'company_domains.name as company_domains_name', 'employer_details.company_established_year', 'employer_details.team_member', 'employer_details.company_website', 'employer_details.state_id', 'employer_details.city_id', 'employer_details.company_domain_id', 'employer_details.company_views', 'employer_details.facebook_links', 'employer_details.twitter_links', 'employer_details.skype_links', 'employer_details.pinterest_links')
			->get();

		$wordCount = $employer_details->count();

		$states_names = States::where('status', '1')
			->where('is_deleted', '0')
			->where('countries_id', '101')
			->orderBy('name', 'ASC')
			->get();

		$cities_names = Cities::where('status', '1')
			->where('is_deleted', '0')
			->orderBy('name', 'ASC')
			->where('state_id', $employer_details[0]['state_id'])
			->get();

		$company_domains = CompanyDomain::where('status', '1')
			->where('is_deleted', '0')
			->orderBy('name', 'ASC')
			->get();

		return view('employer-edit', compact('employer_details', 'states_names', 'cities_names', 'company_domains'));

	}

	public function update(Request $request) {

		$request->validate([
			'company_name' => 'required|max:50|regex:/^[\pL\s]+$/u',
			'email' => 'required|max:50|email',
			'mobile_number' => 'required|digits:10|numeric',
			'company_phone' => 'required|max:50',
			'company_address' => 'required|max:500',
			'about_company' => 'required|max:500',
			'company_domain_id' => 'required',
			'company_established_year' => 'required|max:100',
			'team_member' => 'required|max:100',
			'company_website' => 'required|max:100',
			'state_id' => 'required',
			'city_id' => 'required',
		], [
			'company_name.required' => 'Company name is required',
			'email.required' => 'Email is required',
			'mobile_number.required' => 'Mobile number is required',
			'company_phone.required' => 'Company phone is required',
			'company_address.required' => 'Company address is required',
			'about_company.required' => 'About company is required',
			'company_domain_id.required' => 'Company domain is required',
			'company_established_year.required' => 'Company established year is required',
			'team_member.required' => 'Team member is required',
			'company_website.required' => 'Company website is required',
			'state_id.required' => 'State is required',
			'city_id.required' => 'City is required',
		]);

		//DB::enableQueryLog(); //for print sql query

		User::where('id', $request->edit_id)->update(['name' => $request->company_name, 'email' => $request->email, 'mobile_number' => $request->mobile_number]);

		Employer_detail::where('employer_id', $request->edit_id)->update(['company_name' => $request->company_name, 'email' => $request->email, 'mobile_number' => $request->mobile_number, 'company_phone' => $request->company_phone, 'company_address' => $request->company_address, 'about_company' => $request->about_company, 'company_domain_id' => $request->company_domain_id, 'company_established_year' => $request->company_established_year, 'team_member' => $request->team_member, 'company_website' => $request->company_website, 'state_id' => $request->state_id, 'city_id' => $request->city_id, 'facebook_links' => $request->facebook_links, 'twitter_links' => $request->twitter_links, 'skype_links' => $request->skype_links, 'pinterest_links' => $request->pinterest_links]);

		if ($request->company_logo) {

			$profile_filePath = $request->file('company_logo')->store('company-logos');

			$profile_pic_file_path = '/storage/app/' . $profile_filePath;

			Employer_detail::where('employer_id', $request->edit_id)->update(['company_logo' => $profile_pic_file_path]);
		}

		return redirect('/employers-details/' . $request->edit_id)->with('success', 'Company Profile updated successfully.');

	}
	
	
	public function show_all_jobs($id) {
		//dd($id);

		if(!empty(session('login_user_data')[0]['id']) && (session('login_user_data')[0]['user_type']==2)){
			
			$employer_details = Employer_detail::where('employer_id', $id)
				->leftJoin('states', 'states.id', '=', 'employer_details.state_id')
				->leftJoin('cities', 'cities.id', '=', 'employer_details.city_id')
				->leftJoin('company_domains', 'company_domains.id', '=', 'employer_details.company_domain_id')
				->where('employer_details.status', '1')
				->where('employer_details.is_deleted', '0')
				->select('employer_details.id', 'employer_details.employer_id', 'employer_details.company_logo', 'employer_details.company_name', 'states.name as state_name', 'cities.name as city_name', 'employer_details.email', 'employer_details.mobile_number', 'employer_details.company_phone', 'employer_details.alternate_number', 'employer_details.company_address', 'employer_details.about_company', 'company_domains.name as company_domains_name', 'employer_details.company_established_year', 'employer_details.team_member', 'employer_details.company_website', 'employer_details.company_views', 'employer_details.facebook_links', 'employer_details.twitter_links', 'employer_details.skype_links', 'employer_details.pinterest_links')
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

			$job_lists = AllJob::where('employer_id', $id)
				->leftJoin('states', 'states.id', '=', 'all_jobs.state_id')
				->leftJoin('cities', 'cities.id', '=', 'all_jobs.city_id')
				->leftJoin('job_categories', 'job_categories.id', '=', 'all_jobs.types_of_job_id')
				->leftJoin('working_days', 'working_days.id', '=', 'all_jobs.working_days')
				->where('all_jobs.is_deleted', '0')
				->select('all_jobs.id', 'all_jobs.employer_id', 'all_jobs.job_title', 'all_jobs.salary', 'all_jobs.no_of_opening', 'all_jobs.job_location_id', 'states.name as state_name', 'cities.name as city_name', 'job_categories.name as job_category_name', 'working_days.name as working_day_name', 'all_jobs.working_hours', 'all_jobs.experience_required', 'all_jobs.min_experience_required', 'all_jobs.max_experience_required', 'all_jobs.ctc', 'all_jobs.gender', 'all_jobs.candidate_requirements', 'all_jobs.skills', 'all_jobs.english_required', 'all_jobs.interview_information_company_name', 'all_jobs.interview_information_hr_name', 'all_jobs.interview_information_hr_number', 'all_jobs.interview_information_hr_email', 'all_jobs.job_address_city', 'all_jobs.job_address_state', 'all_jobs.job_address_flat_address', 'all_jobs.interview_address_city', 'all_jobs.interview_address_state', 'all_jobs.interview_address_full_address', 'all_jobs.candidate_fee_charged', 'all_jobs.candidate_fee_amount', 'all_jobs.job_address_city', 'all_jobs.job_address_city', 'all_jobs.job_address_city', 'all_jobs.job_address_city', 'all_jobs.job_address_city', 'all_jobs.job_address_city', 'all_jobs.job_address_city', 'all_jobs.job_address_city', 'all_jobs.job_address_city','all_jobs.status')
				->paginate(18);
			$total_jobs = $job_lists->count();

			return view('employers-jobs-list', compact('employer_details', 'job_locations', 'states_names', 'cities_names', 'fee_charged_reasons', 'job_lists','total_jobs'));
			
		} else {
			
			return redirect('/login');
			
		}
		//return view('employers-details');
	}
}
