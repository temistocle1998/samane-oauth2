<?php
namespace src\model;
use libs\system\Model; 

use OAuth2\Storage\AuthorizationCodeInterface;

class OAuthAuthorizationCodeRepository extends Model implements AuthorizationCodeInterface
{
    public function getAuthorizationCode($code)
    {
        $authCode = $this->db->createQuery('SELECT o FROM OAuthAuthorizationCode o WHERE o.code = :code')
        ->setParameter('code', $code)
        ->getResult();
        if ($authCode) {
            $authCode = $authCode->toArray();
            $authCode['expires'] = $authCode['expires']->getTimestamp();
        }
        return $authCode;
    }

    public function setAuthorizationCode($code, $clientIdentifier, $userEmail, $redirectUri, $expires, $scope = null)
    {
        $client = $this->db->createQuery('SELECT o FROM OAuthClient o WHERE o.client_identifier = :client_identifier')
        ->setParameter('client_identifier', $clientIdentifier)
        ->getResult();
        $user = $this->db->createQuery('SELECT o FROM OAuthUser o WHERE o.email = :email')
         ->setParameter('email', $userEmail)
        ->getResult();
        $authCode = \OAuthAuthorizationCode::fromArray([
           'code'           => $code,
           'client_id'      => $client,
           'user'           => $user,
           'redirect_uri'   => $redirectUri,
           'expires'        => (new \DateTime())->setTimestamp($expires),
           'scope'          => $scope,
        ]);
        $this->db->persist($authCode);
        $this->db->flush();
    }

    public function expireAuthorizationCode($code)
    {
        $authCode = $this->db->createQuery('SELECT o FROM OAuthAuthorizationCode o WHERE o.code = :code')
        ->setParameter('code', $code)
        ->getResult();
        $this->db->remove($authCode);
        $this->db->flush();
    }

    public function getAuthorization()
    {
        return $this->db->createQuery('SELECT o FROM OAuthAuthorizationCode o')->getResult();
    }
}
