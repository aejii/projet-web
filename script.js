/* Variable declaration */
var score = 0; // Counts the player click and the bonuses


/*////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
| update: Update the score output in the html page							|
|																			|
| returns:	void															|
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\////////////////////////////////////*/
function update()
{
	document.getElementById("score").innerHTML = score;
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
	score += value;
	update();
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
| autoclick: Increase the score automatically								|
|																			|
| valuePerSecond:	value to add to the score for each second				|
|																			|
| returns: 			void													|
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\////////////////////////////////////*/
function autoclick(valuePerSecond)
{
	setInterval("increase_score(\"valuePerSecond\")",1000);
}


/*////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
| : |
|																			|
| returns: |
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\////////////////////////////////////*/
