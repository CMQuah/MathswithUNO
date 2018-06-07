<?php
/*
1. Design Main Menu (Title, Start Game, ScoreBoard, HowtoPlay)(Page)- HTML
2. Start Game - game page 
   - Set all the UI Card location
   - Start write php functions
   - Create click event and chg css (Javascript).
3. Scoreboard - Table and Display Previous GamePlay data.(can be online ranking).
4. HowtoPlay - Just Write Instructions.
*/
?>

<html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<div id="MainContainer">
		<div id="HeaderContainer">
			<span class="MainHeader">Colour Card Game</span>
		</div>
		<div id="ButtonContainer">
			<button id="startGame">Start Game</button>
			<button id="howToPlay">How To Play</button>
			<button id="scoreBoard">Scoreboard</button>
		</div>
	</div>
	<div id="GameContainer">
		<div id="GameTopBar">
			<button class="btn">EXIT</button>
			<h2 class="float_center" style="text-align: center;" >SCORE<br/><span id='currentScore'>123456</span></h2>
			<h2 style="display: inline-block; float: right; text-align: center;">MOVE<br/><span id="currentMoveLeft">30</span></h2>
		</div>
		<div id="GameContentContainer">
			<div id="CardIndicator1">
			</div>
			<div id="CardContainer1">
			</div>
			<div id="Operators">
				<span style="color: white; font-size:100px;">+</span>
			</div>
			<div id="CardIndicator2">
			</div>
			<div id="CardContainer2">
			</div>
			<div id="EqualOperator">
				<span style="color: white; font-size:100px;">=</span>
			</div>
			<div id="AnswerContainer">
				<input id="AnswerInput" type="number" style="width: 300px; height: 75px;"/>
			</div>
		</div>
		<div id="GameBottomBar">
			<i class="arrow up"></i>
		</div>
		<div id="PowerCardContainer">
			<div id="PowerTopBar">
				<span id="PowerDialogHeader" class="float_center">
					<button id="NumberCardTab" class="btn" style="color: white;">NUMBER</button>
					<button id="ActionCardTab" class="btn" style="color: white;">ACTION</button>
				</span>
			</div>
			<div id="PowerContentContainer">
				<div id="NumberCardContainer">
					<div id="NumberCardHolder1">
						NUMBER
					</div>
					<div id="NumberCardHolder2">
					</div>
					<div id="NumberCardHolder3">
					</div>
					<div id="NumberCardHolder4">
					</div>
				</div>
				<div id="ActionCardContainer" style="display: none;">
					<div id="ActionCardHolder1">
						ACTION
					</div>
					<div id="ActionCardHolder2">
					</div>
					<div id="ActionCardHolder3">
					</div>
					<div id="ActionCardHolder4">
					</div>
				</div>
			</div>
			<div id="PowerBottomBar">
				<i class="arrow down"></i>
			</div>
		</div>
	</div>
	<div id="InstructionContainer">
		<h1>How To Play / Rules </h1>
	</div>
	<div id="scoreBoardContainer">
		<table>ScoreBoard</table>
	</div>
</html>

