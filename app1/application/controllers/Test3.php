<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Test3 extends CI_Controller{
        
        public function _remap($method, $param = array()){
            if($method === 'abc' && isset($param[0])){
                $this->abc($param[0]);
            }
            else if($method === 'lmn' && isset($param[0]) && isset($param[1])){
                $this->lmn($param[0], $param[1]);
            }
            else if($method === 'xyz'){
                $this->xyz();
            }
            else{
                echo "Oopz! something went wrong. Please contact the Admin!";
            }
        }

        public function abc($var1){
            echo "Calling abc function <br/>";
            echo $var1 . "<br/>";
        }
        
        public function lmn($var1, $var2){
            echo "Calling lmn function <br/>";
            echo $var1 . "<br/>";
            echo $var2 . "<br/>";
        }
        
        public function xyz(){
            echo "Calling xyz function <br/>";
        }
    }
?>