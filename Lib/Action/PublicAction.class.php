<?php
    class PublicAction extends Action{
        public function Verify(){
            import("ORG.Util.Image");
            Image::buildImageVerify(4, 1, png, 48, 22, 'Verify');
        }



        public function VerifyCheck(){
            $ret = array();
            if(session('Verify') != md5($this->_get('Verify'))){
                $ret['check'] = 0;
            }
            else{
                $ret['check'] = 1;
            }
            echo json_encode($ret);
        }



        public function __construct(){
            load("@.Member");
            $this->userInfo = (IsLogin() == false)?0:(IsLogin());
        }
    }