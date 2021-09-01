# Composer cmd  copy all and paste in cmd and run it 
------------------------------------------------
https://getcomposer.org/download/

	php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
	php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
	php composer-setup.php
	php -r "unlink('composer-setup.php');"


# Laravel School Pro MGMT
------------------------------------------------
https://laravel.com/docs/8.x/installation

	composer create-project laravel/laravel example-app

# 3 How to install jetstrem  Auth (Steps): 
------------------------------------------------
https://laravel.com/docs/8.x/authentication
https://jetstream.laravel.com/2.x/installation.html
1st 

		composer require laravel/jetstream
2nd 

		php artisan jetstream:install livewire
3rd Livewire scaffolding installed successfully.
Please execute "npm install && npm run dev" to build your assets.

	npm install && npm run dev


# Create Databse and migrate it by .env and phpmyadmin
	
in my case =>DB_DATABASE=school

	php artisan migrate