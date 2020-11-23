<?php


namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Lead extends Model{
	use SoftDeletes;
	public $timestamp = true;
	protected $dates = ['deleted_at'];

	protected $fillable = ['customer_id', 'contact_name', 'contact_phone', 'contact_email','image_path', 
	'contact_designation', 'lead_source', 'lead_assigned', 'lead_comment', 'lead_status'];


	public function customer(){

		return $this->belongsTo(Customer::class);

	}


	public function call(){

		return $this->hasMany(Call::class);
		
	}


	
}























?>