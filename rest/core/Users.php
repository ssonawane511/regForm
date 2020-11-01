<?php
namespace Core\Data;

class Users {

    public $name = null;
    public $email = null;
    public $phone = null;
    public $country = null;
    public $gender = null;
   

    private $table_name = null;
    private $conn = null;

    public function __construct($conn) {
        $this->conn = $conn;
        $this->table_name = TABLE;
    }

    public function getRegistration() {
        $sql = "SELECT * FROM {$this->table_name} ORDER BY date";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    public function getRegistrationById() {
        $sql = "SELECT * FROM {$this->table_name} WHERE id like ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        return $stmt;
    }

    public function update() {
        $sql = "UPDATE
                    {$this->table_name}
                SET
                
                    fname = :fname,
                    lname = :lname,
                    
                    email = :email,
                    phone = :phone,
                    age = :age
                WHERE
                    id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id',$this->id);
        $stmt->bindParam(':fname',$this->fname);
        $stmt->bindParam(':lname',$this->lname);
        $stmt->bindParam(':phone',$this->phone);
        $stmt->bindParam(':email',$this->email);
        $stmt->bindParam(':age',$this->age);

        $stmt->execute();
       
        return $stmt->rowCount();
        
    }
    public function insert() {
     

   $sql = "INSERT INTO  {$this->table_name} (`name`, `email`, `phone`, `country`, `gender`) 
           VALUES 
           (:name, 
            :email, 
            :phone,  
            :country, 
            :gender)"; 

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name',$this->name);
        $stmt->bindParam(':email',$this->email);
        $stmt->bindParam(':phone',$this->phone);
        $stmt->bindParam(':country',$this->country);
        $stmt->bindParam(':gender',$this->gender);
        try {
             $stmt->execute();
        }catch(\PDOException $exp) {
            echo "Connection Error: " . $exp->getMessage();
        }
        return $stmt->rowCount();
        
    }
    function delete() {
        $sql = "DELETE FROM {$this->table_name} WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $this->id = \htmlspecialchars($this->id);
      
        $stmt->bindParam(1,$this->id);

      
        $stmt->execute();
        return $stmt->rowCount();
    }



}
?>