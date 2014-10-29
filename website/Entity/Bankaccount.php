<?php

namespace Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Bankaccount
 *
 * @ORM\Table(name="bankAccount", indexes={@ORM\Index(name="fk_bankAccount_1_idx", columns={"id_user"})})
 * @ORM\Entity
 */
class Bankaccount
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_bankAccount", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idBankaccount;

    /**
     * @var integer
     *
     * @ORM\Column(name="balance", type="integer", nullable=true)
     */
    private $balance;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     * })
     */
    private $idUser;

	/**
	 * @return int
	 */
	public function getBalance()
	{
		return $this->balance;
	}

	/**
	 * @param int $balance
	 */
	public function setBalance($balance)
	{
		$this->balance = $balance;
	}

	/**
	 * @return int
	 */
	public function getIdBankaccount()
	{
		return $this->idBankaccount;
	}

	/**
	 * @return \Users
	 */
	public function getIdUser()
	{
		return $this->idUser;
	}

	/**
	 * @param \Users $idUser
	 */
	public function setIdUser($idUser)
	{
		$this->idUser = $idUser;
	}


}
