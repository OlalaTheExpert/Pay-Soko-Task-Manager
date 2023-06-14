<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;
use DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;


class TaskController extends Controller
{
     public function index()
    {
        $userrole = auth()->user()->role;
        $id = auth()->user()->id;
        if($userrole=='1') {
            $pending = Task::where('status', 'pending')
                ->orderBy('id')              
                ->get();
            $Review = Task::where('status', 'Review')
                ->orderBy('id')              
                ->get();
            $Progress = Task::where('status', 'Progress')
                    ->orderBy('id')              
                    ->get();
            $Completed = Task::where('status', 'Completed')
                    ->orderBy('id')              
                    ->get();

            $tasks=Task::orderBy('id', 'desc')->take(5)->get();
        }else{
            $pending = Task::where('status', 'pending')
                ->where('tasks.user_id', $id)
                ->orderBy('id')              
                ->get();
            $Review = Task::where('status', 'Review')
                ->where('tasks.user_id', $id)
                ->orderBy('id')              
                ->get();
            $Progress = Task::where('status', 'Progress')
                    ->where('tasks.user_id', $id)
                    ->orderBy('id')              
                    ->get();
            $Completed = Task::where('status', 'Completed')
                    ->where('tasks.user_id', $id)
                    ->orderBy('id')              
                    ->get();

            $tasks=Task::orderBy('id', 'desc')->take(5)
                    ->where('tasks.user_id', $id)
                    ->get();
        }
        return view('tasks')->with([
            'tasks' => $tasks, 
            'pendings'=>$pending,
            'Reviews'=>$Review,
            'Completed'=>$Completed,
            'Progress'=>$Progress
            ]);
    }
    public function store(Request $request)
   {
       $request->validate([
           'title'   => 'required|string|max:255',
           'description'     => 'required|string|max:255',           
            ]);

       DB::beginTransaction();
       try {  
           $user = auth()->user()->id; 
           $task = new Task;
           $task->title = $request->title;
           $task->user_id=$user;
           $task->due_date     = $request->due_date;
           $task->description     = $request->description;
           $task->status    = $request->status;
           $task->save();
           
           DB::commit();
           Alert::success('Success','Task Added successfully!');
           //Toastr::success('Task Added successfully.','Success');
           return redirect()->back()->with('success');
      
           
       } catch(\Exception $e) {
           DB::rollback();
           Toastr::error('Task failed :)','Error');
           //return redirect()->back();
           dd("failed");
       }
   }
   public function progressupdate(Request $request, $id){
    //  DB::beginTransaction();
    //    try { 
    $task=Task::find($id); 
    $task->progress = $request->progress;
    $task->status = $request->status;
    $task->update();
    DB::commit();
    Alert::success('Success','Progress Updated Successfully!');
    //Toastr::success('Task Added successfully.','Success');
    return redirect()->back()->with('success');
//     } catch(\Exception $e) {
//     DB::rollback();
//     Toastr::error('Update failed :)','Error');
//     return redirect()->back();
//     // dd("failed");
// }
   }
public function taskedit($id)
    {
        $user = auth()->user(); 
        $task=Task::find($id);         
        return view('edittasks', ['tasks'=>$task]);
      
        
    }
public function taskupdate(Request $request, $id)
    {
        $user = auth()->user(); 
        $task=Task::find($id);         
        
        $user = auth()->user()->id;
        $task->title = $request->title;
        $task->user_id=$user;
        $task->due_date     = $request->due_date;
        $task->description     = $request->description;
        $task->status    = $request->status;
        $task->update();
        Session::flash('Success', 'Task has been Updated successfully !'); 
        return redirect()->route('tasks')->with('success');
      
        
    }
   public function taskdestroy($id){
        $task=Task::find($id);
        $task->delete();       
       
        Alert::success('Success','Task has been removed successfully !');
        return back();
    }

}
