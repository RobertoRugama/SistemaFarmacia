<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    protected $table = 'purchase_details';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable = ['requested_amount','unit_value', 'discount','purchase_order_id','product_id'];
    protected $guarded = [];

    public function purchase()
    {
        return $this->belongsTo(PurchaseOrder::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
