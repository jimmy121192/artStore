<?php
/*
   Handles database access for the Subject table. 

 */
class SubjectDB 
{  
    private $pdo = null;
    private static $baseSQL = "SELECT SubjectID, SubjectName FROM Subjects ";
    
    public function __construct($connection) {
        $this->pdo = $connection;
    }
    
    public function getAll()
    {
        $statement = DatabaseHelper::runQuery($this->pdo, self::$baseSQL, null);
        return $statement;        
    }   
    
    public function findById($id)
    {
        $sql = self::$baseSQL . " WHERE SubjectID=?";
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($id));
        return $statement->fetch();        
    }      
    
    
    public function findForPainting($paintingId)
    {
         $sql = "SELECT Subjects.SubjectID As SubjectID, SubjectName FROM Subjects INNER JOIN PaintingSubjects ON Subjects.SubjectID = PaintingSubjects.SubjectID WHERE PaintingSubjects.PaintingID=?";

        $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($paintingId));
        return $statement;
        
    }

    public function paintingsOfSubjects()
    {
        $sql = "SELECT Subjects.SubjectID, Subjects.SubjectName , COUNT(PaintingSubjects.SubjectID) AS NumOfPaintings FROM PaintingSubjects LEFT JOIN Subjects ON Subjects.SubjectID=PaintingSubjects.SubjectID GROUP BY Subjects.SubjectID ORDER BY NumOfPaintings DESC;";        
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, null);

        return $statement;        
    }

}

?>