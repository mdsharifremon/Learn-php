# PHP String Functions

## Table Of Content

* [Explode & Implode](#exp-imp "convert to array & convert to string")
* [str_split & chunk_split](#split "Split string to a array")
* [Text Transform](#transform "Convert text to UPPERCASE or lowercase")
* [String Length](#length "Count String Length & Words")
* [String Search & Find Position](#position "return string position & new string")
* [Substring](#substring "return substring")
* [Replace](#replace "Replace A String")

<a name="exp-imp"></a>
## Explode & Implode
```php 
1. explode(' ', $str); // convert to array
2. implode($arr, ' '); // convert to string
```

<a name="split"></a>

## String Split
```php 
1. str_split($str, length);
# Return a array. 
# Length is how many char to stored in one index.
    
2. chunk_split($str,length, end eg '....');
# Return a new string and mark it with smaller parts.
# length is after how many char you want to break.
# end is what char you want to add.
```
<a name="transform"></a>

## Transform to Uppercase or lowercase
```php 
1. strtoupper($str) // To Uppercase
2. strtolower($str) // to lowercase
3. ucfirst($str) // First letter to Uppercase
4. lcfirst($str) // First letter to lowercase
5. ucwords($str) // First letter to uppercase of every word.(capitalization)
```

<a name="length"></a>

## String Length
```php 
1. strlen($str) // Count String Length
2. str_word_count($str, 0/1/2) 
# if input 0 - return total word number.
# if input 1 - Return array 
# if input 2 - Return array with key of indexing.
```

<a name="position"></a>

## String Search & Find Position
```php 

Note: Return Index Of Search Term.

1. strpos($str, 'search-term', start) // Case Sensitive
2. stripos($str, 'search-term', start) // Case Insensitive
#  return index num. Search from start.

3.strrpos($str, 'search-term', start) // Case Sensitive 
4.strripos($str, 'search-term', start); // Case Insensitive
# return index num. Search from end.(reverse order)

Note: Return A New String.
1. strstr($str, 'search', 'before-search eg: true/false');
2. strchr($str, 'search', 'before-search eg: true/false');
# Return remaining of first find.
# If input true return before values of first finds.
3. stristr($str, 'search', 'before-search eg: true/false'); // Case Insensitive.

4. strrchr($str, 'search', 'before-search eg: true/false');
# This is reverse order of strstr()/strchr();

5. strpbrk($str, 'char list');
# Search for characters and return remaining.
```
<a name="substring"></a>

## Substring
```php 
1. substr($str, start, length);
# Return a new string from start to length.
```

<a name="replace"></a>

## String Replace
```php 
1. str_replace(find-word, replace-word, $str, $variable[optional]); // case sensitive
2. str_ireplace(find-word, replace-word, $str, $variable[optional]); // case insensitive
# Replace the existing string.
# $variables is to find how many value has been replaced.

Note: when it comes to replace multiple values at a time, take two associative array.
One is for find words, another replacement.

$str = 'hello world!, the world is beautiful';
$arr_find = ['hello', 'world'];
$arr_replace = ['hi', 'earth'];
str_replace($arr_find, $arr_replace,$str);
return $str = 'hi earth, this earth is beautiful';

Note: this function can be used with array to replace any value. 
$arr1 = str_replace('find', 'replacement', $arr);

3. substr_replace($str, replacement, start, length[optional])
# Replace the string form start to length.

4. $strtr();
```

