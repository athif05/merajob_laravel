<?php

namespace App\Http\Controllers;

use App\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    /*show all Blog Category in a list in admin panel*/
	public function fetch(Request $request) {

		$blogCategories = BlogCategory::orderBy('name', 'ASC')
			->paginate(10);

		return view('admin/manage-blog-categories', compact('blogCategories'));
	}

	/*here we edit Blog Category from admin panel*/
	public function editBlogCategory($id) {

		$blogCategory_details = BlogCategory::where('id', $id)
			->first();

		return view('admin/edit-blog-category', compact('blogCategory_details'));

	}


	/*here we update Blog Category*/
	public function updateBlogCategory(Request $request) {

		$request->validate([
			'name' => 'required|max:100',
		], [
			'name.required' => 'Blog Category name is required',
		]);

		$input = BlogCategory::where('id', $request->edit_id)
			->update([
				'name' => $request->name,
			]);

		//return back()->with('success', 'State name updated successfully...');
		return redirect('admin/manage-blog-categories')->with('success', 'Blog Category name updated successfully...');

	}


	/* this function is call when we update Blog Category status by admin */
	public function updateStatus(Request $request) {

		$input = BlogCategory::where('id', $request->blogCategorie_id)
			->update([
				'status' => $request->blogCategorie_status,
			]);

		return $request->blogCategorie_status;

	}


	/*here we delete Blog Category from admin*/
	public function deleteBlogCategory(Request $request) {

		$input = BlogCategory::where('id', $request->blogCategorie_id)
			->update([
				'is_deleted' => $request->blogCategorie_del_status,
			]);

		return $request->blogCategorie_del_status;

	}


	/*add a new Blog Category in admin panel*/
	public function addNewBlogCategory() {
		return view('admin/add-new-blog-category');
	}


	/*here we Blog Category state*/
	public function saveNewBlogCategory(Request $request) {

		$request->validate([
			'name' => 'required|max:100',
		], [
			'name.required' => 'Blog Category name is required',
		]);

		$input = BlogCategory::insert([
			'name' => $request->name,
			'is_deleted' => '0',
			'status' => '1',
		]);

		return back()->with('success', 'Blog Category name added successfully...');
		//return redirect('admin/states')->with('success', 'State name updated successfully...');

	}

}
