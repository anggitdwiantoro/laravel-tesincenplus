<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelPosts extends Model 
{

    protected $table = 'posts';

    protected $fillable = ['create_by', 'title', 'content'];
}
