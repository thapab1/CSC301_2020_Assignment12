<?php
class User {
    public $id;
    public $name;
    public $email;
    public $age;
    public $password;
    public $roomsForRent;
    public $sex;
    public $profilePicture;
    public $phoneNumber;
    public $flatmateExpectation;
    public $cleanliness;
    public $bedtime;
    public $food;

    public function __construct($id, $name, $email, $age, $password, $roomsForRent, $sex, $profilePicture, $phoneNumber, $flatmateExpectation, $cleanliness, $bedtime, $food) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->age = $age;
        $this->password = $password;
        $this->roomsForRent = $roomsForRent;
        $this->sex = $sex;
        $this->profilePicture = $profilePicture;
        $this->phoneNumber = $phoneNumber;
        $this->flatmateExpectation = $flatmateExpectation;
        $this->cleanliness = $cleanliness;
        $this->bedtime = $bedtime;
        $this->food = $food;    
    }
}
?>