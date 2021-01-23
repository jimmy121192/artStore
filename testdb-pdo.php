<html>

<body>

   <H1> Hello the time is <?php echo date("H:i:s"); ?> </h1>
   <p> some text afterwards... </P>

   <?php

   try {

      $connString = "mysql:host=z5zm8hebixwywy9d.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=wk9lgexv72hbq72a";
      $user = "t5lhnalqcz77zteh";
      $pass = "lwt070245kuhx9h2";

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