<?php
    //load("@.Member");
    class MemberAction extends Action{
        public function  __construct(){
            load("@.Member");
            $this->userInfo = (IsLogin() == false)?0:(IsLogin());
        }



        public function Register(){
            if($this->userInfo == 0){
                $this->display();
            }
            else{
                $this->display("AlreadyLogin");
                $this->error("You have already logined! ");
            }
        }


        public function Info(){
            $user = M('member');
            $this->data = $user->select();
            $this->display();
        }



        public function Login(){
            if($this->userInfo == 0){
                $this->display();
            }
            else{
                $this->display("AlreadyLogin");
                $this->error("You have already logined! ");
            }
        }



        public function Logout(){
            MemberLogout();
            $this->display();
        }
    }
?>