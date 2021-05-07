
const OUTPUT = document.getElementById('output');

var arr = [3,4,5,6,7]
var arr2 = [6,7,5,8,7]
var arr3 = [7,6,4,6,7]


function myFunction(one){
    sum = 0;
    for(var i = 0; i < one.length; i++){
        sum += one[i];
    }
    console.log(sum)
}

myFunction(arr3);



OUTPUT.innerHTML = 'text';

