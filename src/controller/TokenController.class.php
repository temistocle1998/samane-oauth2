<?php
/*==================================================
MODELE MVC DEVELOPPE PAR Ngor SECK
ngorsecka@gmail.com
(+221) 77 - 433 - 97 - 16
PERFECTIONNEZ CE MODELE ET FAITES MOI UN RETOUR
POUR TOUTE MODIFICATION VISANT A L'AMELIORER.
VOUS ETES LIBRE DE TOUTE UTILISATION.
===================================================*/ 
use libs\system\Controller; 
use src\service\authentification\Authenticate;
use src\model\OAuthClientRepository;
use src\model\OAuthUserRepository;
use src\model\OAuthAccessTokenRepository;
use src\model\OAuthAuthorizationCodeRepository;
use src\model\OAuthRefreshTokenRepository;

class TokenController extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }
    /* EFFECTUER CETTE REQUETE POUR OBTENIR UN TOKEN D'ACCES  
    *   curl -u testclient:passer http://localhost:8000/Token/token -d 'grant_type=client_credentials'
    */

    public function token()
    {
        $md = new OAuthClientRepository();
        $ad = new OAuthUserRepository();
        $fd = new OAuthAccessTokenRepository();
        $mg = new OAuthAuthorizationCodeRepository();
        $zd = new OAuthRefreshTokenRepository();

        //$clientStorage = $md->getOAuthClient();
        //$userStorage = $ad->getOAuthUser();
        //$accessTokenStorage = $fd->getOAuthAccessToken();
        $authorizationCodeStorage = $mg->getAuthorization();
        $refreshTokenStorage = $zd->getRefreshTokens();
        // Handle a request for an OAuth2.0 Access Token and send the response to the client
       $server = new Authenticate();
        //$md = new OAuthRepository();
        //$clientStorage = $md->getOAuthClient();
        //var_dump($clientStorage);
               // $md = new OAuthClientRepository();
        $cls = new OAuthClientRepository();
        if ($cls instanceof \OAuth2\Storage\ClientCredentialsInterface) 
        {
            
       $server->authObject($md, $ad, $fd, $mg);
            
        //var_dump($md->getOAuthClient());
        }
        else
            echo "no";
    }
}
?>