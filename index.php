<?php
session_start();
//Connect to database
require 'dbconn.php';
//**********************************************************************************************

//Get current date and time
date_default_timezone_set('Asia/Manila');
$d = date("Y-m-d");

$Tarrive = mktime(9,00,00);
$TimeArrive = date("H:i:sa", $Tarrive);
//**********************************************************************************************
$Tleft = mktime(12,00,00);
$Timeleft = date("H:i:sa", $Tleft);

if (!empty($_POST['seldate'])) {
    $seldate = $_POST['date'];
}
else{
    $seldate = $d;
  }
$_SESSION["exportdata"] = $seldate;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta>
        <meta>
        <title>Users Logs</title>
        <script src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous">
        </script>
        <script src="js/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                setInterval(function(){
                $.ajax({
                    url: "load-users.php"
                    }).done(function(data) {
                    $('#cards').html(data);
                });
                },3000);
            });
        </script>
        <style>
            body {background-image:url("images/PSU.jpg");background-repeat:no-repeat;background-attachment:fixed;
                background-position: top right;
                background-size: cover;}
                header .head h1 {font-family:aguafina-script;text-align: center;color:#ddd;}
                header .head img {float: left;}
                header .opt {float: right;margin: -100px 20px 0px 0px}
                header .opt a {text-decoration: none;font-family:Arial Bold;text-align: center;font-size:20px;color:black;margin-right: 5px}
                header .opt a:hover {opacity: 0.8;cursor: pointer;}
                header .opt #inp {padding:3px;margin:0px 0px 0px 35px;background-color:#00A8A9;font-family:Arial Bold;font-size:16px; opacity: 0.6;color:black;}
                header .opt #inp:hover {background-color: #00A8A9; opacity: 0.8;}
                header .opt input {padding-left:5px;margin:0px 0px 7px 15px;border-radius:7px;border-color: #A40D0F ;background-color:rgba(142, 137, 137, 0); color: white;}
                header .opt p {font-family:Arial Bold;text-align: left;font-size:19px;color:#f2f2f2;}
                .export {margin: 0px 0px 10px 20px; background-color:#900C3F ;font-family:Arial Bold;border-radius: 7px;width: 145px;height: 28px;color: #FFC300; border-color: #000000;font-size:17px}
                .export:hover {cursor: pointer;background-color:#C70039}
                #table {
                    font-family: "Trebuchet MS", Arial Bold, Helvetica, sans-serif;
                    border-collapse: collapse;
                    width: 100%;
            }
            #table td, #table th {
                border: 1px solid #ddd;
                padding: 8px;
                opacity: 0.6;
            }
            #table tr:nth-child(even){background-color: #f2f2f2;}
            #table tr:nth-child(odd){background-color: #f2f2f2;opacity: 0.9;}
            #table tr:hover {background-color: #ddd; opacity: 0.8;}
            #table th{
                opacity: 0.6;
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #00A8A9;
                color: white;
            }
        </style>
    </head>
    <body>
        <header>
            <div class="head" style="display: flex; align-items: center; justify-content: center;">
                <img src="images/PSUlogo.png" width="120" height="120">
	            <h1>Pangasinan State University<br>Attendance System</h1>
                <img src="images/ICpEP.png" width="150" height="150">
            </div>
            <div class="opt">
                <table border="0">
                    <tr>
                        <td><a href="addcard.php">Add a new User<img src="images/adduserlogo.png" style="margin:10px 20px -5px 10px" width="30" title="Add"></a></td>
                        <td><p>Select the date log:
                            <form method="POST" action="">
                                <input type="date" name="date"><br>
                                <input type="submit" name="seldate" value="Select Date" id="inp">
                            </form></p>
                        </td>
                    </tr>
                </table>
            </div>
        </header>
        <h2 style="margin-left: 15px;">
            Time to arrive :<?php echo $TimeArrive?><br>
            Time to leave :<?php echo $Timeleft?>
        </h2>
    </body>
</html>