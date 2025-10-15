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

    const TABLES_SLUGS = array('academics_translations', 'conferences_translations', 'faq_translations', 'news_translations', 'program_translations', 'study_translations', 'testimonials_translations', 'tutorials_translations');

    const COLUMNS_SLUGS = array('academics_translations' => ['description'],
                                'conferences_translations' => ['long_description','short_description'],
                                'faq_translations' => ['answer'],
                                'news_translations' => ['description','text'],
                                'program_translations' => ['small_desc','general_desc','text'],
                                'study_translations' => ['description'],
                                'testimonials_translations' => ['text'],
                                'tutorials_translations' => ['text']);

    public function checkSlugChange($old_slugs, $new_slugs) {
		foreach(self::TABLES_SLUGS as $table) {
			$columns = self::COLUMNS_SLUGS[$table];
			$selected_columns = $columns;
			$selected_columns[] = 'id';
			$content_for_change = DB::table($table)->select($selected_columns)
			->where(function($q) use ($columns, $old_slugs) {
				foreach($columns as $column) {
					foreach ($old_slugs as $old_slug) {
						$q->orWhere($column, 'like', '%' . $old_slug . '%');
					}
				}
			})->get();
			if(count($content_for_change) > 0) {
				foreach($content_for_change as $content) {
				    $for_update = [];
				    foreach($columns as $col) {
				    	$temp = '';
				    	foreach(Config('languages') as $lang => $language) {
				    		if($temp == '') {
				    			$temp = str_replace($old_slugs[$lang] . '"', $new_slugs[$lang] . '"', $content->$col);
				    		}
				    		else{
				    			$temp = str_replace($old_slugs[$lang] . '"', $new_slugs[$lang] . '"', $temp);
				    		}
				    	}
				    	$for_update[] = [$col => $temp];
				    }
				    foreach ($for_update as $update_array) {
				     	DB::table($table)->where('id', $content->id)->update($update_array);
				    }
			 	}
			}
		}
	}
}


