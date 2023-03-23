<?php
session_start();
include "editprof.html";
include 'setup_db.php';
$_id = $_SESSION["my_id"];


if (isset($_POST['fname']))
    {
        $f_name = $_POST["fname"];
        $l_name = $_POST["lname"];
        $address = $_POST["address"];
        $number = $_POST["number"];
        $email = $_POST["email"];
        $password = $_POST["pass"];
        $con_password = $_POST["conpass"];
        
        if($password==$con_password)
            {
                
                $sql = "UPDATE user SET fname='$f_name',lname='$l_name',address='$address',num='$number',email='$email',pass='$password'"
                        . " where id=$_id";

                if (mysqli_query($conn, $sql))
                    {
                        ?>
                            <script>
                                alert("Record updated successfully");
                                location.replace("dashboard.php");
                            </script>
                        <?php
                      
                    }
                else
                    {
                      echo "Error updating record: " . mysqli_error($conn);
                    }

                mysqli_close($conn);
            
            
            }
        else
            {
                ?>
                    <script>
                        alert("password not match");
                    </script>
                <?php
            }
        
    }
else
    {
        if (isset($_SESSION["my_id"]))
            {
                


                $sql = "SELECT * from user where id=$_id";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0)
                    {

                        while($row = mysqli_fetch_assoc($result))
                            {
                                ?>
                                    <script>

                                        document.getElementById("fname").value = '<?php echo $row['fname']?>';
                                        document.getElementById("lname").value = '<?php echo $row['lname']?>';
                                        document.getElementById("address").value = '<?php echo $row['address']?>';
                                        document.getElementById("number").value = '<?php echo $row['num']?>';
                                        document.getElementById("email").value = '<?php echo $row['email']?>';
                                        document.getElementById("pass").value = '<?php echo $row['pass' ]?>';
                                        document.getElementById("conpass").value = '<?php echo $row['pass']?>';
                                        

                                    </script>
                                <?php                        

                            }
                    } 
                else
                    {
                        echo "error incorrect user or password";
                    }

                mysqli_close($conn);
            }
    }
    if (isset($_SESSION["my_id"]))
    {
        echo "id= " . $_SESSION["my_id"];
            ?>
                <script>
                    document.getElementById("your_name").innerHTML = '<?php echo $_SESSION["my_fname"]." ".$_SESSION["my_lname"]?>' ;
                    document.getElementById("username").style.display = "block";
                    document.getElementById("log_in_panel").hidden = true;
                </script>  
            <?php
    }
    
else
    {
         ?>
                <script>
                   
                    document.getElementById("username").style.display = "none";
                    document.getElementById("log_in_panel").hidden = false;
                </script>  
            <?php
    }    
