<?php

namespace App\Http\Controllers;

use App\WorkExperience;
use Illuminate\Http\Request;

class WorkExperienceController extends Controller
{
    /*show all Work Experience in a list in admin panel*/
	public function fetch(Request $request) {

		$workingExperiences = WorkExperience::orderBy('name', 'ASC')
			->paginate(10);

		return view('admin/manage-work-experience', compact('workingExperiences'));
	}
	
	/* this function is call when we update Work Experience status by admin */
	public function updateStatus(Request $request) {

		$input = WorkExperience::where('id', $request->workingExperience_id)
			->update([
				'status' => $request->workingExperience_status,
			]);

		return $request->workingExperience_status;

	}
	
	/*here we delete Work Experience from admin*/
	public function deleteWorkingExperiance(Request $request) {

		$input = WorkExperience::where('id', $request->workingExperience_id)
			->update([
				'is_deleted' => $request->workingExperience_del_status,
			]);

		return $request->workingExperience_del_status;

	}
	
	
	/*here we edit Work Experience from admin panel*/
	public function editWorkingExperiance($id) {

		$workingExperiance_details = WorkExperience::where('id', $id)
			->first();

		return view('admin/edit-working-experiance', compact('workingExperiance_details'));

	}
	
	
	/*here we update Work Experience*/
	public function updateWorkingExperiance(Request $request) {

		$request->validate([
			'name' => 'required|max:100',
		], [
			'name.required' => 'Work Experience is required',
		]);

		$input = WorkExperience::where('id', $request->edit_id)
			->update([
				'name' => $request->name,
			]);

		//return back()->with('success', 'State name updated successfully...');
		return redirect('admin/manage-work-experiance')->with('success', 'Work Experience updated successfully...');

	}
	
	
	/*add a new Work Experience in admin panel*/
	public function addNewWorkingExperiance() {
		return view('admin/add-new-work-experiance');
	}
	
	/*here we Work Experience state*/
	public function saveNewWorkingExperiance(Request $request) {

		$request->validate([
			'name' => 'required|max:100',
		], [
			'name.required' => 'Work Experience is required',
		]);

		$input = WorkExperience::insert([
			'name' => $request->name,
			'is_deleted' => '0',
			'status' => '1',
		]);

		return back()->with('success', 'Work Experience added successfully...');
		//return redirect('admin/states')->with('success', 'State name updated successfully...');

	}
}
