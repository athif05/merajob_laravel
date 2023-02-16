<!-- partial:partials/_settings-panel.html, start here -->
<div class="theme-setting-wrapper">
	<div id="settings-trigger"><i class="typcn typcn-cog-outline"></i></div>
	<div id="theme-settings" class="settings-panel">
	  <i class="settings-close typcn typcn-times"></i>
	  <p class="settings-heading">SIDEBAR SKINS</p>
	  <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
	  <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
	  <p class="settings-heading mt-2">HEADER SKINS</p>
	  <div class="color-tiles mx-0 px-4">
		<div class="tiles success"></div>
		<div class="tiles warning"></div>
		<div class="tiles danger"></div>
		<div class="tiles info"></div>
		<div class="tiles dark"></div>
		<div class="tiles default"></div>
	  </div>
	</div>
</div>
<!-- partial:partials/_settings-panel.html, end here -->			
			
			
			<div id="right-sidebar" class="settings-panel">
				<i class="settings-close typcn typcn-times"></i>
				<ul class="nav nav-tabs" id="setting-panel" role="tablist">
				  <li class="nav-item">
					<a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
				  </li>
				</ul>
				<div class="tab-content" id="setting-content">
				  <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
					<div class="add-items d-flex px-3 mb-0">
					  <form class="form w-100">
						<div class="form-group d-flex">
						  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
						  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
						</div>
					  </form>
					</div>
					<div class="list-wrapper px-3">
					  <ul class="d-flex flex-column-reverse todo-list">
						<li>
						  <div class="form-check">
							<label class="form-check-label">
							  <input class="checkbox" type="checkbox">
							  Team review meeting at 3.00 PM
							</label>
						  </div>
						  <i class="remove typcn typcn-delete-outline"></i>
						</li>
						<li>
						  <div class="form-check">
							<label class="form-check-label">
							  <input class="checkbox" type="checkbox">
							  Prepare for presentation
							</label>
						  </div>
						  <i class="remove typcn typcn-delete-outline"></i>
						</li>
						<li>
						  <div class="form-check">
							<label class="form-check-label">
							  <input class="checkbox" type="checkbox">
							  Resolve all the low priority tickets due today
							</label>
						  </div>
						  <i class="remove typcn typcn-delete-outline"></i>
						</li>
						<li class="completed">
						  <div class="form-check">
							<label class="form-check-label">
							  <input class="checkbox" type="checkbox" checked>
							  Schedule meeting for next week
							</label>
						  </div>
						  <i class="remove typcn typcn-delete-outline"></i>
						</li>
						<li class="completed">
						  <div class="form-check">
							<label class="form-check-label">
							  <input class="checkbox" type="checkbox" checked>
							  Project review
							</label>
						  </div>
						  <i class="remove typcn typcn-delete-outline"></i>
						</li>
					  </ul>
					</div>
					<div class="events py-4 border-bottom px-3">
					  <div class="wrapper d-flex mb-2">
						<i class="typcn typcn-media-record-outline text-primary mr-2"></i>
						<span>Feb 11 2018</span>
					  </div>
					  <p class="mb-0 font-weight-thin text-gray">Creating component page</p>
					  <p class="text-gray mb-0">build a js based app</p>
					</div>
					<div class="events pt-4 px-3">
					  <div class="wrapper d-flex mb-2">
						<i class="typcn typcn-media-record-outline text-primary mr-2"></i>
						<span>Feb 7 2018</span>
					  </div>
					  <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
					  <p class="text-gray mb-0 ">Call Sarah Graves</p>
					</div>
				  </div>
				  <!-- To do section tab ends -->
				  <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
					<div class="d-flex align-items-center justify-content-between border-bottom">
					  <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
					  <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
					</div>
					<ul class="chat-list">
					  <li class="list active">
						<div class="profile"><img src="{{ asset('../resources/views/admin/images/faces/face1.jpg')}}" alt="image"><span class="online"></span></div>
						<div class="info">
						  <p>Thomas Douglas</p>
						  <p>Available</p>
						</div>
						<small class="text-muted my-auto">19 min</small>
					  </li>
					  <li class="list">
						<div class="profile"><img src="{{ asset('../resources/views/admin/images/faces/face2.jpg')}}" alt="image"><span class="offline"></span></div>
						<div class="info">
						  <div class="wrapper d-flex">
							<p>Catherine</p>
						  </div>
						  <p>Away</p>
						</div>
						<div class="badge badge-success badge-pill my-auto mx-2">4</div>
						<small class="text-muted my-auto">23 min</small>
					  </li>
					  <li class="list">
						<div class="profile"><img src="{{ asset('../resources/views/admin/images/faces/face3.jpg')}}" alt="image"><span class="online"></span></div>
						<div class="info">
						  <p>Daniel Russell</p>
						  <p>Available</p>
						</div>
						<small class="text-muted my-auto">14 min</small>
					  </li>
					  <li class="list">
						<div class="profile"><img src="{{ asset('../resources/views/admin/images/faces/face4.jpg')}}" alt="image"><span class="offline"></span></div>
						<div class="info">
						  <p>James Richardson</p>
						  <p>Away</p>
						</div>
						<small class="text-muted my-auto">2 min</small>
					  </li>
					  <li class="list">
						<div class="profile"><img src="{{ asset('../resources/views/admin/images/faces/face5.jpg')}}" alt="image"><span class="online"></span></div>
						<div class="info">
						  <p>Madeline Kennedy</p>
						  <p>Available</p>
						</div>
						<small class="text-muted my-auto">5 min</small>
					  </li>
					  <li class="list">
						<div class="profile"><img src="{{ asset('../resources/views/admin/images/faces/face6.jpg')}}" alt="image"><span class="online"></span></div>
						<div class="info">
						  <p>Sarah Graves</p>
						  <p>Available</p>
						</div>
						<small class="text-muted my-auto">47 min</small>
					  </li>
					</ul>
				  </div>
				  <!-- chat tab ends -->
				</div>
				</div>
			  <!-- partial -->

