<?php

namespace App\Http\Controllers\user\url;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use \App\Models\UrlModel;
use Auth;
use DataTables;
use DB;

use function GuzzleHttp\Promise\queue;

class UrlController extends Controller
{
    
	public function index(){
		return view('url.list_url');
	}


	public function tambah(){
		return view('url.tambah_url');
	}

	public function apiList(){
		$model = new UrlModel;
		$uid = 1;
		$query = "SELECT id,title,deskripsi FROM `urls` WHERE uid = :uid";
		$exec = DB::select($query, ['uid' => $uid]);
		#$exec  = $model::find($uid)->get();
		return datatables()->of($exec)
		// ->addColumn('urls', function($data){
		// 	$nama = json_decode($data->url);
		// 	return $nama;
		// })
		->addIndexColumn()
		->make(true);
	}

	public function detailList($id){
		
	}

	public function save(Request $request){

		$rules = array(
			'title' 	=> 'required|min:4',
			'desc'  	=> 'required',
			'nama'  	=> 'required|array',
			'nama.*'  	=> 'required|string|distinct|min:3',
			'url'   	=> 'required|array',
			'url.*'   	=> 'required|string|distinct|url',
		);
		$valid = Validator::make($request->post(), $rules);
		if($valid->fails()){
			dd($valid->errors());
		}else{
			
			$url = [];

			for($i=0; $i<count($request->post('url')); $i++){

				$merged = array(

					'nama' 	=> $request->post('nama')[$i],
					'url' 	=> $request->post('url')[$i]

				);

				$url[] = $merged;

			}
			
			$public = 0;
			
			if(!is_null($request->post('public'))){
				$public = 1;
			}

			$url = json_encode($url);
			$proses = new UrlModel;
			#$proses->uid   = Auth::user()->id; implemented soon!
			$proses->uid   = 1;
			$proses->title = $request->post('title');
			$proses->deskripsi = $request->post('desc');
			$proses->url = $url;
			$proses->public = $public;
			$proses->save();


		}

	}



	public function editPage($id){

		$model = new UrlModel;
		$data  = $model::find($id);
		
		if(is_null($data)){
			dd('Data tidak ditemukan!');
		}

		return view('url.edit_url', ['data' => $data]);

	}

}
