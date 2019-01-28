<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Toast;
use App\Notification;

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
        return view('dashboard');
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
