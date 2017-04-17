<?php

namespace App\Controllers;

class Vkauth {
    public function startPoint() {
        $vk = include __DIR__ . './../config/vk_conf.php';
        $vk['response_type'] = 'code';
        $url = 'https://oauth.vk.com/authorize';
        $vkLink = '<p><a href="' . $url . '?' . urldecode(http_build_query($vk)) . '">Аутентификация через ВКонтакте</a></p>';
        echo $vkLink;
        var_dump($vk);
    }
}