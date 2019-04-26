/* Variable declaration */
var score = 0; // Counts the player click and the bonuses


/*////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
| update: Update the score output in the html page							|
|																			|
| returns: void																|
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\////////////////////////////////////*/
function update()
{
	document.getElementById("score").innerHTML = score;
}


/*////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
| click: Increase the score by 1 when the player clicks on the main button	|
|																			|
| returns: void																|
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\////////////////////////////////////*/
function click()
{
	++score;
	update();
}
