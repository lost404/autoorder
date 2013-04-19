<?php
    class NewsAction extends Action{
        public function View(){
            $this->display();
        }



        public function __construct(){
            load("@.Member");
            $this->userInfo = (IsLogin() == false)?0:(IsLogin());
        }



        public function ist(){
            $this->display();
        }
    } 
?>
