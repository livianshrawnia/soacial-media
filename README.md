To deploy and run the Laravel application locally, follow these instructions:

1. System Requirements:
	PHP (recommended version: PHP 7.4 or higher)

2. Extract the Project:
	Extract the project from the .zip file in www(for wamp) or htdocs(for xampp) folder.

3. Install dependencies by running below command:
	composer install

4. Configure Environment:
	Update the .env file with the local database credentials, such as database name, username, and password.

5. Generate Application Key by running below command:
	php artisan key:generate

6. Run Migrations by running below command:
	php artisan migrate

7. Start the Development Server by running below command:
	php artisan serve

