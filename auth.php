<?php

class Auth{
    private function check_access($uid){
        //如果用户角色是1，则无需判断
        if($uid==1){
            return true;
        }
        $rule = strtolower(MODOULE_NAME.CONTROLER_NAME.ACTION_NAME);
        if(!empty($this->no_need_check_rules)){
            $tmp = [];
            foreach($this->no_need_check_rules as $item){
                $tmp[]=strtolower($item);
            }
            $this->no_need_check_rules =$tmp;
        }

        if(!in_array($rule,$this->no_need_check_rules)){
            return sp_auth_check($uid);
        }else{
            return true;
        }
    }

    private function _check_access(){
        $session_admin_id = session('ADMIN_ID');
        if(!empty($session_admin_id) && !empty($this->login_type)){
            $user_obj = M('Users');
            $user = $user_obj->where(array('id'=>$session_admin_id))->find();
            $user['setting'] = json_decode($user['setting'],true);
            $is_access = $this->check_access($session_admin_id);
            if(!$is_access){
                $this->error("您没有访问权");
            }
            $this->assign("admin",$user);
        }else{
            if(IS_AJAX){
                $this->error("您还没有登陆",U("managment/public/login"));
            }else{
                header("Location:".U("managment/public//login"));
                exit();
            }
        }
    }
}