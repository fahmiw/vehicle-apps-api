# Laravel 8 Cloning and Setup with MongoDB

This guide provides step-by-step instructions on how to clone and set up the Laravel 8 project from the given repository, and configure it to use MongoDB as the database.

## Prerequisites

Before getting started, ensure that you have the following installed on your machine:

- PHP (7.4 or higher)
- Composer
- MongoDB

## Installation

Follow these steps to clone and set up the Laravel 8 project with MongoDB:

1. Clone the repository:
    ```bash
    git clone https://github.com/fahmiw/vehicle-apps-api.git
    ```
2. Navigate to the project directory:
    ```bash
    cd vehicle-apps-api
    ```
3. Install project dependencies using Composer:
    ```bash
    composer install
    ```
4. Install the MongoDB PHP extension:
    ```bash
    pecl install mongodb
    ```
5. Configure PHP to use the MongoDB extension:
Locate your php.ini file (check phpinfo() output for "Loaded Configuration File").
Add or uncomment the following line in php.ini:
    ```ini
    extension=mongodb
    ```
6. Update the Laravel database configuration:
    Open the .env file in your project and update the following lines:
    ```ini
    DB_CONNECTION=mongodb
    DB_HOST=127.0.0.1
    DB_PORT=27017
    DB_DATABASE=your-database-name
    DB_USERNAME=
    DB_PASSWORD=
    ```
7. Generate an application key:
    ```bash
    php artisan key:generate
    ```
8. Running the Application
    To run the cloned Laravel application with MongoDB, execute the following commands:
    ```bash
    php artisan serve
    ```
    This command will start the development server, and you should see a message like "Laravel development server started: http://localhost:8000".

9. Open your postman and visit http://localhost:8000 to access the Laravel api.

## API Endpoints
The following API endpoints are available in the project:

POST /register: Register a new user.
```
Example json input: 
{
    "name" : "Admin",
    "email" : "admin13@gmail.com",
    "phone_no" : "083212345212",
    "password": "qwerty123",
    "password_confirmation" : "qwerty1223"
}
```
POST /login: Log in with user credentials.
```
Example json input: 
{
    "email": "admin@gmail.com",
    "password": "qwerty123"
}
```

Notes : The API below requires a Header Authorization Bearer token
GET /logout: Log out the authenticated user.
POST /kendaraan/add: Add a new vehicle.
```
{
    "tahun_kendaraan": "2010",
    "warna": "putih",
    "jenis": "2", // 1: motor, 2: mobil
    "mesin": "DOHC",
    "kapasitas_penumpang": "6",
    "tipe": "manual"
    //tipe_suspensi: ""
    //tipe_transmisi: ""
}
```
GET /kendaraan/stok: Get the stock of available vehicles.
POST /kendaraan/penjualan: Record a vehicle sale.
```
{
    "kendaraan_id": "64b738a77215c611380a74a9",
    "tanggal_penjualan": "2023-07-25",
    "harga_penjualan": "12000000000"
}
```
GET /kendaraan/laporan-penjualan/{id}: Get the sales report for a specific vehicle by ID.

## Unit Test
To run unit test execute the following commands:
    ```bash
    composer test
    ```

## Additional Information
For more detailed instructions and information about Laravel, please refer to the official Laravel documentation: https://laravel.com/docs/8.x
For MongoDB-specific information and queries, refer to the MongoDB documentation: https://docs.mongodb.com/

## License
This project is licensed under the MIT License.
Feel free to copy and use this updated template, which includes the steps to 