# PHP Array CheatSheet

## Table Of Content - Array Methods

* [Array Length][1]
* [Array Search][2]
* [Array Replace][3]
* [Array Add & Delete][4]
* [Array Merge & Combine][5]
* [Array Splice][6]
* [Array Key][7]
* [Array Match/Intersect][8]
* [Array Difference][9]
* [Array Sort][10]
* [Array Traversing][11]

[1]: <#array-count> "1. sizeof()  2. count()   3.array_count_values()"

[2]: <#array-search> "1. in_array()  2. array_search()"

[3]: <#array-replace> "1. array_replace()   2. array_replace_recursive()"

[4]: <#array-add_delete> "1. array_pop()  2. array_shift()  3. array_push()  4. array_unshift()"

[5]: <#array-merge> "1. array_merge()  2. array_merge_recursive()  3. array_combine()"

[6]: <#array-slice> "1. array_slice()  2. array_splice()"

[7]: <#array-key> "1.array_keys()  2. array_key_first()  3. array_key_last()  4. array_key_exists()/ key_exists()  5.array_intersect_key()  6.array_diff_key()  7. array_change_key_case() 8. array_fill_keys()"

[8]: <#array-intersect> "1. array_intersect()  2. array_uintersect()  3. array_intersect_key()  4. array_intersect_ukey()  5. array_intersect_assoc()  6. array_intersect_uassoc()  7. array_uintersect_assoc()  8. array_uintersect_uassoc();"

[9]: <#array-diff> "1. array_diff()  2. array_udiff()  3. array_diff_key()  4. array_diff_ukey()  5. array_diff_assoc()  6. array_diff_uassoc()  7. array_udiff_assoc()  8. array_udiff_uassoc()"

[10]: <#array-sort> " 1. sort()  2. rsort()  3. arsort()  4. asort()  5. krsort()  6. ksort()  7. natcasesort()  8. natsort()  9. array_multisort()  10. array_reverse(), 11. usort(), 12. uasort(), 13. uksort()"

[11]: <#array-traversing> "1. current()  2. next()  3. prev()  4. end()  5. each()  6. pos()  7. key()  8. reset()"

## Other Array Methods

