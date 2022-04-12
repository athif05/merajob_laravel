<?php

namespace App\Http\Controllers;

use App\WorkingDay;
use Illuminate\Http\Request;

class WorkingDayController extends Controller
{
    /*show all Working Day in a list in admin panel*/
	public function fetch(Request $request) {

		$workingDays = WorkingDay::orderBy('name', 'ASC')
			->paginate(10);

		return view('admin/manage-working-days', compact('workingDays'));
	}
	
	/* this function is call when we update Working Day status by admin */
	public function updateStatus(Request $request) {

		$input = WorkingDay::where('id', $request->workingDay_id)
			->update([
				'status' => $request->workingDay_status,
			]);

		return $request->workingDay_status;

	}
	
	/*here we delete Working Day from admin*/
	public function deleteWorkingDay(Request $request) {

		$input = WorkingDay::where('id', $request->workingDay_id)
			->update([
				'is_deleted' => $request->workingDay_del_status,
			]);

		return $request->workingDay_del_status;

	}
	
	
	/*here we edit Working Day from admin panel*/
	public function editWorkingDay($id) {

		$workingDay_details = WorkingDay::where('id', $id)
			->first();

		return view('admin/edit-working-day', compact('workingDay_details'));

	}
	
	
	/*here we update Working Day*/
	public function updateWorkingDay(Request $request) {

		$request->validate([
			'name' => 'required|max:100',
		], [
			'name.required' => 'Working Day is required',
		]);

		$input = WorkingDay::where('id', $request->edit_id)
			->update([
				'name' => $request->name,
			]);

		//return back()->with('success', 'State name updated successfully...');
		return redirect('admin/manage-working-days')->with('success', 'Working Day updated successfully...');

	}
	
	
	/*add a new Working Day in admin panel*/
	public function addNewWorkingDay() {
		return view('admin/add-new-working-day');
	}
	
	/*here we Working Day state*/
	public function saveNewWorkingDay(Request $request) {

		$request->validate([
			'name' => 'required|max:100',
		], [
			'name.required' => 'Working Day is required',
		]);

		$input = WorkingDay::insert([
			'name' => $request->name,
			'is_deleted' => '0',
			'status' => '1',
		]);

		return back()->with('success', 'Working Day added successfully...');
		//return redirect('admin/states')->with('success', 'State name updated successfully...');

	}
}
