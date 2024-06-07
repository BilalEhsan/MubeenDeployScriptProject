#!/bin/bash

# Function to check and remove lock file
check_and_remove_lock() {
    local cache_lock_files=("/var/lib/dpkg/lock" "/var/lib/dpkg/lock-frontend")
    for lock_file in "${cache_lock_files[@]}"; do
        if sudo fuser "$lock_file" &> /dev/null; then
            echo "Cache lock file $lock_file detected."
            read -p "Another process is holding the cache lock file. Do you want to clear the lock? (y/n): " choice
            if [ "$choice" = "y" ]; then
                sudo kill -9 $(sudo fuser "$lock_file")
                echo "Cache lock cleared."
            else
                echo "Exiting script."
                exit 1
            fi
        else
            echo "No cache lock issue detected"
        fi
    done
}

# Check and remove lock file
check_and_remove_lock

# Prompt user for variables
read -p "Enter your GitHub repository URL for the Laravel project: " REPO_URL
read -p "Enter the domain name or IP address for your server: " SERVER_NAME

# Set fixed variables
PHP_VERSION="7.4"
MYSQL_ROOT_PASSWORD="my_sql_root_password"
DB_NAME="testcode"
DB_USER="testcode_db_user"
DB_PASS="testcode_db_user_password"


# Update and upgrade the system
check_and_remove_lock
sudo apt update && sudo apt upgrade -y

sudo apt -y install software-properties-common
sudo add-apt-repository ppa:ondrej/php
sudo apt update

# Install necessary packages
check_and_remove_lock
sudo apt install nginx mariadb-server php${PHP_VERSION}-fpm php${PHP_VERSION}-mysql php${PHP_VERSION}-xml php${PHP_VERSION}-mbstring php${PHP_VERSION}-zip php${PHP_VERSION}-curl git unzip nodejs -y

sudo systemctl start mariadb.service

# Install nvm and Node.js
# curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.3/install.sh | bash
# source ~/.bashrc
# source /root/.nvm/nvm.sh
# nvm install v20.14.0
# nvm use v20.14.0

# cd ~
# curl -sL https://deb.nodesource.com/setup_20.x -o /tmp/nodesource_setup.sh
# sudo bash /tmp/nodesource_setup.sh
# sudo apt install nodejs
# node -v

# Secure MySQL installation
check_and_remove_lock
sudo mysql_secure_installation <<EOF

y
$MYSQL_ROOT_PASSWORD
$MYSQL_ROOT_PASSWORD
y
y
y
y
EOF

# Create MySQL database and user
check_and_remove_lock
sudo mysql -u root -p$MYSQL_ROOT_PASSWORD <<MYSQL_SCRIPT
CREATE DATABASE $DB_NAME;
CREATE USER '$DB_USER'@'localhost' IDENTIFIED BY '$DB_PASS';
GRANT ALL PRIVILEGES ON $DB_NAME.* TO '$DB_USER'@'localhost';
FLUSH PRIVILEGES;
MYSQL_SCRIPT

# Install Composer
check_and_remove_lock
cd ~
curl -sS https://getcomposer.org/installer -o composer-setup.php
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer

# Clone Laravel project
check_and_remove_lock
PROJECT_PATH="/var/www/html/$SERVER_NAME"
sudo git clone $REPO_URL $PROJECT_PATH
cd $PROJECT_PATH

# Install Laravel dependencies
check_and_remove_lock
composer install

# Configure environment
cp .env.example .env
sed -i "/DB_DATABASE=/d" .env
sed -i "/DB_USERNAME=/d" .env
sed -i "/DB_PASSWORD=/d" .env
echo "DB_DATABASE=$DB_NAME" >> .env
echo "DB_USERNAME=$DB_USER" >> .env
echo "DB_PASSWORD=$DB_PASS" >> .env

# Generate application key
php artisan key:generate

# Set permissions
# sudo chown -R www-data:www-data $PROJECT_PATH
# sudo chmod -R 775 $PROJECT_PATH/storage
# sudo chmod -R 775 $PROJECT_PATH/bootstrap/cache

sudo usermod -a -G www-data root
sudo find $PROJECT_PATH -type f -exec chmod 644 {} \;
sudo find $PROJECT_PATH -type d -exec chmod 755 {} \;

sudo chgrp -R www-data storage bootstrap/cache
sudo chmod -R ug+rwx storage bootstrap/cache

# Run migrations and seeders
php artisan migrate:fresh --force
php artisan db:seed --force

php artisan storage:link

# Install npm dependencies
npm install
npm run prod

# Configure Nginx
NGINX_CONFIG="
server {
    listen 80;
    server_name $SERVER_NAME;
    root $PROJECT_PATH/public;
    index index.php index.html index.htm;

    location / {
        try_files \$uri \$uri/ /index.php?\$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php${PHP_VERSION}-fpm.sock;
        fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }
}
"

echo "$NGINX_CONFIG" | sudo tee /etc/nginx/sites-available/$SERVER_NAME
sudo ln -s /etc/nginx/sites-available/$SERVER_NAME /etc/nginx/sites-enabled/
sudo unlink /etc/nginx/sites-enabled/default

# Restart Nginx
sudo systemctl restart nginx

echo "Laravel project deployed successfully!"

echo "Your dashboard link: http://$SERVERNAME.com"
echo "Your Username: adminUser"
echo "Your Password: adminPassword"
