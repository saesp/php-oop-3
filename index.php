<?php
// Classes
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
        return 'Name: ' . $this->getName() . '<br>'
            . 'Surname: ' . $this->getSurname() . '<br>'
            . 'Date of birth: ' . $this->getDateOfBirth() . '<br>'
            . 'Place of birth: ' . $this->getPlaceOfBirth() . '<br>'
            . 'Fiscal code: ' . $this->getFiscalCode();
    }
}

class Leader extends Person
{
    private $dividend;
    private $bonus;
    private $income;


    public function __construct($name, $surname, $dateOfBirth, $placeOfBirth, $fiscalCode, $dividend, $bonus, $income)
    {
        parent::__construct($name, $surname, $dateOfBirth, $placeOfBirth, $fiscalCode);
        $this->setDividend($dividend);
        $this->setBonus($bonus);
        $this->setIncome($income);
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

    public function getIncome()
    {
        return $this->income;
    }
    public function setIncome($income)
    {
        $this->income = $income;
    }

    public function getHtml()
    {
        return
            '<h3>Leader</h3>'
            . parent::getHtml() . '<br>'
            . 'Dividend: ' . $this->getDividend() . '<br>'
            . 'Bonus: ' . $this->getBonus() . '<br>'
            . 'Annual income: ' . $this->getIncome();
    }

    public function getAnnualIncome()
    {
        return ($this->getDividend() * 12) + $this->getBonus() . '$';
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
            . 'Salary: ' . $this->getSalary() . '<br>'
            . 'Date of recruitment: ' . $this->getDateOfRecruitment();
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
        return ($this->getmonthly() * 12) + ($this->getthirteenth() ? $this->getmonthly() : 0) + ($this->getfourteenth() ? $this->getmonthly() : 0) . '$ net per year';
    }
}


// Objects
$salary_rossi_marco = new Salary(2600, false, false);
$salary_verdi_francesca = new Salary(3000, true, true);
$leader = new Leader('Jennifer', 'Bianchi', '10/01/1995', 'Napoli', '272HDHJS278WHS', 50000, 10000, null);

$persons = [
        // new Person('Name', 'Surname', 'date_of_birth', 'place_of_birth', 'fiscal_code'),
    new Leader(
        'Jennifer',
        'Bianchi',
        '10/01/1995',
        'Napoli',
        '272HDHJS278WHS',
        50000,
        10000,
        $leader->getAnnualIncome()
    ),
    new Dipendent('Marco', 'Rossi', '22/08/1993', 'Genova', 'RM2EYDH278SI24', $salary_rossi_marco->getHtml(), '08/02/2022'),
    new Dipendent('Francesca', 'Verdi', '20/03/1990', 'Torino', 'VF238SHEUE7383', $salary_verdi_francesca->getHtml(), '01/01/2020'),
];

foreach ($persons as $person) {
    echo $person->getHtml();
}