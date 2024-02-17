<?php

class userUpdatecontr extends user_update{

    private $name;
    private $email;
  
    public function __construct($name, $email){
        $this->name = $name;
        $this->email = $email;
       

    }

    public function user_update(){
        if($this->emptyInput() == false){
            echo "empty input";
            header('location:user-update.php?error=emptyinput');
            exit();
        }
        $this->setUpdate ($this->name, $this->email);
    }


    private function emptyInput(){
        $result =true;
        if(empty($this->name) || empty($this->email)){
            $result=false;
        }
        return $result;
        }

}


?>