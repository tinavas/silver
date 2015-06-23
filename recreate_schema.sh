mysql -u root -p -e "DROP SCHEMA silver"
mysql -u root -p -e "CREATE SCHEMA silver"
php artisan migrate --package=cartalyst/sentry
php artisan migrate
php artisan db:seed