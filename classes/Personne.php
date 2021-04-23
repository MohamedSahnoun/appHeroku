<?php


class Personne
{
    private $ID;
    private $name;
    private $firstname;
    private $age;
    private $profession;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->ID;
    }

    /**
     * @param mixed $id
     */
    public function setId($ID): void
    {
        $this->ID = $ID;
    }
    /**
     * @return mixed|string
     */
    public function getProfession(): mixed
    {
        return $this->profession;
    }

    /**
     * @param mixed|string $profession
     */
    public function setProfession(mixed $profession): void
    {
        $this->profession = $profession;
    }



    /**
     * personne constructor.
     * @param $name
     * @param $firstname
     * @param $age
     */
    public function __construct($name = '', $firstname = '', $age = 0,$pro='doctor')
    {
        $this->name = $name;
        $this->firstname = $firstname;
        $this->age = $age;
        $this->profession=$pro;
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age): void
    {
        $this->age = $age;
    }

    function whoAmI() {
        echo "Je suis ". $this->firstname. " ". $this->name;
    }

    public function __toString()
    {
        return "Je suis ". $this->firstname. " ". $this->name;
    }

}