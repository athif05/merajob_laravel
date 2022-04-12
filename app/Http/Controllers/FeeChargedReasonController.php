<?php

namespace App\Http\Controllers;

use App\FeeChargedReason;
use Illuminate\Http\Request;

class FeeChargedReasonController extends Controller
{
    /*show all Fee Charged Reason in a list in admin panel*/
	public function fetch(Request $request) {

		$feeCharges = FeeChargedReason::orderBy('name', 'ASC')
			->paginate(10);

		return view('admin/manage-fee-charge-reasons', compact('feeCharges'));
	}
	
	/* this function is call when we update Fee Charged Reason status by admin */
	public function updateStatus(Request $request) {

		$input = FeeChargedReason::where('id', $request->feeCharge_id)
			->update([
				'status' => $request->feeCharge_status,
			]);

		return $request->feeCharge_status;

	}
	
	/*here we delete Fee Charged Reason from admin*/
	public function deleteFeeChargeReason(Request $request) {

		$input = FeeChargedReason::where('id', $request->feeCharge_id)
			->update([
				'is_deleted' => $request->feeCharge_del_status,
			]);

		return $request->feeCharge_del_status;

	}
	
	
	/*here we edit Fee Charged Reason from admin panel*/
	public function editFeeChargeReason($id) {

		$feeChargeReason_details = FeeChargedReason::where('id', $id)
			->first();

		return view('admin/edit-fee-charge-reason', compact('feeChargeReason_details'));

	}
	
	
	/*here we update Fee Charged Reason*/
	public function updateFeeChargeReason(Request $request) {

		$request->validate([
			'name' => 'required|max:100',
		], [
			'name.required' => 'Fee Charged Reason is required',
		]);

		$input = FeeChargedReason::where('id', $request->edit_id)
			->update([
				'name' => $request->name,
			]);

		//return back()->with('success', 'State name updated successfully...');
		return redirect('admin/manage-fee-charge-reasons')->with('success', 'Fee Charged Reason updated successfully...');

	}
	
	
	/*add a new Fee Charged Reason in admin panel*/
	public function addNewFeeChargeReason() {
		return view('admin/add-new-fee-charge-reason');
	}
	
	/*here we Fee Charged Reason state*/
	public function saveNewFeeChargeReason(Request $request) {

		$request->validate([
			'name' => 'required|max:100',
		], [
			'name.required' => 'Fee Charged Reason is required',
		]);

		$input = FeeChargedReason::insert([
			'name' => $request->name,
			'is_deleted' => '0',
			'status' => '1',
		]);

		return back()->with('success', 'Fee Charged Reason added successfully...');
		//return redirect('admin/states')->with('success', 'State name updated successfully...');

	}
}
