<?php
    function IsLogin(){
        if(cookie('uid') != null && cookie('RD') != null ){
            if(session('uid') == cookie('uid') && md5(session('RD')) == cookie('RD')){
                $userInfo = json_decode(session('userInfo'), true);
                load("@.Member");
                $sign = MemberSign($userInfo, session('RD'));
                if($sign != cookie('sid')){
                    return false;
                }
                else{
                    return MemberGetInfo();
                }

            }
        }
        else{
            return false;
        }
    }



    function page($page, $pages, $url){
        $pageRet = '';
        if($page < 5){
            //$pageRet.= ($page == 1)?('<li><a type="prev">'. L('Previous'). '</a></li>'):('<li><a type="prev" href="'. $url. $page-1. '">'. L('Previous'). '</a></li>');
            for($i = 1; $i < $pages+1; $i++){
                if($i = $page){
                    $pageRet.= '<li class="ch-pagination-current"><a href="'. $url. $i. '">'. $i. '</a></li>';
                }
                else{
                    $pageRet.= '<li><a href="'. $url. $i. '">'. $i. '</a></li>';
                }
            }
        }
    }

?>