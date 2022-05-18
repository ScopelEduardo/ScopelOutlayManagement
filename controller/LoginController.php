<?php

//todo verify already logged redirect to dashboard
include ("../model/user/repository/UserRepository.php");
use ScopelOutlayManagement\model\repository\UserRepository;

if ($_POST) {
    print_r("asdasd");
    try {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $userRepository = new UserRepository();
        $user = $userRepository->readByUsername($username);
        if ($user){
            if (md5($password) == $user->getPassword()){
                //todo log user
            }else{
                throw new Exception("Wrong password");
            }
        }else{
            //todo logger
            throw new Exception("User not found!");
        }
    }catch (Exception $e){

    }
} else {
    //todo redirect
}
