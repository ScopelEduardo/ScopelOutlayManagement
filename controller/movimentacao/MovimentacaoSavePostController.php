<?php

class MovimentacaoSavePostController extends AbstractController
{
    public static function execute()
    {
        session_start();
        if (!isset($_SESSION['username'])) {
            header("Location: ../login");
        }
        $params = [];
        try {
            if ($_POST) {
                $user = UserRepository::readByUsername($_SESSION['username']);
                if (isset($_POST['id'])) {
                    $id = $_POST['id'];
                    $value = $_POST['value'];
                    $description = $_POST['description'] ?? '';
                    $model = MovimentacaoRepository::read($id);
                    if ($model) {
                        if ($model->getUserId() == $user->getId()) {
                            $model->setValue($value);
                            $model->setDescription($description);
                            MovimentacaoRepository::update($model);
                            header('Location: ./read');
                        } else {
                            throw new \Exception('Não é possivel alterar essa movimentação');
                        }
                    } else {
                        throw new \Exception('Movimentação não encontrada');
                    }
                } else {
                    $model = new MovimentacaoModel();
                    $userId = $user->getId();
                    $value = $_POST['value'];
                    $description = $_POST['description'] ?? '';
                    $model->setUserId($userId);
                    $model->setValue($value);
                    $model->setDescription($description);
                    MovimentacaoRepository::create($model);
                }
            }
            header('Location: ./read');

        } catch (\Exception $e) {
            // todo logger and params
            $params[] = ['error' => $e->getMessage()];
            header('Location: ./read');
        }
    }
}