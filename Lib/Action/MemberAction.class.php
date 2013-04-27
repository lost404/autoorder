<?php
    //load("@.Member");
    class MemberAction extends Action{
        public function  __construct(){
            load("@.Member");
            $this->userInfo = (IsLogin() == false)?0:(IsLogin());
        }



        public function Register(){
            if($this->userInfo == 0){
                $this->step = intval($this->_get('Step'));
                $this->regStatus = session('regStatus');
                if(!isset($this->regStatus) || !in_array($this->regStatus ,array(1, 2, 3, 4))){
                    session('regStatus', 1);
                    header('location:'. __ACTION__. '/Step/1');
                }
                if($this->step < 1 || $this->step > 4) header('location:'. __ACTION__. '/Step/1');
                if($this->step != session('regStatus')){
                    header('location:'. __ACTION__. '/Step/'. session('regStatus'));
                }
                $this->display('RegisterStep');
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