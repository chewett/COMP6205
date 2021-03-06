<?php

/**
 * Users
 *
 * @Table(name="users", uniqueConstraints={@UniqueConstraint(name="id_user_UNIQUE", columns={"id_user"})}, indexes={@Index(name="fk_users_1_idx", columns={"id_role"})})
 * @Entity
 */
class Users
{
    /**
     * @var integer
     *
     * @Column(name="id_user", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idUser;

     /**
     * @var string
     *
     * @Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @Column(name="firstName", type="string", length=45, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @Column(name="lastName", type="string", length=45, nullable=false)
     */
    private $lastname;


    /**
     * @var string
     *
     * @Column(name="username", type="string", length=45, nullable=false, unique=true)
     */
    private $username;

    /**
     * @var \Role
     *
     * @ManyToOne(targetEntity="Role")
     * @JoinColumns({
     *   @JoinColumn(name="id_role", referencedColumnName="id_role", nullable=false)
     * })
     */
    private $idRole;

	/**
	 * @return string
	 */
	public function getFirstname()
	{
		return $this->firstname;
	}

	/**
	 * @param string $firstname
	 */
	public function setFirstname($firstname)
	{
		$this->firstname = $firstname;
	}

	/**
	 * @return \Role
	 */
	public function getIdRole()
	{
		return $this->idRole;
	}

	/**
	 * @param \Role $idRole
	 */
	public function setIdRole($idRole)
	{
		$this->idRole = $idRole;
	}

	/**
	 * @return int
	 */
	public function getIdUser()
	{
		return $this->idUser;
	}

	/**
	 * @return string
	 */
	public function getLastname()
	{
		return $this->lastname;
	}

	/**
	 * @param string $lastname
	 */
	public function setLastname($lastname)
	{
		$this->lastname = $lastname;
	}

	/**
	 * @return string
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * @param string $password
	 */
	public function setPassword($password)
	{
		$this->password = $password;
	}

	/**
	 * @return string
	 */
	public function getUsername()
	{
		return $this->username;
	}

	/**
	 * @param string $username
	 */
	public function setUsername($username)
	{
		$this->username = $username;
	}




}
