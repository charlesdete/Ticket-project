<?php

class adduser extends Dbh {

    protected function setNewUser($name, $email){

        $stmt = $this->connect()->prepare('INSERT INTO users (Name, Email) VALUES (?, ?) ;');
        if(!$stmt->execute(array($name, $email))){

            $stmt = null;
            header('Location:user-add.php=?stmtfailed');
            exit();
        }
        $resultCheck = true;
    }
}




?>