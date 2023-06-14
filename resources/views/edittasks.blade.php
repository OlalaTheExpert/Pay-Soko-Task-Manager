@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('assets/css/tasks.css') }}">
	<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('tasks')}}">Tasks</a></li>
									<li class="breadcrumb-item active">Edit</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<!-- Row -->
					<div class="row">
						<div class="col-sm-12">
						
            <!-- Custom Boostrap Validation -->
            <div class="card">							
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm">
                         <form class="needs-validation" novalidate="" method="POST" action="{{ route('taskupdate', $tasks->id) }}">
                                @csrf
                                @method('PUT')
                          
                                <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Title<span class="text-danger">*</span></label>
                                <input class="form-control" name="title" type="text" value="{{ $tasks->title }}">
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Due Date<span class="text-danger">*</span></label>
                                <input class="form-control" name="due_date" value="{{ $tasks->due_date }}" type="date" min="@php echo Date("Y-m-d"); @endphp">
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                        <label class="col-form-label">Task Description<span class="text-danger">*</span></label>
                        
                            <textarea id="editor" name="description" required>{{ $tasks->description }} </textarea>
                        </div>   
                    <div class="table-responsive m-t-15">
                        <table class="table table-striped custom-table">
                            <thead>
                                <tr>
                                    <th>Task Status</th>
                                    <th class="text-center">Pending</th>
                                    <th class="text-center">Review</th>
                                    <th class="text-center">Progress</th>                                    
                                    <th class="text-center">Completed</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                               
                                <tr>
                                    <td></td>
                                    @if ($tasks->status=='Pending')
                                    <td class="text-center">
                                        <input name="status" type="radio" value="Pending">
                                    </td>
                                    @else
                                    <td class="text-center">
                                        <input checked="" name="status" type="radio" value="Pending">
                                    </td>
                                    @endif
                                    
                                    @if ($tasks->status=='Review')
                                    <td class="text-center">
                                        <input checked="" name="status" type="radio" value="Review">
                                    </td>
                                    @else
                                    <td class="text-center">
                                        <input name="status" type="radio" value="Review">
                                    </td>
                                    @endif

                                    @if ($tasks->status=='Progress')
                                    <td class="text-center">
                                        <input checked="" name="status" type="radio" value="Progress">
                                    </td>
                                    @else
                                    <td class="text-center">
                                        <input name="status" type="radio" value="Progress">
                                    </td>
                                    @endif
                                     @if ($tasks->status=='Completed')
                                    <td class="text-center">
                                        <input checked="" name="status" type="radio" value="Completed">
                                    </td>
                                    @else
                                    <td class="text-center">
                                        <input name="status" type="radio" value="Completed">
                                    </td>
                                    @endif
                                    
                                    
                                    
                                </tr>
                              
                              
                            </tbody>
                        </table>
                    </div>

                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>
<!-- /Custom Boostrap Validation -->
				

					
					
							
						</div>
					</div>
					<!-- /Row -->
				
				</div>			
			</div>
            <script>
               ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .catch( error => {
                    console.error( error );
                } );
            </script>
	<!-- /Page Wrapper -->
@endsection