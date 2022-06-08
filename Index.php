<?php

spl_autoload_register(function ($class) {

    //general
    if (file_exists("./router/$class.php")) {
        require_once("./router/$class.php");
    }
    else if (file_exists("./$class.php")){
        require_once("./$class.php");
    }
    else if (file_exists("./connector/$class.php")){
        require_once("./connector/$class.php");
    }
    // controller
    else if (file_exists("./controller/$class.php")) {
        require_once("./controller/$class.php");
    }
    else if (file_exists("./controller/movimentacao/$class.php")) {
        require_once("./controller/movimentacao/$class.php");
    }
    else if (file_exists("./controller/login/$class.php")) {
        require_once("./controller/login/$class.php");
    }
    //model
    else if (file_exists("./model/$class.php")) {
        require_once("./model/$class.php");
    }
    else if (file_exists("./model/login/$class.php")) {
        require_once("./model/login/$class.php");
    }
    else if (file_exists("./model/movimentacao/$class.php")) {
        require_once("./model/movimentacao/$class.php");
    }
    //view
    else if (file_exists("./view/$class.php")) {
        require_once("./view/$class.php");
    }
    //todo
    else{
        require_once ('/view/NotFound.php');
    }
});

require_once ('./Router.php');