## Object Oriented Programming

The basic and first principle of oop is DRY.<br> 
D = Don't 
R = Repeat
Y = Yourself

### Basics Concepts of OOP :
__Abstraction__ : Hide your data from others.

__Encapsulation__ : Holding things together under a roof.

__Inheritance__ : Inherit or extends some something from one class to another class in Inheritance.

__Polymorphism__ : One function return various result depends on its object and where it is called.

__Static__: static keyword is used to define a property or a method static. A static method or property is Associated with class not with the instance or object. It can not provide value of this. And Static method or property can ber accessed from outside of a class without creating a instance or object.<br>
 When a static method or property is called inside of its class  use self::<br>
 When a static method or property is called from its derived class use parent::<br> 
 When a static method or property is need to be override use static::<br>

### Common Concepts & keywords of OOP: 

    * Instance
    * Interface - interface & implements
    * Trait - trait, use, insteadof, as, ::
    * Namespace - name\className, as
    * Method or Property overriding.
    * Type Hinting 


<details>
    <summary><b>Magic Methods</b></summary>

 __Constructor__ : __construct () this function is called by itself automatically. It may have args.

__Destructor__ : __destruct () this function will automatically called after all the work has been done in a object.

__Autoload__ : spl_autoload_register() this method is used to call a class. that is imported from other file.

__Get__ : __get() method is called to get a private property outside of class.

__Set__ : __set() method is called to set a private property value from outside of a class.

__Call__ : __call() method is called to call the any private method outside of a class.

__CallStatic__ : __callStatic() method is called to call any private static method or property outside of a class.

__Isset__ : __isset() method is called to check any private property is set or not. This is automatically called when isset() or empty() function is called outside or a class.

__Unset__ : __unset method is used to unset the value of any private property. It is called when unset() function is called.

__ToString__ : __toString() method is used to print any object as a string data.

__Sleep__ : __sleep() method is called to serialize data. It is called when serialize() function is called.it return a array. Convert an object into array.

__WakeUp__ : __wakeUP() method is called to unserialize data. It is called when unserialize() function is called.
Return a object. Convert array to object.

__Clone__ : To clone a object properly with its sub property __clone method is automatically called when clone is called.

__Invoke__ : When a object is called by the name of function like obj() - that will show a fatal error. To show a proper error message __invoke__ is automatically called. 
</details>

<details>
    <summary><b>Access Modifier</b></summary>

__Public__ : open to all.

__Protected__ : Open only to its subclass.

__Private__ : Close to all.

__Static__ : Open to all without creating object.<br>
         <b>::, self::, parent::, static::</b><br>
         these keywords and operator are used to call static properties or methods.
</details>

<details>
    <summary><b>Magic Constants</b></summary>
    __LINE<br>
    __FILE<br>
    __DIR<br>
    __FUNCTION<br>
    __CLASS<br>
    __METHOD<br>
    __TRAIT<br>
    __NAMESPACE
</details>

<details>
    <summary><b>Conditional Functions</b></summary>
    class_exists()<br>
    interface_exists()<br>
    trait_exists()<br>
    property_exists()<br>
    method_exists()<br>
    is_a() - Used to check object of which class<br>
    is_subclass_of() - Used to check this class extends which class<br>
</details>

<details>
    <summary><b> bGet Functions</b></summary>
    get_class()<br>
    get_parent_class()<br>
    get_class_methods()<br>
    get_bars()<br>
    get_object_bars()<br>
    get_called_class()<br>
    get_declared_classes()<br>
    get_declared_interfaces()<br>
    get_declared_traits()<br>
    class_alias();
</details>



