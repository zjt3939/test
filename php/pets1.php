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
       /* class Pet{
            public $name;
            function __construct($pet_name){

                $this->name = $pet_name;
            }
            function eat(){
                echo "<p>$this->name is eating</p>";
            }

            function sleep(){
                echo "<p>$this->name is sleeping</p>";
            }

        } 

        class Cat extends Pet{
            function __construct(){
                parent:__construct();
            }

            function climb(){
                echo "<p>$this->name is climbing</p>";
            }
        }

        class Dog extends Pet{
            function fetch(){
                echo "<p>$this->name is fetching</p>";
            }
        }

        $dog = new Dog('weli');
        $cat = new Cat('mimi');

        $dog->eat();
        $dog->sleep();
        $dog->fetch();

        $cat->eat();
        $cat->sleep();
        $cat->climb();*/

        class SomeClass{
            function scream($count=1){
                for($i=0;$i<$count;$i++ ){
                    echo 'Eekk<br>';
                }
            }
        }
        class SubClass extends SomeClass{
            function scream($count=1){
                for($i=0;$i<$count;$i++){
                    echo "TTT<br>";
                }
            }
        }

        $obj = new SomeClass();
        $obj->scream();
        $obj->scream(2);
        
        $obj1 = new SubClass();
        $obj1->scream();
        $obj1->scream(4);

    ?>
</body>
</html>