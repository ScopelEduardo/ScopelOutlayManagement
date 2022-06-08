<?php

include_once ('C:\xampp3\htdocs\Trabalho2\model\login\UserModel.php');
include_once ('C:\xampp3\htdocs\Trabalho2\model\login\UserRepository.php');

use PHPUnit\Framework\TestCase;

class UserRepositoryTest extends TestCase
{
    public function testCreateUser(){

        $user = new UserModel();

        $user->setUsername("eduTeste");
        $user->setName("Eduardp");
        $user->setPassword("1234");

        $result = UserRepository::create($user);

        $this->assertTrue($result);

    }

    public function testUpdateUser(){
        $user = UserRepository::readByUsername('eduTeste');
        $id = $user->getId();

        $user->setData(
            [
                'id'=> $id,
                'username' => 'eduTeste',
                'name' => 'Juca',
                'password' => '123'
            ]
        );

        $result = UserRepository::update($user);

        $this->assertTrue($result);
    }

    public function testReadUser(){

        $user = UserRepository::readByUsername('eduTeste');

        $this->assertEquals('Juca', $user->getName());

        $this->assertEquals('202cb962ac59075b964b07152d234b70', $user->getPassword());

    }

    public function testDeleteUser(){
        $user = UserRepository::readByUsername('eduTeste');
        $result = UserRepository::delete($user);

        $this->assertTrue($result);
    }
}