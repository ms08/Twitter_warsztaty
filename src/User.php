<?php

require_once ('config.php');

Class User
{
  private $id;
  private $UserName;
  private $email;
  private $hashedPassword;


  public function __construct()
  {
    $this->id=-1;
    $this->UserName="";
    $this->email="";
    $this->hashedPassword="";

  }

  public function getID() {
		return $this->id;
	}

	public function getUsername() {
		return $this->UserName;
	}

	public function setUsername($newUsername) {
		return $this->UserName = $newUsername;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setEmail($newEmail) {
		return $this->email = $newEmail;
	}

	public function getPassword() {
		return $this->hashedPassword;
	}

	public function samePassword($newPassword) {
		$newHashedPassword = $newPassword;
		return $this->hashedPassword = $newHashedPassword;
	}

	public function setPassword($newPassword) {
		$newHashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
		return $this->hashedPassword = $newHashedPassword;
	}

  public function saveToDB(mysqli $connection) {
		if($this->id == -1)
    {
	     $sql = "INSERT INTO Users(username, email, hashed_password)
       VALUES ('$this->UserName', '$this->email', '$this->hashedPassword')";
       $result = $connection->query($sql);

		    if($result == true)
        {
          $this->id = $connection->insert_id;
          return true;
        }
    }
    else
    {
      $sql = "UPDATE Users SET username='$this->UserName',email='$this->email',
      hashed_password='$this->hashedPassword' WHERE id=$this->id";

      $result = $connection->query($sql); if($result == true)
      {
        return true;
      }
    }
      return false;
  }

  static public function loadUserById(mysqli $connection, $id)
  {
      $sql = "SELECT * FROM Users WHERE id=$id";
      $result = $connection->query($sql);
      if($result == true && $result->num_rows == 1)
      {
        $row = $result->fetch_assoc();
        $loadedUser = new User();
        $loadedUser->id = $row['id'];
        $loadedUser->UserName = $row['username']; $loadedUser->hashedPassword = $row['hashed_password'];
        $loadedUser->email = $row['email'];

        return $loadedUser;
      }
      return null;

  }

  static public function loadAllUsers(mysqli $connection)
  {
    $sql = "SELECT * FROM Users";
    $ret = [];
    $result = $connection ->query ($sql);
    if($result == true && $result->num_rows != 0)
    {
      foreach ($result as $row)
      {
        $loadedUser = new User();
        $loadedUser->id = $row['id'];
        $loadedUser->UserName = $row['username'];
        $loadedUser->hashedPassword = $row['hashed_password']; $loadedUser->email = $row['email'];

        $ret[] = $loadedUser;
      }
    }
    return $ret;
  }

  public function delete(mysqli $connection)
  {
    if($this->id !=-1)
    {
      $sql = "DELETE FROM Users WHERE id=$this->id";
      $result= $connection ->query($sql);
      if($result==true)
      {
        $this->id= -1;
        return true;
      }
      return false;
      }
      return true;
    }

  }



// $user1 = new User();
// $user1->setUserName('Tomek');
// $user1->setEmail('Tomek@gmail.com');
// $user1->setPassword('qwerty1');
// $user1->saveToDB($connection);
// var_dump($user);
// $usertest = User::loadUserById($connection,2);
// var_dump($usertest);
// $usertest->delete($connection);
// var_dump(User::loadAllUsers($connection));
