<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Test2 extends CI_Controller{

        public function f1(){
            echo "Calling Function 1";
            echo "<br/>";
            $this->_f3();
        }

        private function f2(){
            echo "Calling Function 2";
        }

        public function _f3(){
            echo "Calling Function 3";
        }
        
    }

?>