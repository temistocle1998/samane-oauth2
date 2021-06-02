<?php
use libs\system\Controller; 
use src\service\authentification\Authenticate;
use src\model\OAuthClientRepository;
use src\model\OAuthUserRepository;
use src\model\OAuthAccessTokenRepository;
use src\model\OAuthAuthorizationCodeRepository;
use src\model\OAuthRefreshTokenRepository;
ini_set('display_errors', 1);error_reporting(E_ALL);

class LoginController extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }
    /*
     *  ACCEDEZ A LA RESSOURCE EN AJOUTANT LE TOKEN OBTENU
        curl http://localhost:8000/Ressources/myRessource -d 'access_token=TOKEN'
    */

    public function index()
    {
    	return $this->view->load("login");
    }

    public function test()
    {
        $userdb = new OAuthUserRepository();
        $test = $userdb->checkUserCredentials("yorobo", "lamine");
        var_dump($test);
    }
}
?>