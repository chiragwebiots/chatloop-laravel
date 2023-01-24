<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
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
    public function __construct()
    {
        $this->post = new Blog;
        $this->page = new Page;
        $this->user = new User;
    }
    
    public function index()
    {

        $recentActivitys = Activity::latest()->take(5)->get();

        $analyticsData = \Analytics::performQuery(Period::days(30), 'ga:', [
            'metrics' => 'ga:users,ga:newUsers,ga:avgSessionDuration,ga:bounceRate',
            'dimensions' => 'ga:deviceCategory,ga:country',
        ]);

        $userscountrywise = \Analytics::performQuery(Period::days(30), 'ga:country', [
            'metrics' => 'ga:users',
            'dimensions' => 'ga:country',
            'sort' => '-ga:users',
            'max-results' => 5
        ]);

        $arraykeys = array('country', 'users');

        $arrayOne = [];
        $arrayTwo = [];

        foreach ($userscountrywise['rows'] as $value) {

            $arrayOne = array_combine($arraykeys, $value);

            array_push($arrayTwo, $arrayOne);
        }

        $usersdevices = \Analytics::performQuery(Period::days(30), 'ga:', [
            'metrics' => 'ga:users',
            'dimensions' => 'ga:deviceCategory',
            'sort' => 'ga:deviceCategory'
        ]);

        $arraykey = array('devicename', 'users');

        $arraypush = [];
        $array_combine = [];

        foreach ($usersdevices['rows'] as $usersdevice) {

            $arraypush = array_combine($arraykey, $usersdevice);

            array_push($array_combine, $arraypush);
        }

        $mobileUsers = 0;
        $desktopUsers = 0;
        $tabletUsers = 0;

        foreach ($array_combine as $device) {

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

        return view('admin.dashboard.index', [
            'users' => $this->user->getUsers(),
            'posts' => $this->post->getBlogs(),
            'pages' => $this->page->getPages(),
            'recentBlogs' => $this->post->getRecentBlogs(),
            'recentActivitys' => $recentActivitys,
            'analyticsData' => $analyticsData,
            'arrayTwo' => $arrayTwo,
            'mobileUsers' => $mobileUsers,
            'desktopUsers' => $desktopUsers,
            'tabletUsers' => $tabletUsers,
        ]);
    }
}

