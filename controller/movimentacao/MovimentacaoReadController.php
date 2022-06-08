<?php

class MovimentacaoReadController extends AbstractController
{

    public static function execute()
    {
        session_start();
        if (!isset($_SESSION['username'])) {
            header("Location: ../login");
        }
        $params = [];

        $user = UserRepository::readByUsername($_SESSION['username']);

        $filters = [];

        $filters[] = ['field' => 'user_id', 'value' => $user->getId()];

        $params = ['list' => MovimentacaoRepository::getList($filters)];

        MovimentacaoReadView::execute($params);

    }
}