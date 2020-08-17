<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Url;
use Str;

class UrlController extends Controller
{
	public function index()
	{
		$urls = Url::all();
		return view('urls.index',compact('urls'));
	}
    public function saveUrl(Request $request){
    	$this->validate($request,[
    		'url' => 'required|url'
    	]);

    	$url = new Url;

    	$url->url = $request->url;
    	$url->short_url = Str::random(7);

    	$url->save();

    	return redirect()->back();
    }

    public function short($short_url)
    {
    	$link = Url::where('short_url',$short_url)->first();

    	return redirect($link->url);
    }
}
