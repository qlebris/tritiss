git pull origin master
php bin/console doctrine:migrations:migrate
php ../composer.phar install --no-dev
echo "update finished"