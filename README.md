<img src="https://github.com/Claudia1010/Laravel-Project-LFG/blob/main/public/img/geekhubs.png">

# Final Project: Artech E-Commerce

This is the 7th and final  👏  GeeksHubs project. The aim of this personal project is to develop an Art Replicas E-Commerce with the backend built with Laravel and the frontend using React. The website allows to the client to sign in, add to the cart multiple products, increase, remove them and pay for them in a simulated payment platform. The backoffice dashboard will let the admin to add new products to the site, edit and delete them, and also see all the orders submitted by the clients and change the delivery status of them.

## User Guide

### Installation

#### Follow the steps mentioned below to install and run the project.

1. Clone or download the repository
```bash
git clone https://github.com/Claudia1010/e-Commerce.git
```
2. Go to the project directory and run composer install
```bash
composer install
```
3. Create .env file by copying the .env.example. You may use the command to do that cp .env.example .env, but make sure the .env already exists.
```bash
cp .env.example .env
```
4. Update the database name and credentials from the Workbench database, in the .env file

5. Run the command php artisan jwt:secret
```bash
php artisan jwt:secret
```
6. Run the command php artisan migrate
```bash
php artisan migrate
```
7. Run the command php artisan db:seed, to create the seeders in the database.
```bash
php artisan db:seed
```
8. Run php artisan serve from the project root  
```bash
php artisan serve
```


## Database and relationships

As we can see in this screenshot taken from Workbench, the database consists in 9 simple tables connected between

them: users, roles, role_user, orders, payment_method, carrier, order_product, products and categories.

<img src="https://github.com/Claudia1010/e-Commerce/blob/main/public/img/screenshot_ddbb.png">

The relationship between users and roles is "many to many" , so we must create an intermediate table like in this 

case called role_user.

The relationship between users and role_user is "1 to many" (1:n), and the relationship between roles and 

role_user is exactly the same (1:n).

The same kind of relationship has the table users with orders, is "1 to many" (1:n), because one client can create 

many orders but an order can be created for only one client.

Exactly the same happens between orders and payment_method, and orders and carrier, one payment_method and one carrier can have multiple orders 

and a order can have only one carrier type and payment_method, it is again a "1 to many" (1:n).

But relationship between orders and products is "many to many", and the intermediate table is called order_product 

where we will keep the foreigns keys for order_id and product_id.

Then we have another "1 to many" (1:n) table relationship: between categories and products, because one 

category might have multiple products, and one specific product belongs to one category.


## Endpoints

The root for all the endpoints will be:

LOCAL: http://localhost:8000/api

HEROKU: [https://ch-laravel-react-e-commerce.herokuapp.com/api]


Endpoint-function links: The method to enter in Postman is specified, and what we must enter after the root to 

access each of the endpoints:

#### No Token required:

- POST to REGISTER a user: ('/register', [AuthController::class, 'register'])
- POST to LOGIN a user, where the token will be given: ('/register', [AuthController::class, 'login'])
- GET to show all the PRODUCTS: ('/products', [ProductController::class, 'getProducts'])
- GET to show all the CATEGORIES: ('/categories', [CategoryController::class, 'getCategories'])

#### Users:

- GET the user profile: ('/profile', [AuthController::class, 'getProfile'])
- PUT to update the user profile: ('/update', [AuthController::class, 'updateProfile'])
- POST to logout from the session: ('/logout', [AuthController::class, 'logout'])
- DELETE to delete the user profile from the app:('/deleteProfile', [AuthController::class, 'deleteProfile'])

- GET to check all the orders created: ('/getOrders', [OrderController::class, 'getOrders'])
- POST to add a new order: ('/addOrder', [OrderController::class, 'addOrder'])
- DELETE to remove the order created: ('/deleteOrderById/{id}', [OrderController::class, 'deleteOrderById'])

<br/>
<img src="https://github.com/Claudia1010/e-Commerce/blob/main/public/img/screenshot_wkb.jpg">
<br/>
<img src="https://github.com/Claudia1010/e-Commerce/blob/main/public/img/screenshot_postman1.jpg">
<br/>

#### Admins:

- POST to promote a new admin from user role:('/promoteToAdmin/{id}', [UserController::class, 'userToAdmin'])
- POST to promote a new admin from user role:('/degradeToUser/{id}', [UserController::class, 'adminToUser'])
- GET to check all the users registered: ('/getAllUsers', [UserController::class, 'getAllUsers'])

- GET to check all the orders created by the users: ('/getAllOrders', [OrderController::class, 'getAllOrders'])
- PUT to update a the order status from processing to completed: ('/changeOrderStatus/{id}', [OrderController::class, 'changeOrderStatus'])


- POST to create a new category: ('/addCategory', [CategoryController::class, 'addCategory'])
- PUT to update a category: ('/updateCategoryById/{id}', [CategoryController::class, 'updateCategoryById'])
- DELETE to erase a category ('/deleteCategoryById/{id}', [CategoryController::class, 'deleteCategoryById'])

- POST to create a new product: ('/addProduct', [ProductController::class, 'addProduct'])
- PUT to edit a product: ('/updateProductById/{id}', [ProductController::class, 'updateProductById'])
- DELETE to erase a product ('/deleteProductById/{id}', [ProductController::class, 'deleteProductById'])
- GET to select a product to edit: ('/getProductById/{id}', [ProductController::class, 'getProductById'])

<br/>
<img src="https://github.com/Claudia1010/e-Commerce/blob/main/public/img/screenshot_postman.jpg">
<br/>


## Technologies

<code><img width="10%" src="https://www.vectorlogo.zone/logos/heroku/heroku-ar21.svg"></code>
<code><img width="10%" src="https://www.vectorlogo.zone/logos/mysql/mysql-ar21.svg"></code>
<code><img width="10%" src="https://www.vectorlogo.zone/logos/laravel/laravel-ar21.svg"></code>
<code><img width="10%" src="https://www.vectorlogo.zone/logos/php/php-icon.svg"></code>
<code><img width="10%" src="https://www.vectorlogo.zone/logos/getpostman/getpostman-ar21.svg"></code>
<code><img width="10%" src="https://cdn.auth0.com/blog/jwtc/jwt_05.jpg"></code>
<code><img width="10%" src="https://github.com/Claudia1010/teamProjectReact/blob/master/public/img/axios.png"></code>
<code><img width="10%" src="https://github.com/Claudia1010/teamProjectReact/blob/master/public/img/cors.png"></code>
<code><img width="10%" src="https://github.com/Claudia1010/teamProjectReact/blob/master/public/img/doenv.png"></code>