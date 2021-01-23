<?php
/*
   Handles database access for the galleries table. 

 */
class GalleryDB 
{  
    private static $baseSQL = "SELECT GalleryID, GalleryName, GalleryNativeName, GalleryCity, GalleryCountry, Latitude, Longitude, GalleryWebSite FROM Galleries ";
    
    private static $constraint = ' order by GalleryName';
    
    
    private $pdo = null;
    
    public function __construct($connection) {
        $this->pdo = $connection;
    }       
    
    public function getAll()
    {
        $sql = self::$baseSQL . self::$constraint;
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, null);
        return $statement;        
    }   
    
    public function findById($id)
    {
        $sql = self::$baseSQL . " WHERE GalleryID=?";
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($id));
        return $statement->fetch();
        
    }
    
    public function paintingsOfGalleries()
    {
        $sql = "SELECT Galleries.GalleryID, Galleries.GalleryName , COUNT(Paintings.GalleryID) AS NumOfPaintings FROM Paintings LEFT JOIN Galleries ON Galleries.GalleryID=Paintings.GalleryID GROUP BY Galleries.GalleryID;";        
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, null);

        return $statement;        
    }


}

?>