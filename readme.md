##About the project
-This is a Laravel project to use the api from https://affiliate.itunes.apple.com/resources/documentation/itunes-store-web-service-search-api/#searchexamples

-Insert data into DB and do some operations

Installation:
-git clone https://github.com/xiaofanggit/MusicArtist

-Rename ".env.example" into ".env"

-Change the database name to : music_artists, and also change the host and user information

-Make sure music_artists tables exsited.

-Make sure the folders storage and the bootstrap/cache have writeable permission.

-Make sure you already install npm (https://nodejs.org/en/) and composer (https://getcomposer.org/), and also can be accessed from everywhere.

-Go into your project folder, for example: C:\xampp\htdocs\MusicArtist\ 

 npm install (this command will install all missed components we will use for this project into folder "node_modules".)
-Install all missed vendor components using the below command.

composer install
-Run the below two commands if you have any errors.

php artisan key:generate
php artisan config:clear
-Run 'php artisan serve'
-Then you could test webservices by using:

http://localhost:8000/webServices/musicArtist

http://localhost:8000/webServices/deleteTrack?id=1

##Code structure

-webservices are located at: \MusicArtist\app\Http\Controllers\WebservicesController.php
-Models are located at: \MusicArtist\app\Model
-Routes are located at: C:\xampp\htdocs\MusicArtist\routes\web.php
-Database tables are located at: C:\xampp\htdocs\MusicArtist\database\migrations
