<?php

require_once ('config.php');

Class Tweet
{
  private $id;
  private $userId;
  private $text;
  private $creationDate;

  public function __construct()
  {
    $this->id = -1;
    $this->userId = "";
    $this->text = "";
    $this->creationDate = "";
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

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    public function getCreationDate()
    {
        return $this->creationDate;
    }

    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate  = date('Y-m-d H:i:s');

        return $this;
    }

    static public function loadTweetById(mysqli $connection, $id)
    {
      $sql = "SELECT * FROM Tweet WHERE id=$id LIMIT 1";
      $result = $connection->query($sql);
      if($result == true && $result->num_rows == 1)
      {
        $row = $result->fetch_assoc();
        $loadTweetById = new Tweet();
        $loadTweetById->id = $row['id'];
        $loadTweetById->userId = $row['user_id'];
        $loadTweetById->text = $row['text'];
        $loadTweetById->creationDate = $row['creation_date'];

      return $loadTweetById;
      }
      return null;


    }
    static public function loadAllTweetsByUserId(mysqli $connection, $userId)
    {
      $sql = "SELECT * FROM Tweet WHERE user_id=$userId";
      $ret = [];
      $result = $connection->query($sql);
      if($result == true && $result->num_rows != 0)
      {
        foreach ($result as $row)
        {
          $loadAllTweets = new Tweet();
          $loadAllTweets->id = $row['id'];
          $loadAllTweets->text = $row['text'];
          $loadAllTweets->creationDate = $row['creation_date'];

          $ret[] = $loadAllTweets;
        }
      }
      return $ret;
    }




    static public function loadAllTweets(mysqli $connection)
    {
      $sql = "SELECT * FROM Tweet";
      $ret = [];
      $result = $connection ->query ($sql);
      if($result == true && $result->num_rows != 0)
      {
        foreach ($result as $row)
        {
          $loadAllTweets = new Tweet();
          $loadAllTweets->id = $row['id'];
          $loadAllTweets->text = $row['text'];
          $loadAllTweets->creationDate = $row['creation_date'];

          $ret[] = $loadAllTweets;
        }
      }
      return $ret;
    }

    public function saveToDB(mysqli $connection) {
      if($this->id == -1)
      {
         $sql = "INSERT INTO Tweet( user_id, text , creation_date)
         VALUES ('$this->userId', '$this->text', '$this->creationDate')";
         $result = $connection->query($sql);

          if($result == true)
          {
            $this->id = $connection->insert_id;
            return true;
          }
      }
    }
  }

  // $oTweet = new Tweet();
  // $oTweet->setuserId(2);
  // $oTweet->setCreationDate(2017-02-21);
  // $oTweet->setText('Miroslawy polskiego bizn...');
  // $oTweet->saveToDB($connection);

// $usertest = Tweet::loadAllTweetsByUserId($connection,2);
// $usertest = Tweet::loadAllTweets($connection);
//
// var_dump($usertest);
