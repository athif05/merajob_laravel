<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MainJobCategory;
use App\Employer_detail;
use App\AllJob;
use App\Cities;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{
    public function show(){
		
		$job_locations = Cities::where('status', '1')
			->where('is_deleted', '0')
			->where('country_id', '101')
			->orderBy('name', 'ASC')
			->get();
			
		$main_job_categories = MainJobCategory::select('main_job_categories.name', DB::raw('SUM(IF(job_category_id IS NULL, 0, 1)) as sum_of_job'))
			->leftJoin('all_jobs', 'all_jobs.job_category_id','=','main_job_categories.id')
			->where('main_job_categories.status', '1')
			->where('main_job_categories.is_deleted', '0')
			->orderBy('main_job_categories.name', 'ASC')
			->groupBy('main_job_categories.name')
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
			->select('all_jobs.id', 'all_jobs.employer_id', 'all_jobs.job_title', 'all_jobs.salary', 'all_jobs.no_of_opening', 'all_jobs.job_location_id', 'states.name as state_name', 'cities.name as city_name', 'job_categories.name as job_category_name', 'working_days.name as working_day_name', 'all_jobs.working_hours', 'all_jobs.experience_required', 'all_jobs.min_experience_required', 'all_jobs.max_experience_required', 'all_jobs.ctc', 'all_jobs.gender', 'all_jobs.candidate_requirements', 'all_jobs.skills', 'all_jobs.english_required', 'all_jobs.interview_information_company_name', 'all_jobs.interview_information_hr_name', 'all_jobs.interview_information_hr_number', 'all_jobs.interview_information_hr_email', 'all_jobs.job_address_city', 'all_jobs.job_address_state', 'all_jobs.job_address_flat_address', 'all_jobs.interview_address_city', 'all_jobs.interview_address_state', 'all_jobs.interview_address_full_address', 'all_jobs.candidate_fee_charged', 'all_jobs.candidate_fee_amount', 'all_jobs.job_address_city', 'all_jobs.job_address_city', 'all_jobs.job_address_city', 'all_jobs.job_address_city', 'all_jobs.job_address_city', 'all_jobs.job_address_city', 'all_jobs.job_address_city', 'all_jobs.job_address_city', 'all_jobs.job_address_city','all_jobs.created_at','all_jobs.job_description','all_jobs.job_responsibilities','all_jobs.job_requirements','main_job_categories.name as main_job_category_name','all_jobs.qualification_ids','employer_details.company_logo','employer_details.company_name')
			->limit(6)
			->get();
			$total_no_of_jobs = $job_lists->count();
			
		return view('employee', compact('main_job_categories','job_lists','job_locations','total_no_of_jobs'));
	}
	
	
}
