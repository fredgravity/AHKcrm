<?php


namespace App\classes;

use Illuminate\Database\Capsule\Manager as Capsule;

class ValidateRequest{
    
    private static $_error = [];
    private static $_messages = [
        'strings'    => "The :attribute field should contain only alphabets",
        'numbers'    => "The :attribute field should contain only numbers eg 20.12, 2",
        'required'  => "The :attribute field is required",
        'minLength' => "The :attribute field must be a minimum of :policy characters",
        'maxLength' => "The :attribute field must be a maximum of :policy characters",
        'mixed'     => "The :attribute field should contain only alphabets, numbers, dashes and spaces",
        'email'     => "The Email provided is Invalid",
        'unique'    => "The :attribute already exists, Please Try another"
        
    ]; 
    
    public function __construct(){
        
    }
    
    //PROCESS INCOMING POST DATA AND RULES
    public function abide($postMethodData=[] , array $postRules ){
        
        foreach($postMethodData as $postKey => $postValue){
            //check if postkey is in rules
            if(array_key_exists($postKey, $postRules)){
               //process validation
                $data = [
                    'column' => $postKey,
                    'value' => $postValue,
                    'rules' => $postRules[$postKey],
                ];
                
                self::doValidation($data);
            }
        }
    }
    
    //RUN VALIDATION OF THE INCOMING DATA
    public static function doValidation($data=[]){
        $postKey = $data['column'];
        $postValue = $data['value'];
        $postRules = $data['rules'];
        
        foreach($postRules as $rule => $value){
            
            //call this class and run the method associated
            $valid = call_user_func_array([self::class, $rule],[$postKey, $postValue, $value]); //true or false
            
            //!true = false
            if(!$valid){
                self::setError(str_replace([':attribute', ':policy', '_'], [$postKey, $value, ' '] , self::$_messages[$rule]), $postKey);
            }
        }
        
    }
    
    
    //SET ERRORS
    public static function setError($error, $postKey){
        if($postKey){
            self::$_error[$postKey][] = $error;
        }else{
            self::$_error[] = $error; 
        }
    }
    
    
    //CHECK IF THERE ARE ERRORS
    public function hasError(){
        return (count(self::$_error) > 0)? true: false;
    }
    
    
    //GET ERROR MESSAGE
    public function getErrorMessages(){
        //pr(self::$_error);
        return self::$_error;
    }
    
    //value is table name
    public static function  unique($postKey, $postValue, $value){
        if($postValue != '' && !empty(trim($postValue))){
            //check if post value is in database
            return !Capsule::table($value)->where($postKey, $postValue)->exists();
        }
    }
    
    
    public static function required($postKey, $postValue, $value){
        return $postValue != null && !empty(trim($postValue));
    }
    
    
    public static function minLength($postKey, $postValue, $value){
        if( $postValue != null && !empty($postValue)){
            return strlen($postValue) >= $value; //will return true if more or 
        }
        return true;
    }
    
    
    public static function maxLength($postKey, $postValue, $value){
        if( $postValue != null && !empty($postValue)){
            return strlen($postValue) <= $value; 
        }
        return true;
    }
    
    
    public static function email($postKey, $postValue, $value){
        if ($postValue != null && !empty($postValue)){
            $email = filter_var($postValue, FILTER_SANITIZE_EMAIL);
            return filter_var($email, FILTER_VALIDATE_EMAIL);
        }
        return true;
    }
    
    
    public static function mixed($postKey, $postValue, $value){
        if($postValue != null && !empty($postValue)){
            
            if(!preg_match('/^[A-Za-z0-9 .,_~\-!@#\&%\^\'\*\(\)]+$/', $postValue)){
                return false;
            }
        }
        
        return true;
    }
    
    
    public static function numbers($postKey, $postValue, $value){
        if($postValue != null && !empty($postValue)){
            if(!preg_match('/^[0-9.]+$/', trim($postValue))){
                return false;
            }
        }
        
        return true;
    }
    
    
     public static function strings($postKey, $postValue, $value){
        if($postValue != null && !empty($postValue)){
            if(!preg_match('/^[a-zA-Z. ]+$/', $postValue)){
                return false;
            }
        }
        
        return true;
    }
    
    
    
    
    
}




    













?>