<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Toast;
use App\Notification;
use App\User;
use Carbon\Carbon;
use App\Report;
use App\Department;

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
        return view('dashboard');
    }

    public function dashboard()
    {
        $users = User::all();
        $reports = Report::where('created_at', '>=', Carbon::today())->with(['user', 'department'])->get();
        $departments = Department::all();
        return view('dashboard', compact('users', 'reports', 'departments'));
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }

    public function clear()
    {
        $notifications = Notification::all();

        foreach ($notifications as $notification) {
           $notification->delete();
        }
    }

    public function read(Request $request)
    {
        $id = $request->id;

        $notification = Notification::find($id);

        $notification->read = true;

        $notification->save();
    }
}
