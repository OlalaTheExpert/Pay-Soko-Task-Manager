<!-- Add Client Modal -->
<style>

.slidecontainer {
  width: 100%;
}

.slider {
  -webkit-appearance: none;
  width: 100%;
  height: 25px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  background: #04AA6D;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  background: #04AA6D;
  cursor: pointer;
}
</style>

<div id="task_{{ $task_id }}" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Task Progress</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <form class="form-horizontal" method="POST" action="{{ route('taskprogress', $task_id) }}">
                    @csrf
                    @method('PUT')
                <div class="row">   
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-form-label">Progress<span class="text-danger">*</span>( /10)</label>
                            <input class="form-control" max="10" min="0" name="progress" type="number">
                        </div>
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
                        <button class="btn btn-primary submit-btn  btn-lg btn-block"> <i class="las la-tasks"></i> Update Progress</button>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</div>

<!-- /Add Client Modal -->

