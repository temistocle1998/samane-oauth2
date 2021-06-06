<?php
use libs\system\Controller; 
use src\service\authentification\Authenticate;
use src\service\authentification\OAuthJwt;

use src\model\OAuthClientRepository;
use src\model\OAuthUserRepository;
use src\model\OAuthAccessTokenRepository;
use src\model\OAuthAuthorizationCodeRepository;
use src\model\OAuthRefreshTokenRepository;
ini_set('display_errors', 1);error_reporting(E_ALL);

/**
 * TokenController
 */
class TokenController extends Controller
{
    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

    }
    /**
     * EFFECTUER CETTE REQUETE POUR OBTENIR UN TOKEN D'ACCES  
     * curl -u testclient:passer http://localhost:8000/Token/token -d 'grant_type=client_credentials'
    */

    /* curl -v "http://localhost:8000/Token/token" -d "grant_type=password&client_id=testclient&client_secret=passer&username=yorobo&password=passer"
    */ 

    /**
     * Permet d'obtenir un access_token
     *
     * @return token
     */
    public function token()
    {
        $md = new OAuthClientRepository();
        $ad = new OAuthUserRepository();
        $fd = new OAuthAccessTokenRepository();
        $mg = new OAuthAuthorizationCodeRepository();
        $zd = new OAuthRefreshTokenRepository();
        /**
         * Handle a request for an OAuth2.0 Access Token and 
         * send the response to the client
         */
        $server = new Authenticate();
        
        $server->authObject($md, $ad, $fd, $mg, $zd);
        
    }
    
    /**
     * Renvoie un jeton
     *
     * @return jwt
     */
    public function testJwt()
    {
        /*curl http://localhost:8000/Token/testJwt -u 'testclient:lamine' -d 'grant_type=password&passer&username=ngor&password=lamine'
        */
        /*curl http://localhost:8000/Token/testJwt -u 'testclient:lamine' -d 'grant_type=password&passer&username=yorobo&password=lamine'
        */
        $md = new OAuthClientRepository();
        $ad = new OAuthUserRepository();
        $zd = new OAuthRefreshTokenRepository();
         /**
         * Handle a request for an OAuth2.0 Access Token and 
         * send the response to the client
         */
        $jwt = new OAuthJwt();
        $jwt->authObject($md, $ad, $zd);
    }
}
?>
