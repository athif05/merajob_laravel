<?php

namespace App\Http\Controllers;

use App\Author;
use App\BlogCategory;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /*show all Blog Author in a list in admin panel*/
	public function fetch(Request $request) {

		$authors = Author::orderBy('authors.name', 'ASC')
			->leftJoin('blog_categories', 'blog_categories.id', '=', 'authors.blog_category_id')
			->select('authors.id as id', 'authors.name', 'authors.email', 'authors.mobile_number', 'authors.alternate_number', 'authors.status', 'authors.is_deleted', 'authors.address', 'blog_categories.name as blog_categories_name')
			->paginate(10);

		return view('admin/manage-blog-authors', compact('authors'));
	}

	/*here we edit Blog Author from admin panel*/
	public function editAuthor($id) {

		$author_details = Author::where('id', $id)
			->first();

		$blogCategories = BlogCategory::where('is_deleted', '0')
			->where('status', '1')
			->orderBy('name', 'ASC')
			->get();

		return view('admin/edit-blog-author', compact('author_details','blogCategories'));

	}


	/*here we update Blog Author*/
	public function updateAuthor(Request $request) {

		$request->validate([
			'blog_category_id' => 'required',
			'name' => 'required|max:100',
			'email' => 'required|max:50|email',
			'mobile_number' => 'required|digits:10|numeric',
			'address' => 'required|max:100',
		], [
			'blog_category_id.required' => 'Blog category name is required',
			'name.required' => 'Author name is required',
			'email.required' => 'Email is required',
			'mobile_number.required' => 'Mobile number is required',
			'address.required' => 'Address is required',
		]);

		$input = Author::where('id', $request->edit_id)
			->update([
				'blog_category_id' => $request->blog_category_id,
				'name' => $request->name,
				'email' => $request->email,
				'mobile_number' => $request->mobile_number,
				'alternate_number' => $request->alternate_number,
				'address' => $request->address,
			]);

		//return back()->with('success', 'State name updated successfully...');
		return redirect('admin/manage-blog-authors')->with('success', 'Author name updated successfully...');

	}


	/* this function is call when we update Blog Author status by admin */
	public function updateStatus(Request $request) {

		$input = Author::where('id', $request->author_id)
			->update([
				'status' => $request->author_status,
			]);

		return $request->author_status;

	}


	/*here we delete Blog Author from admin*/
	public function deleteAuthor(Request $request) {

		$input = Author::where('id', $request->author_id)
			->update([
				'is_deleted' => $request->author_del_status,
			]);

		return $request->author_del_status;

	}


	/*add a new Blog Author in admin panel*/
	public function addNewAuthor() {

		$blogCategories = BlogCategory::where('is_deleted', '0')
			->where('status', '1')
			->orderBy('name', 'ASC')
			->get();

		return view('admin/add-new-blog-author', compact('blogCategories'));
	}


	/*here we Blog Author state*/
	public function saveNewAuthor(Request $request) {

		$request->validate([
			'blog_category_id' => 'required',
			'name' => 'required|max:100',
			'email' => 'required|max:50|email',
			'mobile_number' => 'required|digits:10|numeric',
			'address' => 'required|max:100',
		], [
			'blog_category_id.required' => 'Blog category name is required',
			'name.required' => 'Author name is required',
			'email.required' => 'Email is required',
			'mobile_number.required' => 'Mobile number is required',
			'address.required' => 'Address is required',
		]);

		$input = Author::insert([
			'blog_category_id' => $request->blog_category_id,
			'name' => $request->name,
			'email' => $request->email,
			'mobile_number' => $request->mobile_number,
			'alternate_number' => $request->alternate_number,
			'address' => $request->address,
			'is_deleted' => '0',
			'status' => '1',
		]);

		return back()->with('success', 'Author name added successfully...');
		//return redirect('admin/states')->with('success', 'State name updated successfully...');

	}
}
