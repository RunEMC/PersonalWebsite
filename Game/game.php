<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Resources</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Bitter|Cabin|Copse|Neuton|Roboto" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="script.js"></script>
    </head>

    <body>

        <div class="w3-top">
            <div class="w3-white w3-xlarge w3-padding-xlarge" style="max-width:1200px;margin:auto;height:60px;">
                <div class="w3-left w3-opennav w3-hover-text-grey" onclick="w3_open()">☰</div>
                <div class="w3-right">Mail</div>
                <div class="w3-center">Day <div id="day-count" class="jsnum">1</div></div>
            </div>
        </div>

        <div id="main" class="container-fluid" style="overflow-x: hidden;margin-top: 60px;">
            <div class="row">
                <!--<ul>
<li><a href="#home">Home</a></li>
<li><a href="#news">News</a></li>
<li><a href="#contact">Contact</a></li>
<li><a href="#about">About</a></li>
</ul>-->
                <nav class="w3-sidenav w3-card-2 w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:15%;min-width:250px" id="mySidenav">
                    <a href="javascript:void(0)" onclick="w3_close()"
                       class="w3-closenav">Close Menu</a>
                    <a href="#food" onclick="w3_close()">Food</a>
                    <a href="#about" onclick="w3_close()">About</a>
                </nav>
                <div class="col-sm-9 nopadding">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-2 nopadding">
                                <ul class="nav nav-pills nav-stacked">
                                    <li class="active"><a data-toggle="pill" href="#grunt">Grunt Work</a></li>
                                    <li><a data-toggle="pill" href="#constr">Construction</a></li>
                                    <li><a data-toggle="pill" href="#manage">Management</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-10 mainbox">
                                <div class="tab-content">
                                    <div id="grunt" class="tab-pane fade in active">
                                        <h3>Grunt Work</h3>
                                        <div class="container-fluid">
                                            <a href="#A" onclick="GruntWork('Cut')">
                                                <div class="w3-card-2 w3-ripple">
                                                    <img class="w3-center" src="Sprites/chop.png" style="height:156px;">
                                                    <h4 class="text-center">Chop Tree</h4>
                                                </div>
                                            </a>
                                            <a href="#A" onclick="GruntWork('Mine')">
                                                <div class="w3-card-2 w3-ripple">
                                                    <img class="w3-center" src="Sprites/mine.png" style="height:156px;">
                                                    <h4 class="text-center">Mine Rocks</h4>
                                                </div>
                                            </a>
                                        </div>
                                        <button type="button" class="btn btn-default" id="cut" onclick="GruntWork('Cut')">Cut Tree</button>
                                        <button type="button" class="btn btn-default" id="mine" onclick="GruntWork('Mine')">Mine Stone</button>
                                    </div>
                                    <div id="constr" class="tab-pane fade">
                                        <h3>Construction</h3>
                                        <div class="container-fluid">
                                            <a href="#A" onclick="Construction('Hut')">
                                                <div class="w3-card-2 w3-ripple">
                                                    <img class="w3-center" src="Sprites/hut.png" style="height:156px;">
                                                    <h4 class="text-center">Build Hut</h4>
                                                </div>
                                            </a>
                                            <a href="#A" onclick="GruntWork('Mine')">
                                                <div class="w3-card-2 w3-ripple">
                                                    <img class="w3-center" src="Sprites/mine.png" style="height:156px;">
                                                    <h4 class="text-center">Mine Rocks</h4>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div id="manage" class="tab-pane fade">
                                        <div class="container-fluid">
                                            <div class="w3-card-2">
                                                <label for="qty">Wood Cutters</label>
                                                <input id="woodcutters" type="number" min="0" max="10" step="1">
                                            </div>
                                            <div class="w3-card-2">
                                                <label for="qty">Stone Miners</label>
                                                <input id="stoners" type="number" min="0" max="10" step="1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-default" id="end" onclick="GruntWork('End')">End Day</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div id="resources-list">
                        Logs: <div id="Logs" value="25" style="display:inline-block;">25</div><br>
                        Stone: <div id="Stone" value="25" style="display:inline-block;">25</div><br>
                        Time: <div id="Time" value="16" style="display:inline-block;">16</div><br>
                        Food: <div id="Food" value="25" style="display:inline-block;">25</div><br>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
