https://www.blog.florisdroppert.nl/

:tada: My first laravel project :tada:

Register Page is disabled by default,
Go to routes/web.php and uncomment it for the register page.

Algolia search is disabled for localhost,
If you want to enable it for the live version go to App/Post.php and uncomment the code.



TO-DO LIST:

- Pagination
- Thumbnails
- Categories
- Save image as file instead of Base64
- Popup when trying to delete a post



BUGS:

- Algolia won't update it's db when the post is updated.



:star: INSTALLATION :star:

- Git clone https://github.com/Floris/blog.git
- Create an .env file from .env.example
- Create a database and put the settings in your .env file
- composer install
- npm install
- php artisan key:generate (if the key didn't generate at composer install)
- php artisan migrate
- php artisan db:seed

website default login

login email: admin@gmail.com
login password: secret

:exclamation: To add "Administrator" role to an user. Go in the database to user_role and add user_id to the role_id. The role_id of "Administrator" is by default 1. :exclamation:
