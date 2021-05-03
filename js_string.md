# JavaScript String Method

## #Search String In Long String
```javascript
        var str = "this is my goal";
        var index = str.indexOf('is');
        var index = srt.lastIndexOf('is');
        var index = str.search('is');
        /* Return the index of is. Normally it start searching from start (index of 0).
        But lastIndexOf() function will start searching from the last index number. */

        var index = str.indexOf('is', 5);
        var index = str.lastIndexOf('is', 5);
        var index = str.search('is')
        /* Second parameter is from where start searching. search() function does not support second parameter.*/
       
```

