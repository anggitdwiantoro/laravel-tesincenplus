<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelUser extends Model
{

	protected $table = 'users';

    protected $fillable = [
		'username', 'password', 'fullname'
	];

	protected $hidden = [
		'password', 'token_key'
	];
}
