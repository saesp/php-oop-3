<?php

// private $salary;
// private $dateOfRecruitment;
class Person
{
    private $name;
    private $surname;
    private $dateOfBirth;
    private $placeOfBirth;
    private $fiscalCode;


    public function __construct($name, $surname, $dateOfBirth, $placeOfBirth, $fiscalCode)
    {
        $this->setName($name);
        $this->setSurname($surname);
        $this->setDateOfBirth($dateOfBirth);
        $this->setPlaceOfBirth($placeOfBirth);
        $this->setFiscalCode($fiscalCode);
    }


    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSurname()
    {
        return $this->surname;
    }
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    public function getPlaceOfBirth()
    {
        return $this->placeOfBirth;
    }
    public function setPlaceOfBirth($placeOfBirth)
    {
        $this->placeOfBirth = $placeOfBirth;
    }

    public function getFiscalCode()
    {
        return $this->fiscalCode;
    }
    public function setFiscalCode($fiscalCode)
    {
        $this->fiscalCode = $fiscalCode;
    }


    public function getHtml()
    {
        return $this->getName() . '<br>'
            . $this->getSurname() . '<br>'
            . $this->getDateOfBirth() . '<br>'
            . $this->getPlaceOfBirth() . '<br>'
            . $this->getFiscalCode();
    }
}

class Leader extends Person
{
    private $dividend;
    private $bonus;


    public function __construct($name, $surname, $dateOfBirth, $placeOfBirth, $fiscalCode, $dividend, $bonus)
    {
        parent::__construct($name, $surname, $dateOfBirth, $placeOfBirth, $fiscalCode);
        $this->setDividend($dividend);
        $this->setBonus($bonus);
    }

    public function getDividend()
    {
        return $this->dividend;
    }
    public function setDividend($dividend)
    {
        $this->dividend = $dividend;
    }

    public function getBonus()
    {
        return $this->bonus;
    }
    public function setBonus($bonus)
    {
        $this->bonus = $bonus;
    }


    public function getHtml()
    {
        return
            '<h3>Leader</h3>'
            . parent::getHtml() . '<br>'
            . $this->getDividend() . '<br>'
            . $this->getBonus() . '<br>';
    }
}


// Oggetti/Istanze
$persons = [
    new Person(1, 2, 3, 4, 5),
    new Leader(7, 8, 9, 10, 11, 12, 13),
];

foreach ($persons as $person) {
    echo $person->getHtml();
}