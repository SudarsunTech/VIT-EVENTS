<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>VIT Chennai Events</title>
<?php require 'utils/styles.php'; ?>
</head>
<style>

hr.blueline {
  border: 10px solid black;
  border-radius: 5px;
}

#bj
{
  font-size: 22px;
}
input,textarea{ 
    margin-left: 43em; 
    margin-top: 30px; 
}
label{ 
    position: absolute; 
    margin-top: 30px; 
    margin-left: 10px;
}
input[type=button], input[type=submit], input[type=reset] {
  background-color: #04AA6D;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  cursor: pointer;
}
</style>

<body style="background-color:white ">

  <?php require 'utils/header.php'; ?>
  <hr class="blueline">
  <div class="col-md-12">
  
<h1 style="text-align:center">Suggestions</h1><br>
<form action="mail.php" method="post">
<label id="bj" for="mail">Your Email</label>
<input type="email" id="mail" name="mail"><br>
<label id="bj" for="reg">Registration Number</label>
<input type="text" id="reg" name="reg"><br>
<label id="bj" for="sugg">Give Us Feedback & Suggestions For Improvement</label>
<textarea name="sugg" id="sugg" cols="50" rows="10"></textarea><br><br>
<input type="submit" name="submit"><br><br>
</form>



</div>
<hr class="blueline">
</body>

 <?php require 'utils/footer.php'; ?>

</html>