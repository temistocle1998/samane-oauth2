<?php
/**
 * ==================================================
MODELE MVC DEVELOPPE PAR Ngor SECK
ngorsecka@gmail.com
(+221) 77 - 433 - 97 - 16
PERFECTIONNEZ CE MODELE ET FAITES MOI UN RETOUR
POUR TOUTE MODIFICATION VISANT A L'AMELIORER.
VOUS ETES LIBRE DE TOUTE UTILISATION.
===================================================
 */ 
use libs\system\Controller; 
use src\service\authentification\Authenticate;


class JwtRessourceController extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }
    /**
     * ACCEDEZ A LA RESSOURCE EN AJOUTANT LE TOKEN OBTENU
     * curl http://localhost:8000/Ressources/myRessource -d 'access_token=TOKEN'
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
        echo "Success Jeton valide !";
    }
}
?>