<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $table='forums';

    protected $fillable=['id','name','description'];

    public function posts(){
    	return $this->hasMany(Post::class);
    }

}
