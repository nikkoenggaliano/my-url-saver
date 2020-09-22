<?php

namespace App\Http\Controllers\user\url;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    
	public function index(){
		return view('url.tambah_url');
	}

}
