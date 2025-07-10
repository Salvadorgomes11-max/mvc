
    <?php

    require 'vendor/autoload.php';
    require 'vendor/altorouter/altorouter/AltoRouter.php';

    $router = new AltoRouter();
    $router->setBasePath('/mangatheque');

    $router->map('GET', '/', 'ControllerPage#homePage', 'homepage');

    //deletar
    $router->map('GET', '/user/delete/[i:id]', 'ControllerUser#deleteUserById', 'userDelete');

    //update
    $router->map('GET', '/user/update/[i:id]', 'ControllerUser#updateUserById', 'userUpdate');
    $router->map('POST', '/user/update/[i:id]', 'ControllerUser#saveUpdateUserById', 'userSaveUpdate');

    
    // user
    $router->map('GET', '/user/[i:id]', 'ControllerUser#oneUserById', 'userPage');

    


    $match = $router->match();
    
    
    if(is_array($match)) {
        list($controller, $action) = explode("#", $match['target']);
        $obj = new $controller();

       if(is_callable(array($obj, $action))) {
        call_user_func_array(array($obj, $action), $match['params']);
       }

    } else {
        http_response_code(404);
    }
