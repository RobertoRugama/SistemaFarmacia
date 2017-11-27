<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    //
    protected $table = 'purchase_orders';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable = ['order_date','required_date', 'date_of_delivery','status','provider_id', 'employee_id'];
    protected $guarded = [];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
