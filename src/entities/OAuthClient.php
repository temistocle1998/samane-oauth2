<?php
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity @Table(name="oauth_clients")
 * @entity(repositoryClass="src\model\OAuthClientRepository")
 */
class OAuthClient extends EncryptableFieldEntity
{
     /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;

    /**
     * @Column(type="string")
     */
    private $client_identifier;

    /**
     * @Column(type="string")
     */
    private $client_secret;

    /**
     * @Column(type="string") 
     */
    private $redirect_uri = '';
    /**
    * One OAuthClient has many oauthaccesstokens. This is the inverse side.
    * @OneToMany(targetEntity="OAuthAccessToken", mappedBy="client_id")
    */
    private $oauth_access_tokens;
    /**
    * One OAuthClient has many oauthauthorizationcodes. This is the inverse side.
    * @OneToMany(targetEntity="OAuthAuthorizationCode", mappedBy="client_id")
    */
    private $oauth_authorization_code;
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set client_identifier
     *
     * @param  string $clientIdentifier
     * @return OAuthClient
     */
    public function setClientIdentifier($clientIdentifier)
    {
        $this->client_identifier = $clientIdentifier;
        return $this;
    }

    /**
     * Get client_identifier
     *
     * @return string
     */
    public function getClientIdentifier()
    {
        return $this->client_identifier;
    }

    /**
     * Set client_secret
     *
     * @param  string $clientSecret
     * @return OAuthClient
     */
    public function setClientSecret($clientSecret)
    {
        $this->client_secret = $this->encryptField($clientSecret);
        return $this;
    }

    /**
     * Get client_secret
     *
     * @return string
     */
    public function getClientSecret()
    {
        return $this->client_secret;
    }

    /**
     * Verify client's secret
     *
     * @param  string $password
     * @return Boolean
     */
    public function verifyClientSecret($clientSecret)
    {
        return $this->verifyEncryptedFieldValue($this->getClientSecret(), $clientSecret);
    }

    /**
     * Set redirect_uri
     *
     * @param  string $redirectUri
     * @return OAuthClient
     */
    public function setRedirectUri($redirectUri)
    {
        $this->redirect_uri = $redirectUri;
        return $this;
    }

    /**
     * Get redirect_uri
     *
     * @return string
     */
    public function getRedirectUri()
    {
        return $this->redirect_uri;
    }

    public function toArray()
    {
        return [
            'client_id' => $this->client_identifier,
            'client_secret' => $this->client_secret,
            'redirect_uri' => $this->redirect_uri,
        ];
    }
}
