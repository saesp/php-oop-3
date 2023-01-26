<?php
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

class Dipendent extends Person
{
    private $salary;
    private $dateOfRecruitment;


    public function __construct($name, $surname, $dateOfBirth, $placeOfBirth, $fiscalCode, $salary, $dateOfRecruitment)
    {
        parent::__construct($name, $surname, $dateOfBirth, $placeOfBirth, $fiscalCode);
        $this->setSalary($salary);
        $this->setDateOfRecruitment($dateOfRecruitment);
    }


    public function getSalary()
    {
        return $this->salary;
    }
    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    public function getDateOfRecruitment()
    {
        return $this->dateOfRecruitment;
    }
    public function setDateOfRecruitment($dateOfRecruitment)
    {
        $this->dateOfRecruitment = $dateOfRecruitment;
    }


    public function getHtml()
    {
        return
            '<h3>Dipendent</h3>'
            . parent::getHtml() . '<br>'
            . $this->getSalary() . '<br>'
            . $this->getDateOfRecruitment() . '<br>';
    }
}

class Salary
{
    private $monthly;
    private $thirteenth;
    private $fourteenth;


    public function __construct($monthly, $thirteenth, $fourteenth)
    {
        $this->setmonthly($monthly);
        $this->setthirteenth($thirteenth);
        $this->setfourteenth($fourteenth);
    }


    public function getmonthly()
    {
        return $this->monthly;
    }
    public function setmonthly($monthly)
    {
        $this->monthly = $monthly;
    }

    public function getthirteenth()
    {
        return $this->thirteenth;
    }
    public function setthirteenth($thirteenth)
    {
        $this->thirteenth = $thirteenth;
    }
    public function getfourteenth()
    {
        return $this->fourteenth;
    }
    public function setfourteenth($fourteenth)
    {
        $this->fourteenth = $fourteenth;
    }

    public function getHtml()
    {
        return ($this->getmonthly() * 12) + $this->getthirteenth() + $this->getfourteenth() . '$ net';
    }
}


// Oggetti/Istanze
$salary = new Salary(2500, 1250, 750);

$persons = [
    new Person('Name', 'Surname', 'date_of_birth', 'place_of_birth', 'fiscal_code'),
    new Leader('Jennifer', 'Bianchi', '10/01/1995', 'Napoli', '1727FAYS2128AH', 'dividend', 'bonus'),
    new Dipendent('Marco', 'Verdi', '20/03/1990', 'Torino', '27238SHEUE7383', $salary->getHtml(), '01/01/2022'),

];

foreach ($persons as $person) {
    echo $person->getHtml();
}