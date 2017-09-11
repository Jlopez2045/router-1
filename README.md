# router
simple light PHP router  

Add your routes in 'routes.php'

routes.php must have $router->listen() at the end of it

quick start
```PHP
include 'Router.php';  
$router = new Router;

$router->route('/routename', function() {
    echo 'WOW!';
});
  
```
