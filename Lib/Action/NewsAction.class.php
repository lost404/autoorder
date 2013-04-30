<?php
    class NewsAction extends Action{
        public function View(){
            $nid = intval($this->_get('Id'));
            $News = M('News');
            $this->data = $News->where('nid='. $nid)->find();
            if($this->data['nid'] == null){
                $this->display('NoNews');
            }
            else{
                $this->display();
            }
        }



        public function __construct(){
            load("@.Member");
            $this->userInfo = (IsLogin() == false)?0:(IsLogin());
        }



        public function Index(){
            $page = intval($this->_get('P'));
            $News = M('News');
            $this->count = $News->count();
            $this->pages = ($this->count - $this->count % 10) / 10 + 1;
            if($page < 1 || $page > $this->pages){
                header('location:'. __ACTION__. '/P/1');
            }
            else{
                $this->news = $News->order('nid desc')->page($page, 10)->select();
            }
            $this->display();
        }



        public function Add(){
            $this->display();
        }
    } 
?>
