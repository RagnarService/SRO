<?php

namespace PServerCMS\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Donatelog
 *
 * @ORM\Table(name="donateLog", indexes={@ORM\Index(name="fk_donateLog_users1_idx", columns={"users_usrId"})})
 * @ORM\Entity(repositoryClass="PServerCMS\Entity\Repository\DonateLog")
 */
class Donatelog {

	const TypePaymentWall = 'paymentwall';
	const TypeSuperReward = 'superreward';

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="`type`", type="string", length=45, nullable=false)
	 */
	private $type;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="transaction_id", type="string", length=255, nullable=true)
	 */
	private $transactionId;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="success", type="string", nullable=false)
	 */
	private $success;

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="coins", type="integer", nullable=false)
	 */
	private $coins;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="`desc`", type="text", nullable=false)
	 */
	private $desc;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="ip", type="string", length=60, nullable=false)
	 */
	private $ip;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="created", type="datetime", nullable=false)
	 */
	private $created;

	/**
	 * @var \PServerCMS\Entity\Users
	 *
	 * @ORM\ManyToOne(targetEntity="PServerCMS\Entity\Users")
	 * @ORM\JoinColumns({
	 *   @ORM\JoinColumn(name="users_usrId", referencedColumnName="usrId")
	 * })
	 */
	private $user;

	public function __construct( ) {
		$this->created = new \DateTime();
	}

	/**
	 * Get did
	 *
	 * @return integer
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Set transactionId
	 *
	 * @param string $transactionId
	 *
	 * @return Donatelog
	 */
	public function setTransactionId( $transactionId ) {
		$this->transactionId = $transactionId;

		return $this;
	}

	/**
	 * Get transactionId
	 *
	 * @return string
	 */
	public function getTransactionId() {
		return $this->transactionId;
	}

	/**
	 * Set type
	 *
	 * @param string $type
	 *
	 * @return Donatelog
	 */
	public function setType( $type ) {
		$this->type = $type;

		return $this;
	}

	/**
	 * Get type
	 *
	 * @return string
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * Set success
	 *
	 * @param string $success
	 *
	 * @return Donatelog
	 */
	public function setSuccess( $success ) {
		$this->success = $success;

		return $this;
	}

	/**
	 * Get success
	 *
	 * @return string
	 */
	public function getSuccess() {
		return $this->success;
	}

	/**
	 * Set coins
	 *
	 * @param integer $coins
	 *
	 * @return Donatelog
	 */
	public function setCoins( $coins ) {
		$this->coins = $coins;

		return $this;
	}

	/**
	 * Get coins
	 *
	 * @return integer
	 */
	public function getCoins() {
		return $this->coins;
	}

	/**
	 * Set desc
	 *
	 * @param string $desc
	 *
	 * @return Donatelog
	 */
	public function setDesc( $desc ) {
		$this->desc = $desc;

		return $this;
	}

	/**
	 * Get desc
	 *
	 * @return string
	 */
	public function getDesc() {
		return $this->desc;
	}

	/**
	 * Set ip
	 *
	 * @param string $ip
	 *
	 * @return Donatelog
	 */
	public function setIp( $ip ) {
		$this->ip = $ip;

		return $this;
	}

	/**
	 * Get ip
	 *
	 * @return string
	 */
	public function getIp() {
		return $this->ip;
	}

	/**
	 * Set created
	 *
	 * @param \DateTime $created
	 *
	 * @return Donatelog
	 */
	public function setCreated( $created ) {
		$this->created = $created;

		return $this;
	}

	/**
	 * Get created
	 *
	 * @return \DateTime
	 */
	public function getCreated() {
		return $this->created;
	}

	/**
	 * Set user
	 *
	 * @param \PServerCMS\Entity\Users $usersUsrid
	 *
	 * @return Donatelog
	 */
	public function setUser( \PServerCMS\Entity\Users $usersUsrid = null ) {
		$this->user = $usersUsrid;

		return $this;
	}

	/**
	 * Get user
	 *
	 * @return \PServerCMS\Entity\Users
	 */
	public function getUser() {
		return $this->user;
	}
}
