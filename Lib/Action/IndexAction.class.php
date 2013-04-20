<?php
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