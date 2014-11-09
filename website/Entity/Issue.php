<?php

/**
 * Issue
 *
 * @Table(name="issue", indexes={@Index(name="user", columns={"id_user"})})
 * @Entity
 */
class Issue
{
    /**
     * @var integer
     *
     * @Column(name="id_issue", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idIssue;

	/**
	 * @var \Bankaccount
	 *
	 * @ManyToOne(targetEntity="Bankaccount")
	 * @JoinColumns({
	 *   @JoinColumn(name="id_bankaccount", referencedColumnName="id_bankAccount")
	 * })
	 */
	private $idBankaccount;

    /**
     * @var string
     *
     * @Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @Column(name="description", type="text", nullable=false)
     */
    private $description;

    /**
     * @var boolean
     *
     * @Column(name="status", type="boolean", nullable=false)
     */
    private $status = '1';

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
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @param string $description
	 */
	public function setDescription($description)
	{
		$this->description = $description;
	}

	/**
	 * @return Bankaccount
	 */
	public function getIdBankaccount()
	{
		return $this->idBankaccount;
	}

	/**
	 * @param Bankaccount $idBankaccount
	 */
	public function setIdBankaccount($idBankaccount)
	{
		$this->idBankaccount = $idBankaccount;
	}

	/**
	 * @return int
	 */
	public function getIdIssue()
	{
		return $this->idIssue;
	}

	/**
	 * @return Users
	 */
	public function getIdUser()
	{
		return $this->idUser;
	}

	/**
	 * @param Users $idUser
	 */
	public function setIdUser($idUser)
	{
		$this->idUser = $idUser;
	}

	/**
	 * @return boolean
	 */
	public function isStatus()
	{
		return $this->status;
	}

	/**
	 * @param boolean $status
	 */
	public function setStatus($status)
	{
		$this->status = $status;
	}

	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @param string $title
	 */
	public function setTitle($title)
	{
		$this->title = $title;
	}




}
