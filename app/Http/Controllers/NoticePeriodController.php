<?php

namespace App\Http\Controllers;

use App\NoticePeriod;
use Illuminate\Http\Request;

class NoticePeriodController extends Controller
{
    /*show all qualification in a list in admin panel*/
	public function fetch(Request $request) {

		$noticePeriods = NoticePeriod::orderBy('name', 'ASC')
			->paginate(10);

		return view('admin/manage-notice-periods', compact('noticePeriods'));
	}
	
	/* this function is call when we update Notice Period status by admin */
	public function updateStatus(Request $request) {

		$input = NoticePeriod::where('id', $request->noticePeriod_id)
			->update([
				'status' => $request->noticePeriod_status,
			]);

		return $request->noticePeriod_status;

	}
	
	/*here we delete Notice Period from admin*/
	public function deleteNoticePeriod(Request $request) {

		$input = NoticePeriod::where('id', $request->noticePeriod_id)
			->update([
				'is_deleted' => $request->noticePeriod_del_status,
			]);

		return $request->noticePeriod_del_status;

	}
	
	
	/*here we edit Notice Period from admin panel*/
	public function editNoticePeriod($id) {

		$noticePeriod_details = NoticePeriod::where('id', $id)
			->first();

		return view('admin/edit-notice-period', compact('noticePeriod_details'));

	}
	
	
	/*here we update Notice Period*/
	public function updateNoticePeriod(Request $request) {

		$request->validate([
			'name' => 'required|max:100',
		], [
			'name.required' => 'Notice Period name is required',
		]);

		$input = NoticePeriod::where('id', $request->edit_id)
			->update([
				'name' => $request->name,
			]);

		//return back()->with('success', 'State name updated successfully...');
		return redirect('admin/manage-notice-periods')->with('success', 'Notice Period name updated successfully...');

	}
	
	
	/*add a new Notice Period in admin panel*/
	public function addNewNoticePeriod() {
		return view('admin/add-new-notice-period');
	}
	
	/*here we Notice Period state*/
	public function saveNewNoticePeriod(Request $request) {

		$request->validate([
			'name' => 'required|max:100',
		], [
			'name.required' => 'Notice Period name is required',
		]);

		$input = NoticePeriod::insert([
			'name' => $request->name,
			'is_deleted' => '0',
			'status' => '1',
		]);

		return back()->with('success', 'Notice Period name added successfully...');
		//return redirect('admin/states')->with('success', 'State name updated successfully...');

	}
}
