# Custom PHP MVC Framework

## Introduction

```
Welcome to the custom PHP MVC framework! MARAVEL!  This lightweight framework provides a clean and organized structure for building web applications. It's inspired by popular frameworks like Laravel, but with a simpler core that's easy to understand and extend.
```

## Table of Contents

- [Getting Started](#getting-started)
  - [Installation](#installation)
  - [Folder Structure](#folder-structure)
  - [Configuration](#configuration)
- [Routing](#routing)
  - [Defining Routes](#defining-routes)
  - [Supported HTTP Methods](#supported-http-methods)
  - [Route Parameters](#route-parameters)
  - [Handling 404 Errors](#handling-404-errors)
- [Controllers](#controllers)
  - [Creating Controllers](#creating-controllers)
  - [Using Traits](#using-traits)
  - [Rendering Views](#rendering-views)
- [Views](#views)
  - [Creating Views](#creating-views)
  - [Passing Data to Views](#passing-data-to-views)
- [Models](#models)
  - [Creating Models](#creating-models)
  - [Database Interaction](#database-interaction)
- [Autoloading and Initialization](#autoloading-and-initialization)
- [Error Handling](#error-handling)
- [Deployment](#deployment)
- [FAQ](#faq)
- [Contributing](#contributing)

## Getting Started

### Installation

1. Clone the repository or download the source code.
2. Place the framework files in your server's document root (e.g., `htdocs` for XAMPP).
3. Ensure that your server is running PHP 7.4 or higher.

### Folder Structure

The framework uses the following structured folder layout:
```
+app
|-controllers/
|-core/
|-models/
|-views/
+public/
|-assets/
|-.htaccess
|-index.php
+routes/
|-routes.php
```

### Configuration

- **config.php**: Located in `app/core/`, this file contains essential settings like database credentials and base URLs.
- **init.php**: Handles class autoloading and includes necessary core files.

## Routing

```php
Router::get('/home', 'Home@index');

## Defining Routes

Define routes in `routes/routes.php`:
```

```php
Router::get('/home', 'Home@index');
Router::post('/form-submit', 'Form@submit');
Router::put('/update/{id}', 'Resource@update');
Router::delete('/delete/{id}', 'Resource@delete');

class Home
{
    use Controllers;

    public function index()
    {
        $this->views('home');
    }
}
```
```
Supported HTTP Methods
The framework supports the following methods:

GET
POST
PUT
DELETE
PATCH
```
```
Handling 404 Errors
The framework automatically dispatches the _404 controller's index method for unmatched routes.
```
```
Controllers
Creating Controllers
Create controllers in app/controllers/. Example:
class Home
{
    use Controllers;

    public function index()
    {
        $this->views('home');
    }
}
```
```
Using Traits
Use traits like Controllers to share methods between controllers.
```
```
Rendering Views
Render views from a controller:
$this->views('view-name', ['data' => $data]);
```
```
Views
Creating Views
Views are simple PHP files in app/views/. 
Example:
<h1>Welcome to the Home Page</h1>
```
```
Passing Data to Views
Pass data from the controller to the view:
$this->views('home', ['title' => 'Home Page']);

In the view:
<h1><?= $title ?></h1>
```
```
Models
Creating Models
Create models in app/models/. Use them to interact with the database.
```
```
Database Interaction
Extend the custom Database class for database operations.
```
```
Autoloading and Initialization
Autoloading
The init.php file handles autoloading for models and includes core files. It’s included at the start of your application in index.php.
```
```
Initialization
Initialize your application in index.php:

require '../app/core/init.php';

$router = new Router();
$url = $_GET['url'] ?? '/';
$requestMethod = $_SERVER['REQUEST_METHOD'];

$router->dispatch($url, $requestMethod);
```
```
Error Handling
The framework includes basic error handling. Customize it by editing the _404 controller.

```
Deployment
To deploy:

Upload the framework to your server.
Configure .htaccess for your environment.
Update config.php with production settings.
FAQ
Q: How do I add a new route?
A: Add the route to routes/routes.php using Router::get(), Router::post(), etc.

Q: How do I handle form submissions?
A: Define a POST route in routes.php, and create a method in the controller to process the form.
```
```
Contributing
To contribute:

## Fork the repository.
## Create a new branch (feature/your-feature).
## Commit your changes.
## Push to the branch.
## pen a Pull Request.
```









