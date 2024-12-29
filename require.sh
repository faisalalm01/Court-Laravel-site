
# install node dependencies
npm install

# install composer
composer install

# copy env from env.example
cp .env.example .env

# generate key 
php artisan key:generate