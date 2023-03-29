<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redmine\Client\NativeCurlClient;

class HomeController extends Controller
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
//        $client = new NativeCurlClient(getenv('REDMINE_API_URL'), getenv('REDMINE_API_USERNAME'), getenv('REDMINE_API_PASSWORD'));

        return view('admin/home');
    }
}
