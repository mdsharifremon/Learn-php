
const OUTPUT = document.getElementById('output');

var a = [1,2,3,4,5,6,7,8,9];
var len = a.length / 2;
for(let i = 0; i < len; i++){

    let temp = a[i];
    console.log(a[i] = a[a.length - 1 - i]);
    console.log("<br>");
    console.log(a[a.length -1 - i] = temp);
}
console.log(a);

        


OUTPUT.innerHTML = 'text';

