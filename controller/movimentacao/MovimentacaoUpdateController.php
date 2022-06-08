<?php

class MovimentacaoUpdateController extends AbstractController
{

    public static function execute()
    {
        session_start();
        if (!isset($_SESSION['username'])) {
            header("Location: ../login");
        }
        if (isset($_GET['id'])) {
            $model = MovimentacaoRepository::read($_GET['id']);
            $params = $model->getData();
            MovimentacaoUpdateView::execute($params);
        }else{
            header("Location: ./read");
        }
    }
}