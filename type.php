<?php session_start(); ?>
<?php
include "animal_header.php";
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title> -->

    <!-- Bootstrap -->


<!-- </head>
<body> -->
    <!-- Main -->
    <div class="sidebar">
     
        <nav class="nav1">
          <ul>
            <li><a href="index.php"><i class="fas fa-table"></i><span>Animals</span></a></li>
            <li><a href="type.php"><i class="fas fa-bookmark"></i><span>Types</span></a></li>
           
           
          </ul>
        <hr style="color: white">
      </nav>
      <nav class="nav2">
        <ul>
            <li class="dropdown">
              <a href="#"><i class="fas fa-cogs"></i><span>Settings</span></a>
              <ul>
                  <li><a href="#"><span></span></a></li>
                  <li><a href="#"><span></span></a></li>
              </ul>
            </li>
        </ul>
      </nav>
    </div>
    <div class="content">
    <div id="page-stylist" style="margin-top: 2px">
                <div class="container-fluiAdmin Dashboard">
                    <div class="row">
                        <div class="col-lg-12">
                          <br>
                          <div style="display:flex;justify-content:center">
                                <img style="padding-top:0.3rem;padding-bottom:0.3rem" width="75rem" height="auto" src="./img/logo.png" alt=""> 
                                <h1 style="margin-left:1rem; margin-top:1.2rem"class="page-header">Animal Type</h1>
                          </div>
                            <hr>
                              <br>

           <!-- <div style="margin-left:3rem" >
                <h5>Select Branch</h5>
                <select id="mylist" onchange="myFunction()" class='form-control' style="width:40%">
                <option value="">None</option>
                <option>Branch 1</option>
                <option>Branch 2</option>
                <option>Branch 3</option>
                </select>
                <br>-->


                <?php 
                    
                    if(isset($_SESSION['message'])){
                        ?>
                        <div class="alert alert-info text-center" style="margin-top:10px;">
                            <?php echo $_SESSION['message']; ?>
                        </div>
                        <?php

                        unset($_SESSION['message']);
                    }
                ?>
                <div class="table-responsive" >
                    <table class="table table-hover" id="myTable">
                        <thead>
                            <th>No.</th>
                            <th>Type</th>
                            
                        </thead>
                        <tbody>
                        <?php
                            //include our connection
                            include_once('database.php');

                            $database = new Connection();
                            $db = $database->open();
                            try{	
                                $sql = 'SELECT * FROM animal_type';
                                $no = 0;
                                foreach ($db->query($sql) as $row) {
                                    $no++;
                        ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['type_name']; ?></td>
                                       
                                        <td align="right">
                                            <a class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#edit_type<?php echo $row['id']; ?>">Edit</a>
                                            <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_type<?php echo $row['id']; ?>">Delete</a>
                                        </td>
                                      <?php include('view_delete_type.php'); ?>
                                        <?php include('view_edit_type.php'); ?>
                                    </tr>
                        <?php 
                                }
                            }
                            catch(PDOException $e){
                                echo "There is some problem in connection: " . $e->getMessage();
                            }

                            //close connection
                            $database->close();

                        ?>
                        </tbody>
                    </table>

                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_type">Add Type</a>
                </div>
            </div>
        </div>
</div>
<br><br><br><br><br><br><hr>
<footer style="display:flex;justify-content:center">
    <h2>Jessa M. Francisco <br> Erica Joy S. Ignacio</h2>
</footer>

   <?php include('view_type.php'); ?>
    <!-- JS Bundle -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<?php
include "animal_footer.php";
?>