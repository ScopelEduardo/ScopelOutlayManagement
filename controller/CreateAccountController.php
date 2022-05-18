<?php

//todo verify already logged redirect to dashboard

if ($_POST) {
    try {
        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];

        $userRepository = new UserRepository();
        $user = $userRepository->readByUsername($username);
        if ($user){
            throw new \Exception("Username already exists in database!");
        }else{
            if($password == $confirmPassword){
                $user = new User();
                $user->setUsername($username);
                $user->setFirstname($firstname);
                $user->setLastname($lastname);
                $user->setPassword($password);

                $userRepository->create($user);
            }else{
                throw new \Exception("Password doesnt match!");
            }
        }
    }catch (\Exception $e){

    }
} else {
    //todo redirect
}