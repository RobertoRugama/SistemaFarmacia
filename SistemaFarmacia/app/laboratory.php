<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class laboratory extends Model
{
    //
    protected $table = 'laboratories';
    protected $primaryKey='id';
	public $timestamps = false;
	protected $fillable = ['name', 'type', 'location'];
	protected $guarded = [];
}
