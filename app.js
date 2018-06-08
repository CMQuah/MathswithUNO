//list of powercards

let powercard = document.getElementsByClassName("powercard"); //put class or id here
let powercards = [...powercard]

//list of normalcards 

let normalcard = document.getElementsByClassName("normalcard");
let normalcard = [...normalcard]

// declaring move variable
let moves = 0;
let counter = document.querySelector(".moves");

//cards on hand

var colour = ['red', 'blue', 'green', 'yellow'];
var powercard = ['reversecard', 'skip', 'operatorchanger', 'addmove', 'indicatorchange'];
var operation = ['+', '-', 'x', '/'];
var chandnum = [];
var chandpower = [];

//onboard 
//card
var col1;
var num1;
var col2;
var num2;
//indicator or strip
var colourind1;
var colourind2;

function checkcardtype() {

    //return value to randomcardassign add condition to randomcardassign
}

function randomcardassign() {

    temppercent = Math.floor(Math.random() * 10);
    tempnumbercard = Math.floor(Math.random() * 10);
    tempcolourcard = colour[Math.floor(Math.random() * 5)];

    if (temppercent >= 3) {

        chandnum.push([tempnumbercard, tempcolourcard]);
    }

    //chances to be added and at least on number card to be added
    else {
        chadpower.push(powercard[Math.floor(Math.random() * 4)]);
    }

}

function operations(number1, operator, number2) {
    switch ($operator) {

        case '+':
            value = number1 + number2;
            break;

        case '-':
            value = number1 - number2;
            break;

        case 'x':
            value = number1 * number2;
            break;

        case '/':
            value = number1 / number2;
            break;

    }
    return value;
}


//onclick ??
function usepcard(pselection) {
    //if user click on powercard option
    var i = 0;
    var cardchecker = true;
    while (cardchecker) {
        if (chandpower[i] == pselection) {
            chandpower.splice(i, 1)
            break
        }
        else {
            i += 1
        }

    }

    if (pselection == 'moveadder') {

        moveadder(moves);

    }

    /*     else if (pselection=='skip'){
            skip();
        } */

    else if (pselection == 'operatorchanger') {
        //request for newoperation??
        function operatorchanger(num1, newope, num2)
    }

    else if (pselection == 'colourchange') {

        //how to pick colour and position
        colourchange(newcolour, position)

    }

    else {

        reverse(col1, col2, num1, num2)

    }


}

function ranindiassign() {

    return colour[Math.floor(Math.random() * 5)];

}




