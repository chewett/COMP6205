<?php

/**
 * Role
 *
 * @Table(name="role")
 * @Entity
 */
class Role
{
    /**
     * @var integer
     *
     * @Column(name="id_role", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idRole;

    /**
     * @var string
     *
     * @Column(name="roleName", type="string", length=45, nullable=false)
     */
    private $rolename;

    /**
     * @var string
     *
     * @Column(name="description", type="string", length=255, nullable=true)
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
	public function getIdRole()
	{
		return $this->idRole;
	}

	/**
	 * @return string
	 */
	public function getRolename()
	{
		return $this->rolename;
	}

	/**
	 * @param string $rolename
	 */
	public function setRolename($rolename)
	{
		$this->rolename = $rolename;
	}


}
