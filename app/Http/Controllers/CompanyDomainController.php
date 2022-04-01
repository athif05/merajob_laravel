<?php

namespace App\Http\Controllers;

use App\CompanyDomain;
use Illuminate\Http\Request;

class CompanyDomainController extends Controller
{
    /*show all company_domain in a list in admin panel*/
	public function fetchCompanyDomains(Request $request) {

		$company_domains = CompanyDomain::orderBy('name', 'ASC')
			->paginate(10);

		return view('admin/manage-company-domain', compact('company_domains'));
	}
	
	/* this function is call when we update company_domain status by admin */
	public function updateCompanyDomainsStatus(Request $request) {

		$input = CompanyDomain::where('id', $request->company_domain_id)
			->update([
				'status' => $request->company_domain_status,
			]);

		return $request->company_domain_status;

	}
	
	/*here we delete company_domain from admin*/
	public function deleteCompanyDomains(Request $request) {

		$input = CompanyDomain::where('id', $request->company_domain_id)
			->update([
				'is_deleted' => $request->company_domain_del_status,
			]);

		return $request->company_domain_del_status;

	}
	
	/*here we edit company_domain from admin panel*/
	public function editCompanyDomain($id) {

		$company_domain_details = CompanyDomain::where('id', $id)
			->first();

		return view('admin/edit-company-domain', compact('company_domain_details'));

	}
	
	/*here we update company_domain*/
	public function updateCompanyDomain(Request $request) {

		$request->validate([
			'name' => 'required|max:100',
		], [
			'name.required' => 'Company Domain name is required',
		]);

		$input = CompanyDomain::where('id', $request->edit_id)
			->update([
				'name' => $request->name,
			]);

		//return back()->with('success', 'State name updated successfully...');
		return redirect('admin/manage-company-domains')->with('success', 'Company Domain name updated successfully...');

	}
	
	
	/*add a new company_domain in admin panel*/
	public function addNewCompanyDomain() {
		return view('admin/add-new-company-domain');
	}
	
	
	/*here we company_domain state*/
	public function saveNewCompanyDomain(Request $request) {

		$request->validate([
			'name' => 'required|max:100',
		], [
			'name.required' => 'Company Domain name is required',
		]);

		$input = CompanyDomain::insert([
			'name' => $request->name,
			'is_deleted' => '0',
			'status' => '1',
		]);

		return back()->with('success', 'New Company Domain name added successfully...');

	}
	
	
}
