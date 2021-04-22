<?php
namespace src\service\authentification;
use \OAuth2\Server;
use \OAuth2\GrantType\ClientCredentials;
use \OAuth2\GrantType\UserCredentials;
use \OAuth2\Storage\ClientCredentialsInterface;
use \OAuth2\GrantType\AuthorizationCode;
use \OAuth2\GrantType\RefreshToken;
use src\model\OAuthClientRepository;
use Doctrine\ORM\EntityRepository;

use src\model\OAuthUserRepository;
use src\model\OAuthAccessTokenRepository;
use src\model\OAuthAuthorizationCodeRepository;
use src\model\OAuthRefreshTokenRepository;
// error reporting (this is a demo, after all!)
ini_set('display_errors',1);error_reporting(E_ALL);



//use Doctrine\ORM\EntityManager;
ini_set('display_errors',1);error_reporting(E_ALL);

class OAuthJwt extends \OAuth2\Server
{
    private $clientStorage;
    private $userStorage;
    private $accessTokenStorage;
    private $clients;
    public function __construct()
    {

    }

    public function authObject()
    {
        $publicKey  = file_get_contents('/home/lamine/FreeDev/samane-oauth2/src/config/pubkey.pem');
        $privateKey = file_get_contents('/home/lamine/FreeDev/samane-oauth2/src/config/privatekey.pem');
                // create storage
        $storage = new \OAuth2\Storage\Memory(array(
        'keys' => array(
            'public_key'  => $publicKey,
            'private_key' => $privateKey,
        ),
        // add a Client ID for testing
        'client_credentials' => array(
            'CLIENT_ID' => ['client_secret' => 'CLIENT_SECRET']
        ),
    ));
        $server = new \OAuth2\Server(
            $storage, [
            'use_jwt_access_tokens' => true,
            ]
        );

        
        // handle the request
        $server->addGrantType(new \OAuth2\GrantType\ClientCredentials($storage));
    
        $server->handleTokenRequest(\OAuth2\Request::createFromGlobals())->send();

    }  
}
?>