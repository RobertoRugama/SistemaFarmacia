<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey='id';
	public $timestamps = false;
	protected $fillable = ['name','presentation', 'description', 'existence','reference', 'provider_id','laboratory_id','category_id'];
	protected $guarded = [];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}
	public function provider(){
		return $this->belongsTo(Provider::class);
	}

	public function laboratory(){
		return $this->belongsTo(Laboratory::class);
	}
}
