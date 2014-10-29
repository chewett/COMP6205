<?php

namespace Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users", uniqueConstraints={@ORM\UniqueConstraint(name="id_user_UNIQUE", columns={"id_user"})}, indexes={@ORM\Index(name="fk_users_1_idx", columns={"id_role"})})
 * @ORM\Entity
 */
class Users
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=45, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=45, nullable=false)
     */
    private $lastname;

    /**
     * @var integer
     *
     * @ORM\Column(name="bankAccount", type="integer", nullable=true)
     */
    private $bankaccount;

    /**
     * @var \Role
     *
     * @ORM\ManyToOne(targetEntity="Role")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_role", referencedColumnName="id_role")
     * })
     */
    private $idRole;

	/**
	 * @return int
	 */
	public function getBankaccount()
	{
		return $this->bankaccount;
	}

	/**
	 * @param int $bankaccount
	 */
	public function setBankaccount($bankaccount)
	{
		$this->bankaccount = $bankaccount;
	}

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


}
