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
        class Department{
            private $_name;
            private $_employees;

            function __construct($name){
                $this->_name = $name;
                $this->_employees = [];
            }

            //限制类型 为Employee类或子类
            function addEmployee(Employee $e){
                $this->_employee = $e;
                echo "<p>{$e->getName()} has been added to the {$this->_name} department.</p>";
            }
        }

        Class Employee{
            private $_name;
            function __construct($name){
                $this->_name = $name;
            }
            function getName(){
                return $this->_name;
            }
        }

        //create a department;
        $hr =new Department('HUnmen');
        //create a employee
        $e1 = new Employee('John Doo');
        $e2 = new Employee('John Doo');

        $hr->addEmployee($e1);
        $hr->addEmployee($e2);
    ?>
</body>
</html>