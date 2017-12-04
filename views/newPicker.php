<!DOCTYPE html>

<head>

  <title> Register - Picker Upper </title>

  <meta charset="utf-8">

  <link type="text/css" rel="stylesheet" href="style.css" media = "screen">

</head>

<body>

<header>

  <h2 class = "site-title"> Food United </h2>

  <ul class="navlist">
    <li class="navitem"><a href="index.php">Home</a></li>
    <li class="navitem"><a href="about.html">About</a></li>
    <li class="navitem"><a href="showUsers.php">Users</a></li>
  </ul>

</header>

<div class = "instruction container">

  <p> This the the Sign Up page. Please do not enter any special characters except for '@' or '.' or '-' for the email. The fields
   that contain a '*' character are required for you to sign up.</p>
</div>

<div class = "input-container">

  <form action = "insertShopper.php" method = "post" onsubmit = "return validate()">
    <input type = "text" name = "Username" placeholder = "Username" class = "user">

    <input type = "text" name = "Password" placeholder = "Password" class = "user">

    <input type = "text" name = "First_name" placeholder = "First Name" class = "user">

    <input type = "text" name = "Last_name" placeholder = "Last name" class = "user">

    <input type = "text" name = "Phone_number" placeholder = "Phone number" class = "user">

    <input type = "text" name = "Address" placeholder = "Address" class = "user">

    <input type = "submit" value = "Submit" id = "Submit">
  </form>

</div>

<footer>
 <div class="pageFooter">
   <p class="footerText">Created By:</p>
   <p class="footerText">Cameron Friel and Zach Tusing</p>
   <p class="footerText"><a href = "https://www.twitch.tv/connor75">CONNOR75</a></p>
 </div>
</footer>

</body>

  <script type="text/javascript" src="newUser.js"></script>

</html>
