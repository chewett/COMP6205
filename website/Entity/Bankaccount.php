<?php

/**
 * Bankaccount
 *
 * @Table(name="bankAccount", indexes={@Index(name="fk_bankAccount_1_idx", columns={"id_user"})})
 * @Entity
 */
class Bankaccount
{
    /**
     * @var integer
     *
     * @Column(name="id_bankAccount", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idBankaccount;


    /**
     * @var string
     *
     * @Column(name="type", type="string", length=45, nullable=false)
     */
    private $type;


     /**
     * @var string
     *
     * @Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;


    /**
     * @var integer
     *
     * @Column(name="balance", type="integer", nullable=true)
     */
    private $balance;

    /**
     * @var \Users
     *
     * @ManyToOne(targetEntity="Users")
     * @JoinColumns({
     *   @JoinColumn(name="id_user", referencedColumnName="id_user")
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
