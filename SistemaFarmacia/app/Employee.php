<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['date_register','identification_card','first_name','second_name','first_last_name', 'second_last_name','address','user','previleges','charge_id'];
    protected $guarded = [];

    public function charge()
	{
		return $this->belongsTo(Charge::class);
	}
} 