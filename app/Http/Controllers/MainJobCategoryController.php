<?php

namespace App\Http\Controllers;

use App\MainJobCategory;
use Illuminate\Http\Request;

class MainJobCategoryController extends Controller
{
    /*show all job domain in a list in admin panel*/
	public function fetch(Request $request) {

		$main_job_categories = MainJobCategory::orderBy('name', 'ASC')
			->paginate(10);

		return view('admin/manage-main-job-domain', compact('main_job_categories'));
	}


	/* this function is call when we update job domain status by admin */
	public function updateStatus(Request $request) {

		$input = MainJobCategory::where('id', $request->category_id)
			->update([
				'status' => $request->category_status,
			]);

		return $request->category_status;

	}


	/*here we delete job domain from admin*/
	public function deleteDomain(Request $request) {

		$input = MainJobCategory::where('id', $request->category_id)
			->update([
				'is_deleted' => $request->category_del_status,
			]);

		return $request->category_del_status;

	}


	/*here we edit job domain from admin panel*/
	public function editDomain($id) {

		$main_job_category_details = MainJobCategory::where('id', $id)
			->first();

		return view('admin/edit-main-job-domain', compact('main_job_category_details'));

	}


	/*here we update job domain*/
	public function updateDomain(Request $request) {

		$request->validate([
			'name' => 'required|max:100',
		], [
			'name.required' => 'Domain name is required',
		]);

		$input = MainJobCategory::where('id', $request->edit_id)
			->update([
				'name' => $request->name,
			]);

		//return back()->with('success', 'State name updated successfully...');
		return redirect('admin/manage-job-domains')->with('success', 'Job domain name updated successfully...');

	}


	/*add a new job domain in admin panel*/
	public function addNewDomain() {
		return view('admin/add-new-main-job-domain');
	}


	/*here we save job domain state*/
	public function saveNewDomain(Request $request) {

		$request->validate([
			'name' => 'required|max:100',
		], [
			'name.required' => 'Domain name is required',
		]);

		$input = MainJobCategory::insert([
			'name' => $request->name,
			'is_deleted' => '0',
			'status' => '1',
		]);

		return back()->with('success', 'New Domain name added successfully...');
		//return redirect('admin/states')->with('success', 'State name updated successfully...');

	}

}
