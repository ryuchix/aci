<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Particular;
use App\User;
use App\Notification;
use Toast;
use App;
use PDF;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::all();

        return view('reports.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();

        $array1 = $request->particular;
        $array2 = $request->percentage;
        $array3 = $request->remarks;

        $a = array_filter($array2);
        $average = array_sum($array2)/count($a);

        $report = new Report;
        $report->user_id = auth()->user()->id;
        $report->date_posted = Carbon::createFromFormat('F d, Y', $request->date_posted);
        $report->average = round($average, 2);
        $report->save();

        $merge = [$array1, $array2, $array3];

        foreach ($merge[0] as $key => $value) {
            $particular = new Particular;
            $particular->particular = $merge[0][$key];
            foreach ($merge[1] as $x => $y) {
                $particular->percentage = $merge[1][$key];
            }
            foreach ($merge[2] as $i => $d) {
                $particular->remarks = $merge[2][$key];
            }
            $particular->report_id = $report->id;
            $particular->save();
        }

        if(auth()->user()->role == 'User') {
            $notification = new Notification;
            $notification->report_id = $report->id;
            $notification->user_id = auth()->user()->id;
            $notification->message = auth()->user()->name . ' submitted a report.';
            $notification->save();
        }

        Toast::success('New report added', 'Success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        $user = User::where('id', $report->user_id)->with('department')->first();

        $date = Carbon::parse($report->date_posted)->format('F d, Y');

        $particulars = Particular::where('report_id', $report->id)->get();

        return view('reports.show', compact('report', 'particulars', 'user', 'date'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        return view('reports.update', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        $inputs = $request->all();

        $report->update($request->all());

        Toast::success('Report updated', 'Success');

        return redirect('dashboard/reports');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        $particulars = Particular::where('report_id', $report->id)->get();

        foreach ($particulars as $particular) {
           $particular->delete();
        }

        $report->delete();

        Toast::success('Report deleted', 'Success');

        return redirect('dashboard/reports');
    }

    public function download($id)
    {
        $report = Report::findOrFail($id);

        $particulars = Particular::where('report_id', $report->id)->get();

        $user = User::where('id', $report->user_id)->with('department')->first();

        $date = Carbon::parse($report->date_posted)->format('F d, Y');

        $pdf = App::make('dompdf.wrapper');

        $data = [
            'report' => $report, 
            'particulars' => $particulars, 
            'user' => $user, 
            'date' => $date
        ];

        $pdf = PDF::loadView('reports.download', $data);

        return $pdf->download('report.pdf');
    }
}
