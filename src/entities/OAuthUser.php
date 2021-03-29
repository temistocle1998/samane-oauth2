<?php
/**
 * OAuthUser 
 * @entity @Table(name="oauth_users")
 * @entity(repositoryClass="src\model\OAuthUserRepository")
 */
class OAuthUser extends EncryptableFieldEntity
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;

    /**
     * @Column(type="string")
     */
    private $email;
    /**
     * @Column(type="string")
     */
    private $password;
    /**
    * One OAuthUser has many oauthaccesstokens. This is the inverse side.
    * @OneToMany(targetEntity="OAuthAccessToken", mappedBy="user_id")
    */
    private $oauth_access_tokens;
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
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $this->encryptField($password);
        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Verify user's password
     *
     * @param string $password
     * @return Boolean
     */
    public function verifyPassword($password)
    {
        return $this->verifyEncryptedFieldValue($this->getPassword(), $password);
    }

    public function toArray()
    {
        return [
            'user_id' => $this->id,
            'scope' => null,
        ];
    }
}
