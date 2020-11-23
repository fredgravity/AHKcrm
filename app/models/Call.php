<?php 

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;



class Call extends Model{
	use SoftDeletes;
	public $timestamp = true;
	protected $dates = ['deleted_at'];

	protected $fillable = ['customer_id', 'lead_id', 'user_id', 'call_date', 'description'];


	public function lead(){
			return $this->belongsTo(lead::class );

		}

	public function customer(){

		return $this->belongsTo(Customer::class);
		
	}

	public function user(){

		return $this->belongsTo(User::class);
		
	}


}








 ?>