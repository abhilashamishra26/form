<?php
  $servername = "localhost";
  $username = "admin";
  $password = "abhilasha";
  $database = "user-registration";


$loginname = $_POST["email"];
$code = $_POST["passwrd"];
$target_dir = "imge/";


 $conn = new mysqli($servername, $username, $password, $database);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "SELECT * FROM Registeration WHERE email_id='".$loginname."' AND password='".$code."';";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
?>

<table style="width:100%">
<link rel="stylesheet" type="text/css" href="project.css">
  <tr>
    <th>Name</th>
   
    <th>Email</th> 
    <th>Contact</th>
    <th>Age</th>
    <th>Profile photo</th>

  </tr>
<?php




$sql = "SELECT * FROM Registeration WHERE email_id='".$loginname."' AND password='".$code."';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        echo "WELCOME!&nbsp;".$row["firstname"]."  ". $row["lastname"];      

echo "<img src='".$row["image"]."' style='width:50px; height:50px; border-radius:100%; float:right;'>";
}
}
$sql = "SELECT * FROM Registeration";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        ?>
        <tr>
        <td> <?php      echo $row["firstname"];?> &nbsp; <?php     echo $row["lastname"];?> </td>
        <td> <?php      echo $row["email_id"];?> </td>
        <td> <?php      echo $row["contact"];?> </td>
        <td> <?php      echo $row["age"];?> </td>
        <td> <?php      echo "<center>"."<img src='".$row["image"]."' style='width:100px; height:100px; border-radius:100%; float:right;'>"."</center>";?> </td>

        </tr>
        <?php
    }
  }
}}
else{
  echo"PLEASE CHECK YOUR EMAIL-ID AND PASSWORD";
}
  ?>
  </table>