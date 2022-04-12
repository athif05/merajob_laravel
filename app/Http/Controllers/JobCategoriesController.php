<?php

namespace App\Http\Controllers;

use App\JobCategories;
use Illuminate\Http\Request;

class JobCategoriesController extends Controller
{
    
    /*show all job category in a list in admin panel*/
	public function fetch(Request $request) {

		$categories = JobCategories::orderBy('name', 'ASC')
			->paginate(10);

		return view('admin/manage-job-categories', compact('categories'));
	}

	/*here we edit job category from admin panel*/
	public function editCategory($id) {

		$jobCategories_details = JobCategories::where('id', $id)
			->first();

		return view('admin/edit-job-category', compact('jobCategories_details'));

	}

	/*here we update job category*/
	public function updateCategory(Request $request) {

		$request->validate([
			'name' => 'required|max:100',
		], [
			'name.required' => 'Job Category name is required',
		]);

		$input = JobCategories::where('id', $request->edit_id)
			->update([
				'name' => $request->name,
			]);

		//return back()->with('success', 'State name updated successfully...');
		return redirect('admin/manage-job-categories')->with('success', 'Job Category name updated successfully...');

	}


	/*add a new job category in admin panel*/
	public function addNewCategory() {
		return view('admin/add-new-job-category');
	}


	/*here we job category state*/
	public function saveNewCategory(Request $request) {

		$request->validate([
			'name' => 'required|max:100',
		], [
			'name.required' => 'Job Category name is required',
		]);

		$input = JobCategories::insert([
			'name' => $request->name,
			'is_deleted' => '0',
			'status' => '1',
		]);

		return back()->with('success', 'New Job Category name added successfully...');
		//return redirect('admin/states')->with('success', 'State name updated successfully...');

	}
	


	/* this function is call when we update job category status by admin */
	public function updateStatus(Request $request) {

		$input = JobCategories::where('id', $request->categorie_id)
			->update([
				'status' => $request->categorie_status,
			]);

		return $request->categorie_status;

	}

	/*here we delete job category from admin*/
	public function deleteJobCategory(Request $request) {

		$input = JobCategories::where('id', $request->categorie_id)
			->update([
				'is_deleted' => $request->categorie_del_status,
			]);

		return $request->categorie_del_status;

	}

}
