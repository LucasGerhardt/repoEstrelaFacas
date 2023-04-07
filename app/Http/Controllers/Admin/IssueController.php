<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redmine\Api\Issue;
use Redmine\Client\NativeCurlClient;
use App\Classes\HelpRedmine;


class IssueController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.issue');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('admin.issue.create');
    }


    /**
     * @param Request $request
     * @return void
     *
     */
    public function store(Request  $request)
    {
        $helpRedmine = new HelpRedmine();
        $client = $helpRedmine->createClientRestApi();

        $request = $helpRedmine->workRequestCustomFieldsToRest($request->all());

        return $client->getApi( 'issue')->create($request);
    }

}
