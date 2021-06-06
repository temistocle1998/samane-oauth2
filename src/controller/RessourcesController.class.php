<?php
use libs\system\Controller; 
use src\service\authentification\Authenticate;
use src\model\OAuthClientRepository;
use src\model\OAuthUserRepository;
use src\model\OAuthAccessTokenRepository;
use src\model\OAuthAuthorizationCodeRepository;
use src\model\OAuthRefreshTokenRepository;
ini_set('display_errors', 1);error_reporting(E_ALL);

class RessourcesController extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }
    /*
     *  ACCEDEZ A LA RESSOURCE EN AJOUTANT LE TOKEN OBTENU
     *  curl http://localhost:8000/Ressources/myRessource -d 'access_token=TOKEN'
     */

    public function myRessource()
    {
    	$md = new OAuthClientRepository();
        $ad = new OAuthUserRepository();
        $fd = new OAuthAccessTokenRepository();
        $mg = new OAuthAuthorizationCodeRepository();
        $zd = new OAuthRefreshTokenRepository();
        
       $server = new Authenticate();
       $server->AuthorizeObject($md, $ad, $fd, $mg);
    }
}
?>