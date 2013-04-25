<?php
    class MemberInfoModel extends Model{
        protected $_validate = array(
            array('email', '/^([a-zA-Z0-9_-])+@[a-zA-Z0-9]+((\.|-)[a-zA-Z0-9]+)*\.[a-zA-Z0-9]+$/', '邮箱格式错误，请输入username@domain.com样式的邮箱！', 1, 'regex'),
            array('qq', '/^[0-9]{6,12}$/', '请输入正确的QQ号！', 1, 'regex'),
            array('phone', '/^[0-9]{11}$/', '请输入正确的手机号！', 1, 'regex'),
            array('sex', '/^[0|1]$/', '', 1, 'regex')
            );

        protected $_auto = array(

            );
    }
?>