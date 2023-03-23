<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $myData = "poultry";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$myData);

    // Check connection
    if (!$conn) 
    {
      die("Connection failed: " . mysqli_connect_error());
    }
    else
        {
           
            
        }
