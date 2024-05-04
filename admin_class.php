<?php



Class role extends Dbh{

    protected  function UpdateRole($name,$email,$role){

        $sql= "UPDATE users SET Name = ?, role = ? WHERE Email = ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name,$role,$email]);

        $results = $stmt->fetchAll();
        return $results;
    }
}

