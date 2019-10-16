<?php

namespace Sistema;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Users extends Authenticatable
{
	use Notifiable;

	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [
		'name', 'email', 'password',
	];

	/**
	* The attributes that should be hidden for arrays.
	*
	* @var array
	*/
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	* The attributes that should be cast to native types.
	*
	* @var array
	*/
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	/**
	* The table associated with the model.
	*
	* @var string
	*/
	protected $table = 'users';

	/**
	* Get the comments for the blog post.
	*/
	public function user()
	{
		return $this->hasOne('Sistema\User', 'id');
	}

	public function comments()
	{
		return $this->hasMany('Sistema\Comments', 'user_id');
	}

	// this is a recommended way to declare event handlers
	public static function boot() {
		parent::boot();
        self::deleting(function($user) {
        	$user->comments()->each(function($comments) {
        		$comments->delete();
        	});
        });
    }
}