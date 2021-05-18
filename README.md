# access
___
###run this after downloading:

Ubuntu:
```
sudo apt-get install composer ;
sudo apt install openssl php-common php-curl php-json php-mbstring php-mysql php-xml php-zip ;
sudo apt-get install npm ;
sudo apt-get install nodejs ;
sudo npm cache clean -f ;
sudo npm install -g n ;
sudo n latest ;
composer update ;
npm install ;
php artisan ;
php artisan key:generate ;
sudo cp .env.example .env ;
```

Arch Linux:
```
sudo pacman -S composer
sudo pacman -S openssl
sudo pacman -Syu php7 common curl json mbstring mysql xml zip
sudo pacman -S npm
sudo pacman -S nodejs
sudo npm cache clean -f
sudo npm install -g npm@7.12.1 or sudo npm install -g n
sudo npm install -g scss
composer install
composer update
npm install
php artisan key:generate
sudo cp .env.example .env
```
install mysql

create database named access and then run for creating tables:

```
php artisan migrate:fresh --seed
```

modify .env accordingly.
