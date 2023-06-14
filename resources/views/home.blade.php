
@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('assets/css/tasks.css') }}">
	<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid pt-5 ml-4">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="welcome-box">
								<div class="welcome-img">
									<img alt="" src="assets/img/profiles/avatar-02.png">
								</div>
								<div class="welcome-det">
									<h3>Welcome {{ $user }}</h3>
                                   
									<p>{{ $weekday }}, {{ $date }}</p>
								</div>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-lg-8 col-md-8">
							<section class="dash-section">
								<h1 class="dash-sec-title">RECENT ACTIVITIES</h1>
								<div class="dash-sec-content">						

                                    @foreach ($tasks as $task)
                                    @php
                                        $id=$task->user_id;
                                        $users= DB::table('users')                                                
                                            ->where('users.id', $id)
                                            ->get();
                                        @endphp
									<div class="dash-info-list">
										<a href="#" class="dash-card">
											<div class="dash-card-container">
												<div class="dash-card-icon">
													<i class="las la-tasks text-success"></i>
												</div>
												<div class="dash-card-content">
													<p> @foreach ($users as $user)
                                                            {{ $user->name }}
                                                        @endforeach added a new task today </p></br>
												</div>
                                                
												<div class="dash-card-avatars">
													<div class="e-avatar">
                                                    <img src="assets/img/profiles/avatar-02.png" alt="">
                                                    </div>
												</div>

											</div>
                                            <p class="text-muted text-red"> Title: <small>{{ $task->title }}</small></p>
										</a>
									</div>
                                 @endforeach
								

								</div>
							</section>
				
							
						</div>

						<div class="col-lg-4 col-md-4">
							<div class="dash-sidebar">
								<section>
									<h5 class="dash-title">Statistics</h5>
									<div class="card">
										<div class="card-body">
											<div class="time-list">
												<div class="dash-stats-list">
													<h4>{{ $totalcount }}</h4>
													<p>Total Tasks</p>
												</div>
												<div class="dash-stats-list">
													<h4>{{ $pendingcount }}</h4>
													<p>Pending Tasks</p>
												</div>
                                                <div class="dash-stats-list">
													<h4>{{ $progresscount }}</h4>
													<p>In Progress</p>
												</div>
											</div>
                                            
											<div class="request-btn">
												<div class="dash-stats-list">
													<h4>{{ $completedcount }}</h4>
													<p>Completed</p>
												</div>
											</div>
										</div>
									</div>
								</section>								
								
								<section>
									<h5 class="dash-title">Upcoming Tasks</h5>
									<div class="card">
										<div class="card-body">
											<div class="time-list">
												<div class="dash-stats-list">
													<h4>{{ $reviewcount }}</h4>
													<p>In Review</p>
												</div>
												<div class="dash-stats-list">
													<h4>{{ $duecount }}</h4>
													<p>Overdue</p>
												</div>
                                                
											</div>
                                            
											<div class="request-btn">
												<div class="dash-stats-list">
													<h4>{{ $reviewcount + $duecount }}</h4>
													<p>Total</p>
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
						</div>
						
					</div>

				

				</div>
				<!-- /Page Content -->

            </div>
			<!-- /Page Wrapper -->
@endsection