<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SourceManager;

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

        // initialize sources manager
        $this->report   = new SourceManager('Report');

        // get previously executed list of jobs for this user
        $this->_jobs    = $this->report->jobs();

        // get list of reports this user has access to
        $this->_reports = $this->report->list();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // set defaults
        $filters    = array(
            
            // report variables
            'report_type'   => $request->input('type',''),
            'report_name'   => $request->input('name',''),

            // other optional vars that could be set (i.e. report_name required fields)
            'county_id'         => $request->input('county_id',         ''),
            'event_id'          => $request->input('event_id',          ''),
            'foodbank_id'       => $request->input('foodbank_id',       ''),
            'location_id'       => $request->input('location_id',       ''),
            'organization_id'   => $request->input('organization_id',   ''),
            'state_id'          => $request->input('state_id',          ''),

        );

        // show page
        return view('home',array(
            'filters'   => $filters,
            'jobs'      => $this->_jobs,
            'reports'   => $this->_reports
        ));
    }

    /**
    * Fuction that accepts POSTed report data
    **/
    public function post(Request $request) {

        // show page
        return view('home',array(
            'filters'   => $request->all(),                // set filters as the requested data
            'jobs'      => $this->_jobs,
            'reports'   => $this->_reports,
            'report'    => $this->report->get($request->all())     // get requested report
        ));
    }
}
