<?php

/**
 * Rolehaspermission
 *
 * @Table(name="roleHasPermission", indexes={@Index(name="fk_roleHasPermission_1_idx", columns={"id_permission"}), @Index(name="fk_roleHasPermission_2_idx", columns={"id_role"})})
 * @Entity
 */
class Rolehaspermission
{
    /**
     * @var integer
     *
     * @Column(name="idroleHasPermission", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idrolehaspermission;

    /**
     * @var \Permission
     *
     * @ManyToOne(targetEntity="Permission")
     * @JoinColumns({
     *   @JoinColumn(name="id_permission", referencedColumnName="idpermission", nullable=false)
     * })
     */
    private $idPermission;

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
