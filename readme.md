https://www.blog.florisdroppert.nl/

:tada: My first laravel project :tada:

<br />

You need to be registered to enter the website by default. That can be changed in the routes/web.php. By removing:

->middleware('auth');

<br />

Register Page is disabled by default,
Go to routes/web.php and uncomment :

//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');

//Route::post('register', 'Auth\RegisterController@register');

To enable registering.

<br />

Algolia search is disabled for localhost,
If you want to enable it for the live version go to App/Post.php and uncomment the code.

<br />

TO-DO LIST

- Save image as file instead of Base64.
- Thumbnails.
- Categories.
- Popup when trying to delete a post.


BUGS

-


<br />

:star: INSTALLATION :star:

Make sure you have composer installed

- Git clone https://github.com/Floris/blog.git
- Create an .env file from .env.example
- Create a database and put the settings in your .env file
- composer install
- npm install
- php artisan key:generate (if the key didn't generate at composer install)
- php artisan migrate
- php artisan db:seed

If you don't have Laravel Valet Or
- php artisan serve

<br />

Website default login

Login email: admin@gmail.com

Login password: secret

<br />

:exclamation: To add "Administrator" role to an user. Go in the database to user_role and add user_id to the role_id. The role_id of "Administrator" is by default 1.
