<?php

require_once ('config.php');

Class Messages
{
  private $id;
  private $userId;
  private $messageFrom;
  private $creationDate;
  private $text;
  private $read;


  public function __construct()
  {
    $this->id = -1;
    $this->userId = "";
    $this->messageFrom="";
    $this->creationDate = "";
    $this->text = "";
    $this->read=0;

  }

    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
 
        return $this;
    }
    
    
    
    
    

    public function getMessageFrom()
    {
        return $this->messageFrom;
    }

    public function setMessageFrom($idMessage)
    {
        $this->messageFrom = $idMessage;
 
        return $this;
    }

    public function getCreationDate()
    {
        return $this->creationDate;
    }

    public function setCreationDate()
    {
        $this->creationDate =date('Y-m-d H:i:s');

        return $this;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
 
        return $this;
    }
    
      public function getRead()
    {
        return $this->read;
    }

    public function setRead($read)
    {
        $this->read = $read;
 
        return $this;
    }
 
public function saveToDB(mysqli $connection) 
        {
		if($this->id == -1)
            {
	     $sql = "INSERT INTO Messages(user_id, message_from, creation_date, text, `read`)
             VALUES ($this->userId, $this->messageFrom, '$this->creationDate','$this->text', $this->read )";
             $result = $connection->query($sql);
             $this->id = $connection->insert_id;
             return true;
            }
            else
            {
                $sql="UPDATE Messages SET `read`=$this->read WHERE id=$this->id";
                $result = $connection->query($sql);
            }
            
        }
        
 static public function loadMessagesByUserId(mysqli $connection, $userId)
  {
      $sql = "SELECT * FROM Messages WHERE user_id=$userId";
      $ret = [];
      $result = $connection->query($sql);
      if($result == true && $result->num_rows != 0)
      {
           foreach ($result as $row)
      {
      
        $loadedMessage = new Messages();
        $loadedMessage->userId = $row['user_id'];
        $loadedMessage->messageFrom = $row['message_from']; 
        $loadedMessage->creationDate = $row['creation_date'];
        $loadedMessage->text = $row['text'];
        $loadedMessage->id = $row['id'];
        $loadedMessage->read = $row['read'];
        $ret[]= $loadedMessage;
       
      }
      }
      return $ret;

  }
  
   static public function loadMessagesById(mysqli $connection, $id)
  {
      $sql = "SELECT * FROM Messages WHERE id=$id";
   
      $result = $connection->query($sql);
      if($result == true && $result->num_rows != 0)
      {
           foreach ($result as $row)
      {
      
        $loadedMessage = new Messages();
        $loadedMessage->userId = $row['user_id'];
        $loadedMessage->messageFrom = $row['message_from']; 
        $loadedMessage->creationDate = $row['creation_date'];
        $loadedMessage->text = $row['text'];
        $loadedMessage->id = $row['id'];

     
       return $loadedMessage;
      }
      
      }
      return null;
  }
       
// static public function loadAllMessages(mysqli $connection)
//  {
//    $sql = "SELECT * FROM Users";
//    $ret = [];
//    $result = $connection ->query ($sql);
//    if($result == true && $result->num_rows != 0)
//    {
//      foreach ($result as $row)
//      {
//        $loadedUser = new User();
//        $loadedUser->id = $row['id'];
//        $loadedUser->UserName = $row['username'];
//        $loadedUser->hashedPassword = $row['hashed_password']; $loadedUser->email = $row['email'];
//
//        $ret[] = $loadedUser;
//      }
//    }
//    return $ret;
//  }       
        
        
}

// $Messages1 = new Messages();
// $Messages1->setUserId(3);
// $Messages1->setIdMessage(4);
// $Messages1->setCreationDate();
// $Messages1->setText('ojfjfsodjofjodi');
// $Messages1->saveToDB($connection);
// var_dump($Messages1);
// $usertest = Messages::loadMessagesByUserId($connection, 2);
// var_dump($usertest);
