<?php

/**
 * Accountreport
 *
 * @Table(name="accountReport", indexes={@Index(name="fk_accountReport_1_idx", columns={"id_bankAccount"})})
 * @Entity
 */
class Accountreport
{
    /**
     * @var integer
     *
     * @Column(name="id_accountReport", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idAccountreport;

    /**
     * @var string
     *
     * @Column(name="decription", type="text", nullable=false)
     */
    private $decription;

    /**
     * @var boolean
     *
     * @Column(name="open", type="boolean", nullable=false)
     */
    private $open;

    /**
     * @var \Bankaccount
     *
     * @ManyToOne(targetEntity="Bankaccount")
     * @JoinColumns({
     *   @JoinColumn(name="id_bankAccount", referencedColumnName="id_bankAccount")
     * })
     */
    private $idBankaccount;


	/**
	 * @return string
	 */
	public function getDecription()
	{
		return $this->decription;
	}

	/**
	 * @param string $decription
	 */
	public function setDecription($decription)
	{
		$this->decription = $decription;
	}

	/**
	 * @return \Bankaccount
	 */
	public function getIdBankaccount()
	{
		return $this->idBankaccount;
	}

	/**
	 * @param \Bankaccount $idBankaccount
	 */
	public function setIdBankaccount($idBankaccount)
	{
		$this->idBankaccount = $idBankaccount;
	}

	/**
	 * @return boolean
	 */
	public function isOpen()
	{
		return $this->open;
	}

	/**
	 * @param boolean $open
	 */
	public function setOpen($open)
	{
		$this->open = $open;
	}

}
