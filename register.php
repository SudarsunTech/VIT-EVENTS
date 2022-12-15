
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>VIT Chennai Events</title>
        <?php require 'utils/styles.php'; ?>
        <style>
            .button {
              border: none;
              color: white;
              padding: 16px 32px;
              text-decoration: none;
              cursor: pointer;
          }
          .green {
            background-color: #04AA6D;
          }
          .blue {
            background-color: #59C1BD;
          }
        </style>
        
    </head>
    <body>
    <?php require 'utils/header.php'; ?>
    <div class ="content">
            <div class = "container">
                <div class ="col-md-6 col-md-offset-3">
    <form method="POST">

   
        <br><label>Student Registration Number:</label><br>
        <input type="text" name="usn" class="form-control" required><br><br>

        <label>Event ID:</label><br>
        <input type="number" name="eid" class="form-control" required><br><br>

        <label>Student Name:</label><br>
        <input type="text" name="name" class="form-control" required><br><br>

        <label>Branch:</label><br>
        <input type="text" name="branch" class="form-control" required><br><br>

        <label>Semester:</label><br>
        <input type="text" name="sem" class="form-control" required><br><br>

        <label>Email:</label><br>
        <input type="text" name="email"  class="form-control" required ><br><br>

        <label>Phone:</label><br>
        <input type="text" name="phone"  class="form-control" required><br><br>

        <label>College:</label><br>
        <input type="text" name="college"  class="form-control" required><br><br>

        <button type="submit" class="button green" name="update" required>Submit</button><br><br>
        <a href="usn.php" ><u>Already registered ?</u></a>

    </div>
    </div>
    </div>
    </form>
    

    <?php require 'utils/footer.php'; ?>
    </body>
</html>

<?php

    if (isset($_POST["update"]))
    {
        $usn=$_POST["usn"];
        $event_id=$_POST["eid"];
        $name=$_POST["name"];
        $branch=$_POST["branch"];
        $sem=$_POST["sem"];
        $email=$_POST["email"];
        $phone=$_POST["phone"];
        $college=$_POST["college"];
       


        if( !empty($usn) || !empty($event_id) || !empty($name) || !empty($branch) || !empty($sem) || !empty($email) || !empty($phone) || !empty($college) )
        {
        
            include 'classes/db1.php';  

            $result = mysqli_query($conn,"SELECT event_id from events where event_id=$event_id");
   
            if(!is_null(mysqli_fetch_array($result))){
            
                $INSERT="INSERT INTO participent (usn,name,branch,sem,email,phone,college) VALUES('$usn','$name','$branch',$sem,'$email','$phone','$college')";
        
                $conn->query($INSERT);
                           
                $reg=array(); $eve=array();
                $result = mysqli_query($conn,"SELECT * from registered");
                while($row = mysqli_fetch_array($result)) {
                    array_push($reg,$row['usn']);
                    array_push($eve,$row['event_id']);
                }
                print_r($reg); echo "<br>";
                print_r($eve); echo "<br>";
                $c=0;
                for($i=0;$i<count($reg);$i++){
                    if($eve[$i]==$event_id && $reg[$i]==$usn){
                        $c++;
                        
                    }
                }
                if($c>0){
                    echo "<script>alert('You have registered this event already!!');
                    window.location.href='usn.php';
                    </script>";
                }
                else{
                    $conn->query("INSERT INTO registered (usn,event_id) VALUES ('$usn','$event_id')");
                    echo"<script>
                    alert('Registration Successful!!');
                    window.location.href='usn.php';
                    </script>";
                }
            }
                
            else{
                echo"<script>
                alert('Enter valid event id!!');
                window.location.href='register.php';
                        </script>";
            }
            
            $conn->close();
            
        }
        else
        {
            echo"<script>
            alert('All fields are required');
            window.location.href='register.php';
                    </script>";
        }
    }
    
?>