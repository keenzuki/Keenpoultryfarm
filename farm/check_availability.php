<?php 
include('includes/dbconnection.php');
// code user email availablity
if(!empty($_POST["emailid"])) {
  $email= $_POST["emailid"];
  if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {

    echo "error : You did not enter a valid email.";
  }
  else {
    $sql ="SELECT Email FROM tbladmin WHERE Email=:email";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query -> rowCount() > 0)
    {
      echo "<span style='color:red'> Email already exists .</span>";
      echo "<script>$('#submit').prop('disabled',true);</script>";
    } else{

      echo "<span style='color:green'> Email available for Registration .</span>";
      echo "<script>$('#submit').prop('disabled',false);</script>";
    }
  }
}

if(!empty($_POST["companyname"])) {
  $companyname= $_POST["companyname"];

  $sql ="SELECT companyname FROM tblcompany WHERE companyname=:companyname";
  $query= $dbh -> prepare($sql);
  $query-> bindParam(':companyname', $companyname, PDO::PARAM_STR);
  $query-> execute();
  $results = $query -> fetchAll(PDO::FETCH_OBJ);
  $cnt=1;
  if($query -> rowCount() > 0)
  {
    echo "<span style='color:red'> company name already exists .</span>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
  } else{

    echo "<span style='color:green'> company name available for Registration .</span>";
    echo "<script>$('#submit').prop('disabled',false);</script>";
  }
}

if(!empty($_POST["fullname"])) {
  $fullname= $_POST["fullname"];
  
  $sql ="SELECT Staffid FROM tbladmin WHERE Staffid=:fullname";
  $query= $dbh -> prepare($sql);
  $query-> bindParam(':fullname', $fullname, PDO::PARAM_STR);
  $query-> execute();
  $results = $query -> fetchAll(PDO::FETCH_OBJ);
  if($query -> rowCount() > 0)
  {
    echo "<span style='color:red'> Staff ID already exists .</span>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
  } else{
    
    echo "<span style='color:green'> Staff ID available for Registration .</span>";
    echo "<script>$('#submit').prop('disabled',false);</script>";
  }
}


if(!empty($_POST["code"])) {
  $bidname= $_POST["code"];
  
  $sql ="SELECT Code FROM tblbid WHERE Code=:bidname";
  $query= $dbh -> prepare($sql);
  $query-> bindParam(':bidname', $bidname, PDO::PARAM_STR);
  $query-> execute();
  $results = $query -> fetchAll(PDO::FETCH_OBJ);
  $cnt=1;
  if($query -> rowCount() > 0)
  {
    echo "<span style='color:red'> Code already exists .</span>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
  } else{
    
    echo "<span style='color:green'> Code available for Registration .</span>";
    echo "<script>$('#submit').prop('disabled',false);</script>";
  }
}


?>
