<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;
use DB;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user()->name;
        $weekMap = [
            0 => 'Sunday',
            1 => 'Monday',
            2 => 'Tuesday',
            3 => 'Wednesday',
            4 => 'Thursday',
            5 => 'Friday',
            6 => 'Saturday',
        ];
        $dayOfTheWeek = Carbon::now()->dayOfWeek;
        $weekday = $weekMap[$dayOfTheWeek];
        $date = Carbon::now();

        
        $userrole = auth()->user()->role;
        $id = auth()->user()->id;
        if($userrole=='1') {
            $role='Admin';

            // Dashboard Total Count from Admin
            $totalcount = Task::all()->count();
            $pendingcount = Task::where('status','pending')->count();
            $completedcount = Task::where('status','completed')->count();
            $progresscount = Task::where('status','progress')->count();
            $reviewcount = Task::where('status','review')->count();
            $duecount = Task::whereDate('due_date', '>', $date)->count();

            // Fetching all the tasks
            $pending = Task::where('status', 'pending')
                ->whereDate('created_at', $date)
                ->orderBy('id')              
                ->get();
            $Review = Task::where('status', 'Review')
                ->whereDate('created_at', $date)
                ->orderBy('id')              
                ->get();
            $Progress = Task::where('status', 'Progress')
                    ->whereDate('created_at', $date)
                    ->orderBy('id')              
                    ->get();
            $Completed = Task::where('status', 'Completed')
                    ->whereDate('created_at', $date)
                    ->orderBy('id')              
                    ->get();

            $tasks=Task::orderBy('id', 'desc')->take(5)->get();
        }else{
            $role='User';
            $totalcount = Task::where('tasks.user_id', $id)->count();
            $pendingcount = Task::where('status','pending')
                            ->where('tasks.user_id', $id)
                            ->count();
            $completedcount = Task::where('status','completed')
            ->where('tasks.user_id', $id)
            ->count();
            $progresscount = Task::where('status','progress')
            ->where('tasks.user_id', $id)
            ->count();
            $reviewcount = Task::where('status','review')
            ->where('tasks.user_id', $id)
            ->count();
            $duecount = Task::whereDate('due_date', '>', $date)->where('tasks.user_id', $id)->count();

            // Fetching all the tasks
            $pending = Task::where('status', 'pending')
                ->where('tasks.user_id', $id)
                ->whereDate('created_at', date('Y-m-d'))
                ->orderBy('id')              
                ->get();
            $Review = Task::where('status', 'Review')
                ->where('tasks.user_id', $id)
                ->whereDate('created_at', date('Y-m-d'))
                ->orderBy('id')              
                ->get();
            $Progress = Task::where('status', 'Progress')
                    ->where('tasks.user_id', $id)
                    ->whereDate('created_at', date('Y-m-d'))
                    ->orderBy('id')              
                    ->get();
            $Completed = Task::where('status', 'Completed')
                    ->where('tasks.user_id', $id)
                    ->whereDate('created_at', date('Y-m-d'))
                    ->orderBy('id')              
                    ->get();

            $tasks=Task::orderBy('id', 'desc')->take(3)
                    ->where('tasks.user_id', $id)                    
                    ->get();
        }
        return view('home')->with([
            'tasks' => $tasks, 
            'pendings'=>$pending,
            'Reviews'=>$Review,
            'Completed'=>$Completed,
            'Progress'=>$Progress,
            'user'=>$user,
            'weekday'=>$weekday,
            'date'=>$date,
            'role'=>$role,
            'pendingcount'=>$pendingcount,
            'reviewcount'=>$reviewcount,
            'progresscount'=>$progresscount,
            'completedcount'=>$completedcount,
            'totalcount'=>$totalcount,
            'duecount'=>$duecount
            ]);
    }
    }

