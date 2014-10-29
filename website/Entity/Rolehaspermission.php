<?php

namespace Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Rolehaspermission
 *
 * @ORM\Table(name="roleHasPermission", indexes={@ORM\Index(name="fk_roleHasPermission_1_idx", columns={"id_permission"}), @ORM\Index(name="fk_roleHasPermission_2_idx", columns={"id_role"})})
 * @ORM\Entity
 */
class Rolehaspermission
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idroleHasPermission", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idrolehaspermission;

    /**
     * @var \Permission
     *
     * @ORM\ManyToOne(targetEntity="Permission")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_permission", referencedColumnName="idpermission")
     * })
     */
    private $idPermission;

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
	 * @return \Permission
	 */
	public function getIdPermission()
	{
		return $this->idPermission;
	}

	/**
	 * @param \Permission $idPermission
	 */
	public function setIdPermission($idPermission)
	{
		$this->idPermission = $idPermission;
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
	public function getIdrolehaspermission()
	{
		return $this->idrolehaspermission;
	}



}
