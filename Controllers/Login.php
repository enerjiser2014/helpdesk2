<?php


namespace App\Controllers;
define(VK_CODE_LENGTH, 18);

class Login
{
    protected $vk;
    protected $vkUrlAuth;
    protected $vkUrlAccessToken;

    public function __construct()
    {
        $this->vk = include __DIR__ . './../config/vk_conf.php';
        $this->vkUrlAuth = $url = 'https://oauth.vk.com/authorize';
        $this->vkUrlAccessToken = $url = 'https://oauth.vk.com/access_token';
    }

    public function startPoint()
    {
        $this->vk['response_type'] = 'code';
        $vkLink = '<p><a href="' . $this->vkUrlAuth . '?' . urldecode(http_build_query($this->vk)) . '">Аутентификация через ВКонтакте</a></p>';
        echo $vkLink;
        var_dump($this->vk);
    }

    public function vkAuth()
    {
        $this->vk['code'] = strlen($_GET['code']) === VK_CODE_LENGTH ? $_GET['code'] : null;
        $l = $this->vkUrlAccessToken . '?' . urldecode(http_build_query($this->vk));
        $token = json_decode($this->curl($l));

        if ($token->error != NULL) {
            header('Location: ' . 'http://testtask/Login');
        }

        if ($token->access_token != NULL) {
            $params = [
                'uids' => $token->user_id,
                'fields' => 'uid,first_name,last_name,screeen_name,sex,bdate,photo_big',
                'access_token' => $token->access_token,
            ];
        }
        $userInfo = json_decode(file_get_contents('https://api.vk.com/method/users.get' . '?' . urldecode(http_build_query($params))), true);
        var_dump($userInfo);
    }

    public function passwordAuth()
    {

    }

    private function curl($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
}