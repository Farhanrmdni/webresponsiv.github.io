<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      body {
        background-color: #ddd;
      }
        .pesan {
            width: 40%;
            height: 550px;
            margin: auto;
            border: 1px solid #dedede;
            background-color: white;
            border-radius: 5%;
            margin-top: 40px;
            box-shadow: 0 0 3px 3px rgba(0, 0, 0, 0.3);
        }
        h2 {
          text-align: center;
          font-family: sans-serif;
        }
        .link {
          width: 20%;
          height: 30px;
          background-color: white;
          
          font-family: Arial, Helvetica, sans-serif;
          border-radius: 10%;
          margin: auto;
          margin-top: 5px;
          text-align: center;
          box-shadow: 0 0 3px 3px rgba(0, 0, 0, 0.3);
        }
       
        a {
          text-decoration: none;
          font-size: 25px;
          color: black;
        }
        .link:hover,
        a:hover {
          color: white;
          background-color: black; 
        }
    </style>
    <title>Masukan Data</title>
</head>
<body>
    <div class="pesan">
    <?php
// nama variabel
$nameErr = $emailErr = $genderErr =  "";
$name = $email = $comment =  "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Wajib Di isi";
  } else {
    $name = test_input($_POST["name"]);
    // periksa apakah nama hanya berisi huruf dan spasi
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Hanya huruf dan spasi yang diperbolehkan";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Wajib Di isi";
  } else {
    $email = test_input($_POST["email"]);
    // cek email jika salah
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Email Salah ( @ )";
    }
  }
    
  

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2> Komen Anda</h2>
<p><span class="error">* Wajib</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
<pre>
  Name      : <input type="text" name="name"> <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail    : <input type="text" name="email"> <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
 
  Komen     : <textarea name="comment" rows="5" cols="40"></textarea>
</pre>
  <br><br>
  
 
  <input type="submit" name="submit" value="Submit">  
</form>

<?php

echo "<h2>Komen Anda:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";

echo $comment;
echo "<br>";

?>
<div class="link">
  <p style="margin-top: 5px;"><a href="ten.html">Kembali</p>
</div>
    </div>

</body>
</html>