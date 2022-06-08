<?php

include_once ('C:\xampp3\htdocs\Trabalho2\model\AbstractModel.php');

class MovimentacaoModel extends AbstractModel implements ModelInterface
{
    private $id;
    private $userId;
    private $value;
    private $description;
    private $createdAt;

    public function getData()
    {
        return [
            'id' => $this->id,
            'user_id' => $this->userId,
            'value' => $this->value,
            'description' => $this->description,
            'created_at' => $this->createdAt
        ];
    }

    public function setData(array $params)
    {
        $this->id = $params['id'] ?? '';
        $this->userId = $params['user_id'] ?? '';
        $this->value = $params['value'] ?? '';
        $this->description = $params['description'] ?? '';
        $this->createdAt = $params['created_at'] ?? '';
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }



}