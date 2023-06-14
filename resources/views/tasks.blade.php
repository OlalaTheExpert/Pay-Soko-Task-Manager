
@extends('layouts.master')

@section('content')
<!-- Page Wrapper -->
@include('sweetalert::alert')
<script src=https://cdn.bootcss.com/jquery/3.3.1/jquery.js></script>
<script src=https://unpkg.com/sweetalert/dist/sweetalert.min.js></script>

 <link rel="stylesheet" href="{{ URL::asset('assets/css/tasks.css') }}">


   @if(Session::has('message'))
    <div class="alert alert-danger">
      {{Session::get('message')}}
    </div>
  @elseif(session('Success'))
    <div class="alert alert-success">
      {{Session::get('Success')}}
    </div>
    @endif
     
<div class='app'>

    <main class='project'>
      <div class="page-wrapper">
			<div class="page-header">
						<div class="row align-items-center">
							<div class="col">								
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="./">Dashboard</a></li>
									<li class="breadcrumb-item active">All Tasks</li>
								</ul>
							</div>
							<div class="col-auto float-right ml-auto">
								<div class='project-info'>
                                    <div class='project-participants float-r'>
                                    <span></span>
                                    <span></span>
                                    <span></span>

                                    <button class="project-participants__add" data-toggle="modal" data-target="#add_client"><i class="fa fa-plus"></i> Add Client</button>
                                    </div>
                                </div>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
    <!-- Page Content -->
    <div class="content container-fluid">
                <div class="row">
			<div class="col-lg-12 col-md-12">  
             
                    <div class='project-tasks'> 
                               {!! Toastr::message() !!}

                         <div class="col-lg-12 col-md-12"> 
                        <div class='project-column'>
                         
                            <div class='project-column-heading'>
                                <h2 class='project-column-heading__title'>Pending</h2><button class='project-column-heading__options'><i class="las la-star-half"></i></button>
                            </div>
                            
                            @foreach( $pendings as $pending)
                             
                            
                            {{-- <div class="pt-4">
                                <div class="alert alert-danger" role="alert">
                                <strong>Oops!</strong> No Completed Tasks
                                </div>
                            </div> --}}
                            
                            @php
                            $task_id=$pending->id;
                            @endphp
                            <div class='task' draggable='true'>
                                <div class='task__tags'><span class='task__tag task__tag--copyright'>{{ $pending->title }}</span><button class='task__options'>
                                <a  href="{{ route('taskedit', $task_id ) }}" class="text-success"><i class="las la-edit"></i></a>

                                 {{-- <a href="{{route('taskdestroy', $task_id)}}" onclick="confirmation(event)" data-toggle="modal" class="text-danger delete"> --}}
                                 

                                <form method="POST" action="{{ route('taskdestroy', $task_id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <a type="submit" class="text-danger show_confirm" data-toggle="tooltip" title='Delete'><i class="las la-trash"></i></a>
                               </form>
                                 {{-- </a> --}}
                                </button></div>
                                <a  data-toggle="modal" data-target="#task_{{ $task_id }}">
                                <p>{!! $pending->description !!}</p>
                                <div class='task__stats'>
                                    <span><time datetime="2021-11-24T20:00:00">Due on {{$pending->due_date}}</time></span>                                                                      
                                    <br><span>Posted {{ $pending->created_at->diffForHumans() }}</span> <br>
                                    <span class='task__owner'></span>
                                </div></a>
                            </div>
                            @include('includes.updates');
                            </div>
                           
                            @endforeach
                                                      
                        </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                        <div class='project-column'>
                            <div class='project-column-heading'>
                                <h2 class='project-column-heading__title'>In Progress</h2><button class='project-column-heading__options'><i class="las la-spinner"></i></button>
                            </div>
                            @foreach ($Progress as $Progress)
                             @php
                            $task_id=$Progress->id;
                            @endphp
                           <div class='task' draggable='true'>
                                <div class='task__tags'><span class='task__tag task__tag--copyright'>{{ $Progress->title }}</span><button class='task__options'>
                                <a  href="{{ route('taskedit', $task_id ) }}" class="text-success"><i class="las la-edit"></i></a>

                                 {{-- <a href="{{route('taskdestroy', $task_id)}}" onclick="confirmation(event)" data-toggle="modal" class="text-danger delete"> --}}
                                 

                                <form method="POST" action="{{ route('taskdestroy', $task_id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <a type="submit" class="text-danger show_confirm" data-toggle="tooltip" title='Delete'><i class="las la-trash"></i></a>
                               </form>
                                 {{-- </a> --}}
                                </button></div>
                                <a  data-toggle="modal" data-target="#task_{{ $task_id }}">
                                <p>{!! $Progress->description !!}</p>
                                <div class='task__stats'>
                                    <span><time datetime="2021-11-24T20:00:00">Due on {{$Progress->due_date}}</time></span>                                                                      
                                    <br><span>Posted {{ $Progress->created_at->diffForHumans() }}</span> <br>
                                    <span class='task__owner'></span>
                                </div></a>
                            </div>
                             @include('includes.updates');
                            </div>
                            
                            @endforeach
                                                      

                        </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                        <div class='project-column'>
                            <div class='project-column-heading'>
                                <h2 class='project-column-heading__title'>Needs Review</h2><button class='project-column-heading__options'><i class="las la-tools"></i></button>
                            </div>
                            @foreach ($Reviews as $Review)
                             @php
                            $task_id=$Review->id;
                            @endphp
                            
                            <div class='task' draggable='true'>
                                <div class='task__tags'><span class='task__tag task__tag--copyright'>{{ $Review->title }}</span><button class='task__options'>
                                <a  href="{{ route('taskedit', $task_id ) }}" class="text-success"><i class="las la-edit"></i></a>

                                 {{-- <a href="{{route('taskdestroy', $task_id)}}" onclick="confirmation(event)" data-toggle="modal" class="text-danger delete"> --}}
                                 

                                <form method="POST" action="{{ route('taskdestroy', $task_id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <a type="submit" class="text-danger show_confirm" data-toggle="tooltip" title='Delete'><i class="las la-trash"></i></a>
                               </form>
                                 {{-- </a> --}}
                                </button></div>
                                <a  data-toggle="modal" data-target="#task_{{ $task_id }}">
                                <p>{!! $Review->description !!}</p>
                                <div class='task__stats'>
                                    <span><time datetime="2021-11-24T20:00:00">Due on {{$Review->due_date}}</time></span>                                                                      
                                    <br><span>Posted {{ $Review->created_at->diffForHumans() }}</span> <br>
                                    <span class='task__owner'></span>
                                </div></a>
                            </div>
                            
                            @include('includes.updates');
                            
                            </div>
                            @endforeach
                        </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                        <div class='project-column'>
                            <div class='project-column-heading'>
                                <h2 class='project-column-heading__title'>Completed</h2><button class='project-column-heading__options'><i class="las la-list-alt"></i></button>
                            </div>
                             @foreach ($Completed as $Completed)
                            @php
                            $task_id=$Completed->id;
                            @endphp
                            
                            <div class='task' draggable='true'>
                                <div class='task__tags'><span class='task__tag task__tag--copyright'>{{ $Completed->title }}</span><button class='task__options'>
                                <a  href="{{ route('taskedit', $task_id ) }}" class="text-success"><i class="las la-edit"></i></a>

                                 {{-- <a href="{{route('taskdestroy', $task_id)}}" onclick="confirmation(event)" data-toggle="modal" class="text-danger delete"> --}}
                                 

                                <form method="POST" action="{{ route('taskdestroy', $task_id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <a type="submit" class="text-danger show_confirm" data-toggle="tooltip" title='Delete'><i class="las la-trash"></i></a>
                               </form>
                                 {{-- </a> --}}
                                </button></div>
                                <a  data-toggle="modal" data-target="#task_{{ $task_id }}">
                                <p>{!! $Completed->description !!}</p>
                                <div class='task__stats'>
                                    <span><time datetime="2021-11-24T20:00:00">Due on {{$Completed->due_date}}</time></span>                                                                      
                                    <br><span>Posted {{ $Completed->created_at->diffForHumans() }}</span> <br>
                                    <span class='task__owner'></span>
                                </div></a>
                            </div> 
                            @include('includes.updates');
                            </div> 
                            @endforeach                     

                        </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    </main>
    {{-- @foreach( $pendings as $pending)
      @include('includes.updates')  
    @endforeach --}}
    {{-- <aside class='task-details'>
    
        <div class='tag-progress'>
            <h2>Task Progress</h2>
            @foreach ($tasks as $task)
            @if($task->status == 'Completed')
                <div class='tag-progress'>
                <p>{{ $task->title }}({{ $task->status }})<span>{{ $task->progress }}/10</span></p>
                <progress class="progress progress--copyright" max="10" value="{{ $task->progress }}"> {{ $task->progress }}/10</progress>
            </div>            
            @elseif($task->status == 'Progress')
            <div class='tag-progress'>
                <p>{{ $task->title }}({{ $task->status }})<span>{{ $task->progress }}/10 </span></p>
                <progress class="progress progress--illustration" max="10" value="{{ $task->progress }}"> {{ $task->progress }}/10 </progress>
            </div>           
            @elseif($task->status == 'Review')
            <div class='tag-progress'>
                <p>{{ $task->title }}({{ $task->status }})<span>{{ $task->progress }}/10 </span></p>
                <progress class="progress progress--design" max="10" value="{{ $task->progress }}"> {{ $task->progress }}/10</progress>
            </div>
            @endif
            @endforeach
            
        </div>
        
        <div class='task-activity'>
            <h2>Recent Activity</h2>
            <ul>
             @foreach ($tasks as $task)         

             @php
                $id=$task->user_id;
                $users= DB::table('users')                                                
                    ->where('users.id', $id)
                    ->get();
                @endphp
                
                @if($task->status == 'Completed')
                <li>
                    <span class='task-icon task-icon--attachment'><i class="las la-tasks"></i></span>
                    <b> 
                    @foreach ($users as $user)
                        {{ $user->name }}
                     @endforeach</b> Completed a task
                    <time datetime="2021-11-24T20:00:00">Due {{ $task->due_date }}</time>
                </li>
                @elseif($task->status == 'Progress')
                

                <li>
                    <span class='task-icon task-icon--comment'><i class="las la-list-alt"></i></span>
                    <b> @foreach ($users as $user)
                        {{ $user->name }}
                     @endforeach </b> Updated a task
                    <time datetime="2021-11-24T20:00:00">Due {{ $task->due_date }}</time>
                </li>
                @elseif($task->status == 'Review')
                <li>
                    <span class='task-icon task-icon--edit'><i class="las la-list-alt"></i></span>
                    <b> @foreach ($users as $user)
                        {{ $user->name }}
                     @endforeach </b> new task under review
                    <time datetime="2021-11-24T20:00:00">Due {{ $task->due_date }}</time>
                </li>
                @else
                <li>
                    <span class='task-icon task-icon--attachment'><i class="las la-tasks"></i></span>
                    <b> @foreach ($users as $user)
                        {{ $user->name }}
                     @endforeach </b> added a pending task
                    <time datetime="2021-11-24T20:00:00">Due {{ $task->due_date }}</time>
                </li>
                @endif

                @endforeach
                
            </ul>
        </div>
    </aside> --}}
