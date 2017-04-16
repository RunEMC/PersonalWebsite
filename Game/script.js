// Script to open and close sidenav
function w3_open() {
    document.getElementById("mySidenav").style.display = "block";
}

function w3_close() {
    document.getElementById("mySidenav").style.display = "none";
}

function getnum(element, type) {
    if (type == "inner") {
        return parseInt(document.getElementById(element).innerHTML);
    }
    else if (type == "val") {
        return document.getElementById(element).value;
    }
}

function GruntWork(action) {

    console.log(action);

    var time = getnum("Time", "inner");
    var logs = getnum("Logs", "inner");
    var stone = getnum("Stone", "inner");
    var days = getnum("day-count", "inner");
    var workers = 1;
    var food = getnum("Food", "inner");

    if ($("#Workers").length > 0) {
        workers += getnum("Workers", "inner");
    }

    if (action == "Cut" && time >= 3) {
        /*var logs = parseInt(document.getElementById("Logs").innerHTML);
        var time = parseInt(document.getElementById("Time").innerHTML);
        logs += 5;
        time -= 3;
        console.log("Cut: " + logs);
        console.log($(".Logs").text());
        */
        document.getElementById("Logs").innerHTML = logs + 3;
        document.getElementById("Time").innerHTML = time - 3;
    }
    else if (action == 'Mine' && time >= 3) {
        /*
        var stone = parseInt(document.getElementById("Stone").innerHTML);
        var time = parseInt(document.getElementById("Time").innerHTML);
        stone += 5;
        time -= 3;
        console.log("Mined: " + stone);
        */
        document.getElementById("Stone").innerHTML = stone + 3;
        document.getElementById("Time").innerHTML = time - 3;
    }
    else if (action == 'End') {
        document.getElementById("day-count").innerHTML =  + 1;
        document.getElementById("Time").innerHTML = 16;
        document.getElementById("Food").innerHTML = food - workers;
    }

}

function Construction(building) {

    var time = getnum("Time", "inner");
    var logs = getnum("Logs", "inner");
    var stone = getnum("Stone", "inner");

    if (building == "Hut") {
        if (logs >= 35 && stone >= 35) {
            if ($("#Workers").length > 0) {
                document.getElementById("Workers").innerHTML = parseInt(document.getElementById("Workers").innerHTML) + 2;
                document.getElementById("Logs").innerHTML = logs - 35;
                document.getElementById("Stone").innerHTML = stone - 35;
            }
            else {
                var newdiv = "Workers: <div id=\"Workers\" class=\"jsnum\">2</div>";
                $("#resources-list").append(newdiv);
                document.getElementById("Logs").innerHTML = logs - 35;
                document.getElementById("Stone").innerHTML = stone - 35;
            }
        }

    }
}

function Manage() {

    //while(true) {

        var workers = 0;
        var workers_set = false;
        var woodcutters = $("#woodcutters").val();
        $("#woodcutters").attr('max', workers);


        if ($("#Workers").length > 0) {
            workers += getnum("Workers");
            workers_set = true;
        }

        $("#woodcutters").bind('input', function() {
            if (workers) {
                document.getElementById("Workers").innerHTML = workers - woodcutters;
            }
        });
    //}

}

Manage();