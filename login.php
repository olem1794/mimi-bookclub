<?php include("config.php");
/*How to protect agains Session Hijacking
#Method 1 - This way php is force to handle the session ID using only a cookie,
also wenturn off session.use_trans_sid, to avoid leaking the session ID through URI
  ini_set( 'session.use_only_cookies', TRUE );
  ini_set( 'session.use_trans_sid', FALSE );
#Method 2- very similar as before, now cookie is only accessible using php
  ini_set('session.cookie_httponly', true)
  #Method 3 - Using session timeout, like banks, user is log out in a set time. can be incovinient
    ini_set( 'session.cookie_lifetime', 1200 ) -> session only last 20min
  #Method 4 - Regenerate a session ID, makes a random one when user changes status,
  mostly used after successful login
    session_regenerate_id();*/

#open db
@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

#check - connect or not
if($db->connect_error) {
  echo "Database couldn't connect due to:" . $db->connect_error;
  exit();
}

$loguser = ""; //username is Admin
$logpass = ""; //Password is admin2018
$loguser_err = "";
$logpass_err = "";

if(isset($_POST['submit'])){

    // username empty? Display error
    if(empty(trim($_POST["username"]))){
        $loguser_err = "Please enter your username.";
    } else{
        $loguser = mysqli_real_escape_string($db, $_POST["username"]);
    }

    // password empty? Display error
    if(empty(trim($_POST["password"]))){
        $logpass_err = "Please enter your password.";
    } else{
        $logpass = mysqli_real_escape_string($db, $_POST["password"]);
    }

    if(!empty($loguser) && !empty($logpass)){
      //prepare select statement
      $query = "SELECT User.Username, User.Password FROM User WHERE User.Username LIKE '%" . $loguser . "%' ";

      if($stmt = $db->prepare($query)){
            // Bind variables
            $stmt->bind_result($username, $password);
            $stmt->execute(); //excute query
            /* store result */
            $stmt->store_result(); //save results to use number of rows

              if($stmt->num_rows == 1) {//if username was found
                $stmt->fetch();
                //validate password
                if (md5($logpass)== $password){
                  //Send user to file page
                  header("Location: upload.php");
              } else {
                // Show error message
                $logpass_err = "The password you entered was invalid";
              }
            } else {//close if rows//
              // if rows are 0, user doesnt exist
                    $loguser_err = "No account matches the username.";
                }

      } //Close if prepare query

    } //close if not empty

}//close issset fuction

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mimi’s Tea&Books</title>
  <meta charset="utf-8" />
  <link rel="icon" sizes="57x57" href="img/favicon.png">
  <link href="mimi.css" type="text/css" rel="stylesheet" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville|Open+Sans" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body class="loginbody">

  <main id="maincolumn">
    <div class="logbox">
        <h1>Login</h1>

        <form method="post" class="browsing" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <div class="form-err">
                <label>Username</label>
                <input id="username" type="text" name="username" class="field log" value="">
                <p class="logerror"><?php echo $loguser_err; ?></p>
            </div>

            <div class="form-err">
                <label>Password</label>
                <input id="password" type="password" name="password" class="field log">
                <p class="logerror"><?php echo $logpass_err; ?></p>
            </div>

                <input name="submit" type="submit" class="button" value="Login">
        </form>

    </div>
  </main>

</body>
</html>
