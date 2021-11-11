# U2Test

# Frontend and Backend

## Project setup
```
cd /frontend 
npm install
edit .env.example
set your laravel api route

cd /backend 
composer install
edit .env.example
set .env database name
php artisan jwt:secret       
php artisan migrate --seed
```

### Compiles and hot-reloads for development
```
cd backend/ php artisan serve
cd frontend/ npm run serve
```

### Compiles and minifies for production
```
npm run build
```

### Lints and fixes files
```
npm run lint
```

### English Documentation

This application is divided into 3 simple basic levels.

1. User Layer
2. Business Layer
3. Data Layer

### 1 User Layer

This layer is responsible for showing the end user the graphic content of the application, which is made up of 2 main views.

1. Login

In this tab the user accesses the platform that uses his username and password, in case of not being registered or his credentials are not correct, an alert appears with the error in the case.

In the successful case of the login, the user will be able to access the use of the platform

2 orders

This view is followed by the successful login and is where the user will be able to see an intelligent data table. These data correspond to all e-commerce purchase orders. The smart table can filter, sort, and search data within for ease of use.

The data in this table are as follows:

* address
* customer name
* customer phone
* customer email
* customer identification
* total
* status
* priority
* deadline

The lower side of the table has a search engine for orders by date, once a date has been selected, the system will filter the orders contained in the table without reloading the page.

3. Products of the Order (Modal Inside Orders view)

Continuing in the Orders view, the first field of the table called "Id" corresponds to the unique identifier of each order. By clicking on each of these fields, a pop-up screen will be displayed which shows the products that the selected order contains.

The data in this table are as follows:

* product name
* description
* status
* price
* stock
* total
* bar_code
* supplier name // Hyperlinked to send email to Supplier
* supplier phone // Hyperlinked to call to Supplier`s phone

### 1 Business Layer

The platform is developed under an architecture (Agnostic MVC - API Rest) Model, controller view with the Laravel framework version 8 for the Backend and Vuejs in its version 3.0 for the Frontend.

1. Main functions and relationships.

Users: Users have an email, password and security token to log in and manipulate the platform.

Orders: The system has a controller that is in charge of delivering a list of purchase orders related to all products for each order as well as the supplier of each product. These commands are delivered in JSON format to the frontend, which iterates the data in pivot tables.

Orders by Date: Through the fronted a POST request is sent, which contains a specific date to return the purchase orders filtered by that date. This date works with the format Years, month and day.

This controller can be located in the path:
backend/app/Http/Controllers/OrdersController

### 3 Data Layer

The Database of this platform runs on SQL technology Making use of the laravel ORM to perform queries and data insertions in it.

1. Data Models

Users:

* name
* email
* email_verified_at
* password
* Token
* created_at
* updated_at

Suppliers: 

* name
* email
* address
* phone
* description

Products: 

* name
* description
* status // 'in stock (En Stock)', ' out (Agotato)', 'To Run Out (Cerca de Agotarse)'
* price
* stock
* bar_code
* supplier_id // Referral to a specific product provider

Orders: 

* address
* customer_name
* customer_phone
* customer_email
* customer_identification
* total
* status // 'to deliver', ' delivered', 'canceled'
* priority // 'urgent', ' medium', 'no urgency'
* deadline // Delivery deadline

OrderProducts (Pivot Table): 

* order_id // Reference to a specific order
* product_id // Reference to a specific product

### Spanish Documentation

Esta aplicación esta dividida en 3 simples niveles básicos.

1. Capa de Usuario
2. Capa de Negocio
3. Capa de Datos

### 1 Capa de Usuario

Esta capa es la responsable de mostrar al usuario final el contenido gráfico de la aplicación, el cual se compone de 2 vistas principales. 

1. Login

En esta pestaña el usuario accede a manipular la plataforma haciendo uso de su usuario y contraseña, en caso de no estar registrado o sus credenciales no sean correctas, aparecerá una alerta con el error del caso.

En el caso exitoso del inicio de sesión, el usuario podrá acceder al uso de la plataforma

2. Orders

Esta vista esta seguida del login exitoso y es qui donde el usuario podrá ver una tabla inteligente de datos. Estos datos corresponden a todas las ordenes de compra del ecommerce. La tabla inteligente puede filtrar, ordenar y buscar datos en su interior para facilitar su uso.

Los datos de esta tabla son los siguientes:

* address
* customer name
* customer phone
* customer email
* customer identification
* total
* status
* priority
* deadline

La parte inferior de la tabla cuenta con un buscador de órdenes por fecha, una vez seleccionada una fecha, el sistema filtrará las ordenes contenidas en la tabla sin recargar la página.

3. Products of Order (Modal Inside Orders view)

Continuando en la vista de Ordenes, el primer campo de la tabla llamado "Id" corresponde al identificador único de cada orden. Dando click a cada uno de estos campos, se desplegará una pantalla emergente la cual muestra los productos que contiene la orden seleccionada.

Los datos de esta tabla son los siguientes:

* product name
* description
* status
* price
* stock
* total
* bar_code
* supplier name // Hipervinculado para enviar email al Supplier (Proveedor)
* supplier phone // Hipervinculado para llamar al Supplier 

### 1 Capa de Negocio

La plataforma esta desarrollada bajo una arquitectura (MVC Agnóstica - API Rest) Modelo, vista controlador con el framework Laravel versión 8 para el Backend y Vuejs en su versión 3.0 para el Frontend.

1. Funciones Principales y relaciones.

Usuarios: Los usuarios cuenta con email, contraseña y token de seguridad para iniciar sesión y manipular la plataforma.

Ordenes: El sistema cuenta con un controlador que se encarga de entregar un lista de las ordenes de compra relacionadas con todos los productos por cada orden así como el proveedor de cada producto. estas ordenes se entregan en formato JSON al frontend, el cual itera los datos en tablas dinámicas.

Ordenes por Fecha: A través del fronted se envia una petición POST, la cual contiene una fecha especifica para devolver las ordenes de compra filtradas por dicha fecha. Esta fecha funciona con el formato Años, mes y día.

Este controlador puede ser ubicado en la ruta:
backend/app/Http/Controllers/OrdersController

### 3 Capa de Datos

La Base de datos de esta plataforma corre sobre la tecnología SQL Haciendo uso del ORM de laravel para realizar las consultas e inserciones de datos en ella.

1. Modelos de Datos

Usuarios: 

* name
* email
* email_verified_at
* password
* Token
* created_at
* updated_at

Suppliers (Proveedores): 

* name
* email
* address
* phone
* description

Products: 

* name
* description
* status // 'in stock (En Stock)', ' out (Agotato)', 'To Run Out (Cerca de Agotarse)'
* price
* stock
* bar_code
* supplier_id // Referencia a un proveedor en especifico

Orders: 

* address
* customer_name
* customer_phone
* customer_email
* customer_identification
* total
* status // 'to deliver (Por Entregar)', ' delivered (Entregado)', 'canceled (Cancelado)'
* priority // 'urgent (Urgente)', ' medium (Poco urgente)', 'no urgency (sin urgencia)'
* deadline // Fecha limite de entrega

OrderProducts (Tabla Pivote): 

* order_id // Referencia a una orden en especifico
* product_id // Referencia a un producto con la orden



