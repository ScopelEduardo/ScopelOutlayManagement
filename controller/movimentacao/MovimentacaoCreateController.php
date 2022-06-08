<?php

class MovimentacaoCreateController extends AbstractController
{
    public static function execute()
    {
        session_start();
        if (!isset($_SESSION['username'])) {
            header("Location: ../login");
        }
        $params = [];
        MovimentacaoCreateView::execute($params);
    }
}