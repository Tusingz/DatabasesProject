<!DOCTYPE html>

<head>

  <title> Insert </title>

  <meta charset="utf-8">

  <link type="text/css" rel="stylesheet" href="style.css" media = "screen">

</head>

<body>

  <header>

   <h2 class = "site-title"> Show Users Page </h2>

   <ul class="navlist">
     <li class="navitem"><a href="home.php">Home</a></li>
     <li class="navitem"><a href="about.php">About</a></li>
     <li class="navitem"><a href="showUsers.php">Users</a></li>
   </ul>

 </header>

  <h2> User result: </h2>

  <?php
    include 'connectvarsEECS.php';

    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if (!$conn)
    {
      die('Could not connect: ' . mysql_error());
    }

    function generateRandomSalt()
    {
      return base64_encode(mcrypt_create_iv(12, MCRYPT_DEV_URANDOM));
    }

    $username = mysqli_real_escape_string($conn, $_POST['Username']);
    $first = mysqli_real_escape_string($conn, $_POST['First_name']);
    $last = mysqli_real_escape_string($conn, $_POST['Last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['Email']);
    $password = mysqli_real_escape_string($conn, $_POST['Password']);
    $age = mysqli_real_escape_string($conn, $_POST['Age']);

    //Check if username is already taken

    $takenUser = mysqli_query($conn, "select * FROM Users WHERE Username = '$username'");

    if (mysqli_num_rows($takenUser) > 0)
    {
      echo "<script>
      alert('This username has already been taken.');
      window.location.href='newUser.php';
      </script>";
      exit();
    }

    if (!preg_match("/^[a-zA-Z0-9]*$/", $username) || !preg_match("/^[a-zA-Z0-9]*$/", $password)) //check if username and password is correct
    {
      echo "<script>
      alert('Please do not use special characters.');
      window.location.href='newUser.php';
      </script>";
      exit();
    }

    if (!preg_match("/^[_a-zA-Z- ]+$/", $first) || !preg_match("/^[_a-zA-Z- ]+$/", $last)) //check if first and last name is correct
    {
      echo "<script>
      alert('Please do not use special characters or numbers for your first and last name.');
      window.location.href='newUser.php';
      </script>";
      exit();
    }

    if (!preg_match("/^[0-9]*$/", $age)) //check if age is an integer
    {
      echo "<script>
      alert('Please do not use special characters or letters for your age.');
      window.location.href='newUser.php';
      </script>";
      exit();
    }

    if (!preg_match("/^[_a-zA-Z-.@ ]+$/", $email)) //check if email is correct
    {
      echo "<script>
      alert('Please do not use special characters other than '@' or '.' or '-' for your email.');
      window.location.href='newUser.php';
      </script>";
      exit();
    }

    $salt = generateRandomSalt();

    //Insert new account into database

    if (empty($age)) //age was not input
    {
      $query = "INSERT INTO Users (Username, First_name, Last_name, Email, Password, Salt) VALUES
      ('$username', '$first', '$last', '$email', MD5('$password$salt'), '$salt')";
    }
    else //age was input
    {
      $query = "INSERT INTO Users (Username, First_name, Last_name, Email, Password, Salt, Age) VALUES
      ('$username', '$first', '$last', '$email', MD5('$password$salt'), '$salt', '$age')";
    }

    if (mysqli_query($conn, $query))
    {
      echo "Record added successfully.";
    }
    else
    {
      echo "ERROR, was not able to send: $query. " . mysqli_error($conn);
    }

    mysqli_close($conn);
   ?>

</body>

</html>
