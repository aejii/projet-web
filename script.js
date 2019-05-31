/* Variable declarations */
var score = 0;			//Counts the player click and bonuses, it's the score displayed on screen
var login = "";
var timeSpent = 0;
var nbClic = 0;
var ameliorations = {};
var dpsTotal = 0;
var ameldebloq = 0;
var nvglobal = 0;

load_data();
/*////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
| update: Update the score output in the html page							|
|																			|
| returns:	void															|
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\////////////////////////////////////*/
function update()
{
	document.getElementById("score").innerHTML = score; //Replaces the displayed score by the updated one
	document.getElementById("tempsPasse").innerHTML = timeSpent +"s"; //Replaces the displayed time spent by the updated one
	document.getElementById("nbClic").innerHTML = nbClic; //Replaces the displayed nb of clic by the updated one
	document.getElementById("dpsTotal").innerHTML = dpsTotal; //Replaces the displayed nb of total dps by the updated one
	document.getElementById("nvglobal").innerHTML = nvglobal;
	document.getElementById("ameldebloq").innerHTML = ameldebloq;
	update_amelioration_display();
}


/*////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
| increase_score: Increase the score by the given parameter					|
|																			|
| value:	value to add to the score										|
|																			|
| returns:	void															|
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\////////////////////////////////////*/
function increase_score(value)
{
	score += value;		//Adds the given value to the score
	update();			//Updates the display of the score
}


/*////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
| hit: Increase the score by 1 when the player clicks on the main button	|
|      and increase number of click by 1																	|
|																			|
| returns:	void															|
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\////////////////////////////////////*/
function hit()
{
	nbClic++;
	increase_score(1);
}


/*////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
| load_data:	Load data from the database of the given user				|
|																			|
| returns:		void														|
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\////////////////////////////////////*/
function load_data()
{
	var xhr = new XMLHttpRequest();
		xhr.open("POST", "loadData.php", true);
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function (e) {
			if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
				console.log("onreadystatechange : "+xhr.responseText);
				var obj = JSON.parse(xhr.responseText);

				login = obj.login;
				score = parseFloat(obj.score);
				timeSpent = parseInt(obj.tempsPasse);
				nbClic = parseInt(obj.nbClic);
				ameliorations = obj.ameliorations;
				success = obj.success;

				initialisation();
				//update affichage
				update();

			}
		};
    xhr.send();
}


/*////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
| save_data:	Save data of the user's current session into database		|
|																			|
| returns:		void														|
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\////////////////////////////////////*/
function save_data()
{
	var xhttp = new XMLHttpRequest();
	timeSpent++;
	var stringAmel = JSON.stringify(ameliorations);
	xhttp.onreadystatechange = function()
	{
		if (this.readyState == 4 && this.status == 200)
		{
			console.log(this.responseText);
		}
	};
	xhttp.open("POST", "savedata.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(
						"login=" + login +
						"&score=" + score +
						"&tempsPasse=" + timeSpent +
						"&nbClic=" + nbClic +
						"&ameliorations=" + stringAmel
					);
}

/*////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
| unlock_ameliorations:	Unlock button if enough score point		|
|																			|
| returns:		void														|
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\////////////////////////////////////*/
function unlock_ameliorations() {
	Object.keys(ameliorations).forEach(function (item) {
		var lvl = parseInt(ameliorations[item]['lvl']);
		var lvlup = parseInt(ameliorations[item]['lvlup']);
		var lvlcost = Math.floor(lvlup* Math.pow(1.1, (lvl)));
		var lvlcost10 = Math.floor(lvlup* Math.pow(1.1, (lvl+10)));

		var waifu = document.getElementById('autoclick'+ item);

		if(parseInt(ameliorations[item]['lvl']) > 0 ||
			score >= parseInt(ameliorations[item]['unlock'])) {
			waifu.classList.remove("locked");
		}

		if(score >= lvlcost )
		{
			waifu.getElementsByTagName('button')[0].classList.remove("disabled");
			waifu.getElementsByTagName('button')[0].disabled = false;
		}
		else {
			waifu.getElementsByTagName('button')[0].classList.add("disabled");
			waifu.getElementsByTagName('button')[0].disabled = true;
		}

		if(score >= lvlcost10 )
		{
			waifu.getElementsByTagName('button')[1].classList.remove("disabled");
			waifu.getElementsByTagName('button')[1].disabled = false;
		}
		else {
			waifu.getElementsByTagName('button')[1].classList.add("disabled");
			waifu.getElementsByTagName('button')[1].disabled = true;
		}
	});
}

