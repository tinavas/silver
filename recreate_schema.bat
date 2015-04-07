mysql -u root -e "DROP SCHEMA silver"
mysql -u root -e "CREATE SCHEMA silver"
php artisan migrate --package=cartalyst/sentry
php artisan migrate
php artisan db:seed