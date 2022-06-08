<?php

class MovimentacaoRepository extends AbstractRepository
{

    public static function create($model)
    {
        /** @var MovimentacaoModel $model */
        $conn = Connector::getConnector()->getConnection();
        $result = false;
        $userId = $model->getUserId();
        $value = $model->getValue();
        $description = $model->getDescription();

        $sql = "INSERT INTO movimentacao (user_id, value, description) VALUES ('$userId', '$value', '$description')";
        try {
            $conn->begin_transaction();
            $result = $conn->query($sql);
            $conn->commit();
        }catch (\Exception $e){
            //todo logger
            $conn->rollback();
        }
        return $result;
    }

    public static function delete($model)
    {
        /** @var MovimentacaoModel $model */
        $conn = Connector::getConnector()->getConnection();
        $id = $model->getId();
        $sql = "DELETE FROM movimentacao WHERE id = '$id'";
        $result = false;
        try {
            $result = $conn->query($sql);
        }catch (\Exception $e){
            //todo logger
        }
        return $result;
    }

    public static function getList(array $filters)
    {
        $where = '';
        $first = true;

        foreach ($filters as $filter){
            if (!$first){
                $where .= "AND";
            }
            $field = $filter['field'];
            $value = $filter['value'];
            $operator = $filter['operator'] ?? "=";
            $where .= "$field $operator '$value'";
            $first = false;
        }

        $movimetacoes = [];

        $conn = Connector::getConnector()->getConnection();
        if ($where){
            $sql = "SELECT * FROM movimentacao WHERE $where";
        }else{
            $sql = "SELECT * FROM movimentacao";
        }
        try {
            $result = $conn->query($sql);
        }catch (\Exception $e){
            //todo logger
        }
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $movimetacao = new MovimentacaoModel();
                $movimetacao->setData($row);
                $movimetacoes[] = $movimetacao;
            }
        }
        return $movimetacoes;

    }

    public static function read($id)
    {
        $conn = Connector::getConnector()->getConnection();
        $movimentacao = false;
        $sql = "SELECT * FROM movimentacao WHERE id = '$id'";
        try {
            $result = $conn->query($sql);
        }catch (\Exception $e){
            //todo logger
        }
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $movimentacao = new MovimentacaoModel();
                $movimentacao->setData($row);
            }
        }
        return $movimentacao;
    }

    public static function update($model)
    {
        /** @var MovimentacaoModel $model */
        $conn = Connector::getConnector()->getConnection();
        $result = false;
        $id = $model->getId();
        $userId = $model->getUserId();
        $value = $model->getValue();
        $description = $model->getDescription();
        $sql = "UPDATE movimentacao SET user_id = '$userId', value = '$value', description = '$description' WHERE id = '$id'";
        try {
            $conn->begin_transaction();
            $result = $conn->query($sql);
            $conn->commit();
        }catch (\Exception $e){
            //todo logger
            $conn->rollback();
        }
        return $result;
    }
}