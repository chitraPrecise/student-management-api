How to Run This Demo (Quick Steps)

Install PHP (8.2+), Composer, MySQL, and Postman
Download or clone the project and go inside the project folder
Run composer install to install dependencies
Copy .env.example to .env and generate app key using php artisan key:generate
Create a MySQL database and update DB details in .env
Run php artisan migrate to create all tables
Run php artisan passport:install to generate authentication keys
Start the server using php artisan serve
Open Postman and add header Accept : application/json for all requests
Call /api/register to register a user
Call /api/login to login and copy the token
Use Authorization → Bearer Token and paste the token
Access protected APIs like /api/students to create, view, update, and delete students
