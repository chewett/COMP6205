<?php

/**
 * Options
 *
 * @Table(name="options", uniqueConstraints={@UniqueConstraint(name="key_UNIQUE", columns={"keyname"})})
 * @Entity
 */
class Options
{
    /**
     * @var integer
     *
     * @Column(name="id_options", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idOptions;

    /**
     * @var string
     *
     * @Column(name="keyname", type="string", length=45, nullable=false)
     */
    private $keyname;

    /**
     * @var string
     *
     * @Column(name="value", type="string", length=45, nullable=false)
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
    public function getKeyname()
    {
        return $this->keyname;
    }

    /**
     * @param string $keyname
     */
    public function setKeyname($keyname)
    {
        $this->keyname = $keyname;
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
