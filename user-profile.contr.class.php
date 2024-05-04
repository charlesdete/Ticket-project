<?php


Class user_profileContr  extends user_profile{

    private $email; 


    public function __construct($email){


        $this->email = $email;

    }


    public function showProfile(){


        $results= $this->selectUser($this->email);

       echo 'Hi I am '.$this->email;
       ?>
      </br>
       <?php

        echo 'A growing ambitious software developer.';

    }
}

