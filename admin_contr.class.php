<?php


Class ChangeRole extends role{


    private $name;
    private $email;
    private $role;

    public function __construct($name,$email,$role){

        $this->name = $name ;
        $this->email = $email;
        $this->role = $role;
    }


    public function showRole(){

        $results = $this->UpdateRole($this->name,$this->email,$this->role);

        echo " Successfull change of role for this email :" .$this->email;
    }
}





