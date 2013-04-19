<?php
    function MemberLogin(){
        echo "Login Success";
    }



    function MemberPasswordMd($password, $salt){
        $temp = md5($password);
        $len_1 = strlen($password);
        $part_1 = substr($temp, 0, $len_1);
        $len_2 = $len_1 - 16;
        $part_2 = substr($temp, 0, $len_2);
        $md = md5(md5(md5(md5($salt). $part_1). $password). $part_2);
        return $md;
    }



    function MemberCheckPassword($password, $salt, $passwordMd){
        $passwordMd2 = MemberPasswordMd($password, $salt);
        if($passwordMd == $passwordMd2){
            return true;
        }
        else{
            return false;
        }
    }



    function MemberLoginByInfo($info){
        cookie('uid', $info['uid'], array('expire' => 3600));
        $rand = rand(100000000, 999999999);
        $rand = base64_encode($rand);
        $sign = MemberSign($info, $rand);
        cookie('RD', md5($rand), array('expire' => 3600));
        cookie('sid', $sign, array('expire' => 3600));
        session('uid', $info['uid']);
        session('userInfo', json_encode($info));
        session('RD', $rand);
        session(array('name' => 'uid', 'expire' => 3600));
        session(array('name' => 'userInfo', 'expire' => 3600));
        session(array('name' => 'RD', 'expire' => 3600));
        cookie('PHPSESSID', cookie('PHPSESSID'), array('expire' => 3600));
    }



    function MemberSign($param, $rand){
        ksort($param);
        $sign = md5(http_build_query($param));
        foreach ($param as $key => $value) {
            $sign = md5($sign. $value);
        }
        $sign = md5($param. base64_decode($rand));
        return $sign;
    }



    function MemberGetINfo(){
        $temp = json_decode(session('userInfo'), true);
        return $temp;
    }



    function MemberLogout(){
        cookie('uid', null);
        cookie('RD', null);
        cookie('sid', null);
        session('uid', null);
        session('userInfo', null);
        session('RD', null);
        cookie('PHPSESSID', null);
    }
?>