<!DOCTYPE html>
<html>
	<head>
        <title>Ron Li - Edit Blog</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
	<body>

		<?php

			$password = $_POST["pwd"];
			
			if ($password == "RonIsCool123") {
				echo '<div class="container">
						<h1>New Blog</h3><br>
						<form class="form-horizontal" action="process_entry.php" method="post">
							<div class="form-group">
								<label class="control-label col-sm-1" for="author">Name:</label>
								<div class="col-sm-11">
									<input type="text" class="form-control" name="author" placeholder="Enter Your Name">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-1" for="subject">Subject:</label>
								<div class="col-sm-11">
									<input type="text" class="form-control" name="subject" placeholder="Enter The Subject">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-1" for="theme">Theme:</label>
								<div class="col-sm-11">
									<input type="text" class="form-control" name="theme" placeholder="Enter The Theme">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-1" for="content">Content:</label>
								<div class="col-sm-11">
									<textarea class="form-control" rows="7" name="content" placeholder="Enter The Blog Content"></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-1 col-sm-11">
									<div class="checkbox">
										<label><input type="checkbox" name="vis" checked="1">Make Visible</label>
									</div>
								</div>
							</div>
							<div class="form-group">        
								<div class="col-sm-offset-1 col-sm-11">
									<button type="submit" class="btn btn-default">Submit</button>
								</div>
							</div>
						</form>
					</div>';
			}
			else {
				echo "<h3>Incorrect Password</h3>";
			}

		?>

	</body>
</html>