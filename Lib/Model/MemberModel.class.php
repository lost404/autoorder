<?php
    class MemberModel extends Model{
        protected $_validate = array(
            array('username', '/^([\x{4e00}-\x{9fa5}a-zA-Z]){1}([\x{4e00}-\x{9fa5}a-zA-Z0-9_]){2,7}$/u', '请输入3-8位的以汉字或大小写字母开头的的用户名！', 1, 'regex'),
            array('password', 'password2', '两次输入的密码不一致！', 1, 'confirm'),
            array('password', '/^([a-zA-Z0-9_-]){8,16}$/', '请输入8-16位的大小写字母，数字，下划线组成的密码！', 1, 'regex'),
            array('password2', '/^([a-zA-Z0-9_-]){8,16}$/', '请输入8-16位的大小写字母，数字，下划线组成的确认密码！', 1, 'regex'),
            array('email', '/^([a-zA-Z0-9_-])+@[a-zA-Z0-9]+((\.|-)[a-zA-Z0-9]+)*\.[a-zA-Z0-9]+$/', '邮箱格式错误，请输入username@domain.com样式的邮箱！', 1, 'regex'),
            array('qq', '/^[0-9]{6,12}$/', '请输入正确的QQ号！', 1, 'regex'),
            array('phone', '/^[0-9]{11}$/', '请输入正确的手机号！', 1, 'regex')
            );

        protected $_auto = array(
            array('salt', 'GetSalt', 1, 'callback'),
            array('password', 'aoMd5', 1, 'callback'),
            array('regTime', 'time', 1, 'function'),
            array('group', 0)
            );

        public $salt = '';


        public function aoMd5(){
            $password = $_POST['password'];
            $temp = md5($password);
            $len_1 = strlen($password);
            $part_1 = substr($temp, 0, $len_1);
            $len_2 = $len_1 - 16;
            $part_2 = substr($temp, 0, $len_2);
            $md = md5(md5(md5(md5($this->salt). $part_1). $password). $part_2);
            return $md;
        }


        public function GetSalt(){
            $salt = rand(100000000, 999999999);
            $this->salt = $salt;
            return $salt;
        }
    }
?>
