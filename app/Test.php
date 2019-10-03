<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
	        'id',
	    	'user_id',
	    	'filename',
	    	'name',
	    	'description',
	    	'media_type',
	    	'datasize',
        ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getImageAttribute()
    {
    	return asset('storage/'.$this->filename);
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

}
