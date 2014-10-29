<?php

namespace Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Accountreport
 *
 * @ORM\Table(name="accountReport", indexes={@ORM\Index(name="fk_accountReport_1_idx", columns={"id_bankAccount"})})
 * @ORM\Entity
 */
class Accountreport
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_accountReport", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAccountreport;

    /**
     * @var string
     *
     * @ORM\Column(name="decription", type="text", nullable=false)
     */
    private $decription;

    /**
     * @var boolean
     *
     * @ORM\Column(name="open", type="boolean", nullable=false)
     */
    private $open;

    /**
     * @var \Bankaccount
     *
     * @ORM\ManyToOne(targetEntity="Bankaccount")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_bankAccount", referencedColumnName="id_bankAccount")
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
