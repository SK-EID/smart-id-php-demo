cd /app

sleep 15

php bin/console make:migration
php bin/console doctrine:migrations:migrate

/root/.symfony/bin/symfony serve