<?php

include_once('C:\xampp3\htdocs\Trabalho2\model\login\UserModel.php');
include_once('C:\xampp3\htdocs\Trabalho2\model\login\UserRepository.php');
include_once('C:\xampp3\htdocs\Trabalho2\model\movimentacao\MovimentacaoModel.php');
include_once('C:\xampp3\htdocs\Trabalho2\model\movimentacao\MovimentacaoRepository.php');

use PHPUnit\Framework\TestCase;

class MovimentacaoReposioryTest extends TestCase
{
    public function testCreateMovimentacao()
    {

        $user = new UserModel();
        $user->setData([
            'username' => 'eduTesteMov',
            'name' => 'eduardo',
            'password' => 'edu123',
        ]);

        UserRepository::create($user);

        $user = UserRepository::readByUsername('eduTesteMov');

        $movi = new MovimentacaoModel();

        $movi->setUserId($user->getId());
        $movi->setValue("-5");
        $movi->setDescription("Salgadinho");

        $result = MovimentacaoRepository::create($movi);

        $this->assertTrue($result);

    }

    public function testGetListMovimentacao()
    {
        $user = UserRepository::readByUsername('eduTesteMov');
        $moviList = MovimentacaoRepository::getList([['field' => 'user_id','value' => $user->getId()]]);
        $result = false;

        if (count($moviList)) {
            $result = true;
        }

        $this->assertTrue($result);
    }

    public function testReadMovimentacao()
    {
        $user = UserRepository::readByUsername('eduTesteMov');
        $moviList = MovimentacaoRepository::getList([['field' => 'user_id','value' => $user->getId()]]);

        /** @var MovimentacaoModel $movimentacao */
        foreach ($moviList as $movimentacao){
            $movi = MovimentacaoRepository::read($movimentacao->getId());
        }

        $this->assertEquals('Salgadinho', $movi->getDescription());

    }

    public function testDeleteMovimentacao()
    {
        $user = UserRepository::readByUsername('eduTesteMov');
        $moviList = MovimentacaoRepository::getList([['field' => 'user_id','value' => $user->getId()]]);

        /** @var MovimentacaoModel $movimentacao */
        foreach ($moviList as $movimentacao){
            $movi = MovimentacaoRepository::read($movimentacao->getId());
        }
        $result = MovimentacaoRepository::delete($movi);
        UserRepository::delete($user);

        $this->assertTrue($result);
    }
}