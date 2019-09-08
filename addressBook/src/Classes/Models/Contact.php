namespace Address\Models;

class ContactModel
{
    public $company;
    public $firstName;
    public $lastName;
    public $phone;
    public $email;

    public function __construct($company, $firstName, $lastName, $phone, $email)
    {
        $this->company = $company;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->phone = $phone;
        $this->email = $email;
    }

    public function getCompanyName(){
        return $this->company->name;
    }

    public function getContactName(){
        return $this->firstName . " " . $this->lastname;
    }

    public function getPhone(){
        return $this->phone();
    }

    public function getEmail(){
        return $this->email();
    }


}