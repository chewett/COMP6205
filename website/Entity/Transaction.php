<?php

namespace Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Transaction
 *
 * @ORM\Table(name="transaction", uniqueConstraints={@ORM\UniqueConstraint(name="id_transaction_UNIQUE", columns={"id_transaction"})}, indexes={@ORM\Index(name="fk_transaction_1_idx", columns={"id_bankAccount_from"}), @ORM\Index(name="fk_transaction_2_idx", columns={"id_bankAccount_to"})})
 * @ORM\Entity
 */
class Transaction
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_transaction", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTransaction;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=45, nullable=true)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="datetime", nullable=false)
     */
    private $time;

    /**
     * @var \Bankaccount
     *
     * @ORM\ManyToOne(targetEntity="Bankaccount")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_bankAccount_from", referencedColumnName="id_bankAccount")
     * })
     */
    private $idBankaccountFrom;

    /**
     * @var \Bankaccount
     *
     * @ORM\ManyToOne(targetEntity="Bankaccount")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_bankAccount_to", referencedColumnName="id_bankAccount")
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
