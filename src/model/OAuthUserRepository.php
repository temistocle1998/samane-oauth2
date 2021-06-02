<?php
namespace src\model;
use libs\system\Model; 

use OAuth2\Storage\UserCredentialsInterface;

class OAuthUserRepository extends Model implements UserCredentialsInterface
{
    public function checkUserCredentials($username, $password)
    {
        if($this->db != null) {
            $user = $this->db->createQuery('SELECT o FROM OAuthUser o WHERE o.username = :username')
                ->setParameter('username', $username)
                ->getOneOrNullResult();
            if ($user != null) {
                if ($password != '') {
                    if(password_verify($password, $user->getPassword()))
                        {
                            return $user;
                        }
                        else
                        {
                            return 0;
                        }
                }
                else{
                    return $user;
                }
            }
            else
            {
                return false;
            }
        }
        return 0;
    }

    /**
     * @return
     * ARRAY the associated "user_id" and optional "scope" values
     * This function MUST return FALSE if the requested user does not exist or is
     * invalid. "scope" is a space-separated list of restricted scopes.
     * @code
     * return array(
     *     "user_id"  => USER_ID,    // REQUIRED user_id to be stored with the authorization code or access token
     *     "scope"    => SCOPE       // OPTIONAL space-separated list of restricted scopes
     * );
     * @endcode
     */
    public function getUserDetails($username)
    {
        $user = $this->db->createQuery('SELECT o FROM OAuthUser o WHERE o.username=:username')
            ->setParameter('username', $username)
            ->getOneOrNullResult();
        if ($user) {
            $user = $user->toArray();
        }
        return $user;
    }

    public function getOAuthUser()
    {
        return $this->db->createQuery('SELECT o FROM OAuthUser o')->getResult();
    }
}
