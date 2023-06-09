<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Guidence - Step By Step

1. **Clone** the project from github.
2. Copy and paste the **.env.example** file and rename it to the **.env**.
3. Then add **Database configurations** to the **.env** file (what you created in second step).
4. Make sure to run **php artisan key:generate** to generate the key.
5. Then run **composer update**.
6. Run **npm install**.
7. Run **php artisan vendor:publish --provider="Proengsoft\JsValidation\JsValidationServiceProvider"** to publish the package I have added.
8. Then again run **php artisan serve** in a terminal.
9. After that run **npm run dev** in another terminal.
10. I have added an **Backup SQL file** in **backup** folder. If you want, you can import it to the DB created by you.
11. If you are not going to import backup sql file, you may have to run **php artisan migrate** to make tables in the database.
12. Then click the URL generated in **8 th step** and you are good to go.
13. Make sure to register and login to test the functionality.

## NOTE

-   Please check your versions comparing to the composer.json file in the project.
-   Versions I have used are following
    1. PHP - 8.2.4
    2. Laravel - ^9
    3. Node Js - Latest
