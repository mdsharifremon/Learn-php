# PHP Array CheatSheet

## Table Of Content

* [Array Count](#array-count)
* [Array Search](#array-search)
* [Array Replace](#array-replace)
* [Array Add & Delete](#array-add_delete)
* [Array Merge & Combine](#array-merge)
* [Array Search](#array-search)


<a name="array-count"></a>
## Array Count

```php
1. sizeof()
2. count()
3. array_count_values()

sizeof($array_variable, 1);
count($array_variable, 1);

/* It return the total value of an array in numeric number.
The second parameter is to show the value of multidimensional array.*/

array_count_values($array_variable);
/* It return a complete new array with value. it can not be printed with echo.
It can be printed with print_r() function.*/
```

<a name="array-search"></a>
## Array Search

```php
1. in_array()
2. array_search()

in_array('search term', $array_variable, strict_mod(true/false));

/* It return true or false. like 0 or 1.
You can search a full array with this function when
your existing array is a multidimensional array.
Usually it is used with condition.*/

array_search('search term', $array_variable);

/* It will return the index or key of existing array. */
```
<a name="array-replace"></a>

## Array Replace
```php
1. array_replace()
2. array_replace_recursive()

1. array_replace($first_array, $second_variable);
 /* It will replace the first array with second array. 
If there is third or fourth array that will replace the previous array
It will return a new array.*/

2. array_replace_recursive($first_array, $second_array);
/* It is used with multidimensional associative array.*/
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
/* Last value will be deleted. It will not return new array.
It will delete last value of existing array. */
       
array_shift($a) is same like array_pop($a);
// Only Difference is array_shift() will delete the first value.

If you store it in a new variable $b = array_pop($a);
It wll return $b = array('three');
// Only the last value.

array_push($a, 'four', 'five', 'six');
It will return $a = array('one', 'two', 'three', 'four', 'five', 'six');

// It will add new values at last of existing array. It will not create a new array.

array_unshift($a) is same like array_push($a);
// Only Difference is array_unshift() will add new values in first.
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
it will return $c = array('one', 'two', 'three', 'three', 'four', 'five','five', 'six', 'seven')

/* It will return a new array and merge two/ three array in a new array.
When it associative array it will replace the value where kew is same. */

$c = $a + $b works same as array_merge();
Difference is  in $a + $b first value will exist, next will be deleted.(if key match).

array_merge_recursive($a, $b)

is same like array_merge($a, $b);
Difference is if kew match it will not replace.
It will create a new associative array inside the array.
It is used with multidimensional associative array.

$f = array_combine($a, $e);
it will return $f = array('one' => 1, 'two' => 2, 'three' => 3);
It is used only with index array. 
It return one array into key and another array into its value.

Note: Both arrays index should be same.
If one array have 5 value, another one should have 5 value.
```
