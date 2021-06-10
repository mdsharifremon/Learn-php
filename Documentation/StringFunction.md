# PHP String Functions

## Table Of Content

* [Array => String => Array](#exp-imp "convert to array & convert to string")
* [str_split & chunk_split](#split "Split string to a array")
* [Text Transform](#transform "Convert text to UPPERCASE or lowercase")
* [String Length](#length "Count String Length & Words")
* [String Search & Find Position](#position "return string position & new string")
* [Substring](#substring "return substring")
* [String 
Replace](#replace "Replace A String")
* [String Compare](#compare "Compare two or multiple  String") 
* [String Reverse & Shuffle](#reverse-shuffle) 
* [String Padding & Repeat](#padding-repeat) 
* [String Trim](#trim " trim character form left or right side") 
* [Add & Remove Slashes](#slashes "Add & Remove slashes for security") 
* [Sanitize html Entities & Special Char](#entities-spchar "Sanitize HTML Entities & Special Characters") 
* [Encryption](#md5-sha1 "Encrypt password to hexa/binary code") 
* [String => Hexadecimal => String ](#bintohex "Convert Binary to Hexadecimal & Reconvert Hexadecimal to Binary") 

<a name="exp-imp"></a>
## Array => String => Array
```php 
1. explode(' ', 'string'); // convert to array
2. implode(' ', $arr); // convert to string
2. join(' ', $arr); // convert to string

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

4. $strtr($str, 'find','replacement');
#replace multiple character
#replace multiple word with associative array.where key is find and replacement is value.
```

<a name="compare"></a>

## String Compare
```php 
# Return 1 >, == 0, < -1

1. strcmp('string1','string2') // Case Sensitive
2. strcasecmp('string1','string2') // Case InSensitive

3. strncmp('string1','string2',length) // Case Sensitive
4. strncasecmp('string1','string2',length)  // Case inSensitive
# Length mean how many character you want to compare.

5. substr_compare('string1','string2',startpos,length,case[true/false])
# compares two strings from a specified start position.
 
 6. strnatcmp('string1','string2') // Case Sensitive
 7. strnatcasecmp('string1','string2') // Case Insensitive
 # Compare two strings using a "natural" algorithm by number

 8. similar_text('string1','string2', $percent[opt]);
 # Calculate the similarity between two strings and return the matching characters
```

<a name="reverse-shuffle"></a>

## String Reverse & Shuffle
```php
1. strrev('string'); // reverses a string.
2. str_shuffle(string); // randomly shuffles all the characters of a string
```

<a name="padding-repeat"></a>

## String Padding & Repeat
```php
1. str_pad('string',length,pad_string[./,/-/_/],pad_type[right/left/bothside]);
# add padding a string to a new length.
2. str_repeat('string',repeat time); // repeats a string a specified number of times.
```
<a name="trim"></a>

## String Trim
```php
1. trim('string',charlist)
# removes whitespace and other predefined characters from both sides of a string

2. rtrim('string',charlist)
3. chop(s'tring',charlist)
# Removes whitespace or other predefined characters from the right side of a string

4. ltrim('string',charlist)
# Removes whitespace or other predefined characters from the left side of a string
```

<a name="slashes"></a>

## Add & Remove Slashes
```php
1. addslashes(string);
# Add backslashes in front of predefined characters(' ', " ", \).

2. addcslashes(string, 'defined charlist');
# Add backslashes in front of defined characters.

3. stripslashes(string); # remove backslashes.
```

<a name="entities-spchar"></a>

## HTML Entities & Specialchars
```php
1. htmlentities('string', flag) //  Convert Special Characters to Entities. 
2. html_entity_decode('string',flag); // Decode Entities to Special Characters.
3. htmlspecialchars('string',flag); // only enqoude <,>, &, ', ",
4. htmlspecialchars_decode('string', flag); // Decode entities to only <,>, &, ', ",
5. get_html_translation_table(htmlentities() / htmlspecialchars());

/* Get_html_translation_table() function return a array of 
Which special char can be endoded by the given function */

# Flag means how convert QOUTES to entities. It contain 
# ENT_COMPAT - Default. only double quotes
# ENT_QUOTES -  double and single quotes
# ENT_NOQUOTES - Does not encode/decode any quotes
```
<a name="md5-sha1"></a>

## Encryption 

```php
1. md5('string', true/false); // Binary -> 16, Hex -> 32.
2. sha1('string', true/false); // Binary -> 20, Hex -> 40.
3. md5_file();
4. sha1_file();

# True => Binary FCharacter
# False => Hex Number
```
<a name="bintohex"></a>

## String => Hexadecimal => String 

```php
1. bin2hex('string');
# converts a string of ASCII characters to hexadecimal values.

2. hex2bin('hex code');
# converts a hex code to string  of ASCII characters.
```

