<?php
session_start();
?>
<?php
$servername = "localhost";
$username = "jimmy";
$password = "121192";
$dbname = "art";

// Check connection
$conn = mysqli_connect($servername, $username, $password, $dbname);


// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{ 

    $userpassword = $_POST["password"];
    $sql = "SELECT * FROM CustomerLogon WHERE UserName='".$_POST["username"]."';";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);



    if($userpassword === $row["Pass"]){
        $_SESSION["id"] = $row["CustomerID"];
        $_SESSION["username"] = $row["UserName"];

        // echo $_SESSION["id"];
        // echo $_SESSION["username"];
        header('Location:../user-profile.php');
        // echo "<p>Login Succesfull</p>";
        // echo "<a href='../user-profile.php'>Go to User Account</a>";
   } else {

    echo 'Invalid password.<br><br>';
    echo "<a href='../login.php'>Back</a>";
}
}      
mysqli_close($conn);
        
?> 
