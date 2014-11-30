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
	 * @var \Accounttype
	 *
	 * @ManyToOne(targetEntity="Accounttype")
	 * @JoinColumns({
	 *   @JoinColumn(name="id_accountType", referencedColumnName="id_accountType", nullable=false)
	 * })
	 */
	private $idAccounttype;


     /**
     * @var string
     *
     * @Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;


    /**
     * @var integer
     *
     * @Column(name="balance", type="integer", nullable=false)
     */
    private $balance;

    /**
     * @var \Users
     *
     * @ManyToOne(targetEntity="Users")
     * @JoinColumns({
     *   @JoinColumn(name="id_user", referencedColumnName="id_user", nullable=false)
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

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param string $name
	 */
	public function setName($name)
	{
		$this->name = $name;
	}

	/**
	 * @return Accounttype
	 */
	public function getIdAccounttype()
	{
		return $this->idAccounttype;
	}

	/**
	 * @param Accounttype $idAccounttype
	 */
	public function setIdAccounttype($idAccounttype)
	{
		$this->idAccounttype = $idAccounttype;
	}


}
