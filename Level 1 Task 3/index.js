let firstValue = 0;
let secondValue = 0;
let resultValue = 0;

let opIsClicked = false;
let operate = '';

function myKey(a){
    if(opIsClicked == false){
        firstValue = Number(a);
        document.getElementsByClassName("result")[0].innerHTML = firstValue;
    }
    if(opIsClicked == true){
        secondValue = Number(a);
        document.getElementsByClassName("result")[0].innerHTML = secondValue;
    }
}

function myClear(){
    firstValue = 0;
    secondValue = 0;
    resultValue = 0;
    opIsClicked = false;
    operate = '';
    document.getElementsByClassName("result")[0].innerHTML = 0;
}

function myF(a){
    if(a == 'sub'){
        opIsClicked = true;
        operate = 'sub';
    }else if(a == 'plus'){
        opIsClicked = true;
        operate = 'plus';
    }else{
        if(operate == 'sub'){
            resultValue = firstValue - secondValue;
        }
        if(operate == 'plus'){
            resultValue = firstValue + secondValue;
        }
        document.getElementsByClassName("result")[0].innerHTML = resultValue;
    }
}