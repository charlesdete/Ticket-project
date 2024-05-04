<?php


Class user_profile extends Dbh {


    protected function selectUser($email){

        $sql = "SELECT * FROM users WHERE Email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);

        $result = $stmt->fetchAll();
        return $result;

        

    }
}



