<?php


namespace App\Controllers;
use App\Core\Conf;
use App\Core\ConfYml;
use App\Core\Helper;
use App\Models\Users\FLModel;
use App\Models\Users\Validators\FLValidator;
use App\Models\Users\ULModel;
use App\Models\Users\Validators\ULValidator;
use App\Core\ValidatorContext;

define(VK_CODE_LENGTH, 18);

class Login
{
    protected $vk;
    protected $vkUrlAuth;
    protected $vkUrlAccessToken;

    public function __construct()
    {
        $this->vk = include __DIR__ . './../config/vk_conf.php';
        $this->vkUrlAuth = $url = 'https://oauth.Vk.com/authorize';
        $this->vkUrlAccessToken = $url = 'https://oauth.Vk.com/access_token';
    }

    public function startPoint()
    {
//        $user1 = new FLModel('fl');
//        $user2 = new ULModel('ul');
//
//        $work1 = new ValidatorContext(new FLValidator());
//        $work1->ifValid($user1);
//        $work2 = new ValidatorContext(new ULValidator());
//        $work2->ifValid($user1);
//        exit;
        $conf = new ConfYml();
        $conf->getConf('yml');
        exit;

        $this->vk['response_type'] = 'code';
        $vkLink = '<p><a href="' . $this->vkUrlAuth . '?' . urldecode(http_build_query($this->vk)) . '">Аутентификация через ВКонтакте</a></p>';
        echo $vkLink;
        $fileList = glob('Plugins/*');
        $plugins = [];
        foreach ($fileList as $fileName) {
            $str = 'App\\Plugins\\Vk\\VkPlugin';
            new $str;
            //$plugins[$fileName] = new 'App\Plugins\\' . $fileName . '\\' . $fileName . Plugin;
        }
        var_dump($fileList);
        var_dump($this->vk);
    }

    public function vkAuth()
    {
        $params = [];
        $this->vk['code'] = strlen($_GET['code']) === VK_CODE_LENGTH ? $_GET['code'] : null;
        $l = $this->vkUrlAccessToken . '?' . urldecode(http_build_query($this->vk));
        $token = json_decode(Helper::curl($l));

        if ($token->error != NULL) {
            Helper::redirect('http://' . Conf::Site('hostname') . '/Login');
        }

        if ($token->access_token != NULL) {
            $params = [
                'uids' => $token->user_id,
                'fields' => 'uid,first_name,last_name,screeen_name,sex,bdate,photo_big',
                'access_token' => $token->access_token,
            ];
        }
        $userInfo = json_decode(Helper::curl('https://api.Vk.com/method/users.get' . '?' . urldecode(http_build_query($params))),true);
        var_dump($userInfo);
    }

    public function passwordAuth()
    {

    }

}