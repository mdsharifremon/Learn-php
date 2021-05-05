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

[1]: <#array-count> "1. sizeof()  2. count()   3.array_count_values()"

[2]: <#array-search> "1. in_array()  2. array_search()"

[3]: <#array-replace> "1. array_replace()   2. array_replace_recursive()"

[4]: <#array-add_delete> "1. array_pop()  2. array_shift()  3. array_push()  4. array_unshift()"

[5]: <#array-merge> "1. array_merge()  2. array_merge_recursive()  3. array_combine()"

[6]: <#array-slice> "1. array_slice()  2. array_splice()"

[7]: <#array-key> "1.array_keys()  2. array_key_first()  3. array_key_last()  4. array_key_exists()/ key_exists()  5.array_intersect_key()  6.array_diff_key()"

[8]: <#array-intersect> "1. array_intersect()  2. array_uintersect()  3. array_intersect_key()  4. array_intersect_ukey()  5. array_intersect_assoc()  6. array_intersect_uassoc()  7. array_uintersect_assoc()  8. array_uintersect_uassoc();"

[9]: <#array-diff> "1. array_diff()  2. array_udiff()  3. array_diff_key()  4. array_diff_ukey()  5. array_diff_assoc()  6. array_diff_uassoc()  7. array_udiff_assoc()  8. array_udiff_uassoc()"

## Other Array Methods

* [Array_Values()](#array-values)
* [Array_Unique()](#array-unique)
* [Array_Column()](#array-column)
* [Array_Chunk()](#array-chunk)



<a name="array-count"></a>
## Array Length

```php
1. sizeof()
2. count()
3. array_count_values()

sizeof($array_variable, 1);
count($array_variable, 1);

# It return the total value of an array in numeric number.
# The second parameter is to show the value of multidimensional array.

array_count_values($array_variable);
# It return a complete new array with value.
```

<a name="array-search"></a>
## Array Search

```php
1. in_array()
2. array_search()

in_array('search term', $array_variable, strict_mod(true/false));

# Return true or false. like 0 or 1.
# You can search a full array with this function when
# your existing array is a multidimensional array.
# Usually it is used with condition.*/

array_search('search term', $array_variable);

# It will return the index or key of existing array.
```
<a name="array-replace"></a>

## Array Replace
```php
1. array_replace()
2. array_replace_recursive()

1. array_replace($first_array, $second_variable);
# Replace the first array with second array. 
# If there is third or fourth array that will replace the previous array & return a new array.

2. array_replace_recursive($first_array, $second_array);
# It is used with multidimensional associative array.
```
<a name="array-add_delete"></a>

## Array Value Add/Delete

```php
1. array_pop()
2. array_shift()
3. array_push()
4. array_unshift()

$a = array('one', 'two', 'three');
array_pop($a);
It will return $a = array('one', 'two')
# Last value will be deleted. It will not return new array & delete last value of existing array.
       
array_shift($a) is same like array_pop($a);
# Only Difference is array_shift() will delete the first value.

If you store it in a new variable $b = array_pop($a);
It wll return $b = array('three');
# Only the last value.

array_push($a, 'four', 'five', 'six');
Return $a = array('one', 'two', 'three', 'four', 'five', 'six');
# Add new values at last of existing array. It will not create a new array.

array_unshift($a) is same like array_push($a);
# Only Difference is array_unshift() will add new values in first.
```
<a name="array-merge"></a>

## Array Merge/ Combine

```php
1. array_merge()
2. array_merge_recursive()
3. array_combine()

$a = array('one', 'two', 'three');
$b = array('three', 'four', 'five');
$d = array('five', 'six', 'seven');
$e = array( 1,2,3);

$c = array_merge($a, $b, $d);
Return $c = array('one', 'two', 'three', 'three', 'four', 'five','five', 'six', 'seven')

# Return a new array and merge two/ three array in a new array.
# When it is associative array it will replace the value where kew is same. 

$c = $a + $b works same as array_merge();
# Difference is  in $a + $b first value will exist, next will be deleted.(if key match).

array_merge_recursive($a, $b)
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
1. array_slice()
2. array_splice();

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
1. array_keys()
2. array_key_first()
3. array_key_last()
4. array_key_exists() / key_exists()
5. array_intersect_key()
6. array_diff_key()

array_keys($arr,'keyname', strict);
# Return a new array with key name.

array_key_first($arr)
# Return the first key of existing array.

array_key_last($arr)
# Return the last key of existing array.

array_key_exists('keyname', $arr, ) / key_exists('keyname', $arr);
# Return true or false upon the key existence. array.

array_intersect_key($arr, $arr2, $arr3)
# Return a new array with the matched key in array one.

array_diff_key($arr, $arr2, $arr3)
# Return a new array with the unmatched/difference key in array one.
```
<a name="array-intersect"></a>
## Array Match or Intersect

```php
1. array_intersect()
2. array_uintersect()
3. array_intersect_key()
4. array_intersect_ukey()
5. array_intersect_assoc()
6. array_intersect_uassoc()
7. array_uintersect_assoc()
8. array_uintersect_uassoc();


Note: array_intersect() all of this kind of functions will return a new array with matched key & value.

array_intersect($arr, $arr2);
# Match only values in different arrays.

array_uintersect($arr, $arr2, 'compare function');
# Match only values with user defined compare function. 

array_intersect_key($arr, $arr2);
# Match only keys in different arrays.

array_intersect_ukey($arr, $arr2, 'compare function');
# Match only keys with user defined compare function. 

array_intersect_assoc($arr, $arr2);
# Match keys & values in different arrays.

array_intersect_uassoc($arr, $arr2, 'compare function'); 
array_uintersect_assoc($arr, $arr2, 'compare function');
# these two are same. it will match keys and values with user defined compare function.

array_uintersect_uassoc($arr, $arr2,'key Compare Function', 'value Compare Function');
# Match keys and values with user defined two individual key & value compare function.
```
<a name="array-diff"></a>

## Array Difference
```php
1. array_diff();
2. array_udiff();
3. array_diff_key();
4. array_diff_ukey();
5. array_diff_assoc();
6. array_diff_uassoc();
7. array_udiff_assoc();
8. array_udiff_uassoc();

array_diff($arr, $arr2);
/* Compare difference only values among 
arrays and return a new array with unmatched values. */

array_udiff($arr, $arr2, 'compare function');
/* Compare difference only values with 
user defined function among arrays and return 
a new array with unmatched values. */ 

array_diff_key($arr, $arr2);
/* Compare difference only keys among 
arrays and return a new array with unmatched keys.*/

array_diff_ukey($arr, $arr2, 'compare function');
/* Compare difference only keys with 
user defined function among arrays and return a new array with unmatched keys. */

array_diff_assoc($arr, $arr2);
/* Compare difference keys & values among
arrays and return a new array with unmatched keys and values. */

array_diff_uassoc($arr, $arr2, 'compare function'); 
array_udiff_assoc($arr, $arr2, 'compare function');
/* these two are same. It will compare difference keys & values with 
user defined function among arrays and return 
a new array with unmatched keys & values. */

array_udiff_uassoc($arr, $arr2, 'keyCompareFunction', 'valueCompareFunction');

/* Compare difference keys & values with 
2 user defined individual key & value function among
arrays and return a new array with unmatched keys & values. */
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

