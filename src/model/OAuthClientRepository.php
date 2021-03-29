<?php
namespace src\model;
use libs\system\Model; 
use \OAuth2\Storage\ClientCredentialsInterface;

class OAuthClientRepository extends Model implements \OAuth2\Storage\ClientCredentialsInterface
{
    public function __construct(){
        parent::__construct();
    }

    public function getClientDetails($clientIdentifier)
    {
        if($this->db != null)
        {
        $client = $this->db->createQuery('SELECT o FROM OAuthClient o WHERE o.client_identifier = :client_identifier')
        ->setParameter('client_identifier', $clientIdentifier)
        ->getOneOrNullResult();
        if ($client) {
            $client = $client->toArray();
        }
        return $client;
    }
    }

    public function checkClientCredentials($clientIdentifier, $clientSecret = NULL)
    {
        if($this->db != null)
        {
            $client = $this->db->createQuery('SELECT o FROM OAuthClient o WHERE o.client_identifier = :client_Identifier')
            ->setParameter('client_Identifier', $clientIdentifier)
            ->getOneOrNullResult();
            if ($client) 
            {
                //return $client->verifyClientSecret($clientSecret);
                    if ($clientSecret != '') {
                return password_verify($clientSecret, $client->getClientSecret()) ? $client : null;
            }
            else{
                return $user;
            }

            }
            else
            {

            }
            return false;
        }
        return 0;
    }

    public function checkRestrictedGrantType($clientId, $grantType)
    {
        // we do not support different grant types per client in this example
        return true;
    }

    public function isPublicClient($clientId)
    {
        return false;
    }

    public function getClientScope($clientId)
    {
        return null;
    }

    public function getOAuthClient()
    {
        if($this->db != null)
        {
            return $this->db->createQuery('SELECT o FROM OAuthClient o')->getOneOrNullResult();
        }
    }
}
