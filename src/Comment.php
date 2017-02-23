<?php

require_once ('config.php');

Class Comment
{
  private $id;
  private $userId;
  private $idPost;
  private $creationDate;
  private $text;

  public function __construct()
  {
    $this->id = -1;
    $this->userId = "";
    $this->idPost="";
    $this->creationDate = "";
    $this->text = "";
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

      public function getIdPost()
      {
          return $this->idPost;
      }

      public function setIdPost($idPost)
      {
          $this->idPost = $idPost;

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



    static public function loadCommentsById(mysqli $connection, $id)
    {
      $sql = "SELECT * FROM comment WHERE id=$id LIMIT 1";
      $result = $connection->query($sql);
      if($result == true && $result->num_rows == 1)
      {
        $row = $result->fetch_assoc();
        $loadTweetById = new Comment();
        $loadTweetById->id = $row['id'];
        $loadTweetById->userId = $row['id_user'];
        $loadTweetById->text = $row['id_post'];
        $loadTweetById->creationDate = $row['creation_date'];
        $loadTweetById->creationDate = $row['text'];

      return $loadTweetById;
      }
      return null;


    }
    static public function loadAllCommentsByPostId(mysqli $connection, $postId)
    {
      $sql = "SELECT * FROM comment WHERE id_post=$postId";
      $ret = [];
      $result = $connection->query($sql);
      if($result == true && $result->num_rows != 0)
      {
        foreach ($result as $row)
        {
          $loadCommentById = new Comment();
          $loadCommentById->userId = $row['id_user'];
          $loadCommentById->text = $row['id_post'];
          $loadCommentById->creationDate = $row['creation_date'];
          $loadCommentById->creationDate = $row['text'];


          $ret[] = $loadCommentById;
        }
      }
      return $ret;
    }

    public function saveToDB(mysqli $connection) {
      if($this->id == -1)
      {
         $sql = "INSERT INTO comment(id_user, id_post, creation_date, text)
         VALUES ('$this->userId', '$this->idPost', '$this->creationDate', '$this->text')";
         $result = $connection->query($sql);

          if($result == true)
          {
            $this->id = $connection->insert_id;
            return true;
          }
      }
      else
      {
        $sql = "UPDATE comment SET id_user='$this->userId',id_post='$this->idPost',
        creation_date='$this->creationDate', text='$this->text'
        WHERE id=$this->id";

        $result = $connection->query($sql); if($result == true)
        {
          return true;
        }
      }
        return false;
    }


}

// var_dump($connection);

// $oComment = new Comment();
// $oComment->setuserId(2);
// $oComment->setIdPost(2);
// $oComment->setCreationDate();
// $oComment->setText('Drugi tweet');
// $oComment->saveToDB($connection);
//
// var_dump($oComment);

// $usertest = Comment::loadCommentsById($connection,2);
//
// var_dump($usertest);
