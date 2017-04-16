<?php

    session_start();

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo "Welcome, " . $_SESSION['username'] . "!";
    } else {
        echo "Please log in first to see this page.";
    }

	function Redirect($url, $permanent = false)
	{
		if (headers_sent() === false)
		{
			header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
		}

		exit();
	}	
/*
	$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';

	if($pageWasRefreshed) {
		//Redirect('https://memovise-test.000webhostapp.com', false);
	}
	*/
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
	
    <body>
	
		<?php
	
			$DEBUG = FALSE;
	
			if ($DEBUG) {
				print_r($_POST);
			}
	
            function test_input($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
            }
	
			if (isset($_POST["login"])) {
                
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $uname = test_input($_POST["uname"]);
                    $form = "login";
                    //$flipped = array_flip($_POST);  
                }
				
                /*
				if ( isset($flipped[$form])) {
					echo "We did it!";
				}*/
				
                
				// Connect to the DB
				include "database.php";

				// Create Connection
				$conn = mysqli_connect($servername, $username, $password, $dbname);

				// Check Connection
				if (!$conn) {
					die("Connection Failed: " . mysqli_connect_error());
				}
				//echo "Connected successfully";

				$sql = "SELECT PASSWORD_HASH FROM USER_INFO WHERE USERNAME = '" . $uname . "'";
				$result = $conn->query($sql);
				
				if($result->num_rows > 0) {
					$row = $result->fetch_assoc();
					$hash = $row["PASSWORD_HASH"];
					
					$check = password_verify($_POST["password"], $hash);
					
					if ($check === TRUE) {
						echo "Login Succesful! (redirects to new page)";
						//Redirect('https://www.google.com', false);
                        $_SESSION['loggedin'] = true;
                        $_SESSION['username'] = $uname;
					}
					else {
						echo "Wrong password (add js script to update css)";
					}
				}
				else {
					echo "Email not found (add js script to update css)";
				}
				
				$conn->close();
			}
			elseif (isset($_POST["register"])) {
                
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $uname = test_input($_POST["uname"]);
                    $email = test_input($_POST["email"]);
                }
				
				$hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
				
				
				// Connect to the DB
				include "database.php";

				// Create Connection
				$conn = mysqli_connect($servername, $username, $password, $dbname);

				// Check Connection
				if (!$conn) {
					die("Connection Failed: " . mysqli_connect_error());
				}
				//echo "Connected successfully";

				$sql = "INSERT INTO `USER_INFO`(`EMAIL`, `PASSWORD_HASH`, `USERNAME`) VALUES ('" . $email . "','" . $hash . "','" . $uname . "')";
				$result = $conn->query($sql);
				
				// Check if DB query entry was successful
				if ($result === TRUE) {
					echo "Entry submitted successfully! (this will redirect to new page)";
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $uname;
					//echo "<script>window.close();</script>";
				}
				else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
				
				$conn->close();
			}
			
			
		?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-4">
					<div class="container" style="width:100%;">
						<h1>Log In</h1><br>
						<form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
							<div class="form-group">
								<label class="control-label col-sm-2" for="uname">Username:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="uname" placeholder="Enter Your Username">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="password">Password:</label>
								<div class="col-sm-10">
									<input type="password" class="form-control" name="password" placeholder="Enter Your Password">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<div class="checkbox">
										<label><input type="checkbox" name="rem">Remember Me</label>
									</div>
								</div>
							</div>
							<div class="form-group">        
								<div class="col-sm-offset-2 col-sm-10">
									<button name='login' type="submit" class="btn btn-default">Submit</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="col-sm-2">
				</div>
				<div class="col-sm-6">
					<div class="container" style="width:100%;">
						<h1>Register</h1><br>
						<form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
							<div class="form-group">
								<label class="control-label col-sm-3" for="uname">User Name:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="uname" placeholder="Enter Your User Name">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="email">Email:</label>
								<div class="col-sm-9">
									<input type="email" class="form-control" name="email" placeholder="Enter Your Email">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3" for="password">Password:</label>
								<div class="col-sm-9">
									<input type="password" class="form-control" name="password" placeholder="Enter Your Password">
								</div>
							</div>
							<div class="form-group">        
								<div class="col-sm-offset-3 col-sm-9">
									<button name='register' type="submit" class="btn btn-default">Submit</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
	</body>
	
</html>