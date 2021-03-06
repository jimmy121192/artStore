<?php
/*
   Handles database access for the Painting table. 

 */
class PaintingDB 
{  
    private static $baseSQL = "SELECT PaintingID, Paintings.ArtistID AS ArtistID, FirstName, LastName, Paintings.GalleryID AS GalleryID, Galleries.GalleryName AS GalleryName, ImageFileName, Title, ShapeID, MuseumLink, AccessionNumber, CopyrightText, Description, Excerpt, YearOfWork, Width, Height, Medium, Cost, MSRP, GoogleLink, GoogleDescription, WikiLink FROM Paintings INNER JOIN Artists ON Paintings.ArtistID = Artists.ArtistID INNER JOIN Galleries ON Paintings.GalleryID = Galleries.GalleryID ";
    
    private static $constraint = ' order by YearOfWork limit 20';
    
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

    public function getSearchResults($keyword)
    {
        $sql = self::$baseSQL . " WHERE Paintings.Title Like ? ORDER BY Paintings.Title;";
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($keyword . '%'));
        return $statement;
        
    } 

    
    
    public function findById($id)
    {
        $sql = self::$baseSQL . " WHERE PaintingID=?" ;
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($id));
        return $statement->fetch();
        
    }
    
    public function findByArtist($artistID)
    {
        $sql = self::$baseSQL . " WHERE Paintings.ArtistID=?" . self::$constraint;
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($artistID));
        return $statement;        
    }   
    
    public function findByGallery($galleryID)
    {
        $sql = self::$baseSQL . " WHERE Paintings.GalleryID=?" . self::$constraint;
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($galleryID));
        return $statement;        
    } 
    
    public function findByShape($shapeID)
    {
        $sql = self::$baseSQL . " WHERE ShapeID=?" . self::$constraint;
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($shapeID));
        return $statement;        
    }    
    
    public function findByGenre($genreID)
    {
        $sql = "SELECT Paintings.PaintingID as ID,Paintings.Excerpt,Paintings.YearOfWork, PaintingGenres.GenreID, ImageFileName, Title FROM Paintings INNER JOIN PaintingGenres ON Paintings.PaintingID = PaintingGenres.PaintingID WHERE PaintingGenres.GenreID=? ORDER BY YearOfWork" ;
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($genreID));
        return $statement;        
    } 
    
    public function findPaintingsOfSubjects($subjectID)
    {
        $sql = "SELECT PaintingSubjects.SubjectID, PaintingSubjects.PaintingID, Paintings.Title, Paintings.ImageFileName,Paintings.YearOfWork,Paintings.Excerpt, Subjects.SubjectName  FROM PaintingSubjects LEFT JOIN Paintings ON PaintingSubjects.PaintingID=Paintings.PaintingID LEFT JOIN Subjects ON Subjects.SubjectID = PaintingSubjects.PaintingID WHERE PaintingSubjects.SubjectID = $subjectID ORDER BY PaintingSubjects.PaintingID;";        
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, null);

        return $statement;        
    }

    public function getFavouritePaintings($id)
    {
        $sql = self::$baseSQL . " WHERE PaintingID IN ($id)" ;
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($id));
        return $statement;
        
    }
}

?>