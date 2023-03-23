<?php
session_start();
include 'dashboard.html';
$_id = $_SESSION["my_id"];


if (isset($_SESSION["my_id"]))
    {
        include 'setup_db.php';
        
        
        $sql = "SELECT * from user where id=$_id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0)
            {
                
                while($row = mysqli_fetch_assoc($result))
                    {
                        ?>
                            <script>
                                document.getElementById("fname").innerHTML = '<?php echo $row['fname'] . ' ' . $row['lname']; ?>';                   
                                document.getElementById("myaddress").innerHTML = '<?php echo $row['address']?>';
                                document.getElementById("mynumber").innerHTML = '<?php echo $row['num']?>';
                                document.getElementById("myemail").innerHTML = '<?php echo $row['email']?>';                               
                            </script>
                        <?php                        
                        
                    }
            } 
        else
            {
                echo "error incorrect user or password";
            }

        mysqli_close($conn);
        
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

