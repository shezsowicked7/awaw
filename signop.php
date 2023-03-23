<?php
session_start();
include 'signop.html';
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

