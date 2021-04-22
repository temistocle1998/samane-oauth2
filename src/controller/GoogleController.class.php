<?php
use libs\system\Controller; 
use src\service\authentification\Authenticate;
ini_set('display_errors', 1);error_reporting(E_ALL);

class GoogleController extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }
    /**
     * ACCEDEZ A LA RESSOURCE EN AJOUTANT LE TOKEN OBTENU
     * curl http://localhost:8000/Ressources/myRessource -d 'access_token=TOKEN'
     */
    public function index()
    {
        echo "Login with google successfully";
    }
}
?>