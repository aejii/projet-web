/* Variable declarations */
var score = 0;			//Counts the player click and bonuses, it's the score displayed on screen
var bonusValue = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]; //Current values of each bonus
var hitGenerator = 0;	//Generator used to create the score from bonuses
var login = "";

/* Enumeration declaration */
const NB_BONUSES = 20;
const bonusList = {Karen_Kujo: 0, Kaori_Miyazono: 1, Nakano_Miku: 2, Erina: 3, Chitoge_Kirisaki: 4, Hikayu: 5, Tsugumi: 6, Fjorm: 7, Asuna: 8, Alice: 9, Lyn: 10, Cynthia: 11, Homura_Akemi: 12, Rem_Ram: 13, Fuwa_Aika: 14, Theresia_Van_Astrea: 15, Yurika_Nijino: 16, Emilia: 17, Tohru: 18, Megumin: 19};


/*////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
| update: Update the score output in the html page							|
|																			|
| returns:	void															|
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\////////////////////////////////////*/
function update()
{
	document.getElementById("score").innerHTML = score; //Replaces the displayed score by the updated one
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
|																			|
| returns:	void															|
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\////////////////////////////////////*/
function hit()
{
	increase_score(1);
}


/*////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
| sum_bonuses: Sum all the bonuses contained in the bonusValue array to		|
|			   determine the valuePerSecond rate for the autoclick function	|
|																			|
| returns:	int (the value summed)											|
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\////////////////////////////////////*/
function sum_bonuses()
{
	let valuePerSecond = 0; //Value generated per second by bonuses
	
	
	for (i = 0; i < NB_BONUSES; ++i) //The actual sum
	{
		valuePerSecond += bonusValue[i];
	}
	
	return valuePerSecond;
}


/*////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
| autoclick: Increase the score automatically								|
|																			|
| valueToAddPerSecond:	value to add to the generator for each second		|
|																			|
| returns: 				void												|
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\////////////////////////////////////*/
function autoclick(bonusName, valueToAddPerSecond)
{
	let valuePerSecond = 0; //Value generated per second by the bonuses
	
	
	switch(bonusName)
	{
		//------------------------------------------------------------//
		case 'Karen_Kujo':
			bonusValue[bonusList.Karen_Kujo] = valueToAddPerSecond;
			break;
		//------------------------------------------------------------//
		case 'Kaori_Miyazono':
			bonusValue[bonusList.Kaori_Miyazono] = valueToAddPerSecond;
			break;
		//------------------------------------------------------------//
		case 'Nakano_Miku':
			bonusValue[bonusList.Nakano_Miku] = valueToAddPerSecond;
			break;
		//------------------------------------------------------------//
		case 'Erina':
			bonusValue[bonusList.Erina] = valueToAddPerSecond;
			break;
		//------------------------------------------------------------//
		case 'Chitoge_Kirisaki':
			bonusValue[bonusList.Chitoge_Kirisaki] = valueToAddPerSecond;
			break;
		//------------------------------------------------------------//
		case 'Hikayu':
			bonusValue[bonusList.Hikayu] = valueToAddPerSecond;
			break;
		//------------------------------------------------------------//
		case 'Tsugumi':
			bonusValue[bonusList.Tsugumi] = valueToAddPerSecond;
			break;
		//------------------------------------------------------------//
		case 'Fjorm':
			bonusValue[bonusList.Fjorm] = valueToAddPerSecond;
			break;
		//------------------------------------------------------------//
		case 'Asuna':
			bonusValue[bonusList.Asuna] = valueToAddPerSecond;
			break;
		//------------------------------------------------------------//
		case 'Alice':
			bonusValue[bonusList.Alice] = valueToAddPerSecond;
			break;
		//------------------------------------------------------------//
		case 'Lyn':
			bonusValue[bonusList.Lyn] = valueToAddPerSecond;
			break;
		//------------------------------------------------------------//
		case 'Cynthia':
			bonusValue[bonusList.Cynthia] = valueToAddPerSecond;
			break;
		//------------------------------------------------------------//
		case 'Homura_Akemi':
			bonusValue[bonusList.Homura_Akemi] = valueToAddPerSecond;
			break;
		//------------------------------------------------------------//
		case 'Rem_Ram':
			bonusValue[bonusList.Rem_Ram] = valueToAddPerSecond;
			break;
		//------------------------------------------------------------//
		case Fuwa_Aika:
			bonusValue[bonusList.Fuwa_Aika] = valueToAddPerSecond;
			break;
		//------------------------------------------------------------//
		case 'Theresia_Van_Astrea':
			bonusValue[bonusList.Theresia_Van_Astrea] = valueToAddPerSecond;
			break;
		//------------------------------------------------------------//
		case 'Yurika_Nijino':
			bonusValue[bonusList.Yurika_Nijino] = valueToAddPerSecond;
			break;
		//------------------------------------------------------------//
		case 'Emilia':
			bonusValue[bonusList.Emilia] = valueToAddPerSecond;
			break;
		//------------------------------------------------------------//
		case 'Tohru':
			bonusValue[bonusList.Tohru] = valueToAddPerSecond;
			break;
		//------------------------------------------------------------//
		case 'Megumin':
			bonusValue[bonusList.Megumin] = valueToAddPerSecond;
			break;
		//------------------------------------------------------------//
		default:
			console.log("Script.js: autoclick("+bonusName+", "+valueToAddPerSecond+"): Error: Unknown bonus.");
			break;
	}
	
	valuePerSecond = sum_bonuses();
	
	clearInterval(window.hitGenerator);
	window.hitGenerator = setInterval("increase_score(" + valuePerSecond + ")", 1000);
}


/*////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
| load_data:	Load data from the database of the given user				|
|																			|
| returns:		void														|
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\////////////////////////////////////*/
function load_data(l, s, bV)
{
	login = l;
	score = s;
	bonusValue = bV;
}


/*////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
| save_data:	Save data of the user's current session into database		|
|																			|
| returns:		void														|
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\////////////////////////////////////*/
function save_data()
{
	var xhttp = new XMLHttpRequest();
	
	
	xhttp.onreadystatechange = function()
	{
		if (this.readyState == 4 && this.status == 200)
		{
			console.log(this.responseText);
		}
	};
		
	xhttp.open("POST", "savedata.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("login=" + login + "&score=" + score + "&bonusValue=" + bonusValue);
}


/*////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
| : 	|
|																			|
| returns:		|
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\////////////////////////////////////*/
