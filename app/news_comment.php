<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class news_comment extends Model
{
	public function get_count($news_id){
		return $this->where('news',$news_id)->count();
	}
}
