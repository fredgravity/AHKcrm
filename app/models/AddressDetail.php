<?php


namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;


class AddressDetail extends Model{

	use SoftDeletes;
	public $timestamp = true;
	protected $dates = ['deleted_at'];

	protected $fillable = ['customer_id', 'lead_id', 'address', 'city', 'state', 'country', 'website'];



		public function customer(){

			return $this->belongsTo(Customer::class);
			
		}



}
















?>