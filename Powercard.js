//for switching
var tempcardcolour;
var tempcardnum;

function reverse(col1, col2, num1, num2) {
    tempcardcolour = col1;
    col1 = col2;
    col2 = tempcardcolour;

    tempcardnum = num1;
    num1 = num2;
    num2 = tempcardnum;

}


function operatorchanger(num1,newope,num2) {

    operations(num1, ope, num2);

}


function moveadder(move) {

    return int(move += 2);

}



function colourchange(newcolour,position) {

    if (position=left) {
        colourind1 = newcolour;
    }
    else{
        colourind2 =newcolour;
    }

}


//function skip()
