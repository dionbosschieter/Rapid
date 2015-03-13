Rapid
=========

This is a super simple MVC FrameWork, i build it and use it for rapid prototyping projects.

It has a router,library,model,view,controller and templates using only php. 

Bootstrap 3 and jquery 1.x are included. So is fontawesome, but that is linked to cdnjs.

Using the router
================
```php
$route = Route::getInstance();

$route->add('/', 'index', array("default" => "index",));
$route->add('/test/:hash', 'index', array("specialvalue" => 1, "default" => "test",));

if ($route->submit() == false) {
  $route->error();
}
```

Using the DB Wrapper
===================
```php
$dbh = DB::getInstance()->getDB();
$bookcode = $this->_model->parameters["bookcode"];

//check if thing bookcode exists
$sth = $dbh->prepare("SELECT * from Thingy WHERE Code = :code");
$sth->bindParam(":code", $bookcode);
$sth->execute();
$result = $sth->fetch(PDO::FETCH_OBJ);
```

