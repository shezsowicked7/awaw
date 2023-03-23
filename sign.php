<?php 
session_start();
include 'setup_db.php';
include 'sign.html';

if (isset($_POST['fname'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['add'];
    $num = $_POST['num'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $conpass = $_POST['conpass'];

    $sql = "INSERT INTO user (fname, lname, address, num, email, pass, conpass) VALUES ('$fname', '$lname', '$address', '$num', '$email', '$pass', '$conpass')";

    if (mysqli_query($conn, $sql)) {
        echo "New record added successfully";
         ?>
        <script>
        location.replace("login.php");
        </script>
        <?php
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
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

?>
