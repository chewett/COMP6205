<?php

/**
 * Permission
 *
 * @Table(name="permission", uniqueConstraints={@UniqueConstraint(name="name_UNIQUE", columns={"name"})})
 * @Entity
 */
class Permission
{
    /**
     * @var integer
     *
     * @Column(name="idpermission", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idpermission;

    /**
     * @var string
     *
     * @Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

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
	 * @return int
	 */
	public function getIdpermission()
	{
		return $this->idpermission;
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
