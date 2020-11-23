<?php 



namespace App\classes;


class Redirect{
    
    public static function to($location=null){
        
        if($location){
            //check if headers have been sent
            if(!headers_sent()){
                //if location is numeric like 404
                if(is_numeric($location)){
                    switch($location){
                        case 404:
                            header('Location: '.PROOT.'/resources/views/errors/404');
                        break;
                    }
                    
                }else{
                    header("Location: $location");
                    exit();
                }
                
            }else{
                //if headers already sent then send again with javascript
                echo"
                    <script type='text/javascript'>
                        window.location.href='".PROOT.$location."'
                    </script>
                    
                    <noscript>
                        <meta http=equiv='refresh' content='@;url='".$location."
                    </noscript>
                ";
                exit();
            }
        }
    }
    
    
    public static function back(){
        //redirect back to same page;
        // pnd($_SERVER);
        $uri = $_SERVER['REQUEST_URI'];
        header("Location: $uri");

    }
    
    
    
    
}














?>