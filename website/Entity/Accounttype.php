<?php

/**
 * Accounttype
 *
 * @Table(name="accountType", uniqueConstraints={@UniqueConstraint(name="name_UNIQUE", columns={"name"})})
 * @Entity
 */
class Accounttype
{
    /**
     * @var integer
     *
     * @Column(name="id_accountType", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idAccounttype;

    /**
     * @var string
     *
     * @Column(name="name", type="string", length=45, nullable=true)
     */
    private $name;

	/**
	 * @return int
	 */
	public function getIdAccounttype()
	{
		return $this->idAccounttype;
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



}
