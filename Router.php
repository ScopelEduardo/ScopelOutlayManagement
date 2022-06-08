<?php

Routes::set('login', function (){
    LoginController::execute();
});

Routes::set('loginPost', function (){
    LoginPostController::execute();
});

Routes::set('movimentacao/create', function (){
    MovimentacaoCreateController::execute();
});

Routes::set('movimentacao/read', function (){
    MovimentacaoReadController::execute();
});

Routes::set('movimentacao/update', function (){
    MovimentacaoUpdateController::execute();
});

Routes::set('movimentacao/savePost', function (){
    MovimentacaoSavePostController::execute();
});

Routes::set('movimentacao/deletePost', function (){
    MovimentacaoDeleteGetController::execute();
});
