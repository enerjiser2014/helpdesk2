<?php
/**
 * Created by PhpStorm.
 * Users: homepc
 * Date: 28.10.2015
 * Time: 13:44
 */

namespace App\Core;

class Auth
{
    static public function checkAuth()
    {
        if ($_SESSION['Auth']===1) {
            return true;
        }
        else {
            throw new \Exception('Вы не авторизованы!');
        }
    }

    static public function checkUserAccess()
    {

    }
}