</div>

<!-- Add Client Modal -->
<div id="add_client" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Title<span class="text-danger">*</span></label>
                                <input class="form-control" name="title" type="text">
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Due Date<span class="text-danger">*</span></label>
                                <input class="form-control" name="due_date" type="date" min="@php echo Date("Y-m-d"); @endphp">
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                        <label class="col-form-label">Task Description<span class="text-danger">*</span></label>
                        
                            <textarea id="editor" name="description" required> </textarea>
                        </div>
                        
                        
                       
                    <div class="table-responsive m-t-15">
                        <table class="table table-striped custom-table">
                            <thead>
                                <tr>
                                    <th>Task Status</th>
                                    <th class="text-center">Pending</th>
                                    <th class="text-center">Progress</th>
                                    <th class="text-center">Review</th>
                                    <th class="text-center">Completed</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                               
                                <tr>
                                    <td></td>
                                    <td class="text-center">
                                        <input checked="" name="status" type="radio" value="Pending">
                                    </td>
                                    <td class="text-center">
                                        <input name="status" type="radio" value="Progress">
                                    </td>
                                    <td class="text-center">
                                        <input name="status" type="radio" value="Review">
                                    </td>
                                    <td class="text-center">
                                        <input name="status" type="radio" value="Completed">
                                    </td>
                                    
                                </tr>
                              
                              
                            </tbody>
                        </table>
                    </div>
                     <div class="col-md-12">
                        <button class="btn btn-primary submit-btn  btn-lg btn-block"> <i class="las la-tasks"></i> Add New</button>
                    </div>
                    {{-- <div class="submit-section">
                        <button class="btn btn-primary submit-btn btn-lg btn-block">Add New</button>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Client Modal -->
{{-- Sweetalert on delete confirmation --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Delete?`,
              text: "You won't be able to revert this!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            } 
              
          });
      });
  
</script>
<script>
	
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
    
    document.addEventListener('DOMContentLoaded', (event) => {

        var dragSrcEl = null;

        function handleDragStart(e) {
            this.style.opacity = '0.1';
            this.style.border = '3px dashed #c4cad3';

            dragSrcEl = this;

            e.dataTransfer.effectAllowed = 'move';
            e.dataTransfer.setData('text/html', this.innerHTML);
        }

        function handleDragOver(e) {
            if (e.preventDefault) {
                e.preventDefault();
            }

            e.dataTransfer.dropEffect = 'move';

            return false;
        }

        function handleDragEnter(e) {
            this.classList.add('task-hover');
        }

        function handleDragLeave(e) {
            this.classList.remove('task-hover');
        }

        function handleDrop(e) {
            if (e.stopPropagation) {
                e.stopPropagation(); // stops the browser from redirecting.
            }

            if (dragSrcEl != this) {
                dragSrcEl.innerHTML = this.innerHTML;
                this.innerHTML = e.dataTransfer.getData('text/html');
            }

            return false;
        }

        function handleDragEnd(e) {
            this.style.opacity = '1';
            this.style.border = 0;

            items.forEach(function(item) {
                item.classList.remove('task-hover');
            });
        }


        let items = document.querySelectorAll('.task');
        items.forEach(function(item) {
            item.addEventListener('dragstart', handleDragStart, false);
            item.addEventListener('dragenter', handleDragEnter, false);
            item.addEventListener('dragover', handleDragOver, false);
            item.addEventListener('dragleave', handleDragLeave, false);
            item.addEventListener('drop', handleDrop, false);
            item.addEventListener('dragend', handleDragEnd, false);
            
        });
    });
</script>

@endsection