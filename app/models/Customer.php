<?php


namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;


class Customer extends Model{

		use SoftDeletes;
		public $timestamp = true;
		protected $dates = ['deleted_at'];

		protected $fillable = ['company', 'phone', 'email', 'leads'];

		

		public function lead(){
			return $this->hasOne(lead::class );

		}


		public function address_detail(){

			return $this->hasMany(AddressDetail::class);
			
		}


		public function call(){

		return $this->hasMany(Call::class);
		
	}





}


























?>