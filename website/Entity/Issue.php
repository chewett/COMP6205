<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Issue
 *
 * @ORM\Table(name="issue", indexes={@ORM\Index(name="user", columns={"id_user"})})
 * @ORM\Entity
 */
class Issue
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_issue", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idIssue;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_bankaccount", type="integer", nullable=false)
     */
    private $idBankaccount;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    private $description;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status = '0';

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     * })
     */
    private $idUser;

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
	public function getIdBankaccount()
	{
		return $this->idBankaccount;
	}

	/**
	 * @param int $idBankaccount
	 */
	public function setIdBankaccount($idBankaccount)
	{
		$this->idBankaccount = $idBankaccount;
	}

	/**
	 * @return int
	 */
	public function getIdIssue()
	{
		return $this->idIssue;
	}

	/**
	 * @return Users
	 */
	public function getIdUser()
	{
		return $this->idUser;
	}

	/**
	 * @param Users $idUser
	 */
	public function setIdUser($idUser)
	{
		$this->idUser = $idUser;
	}

	/**
	 * @return boolean
	 */
	public function isStatus()
	{
		return $this->status;
	}

	/**
	 * @param boolean $status
	 */
	public function setStatus($status)
	{
		$this->status = $status;
	}

	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @param string $title
	 */
	public function setTitle($title)
	{
		$this->title = $title;
	}




}