/*////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
| upgrade:	Upgrade waifu level						|
|																			|
| returns:		void														|
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\////////////////////////////////////*/
function upgrade(item, times) {
	var lvl = parseInt(ameliorations[item]['lvl']);
	var lvlup = parseInt(ameliorations[item]['lvlup']);
	var lvlcost = Math.floor(lvlup* Math.pow(1.1, (lvl)));
	var nextlvlcost = Math.floor(lvlup* Math.pow(1.1, (lvl+times)));
	var baseDmg = ameliorations[item]['basedmg'];
	var upg = document.getElementById("upg" + item);
	upg.innerHTML = lvl+times;
	var dps = document.getElementById("dps" + item);
	dps.innerHTML = baseDmg * (lvl+times);
	var cout = document.getElementById("cout" + item);
	cout.innerHTML = nextlvlcost;
	ameliorations[item]['lvl'] = lvl + times;
	score -= lvlcost;
	dpsTotal += parseFloat(baseDmg*times);
	nvglobal += times;
	if(lvl == 0 ) {
		ameldebloq++;
	}

}
/*////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
| initialisation:	Initialize amelioration relate value for first display	|
|																			|
| returns:		void														|
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\////////////////////////////////////*/
function initialisation()
{
	Object.keys(ameliorations).forEach(function (item) {
		var lvl = parseInt(ameliorations[item]['lvl']);
		var baseDmg = parseInt(ameliorations[item]['basedmg']);
		dpsTotal+= baseDmg * lvl;
		nvglobal += lvl;
		if(lvl > 0 ) {
			ameldebloq++;
		}
	});
}

/*////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
| update_amelioration_display:	Update amelioration display									|
|																			|
| returns:		void														|
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\////////////////////////////////////*/
function update_amelioration_display()
{
	Object.keys(ameliorations).forEach(function (item) {
		var lvl = parseInt(ameliorations[item]['lvl']);
		var lvlup = parseInt(ameliorations[item]['lvlup']);
		var lvlcost = Math.floor(lvlup* Math.pow(1.1, (lvl)));

		var baseDmg = ameliorations[item]['basedmg'];
		var upg = document.getElementById("upg" + item);
		upg.innerHTML = lvl;
		var dps = document.getElementById("dps" + item);
		dps.innerHTML = baseDmg * (lvl);
		var cout = document.getElementById("cout" + item);
		cout.innerHTML = lvlcost;
		ameliorations[item]['lvl'] = lvl;
	});
}

/*////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
| unlock_succes:	Unlock achievements							|
|																			|
| returns:		void														|
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\////////////////////////////////////*/
function unlock_succes()
{
	Object.keys(success).forEach(function (item) {
		if(success[item]["type"] == "dps")
		{
			if(success[item]["nbdeblocage"] <= dpsTotal) {
				save_success(item);
				delete success[item];
			}
		}
		else if(success[item]["type"] == "waifu") {
			if(success[item]["nbdeblocage"] <= ameldebloq) {
				save_success(item);
				delete success[item];
			}
		}
		else if(success[item]["type"] == "clic") {
			if(success[item]["nbdeblocage"] <= nbClic) {
				save_success(item);
				delete success[item];
			}
		}
		else {
			// pas géré pour le moment
		}
	});
}

/*////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
| save_success:	Save the unlocked success of the user											|
|																			|
| returns:		void														|
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\////////////////////////////////////*/
function save_success(id)
{
	var xhttp = new XMLHttpRequest();
	timeSpent++;
	var stringAmel = JSON.stringify(ameliorations);
	xhttp.onreadystatechange = function()
	{
		if (this.readyState == 4 && this.status == 200)
		{
			console.log(this.responseText);
		}
	};
	xhttp.open("POST", "savedata.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("successId=" + id);
}

// action every 1 second
setInterval(save_data, 1000);
setInterval(update, 1000);
setInterval(unlock_ameliorations, 1000);
setInterval(unlock_succes, 1000);
setInterval(function() {
	score += dpsTotal;
}, 1000);

/*////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
| : 	|
|																			|
| returns:		|
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\////////////////////////////////////*/
