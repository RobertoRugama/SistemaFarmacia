<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailProduct extends Model
{
    protected $table = 'detail_products';
    protected $primaryKey='id';
	public $timestamps = false;
	protected $fillable = ['quantity','restriction', 'aviable', 'product_id'];
	protected $guarded = [];

	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
