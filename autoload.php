<?php

define('DEBUG_FLUG', 0);

spl_autoload_register('myAutoload');

function myAutoload($classname)
{
    $classpart = explode('\\',$classname);
    if (false == strpos('//',$classname)) {
        $classpart = explode('\\', $classname);

/*
        // Проверка авторизации ( в дальнейшем можно будет разрешить или
        //    запределить доступ к определенным классов)
        if ('Auth' != end($classpart)) {
            App\Classes\Auth::checkAuth($classname);
        }
*/
        if ('App' == $classpart[0]) {
            unset($classpart[0]);
            $load = __DIR__ . '/' . implode('/', $classpart) . '.php';
            if (true == DEBUG_FLUG) {
                echo $load . '<br>';
            }

            if (file_exists($load)) {
                require $load;
            }
            else {
                throw new Exception('autoload: <br>Класс с именем ' . $classname . ' не найден.');
            }

        }
    }
}
