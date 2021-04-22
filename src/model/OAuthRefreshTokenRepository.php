<?php
namespace src\model;
use libs\system\Model; 

use OAuth2\Storage\RefreshTokenInterface;

class OAuthRefreshTokenRepository extends Model implements RefreshTokenInterface
{
    public function getRefreshToken($refreshToken)
    {
        $refreshToken = $this->db->getRepository('OAuthRefreshToken')->findOneBy(['refresh_token' => $refreshToken]);
        if ($refreshToken) {
            $refreshToken = $refreshToken->toArray();
            $refreshToken['expires'] = $refreshToken['expires']->getTimestamp();
        }
        return $refreshToken;
    }

    public function setRefreshToken($refreshToken, $clientIdentifier, $userEmail, $expires, $scope = null)
    {
        $client = $this->db->getRepository('OAuthClient')
                            ->findOneBy(['client_identifier' => $clientIdentifier]);
        $user = $this->db->getRepository('OAuthUser')
                            ->findOneBy(['email' => $userEmail]);
        $refreshToken = OAuthRefreshToken::fromArray([
           'refresh_token'  => $refreshToken,
           'client'         => $client,
           'user'           => $user,
           'expires'        => (new \DateTime())->setTimestamp($expires),
           'scope'          => $scope,
        ]);
        $this->db->persist($refreshToken);
        $this->db->flush();
    }

    public function unsetRefreshToken($refreshToken)
    {
        $refreshToken = $this->getRepository('OAuthRefreshToken')->findOneBy(['refresh_token' => $refreshToken]);
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
