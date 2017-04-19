<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        class Pet{
            protected $name;
            private static $_count = 0;

            function __construct($pet_name){
                $this->name = $pet_name;
                self::$_count++;
            }

            function __destruct(){
                self::$_count--;
            }

            public static function getCount(){
                return self::$_count;
            }

        }
        //Cat继承Pet
        class Cat extends Pet{

        }
        class Dog extends Pet{

        }
        class Ferret extends Pet{

        }
        class FFF extends Pet{

        }

        $dog = new Dog('IDog');
        echo '<p>After creating a Dog,I now have'.Pet::getCount().'pets </p>';//After creating a Dog,I now have1pets

        $cat = new Cat('ICat');
        echo '<p>After creating a cat,I now have'.Pet::getCount().'pets</p>';//After creating a Dog,I now have2pets

        $ferret = new Ferret('IFerret');
        echo '<p>After creating a ferret,I now have'.Pet::getCount().' pets</p>';//After creating a Dog,I now have3pets

        unset($dog);
        echo '<p>After trgedy strikes,I now have'.Pet::getCount().' pets</p>';//After creating a Dog,I now have2pets
    ?>
</body>
</html>
