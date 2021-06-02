<?php
namespace src\model;
use libs\system\Model; 

use OAuth2\Storage\RefreshTokenInterface;

class OAuthRefreshTokenRepository extends Model implements RefreshTokenInterface
{
    public function getRefreshToken($refreshToken)
    {
        $refreshToken = $this->db->createQuery('SELECT o FROM OAuthRefreshToken o WHERE o.refresh_token =:refresh_token')
        ->setParameter('refresh_token', $refreshToken)
        ->getOneOrNullResult();
        if ($refreshToken) {
            $refreshToken = $refreshToken->toArray();
            $refreshToken['expires'] = $refreshToken['expires']->getTimestamp();
        }
        return $refreshToken;
    }

    public function setRefreshToken($refreshToken, $clientIdentifier, $userId, $expires, $scope = null)
    {
        $client = $this->db->createQuery('SELECT o FROM OAuthClient o WHERE o.client_identifier=:client_identifier')
        ->setParameter('client_identifier', $clientIdentifier)
        ->getOneOrNullResult();
        $user = $this->db->createQuery('SELECT o FROM OAuthUser o WHERE o.id= :userId')
            ->setParameter('userId', $userId)
            ->getOneOrNullResult();
        $refreshToken = \OAuthRefreshToken::fromArray([
           'refresh_token'  => $refreshToken,
           'client_id'         => $client,
           'user_id'           => $user,
           'expires'        => (new \DateTime())->setTimestamp($expires),
           'scope'          => $scope,
        ]);
        $this->db->persist($refreshToken);
        $this->db->flush();
    }

    public function unsetRefreshToken($refreshToken)
    {
        $refreshToken = $this->getRepository('OAuthRefreshToken')->find(['refresh_token' => $refreshToken]);
        $this->db->remove($refreshToken);
        $this->db->flush();
    }

    public function getRefreshTokens()
    {
        if($this->db != null)
        {
            return $this->db->createQuery('SELECT o FROM OAuthRefreshToken o')->getResult();
        }
    }
}
