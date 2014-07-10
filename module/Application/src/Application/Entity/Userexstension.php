<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Userexstension
 *
 * @ORM\Table(name="userExstension", indexes={@ORM\Index(name="fk_userExstension_users1_idx", columns={"users_usrId"})})
 * @ORM\Entity
 */
class Userexstension
{
    /**
     * @var integer
     *
     * @ORM\Column(name="eId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $eid;

    /**
     * @var string
     *
     * @ORM\Column(name="key", type="string", length=255, nullable=false)
     */
    private $key;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=255, nullable=false)
     */
    private $value;

    /**
     * @var \Application\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="users_usrId", referencedColumnName="usrId")
     * })
     */
    private $usersUsrid;



    /**
     * Get eid
     *
     * @return integer 
     */
    public function getEid()
    {
        return $this->eid;
    }

    /**
     * Set key
     *
     * @param string $key
     * @return Userexstension
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get key
     *
     * @return string 
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return Userexstension
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set usersUsrid
     *
     * @param \Application\Entity\Users $usersUsrid
     * @return Userexstension
     */
    public function setUsersUsrid(\Application\Entity\Users $usersUsrid = null)
    {
        $this->usersUsrid = $usersUsrid;

        return $this;
    }

    /**
     * Get usersUsrid
     *
     * @return \Application\Entity\Users 
     */
    public function getUsersUsrid()
    {
        return $this->usersUsrid;
    }
}