* [Array_Values()](#array-values "Return All Values")
* [Array_Unique()](#array-unique "Return Unique Values & Remove Matched")
* [Array_Column()](#array-column "Pick all Values From A column/Key")
* [Array_Chunk()](#array-chunk "Pair Value in a New Array")
* [Array_Flip()](#array-flip "Flip Key To Value & Value To Key")
* [Array_Sum()](#array-sum "Sum Of All Values")
* [Array_Product()](#array-product "Multiply All Values")
* [Array_Rand()](#array-rand "Return Random Key/Index number")
* [Shuffle()](#array-shuffle "Shuffle All Values Randomly and Remove Keys")
* [Array_Fill()](#array-fill "Fill a Array with a Fixed Value")
* [Array_Walk & Recursive()](#array-walk "Run a Function For Each Value")
* [Array_Map()](#array-map "Run a Function For Each Value and Return a New Array")
* [Array_Reduce()](#array-reduce "Run a Function For Each Value and Return a String")
* [List()](#list "Return Values and assign to individual variables")
* [Extract()](#extract "Convert every key to variable and assign value as value")
* [Compact()](#compact "Convert some variables to a associative array")
* [Range()](#range "Create an array containing a range of elements from beginning to ending number or letter")




<a name="array-count"></a>
## Array Length

```php
1. sizeof($array_variable, 1);
2. count($array_variable, 1);

# It return the total value of an array in numeric number.
# The second parameter is to show the value of multidimensional array.

3. array_count_values($array_variable);
# It return a complete new array with value.
```

<a name="array-search"></a>
## Array Search

```php
1. in_array('search term', $array_variable, strict_mod(true/false));

# Return true or false. like 0 or 1.
# You can search a full array with this function when
# your existing array is a multidimensional array.
# Usually it is used with condition.*/

2. array_search('search term', $array_variable);
# It will return the index or key of existing array.
```
<a name="array-replace"></a>

## Array Replace
```php
1. array_replace($first_array, $second_variable);
# Replace the first array with second array. 
# If there is third or fourth array that will replace the previous array & return a new array.

2. array_replace_recursive($first_array, $second_array);
# It is used with multidimensional associative array.
```
<a name="array-add_delete"></a>

## Array Value Add/Delete

```php
$a = array('one', 'two', 'three');
1. array_pop($a);
It will return $a = array('one', 'two')
# Last value will be deleted. It will not return new array & delete last value of existing array.
       
2. array_shift($a) is same like array_pop($a);
# Only Difference is array_shift() will delete the first value.

If you store it in a new variable $b = array_pop($a);
It wll return $b = array('three');
# Only the last value.

3. array_push($a, 'four', 'five', 'six');
Return $a = array('one', 'two', 'three', 'four', 'five', 'six');
# Add new values at last of existing array. It will not create a new array.

4. array_unshift($a) is same like array_push($a);
# Only Difference is array_unshift() will add new values in first.
```
<a name="array-merge"></a>

## Array Merge/ Combine

```php
$a = array('one', 'two', 'three');
$b = array('three', 'four', 'five');
$d = array('five', 'six', 'seven');
$e = array( 1,2,3);

1. $c = array_merge($a, $b, $d);
Return $c = array('one', 'two', 'three', 'three', 'four', 'five','five', 'six', 'seven')

# Return a new array and merge two/ three array in a new array.
# When it is associative array it will replace the value where kew is same. 

2. $c = $a + $b works same as array_merge();
# Difference is  in $a + $b first value will exist, next will be deleted.(if key match).

3. array_merge_recursive($a, $b)
is same like array_merge($a, $b);

/* Difference is if kew match it will not replace.
It will create a new associative array inside the array.
It is used with multidimensional associative array.*/

$f = array_combine($a, $e);
Return $f = array('one' => 1, 'two' => 2, 'three' => 3);

# It is used only with index array. 
# It return one array into key and another array into its value.

Note: Both arrays index should be same.
# If one array have 5 value, another one should have 5 value.
```
<a name="array-merge"></a>

## Array Slice

```php
var $arry = array('one', 'two', 'three')
1. array_slice($arry_variable, 1, 2, true);

Return $c = array(1 => 'two', 2 => 'three')
# Return a new array. 2nd parameter is from where start slicing.
# 3rd parameter is how many value to pick.
# 4th parameter is to pick the same index from the existing array 

2. array_splice($arry, starting index 0, length 1, $array_2 );
# It will not return new array. It will modify existing array.
```
<a name="array-key"></a>

## Array Key

```php 
1. array_keys($arr,'keyname', strict);
# Return a new array with key name.

2. array_key_first($arr)
# Return the first key of existing array.

3. array_key_last($arr)
# Return the last key of existing array.

4. array_key_exists('keyname', $arr, ) / key_exists('keyname', $arr);
# Return true or false upon the key existence. array.

5. array_intersect_key($arr, $arr2, $arr3)
# Return a new array with the matched key in array one.

6. array_diff_key($arr, $arr2, $arr3)
# Return a new array with the unmatched/difference key in array one.

7. array_change_key_case($arr, CASE_UPPER/CASE_LOWER).
# Return the key transform to uppercase or lowercase.

8. array_fill_keys($arr of keys,value);
# Return a new array with a fixed value to all keys.
```
<a name="array-intersect"></a>
## Array Match or Intersect

```php
Note: array_intersect() all of this kind of functions will return a new array with matched key & value.

1. array_intersect($arr, $arr2);
# Match only values in different arrays.

2. array_uintersect($arr, $arr2, 'compare function');
# Match only values with user defined compare function. 

3. array_intersect_key($arr, $arr2);
# Match only keys in different arrays.

4. array_intersect_ukey($arr, $arr2, 'compare function');
# Match only keys with user defined compare function. 

5. array_intersect_assoc($arr, $arr2);
# Match keys & values in different arrays.

6. array_intersect_uassoc($arr, $arr2, 'compare function'); 
7. array_uintersect_assoc($arr, $arr2, 'compare function');
# these two are same. it will match keys and values with user defined compare function.

8. array_uintersect_uassoc($arr, $arr2,'key Compare Function', 'value Compare Function');
# Match keys and values with user defined two individual key & value compare function.
```
<a name="array-diff"></a>

## Array Difference
```php
1. array_diff($arr, $arr2);
/* Compare difference only values among 
arrays and return a new array with unmatched values. */

2. array_udiff($arr, $arr2, 'compare function');
/* Compare difference only values with 
user defined function among arrays and return 
a new array with unmatched values. */ 

3. array_diff_key($arr, $arr2);
/* Compare difference only keys among 
arrays and return a new array with unmatched keys.*/

4. array_diff_ukey($arr, $arr2, 'compare function');
/* Compare difference only keys with 
user defined function among arrays and return a new array with unmatched keys. */

5. array_diff_assoc($arr, $arr2);
/* Compare difference keys & values among
arrays and return a new array with unmatched keys and values. */

6. array_diff_uassoc($arr, $arr2, 'compare function'); 
7. array_udiff_assoc($arr, $arr2, 'compare function');
/* these two are same. It will compare difference keys & values with 
user defined function among arrays and return 
a new array with unmatched keys & values. */

8. array_udiff_uassoc($arr, $arr2, 'keyCompareFunction', 'valueCompareFunction');

/* Compare difference keys & values with 
2 user defined individual key & value function among
arrays and return a new array with unmatched keys & values. */
```
<a name="array-sort"></a>
## Array Sort

```php
1. sort($arr)
# Sort the values by ascending order in existing array.
# Work better with index array.

2. rsort($arr)
# Sort the values by descending order in existing array.
# Work better with index array.

3. asort($arr)
# Sort the values by ascending order in existing array.
# Work better with associative array.

4. arsort($arr)
# Sort the values by descending order in existing array.
# Work better with associative array.

5. ksort($arr)
# Sort the keys by ascending order in existing array.


6. krsort($arr)
# Sort the keys by descending order in existing array.

7. natsort()
# Natural order sorting by ascending order.
EG:
var arr = ['Img30.png', 'img49.png', 'img2.png','img5.png','img20.png']natsort($arr);
Return $arr = ['Img30.png','img2.png','img5.png','img20.png','img49.png'] 

8. natcasesort($arr)
# Same as natsort()
# Natural order sorting by ascending order with case sensitive.
# Lowercase first then uppercase.

9. array_multisort($arr,$arr2);
# Sort multiple array at a time.
# Both array length should be same. Otherwise it will return an error.

10. array_reverse($arr)
# Return a new array with reversing the values first to last and last to first.

11. uasort($arr,'function')
# Sort the values by ascending order in existing array by a user defined function.

12. uksort($arr,'function')
# Sort the keys by ascending order in existing array by a user defined function.

13. usort($arr,'function')
# Sort the array by ascending order by a user defined function.
```
<a name="array-traversing"></a>

## Array Traversing

```php
1. current($arr)
2. pos($arr)
# Return the current value of array.
# At the beginning current position/value is first value.

3. key($arr)
# Return the current position key/index of array.

4. next($arr)
# Pointer will move to next position.

5. prev($arr)
# Pointer will move to previous position.

6. end($arr)
# Pointer will move to last position.

7. reset($arr)
# Pointer will move to first position.

8. each($arr)
# Return a new array with the current position key and value.
```
## Other Array Methods

<a name="array-values"></a>

```php
array_values($arr); 
# Return a new array with only values of existing array.
```
<a name="array-unique"></a>

```php
array_unique($arr); 
# Return a new array with only unique value of existing array.
# Remove the duplicate values.
```
<a name="array-column"></a>

```php
array_column($arr, 'key_name', 'index no by key name')
# Returns a new array with the values from a single column by key name.
# 3rd parameter index no is to set index num by any id or serial no.
```
<a name="array-chunk"></a>

```php
array_chunk($arr, size - 2, preserve value - true); 
# Return a new array with paired value of existing array.
# Size means how many values you want to make pair like 2/3/4.
# Preserved value will return the existing kew as well.
```

<a name="array-flip"></a>

```php
array_flip($arr)
# Return a new array with exchanging/flip the value to key and key to value.
```
<a name="array-sum"></a>

```php
array_sum($arr)
# Return a sum of all values of existing array.
# It works only with integer or float values.
```
<a name="array-product"></a>

```php
array_product($arr)
# Return a result of multiplication of all values  of existing array.like(30*20*40*4.5)
# It works only with integer or float values.
```

<a name="array-rand"></a>

```php
array_rand($arr, length - 1/2/3)
# Return random key/index number form existing array.
# 2nd Parameter(optional) Length is for how many value you want to pick.
```

<a name="array-shuffle"></a>

```php
shuffle($arr)
# Shuffle the values Randomly and remove the key.
# It doesn't return a new array. Change the existing array.
```
<a name="array-fill"></a>

```php
array_fill(index no, length, value)
# Return a new array with a fixed value to all index.
# 1st parameter from where index number will start
# 2nd parameter how many index to be filled. array length.
```

<a name="array-walk"></a>

```php
array_walk($arr, 'function', 'function-parameter');
# Run a function for each value.
# The function will get automatically 2 parameter
# 1st one is value & 2nd one is key.
# 3rd parameter(optional) will be your defined parameter.

array_walk_recursive($arr, 'function', 'function-parameter');
# Same as array_walk(). 
# Difference is this will work with multidimensional associative array.
```

<a name="array-map"></a>

```php
array_map('function', $arr, $arr2, $arr3);
# Run a function for each value and return a new array.
```
<a name="array-reduce"></a>

```php
array_reduce('function', $arr);
# Run a function for each value and return a string.
```
<a name="list"></a>

```php
$arr = [2,3,4]
list($a, $b, $c) = $arr;
Return $a = 2; $b = 3; $c = 4

# Return values of existing array and assign to individual variables.
# Only work with index array or associative array with numeric key
```
<a name="extract"></a>

```php
$arr = ['a' => 10, 'b' => 20, 'c' => 30]
extract($arr)
return $a = 10, $b = 20, $c = 30;
# Convert every key to variable and assign value as value

extract($arr, EXRT_OVERWRITE) -> overwrite global variable.
extract($arr, EXRT_SKIP) -> skip key name as variable
extract($arr, EXRT_PREFIX_SAME,'prefix') -> add a prefix to key name
extract($arr, EXRT_PREFIX_ALL, 'prefix') -> add a prefix to all key
```
<a name="compact"></a>

```php
$a = 10;
$b = 20; 
$c = 30;

$arr = compact('a','b','c');
Return $arr = ['a' => 10, 'b' => 20, 'c' => 30] 
# Convert some variables to a associative array.
```
<a name="range"></a>

```php

$arr = range(0,5);
return $arr = ['0' => 0, '1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5];

$arr = range('a','e')
return $arr = [ '0' => A, '1' => B, '2' => C, '3' => D, '4' => E ]

# Create an array containing a range of elements from beginning to ending number or letter 
```


