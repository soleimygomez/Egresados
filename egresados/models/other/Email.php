<?php 

class Email{

    /*******************************************************
     * FUNCTIONS
     *******************************************************/
    public static function mail($to,$subject,$message, $headers){
        ini_set( 'display_errors', 1 );
		error_reporting( E_ALL );
        mail($to,$subject,$message, $headers);
    }
}