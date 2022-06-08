<?php

class MovimentacaoDeleteGetController extends AbstractController
{

    public static function execute()
    {
        session_start();
        if (!isset($_SESSION['username'])) {
            header("Location: ../login");
        }
        $params = [];
        try {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $user = UserRepository::readByUsername($_SESSION['username']);
                $model = MovimentacaoRepository::read($id);
                if ($model) {
                    if ($model->getUserId() == $user->getId()) {
                        MovimentacaoRepository::delete($model);
                        header('Location: ./read');
                    }else{
                        throw new \Exception('Não é possivel remover essa movimentação');
                    }
                } else {
                    throw new \Exception('Movimentação não encontrada');
                }
            } else {
                header('Location: ./read');
            }
        } catch (\Exception $e) {
            $params[] = ['error' => $e->getMessage()];
            header('Location: ./read');
        }

    }
}