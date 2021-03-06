<?php
/**
 * OAuthRefreshToken
 * @entity @Table(name="oauth_refresh_tokens")
 * @entity(repositoryClass="src\model\OAuthRefreshTokenRepository")
 */
class OAuthRefreshToken
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;
    /**
     * @Column(type="string")
     */
    private $refresh_token;
     /**
     * @Column(type="datetime")
     */
    private $expires;

    /**
     * @Column(type="string", nullable=true)
    */
    private $scope;

    /**
     * Many OAuthRefreshToken have one oauthclient. This is the owning side.
     *
     * @ManyToOne(targetEntity="OAuthClient", inversedBy="oauth_refresh_tokens", fetch="EAGER")
     * @JoinColumn(name="client_id",          referencedColumnName="id")
     */
    private $client_id;

   /**
     * Many OAuthRefreshToken have one oauthuser. This is the owning side.
     *
     * @ManyToOne(targetEntity="OAuthUser", inversedBy="oauth_refresh_tokens", fetch="EAGER")
     * @JoinColumn(name="user_id",          referencedColumnName="id")
     */
    private $user_id;

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
     * Set refresh_token
     *
     * @param string $refresh_token
     * @return OAuthRefreshToken
     */
    public function setRefreshToken($refresh_token)
    {
        $this->refresh_token = $refresh_token;

        return $this;
    }

    /**
     * Get refresh_token
     *
     * @return string
     */
    public function getRefreshToken()
    {
        return $this->refresh_token;
    }

    /**
     * Set client_id
     *
     * @param string $clientId
     * @return OAuthRefreshToken
     */
    public function setClientId(OAuthClient $clientId = null)
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
     * @param \src\entities\OAuthUser $user
     * @return OAuthUser
     */
    public function setUserId(OAuthUser $user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

   /**
     * Get user
     *
     * @return \src\entities\OAuthUser
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set expires
     *
     * @param \DateTime $expires
     * @return OAuthRefreshToken
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
     * @param string $scope
     * @return OAuthRefreshToken
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
     * @param \YourNamespace\Entity\OAuthClient $client
     * @return OAuthRefreshToken
     */
    public function setClient(OAuthClient $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \src\entities\OAuthClient
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set user
     *
     * @param \src\entities\OAuthUser $user
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
        return $this->user;
    }

    public function toArray()
    {
        return [
            'refresh_token' => $this->refresh_token,
            'client_id' => $this->client_id,
            'user_id' => $this->user_id,
            'expires' => $this->expires,
            'scope' => $this->scope,
        ];
    }

    public static function fromArray($params)
    {
        $token = new self();
        foreach ($params as $property => $value) {
            $token->$property = $value;
        }
        return $token;
    }
}
