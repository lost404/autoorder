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



    function aoPage($page, $pages, $url){
        $pageRet = '';
        $pageRet.= '<li><a type="prev" href="'. $url. '1">'. L('Index'). '</a></li>';
        if($page == 1){
            $pageRet.= '<li><a>'. L('Previous'). '</a></li>';
        }
        else{
            $temp = $page - 1;
            $pageRet.= '<li><a type="prev" href="'. $url. $temp. '">'. L('Previous'). '</a></li>';
        }
        if($pages < 5){
            for($i = 1; $i < $pages+1; $i++){
                if($i == $page){
                    $pageRet.= '<li class="ch-pagination-current"><a href="'. $url. $i. '">'. $i. '</a></li>';
                }
                else{
                    $pageRet.= '<li><a href="'. $url. $i. '">'. $i. '</a></li>';
                }
            }
        }
        else{
            if($page < 5){
                for($i = 1; $i < 6; $i++){
                    if($i == $page){
                        $pageRet.= '<li class="ch-pagination-current"><a href="'. $url. $i. '">'. $i. '</a></li>';
                    }
                    else{
                        $pageRet.= '<li><a href="'. $url. $i. '">'. $i. '</a></li>';
                    }
                }
            }
            elseif($page > $pages - 4) {
                for($i = $pages-4; $i < $pages+1; $i++){
                    if($i == $page){
                        $pageRet.= '<li class="ch-pagination-current"><a href="'. $url. $i. '">'. $i. '</a></li>';
                    }
                    else{
                        $pageRet.= '<li><a href="'. $url. $i. '">'. $i. '</a></li>';
                    }
                }
            }
            else{
                for($i = $page-2; $i < $page+3; $i++){
                    if($i == $page){
                        $pageRet.= '<li class="ch-pagination-current"><a href="'. $url. $i. '">'. $i. '</a></li>';
                    }
                    else{
                        $pageRet.= '<li><a href="'. $url. $i. '">'. $i. '</a></li>';
                    }
                }
            }
        }
        if($page == $pages){
            $pageRet.= '<li><a>'. L('Next'). '</a></li>';
        }
        else{
            $temp = $page + 1;
            $pageRet.= '<li><a type="next" href="'. $url. $temp. '">'. L('Next'). '</a></li>';
        }
        $pageRet.= '<li><a type="next" href="'. $url. $pages. '">'. L('Last'). '</a></li>';
        return $pageRet;
    }

?>