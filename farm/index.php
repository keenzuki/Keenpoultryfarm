<?php
session_start();
error_reporting(1);
include('includes/dbconnection.php');
if(isset($_POST['login']))
{
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $sql ="SELECT * FROM tbladmin WHERE Email=:username and Password=:password";
    $query=$dbh->prepare($sql);
    $query-> bindParam(':username', $username, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
    {
        foreach ($results as $result) 
        {
            $_SESSION['odmsaid']=$result->ID;
            $_SESSION['login']=$result->username;
            $_SESSION['names']=$result->FirstName;
            $_SESSION['permission']=$result->AdminName;
            $_SESSION['companyname']=$result->CompanyName;
            $get=$result->Status;
        }
        $aa= $_SESSION['odmsaid'];
        $sql="SELECT * from tbladmin  where ID=:aa";
        $query = $dbh -> prepare($sql);
        $query->bindParam(':aa',$aa,PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {
            foreach($results as $row)
            {            
                if($row->Status=="1"){
                    if($row->AdminName=="Admin" || $row->AdminName=="RManager"){ 
                        echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";      
                        }
                    else{
                        echo "<script type='text/javascript'> document.location ='sell_product.php'; </script>";      
                      }
                    }
                else
                { 
                    echo "<script>
                    alert('Your account was disabled Approach Admin');document.location ='index.php';
                    </script>";
                }
            } 
        } 
        } 
        else{
            echo "<script>alert('Invalid Details');</script>";
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php @include("includes/head.php");?>
<body>
    <div id="loading"></div>
    <div id="page">
    </div>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth p-0">
                <div class="row flex-grow  p-0">
                    <div class="col-lg-6 mx-auto  p-0">
                        <div class="auth-form-light text-left p-5" style="margin-top: 150px;">
                            <div style="text-align:center">
                                <img style="height: 125px;" class="img-avatar mb-3" src="assets/img/companyimages/logo.jpg" alt="">
                            </div>
                            <form role="form" id=""  method="post" enctype="multipart/form-data" class="col-md-8 mx-auto">  
                                <div class="form-group first">
                                    <label>Username</label>
                                    <input type="text" class="form-control form-control-lg" name="username" id="exampleInputEmail1" placeholder="Username" required>
                                </div>
                                <div class="form-group last">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" required>
                                </div>
                                <div class="mt-3">
                                    <button name="login" class="btn btn-block btn-lg font-weight-medium auth-form-btn" style="background-color: #d62108; color: white;">SIGN IN</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light"> 
                                    <a href="forgot-password/forgot_password.php" class="text-primary"> 
                                        Forgot Password
                                    </a>
                                     
                                </div>
                            </form>
                        </div>
                    </div>
                     
                </div>
            </div>
            
        </div>
        
    </div>
    
    <?php @include("includes/foot.php");?>
    
    <script>function onReady(callback) {
    var intervalID = window.setInterval(checkReady, 1000);
    function checkReady() {
        if (document.getElementsByTagName('body')[0] !== undefined) {
            window.clearInterval(intervalID);
            callback.call(this);
        }
    }
}

function show(id, value) {
    document.getElementById(id).style.display = value ? 'block' : 'none';
}

onReady(function () {
    show('page', true);
    show('loading', false);
});</script>
