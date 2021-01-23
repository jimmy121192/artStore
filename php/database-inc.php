<?php


function setConnectionInfo($values=array()) {
      $connString = $values[0];
      $user = $values[1]; 
      $password = $values[2];

      $pdo = new PDO($connString,$user,$password);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;      
}


function runQuery($pdo, $sql, $parameters=array())     {
    // Ensure parameters are in an array
    if (!is_array($parameters)) {
        $parameters = array($parameters);
    }

    $statement = null;
    if (count($parameters) > 0) {
        // Use a prepared statement if parameters 
        $statement = $pdo->prepare($sql);
        $executedOk = $statement->execute($parameters);
        if (! $executedOk) {
            throw new PDOException;
        }
    } else {
        // Execute a normal query     
        $statement = $pdo->query($sql); 
        if (!$statement) {
            throw new PDOException;
        }
    }
    return $statement;
}


function readAllCustomers() {
    $pdo = setConnectionInfo(array(DBCONNECTION, DBUSER, DBPASS));
    $statement = runQuery($pdo, "SELECT * FROM customers", null);
    return $statement;
}

function readUserProfile($id) {
    $pdo = setConnectionInfo(array(DBCONNECTION, DBUSER, DBPASS));
    $statement = runQuery($pdo, "SELECT * FROM Customers WHERE CustomerID = $id", null);
    $profile = $statement->fetch(PDO::FETCH_ASSOC); 
    return $profile;
}

function readOrderDetail($id) {
    $pdo = setConnectionInfo(array(DBCONNECTION, DBUSER, DBPASS));
    $statement = runQuery($pdo, "SELECT OrderDetails.OrderID,Paintings.PaintingID, Paintings.ImageFileName,Paintings.Title, Artists.FirstName,Artists.LastName,Shapes.ShapeName, Paintings.MSRP, TypesFrames.Price AS FPrice, TypesGlass.Price AS GPrice FROM OrderDetails LEFT JOIN Paintings ON OrderDetails.PaintingID = Paintings.PaintingID LEFT JOIN Artists ON Paintings.ArtistID = Artists.ArtistID LEFT JOIN Shapes ON Paintings.ShapeID = Shapes.ShapeID LEFT JOIN TypesFrames ON OrderDetails.FrameID = TypesFrames.FrameID LEFT JOIN TypesGlass ON OrderDetails.GlassID = TypesGlass.GlassID  WHERE OrderDetails.OrderID = $id;", null);
    $detail = $statement->fetchAll(PDO::FETCH_ASSOC); 
    return $detail;
}


function readSelectCustomers($lastName) {
    $pdo = setConnectionInfo(array(DBCONNECTION, DBUSER, DBPASS));
    $statement = runQuery($pdo, "SELECT * FROM customers WHERE LastName Like ? ORDER BY LastName;", Array($lastName . '%'));
    return $statement ;
}
function readCustomerName($custid) {
    $pdo = setConnectionInfo(array(DBCONNECTION, DBUSER, DBPASS));
    $statement = runQuery($pdo, "SELECT * FROM customers WHERE ID = $custid", null);
	$name = $statement->fetch(PDO::FETCH_ASSOC); 
	// $statement->fetch(PDO::FETCH_ASSOC) converts the $statement PDO to an array so that we don't // have to use foreach loop (which also converts a PDO to an array) for a single customer
    return $name;
}
function readCustomerOrders($custid) {
    $pdo = setConnectionInfo(array(DBCONNECTION, DBUSER, DBPASS));
    $statement = runQuery($pdo, "SELECT * FROM Orders WHERE CustomerID = $custid ORDER BY DateStarted", null);
    $orders = $statement->fetchAll(PDO::FETCH_ASSOC); 
    return $orders;
}
function readCategories() {
    $pdo = setConnectionInfo(array(DBCONNECTION, DBUSER, DBPASS));
    $statement = runQuery($pdo, "SELECT CategoryName FROM Categories;", null);
    $caties = $statement->fetchAll(PDO::FETCH_ASSOC); 
    return $caties;
}
function readImprints() {
    $pdo = setConnectionInfo(array(DBCONNECTION, DBUSER, DBPASS));
    $statement = runQuery($pdo, "SELECT Imprint FROM Imprints;", null);
    $prints = $statement->fetchAll(PDO::FETCH_ASSOC); 
    return $prints;
}


?>
