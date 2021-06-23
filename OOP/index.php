<?php 

/**
 * First Principle of OOP is DRY. Dry means Don't Repeat Yourself.
 * Four Pilar Of OOP
 * Abstraction : Make your data hide from others.
 * Encapsulation : Hold Things Together under a roof.
 * Inheritance : Extends or Inherit something from one class to another.
 * Constructor : __construct () this function is called by itself automatically. It may have args.
 * Destructor : __destruct () this function is used to destroy a object. It will run end of the script.
 */

// class Vehicle{
//    public $color = 'red';
//    public $weight = 200;

//    function __construct($color, $weight){
//       $this->color = $color;
//       $this->weight = $weight;
//    }

//    function show(){
//      return $this->color . ' ' . $this->weight . '<br>';
//    }

//    function __destruct(){
//       echo 'I am destroying';
//    }
// }
//  $car = new Vehicle(color:'yellow', weight: 500);
//  $info = $car->show();
// echo $info;
// echo $car->show();

/**
 * Static : static keyword is used to define a property or a method static. A static method or property is 
 * Associated with class not with the instance or object. It can not provide value of this. And Static  
 * method or property can ber accessed from outside of a class without creating a instance or object.
 * When a static method or property is called inside of its class  use self::
 * When a static method or property is called from its derived class use parent::
 * When a static method or property is need to be override use static::
 */

//  class Vehicle{
//     public static $color = 'red';
//     public $weight = 200;

//    function __construct($color){
//          self::$color = 'blue';
//    }
//    static function show(){
//       echo 'This is a static method';
//    }
//  }

//  echo Vehicle::$color;
//  Vehicle::show();

// class Counter{
//    public static $number = 0;
//    public $number1 = 0;

//    function __construct(){
//       self::$number++;
//       $this->number1++;
//    }
// }

// Example below shows us static number is increasing but normal number is not. so static is not associated with instance or object but class.
// $num = new Counter();
// echo 'Static : ' . Counter::$number . ' Normal: ' . $num->number1 . '<br>';
// $num1 = new Counter();
// echo 'Static : ' . Counter::$number . ' Normal: ' . $num1->number1 . PHP_EOL;

// echo '<br><br>';
// echo 'Trait <br>';
/**
 * Traits are a specific class or multiple classes that can be used in a class or multiple classes.
 * Use the keyword trait to define a 'trait' class
 * When you need to use it in a class write 'use' keyword to use the trait.
 */

// trait hello{ // Define a trait class
//    public function sayHello(){
//          echo 'Hello Everyone <br>';
//    }
// }
// trait bye{ // Define another trait class
//    public function sayBye(){
//       echo 'Bye bye everyone <br>';
//    }
// }
// class two {
//    use hello,bye; // use the multiple trait in a class
// }
// $sayHello = new two();
// $sayHello->sayHello();
// $sayHello->sayBye();
 
// echo '<br><br>';
// echo 'Trait Overriding <br>';
// /**
//  * Trait Overriding Rule
//  * Rule 1: Override a function base on priority. Objects it own function is priority 1.
//  * Then trait will get priority. Then extended class or base class will get priority.
//  * If two trait is used in a class and have a same function in both trait.
//  * You have to specify which one you want to use.
//  * If you want to use both of these function you have to change name of any one function.
//  */

//  trait Greet {
//     function sayHi(){
//        echo 'Hello! dear. I am from greet trait <br>';
//     }
//  }

//  trait Farewell{
//    private function sayHi(){
//        echo 'Hello! dear. I am from farewell trait. <br>';
//     }
//  }

//  class newClass{
//     public function sayHi(){
//        echo 'Hello! dear. I am from class .<br>';
//     }
//  }

//  class Pactrical extends newClass{
//     use Greet; // Trait greet has second priority
//    //  function sayHi(){   // It has the first priority
//    //     echo 'Hello! dear. I am from its own base'; 
//    //  }
//  }
//  $test = new Pactrical();
//  $test->sayHi();

//  class NewTest{
//     use Greet,Farewell{
//       Greet::sayHi insteadOf Farewell; // Use the sayHi function from Greet trait.
//       Farewell::sayHi as public newSayHi; // function name from Farewell trait  has been changed.
//     }
//  }

//  $myTest = new NewTest();
//  $myTest->sayHi();
//  $myTest->newSayHi();

/** 
* Abstraction in php: one method must be abstract function
* Can not create an object with abstract class
* abstract methods must be redeclare
*/


/**
 * Interface : 
*/


//  interface Myinterface{
//  }
//  abstract class HiClass implements Myinterface{
//  }
//  class myClass extends HiClass{
//  }
//  $NewClass = new myClass();


/**
 * Type Hinting
 */

//  class SayHi{
//      public function Hi(){
//          echo 'Hi Everyone <br>';
//      }
//  }
//  class SayBye{
//      public function Bye(){
//          echo 'Bye bye everyone <br>';
//      }
//  }

//  function show(SayHi $arg){
//      $arg->Hi();
//  }
//  $one = new SayHi();
// show($one);

/**
 * Namespace : Namespace is used to define class from which file i want to use.
 */
// require "test.php";
// require 'one.php';

// $myObj = new one\product();
// $myObj1 = new test\product();


/**
 * Method Chaining
 */

 class Car{
     function __construct(){}

     function volvo(){
         echo "This is volvo<br>";
         return $this;
     }
     function marcedes(){
         echo "this is marcedes <br>";
         return $this;
     }
     function bmw(){
         echo "This is bmw<br>";
     }
 }

 $car = new Car();
 $car->volvo()->marcedes()->bmw();



?>

