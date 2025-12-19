<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function upload_file($request_file,$path){
		$filename = $request_file->getClientOriginalName();
        $request_file->move($path, $filename);
		return $filename;
	}
   
	public function unique_code($limit)
	{
	return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
	}
        
}


