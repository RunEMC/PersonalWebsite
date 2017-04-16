function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

async function titleloop() {
	var titles = ["Student at the University of Waterloo and Wilfrid Laurier University", "Aspiring Entrepreneur", "Frontend and Backend Web Developper", "Mad (Computer) Scientist", "Data Analyst", "Active Badminton Player", "Swift Swimmer", "Grovy Gamer", "Marvel Fan", "Boardgames Fanatic", "Mathemagician"];
	var selection = 2;  
	var prevSelection = selection;
	
await sleep(4000);
	while (true) {
		selection = (Math.floor(Math.random() * 10)) % titles.length; // Selects a number between 1 and 8
		while (selection == prevSelection) {
			selection = (Math.floor(Math.random() * 10)) % titles.length;
		}
		prevSelection = selection;
		$("#Title").fadeOut(1500);
		await sleep(1500);
		$("#Title").text(titles[selection])
		$("#Title").fadeIn(1500);
		await sleep(5000);
	}
	
}

async function animatecloud(cloudname, delay, tickrate, cloud) {
    
    var sleeptime = Math.floor(Math.random() * 1000);
    var speed = [35000, 40000, 30000, 45000, 25000];
    var speedsetting = (Math.floor(Math.random() * 10) + 1) % 5;
    //var zval = cloud - 1;  // For z-index positioning in relation to the size of the cloud
    var ypos = Math.floor(Math.random() * 1000) % 110 + 11;
	var zval = Math.floor(ypos / 9) + 1;  // For z-index position in relation to how low the cloud is
    
	/*
	// For z-index position in relation to the size of the cloud
	if (cloud - 1 >= 3) {  // If the cloud is of size 3 or greater, it will be more likely to be on top
		zval = Math.floor(Math.random() * 10) % 3 + cloud - 1;
	}
	*/
	
    console.log("Recieved delay of " + delay);
    console.log("Speed is " + speed[speedsetting]);
	console.log("Y Pos is " + ypos);
	console.log("Z-index is " + zval);
    
    $(cloudname).css({'left':'-35%', 'top':ypos + 'px', 'z-index':zval});
    $(cloudname).animate({left: ["100%", "linear"]}, speed[speedsetting]);
    
    console.log("Setting " + (cloud - 1) + " to " + speed[speedsetting]);
    
    delay[cloud - 1] = (speed[speedsetting] + sleeptime);
}

async function profilebganimation() {
    var cloud;
    // To add more images, just add another 0 to the clouddelay array
    var clouddelay = [0, 0, 0, 0, 0];
    var cloudname;
    // While loop ticks every tickrate seconds
    var tickrate = 3500;
    var len = clouddelay.length;
    
    while (true) {
        cloud = (Math.floor(Math.random() * 10)) % clouddelay.length + 1;
        cloudname = "#cloud" + cloud;
        
        console.log("Chose cloud" + cloud);
        console.log("With Delay" + clouddelay[cloud - 1]);
        
        if (clouddelay[cloud - 1] > 0) {
            for (var i = 0; i < len; ++i) {
                clouddelay[i] -= 1000;
            }
        }
        else {
            if (cloud == 5) {
                cloud = (Math.floor(Math.random() * 10)) % clouddelay.length + 1;
                if (cloud == 5) {
                    animatecloud("#plane", clouddelay, tickrate, cloud);
                }
            }
            else {
                // Set the min time that you need to wait for that cloud's animation
                animatecloud(cloudname, clouddelay, tickrate, cloud);
            }
        }
        
        await sleep(tickrate);
        
        if (tickrate > 1000) {
            tickrate -= 500;
        }
    }
}

//$(window).stellar();
//$("#profile-bar").stellar();
profilebganimation();
titleloop();
//$.stellar();