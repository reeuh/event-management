<?php

require_once 'database.php';

Class Venue{
    //attributes

    public $venue;
    public $address;
    public $description;
    public $rate;

    protected $db;

   function __construct()
   {
       $this->db = new Database();
    }


        //Methods
       function add(){
           $sql = "INSERT INTO event (venue, address, description, rate) VALUES 
         (:venue, :address, :description, :rate);";
    
      $query=$this->db->connect()->prepare($sql);
     $query->bindParam(':venue', $this->venue);
         $query->bindParam(':address', $this->address);
        $query->bindParam(':description', $this->description);
      $query->bindParam(':rate', $this->rate);
            
      if($query->execute()){
             return true;
           }
           else{
               return false;
           }	
       }
    
       function edit(){
          $sql = "UPDATE venue SET venue=:venue, address=:address, description=:description, rate=:rate";
    
          $query=$this->db->connect()->prepare($sql);
          $query->bindParam(':venue', $this->venue);
         $query->bindParam(':address', $this->address);
        $query->bindParam(':description', $this->description);
          $query->bindParam(':rate', $this->rate);
    
          if($query->execute()){
        return true;
         }
        else{
            return false;
        }
     }
    
       function fetch($record_id){
        $sql = "SELECT * FROM venue WHERE id = :id;";
       $query=$this->db->connect()->prepare($sql);
       $query->bindParam(':id', $record_id);
       if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
      }
    
     function delete($record_id){
       $sql = "DELETE FROM venue WHERE id = :id;";
         $query=$this->db->connect()->prepare($sql);
         $query->bindParam(':id', $record_id);
          if($query->execute()){
             return true;
        }
           else{
               return false;
            }
       }
    
     function show(){
      $sql = "SELECT * FROM venue ORDER BY venue ASC;";
           $query=$this->db->connect()->prepare($sql);
          if($query->execute()){
            $data = $query->fetchAll();
        }
         return $data;
    }
 
  }
    
 
 ?>