<!-- partial:partials/_sidebar.html, start here -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
	<ul class="nav">
	  <li class="nav-item">
		<a class="nav-link" href="{{ url('/admin/dashboard') }}">
		  <i class="typcn typcn-device-desktop menu-icon"></i>
		  <span class="menu-title">Dashboard</span>
		  <!--<div class="badge badge-danger">new</div>-->
		</a>
	  </li>
	  
	  <!-- <li class="nav-item">
		<a class="nav-link" href="{{ url('/admin/all-applied-jobs') }}">
		  <i class="typcn typcn-document-text menu-icon"></i>
		  <span class="menu-title">All Applied Jobs</span>
		</a>
	  </li> -->
	  
	  <!-- <li class="nav-item">
		<a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
		  <i class="typcn typcn-document-text menu-icon"></i>
		  <span class="menu-title">Manage Employes</span>
		  <i class="menu-arrow"></i>
		</a>
		<div class="collapse" id="ui-basic">
		  <ul class="nav flex-column sub-menu">
			<li class="nav-item"> <a class="nav-link" href="{{ url('/admin/employes-list') }}">Employes List</a></li>
			<li class="nav-item"> <a class="nav-link" href="{{ url('/admin/manage-qualifications') }}">Qualifications</a></li>
		  </ul>
		</div>
	  </li> -->
	  
	  
	  <li class="nav-item">
		<a class="nav-link" href="{{ url('/admin/blog-lists') }}">
		  <i class="typcn typcn-book menu-icon"></i>
		  <span class="menu-title">Blog List</span>
		</a>
	  </li>

	  <li class="nav-item">
		<a class="nav-link" href="{{ url('/admin/manage-blog-categories') }}">
		  <i class="typcn typcn-cog menu-icon"></i>
		  <span class="menu-title">Blog Category</span>
		</a>
	  </li>

	  <li class="nav-item">
		<a class="nav-link" href="{{ url('/admin/manage-blog-authors') }}">
		  <i class="typcn typcn-pen menu-icon"></i>
		  <span class="menu-title">Blog Author</span>
		</a>
	  </li>

	  <li class="nav-item">
		<a class="nav-link" href="{{ url('/admin/about-us') }}">
		  <i class="typcn typcn-home menu-icon"></i>
		  <span class="menu-title">About Us</span>
		</a>
	  </li>

	  <li class="nav-item">
		<a class="nav-link" href="{{ url('/admin/contact-us') }}">
		  <i class="typcn typcn-mail menu-icon"></i>
		  <span class="menu-title">Contact Us</span>
		</a>
	  </li>

	  <li class="nav-item">
		<a class="nav-link" href="{{ url('/admin/contact-us-emails') }}">
		  <i class="typcn typcn-document-text menu-icon"></i>
		  <span class="menu-title">Contact Message</span>
		</a>
	  </li>
	  
	  @if(session('login_user_data')[0]['role_id']==1)
	  <li class="nav-item">
		<a class="nav-link" data-toggle="collapse" href="#form-user" aria-expanded="false" aria-controls="form-user">
		  <i class="typcn typcn-film menu-icon"></i>
		  <span class="menu-title">Admin Users</span>
		  <i class="menu-arrow"></i>
		</a>
		<div class="collapse" id="form-user">
		  <ul class="nav flex-column sub-menu">
			<li class="nav-item"><a class="nav-link" href="{{ url('/admin/manage-role') }}">Manage Role</a></li>
			<li class="nav-item"><a class="nav-link" href="{{ url('/admin/manage-admin-account') }}">Manage Account</a></li>
		  </ul>
		</div>
	  </li>
	  @endif	  
	  
	</ul>
</nav>
<!-- partial:partials/_sidebar.html, end here -->