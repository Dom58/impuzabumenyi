<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Search extends Model
{
    public function scopeSearch($query, $s){
		return $query->where('mutagatifu','like','%' .$s. '%')->orwhere('date','like','%' .$s. '%')->orwhere('slug','like','%' .$s. '%')->orwhere('title','like','%' .$s. '%');
	}
}
