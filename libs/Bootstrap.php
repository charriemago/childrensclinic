
<?php

class Bootstrap {

    function __construct() {
        //start session
        Session::init();

        $link = isset($_GET['url']) ? $_GET['url'] : null;

        $arrayLink = explode('/', trim($link, '/'));

        $class = strtolower(isset($arrayLink[0]) && $arrayLink[0] != ''  ? $arrayLink[0] : 'index');

        $function = isset($arrayLink[1]) ? $arrayLink[1] : 'index';
        
        $file = isset($arrayLink[2]) ? $arrayLink[2] : 'index';

		// if(Session::getSession('user') == '' && $class != 'user')
		// {
		// 	$function = $class;
		// 	$class = 'home';
		// }
           
		
        $path = 'controllers/' . $class . '.php';
		
        if (file_exists($path)) {
            require $path;
            if (class_exists($class)) {
                $mainClass = new $class();

                $mainClass->loadModel($class);
                if (method_exists($class, $function)) {
                    if (isset($arrayLink[2])) {
                        $mainClass->{$function}($arrayLink[2]);
                    } else {
                        $mainClass->{$function}('');
                    }
                } else {
                    $this->error();
                }
            } else {
                $this->error();
            }
        } else {
            $this->error();
        }
    }

    function error() {
        $views = new Views();
        $views->msg = 'An error occur!</br>Page not Found!';
        $views->render('views/error/index.php',true);
        exit;
    }

}