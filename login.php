<?php
session_start();
include 'setup_db.php';

if (isset($_POST['email']))
    {
        $_email = $_POST['email'];
        $_password = $_POST['pass'];
        
        $sql = "SELECT * from user where email='$_email' AND pass ='$_password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0)
            {
                
                while($row = mysqli_fetch_assoc($result))
                    {
                        $_id = $row['id'];
                        $_fname = $row['fname'];
                        $_lname = $row['lname'];
                        
                        $_SESSION["my_id"] = $_id;
                        $_SESSION["my_fname"] = $_fname;
                        $_SESSION["my_lname"] = $_lname;
                        
                        ?>
                            <script>
                                location.replace("index.php");
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

include 'login.html';

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

