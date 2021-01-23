<?php
/*
   Handles database access for the Genre table. 

 */
class GenreDB 
{  
    private static $baseSQL = "SELECT GenreID, GenreName, EraID, Description, Link FROM Genres ";
    
    private $pdo = null;
    
    public function __construct($connection) {
        $this->pdo = $connection;
    }    
    
    public function getAll()
    {
        $sql = self::$baseSQL . ' ORDER BY EraID, GenreName';
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, null);
        return $statement;        
    }   
    
    public function findById($id)
    {
        $sql = self::$baseSQL . " WHERE GenreID=?";
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($id));
        return $statement->fetch();        
    }    

    public function findForPainting($paintingId)
    {
        $sql = "SELECT Genres.GenreID As GenreID, GenreName FROM Genres INNER JOIN PaintingGenres ON Genres.GenreID = PaintingGenres.GenreID WHERE PaintingGenres.PaintingID=?";        
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($paintingId));
        return $statement;        
    }

    public function percentageOfGenres()
    {
        $sql = "SELECT Genres.GenreID, Genres.GenreName , COUNT(PaintingGenres.GenreID) AS NumOfPaintings FROM PaintingGenres LEFT JOIN Genres ON Genres.GenreID=PaintingGenres.GenreID GROUP BY PaintingGenres.GenreID;";        
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, null);

        return $statement;        
    }

}

?>