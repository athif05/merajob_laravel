<?php

namespace App\Http\Controllers;

use App\Qualification;
use Illuminate\Http\Request;

class QualificationController extends Controller
{
    /*show all qualification in a list in admin panel*/
	public function fetchQualification(Request $request) {

		$qualifications = Qualification::orderBy('name', 'ASC')
			->paginate(10);

		return view('admin/manage-qualification', compact('qualifications'));
	}
	
	/* this function is call when we update qualification status by admin */
	public function updateQualificationStatus(Request $request) {

		$input = Qualification::where('id', $request->qualification_id)
			->update([
				'status' => $request->qualification_status,
			]);

		return $request->qualification_status;

	}
	
	/*here we delete qualification from admin*/
	public function deleteQualification(Request $request) {

		$input = Qualification::where('id', $request->qualification_id)
			->update([
				'is_deleted' => $request->qualification_del_status,
			]);

		return $request->qualification_del_status;

	}
	
	
	/*here we edit qualification from admin panel*/
	public function editQualification($id) {

		$qualification_details = Qualification::where('id', $id)
			->first();

		return view('admin/edit-qualification', compact('qualification_details'));

	}
	
	
	/*here we update qualification*/
	public function updateQualification(Request $request) {

		$request->validate([
			'name' => 'required|max:100',
		], [
			'name.required' => 'Qualification name is required',
		]);

		$input = Qualification::where('id', $request->edit_id)
			->update([
				'name' => $request->name,
			]);

		//return back()->with('success', 'State name updated successfully...');
		return redirect('admin/manage-qualifications')->with('success', 'Qualification name updated successfully...');

	}
	
	
	/*add a new qualification in admin panel*/
	public function addNewQualification() {
		return view('admin/add-new-qualification');
	}
	
	/*here we qualification state*/
	public function saveNewQualification(Request $request) {

		$request->validate([
			'name' => 'required|max:100',
		], [
			'name.required' => 'Qualification name is required',
		]);

		$input = Qualification::insert([
			'name' => $request->name,
			'is_deleted' => '0',
			'status' => '1',
		]);

		return back()->with('success', 'New Qualification name added successfully...');
		//return redirect('admin/states')->with('success', 'State name updated successfully...');

	}
	
	
}
