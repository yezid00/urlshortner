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
}
