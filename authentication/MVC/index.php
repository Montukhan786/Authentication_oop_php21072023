<?php

    $controller = 'home';
    $function = 'home';

    if(isset($_GET['controller']) && $_GET['controller']!=''){
        $controller = $_GET['controller'];
    }

    if(isset($_GET['function']) && $_GET['function']!=''){  
        $function = $_GET['function'];
    }

    if(file_exists('controller/'.$controller.'.php')){
        include('controller/'.$controller.'.php');

        $class = $controller.'Controller';

        $obj = new $class();

        if(method_exists($class,$function)){
            $obj->$function();
            // echo "12p";
        }
        else{
            echo "Function not found";
        }

    }
    else{
        echo "Controller not found";
    }


    

    
    // echo $output;
?>