<?php
namespace src\model;
use libs\system\Model; 
use \OAuth2\Storage\AccessTokenInterface;

class OAuthAccessTokenRepository extends Model implements AccessTokenInterface
{
     public function __construct(){
        parent::__construct();
    }

    public function getAccessToken($oauthToken)
    {
        if ($this->db != null) {
             $token = $this->db->createQuery('SELECT o FROM OAuthAccessToken o WHERE o.token = :token')
             ->setParameter('token', $oauthToken)
             ->getOneOrNullResult();
        if ($token) {
            $token = $token->toArray();
            $token['expires'] = $token['expires']->getTimestamp();
        }
        return $token;
        }
    }

    public function setAccessToken($oauthToken, $clientIdentifier, $userId, $expires, $scope = null)
    {
        if ($this->db != null) 
        {
            $client = $this->db->createQuery('SELECT o FROM OAuthClient o WHERE o.client_identifier = :client_identifier')
            ->setParameter('client_identifier', $clientIdentifier)
            ->getOneOrNullResult();
            $user = $this->db->createQuery('SELECT o FROM OAuthUser o WHERE o.id = :userId')
            ->setParameter('userId', $userId)
            ->getOneOrNullResult();
        $token = \OAuthAccessToken::fromArray([
            'token'     => $oauthToken,
            'client_id' => $client,
            'user_id'   => $user,
            'expires'   => (new \DateTime())->setTimestamp($expires),
            'scope'     => $scope,
        ]);
        $this->db->persist($token);
        $this->db->flush();
        }
    }

    public function getOAuthAccessToken()
    {
        return $this->db->createQuery('SELECT o FROM OAuthAccessToken o')->getResult();
    }
}
