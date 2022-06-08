<?php

class Routes {
    public static function set($route, $function){
        if ($_GET['url'] == $route) {
            $function->__invoke();
        }
    }
}