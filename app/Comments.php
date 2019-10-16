<?php

namespace Sistema;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [
		'message', 'user_id', 'created_at', 'updated_at',
	];

	/**
	* The attributes that are mass assignable.
	*
	* @var string
	*/
	public function user()
	{
		return $this->hasOne('Sistema\User','id','user_id');
	}
}