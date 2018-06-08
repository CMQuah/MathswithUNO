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
			<h2 class="float_center" style="text-align: center;" >SCORE<br/><span id='currentScore'>0</span></h2>
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
				<input id="AnswerInput" type="number" style="width: 300px; height: 75px; font-size: 50px;" onkeydown="checkAnswer(this)"/>
			</div>
		</div>
		<div id="GameBottomBar">
			<i class="arrow up"></i>
		</div>
		<div id="PowerCardContainer">
			<div id="PowerTopBar">
				<span id="PowerDialogHeader" class="float_center">
					<button id="NumberCardTab" class="btn" style="color: white; border-bottom: solid;">NUMBER</button>
					<button id="ActionCardTab" class="btn" style="color: white;">ACTION</button>
				</span>
			</div>
			<div id="PowerContentContainer">
				<div id="NumberCardContainer">
					<div id="NumberCardHolder1">
						<div id="NumberCard1" draggable="true" ondragstart="drag(event)"><div style="width: 100%; height: 100%; background-color: red; position: relative;"><span style="color: white; font-size: 10vw; margin-top: 20%; margin-left: 28%; position: absolute;">1</span></div></div>
					</div>
					<div id="NumberCardHolder2">
						<div id="NumberCard2" draggable="true" ondragstart="drag(event)"><div style="width: 100%; height: 100%; background-color: yellow; position: relative;"><span style="color: white; font-size: 10vw; margin-top: 20%; margin-left: 28%; position: absolute;">2</span></div></div>
					</div>
					<div id="NumberCardHolder3">
						<div id="NumberCard3" draggable="true" ondragstart="drag(event)"><div style="width: 100%; height: 100%; background-color: green; position: relative;"><span style="color: white; font-size: 10vw; margin-top: 20%; margin-left: 28%; position: absolute;">3</span></div></div>
					</div>
					<div id="NumberCardHolder4">
						<div id="NumberCard4" draggable="true" ondragstart="drag(event)"><div style="width: 100%; height: 100%; background-color: blue; position: relative;"><span style="color: white; font-size: 10vw; margin-top: 20%; margin-left: 28%; position: absolute;">4</span></div></div>
					</div>
				</div>
				<div id="ActionCardContainer" style="display: none;">
					<div id="ActionCardHolder1">
						<div id="ActionCard1" draggable="true" ondragstart="drag(event)">ACTION 1</div>
					</div>
					<div id="ActionCardHolder2">
						<div id="ActionCard2" draggable="true" ondragstart="drag(event)">ACTION 2</div>
					</div>
					<div id="ActionCardHolder3">
						<div id="ActionCard3" draggable="true" ondragstart="drag(event)">ACTION 3</div>
					</div>
					<div id="ActionCardHolder4">
						<div id="ActionCard4" draggable="true" ondragstart="drag(event)">ACTION 4</div>
					</div>
				</div>
			</div>
			<div id="CardApplyContainer">
				<h2 style="position: fixed; color: white; left: 33%; top: 64%;">Please drop the card above to the card slot below.</h2>
				<div id="CardApplyHolder">
					<div id="CardHolder1" ondrop="drop(event)" ondragover="allowDrop(event)">
					</div>
					<div id="CardHolder2" ondrop="drop(event)" ondragover="allowDrop(event)">
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
		width: 220px;
		height: 30px;
		position: fixed;
		left: 15%;
		top: 25%;
	}

	#CardContainer1{
		padding: 20px;
		background-color: white;
		width: 180px;
		height: 280px;
		position: fixed;
		left: 15%;
		top: 35%;
	}
	
	#CardContainer2{
		padding: 20px;
		background-color: white;
		width: 180px;
		height: 280px;
		position: fixed;
		right: 50%;
		top: 35%;
	}
	
	#CardIndicator2{
		background-color: white;
		width: 220px;
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
	
	#PowerBottomBar{
		position: fixed;
		left: 48%;
		bottom: 3%;	
		cursor: pointer;
	}
	
	#PowerBottomBar i{
		border-color: white;
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
		padding: 20px;
		background-color: white;
		width: 180px;
		height: 280px;
		position: fixed;
		left: 20%;
		top: 28%;
	}
	
	#NumberCardHolder2{
		padding: 20px;
		background-color: white;
		width: 180px;
		height: 280px;
		position: fixed;
		left: 35%;
		top: 28%;
	}
	
	#NumberCardHolder3{
		padding: 20px;
		background-color: white;
		width: 180px;
		height: 280px;
		position: fixed;
		left: 50%;
		top: 28%;
	}

	#NumberCardHolder4{
		padding: 20px;
		background-color: white;
		width: 180px;
		height: 280px;
		position: fixed;
		left: 65%;
		top: 28%;
	}
	
	#ActionCardHolder1{
		padding: 20px;
		background-color: white;
		width: 180px;
		height: 280px;
		position: fixed;
		left: 20%;
		top: 28%;
	}

	#ActionCardHolder2{
		padding: 20px;
		background-color: white;
		width: 180px;
		height: 280px;
		position: fixed;
		left: 35%;
		top: 28%;
	}
	
	#ActionCardHolder3{
		padding: 20px;
		background-color: white;
		width: 180px;
		height: 280px;
		position: fixed;
		left: 50%;
		top: 28%;
	}
	
	#ActionCardHolder4{
		padding: 20px;
		background-color: white;
		width: 180px;
		height: 280px;
		position: fixed;
		left: 65%;
		top: 28%;
	}	
	
	/* Card Apply Container */
	#CardHolder1{
		padding: 10px;
		background-color: white;
		width: 90px;
		height: 140px;
		position: fixed;
		left: 41%;
		top: 72%;
	}
	
	#CardHolder2{
		padding: 10px;
		background-color: white;
		width: 90px;
		height: 140px;
		position: fixed;
		left: 50%;
		top: 72%;
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
		document.getElementById("CardContainer1").insertAdjacentHTML( 'beforeend', drawCard() );
		document.getElementById("CardContainer2").insertAdjacentHTML( 'beforeend', drawCard() );
		document.getElementById("CardIndicator1").style.backgroundColor = generatedIndicator();
		document.getElementById("CardIndicator2").style.backgroundColor = generatedIndicator();
		window.onbeforeunload = function ()
		{
			return "";
		};
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
	document.getElementById("PowerBottomBar").onclick = function() { closeBottomDialog()};
	
	function showBottomDialog(){
		document.getElementById("PowerCardContainer").style.display = "block";
	}
	
	function showNumberCard(){
		document.getElementById("NumberCardContainer").style.display = "block";
		document.getElementById("ActionCardContainer").style.display = "none";
		document.getElementById("NumberCardTab").style.borderBottom  = "solid";
		document.getElementById("ActionCardTab").style.borderBottom  = "none";
	}
	
	function showActionCard(){
		document.getElementById("ActionCardContainer").style.display = "block";
		document.getElementById("NumberCardContainer").style.display = "none";
		document.getElementById("NumberCardTab").style.borderBottom  = "none";
		document.getElementById("ActionCardTab").style.borderBottom  = "solid";
	}
	
	function closeBottomDialog(){
		document.getElementById("PowerCardContainer").style.display = "none";
	}
	
	//Drag and Drop
	function allowDrop(ev) {
		ev.preventDefault();
	}

	function drag(ev) {
		ev.dataTransfer.setData("text", ev.target.id);
	}

	function drop(ev) {
		ev.preventDefault();
		var data = ev.dataTransfer.getData("text");
		/*var newdata =  document.querySelectorAll('#'+data + ' span');
		newdata[0].style.fontSize = "5vw";
		ev.target.appendChild(document.getElementById(data));*/
		if(ev.target.id == "CardHolder1"){
			document.getElementById("CardContainer1").innerHTML = "";
			document.getElementById("CardContainer1").appendChild(document.getElementById(data));
		}else{
			document.getElementById("CardContainer2").innerHTML = "";
			document.getElementById("CardContainer2").appendChild(document.getElementById(data));
		}
		
		closeBottomDialog();
		/** Stopped Here**/
		if(document.getElementById("NumberCardHolder1").innerHTML == ""){
			console.log(document.getElementById("NumberCardHolder1").insertAdjacentHTML( 'beforeend', drawCard() ));
			document.getElementById("NumberCardHolder1").insertAdjacentHTML( 'beforeend', drawCard() );
		}else if(document.getElementById("NumberCardHolder2").innerHTML == ""){
			console.log(document.getElementById("NumberCardHolder1").insertAdjacentHTML( 'beforeend', drawCard() ));
			document.getElementById("NumberCardHolder2").insertAdjacentHTML( 'beforeend', drawCard() );	
		}else if(document.getElementById("NumberCardHolder3").innerHTML == ""){
			console.log(document.getElementById("NumberCardHolder1").insertAdjacentHTML( 'beforeend', drawCard() ));
			document.getElementById("NumberCardHolder3").insertAdjacentHTML( 'beforeend', drawCard() );	
		}else if(document.getElementById("NumberCardHolder4").innerHTML == ""){
			console.log(document.getElementById("NumberCardHolder1").insertAdjacentHTML( 'beforeend', drawCard() ));
			document.getElementById("NumberCardHolder4").insertAdjacentHTML( 'beforeend', drawCard() );	
		}
		
		document.getElementById("PowerBottomBar").style.pointerEvents = 'auto';
	}
	
	function drawCard(){
		//Random Number Card
		var number = Math.floor((Math.random() * 10));
		var colour = Math.floor((Math.random() * 4)+1);
		var generatedColour;
		switch (colour){
			case 1:
				generatedColour = "red";
				break;
			case 2:
				generatedColour = "blue";
				break;
			case 3:
				generatedColour = "yellow";
				break;
			case 4:
				generatedColour = "green";
				break;
		}
		var cardElement = '<div><div style="width: 100%; height: 100%; background-color: '+generatedColour+'; position: relative;"><span style="color: white; font-size: 10vw; margin-top: 20%; margin-left: 28%; position: absolute;">'+number+'</span></div>';
		return cardElement;
	}
	
	function generatedIndicator(){
		var colour = Math.floor((Math.random() * 4)+1);
		var generatedColour;
		switch (colour){
			case 1:
				generatedColour = "red";
				break;
			case 2:
				generatedColour = "blue";
				break;
			case 3:
				generatedColour = "yellow";
				break;
			case 4:
				generatedColour = "green";
				break;
		}
		
		return generatedColour;
	}
	
	function checkAnswer(ele){
		if(event.key === 'Enter') {
			var input = ele.value
			var card1 = document.getElementById('CardContainer1').querySelectorAll('span')[0].innerHTML;
			var operator = document.getElementById('Operators').querySelectorAll('span')[0].innerHTML;
			var card2 = document.getElementById('CardContainer2').querySelectorAll('span')[0].innerHTML;
			var answer;
			switch(operator){
				case "+":
					answer = Number(card1) + Number(card2);
					break;
				case "-":
					answer = Number(card1) - Number(card2);
					break;
				case "x":
				case "X":
					answer = Number(card1) * Number(card2);
					break;
				case "/":
					answer = Number(card1) / Number(card2);
					break;
			}

			if (input == answer){
				alert("Correct");
				var score = document.getElementById("currentScore").innerHTML;
				var move = document.getElementById("currentMoveLeft").innerHTML;
				var newScore = Number(score)+1;
				var move= Number(move) - 1;
				document.getElementById("currentScore").innerHTML = newScore;
				document.getElementById("currentMoveLeft").innerHTML = move;
				placeCardTurn();
			}
			else{
				alert("Wrong, the answer is "+answer);
				var move = document.getElementById("currentMoveLeft").innerHTML;
				var move= Number(move) - 1;
				document.getElementById("currentMoveLeft").innerHTML = move;
				placeCardTurn();
			}
		}
	}
	
	function placeCardTurn(){
		document.getElementById("PowerBottomBar").style.pointerEvents = 'none';
		showBottomDialog();
		showNumberCard();
	}
</script>