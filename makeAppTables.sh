cd /app

sleep 7

php bin/console make:migration
php bin/console doctrine:migrations:migrate

/root/.symfony/bin/symfony serve