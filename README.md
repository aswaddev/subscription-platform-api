# Instructions to run the project

1. First clone the project
2. After cloning, run "composer install --ignore-platform-reqs" command to install all the dependencies
3. Run "cp .env .env.example" to create a .env file for your configuration
4. Run "php artisan key:generate" command to generate app key
5. Configure the database, mail server and also set the queue driver to database
6. Run "php artisan migrate" command to migrate the tables
7. Run "php artisan db:seed" command to seed fake data for websites model
8. Run "php artisan serve". Your project should now be up and running
9. Run "php artisan queue:listen" in another bash terminal for queues to work.
10. To test with the APIs, please import the "Subscription Platform.postman_collection.json" file into Postman.
11. You should be up and running now. Thanks
