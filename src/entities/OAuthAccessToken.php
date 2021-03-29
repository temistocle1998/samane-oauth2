<?php
/**
 * OAuthAccessToken
 *
 * @entity(repositoryClass="src\model\OAuthAccessTokenRepository")
 * @entity @Table(name="oauth_access_tokens")
 */
class OAuthAccessToken
{
    /**
     * @Id 
     * @Column(type="integer") 
     * @GeneratedValue 
     **/
    private $id;
    /**
     * @Column(type="string")
     */
    private $token;
    /**
     * Many OAuthAccessTokens have one oauthclient. This is the owning side.
     *
     * @ManyToOne(targetEntity="OAuthClient", inversedBy="oauth_access_tokens", fetch="EAGER")
     * @JoinColumn(name="client_id",          referencedColumnName="id")
     */
    private $client_id;
    /**
     * Many OAuthAccessTokens have one oauthuser. This is the owning side.
     *
     * @ManyToOne(targetEntity="OAuthUser", inversedBy="oauth_access_tokens", fetch="EAGER")
     * @JoinColumn(name="user_id",          referencedColumnName="id")
     */
    private $user_id;
    /**
     * @Column(type="datetime")
     */
    private $expires;

    /**
     * @Column(type="string", nullable=true)
     */
    private $scope;

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
     * Set token
     *
     * @param  string $token
     * @return OAuthAccessToken
     */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set client_id
     *
     * @param  string $clientId
     * @return OAuthAccessToken
     */
    public function setClientId($clientId)
    {
        $this->client_id = $clientId;
        return $this;
    }

    /**
     * Get client_id
     *
     * @return string
     */
    public function getClientId()
    {
        return $this->client_id;
    }

    /**
     * Set user_id
     *
     * @param  string $userIdentifier
     * @return OAuthAccessToken
     */
    public function setUserId($userId)
    {
        $this->user_id = $userId;
        return $this;
    }

    /**
     * Get user_identifier
     *
     * @return string
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set expires
     *
     * @param  \DateTime $expires
     * @return OAuthAccessToken
     */
    public function setExpires($expires)
    {
        $this->expires = $expires;
        return $this;
    }

    /**
     * Get expires
     *
     * @return \DateTime
     */
    public function getExpires()
    {
        return $this->expires;
    }

    /**
     * Set scope
     *
     * @param  string $scope
     * @return OAuthAccessToken
     */
    public function setScope($scope)
    {
        $this->scope = $scope;
        return $this;
    }

    /**
     * Get scope
     *
     * @return string
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * Set client
     *
     * @param  \YourNamespace\Entity\OAuthClient $client
     * @return OAuthAccessToken
     */
    public function setClient(OAuthClient $client = null)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * Get client
     *
     * @return \YourNamespace\Entity\OAuthClient
     */
    public function getClient()
    {
        return $this->client;
    }

    public static function fromArray($params)
    {
        $token = new self();
        foreach ($params as $property => $value) {
            $token->$property = $value;
        }
        return $token;
    }

    /**
     * Set user
     *
     * @param  \YourNamespace\Entity\OAuthUser $user
     * @return OAuthRefreshToken
     */
    public function setUser(OAuthUser $user = null)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Get user
     *
     * @return \YourNamespace\Entity\OAuthUser
     */
    public function getUser()
    {
        return $this->client;
    }

    public function toArray()
    {
        return [
            'token' => $this->token,
            'client_id' => $this->client_id,
            'user_id' => $this->user_id,
            'expires' => $this->expires,
            'scope' => $this->scope,
        ];
    }
}
