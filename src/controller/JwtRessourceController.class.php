<?php
use libs\system\Controller; 
use src\service\authentification\Authenticate;
ini_set('display_errors', 1);error_reporting(E_ALL);

class JwtRessourceController extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }
    /**
     * ACCEDEZ A LA RESSOURCE EN AJOUTANT LE TOKEN OBTENU
     *  ET ACCEDEZ AUX INFOS DU USER
     * curl http://localhost:8000/JwtRessource/myRessource -d 'access_token=TOKEN'
     */
    public function myRessource()
    {
        /* for a Ressource Server (minimum config) */
        $publicKey = file_get_contents('/home/lamine/FreeDev/samane-oauth2/src/config/pubkey.pem');

        // no private key necessary
        $keyStorage = new OAuth2\Storage\Memory(
            array('keys' => array(
            'public_key'  => $publicKey,
            ))
        );

        $server = new OAuth2\Server(
            $keyStorage, array(
            'use_jwt_access_tokens' => true,
            )
        );
        // verify the JWT Access Token in the request
        if (!$server->verifyResourceRequest(OAuth2\Request::createFromGlobals())) {
            exit("Erreur Jeton invalide !");
        }
          echo "Success ! Jeton valide Hi";
          $token = $server->getAccessTokenData(OAuth2\Request::createFromGlobals());
          print_r("The associated userid with this token is {$token['user_id']}" );
    }
}
?>