## This is an API client project, and the provider is TripBuilder

## Installation

It is similar as the project TripBuilder.

1. git clone https://github.com/xiaofanggit/TripBuilderClient
2. Create database on your MYSQL server named: trip_builder_client (or your own name.)
3. Rename ".env.example" into ".env"
4. Make sure the folders storage and the bootstrap/cache have writeable permission.
5. Make sure you already install npm (https://nodejs.org/en/) and composer (https://getcomposer.org/), and also can be accessed from everywhere.
6. Go into your project folder, for example: C:\xampp\htdocs\TripBuilderClient\ 
 npm install (this command will install all missed components we will use for this project into folder "node_modules".)
7. Install all missed vendor components using the below command.
composer install
8. Run the below two commands if you have any errors.
php artisan key:generate
php artisan config:clear
9. Change the file:
C:\xampp\htdocs\TripBuilderClient\routes\web.php
Change all client id to the id you got from: http://tripbuilder.dev/
Find the detailed information from: C:\xampp\htdocs\TripBuilder\miscellaneous\ScreenshotAndImportantInfo 
