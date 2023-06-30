<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $weather=Http::get('http://api.weatherapi.com/v1/current.json?key='.env('WEATHER_KEY').'&q=51.4189783,0.1933459&aqi=no');
        return view('home',compact('weather'));
    }
}