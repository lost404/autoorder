<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
        $this->id = $this->_get('id');
	    $this->display();
    }



    public function __construct(){
        load("@.Member");
        $this->userInfo = (IsLogin() == false)?0:(IsLogin());
    }
}