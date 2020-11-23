<?php


namespace App\classes;


class Session{
    
    
    public function __construct(){
        
    }
    
    
    //SET/CREATE SESSION
    public static function set($name, $value){
        if($name != '' && !empty($name) && $value != '' && !empty($value)){
            return $_SESSION[$name] = $value;
        }
        throw new \Exception ('Session Name and Value required');
    }
    
    //GET SESSION VALUE
    public static function get($name){
        if(self::exist($name)){
            return $_SESSION[$name];
        }
        
    }
    
    //SESSION EXIST
    public static function exist($name){
       if($name != '' && !empty($name)){
           return isset($_SESSION[$name])? true : false; 
           
       }
        throw new \Exception('Session Name is required');
    }
    
    
    //SESSION REMOVE
    public static function delete($name){
        if(self::exist($name)){
            unset($_SESSION[$name]);
        }
    }
    
    
    //SESSION FLASH
    public static function flash($name, $string='', $errorArray=[]){
        if ($string != '' || $errorArray != []) {
            ($string != '')? $value = $string : $value = $errorArray;

            if(self::exist($name)){
                $flash = self::get($name);
                self::delete($name);
                return $flash;
            }
            self::set($name, $value);
                        
        }else{
             if(self::exist($name)){
                $flash = self::get($name);
                self::delete($name);
                return $flash;
            }
           
        }

    }
    
    
    //USER AGENT
    public static function uagentNoVersion(){
        $uagent = $_SERVER['HTTP_USER_AGENT'];
        $regx = '/\/[0-9A-Za-z.]+/';
        $newUagent = preg_replace($regx, '', $uagent);
        return $newUagent;
            
    }
    
}
















?>