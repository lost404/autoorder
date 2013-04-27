<?php
    class ApiAction extends Action{
        public function __construct(){
            load("@.Member");
            $this->userInfo = (IsLogin() == false)?0:(IsLogin());
        }



        public function Member(){
            load("@.Member");
            $data = array(
                'status' => -1,
                'info' => '',
                'data' => array()
                );
            switch($this->_get('Mod')){
                case 'Register':
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
                            session('regUid', $result);
                            $regSid = md5(md5(md5($result). session_id()). get_client_ip());
                            session('regSid', $regSid);
                            if($result) {
                                $data['status'] = 0;
                                $data['data']['uid'] = $result;
                                session('regStatus', 3);
                                $data['info'] = L('registerSuccess');
                            }
                            else{
                                $data['status'] = 3;
                                $data['info'] = L('registerFail');
                            }
                        }
                    }
                    session('Verify', null);
                    break;

                

                case 'RegisterInfo':
                    $Member = M("Member");
                    $regSid = md5(md5(md5(session('regUid')). session_id()). get_client_ip());
                    if($regSid != $this->_post('regSid')){
                        $data['status'] = 3;
                        $data['info'] = 'regSId error!';
                    }
                    else{
                        $info = array(
                            'qq' => $this->_post('qq'),
                            'phone' => $this->_post('phone'),
                            'sex' => $this->_post('sex'),
                            'professional' => $this->_post('professional'),
                            'introduction' => $this->_post('introduction')
                            );
                        $result = $Member->where('uid='.session('regUid'))->save($info);
                        if($result) {
                            $data['status'] = 0;
                            session('regStatus', 4);
                            $data['info'] = '注册成功.您已经成功注册了，如果浏览器没有自动跳转，请单击&nbsp;&nbsp;<a href="'. __APP__. '/Member/Login">此处</a>&nbsp;&nbsp;进行跳转！';
                        }
                        else{
                            $data['status'] = 2;
                            $data['info'] = '注册失败.请确认您的注册信息，如果浏览器没有自动跳转，请单击&nbsp;&nbsp;<a href="'. __APP__. '/Member/Register">此处</a>&nbsp;&nbsp;进行重新注册！';
                        }
                    }
                    session('Verify', null);
                    break;

                

                case 'Agree':
                    if(session('regStatus') == 1){
                        session('regStatus', 2);
                        $data['status'] = 0;
                        $data['info'] = L('agreeOk');
                    }
                    else{
                        session('regStatus', 1);
                        $data['status'] = 1;
                        $data['info'] = L('agreeError');
                    }
                    break;

                

                case 'Login':
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
                    session('Verify', null);
                    break;

                

                case 'CheckUsername':
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
                    break;

                default:

                    break;
       
            }
            $this->ajaxReturn($data, 'JSON');
        }
    }
?>
