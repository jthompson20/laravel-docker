<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SourceManager;

class ReportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        // initialize sources manager
        $this->report   = new SourceManager('Report');

    }

    /**
     * Show the report
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
    	// get & show report
    	return view('report',array(
    		'report' => $this->report->get_by_id($id)
    	));
    }

}