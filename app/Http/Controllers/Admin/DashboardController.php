<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Page;
use App\Models\User;
use Spatie\Analytics\Period;
use Spatie\Analytics\Analytics;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;

class DashboardController extends Controller
{
    /**
     * Show Admin Dashboard
     */
    protected $post;
    protected $page;
    protected $user;
    protected $comments;
    public function __construct()
    {
        $this->post = new Blog;
        $this->page = new Page;
        $this->user = new User;
        $this->comments = new Comment;
    }
    public function index()
    {
        $recentActivitys = Activity::latest()->take(5)->get();

        return view('admin.dashboard.index', [
            'users' => $this->user->getUsers(),
            'posts' => $this->post->getBlogs(),
            'pages' => $this->page->getPages(),
            'comments'=> $this->comments->getRecentComments(),
            'recentBlogs' => $this->post->getRecentBlogs(),
            'recentActivitys' => $recentActivitys,
            'analyticsData' => $this->analyticsData(),
            'country_array' => $this->countyWiseUsers(),
            'deviceWiseUsers'=>$this->deviceWiseUsers(),
        ]);
    }

    public function analyticsData()
    {
        $analyticsData = \Analytics::performQuery(Period::days(config('global.this_month')), 'ga:', [
            'metrics' => 'ga:users,ga:newUsers,ga:avgSessionDuration,ga:bounceRate',
            'dimensions' => 'ga:deviceCategory,ga:country',
        ]);
        return $analyticsData;
    }

    public function countyWiseUsers(){

        $usersCountryWise = \Analytics::performQuery(Period::days(config('global.this_month')), 'ga:country', [
            'metrics' => 'ga:users',
            'dimensions' => 'ga:country',
            'sort' => '-ga:users',
            'max-results' => 5
        ]);
        
        $key = array('country', 'users');

        $arr = [];
        $country_array = [];
        if(!$usersCountryWise['rows']== null){

            foreach ($usersCountryWise['rows'] as $value) {
                $arr = array_combine($key, $value);
                $country_array[] = $arr;
            }
        }
        return $country_array;
    }

    public function deviceWiseUsers(){
        $usersdevices = \Analytics::performQuery(Period::days(config('global.this_month')), 'ga:', [
            'metrics' => 'ga:users',
            'dimensions' => 'ga:deviceCategory',
            'sort' => 'ga:deviceCategory'
        ]);

        $key = array('devicename', 'users');

        $arr = [];
        $device_array = [];
        if(!$usersdevices['rows']== null){

            foreach ($usersdevices['rows'] as $values) {
                $arr = array_combine($key, $values);
                $device_array[] = $arr;
            }
        }

        $mobileUsers = 0;
        $desktopUsers = 0;
        $tabletUsers = 0;

        foreach ($device_array as $device) {

            if ($device['devicename'] == 'desktop') {
                $desktopUsers = intval($device['users']);
            }
            if ($device['devicename'] == 'tablet') {
                $tabletUsers = (intval($device['users']));
            }
            if ($device['devicename'] == 'mobile') {
                $mobileUsers = (intval($device['users']));
            }
        }
        return[
            'mobileUsers' => $mobileUsers,
            'desktopUsers' => $desktopUsers,
            'tabletUsers' => $tabletUsers,
        ];
    }
}
