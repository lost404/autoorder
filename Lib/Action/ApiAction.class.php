<?php
    class ApiAction extends Action{
        public function __construct(){
            load("@.Member");
            $this->userInfo = (IsLogin() == false)?0:(IsLogin());
        }



        public function Member(){
            load("@.Member");
            switch($this->_get('Mod')){
                case 'Register':
                    $data = array();
                    $data['data'] = array();
                    if(session('Verify') != md5($this->_post('verify'))){
                        $data['status'] = 1;
                        $data['info'] = L('verifyError');
                    }
                    else{
                        $Member = D("Member");
                        if (!$Member->create()){
                            $data['status'] = 2;
                            $data['info'] = $Member->getError();
                        }
                        else{
                            $result = $Member->add();
                            if($result) {
                                $data['status'] = 0;
                                $data['data']['uid'] = $result;
                                session('regStatus', 3);
                                $data['info'] = '<meta http-equiv="refresh" content="3;url='. __APP__. '/Member/Login">'. '<div class="ch-box-ok"><h2>注册成功</h2><p>您已经成功注册了，如果浏览器没有自动跳转，请单击&nbsp;&nbsp;<a href="'. __APP__. '/Member/Login">此处</a>&nbsp;&nbsp;进行跳转！</p></div>';
                            }
                            else{
                                $data['status'] = 3;
                                $data['info'] = '<meta http-equiv="refresh" content="3;url='. __APP__. '/Member/Register">'. '<div class="ch-box-error"><h2>注册失败</h2><p>请确认您的注册信息，如果浏览器没有自动跳转，请单击&nbsp;&nbsp;<a href="'. __APP__. '/Member/Register">此处</a>&nbsp;&nbsp;进行重新注册！</p></div>';
                            }
                        }
                    }
                    $this->ajaxReturn($data, 'JSON');
                    session('Verify', null);
                    break;

                case 'RegisterInfo':
                    $data = array();
                    $data['data'] = array();
                    $Member = D("Member");
                    if (!$Member->create()){
                        $data['status'] = 1;
                        $data['info'] = '<div class="ch-box-error"><h2>错误信息</h2><p><b>'. $Member->getError(). '</b></p><p><a>请关闭此对话框返回修改您的注册信息并重新提交！</a></p></div>';
                    }
                    else{
                        $result = $Member->where("'uid='". $this->_get('Uid'). "'" )->save($info);
                        if($result) {
                            $data['status'] = 0;
                            $data['info'] = '<meta http-equiv="refresh" content="3;url='. __APP__. '/Member/Login">'. '<div class="ch-box-ok"><h2>注册成功</h2><p>您已经成功注册了，如果浏览器没有自动跳转，请单击&nbsp;&nbsp;<a href="'. __APP__. '/Member/Login">此处</a>&nbsp;&nbsp;进行跳转！</p></div>';
                        }
                        else{
                            $data['status'] = 2;
                            $data['info'] = '<meta http-equiv="refresh" content="3;url='. __APP__. '/Member/Register">'. '<div class="ch-box-error"><h2>注册失败</h2><p>请确认您的注册信息，如果浏览器没有自动跳转，请单击&nbsp;&nbsp;<a href="'. __APP__. '/Member/Register">此处</a>&nbsp;&nbsp;进行重新注册！</p></div>';
                        }
                    }
                    $this->ajaxReturn($data, 'JSON');
                    session('Verify', null);
                    break;

                case 'Login':
                    $data = array();
                    $data['data'] = array();
                    if(session('Verify') != md5($this->_post('verify'))){
                        $data['status'] = 1;
                        $data['info']  = '<div class="ch-box-error"><h2>错误信息</h2><p><b>您的验证码输入错误！</b></p><p><a>请关闭此对话框返回刷新验证码并重新提交！</a></p></div>';
                    }
                    else{
                        $Member = M('Member');
                        $memberSelect = $Member->where("username='". $this->_post('username'). "'")->find();
                        if(!isset($memberSelect['uid']) || $memberSelect['uid'] < 0){
                            $data['status'] = 2;
                            $data['info']  = '<div class="ch-box-error"><h2>错误信息</h2><p>用户名不存在，请关闭此窗口确认您的用户名是否正确并重新登录！</p></div>';
                        }
                        else{
                            if(MemberCheckPassword($this->_post('password'), $memberSelect['salt'], $memberSelect['password']) == true){
                                MemberLoginByInfo($memberSelect);
                                $data['status'] = 0;
                                $data['info']  = '<meta http-equiv="refresh" content="3;url='. __APP__. '/Index/index">'. '<div class="ch-box-ok"><h2>登录成功</h2><p>您已经成功登录，如果浏览器没有自动跳转，请单击&nbsp;&nbsp;<a href="'. __APP__. '">此处</a>&nbsp;&nbsp;进入首页。</p></div>';
                            }
                            else{
                                $data['status'] = 3;
                                $data['info']  = '<div class="ch-box-error"><h2>错误信息</h2><p>密码错误，请关闭此窗口确认您的密码是否正确并重新登录！</p></div>';
                            }
                        }
                    }
                    $this->ajaxReturn($data, 'JSON');
                    session('Verify', null);
                    break;

                case 'CheckUsername':
                    $data = array();
                    $data['data'] = array();
                    if(strlen($this->_get('username')) < 3 || strlen($this->_get('username')) > 8){
                        $data['status'] = 1;
                        $data['info'] = '用户名长度请在3-8位之间！';
                    }
                    else{
                        $Member = M('Member');
                        $result = $Member->where("username='". $this->_get('username'). "'")->find();
                        if(is_array($result)){
                            $data['status'] = 2;
                            $data['info'] = '该用户名已被注册！';
                        }
                        else{
                            $data['status'] = 0;
                            $data['info'] = '该用户名可以注册！';
                        }
                    }
                    $this->ajaxReturn($data, 'JSON');
                    break;

                default:

                    break;
            }
        }
    }
?>