<style>
    body{
		background-image: url('image/mainmenu.jpg');
	    -webkit-background-size: cover;
	    -moz-background-size: cover;
	    -o-background-size: cover;
	    background-size: cover;
	}
	
	span.MainHeader{
		margin: 100px 0 0 0 ;
		font-size: 105px;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
	}
	
	#MainContainer{
		display: block;
	}
	
	#HeaderContainer{
		position: relative;
	}	
	
	#ButtonContainer{
		display: block;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
	}
	
	#ButtonContainer button{
		display: inherit;
		font-size: 50px;
		margin: 70px 0 0 0;
		min-width: 300px;
	}
	
	#InstructionContainer,#scoreBoardContainer,#GameContainer {
		display: none;
	}
	
	/* Game Screen CSS */
	#GameTopBar {
		height:100px;
	}
	
	.float_center {
	  float: right;
	  position: relative;
	  left: -50%; /* or right 50% */
	  text-align: left;
	}
	
	.btn {
		border: none;
		background-color: inherit;
		padding: 14px 28px;
		font-size: 16px;
		float: left;
		cursor: pointer;
		display: inline-block;
	}
	
	#GameContentContainer{
		background:rgba(0,0,0,0.1);
		width: 80%;
		height: 80%;
		left: 10%;
		bottom: 10%;
		position: fixed;
		border-radius: 12px;
	}	
	
	#CardIndicator1{
		background-color: white;
		width: 200px;
		height: 30px;
		position: fixed;
		left: 15%;
		top: 25%;
	}

	#CardContainer1{
		background-color: white;
		width: 200px;
		height: 300px;
		position: fixed;
		left: 15%;
		top: 35%;
	}
	
	#CardContainer2{
		background-color: white;
		width: 200px;
		height: 300px;
		position: fixed;
		right: 50%;
		top: 35%;
	}
	
	#CardIndicator2{
		background-color: white;
		width: 200px;
		height: 30px;
		position: fixed;
		right: 50%;
		top: 25%;
	}
	
	#Operators{
		width: 200px;
		height: 30px;
		position: fixed;
		left: 31%;
		top: 45%;
	}
	
	#EqualOperator{
		width: 200px;
		height: 30px;
		position: fixed;
		left: 55%;
		top: 45%;
	}
	
	#AnswerContainer{
		position: fixed;
		left: 63%;
		top: 47.5%;	
	}
 
	/* Game Screen Bottom CSS */
	
	#GameBottomBar{
		position: fixed;
		left: 48%;
		bottom: 3%;	
		cursor: pointer;
	}
	
	i {
		border: solid black;
		border-width: 0 3px 3px 0;
		display: inline-block;
		padding: 3px;
		font-size:50px;
		width: 25px;
		height: 25px;
	}
	
	.up {
		transform: rotate(-135deg);
		-webkit-transform: rotate(-135deg);
	}

	.down {
		transform: rotate(45deg);
		-webkit-transform: rotate(45deg);
	}
	
	/* Power Container CSS*/
	#PowerCardContainer{
		background:rgba(0,0,0,1);
		bottom: 0%;
		left: 5%;
		position: fixed;
		width: 90%;
		height: 90%;
		display: none;
	}
	
	#PowerTopBar{
		height: 100px;
		width: 100%;
	}
	
	#PowerDialogHeader{
		left: -38%;
		margin: 35px;
		text-align: left;
	}
	
	#ActionCardTab,#NumberCardTab{
		font-size: 30px;
	}
	
	#NumberCardHolder1{
		background-color: white;
		width: 200px;
		height: 300px;
		position: fixed;
		left: 15%;
		top: 35%;
	}
	
	#ActionCardHolder1{
		background-color: white;
		width: 200px;
		height: 300px;
		position: fixed;
		left: 15%;
		top: 35%;
	}
</style>

<script type="text/javascript">

	document.getElementById("startGame").onclick = function(){startGame()};
	document.getElementById("howToPlay").onclick = function(){howToPlay()};
	document.getElementById("scoreBoard").onclick = function(){scoreBoard()};
	
	function startGame(){
		document.getElementById("GameContainer").style.display = "block";
		document.getElementById("MainContainer").style.display = "none";
		document.body.style.backgroundImage = "url('image/gamebackground.png')";
	}
	
	function howToPlay(){
		document.getElementById("InstructionContainer").style.display = "block";
		document.getElementById("MainContainer").style.display = "none";
	}
	
	function scoreBoard(){
		document.getElementById("scoreBoardContainer").style.display = "block";
		document.getElementById("MainContainer").style.display = "none";
	}
	document.getElementById("GameBottomBar").onclick = function() { showBottomDialog()};
	document.getElementById("NumberCardTab").onclick = function() { showNumberCard() };
	document.getElementById("ActionCardTab").onclick = function() { showActionCard() };
	
	function showBottomDialog(){
		document.getElementById("PowerCardContainer").style.display = "block";
	}
	
	function showNumberCard(){
		document.getElementById("NumberCardContainer").style.display = "block";
		document.getElementById("ActionCardContainer").style.display = "none";
	}
	
	function showActionCard(){
		document.getElementById("ActionCardContainer").style.display = "block";
		document.getElementById("NumberCardContainer").style.display = "none";
	}
</script>