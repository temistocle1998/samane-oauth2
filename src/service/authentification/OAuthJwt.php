<?php
namespace src\service\authentification;
use \OAuth2\Server;
use \OAuth2\GrantType\ClientCredentials;
use \OAuth2\GrantType\UserCredentials;
use \OAuth2\Storage\ClientCredentialsInterface;
use \OAuth2\GrantType\AuthorizationCode;
use \OAuth2\GrantType\RefreshToken;
use src\model\OAuthClientRepository;
use src\model\OAuthUserRepository;
use src\model\OAuthAccessTokenRepository;
use src\model\OAuthAuthorizationCodeRepository;
use src\model\OAuthRefreshTokenRepository;
// error reporting (this is a demo, after all!)
ini_set('display_errors',1);error_reporting(E_ALL);

class OAuthJwt extends Server
{
    private $clientStorage;
    private $userStorage;
    private $accessTokenStorage;
    private $clients;
    public function __construct()
    {

    }

    public function authObject($clientStorage, $userStorage, $refreshStorage)
    {
        $publicKey  = file_get_contents('/home/lamine/FreeDev/samane-oauth2/src/config/pubkey.pem');
        $privateKey = file_get_contents('/home/lamine/FreeDev/samane-oauth2/src/config/privatekey.pem');
                // create storage
        $memStorage = new \OAuth2\Storage\Memory(array(
        'keys' => array(
            'public_key'  => $publicKey,
            'private_key' => $privateKey,
        ),
        // add a Client ID for testing
        'client_credentials' => array(
            'CLIENT_ID' => ['client_secret' => 'CLIENT_SECRET']
        ),
    ));
        $server = new Server([
            'access_token' => $memStorage, // Where you want to store your access tokens 
            'public_key' => $memStorage, // Where you have stored your keys
            'client_credentials' => $clientStorage, // Depends on your keysclient_credentials storage location, mine is in memory, but can be stored in different storage types.
            'user_credentials' => $userStorage, // Depend on your where your users are being stored
            'refresh_token' => $refreshStorage // Refresh tokens are being stored in the db
    ], [
            'use_jwt_access_tokens' => true,
            ]
        );

        
        // handle the request
        $server->addGrantType(new \OAuth2\GrantType\UserCredentials($userStorage));
        $server->addGrantType(new \OAuth2\GrantType\RefreshToken($refreshStorage));

        $server->handleTokenRequest(\OAuth2\Request::createFromGlobals())->send();

    }  
}
?>