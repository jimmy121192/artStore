<html>

<body>

   <H1> Hello the time is <?php echo date("H:i:s"); ?> </h1>
   <p> some text afterwards... </P>

   <?php

   try {

      $connString = "mysql:host=us-cdbr-east-03.cleardb.com;dbname=heroku_cd7e5d31d8cb362";
      $user = "b78beb21e4ae3e";
      $pass = "e8f8b975";

      $pdo = new PDO($connString, $user, $pass);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "<p>Connection successful</p>";

      $sql = "select * from genres";
      $result = $pdo->query($sql);

      foreach ($result as $row) {
         echo $row[0] . " - " . $row[1] . "<br/>";
      }

      while ($row = $result->fetch()) {
         echo $row['ID'] . " - " . $row['GenreName'] . "<br/>";
      }
   } catch (PDOException $e) {
      die($e->getMessage());
   }

   ?>
</body>

</html>