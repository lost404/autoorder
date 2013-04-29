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
            $this->display();
        }



        public function Add(){
            $this->display();
        }
    } 
?>
