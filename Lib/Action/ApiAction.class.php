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
                                $Ext = new Model();
                                $extSql = "INSERT INTO ao_memberext(uid, level, credit, cash)VALUES(". $result. ", 0, 0, 0)";
                                $data['data']['sql'] = $extSql;
                                $extRet = $Ext->execute($extSql);
                                $data['data']['extRet'] = $extRet;
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
                        $data['status'] = 2;
                        $data['info'] = L('regInfoError');
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
                            $data['info'] = L('regInfoOk');
                        }
                        else{
                            $data['status'] = 1;
                            $data['info'] = L('regInfoError');
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
                        $data['info']  = L('verifyError');
                    }
                    else{
                        $Member = M('Member');
                        $memberSelect = $Member->where("username='". $this->_post('username'). "'")->find();
                        if(!isset($memberSelect['uid']) || $memberSelect['uid'] < 0){
                            $data['status'] = 2;
                            $data['info']  = L('usernameNotExists');
                        }
                        else{
                            if(MemberCheckPassword($this->_post('password'), $memberSelect['salt'], $memberSelect['password']) == true){
                                MemberLoginByInfo($memberSelect);
                                $data['status'] = 0;
                                $data['info']  = L('loginOk');
                            }
                            else{
                                $data['status'] = 3;
                                $data['info']  = L('passwordError');
                            }
                        }
                    }
                    session('Verify', null);
                    break;

                

                case 'CheckUsername':
                    if(strlen($this->_get('username')) < 3 || strlen($this->_get('username')) > 8){
                        $data['status'] = 1;
                        $data['info'] = L('usernameFormatError');
                    }
                    else{
                        $Member = M('Member');
                        $result = $Member->where("username='". $this->_get('username'). "'")->find();
                        if(is_array($result)){
                            $data['status'] = 2;
                            $data['info'] = L('usernameReged');
                        }
                        else{
                            $data['status'] = 0;
                            $data['info'] = L('usernameNotReged');
                        }
                    }
                    break;

                case 'RegOk':
                    if(session('regStatus') == 4){
                        session('regStatus', null);
                        session('regSid', null);
                        session('regUid', null);
                        $data['status'] = 0;
                        $data['info'] = L('regOk');
                    }
                    else{
                        session('regStatus', 1);
                        $data['status'] = 1;
                        $data['info'] = L('regError');
                    }
                    break;

                default:

                    break;
       
            }
            $this->ajaxReturn($data, 'JSON');
        }
    }
?>
