<?php

namespace App\Http\Controllers;

use App\Contactus;
use Illuminate\Http\Request;

class ContactusController extends Controller
{
	//show about us page in fron end
	public function index() {

		$contactus_details = Contactus::first();

		return view('contact', compact('contactus_details'));
	}

    /*show contact us details in admin panel*/
	public function fetch(Request $request) {

		$contactus_details = Contactus::first();

		return view('admin/manage-contactus', compact('contactus_details'));
	}


	/*here we update contact us*/
	public function update(Request $request) {

		$request->validate([
			'email1' => 'required|max:100',
			'contact_number1' => 'required|max:20',
			'address_line1' => 'required',
			'google_map' => 'required',
		], [
			'email1.required' => 'Email 1 is required',
			'contact_number1.required' => 'Contact Number 1 is required',
			'address_line1.required' => 'Address Line 1 is required',
			'google_map.required' => 'Google Map is required',
		]);

		$input = Contactus::where('id', $request->edit_id)
			->update([
				'email1' => $request->email1,
				'email2' => $request->email2,
				'contact_number1' => $request->contact_number1,
				'contact_number2' => $request->contact_number2,
				'address_line1' => $request->address_line1,
				'address_line2' => $request->address_line2,
				'google_map' => $request->google_map,
			]);


		//return back()->with('success', 'State name updated successfully...');
		return redirect('admin/contact-us')->with('success', 'Contact-Us updated successfully...');

	}


}
