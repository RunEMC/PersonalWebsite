<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ron Li</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../style.css">
		<link rel="stylesheet" type="text/css" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Bitter|Cabin|Copse|Neuton|Roboto" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="script.js"></script>
    </head>

    <body>

        <div id="HeaderBar" class="container-fluid">
            <h1>Ron Li</h1>
        </div>

        <div id="main" class="container-fluid">
            <div class="row">
                <div class="col-sm-2 nopadding">
                    <div class="sidebar-nav" style="border-bottom: none;">
                        <div class="navbar navbar-default navbar-static-top" role="navigation">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <span class="visible-xs navbar-brand">Navigation Menu</span>
                            </div>
                            <div class="navbar-collapse collapse sidebar-navbar-collapse">
                                <ul class="nav navbar-nav">
                                    <li id="home"><a href="../index.html"><img src="../Icons/star.png">Home</a></li>
                                    <li id="me"><a href="../AboutMe/index.html"><img src="../Icons/me.png">About Me</a></li>
                                    <li id="code"><a href="../Projects/index.html"><img src="../Icons/code.png">Projects</a></li>
                                    <li class="active" id="quote"><a href="#"><img src="../Icons/quote.png">Blog</a></li>
                                    <li id="msg"><a href="../Contact/index.html"><img src="../Icons/msg.png">Contact</a></li>
                                    <li id="doc"><a href="../Resume/index.html"><img src="../Icons/doc.png">Resume</a></li>
                                </ul>
                            </div><!--/.nav-collapse -->
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 nopadding">
					<div class="headerwrapper">
						<form name="myForm" action="edit_blog.php" method="post" onsubmit="target_popup(this)" style="display:inline-block; width:100%">
							<h1 class="header-blog">My Blog</h1>
							<div class="rightside" style="float:right;">
								<input type="password" class="form-control" placeholder="Super Secret Password..." name="pwd" id="pwd">
								<button type="submit" class="btn btn-default" style="float:left;">Edit Blog</button><!--onclick="document.getElementById('pwd').value = ''"-->
							</div>
						</form>
					</div>
				
					<div class="panel-group" id="accordion">
						
						<div class="panel" style="background-color: transparent;">
							<div class="BlogSection" style="background-color: #e3e8f2;">
								<a data-toggle="collapse" href="#control">
									<div class="DateWrapper">
										<div class="panel-heading DateWrapper" style="background-color: #b2b2b2;">
											<img src="../Icons/settings.png" style="height:40px;"><h4 style="display:inline-block; position:relative; top: 2px;">Control Panel</h4>
										</div>
									</div>
								</a>
								<div id="control" class="collapse">
									<div class="ButtonWrapper text-center">
										<div class="row">
											<div class="col-sm-6">
												<button type="button" class="btn close-btn">Close All Tabs</button>
											</div>
											<div class="col-sm-6">
												<button type="button" class="btn open-btn">Open All Tabs</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<?php
						include "../database.php";

						// Create Connection
						$conn = mysqli_connect($servername, $username, $password, $dbname);

						// Check Connection
						if (!$conn) {
							die("Connection Failed: " . mysqli_connect_error());
						}
						//echo "Connected successfully";

						$sql = "SELECT SUBJECT, CONTENT, DATE_FORMAT(CREATED_TIME, '%Y-%m-%d-%H-%i-%s') AS 'CreatedTimeID', DATE_FORMAT(CREATED_TIME, '%M %e, %Y') AS 'CreatedTimePP', AUTHOR, GROUP_THEME, VISIBLE FROM BLOG_LIST ORDER BY `CreatedTimeID` DESC";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							// output data
							while($row = $result->fetch_assoc()) {
								if ($row["VISIBLE"] == 1) {
									echo '<div class="panel" style="background-color: transparent;">
											<div class="BlogSection ' . $row["GROUP_THEME"]. '">
												<a data-toggle="collapse" href="#' . $row["CreatedTimeID"]. '">
													<div class="DateWrapper">
														<div class="panel-heading DateWrapper">
															<h4>' . $row["CreatedTimePP"].'</h4>
														</div>
													</div>
												</a>
												<div id="' . $row["CreatedTimeID"]. '" class="collapse">
													<div class="TitleWrapper text-center">
														<h2>' . $row["SUBJECT"]. '</h2>
													</div>
													<div class="BodyWrapper">
														<p>' . $row["CONTENT"]. '</p>
													</div>
													<div class="AuthorWrapper text-right">
														<!--<h3>By: Ron Li</h3>-->
														<br>
													</div>
												</div>
											</div>
										</div>';
								}
							}
						}
						else {
							echo "0 results";
						}
						$conn->close();

						?>
						
						<div class="panel" style="background-color: transparent;">
							<div class="BlogSection" style="background-color: #d0f4cd;">
								<a data-toggle="collapse" href="#02_15_17">
									<div class="DateWrapper">
										<div class="panel-heading DateWrapper" style="background-color: #7dc178;">
											<h4>February 15, 2017</h4>
										</div>
									</div>
								</a>
								<div id="02_15_17" class="collapse">
									<div class="TitleWrapper text-center">
										<h2>The Bucket List</h2>
									</div>
									<div class="BodyWrapper">
										<p>     Random giberish...Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
									</div>
									<div class="AuthorWrapper text-right">
										<!--<h3>By: Ron Li</h3>-->
										<br>
									</div>
								</div>
							</div>
						</div>
						
						<div class="panel" style="background-color: transparent;">
							<div class="BlogSection" style="background-color: #f9f1e0;">
								<a data-toggle="collapse" href="#01_21_17">
									<div class="DateWrapper">
										<div class="panel-heading DateWrapper" style="background-color: #f7bd42;">
											<h4>January 21, 2017</h4>
										</div>
									</div>
								</a>
								<div id="01_21_17" class="collapse">
									<div class="TitleWrapper text-center">
										<h2>Movie Reviews</h2>
									</div>
									<div class="BodyWrapper">
										<p>Random giberish...Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
									</div>
									<div class="AuthorWrapper text-right">
										<!--<h3>By: Ron Li</h3>-->
										<br>
									</div>
								</div>
							</div>
						</div>
						
						<div class="panel" style="background-color: transparent;">
							<div class="BlogSection" style="background-color: #d2e8f4;">
								<a data-toggle="collapse" href="#12_21_16">
									<div class="DateWrapper">
										<div class="panel-heading DateWrapper" style="background-color: #66c5f9;">
											<h4>December 21, 2016</h4>
										</div>
									</div>
								</a>
								<div id="12_21_16" class="collapse">
									<div class="TitleWrapper text-center">
										<h2>Title Of Blog</h2>
									</div>
									<div class="BodyWrapper">
										<p>Random giberish...Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
									</div>
									<div class="AuthorWrapper text-right">
										<!--<h3>By: Ron Li</h3>-->
										<br>
									</div>
								</div>
							</div>
						</div>
					</div>
				
					<!-- Old Attempt (Before Accordion)
					<div id="BlogSection" class="container-fluid" style="background-color: #d0f4cd;">
						<a href="#" data-toggle="collapse" data-target="#02_21_171">
							<div class="DateWrapper" style="background-color: #7dc178;">
								<h4>February 15, 2017</h4>
							</div>
						</a>
						<div id="02_21_171" class="collapse">
							<div class="TitleWrapper text-center">
								<h2>Title Of Blog</h2>
							</div>
							<div class="BodyWrapper">
								<p>Random giberish...Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
							</div>
							<div class="AuthorWrapper text-right">
								<h3>By: Ron Li</h3>
							</div>
						</div>
					</div>
					
					<div id="BlogSection" class="container-fluid" style="background-color: #f9f1e0;">
						<a href="#" data-toggle="collapse" data-target="#01_21_17">
							<div class="DateWrapper" style="background-color: #f7bd42;">
								<h4>January 21, 2017</h4>
							</div>
						</a>
						<div id="01_21_17" class="collapse">
							<div class="TitleWrapper text-center">
								<h2>Title Of Blog</h2>
							</div>
							<div class="BodyWrapper">
								<p>Random giberish...Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
							</div>
							<div class="AuthorWrapper text-right">
								<h3>By: Ron Li</h3>
							</div>
						</div>
					</div>
					
					<div id="BlogSection" class="container-fluid" style="background-color: #d2e8f4;">
						<a href="#" data-toggle="collapse" data-target="#12_21_16">
							<div class="DateWrapper" style="background-color: #66c5f9;">
								<h4>December 21, 2016</h4>
							</div>
						</a>
						<div id="12_21_16" class="collapse">
							<div class="TitleWrapper text-center">
								<h2>Title Of Blog</h2>
							</div>
							<div class="BodyWrapper">
								<p>Random giberish...Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
							</div>
							<div class="AuthorWrapper text-right">
								<h3>By: Ron Li</h3>
							</div>
						</div>
					</div>
					-->
				</div>
            </div>
        </div>

    </body>
</html>
