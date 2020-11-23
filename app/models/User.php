<?php


namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;


class User extends Model{
    use SoftDeletes;
    public $timestamp = true;
    protected $fillable =[ 'username', 'email', 'phone', 'address', 'state', 'city', 'member_id', 'role', 'designation', 'create_at', 'image_path' ];
    protected $dates = ['deleted_at'];
    
    
    
    public function transformToArray(){
        
    }


    public function call(){

		return $this->hasMany(Call::class);
		
	}

    
}

















?>