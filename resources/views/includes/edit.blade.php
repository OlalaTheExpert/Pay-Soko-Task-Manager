<!-- Add Client Modal -->

<div id="edit_task_{{ $task_id }}" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Task Progress</h5>
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
</div>
<!-- /Add Client Modal -->