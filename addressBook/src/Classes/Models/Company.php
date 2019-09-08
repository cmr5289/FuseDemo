namespace Address\Models;

class CompanyModel
{
    public $name = '';
    public $address = '';
    public $city = '';
    public $state = '';
    public $zip = '';
    public $phone = '';

    public function __construct($name, $address, $city, $state, $zip, $phone)
    {
        $this->name = $name;
        $this->address = $address;
        $this->city = $city;
        $this->phone = $phone;
        $this->zip = $zip;
    }

    public function getName(){
        return $this->name;
    }

    public function getAddress(){
        return $this->address;
    }

    public function getCity(){
        return $this->city();
    }

    public function getPhone(){
        return $this->phone();
    }

    public function getZip(){
        return $this->zip();
    }
}