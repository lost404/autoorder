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
?>