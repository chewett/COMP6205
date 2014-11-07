<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Options
 *
 * @ORM\Table(name="options", uniqueConstraints={@ORM\UniqueConstraint(name="key_UNIQUE", columns={"key"})})
 * @ORM\Entity
 */
class Options
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_options", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOptions;

    /**
     * @var string
     *
     * @ORM\Column(name="key", type="string", length=45, nullable=false)
     */
    private $key;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=45, nullable=false)
     */
    private $value;

    /**
     * @return int
     */
    public function getIdOptions()
    {
        return $this->idOptions;
    }

    /**
     * @param int $idOptions
     */
    public function setIdOptions($idOptions)
    {
        $this->idOptions = $idOptions;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }



}
