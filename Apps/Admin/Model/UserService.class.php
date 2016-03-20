<?php
namespace Admin\Model;
use Think\Model;
class UserService extends Model {
    public function login($username, $password){
        $user = D('Users');
        $condition = [];
        $condition['user_name'] = $username;
        $condition['password'] = $password;
        var_dump($user->select($condition));
    }
}