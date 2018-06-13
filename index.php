<?php
/*
1. Design Main Menu (Title, Start Game, ScoreBoard, HowtoPlay)(Page)- HTML
2. Start Game - game page 
   - Set all the UI Card location
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
			<button id="exitBtn" class="btn" style="cursor: pointer;">EXIT</button>
			<h2 class="float_center" style="text-align: center;" >SCORE<br/><span id='currentScore'>0</span></h2>
			<h2 style="display: inline-block; float: right; text-align: center;">MOVE<br/><span id="currentMoveLeft">30</span></h2>
		</div>
		<div id="GameContentContainer">
			<div id="CardIndicator1">
			</div>
			<div id="CardContainer1">
			</div>
			<div id="Operators">
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
					</div>
					<div id="ActionCardHolder2">
					</div>
					<div id="ActionCardHolder3">
					</div>
					<div id="ActionCardHolder4">
					</div>
				</div>
			</div>
			<div id="CardApplyContainer">
				<div id="NumberCardApply">
					<h2 style="position: fixed; color: white; left: 33%; top: 64%;">Please drop the number card above to the card slot below.</h2>
					<div id="CardApplyHolder">
						<div id="miniIndicator1">
						</div>
						<div id="CardHolder1" class="miniHolder" ondrop="drop(event)" ondragover="allowDrop(event)">
						</div>
						<div id="miniOperator">
							<span style="color: white; font-size: 50px;"></span>
						</div>
						<div id="miniIndicator2">
						</div>
						<div id="CardHolder2" class="miniHolder"  ondrop="drop(event)" ondragover="allowDrop(event)">
						</div>
					</div>
				</div>
				<div id="PowerCardApply">
					<h2 style="position: fixed; color: white; left: 33%; top: 64%;">Please drop the power card above to the card slot below.</h2>
					<div id="PowerApplyHolder">
						<div id="PowerHolder" class="miniHolder" ondrop="drop(event)" ondragover="allowDrop(event)">
						</div>
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
		<!-- Put all html of scoreboard inside this div tag-->
	</div>
</html>

<style>
        html {
	    zoom: 0.8; 
	}
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
		left: 37%;
		top: 35%;
	}
	
	#CardIndicator2{
		background-color: white;
		width: 220px;
		height: 30px;
		position: fixed;
		left: 37%;
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
	#miniIndicator1{
		width: 110px;
		height: 15px;
		position: fixed;
		left: 41%;
		top: 70%;
	}
	
	#miniIndicator2{
		width: 110px;
		height: 15px;
		position: fixed;
		left: 50%;
		top: 70%;
	}
	
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
	
	#miniOperator{
		width: 100px;
		height: 15px;
		position: fixed;
		left: 48%;
		top: 76%;
	}
	
	#PowerHolder{
		padding: 10px;
		background-color: white;
		width: 90px;
		height: 140px;
		position: fixed;
		left: 46%;
		top: 72%;
	}
	
	#PowerCardApply {
		display:none;
	}
	
	#ColorChanger1{ 
		position: fixed;
		left: 11%;
		top: 35%;
	}
	
	#ColorChanger2{ 
		position: fixed;
		left: 51%;
		top: 35%;
	}
	
	.indicatorChoice{
		width: 50px;
		height: 50px;
		cursor: pointer;
	}
	
	#operatorBar {
		top: 18%;
		position: relative;
		left: 25%;
	}
	
	.operatorsItem{
		background-color: rgb(0,0,0,0.5);
		color: white;
		border-radius: 12px;
		margin: 10px;
		text-align: center;
		font-size: 80px;
    	width: 50px;
        height 50px;
		border: 1px solid white;
		cursor: pointer;
    }
</style>

<script type="text/javascript">

	document.getElementById("startGame").onclick = function(){ startGame() };
	document.getElementById("howToPlay").onclick = function(){ howToPlay() };
	document.getElementById("scoreBoard").onclick = function(){ scoreBoard() };
	document.getElementById("exitBtn").onclick = function(){ exitGame() };
	
	var InitialDraw = 0;
	var CardId =0;
	var cardDrawType;
	var skipPower = 0;
	var NumberCardSlot = [0,0,0,0];
	var PowerCardSlot = [0,0,0,0];
	
	function startGame(){
		InitialDraw = 1;
		document.getElementById("GameContainer").style.display = "block";
		document.getElementById("MainContainer").style.display = "none";
		document.body.style.backgroundImage = "url('image/gamebackground.png')";
		updateRandomFirstCard();
		updateRandomSecondCard();
		updateRandomIndicator1();
		updateRandomIndicator2();
		updateRandomOperator();
		InitialDraw = 0;
		initialdrawHoldingCard();
		
		/* Refresh page dialog*/
		window.onbeforeunload = function ()
		{
			return "";
		};
	}
	
	/** Initial Draw Holding Card**/
	function initialdrawHoldingCard(){
		var i = 1;
		var pcCounter = 1;
		var ncCounter = 1;
		while (i < 5){
			var cardItem = drawCard();
			
			if(cardDrawType == 0){
				document.getElementById("NumberCardHolder"+ncCounter).insertAdjacentHTML( 'beforeend', cardItem );
				var cardDrawed = document.querySelectorAll('#'+"NumberCardHolder"+ncCounter+' div')[0];
				cardDrawed.setAttribute('draggable', true);
				cardDrawed.id = "CardId"+CardId;
				NumberCardSlot[ncCounter-1] = 1;
				CardId++;
				ncCounter++;
			}else{
				document.getElementById("ActionCardHolder"+pcCounter).insertAdjacentHTML( 'beforeend', cardItem );
				var cardDrawed = document.querySelectorAll('#'+"ActionCardHolder"+pcCounter+' div')[0];
				PowerCardSlot[pcCounter-1] = 1;
				cardDrawed.id = "CardId"+CardId;
				cardDrawed.setAttribute('draggable', true);
				CardId++;
				pcCounter++;
			}
			i++;
		}
	}
	
	function drawHoldingCard(){
		var cardItem = drawCard();
		if(cardDrawType == 0){
			var i = 0;
			while (i < 4){
				if(NumberCardSlot[i] == 0){
					document.getElementById("NumberCardHolder"+(i+1)).insertAdjacentHTML( 'beforeend', cardItem );
					var cardDrawed = document.querySelectorAll('#'+"NumberCardHolder"+(i+1)+' div')[0];
					cardDrawed.setAttribute('draggable', true);
					cardDrawed.id = "CardId"+CardId;
					NumberCardSlot[i] = 1;
					CardId++;
					break;
				}
				
				i++;
			}
		}else{
			var i = 0;
			while (i < 4){
				if(PowerCardSlot[i] == 0){
					document.getElementById("ActionCardHolder"+(i+1)).insertAdjacentHTML( 'beforeend', cardItem );
					var cardDrawed = document.querySelectorAll('#'+"ActionCardHolder"+(i+1)+' div')[0];
					cardDrawed.id = "CardId"+CardId;
					cardDrawed.setAttribute('draggable', true);
					CardId++;
					PowerCardSlot[i] = 1;
					break;
				}
				i++;
			}
		}
		

	}
	
	/*function drawNumberCardforHolding(){
		var cardDrawed = document.querySelectorAll('#'+"NumberCardHolder"+ncCounter+' div')[0]
		cardDrawed.setAttribute('draggable', true);
		cardDrawed.id = "CardId"+;
	}*/
	
	function updateRandomFirstCard(){
		document.getElementById("CardContainer1").insertAdjacentHTML( 'beforeend', drawCard() );
	}
	
	function updateRandomSecondCard(){
		document.getElementById("CardContainer2").insertAdjacentHTML( 'beforeend', drawCard() );
	}
	
	function updateRandomIndicator1(){
		document.getElementById("CardIndicator1").style.backgroundColor = generatedIndicator();
		document.getElementById("miniIndicator1").style.backgroundColor = document.getElementById("CardIndicator1").style.backgroundColor;
	}
	
	function updateRandomIndicator2(){
		document.getElementById("CardIndicator2").style.backgroundColor = generatedIndicator();
		document.getElementById("miniIndicator2").style.backgroundColor = document.getElementById("CardIndicator2").style.backgroundColor;
	}	

	function updateRandomOperator(){
		document.getElementById("Operators").innerHTML = '<span style="color: white; font-size:100px;">'+generatedOperator()+'</span>';
		document.getElementById('miniOperator').querySelectorAll('span')[0].innerHTML = document.getElementById('Operators').querySelectorAll('span')[0].innerHTML;
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
		//document.getElementById("miniIndicator1").style.backgroundColor = document.getElementById("CardIndicator1").style.backgroundColor;
		//document.getElementById("miniIndicator2").style.backgroundColor = document.getElementById("CardIndicator2").style.backgroundColor;
		//document.getElementById('miniOperator').querySelectorAll('span')[0].innerHTML = document.getElementById('Operators').querySelectorAll('span')[0].innerHTML;
		document.getElementById("CardHolder1").innerHTML = "";
		document.getElementById("CardHolder2").innerHTML = "";
		var card1data = document.querySelectorAll('#CardContainer1 div')[0].cloneNode(true);
		var card2data = document.querySelectorAll('#CardContainer2 div')[0].cloneNode(true);
		card1data.childNodes[0].style.fontSize = "5vw";
		card2data.childNodes[0].style.fontSize = "5vw";
		document.getElementById("CardHolder1").appendChild(card1data);
		document.getElementById("CardHolder2").appendChild(card2data);
		document.getElementById("PowerCardContainer").style.display = "block";
	}
	
	function showNumberCard(){
		document.getElementById("NumberCardContainer").style.display = "block";
		document.getElementById("ActionCardContainer").style.display = "none";
		document.getElementById("NumberCardTab").style.borderBottom  = "solid";
		document.getElementById("ActionCardTab").style.borderBottom  = "none";
		document.getElementById("NumberCardApply").style.display = "block";
		document.getElementById("PowerCardApply").style.display = "none";
	}
	
	function showActionCard(){
		document.getElementById("ActionCardContainer").style.display = "block";
		document.getElementById("NumberCardContainer").style.display = "none";
		document.getElementById("NumberCardTab").style.borderBottom  = "none";
		document.getElementById("ActionCardTab").style.borderBottom  = "solid";
		document.getElementById("NumberCardApply").style.display = "none";
		document.getElementById("PowerCardApply").style.display = "block";
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
		
		var cardSlots = document.getElementById(data).parentNode.id;
		if(cardSlots.charAt(0) == "N"){ 
			NumberCardSlot[(cardSlots.toString().split('').pop())-1] = 0;
		}else{
			PowerCardSlot[(cardSlots.toString().split('').pop())-1] = 0;
		}
		
		var holderType = ev.target;
		while(holderType.className != "miniHolder"){
			holderType = holderType.parentNode;
		}

		switch(holderType.id){
			case "CardHolder1":
				document.getElementById("CardContainer1").innerHTML = "";
				document.getElementById(data).setAttribute("draggable", false);
				document.getElementById("CardContainer1").appendChild(document.getElementById(data));
				//Limit Single use of number card in one move.
				document.getElementById("NumberCardTab").disabled = true;
				document.getElementById("ActionCardTab").click();
				if(document.getElementById("ActionCardTab").disabled == true){
					document.getElementById("GameBottomBar").style.pointerEvents = 'none';
				}
				break;
			case "CardHolder2":
				document.getElementById("CardContainer2").innerHTML = "";
				document.getElementById(data).setAttribute("draggable", false);
				document.getElementById("CardContainer2").appendChild(document.getElementById(data));
				//Limit Single use of number card in one move.
				document.getElementById("NumberCardTab").disabled = true;
				document.getElementById("ActionCardTab").click();
				if(document.getElementById("ActionCardTab").disabled == true){
					document.getElementById("GameBottomBar").style.pointerEvents = 'none';
				}
				break;
			case "PowerHolder":
				var newdata =  document.querySelectorAll('#'+data + ' span')[0].innerHTML;
				document.getElementById(data).parentNode.removeChild(document.getElementById(data));
				performPowerFunction(newdata);
				//Limit Single use of power card in one move
				document.getElementById("ActionCardTab").disabled = true;
				document.getElementById("NumberCardTab").click();
				if(document.getElementById("NumberCardTab").disabled == true){
					document.getElementById("GameBottomBar").style.pointerEvents = 'none';
				}
				break;
		}
		
		closeBottomDialog();
		
		document.getElementById("PowerBottomBar").style.pointerEvents = 'auto';
	}
	
	var colour = ['red', 'blue', 'green', 'yellow'];
	var powercard = ['reversecard', 'skip', 'operatorchanger', 'addmove', 'indicatorchange'];
	var operation = ['+', '-', 'x', '÷'];
	var chandnum = [];
	var chandpower = []; 
	
	function drawCard(){
		temppercent = Math.floor(Math.random() * 10);
		tempnumbercard = Math.floor(Math.random() * 10);
		temppowercard = powercard[Math.floor(Math.random() *5)];
		tempcolourcard = colour[Math.floor(Math.random() * 4)];
		
		//Check number card is whether 0 or not
		var i = 0;
		var emptyLength = 0;
		while(i<4){
			if(NumberCardSlot[i] == 0){
				emptyLength++;
			}
			i++;
		}
		
		
		if(InitialDraw > 0 || skipPower == 1 || emptyLength == 4){
			var cardElement = '<div ondragstart="drag(event)" style="left: 0px; width: 100%; height: 100%; background-color: '+tempcolourcard+'; position: relative;"><span style="color: white; font-size: 10vw; margin-top: 20%; margin-left: 28%; position: absolute;">'+tempnumbercard+'</span></div>';
			cardDrawType = 0;
			return cardElement;
		}else{
			if (temppercent>=3){
				var cardElement = '<div ondragstart="drag(event)" style="left: 0px; width: 100%; height: 100%; background-color: '+tempcolourcard+'; position: relative;"><span style="color: white; font-size: 10vw; margin-top: 20%; margin-left: 28%; position: absolute;">'+tempnumbercard+'</span></div>';
				cardDrawType = 0;
				return cardElement;
				//chandnum.push([tempnumbercard, tempcolourcard]);
			}
			//chances to be added and at least on number card to be added
			else{
				//Return power card HTML.
				var cardElement = '<div ondragstart="drag(event)" style="width: 100%; height: 100%; position: relative;"><span style="color: black; font-size: 25px; margin-top: 20%; margin-left: 10%; position: absolute;">'+temppowercard+'</span></div>';
				cardDrawType = 1;
				return cardElement;
				//chadpower.push(powercard[Math.floor(Math.random() * 4)]);
			}
		} 
		
	}
	
	function generatedIndicator(){
		return colour[Math.floor(Math.random() * 4)];
	}
	
	function generatedOperator(){
		return operation[Math.floor(Math.random() * 4)];
	}
	
	function checkAnswer(ele){
		if(event.key === 'Enter') {
			var input = ele.value
			var card1 = document.getElementById('CardContainer1').querySelectorAll('span')[0].innerHTML;
			var color1 = document.getElementById('CardContainer1').querySelectorAll('div')[0].style.backgroundColor;
			var inColor1 = document.getElementById('CardIndicator1').style.backgroundColor;
			var operator = document.getElementById('Operators').querySelectorAll('span')[0].innerHTML;
			var color2 = document.getElementById('CardContainer2').querySelectorAll('div')[0].style.backgroundColor;
			var inColor2 = document.getElementById('CardIndicator2').style.backgroundColor;
			var card2 = document.getElementById('CardContainer2').querySelectorAll('span')[0].innerHTML;
			var answer;
			var matchColor = 0;
							
			if(color1 == inColor1){
				matchColor++;
			}
			if(color2 == inColor2){
				matchColor++;
			}
				
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
				case "÷":{
					answer = Number(card1) / Number(card2);
					answer = Math.round(answer);
					input = Math.round(input);
					}
					break;
			}

			if (answer == "Infinity"){
				alert("Bonus marks, Ihe answer is infinify (Any number divide by 0 is infinify).");
				document.getElementById("AnswerInput").disabled = true;
				var score = document.getElementById("currentScore").innerHTML;
				var move = document.getElementById("currentMoveLeft").innerHTML;
				var newScore;
								
				switch(matchColor){
					case 0:
						newScore = Number(score)+ 50;
						break;
					case 1:
						newScore = Number(score)+ 70;
						break;
					case 2:
						newScore = Number(score)+ 100;
						break;
				}
				
				var move= Number(move) - 1;
				document.getElementById("currentScore").innerHTML = newScore;
				document.getElementById("currentMoveLeft").innerHTML = move;
				updateRandomOperator();
				placeCardTurn();
				drawHoldingCard();
				document.getElementById("AnswerInput").disabled = false;
				updateRandomIndicator1();
				updateRandomIndicator2();
			}
			else if (input == answer){
				alert("Correct, The answer is "+ answer+" after roundup.");
				document.getElementById("AnswerInput").disabled = true;
				var score = document.getElementById("currentScore").innerHTML;
				var move = document.getElementById("currentMoveLeft").innerHTML;
				var newScore;
								
				switch(matchColor){
					case 0:
						newScore = Number(score)+ 50;
						break;
					case 1:
						newScore = Number(score)+ 70;
						break;
					case 2:
						newScore = Number(score)+ 100;
						break;
				}
				
				var move= Number(move) - 1;
				document.getElementById("currentScore").innerHTML = newScore;
				document.getElementById("currentMoveLeft").innerHTML = move;
				updateRandomOperator();
				placeCardTurn();
				drawHoldingCard();
				document.getElementById("AnswerInput").disabled = false;
				updateRandomIndicator1();
				updateRandomIndicator2();
			}
			else{
				alert("Wrong, the answer is " + answer +" after roundup.");
				document.getElementById("AnswerInput").disabled = true;
				var score = document.getElementById("currentScore").innerHTML;
				var move = document.getElementById("currentMoveLeft").innerHTML;
				var newScore;
				
				switch(matchColor){
					case 0:
						newScore = Number(score)+ 0;
						break;
					case 1:
						newScore = Number(score)+ 10;
						break;
					case 2:
						newScore = Number(score)+ 20;
						break;
				}
				
				var move = document.getElementById("currentMoveLeft").innerHTML;
				var move= Number(move) - 1;
				document.getElementById("currentScore").innerHTML = newScore;
				document.getElementById("currentMoveLeft").innerHTML = move;
				placeCardTurn();
				updateRandomOperator();
				drawHoldingCard();
				document.getElementById("AnswerInput").disabled = false;
				updateRandomIndicator1();
				updateRandomIndicator2();
			}
			document.getElementById("GameBottomBar").style.pointerEvents = 'auto';
			document.getElementById("ActionCardTab").disabled = false;
			document.getElementById("NumberCardTab").disabled = false;
			
			if(document.getElementById("currentMoveLeft").innerHTML == "0"){
				alert("Game Over, your final score: "+ document.getElementById("currentScore").innerHTML);
				exitGame();
			}
		}
	}
	
	function placeCardTurn(){
		document.getElementById("PowerBottomBar").style.pointerEvents = 'none';
		showBottomDialog();
		showNumberCard();
	}
	
	function performPowerFunction(powerType){
		switch(powerType){
			case 'reversecard':
				//Disable Action during animation
				document.getElementById("AnswerInput").disabled = true;
				document.getElementById("PowerBottomBar").style.pointerEvents = 'none';
				
				/* Stop Timer Here */
				
				var card1 = document.getElementById('CardContainer1').querySelectorAll('div')[0];
				var card2 = document.getElementById('CardContainer2').querySelectorAll('div')[0];
				var pos = 0;
				var pos2 = 0;
				var move1 = setInterval(frame, 2);
					function frame() {
						if (pos == 188) {
							clearInterval(move1);
							card2.style.left = pos
							document.getElementById('CardContainer1').appendChild(card2);
							var revMove1 = setInterval(revFrame, 2);
							function revFrame() {
								if (pos == 0) {
									clearInterval(revMove1);
								} else {
									pos-=2; 
									card2.style.left = pos + 'px'; 
								}
							}
						} else {
							pos+=2; 
							card1.style.left = pos + 'px'; 
						}
					}
				var move2 = setInterval(frame2, 2);
					function frame2() {
						if (pos2 == -188) {
							clearInterval(move2);
							card1.style.left = pos2;
							document.getElementById('CardContainer2').appendChild(card1);
							var revMove2 = setInterval(revFrame2, 2);
							function revFrame2() {
								if (pos2 == 0) {
									clearInterval(revMove2);
									//Resume Timer
									//Enable Action
									document.getElementById("AnswerInput").disabled = false;
									document.getElementById("PowerBottomBar").style.pointerEvents = 'auto';
								} else {
									pos2+=2; 
									card1.style.left = pos2 + 'px'; 
								}
							}
						} else {
							pos2-=2; 
							card2.style.left = pos2 + 'px'; 
						}
					}
				
				break;
			case 'skip':
				skipPower = 1;
				/* Skip First Card */
				document.getElementById("CardContainer1").innerHTML = "";
				updateRandomFirstCard();
				
				/* Skip Second Card */
				document.getElementById("CardContainer2").innerHTML = "";
				updateRandomSecondCard();
				skipPower = 0;
				break;
			case 'operatorchanger':
				var operatorBar = document.createElement('div');
				operatorBar.id = "operatorBar";
				operatorBar.innerHTML = '<div class="operatorsItem" onclick="operatorSelect(this)">+</div>'
										+'<div class="operatorsItem" onclick="operatorSelect(this)">-</div>'
										+'<div class="operatorsItem" onclick="operatorSelect(this)">x</div>'
										+'<div class="operatorsItem" onclick="operatorSelect(this)">รท</div>';
				document.getElementById("GameContentContainer").appendChild(operatorBar);
				document.getElementById("Operators").style.display = "none";
				break;
			case 'addmove':
				var move = document.getElementById("currentMoveLeft").innerHTML;
				move= Number(move) + 2;
				document.getElementById("currentMoveLeft").innerHTML = move;
				break;
			case 'indicatorchange':
				var colorBar1 = document.createElement('div');
				var colorBar2 = document.createElement('div');
				colorBar1.id = "ColorChanger1";
				colorBar2.id = "ColorChanger2";
				colorBar1.innerHTML = '<div class="indicatorChoice" style="background:red;" onclick="indicatorSelect(this)"></div>'
				                       +'<div class="indicatorChoice" style="background:yellow;" onclick="indicatorSelect(this)"></div>'
									   +'<div class="indicatorChoice" style="background:green;" onclick="indicatorSelect(this)"></div>'
									   +'<div class="indicatorChoice" style="background:blue;" onclick="indicatorSelect(this)"></div>';
				colorBar2.innerHTML = '<div class="indicatorChoice" style="background:red;" onclick="indicatorSelect(this)"></div>'
					   +'<div class="indicatorChoice" style="background:yellow;" onclick="indicatorSelect(this)"></div>'
					   +'<div class="indicatorChoice" style="background:green;" onclick="indicatorSelect(this)"></div>'
					   +'<div class="indicatorChoice" style="background:blue;" onclick="indicatorSelect(this)"></div>';
				
				document.getElementById("GameContentContainer").appendChild(colorBar1);
				document.getElementById("GameContentContainer").appendChild(colorBar2);
				break;
		}
	}
	
	function indicatorSelect(elem){
		var selectedColor = elem.style.backgroundColor;
		var indicatorNumber = elem.parentNode.id.toString().split('').pop();
		elem.style.backgroundColor = "black";
		document.getElementById("CardIndicator"+indicatorNumber).style.backgroundColor = selectedColor;
		document.getElementById("ColorChanger1").remove();
		document.getElementById("ColorChanger2").remove();
	}
	
	function operatorSelect(elem){
		document.getElementById("Operators").innerHTML = '<span style="color: white; font-size:100px;">'+elem.innerHTML+'</span>';
		document.getElementById("Operators").style.display = "block";
		document.getElementById("operatorBar").remove();
	}
	
	function exitGame(){
		//Confirm Dialog
		
		//Record Score (document.getElementById("currentScore").innerHTML)
		
		
		// If got bugs so refresh is the optional method.
		//location.reload();
		
		
		//Reset all Elements
		//Clear all Card Slot
		document.getElementById("CardContainer1").innerHTML = "";
		document.getElementById("CardContainer2").innerHTML = "";
		
		document.getElementById("NumberCardHolder1").innerHTML = "";
		document.getElementById("NumberCardHolder2").innerHTML = "";
		document.getElementById("NumberCardHolder3").innerHTML = "";
		document.getElementById("NumberCardHolder4").innerHTML = "";
		
		document.getElementById("ActionCardHolder1").innerHTML = "";
		document.getElementById("ActionCardHolder2").innerHTML = "";
		document.getElementById("ActionCardHolder3").innerHTML = "";
		document.getElementById("ActionCardHolder4").innerHTML = "";
		
		//Clear Score and Move
		document.getElementById("currentScore").innerHTML = 0;
		document.getElementById("currentMoveLeft").innerHTML = 30;
		
		//Some Limitations Action
		closeBottomDialog();
		document.getElementById("PowerBottomBar").style.pointerEvents = 'auto';
		document.getElementById("AnswerInput").disabled = false;
		document.getElementById("AnswerInput").innerHTML = "";
		
		InitialDraw = 0;
		CardId =0;
		cardDrawType;
		skipPower = 0;
		NumberCardSlot = [0,0,0,0];
		PowerCardSlot = [0,0,0,0];
	
		//Back to Home.
		document.getElementById("GameContainer").style.display = "none";
		document.getElementById("MainContainer").style.display = "block";
		
	}
</script>
