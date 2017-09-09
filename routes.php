<?php
include 'Router.php';

$router = new Router;

// Route name declaration can be optionally prefixed by a slash
// both '/name' or 'name' would work
$router->route('/',function () {
    echo 'index page';
});

$router->route('/test',function () {
    echo 'test page';
});


// DO NOT REMOVE
// required for the router to run
$router->listen();
?>
