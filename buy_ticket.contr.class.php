<?php


class buy_ticketContr extends buy_ticket{
    private $firstname;
    private $secondname;
    private $email;
    private $phone;
    private $cost;

    public function __construct($firstname, $secondname, $email, $phone, $cost){
        $this->firstname = $firstname;
        $this->secondname= $secondname;
        $this->email = $email;
        $this->phone = $phone;
        $this->cost = $cost;

    }

    public function buyTicket(){

        if($this->invalidFirstname() == false){
            echo "Empty firstname input";
            header('Location:buy_ticket.php?error=firstname');
            exit();
        }

        $this->setTicket($this->firstname,$this->secondname,$this->email, $this->phone, $this->cost );
    }

    private function emptyInput() {
        $result= true;
        if(empty($this->firstname)|| empty($this->secondname)|| empty($this->email) || empty($this->phone) || empty($this->cost)){
          $result =false;
        }
        return $result;
     }

     private function invalidFirstname(){
        $result= true;
        if(!preg_match("/^[a-zA-z0-9]*$/", $this->firstname))
        {
            $result = false;
        }
        return $result;
      }
}
?>

