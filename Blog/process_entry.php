<!DOCTYPE html>
<html>
	<head>
        <title>Processing...</title>
    </head>
	<body>

		<?php

			$author = $_POST["author"];
			$subject = $_POST["subject"];
			$theme = $_POST["theme"];
			$content = $_POST["content"];
			$visible = $_POST["vis"];
			
			echo $visible;
			
			if ($visible == "on") {
				$visible = 1;
			}
			else {
				$visible = 0;
			}
			
			echo "<br>";
			echo $visible;
			
			include "../database.php";

			// Create Connection
			$conn = mysqli_connect($servername, $username, $password, $dbname);

			// Check Connection
			if (!$conn) {
				die("Connection Failed: " . mysqli_connect_error());
			}
			//echo "Connected successfully";

			$sql = "INSERT INTO `BLOG_LIST`(`SUBJECT`, `CONTENT`, `AUTHOR`, `GROUP_THEME`, `VISIBLE`) VALUES ('" . $subject . "','" . $content . "','" . $author . "','" . $theme . "','" . $visible . "')";
			$result = $conn->query($sql);
			
			if ($result === TRUE) {
				echo "Entry submitted successfully!";
				echo "<script>window.close();</script>";
			}
			else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
			
			$conn->close();

		?>

	</body>
</html>