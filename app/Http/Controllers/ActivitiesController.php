<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Activities;
use DB;

class ActivitiesController extends Controller
{
    //
    public function home()
    {
    	$waterin = $this->getActivityByType( 'waterin' );

    	return view('home', compact('waterin'));
    }

    public function activities()
    {
    	$activities = Activities::all();


        return view('activities.activities', compact('activities'));
    }

    public function activity(Activities $activity )
    {

        return view('activities.activity', compact('activity'));
    }

    private function getActivityByType( $type, $limit = null)
    {
        $ret = Activities::where('type', '=', $type)->orderBy('updated_at', 'desc')->get();
        
        if ( !is_null($limit) && is_numeric($limit)) {
            $ret = Activities::where('type', '=', $type)->limit($limit)->orderBy('updated_at', 'desc')->get();
        }
        return $ret;
    }
}
