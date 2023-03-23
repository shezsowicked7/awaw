<?php
session_start();
include 'setup_db.php';
$_id = $_SESSION["my_id"];
if (isset($_SESSION["my_id"]))
            {
               
                $sql = "DELETE FROM user WHERE id=$_id";

                if (mysqli_query($conn, $sql))
                    {
                      echo "Record deleted successfully";
                       include 'logout.php';
                    } 
                else
                    {
                      echo "Error deleting record: " . mysqli_error($conn);
                    }
            }

