<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>

<?php 
	if(isset($_GET["email"]) && isset($_GET["password"])){
		echo "isset";
		$email = $_GET["email"];
		$pw = $_GET["password"];

		$servername = "localhost";
		$username = "Bas";
		$password = "spaarSpook9";
		$dbname = "winkelcentrum";

		$conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error) {
			echo "conn error";
			die();
		}

		$sql = "SELECT * FROM adminaccounts where EMail = '$email'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				if($row["Password"] == "$pw"){
					echo "logged in";
					setcookie("LoggedIn", "true");
					header("Location: admintoevoegen.php");
					exit;
				} else {
					header("Location: login.php");
					exit;
				}
			}
			

		} else {
			header("Location: login.php");
			exit;
		}
	}
?>

<body>
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">Log in</div>
                <div class="panel-body">
                    <form action="login.php" method="get">

                        <div class="container">
                            <label for="uname"><b>email</b></label><br>
                            <input type="text" placeholder="Enter email" name="email" required><br>

                            <label for="psw"><b>Password</b></label><br>
                            <input type="password" placeholder="Enter Password" name="password" required><br>

                            <button type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->


    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>