<style>
.active{
    color: rgb(255, 115, 5) !important;
}
</style>
<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main</span>
							</li>
							<li> 
								<a href="./"><i class="la la-dashboard" class="{{ request()->is("./") || request()->is("./") ? "mm active" : "" }}"></i> <span> Dashboard</span> </a>
						    </li>

                            {{-- <li>
                            <a href="clients.html"><i class="la la-users"></i> <span>Clients</span></a>
                        </li> --}}
						
							<li class="menu-title"> 
								<span>Task Manager</span>
							</li>
							<li>
								<a href="{{route('tasks')}}" class="noti-dot {{ request()->is("tasks") || request()->is("/tasks/*") ? "mm active" : "" }}"><i class="las la-tasks"></i> <span> All Tasks</span> </a>
							</li>
							
			
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->