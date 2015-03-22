<?php

class PagesController extends BaseController {

	public function home()
	{
        //Find all bookings
        $bookings = DB::table('booking')->get();
        //dd($bookings);
        //Pass bookings to view
		return View::make('home' ,compact('bookings'));
	}
	
	public function showReportDamage()
	{
		return View::make('reportdamage');
	}
    
    public function signIn()
	{
		return View::make('signIn');
	}
    
    public function calendar()
    {
        Return View::make('calendar');
    }
    
    public function overview()
    {
        Return View::make('overview');
    }
}


