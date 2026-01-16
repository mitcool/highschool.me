<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\HelpDesk;

use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function upload_file($request_file,$path){
		$filename = $request_file->getClientOriginalName();
        $request_file->move($path, $filename);
		return $filename;
	}
   
	public function unique_code($limit){
		return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
	}

	 public function setHelpDeskNumber(){
    	$next_help_desk = HelpDesk::count() == 0 ? 1 : HelpDesk::count() + 1;
        $numlength = strlen((string)$next_help_desk);
    	$help_desk_number = '00';
       
        for ($i = 3; $i <= (6 - $numlength); $i++) {
            $help_desk_number .= '0';
        }
        $help_desk_number .= $next_help_desk;
    	return $help_desk_number;
    }
        
}


