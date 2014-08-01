<?php
/**
 * Created by PhpStorm.
 * User: Oleg Pavlin
 * Date: 01.08.14
 * Time: 17:49
 */
 
 final class BlogModel
 {
   private $host = "localhost";
   private $user = "root";
   private $password = "";
   private $database = "sf_blog";
   private $mysqli;

   /**
    * Call this method to get singleton of BlogModel
    *
    * @return BlogModel
    */
   public static function Instance()
   {
     static $inst = null;
     if ($inst === null)
     {
       $inst = new BlogModel();
     }

     return $inst;
   }

   private function __construct()
   {
     $this->mysqli = new mysqli($this->host, $this->user, $this->password, $this->database);
   }

   /**
    * @param $query
    *
    * @return array
    */
   public function fetchAssoc($query = "")
   {
     $result = mysqli_query($this->mysqli, $query);
     return mysqli_fetch_assoc($result);
   }

   /**
    * @param $query
    *
    * @return object|stdClass
    */
   public function fetchArray($query = "")
   {
     $result = mysqli_query($this->mysqli, $query);

     return mysqli_fetch_all($result, MYSQL_ASSOC);
   }

   public function processQuery($query)
   {
     return mysqli_query($this->mysqli, $query);
   }

   public function getBlogEntries()
   {
     $query = "SELECT * FROM blog_article";

     return $this->fetchArray($query);
   }

   public function getEntry($entryID)
   {
     $query = "SELECT title, content FROM blog_article WHERE "
                               . "id=" . $entryID;

     return $this->fetchAssoc($query);
   }

   public function addEntry($entry)
   {
     $query = "INSERT INTO blog_article (title, content) VALUES ("
                                                          . "'" . addslashes($entry['title']) . "', "
                                                          . "'" . addslashes($entry['content']) . "');";

     return $this->processQuery($query);
   }

   public function updateEntry($entry)
   {
     $query = "UPDATE blog_article SET "
                                         . "title='" . addslashes($entry['title']) . "', "
                                         . "content='" . addslashes($entry['content']) . "' "
                                         . "WHERE id=" . $entry['id'] . ";";

     return $this->processQuery($query);
   }

   public function deleteEntry($entryID)
   {
     $query = "DELETE FROM blog_article WHERE id=$entryID";
     return $this->processQuery($query);
   }
 }