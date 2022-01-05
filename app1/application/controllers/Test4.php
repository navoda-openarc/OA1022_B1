<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Test4 extends CI_Controller{

        public function _remap($method, $param = array()){
            if(method_exists($this, $method)){
                call_user_func_array(array($this, $method), $param);
            }
            else{
                echo "Oopz! something went wrong. Please contact the Admin!";
            }
        }

        public function abc($var1 = 0){
            echo "Calling abc function <br/>";
            echo $var1 . "<br/>";
        }
        
        public function lmn($var1 = 0, $var2 = 0){
            echo "Calling lmn function <br/>";
            echo $var1 . "<br/>";
            echo $var2 . "<br/>";
        }
        
        public function xyz(){
            echo "Calling xyz function <br/>";
        }
    }

?>