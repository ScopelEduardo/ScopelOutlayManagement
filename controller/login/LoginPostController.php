<?php

class LoginPostController extends AbstractController
{

    public static function execute()
    {
        session_start();
        $params = [];
        if (!isset($_SESSION['username'])) {
            try {
                if (isset ($_POST['username']) && isset($_POST['password'])) {
                    $user = UserRepository::readByUsername($_POST['username']);
                    if ($user && $user->getPassword() == md5($_POST['password'])) {
                        session_start();
                        $_SESSION['username'] = $user->getUsername();
                    }
                    header('Location: ./movimentacao/read');
                } else {
                    header('Location: ./login');
                }
            } catch (\Exception $e) {
                $params[] = ['error' => $e->getMessage()];
                header('Location: ./login');
            }
        }else{
            header('Location: ./movimentacao/read');
        }
    }
}