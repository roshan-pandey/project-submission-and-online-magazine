<?php 
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title> Magazine</title>

            <style>
                .container {
                    position: relative;
                    text-align: center;
                    color: Orange;
                }
                #grad1 {
                    margin-top: -20px;
                    height: 200px;
                    background: red;
                    background: -webkit-linear-gradient(orange, white);
                    background: -o-linear-gradient(orange, white); 
                    background: -moz-linear-gradient(orange , white); 
                    background: linear-gradient(orange,white); 
                }
            </style>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Project Hub</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="index.php">Home <span class="glyphicon glyphicon-home"></span></a></li>
      <li class="active"><a href="magazine.php">Magazine <span class="glyphicon glyphicon-book"></span></a></li>
      <?php if(isset($_SESSION['name'])) { ?>
      <li><a href="logout.php">Logout <span class="glyphicon glyphicon-log-out"></span></a></li>
    <?php }?>
    </ul>
  </div>
</nav>
        <div id="grad1"></div>
        <div class="container">
            <div>
                <img src="images\BNMIT-Title.png" alt="bnmit" width="50%" height="15%">
            </div>
            <div class="top-center" style="margin-top: 50px;">
                <p style="background-color:blue; border-radius: 30px; line-height: 2; font-size: 30px; font-family: times new roman; color: white;"><b>COLLEGE MAGAZINES</b></p>
                <div style="margin-top: 50px;">
                <table class="table table-striped" style="width:100%; font-size: 20px;" >
                    <tbody>
                      <tr>
                        <td><b>2015-2016 Magazine</b></td>
                        <td><a href="mag/mag15-16.pdf" target="_blank">View in Browser <span class="glyphicon glyphicon-eye-open"></span></a></td>
                        <td><a href="mag/mag15-16.pdf" download>Download <span class="glyphicon glyphicon-download-alt"></span></a></td>
                      </tr>
                      <tr>
                        <td><b>2014-2015 Magazine</b></td>
                        <td><a href="mag/mag14-15.pdf" target="_blank">View in Browser <span class="glyphicon glyphicon-eye-open"></span></a></td>
                        <td><a href="mag/mag14-15.pdf" download>Download <span class="glyphicon glyphicon-download-alt"></span></a></td>
                      </tr>
                      <tr>
                        <td><b>2013-2014 Magazine</b></td>
                        <td><a href="mag/mag13-14.pdf" target="_blank">View in Browser <span class="glyphicon glyphicon-eye-open"></span></a></td>
                        <td><a href="mag/mag13-14.pdf" download>Download <span class="glyphicon glyphicon-download-alt"></span></a></td>
                      </tr>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </body>
</html>










