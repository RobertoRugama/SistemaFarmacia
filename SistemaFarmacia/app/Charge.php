<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    //
    protected $table = 'charges';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $fillable = ['name','description','salary'];
    protected $guarded = [];

}
