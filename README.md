# Online-Treasure-Hunt-Laravel

A Fully Integrated Treasure Hunt Website with admin,user and guest roles.

#Installation

Run the Composer Install command from the Terminal:
```
composer install
```
Change the .env file with the corresponding database name, user and pass.
```
DB_HOST=localhost
DB_DATABASE=huntio
DB_USERNAME=root
DB_PASSWORD=root

```
Next run the migrate command to create tables in the database mentioned above

```
php artisan migrate
```

Now run the application 
```
php artisan serve
```

Some Important Notes :

* Login page for admin and users is same. For admin role, Update role column in users table to greater than 1.

* Fb Integration will be released in v2.

In case of any queries with the code please feel free to contact me on any media.
* email : bharath@zoisoft.com
* fb : http://www.facebook.com/bharathdevasani
* twitter : @BharathDevasani
