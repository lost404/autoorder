<?php
    class NewsAction extends Action{
        public function View(){
            $this->display();
        }



        public function __construct(){
            load("@.Member");
            $this->userInfo = (IsLogin() == false)?0:(IsLogin());
        }



        public function Index(){
            $this->display();
        }



        public function Add(){
            $this->display();
        }
    } 
?>
