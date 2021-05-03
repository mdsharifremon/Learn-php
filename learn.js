
const OUTPUT = document.getElementById('output');
var result;
result = 'hello';
var str = "this";

var len = 0;

for(; ; len++){
    
    if(str.charAt(len) == ''){
        break;
    }
};
result = len;

OUTPUT.innerHTML = result;
