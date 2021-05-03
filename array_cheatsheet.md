# PHP Array CheatSheet

## Array Count 
```php
        sizeof($array_variable, 1);
        count($array_variable, 1);

        /* It return the total value of an array in numaric number.
        The second perametar is to show the value of multidimentional array.*/
```
       
```php
        array_count_values($array_variable);

        /* It return a complete new array with value. it can not be printed with echo.
        It can be printed with print_r() function.*/
```

## Array Search

```php
    in_array('search term', $array_variable, strict_mod(true/false));

    /* It return true or false. like 0 or 1.
    You can search a full array with this function when 
    your existing array is a multidimentional array.
    Useally it is used with condition.*/

    array_search('search term', $array_variable);

    /* It will return the index or key of existing array. */
    
```
