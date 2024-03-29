  <div id="loading"></div>
    <div id="page">
    </div>
    <style>
      .navbar .navbar-menu-wrapper {
  background-color: #161816;
  color: #e8eff4;
  padding: 15px;
}
    </style>
    
 <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  
  <div class="navbar-menu-wrapper d-flex align-items-stretch w-100">
          
        <?php
        $aid=$_SESSION['odmsaid'];
        $sql="SELECT * from  tbladmin where ID=:aid";
        $query = $dbh -> prepare($sql);
        $query->bindParam(':aid',$aid,PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {  
            foreach($results as $row)
            { 
                if($row->AdminName=="Admin"  )
                { 
                    ?>
             <ul class="navbar-nav navbar-nav-left">
          <li class="nav-item dropdown">
            <a class="nav-link" href="dashboard.php">Dashboard</a>
          
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="sell_product.php">Sell Products</a>
          
          </li>
          
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Farm</a>
              <div class="dropdown-menu  navbar-dropdown" aria-labelledby="dropdown05">
              <a class="dropdown-item" href="farmprofile.php">Farm Details</a>
              <a class="dropdown-item" href="store.php">Farm Store (Stock In)</a>
              <a class="dropdown-item" href="category.php">Manage Category</a>
              <a class="dropdown-item" href="product.php">Manage Product</a>
           

            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link" href="expenses.php">Expenses</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="losses.php">Losses</a>
          </li>

           <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reports</a>
            <div class="dropdown-menu  navbar-dropdown" aria-labelledby="dropdown05">
              <a class="dropdown-item" href="product_report.php">Product Report</a>
              <a class="dropdown-item" href="stock_report.php">Stock Report</a>
              <a class="dropdown-item" href="invoice_report.php">Invoice Report</a>
              <a class="dropdown-item" href="expenses_report.php">Expenses Report</a>
              <a class="dropdown-item" href="losses_report.php">Losses Report</a>
            </div>
          </li>
          <li class="nav-item dropdown">
              <a class="nav-link" href="userregister.php">Manage Users</a>
          </li>

        <?php 
                } 
                elseif ($row->AdminName=="RManager"){
                  ?>
                  <ul class="navbar-nav navbar-nav-left">
           <li class="nav-item dropdown">
                 <a class="nav-link" href="dashboard.php">Dashboard</a>
               
               </li>
               
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Farm</a>
                  <div class="dropdown-menu  navbar-dropdown" aria-labelledby="dropdown05">
                  <a class="dropdown-item" href="store.php">Farm Store (Stock In)</a>
                  <a class="dropdown-item" href="category.php">Manage Category</a>
                  <a class="dropdown-item" href="product.php">Manage Product</a>
                
     
                 </div>
               </li>
     
               <li class="nav-item dropdown">
                  <a class="nav-link" href="expenses.php">Expenses</a>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link" href="losses.php">Losses</a>
               </li>
     
                <li class="nav-item dropdown">
                 <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reports</a>
                 <div class="dropdown-menu  navbar-dropdown" aria-labelledby="dropdown05">
                   <a class="dropdown-item" href="product_report.php">Product Report</a>
                   <a class="dropdown-item" href="stock_report.php">Stock Report</a>
                   <a class="dropdown-item" href="invoice_report.php">Invoice Report</a>
                   <a class="dropdown-item" href="expenses_report.php">Expenses Report</a>
                 </div>
               </li>
                              
               <?php 
                }
                elseif($row->AdminName="Cashier"){
                  ?>
             <ul class="navbar-nav navbar-nav-left">
          <li style="text-align:center" class="nav-item dropdown">
            <a class="nav-link" href="sell_product.php">Sell Products</a>
          
          </li>
          
          <?php 
                }
            }
        } ?>
        
        </ul>
        <ul class="navbar-nav navbar-nav-right">
      <li style="float:right" class="nav-item nav-profile dropdown">
        <?php
        $aid=$_SESSION['odmsaid'];
        $sql="SELECT * from  tbladmin where ID=:aid";
        $query = $dbh -> prepare($sql);
        $query->bindParam(':aid',$aid,PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {
          foreach($results as $row)
          { 
            ?>
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <div class="nav-profile-img">
                <?php 
                if($row->Photo=="avatar15.jpg")
                { 
                  ?>
                  <img class="img-avatar" src="assets/img/avatars/avatar15.jpg" alt="">
                  <?php 
                } else { 
                  ?>
                  <img class="img-avatar" src="assets/img/profileimages/<?php  echo $row->Photo;?>" alt=""> 
                  <?php 
                } ?>
              </div>
              <div class="nav-profile-text">
                <p class="mb-1 "><?php  echo $row->FirstName;?> <?php  echo $row->LastName;?></p>
              </div>
            </a>
            <?php
          }
        } ?>

        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="profile.php">
            <i class="mdi mdi-account mr-2 text-success"></i> Profile </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="change_password.php"><i class="mdi mdi-settings mr-2 text-success"></i> Change Password </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php">
              <i class="mdi mdi-logout mr-2 text-danger"></i> Logout </a>
            </div>
          </li>
        
         
        
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>

      
    </nav>