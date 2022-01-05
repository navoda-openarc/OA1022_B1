<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class myCont extends CI_Controller{

        public function index(){
            echo "Inside myCont <br/>";
        }

        public function method1(){
            echo "Inside myCont's method1 <br/>";
        }

        public function method2($a = 0){
            if($a > 0){
                //echo "Value of a is $a<br/>";
                return 1;
            }
            else{
                //echo "Invalid URL<br/>";
                return 0;
            }
        }

        public function method3($a = 0, $b = 0, $c = 0){
            echo "Value of a is $a <br/>";
            echo "Value of b is $b <br/>";
            echo "Value of c is $c <br/>";

        }

        public function method4($a = ''){
            if($a == ''){
                echo "Oops ... Something went wrong!";
            }
            else{
                echo $a;
            }
        }

        private function method5(){
            echo "Calling Method5 <br/>";
        }

        private function method6(){
            echo "Calling Method6 <br/>";
        }

        public function method7($a = 0){
            if($a == 5){
                echo " Method 5 <br/>";
                $this->method5();
            }
            else if($a == 6){
                echo "Method 6 <br/>";
                $this->method6();
            }
            else{
                echo "Other method<br/>";
            }
        }

        public function method8(){
            //Call the Hello view inside this

            $this->load->view('hello');
        }

        public function method9(){
            $data['name'] = "Nimal";

            $this->load->view('view1', $data);
        }

        public function method10(){
            //Adding Multiple Views
            $data['title'] = "Method 10";

            $this->load->view('common/top',$data);
            $this->load->view('view2');
            $this->load->view('common/bottom');
        }

        public function method11(){
            $data['title'] = "Student Details";
            $data['name'] = "Nimal";
            $data['age'] = 26;
            $data['address'] = "Colombo";


            $this->load->view('common/top', $data);
            $this->load->view('view3', $data);
            $this->load->view('common/bottom');
        }

        public function view_1(){
            $this->load->view('view4');
        }

        public function view_2(){
            $data['page_title'] = "Page 1";
            $data['title'] = "Title 1";
            $data['content'] = "Cotents for title 1";

            $this->load->view('visa_common/visa_header', $data);
            $this->load->view('visa_common/visa_navbar');
            $this->load->view('visa_common/visa_content', $data);
            $this->load->view('visa_common/visa_footer');
        }

        public function view_3(){
            $data['page_title'] = "Page 2";
            $data['title'] = "Title 2";
            $data['content'] = "Cotents for title 2";

            $this->load->view('visa_common/visa_header', $data);
            $this->load->view('visa_common/visa_navbar');
            $this->load->view('visa_common/visa_content', $data);
            $this->load->view('visa_common/visa_footer');
        }
    }

?>