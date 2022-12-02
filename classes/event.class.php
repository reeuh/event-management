<?php

require_once 'database.php';

Class Event{
    //attributes

    public $client;
    public $address;
    public $phone_no;
    public $event;
    public $schedule;
    public $type;
    public $audience_capacity;
    public $payment_type;
    public $amount;
    public $status;

    protected $db;

   function __construct()
   {
       $this->db = new Database();
    }


        //Methods
       function add(){
           $sql = "INSERT INTO event (client, address, phone_no, event, schedule, type, audience_capacity, payment_type, amount, status) VALUES 
         (:client, :address, :phone_no, :event, :schedule, :type, :audience_capacity, :payment_type, :amount, :status);";
    
      $query=$this->db->connect()->prepare($sql);
     $query->bindParam(':client', $this->client);
         $query->bindParam(':address', $this->address);
        $query->bindParam(':phone_no', $this->phone_no);
      $query->bindParam(':event', $this->event);
       $query->bindParam(':schedule', $this->schedule);
       $query->bindParam(':type', $this->type);
       $query->bindParam(':audience_capacity', $this->audience_capacity);
       $query->bindParam(':payment_type', $this->payment_type);
       $query->bindParam(':amount', $this->amount);
      $query->bindParam(':status', $this->status);
            
      if($query->execute()){
             return true;
           }
           else{
               return false;
           }	
       }
    
       function edit(){
          $sql = "UPDATE faculty SET firstname=:firstname, lastname=:lastname, email=:email, academic_rank=:academic_rank, department=:department, admission_role=:admission_role, status=:status WHERE id = :id;";
    
          $query=$this->db->connect()->prepare($sql);
          $query->bindParam(':firstname', $this->firstname);
         $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':email', $this->email);
          $query->bindParam(':academic_rank', $this->academic_rank);
          $query->bindParam(':department', $this->department);
          $query->bindParam(':admission_role', $this->admission_role);
           $query->bindParam(':status', $this->status);
           $query->bindParam(':id', $this->id);
    
          if($query->execute()){
        return true;
         }
        else{
            return false;
        }
     }
    
       function fetch($record_id){
        $sql = "SELECT * FROM faculty WHERE id = :id;";
       $query=$this->db->connect()->prepare($sql);
       $query->bindParam(':id', $record_id);
       if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
      }
    
     function delete($record_id){
       $sql = "DELETE FROM faculty WHERE id = :id;";
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
      $sql = "SELECT * FROM event ORDER BY schedule ASC;";
           $query=$this->db->connect()->prepare($sql);
          if($query->execute()){
            $data = $query->fetchAll();
        }
         return $data;
    }
 
  }
    
 
 ?>