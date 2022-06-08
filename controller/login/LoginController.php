<?php

class LoginController extends AbstractController
{

    public static function execute()
    {
        session_start();
        if (isset($_SESSION['username'])) {
            header("Location: ./movimentacao/read");
        }
        $params = [];
        LoginView::execute($params);
    }
}