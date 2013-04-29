<?php
class IndexAction extends Action {
    public function index(){
        $this->id = $this->_get('id');
        $News = M('News');
        $this->news = $News->order('nid desc')->limit('5')->select();
        $this->display();
    }



    public function __construct(){
        load("@.Member");
        $this->userInfo = (IsLogin() == false)?0:(IsLogin());
    }
}