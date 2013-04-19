<?php
    class OrderAction extends Action{
        public function Area(){
            $this->display();
        }



        public function View(){
            $this->display();
        }



        public function __construct(){
            load("@.Member");
            $this->userInfo = (IsLogin() == false)?0:(IsLogin());
        }
    }
?>