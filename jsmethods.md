# JavaScript Methods

* [String Methods](#string-method)
* [Math Methods](#math-method)
* [Array Methods](#array-method)
* [Object Methods](#object-method)






<a name="string-method"></a>

# String Methods

## #Convert To String
```javascript
var str = 10;
var str = 10 + '';
var str = String(str); / String(10); / String(true); 
var str = str.toString();

// Return a string value. Check with typeof();
These the way to make a integer/ boolean to a string.

# String Concat

var str = 'hello'
var str = str.concat(' ', 'world');
// It will return hello world. You can concat multiple string value at a time.

var str = str.concat( 'world ', 'this ', 'is ', 'sharif');
// it will return hello world this is sharif.
```
## #Extracting String Parts

```javascript
var str = "this is my string"; 
var newStr = str.slice(5);
var newStr = str.slice(5,7);
var newStr = str.substring(5);
var newStr = str.substring(5,7);
/* There function return a new string extract from primary string.*/

Return  newStr = 'is'

/* First parameter is used to define from where start extracting.
Second parameter is used to define to which index it will extract.
Second parameter is optional. It it is not defined it will extract rest of the index.*/

Return  newStr = 'is my string'

difference between these functions is 
var newStr = str.slice(-13, -5);

/* can define negative index.
If negative it will start extracting from the last index to first.*/

var newStr = str.substring(5,7) 
// does not support negative index

var newStr = str.substr(5, 2);
/* In this function first parameter is from where to start and 
second parameter is how many char to pick/extract*/

Return newStr = 'is';
```

## #Various String Methods

```javascript
## String Replace

var str = 'my name is sharif'
var newStr = str.replace('sharif', 'remon');
    
//It will return newStr = 'my name is remon';

var str = 'my name is sharif. sharif is my name'
var newStr = str.replace('sharif', 'remon')

//It will return newStr = 'my name is remon. sharif is my name'
    
// It will replace the first match. it will now go after first match.
// Normally it is case sensitive. to make it insensitive use
var newStr = str.replace(/SHARIF/i, 'remon'); 

*** If you want to change in multiple places you can use

var newStr = str.replace(/sharif/g, 'remon').
// It will replace every sharif to remon. 
// Will return my name is remon. remon is my name.

## String Convert

var str = 'sharif'
var str = str.toUpperCase();
// It will return str = 'SHARIF' => make it Uppercase.

var str = 'SHARIF'
var str = str.toLowerCase();
// It will return str = 'sharif' => make it Lowercase.

## String Length

var str = 'sharif'
var length = str.length;
// it will return length = 5.

```

<a name="math-method"></a>
## Math Method

<a name="array-method"></a>
## Array Method

<a name="object-method"></a>
## Object Method



