<?php

/**
 * Transaction
 *
 * @Table(name="transaction", uniqueConstraints={@UniqueConstraint(name="id_transaction_UNIQUE", columns={"id_transaction"})}, indexes={@Index(name="fk_transaction_1_idx", columns={"id_bankAccount_from"}), @Index(name="fk_transaction_2_idx", columns={"id_bankAccount_to"})})
 * @Entity
 */
class Transaction
{
	 /**
     * @var integer
     *
     * @Column(name="amount", type="integer", nullable=false)
     */
    private $amount;


    /**
     * @var integer
     *
     * @Column(name="id_transaction", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idTransaction;

    /**
     * @var string
     *
     * @Column(name="description", type="string", length=45, nullable=true)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @Column(name="time", type="datetime", nullable=false)
     */
    private $time;

    /**
     * @var \Bankaccount
     *
     * @ManyToOne(targetEntity="Bankaccount")
     * @JoinColumns({
     *   @JoinColumn(name="id_bankAccount_from", referencedColumnName="id_bankAccount")
     * })
     */
    private $idBankaccountFrom;

    /**
     * @var \Bankaccount
     *
     * @ManyToOne(targetEntity="Bankaccount")
     * @JoinColumns({
     *   @JoinColumn(name="id_bankAccount_to", referencedColumnName="id_bankAccount")
     * })
     */
    private $idBankaccountTo;

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

	public function getAmount()
	{
		return $this->amount;
	}

	/**
	 * @param string $description
	 */
	public function setAmount($money)
	{
		$this->amount = $money;
	}

	/**
	 * @return \Bankaccount
	 */
	public function getIdBankaccountFrom()
	{
		return $this->idBankaccountFrom;
	}

	/**
	 * @param \Bankaccount $idBankaccountFrom
	 */
	public function setIdBankaccountFrom($idBankaccountFrom)
	{
		$this->idBankaccountFrom = $idBankaccountFrom;
	}

	/**
	 * @return \Bankaccount
	 */
	public function getIdBankaccountTo()
	{
		return $this->idBankaccountTo;
	}

	/**
	 * @param \Bankaccount $idBankaccountTo
	 */
	public function setIdBankaccountTo($idBankaccountTo)
	{
		$this->idBankaccountTo = $idBankaccountTo;
	}

	/**
	 * @return int
	 */
	public function getIdTransaction()
	{
		return $this->idTransaction;
	}

	/**
	 * @return \DateTime
	 */
	public function getTime()
	{
		return $this->time;
	}

	/**
	 * @param \DateTime $time
	 */
	public function setTime($time)
	{
		$this->time = $time;
	}


}
