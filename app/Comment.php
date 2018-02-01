<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $guarded = [];
    protected static $commentable_for = ['Compterendu'];

    protected $hidden = ['email','ip'];
    protected $appends = ['email_md5', 'ip_md5'];

    public function getEmailMd5Attribute(){

    	return md5($this->attributes['email']);
    }

    public function getIpMd5Attribute(){

    	return md5($this->attributes['ip']);
    }

    public static function allFor($model,$model_id){

    	$records = self::where(['commentable_id' => $model_id, 'commentable_type' => $model])->orderBy('created_at','ASC')->get();
    	$comments = [];
    	$by_id = [];
    	foreach($records as $record){

    		if ($record->reply){

    			$by_id[$record->reply]->attributes['replies'][] = $record;

    		} else {

    			$record->attributes['replies'] = [];
    			$by_id[$record->id] = $record;
    			$comments[] = $record;
    		}

    	}
    	return array_reverse($comments);
    }

    public static function isCommentable($model, $model_id){

    	if(!in_array($model, self::$commentable_for)){
    		return false;
    	}else {
    		$model = "\\App\\$model";
    		return $model::where(['id' => $model_id])->exists();
    	}

    }
}
