<?php
class user_update extends Dbh {

    protected function setUpdate($name, $email) {
        $stmt = $this->connect()->prepare("UPDATE users SET Name=? WHERE Email=?");
        
        if(!$stmt->execute(array($name, $email))){

            $stmt = null;
            // header('Location:user-add.php=?stmtfailed');
            // exit();
            
        }
        $resultCheck = true;
    }
}

?>