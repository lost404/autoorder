<?php
    class MemberInfoModel extends Model{
        protected $_validate = array(
            array('qq', '/^[0-9]{6,12}$/', '请输入正确的QQ号！', 1, 'regex'),
            array('phone', '/^[0-9]{11}$/', '请输入正确的手机号！', 1, 'regex'),
            );

        protected $_auto = array(

            );
    }
?>