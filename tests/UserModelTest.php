<?php

include_once ('C:\xampp3\htdocs\Trabalho2\model\login\UserModel.php');

use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
    public function testGetAndSetData(){
        $user = new UserModel();

        $userData = [
            'id' => 2,
            'username' => 'edu',
            'name' => 'eduardo',
            'lastname' => '',
            'password' => 'edu123',
            'created_at' => '22/02/2000',
            'updated_at' => '22/03/2020'
        ];

        $user->setData(
            [
                'id' => 2,
                'username' => 'edu',
                'name' => 'eduardo',
                'password' => 'edu123',
                'created_at' => '22/02/2000',
                'updated_at' => '22/03/2020'
            ]
        );

        $this->assertEquals($userData, $user->getData());
    }
}