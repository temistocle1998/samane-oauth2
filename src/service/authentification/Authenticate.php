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


class Authenticate extends Server
{
    private $clientStorage;
    private $userStorage;
    private $accessTokenStorage;
    private $authorizationCodeStorage;
    private $refreshTokenStorage;
    private $clients;
    public function __construct()
    {

    }

    public function authObject($clientStorage, $userStorage, $accessTokenStorage, $authorizationCodeStorage, $refreshTokenStorage)
    {
        // Pass the doctrine storage objects to the OAuth2 server class
        $server = new Server(
            [
            'client_credentials' => $clientStorage,
            'user_credentials'   => $userStorage,
            'access_token'       => $accessTokenStorage,
            'authorization_code' => $authorizationCodeStorage,
            'refresh_token'      => $refreshTokenStorage,
            ], [
            'auth_code_lifetime' => 30,
            'refresh_token_lifetime' => 30,
            ]
        );
        // will be able to handle token requests when "grant_type=client_credentials".
        
        // handle the request
        $server->addGrantType(new ClientCredentials($clientStorage));
        $server->addGrantType(new UserCredentials($userStorage));
        $server->addGrantType(new AuthorizationCode($authorizationCodeStorage));
	
        $server->addGrantType( new RefreshToken($refreshTokenStorage, [
                //the refresh token grant request will have a "refresh_token" field
                // with a new refresh token on each request
                'always_issue_new_refresh_token' => true,
                ]));
        $connect = $server->handleTokenRequest(\OAuth2\Request::createFromGlobals())->send();
        return $connect;
    }

    public function AuthorizeObject($clientStorage, $userStorage, $accessTokenStorage, $authorizationCodeStorage)
    {
        // Pass the doctrine storage objects to the OAuth2 server class
        $server = new \OAuth2\Server(
            [
            'client_credentials' => $clientStorage,
            'user_credentials'   => $userStorage,
            'access_token'       => $accessTokenStorage,
            'authorization_code' => $authorizationCodeStorage,
            //'refresh_token'      => $refreshTokenStorage,
            ], [
            'auth_code_lifetime' => 30,
            'refresh_token_lifetime' => 30,
            ]
        );
        // will be able to handle token requests when "grant_type=client_credentials".
        //$server->addGrantType(new OAuth2\GrantType\ClientCredentials($clientStorage));

        
        // handle the request
        $server->addGrantType(new ClientCredentials($clientStorage));
        $server->addGrantType(new AuthorizationCode($authorizationCodeStorage));
        //$server->addGrantType(new RefreshToken($refreshStorage));
        $server->addGrantType(new UserCredentials($userStorage));
    
       // $server->addGrantType(new AuthorizationCode($authorizationCodeStorage));
//$server->addGrantType( new RefreshToken($refreshTokenStorage, [
                // the refresh token grant request will have a "refresh_token" field
                // with a new refresh token on each request
                //'always_issue_new_refresh_token' => true,
                //]));
        if (!$server->verifyResourceRequest(\OAuth2\Request::createFromGlobals())) 
        {
            $server->getResponse()->send();
            die("Non authorisé !");
        }
        $token = $server->getAccessTokenData(\OAuth2\Request::createFromGlobals());
        $username = $token['user_id'];
        echo json_encode(array('success' => true, 'message' => 'Vous avez acces a SAMANE API !'));
          //var_dump($token['user_id']);    
    }    

}
?>