<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Blog;
use App\Models\Page;
use Spatie\Analytics\Period;
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

        $keys = array('country', 'users');

        $array1 = [];
        $array2 = [];

        foreach ($userscountrywise['rows'] as $value) {

            $array1 = array_combine($keys, $value);

            array_push($array2, $array1);
        }

        $usersdevices = \Analytics::performQuery(Period::days(30), 'ga:', [
            'metrics' => 'ga:users',
            'dimensions' => 'ga:deviceCategory',
            'sort' => 'ga:deviceCategory'
        ]);

        $arraykey = array('devicename', 'users');
        
        $b = [];
        $array_combine = [];

        foreach ($usersdevices['rows'] as $usersdevice) {

            $b = array_combine($arraykey, $usersdevice);

            array_push($array_combine, $b);
        }
        
        $mobileuser = 0;
        $desktopuser = 0;
        $tabletuser = 0;

        if ($array_combine[0]['devicename'] == 'mobile') {
            $mobileuser = (intval($array_combine[0]['users']));
        }
        if ($array_combine[0]['devicename'] == 'desktop') {
            $desktopuser = (intval($array_combine[0]['users']));
        }
        if ($array_combine[0]['devicename'] == 'tablet') {
            $tabletuser = (intval($array_combine[0]['users']));
        }

        return view('admin.dashboard.index', [
            'users' => $this->user->getUsers(),
            'posts' => $this->post->getBlogs(),
            'pages' => $this->page->getPages(),
            'recentBlogs' => $this->post->getRecentBlogs(),
            'recentActivitys' => $recentActivitys,
            'analyticsData' => $analyticsData,
            'usercountrywise' => $userscountrywise,
            'array2' => $array2,
            'array_combine' => $array_combine,
            'mobileuser' => $mobileuser,
            'desktopuser' => $desktopuser,
            'tabletuser' => $tabletuser,
        ]);
    }
}



