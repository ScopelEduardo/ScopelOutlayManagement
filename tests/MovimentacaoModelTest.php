<?php

include_once('C:\xampp3\htdocs\Trabalho2\model\movimentacao\MovimentacaoModel.php');

use PHPUnit\Framework\TestCase;

class MovimentacaoModelTest extends TestCase
{
    public function testGetAndSetData()
    {

        $movimentacao = new MovimentacaoModel();

        $movimentacaoData = [
            'id' => 2,
            'user_id' => 1,
            'value' => 20.10,
            'description' => 'Lorem Ipsum',
            'created_at' => '22/02/2000'
        ];

        $movimentacao->setData(
            [
                'id' => 2,
                'user_id' => 1,
                'value' => 20.10,
                'description' => 'Lorem Ipsum',
                'created_at' => '22/02/2000'
            ]
        );

        $this->assertTrue($this->arrays_are_similar($movimentacaoData, $movimentacao->getData()));
    }

    function arrays_are_similar($arrayA, $arrayB)
    {
        if (count(array_diff_assoc($arrayA, $arrayB))) {
            return false;
        }
        foreach ($arrayA as $key => $value) {
            if ($value !== $arrayB[$key]) {
                return false;
            }
        }
        return true;
    }
}