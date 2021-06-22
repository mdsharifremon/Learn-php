<?php 

/**
 * First Principle of OOP is DRY. Dry means Don't Repeat Yourself.
 * Four Pilar Of OOP
 * Abstraction : Make your data hide from others.
 * Encapsulation : Hold Things Together under a roof.
 * Inheritance : Extends or Inherit something from one class to another.
 * Polymorphism : One function can provide various result depending on its object and where it is called.
 */

 class Product{
    static $price  = 50;
    public $color = 'red'; 
     function show(){
        echo 'Color is : ' . $this->color . '<br>';
     }
   static function rand(){
         return rand(0,100);
     }
 }
 $book = new Product();
 $book->show();
 echo 'Random Number ' .  $book->rand() . '<br>';
 echo 'Product price ' . Product::$price . '<br>';
 $rand =  Product::rand();
echo $rand . '<br><br>';


// Abstract Class 
echo 'Abstract Class: ' . '<br>';
abstract class Name{
   abstract protected function prefix($name);
}
class Prefix extends Name{

   public function prefix($name){
      if($name == 'sharif'){
         $prefix = 'Mr.';
      }else if($name == 'sharifa'){
         $prefix = 'Mrs.';
      }else{
         $prefix = '';
      }
      return "{$prefix} {$name}";
   }
}

$sharif = new Prefix();
$name = $sharif->prefix('sharifa');
echo $name . '<br><br>';

echo 'Constant : <br>'; 
// Constants in OOP
class Person {
  const hello = 'Hello everyone';
  function sayHi(){
      echo self::hello;
  }
}
$man = new Person();
echo Person::hello;
echo '<br>';
$man->sayHi();
echo '<br><br>';

echo 'Interface : <br>';

interface Call{
   function name();
}
interface MakeSound{
   function sound();
}
interface Eat{
   function eat();
}



class Animal implements Call, MakeSound, Eat{
   public $name;
   public $sound;
   public $eat;
   function __construct($name = 'name', $sound = 'sound', $eat = 'rice'){
      $this->name = $name;   
      $this->sound = $sound;
      $this->eat = $eat;
   }

   public function name(){
         echo 'Name : ' . $this->name . ', ';
   }
   public function sound(){
      echo 'Sound : ' . $this->sound . ', ';
   }
   public function eat(){
      echo 'Eat : ' . $this->eat . '<br>';
   }
}
$dog = new Animal('Dog','Bark','Bone'); 
$cat = new Animal('Cat','Meow', 'Milk'); 
$mouse = new Animal('Mouse','Squeak', 'Rice'); 


$arr = array($dog, $cat, $mouse);
for($i = 0; $i < count($arr); $i++){
   $arr[$i]->name();
   $arr[$i]->sound();
   $arr[$i]->eat();
}

echo '<br><br>';

echo 'Static: <br>';


class Myclass {
   public static $name = 'sharif';
   public static $age = 25;

   static function sayHi(){
     echo static::$name . '<br>';
     echo self::$age . '<br>';
   }
}

class abc extends Myclass {
   static $name = 'remon';
   static $age = 27;

}

$one = new abc();
$one->sayHi();






?>

