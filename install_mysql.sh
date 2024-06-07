#!/bin/bash

# Variables
MYSQL_ROOT_PASSWORD="987654321"
MYSQL_USER="root"
MYSQL_PASSWORD="987654321"
MYSQL_DATABASE="nap"

# Pre-configure MySQL installation options
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password password $MYSQL_ROOT_PASSWORD"
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password_again password $MYSQL_ROOT_PASSWORD"

# Function to show progress using whiptail
function show_progress {
    local PID=$!
    local DELAY=0.1
    local SPINNER='|/-\'
    local SPINCOUNT=0
    while [ "$(ps a | awk '{print $1}' | grep $PID)" ]; do
        SPINCOUNT=$(( (SPINCOUNT + 1) % 4 ))
        printf "\r%s" "${SPINNER:$SPINCOUNT:1}"
        sleep $DELAY
    done
    printf "\r"
}

# Update package information and install MySQL server with progress
{
    sudo apt update
    sudo apt install -y mysql-server
} & show_progress

# Secure MySQL installation silently
sudo mysql_secure_installation <<EOF

n
Y
$MYSQL_ROOT_PASSWORD
$MYSQL_ROOT_PASSWORD
Y
Y
Y
Y
EOF

# Log in to MySQL as root and configure user and database
sudo mysql -u root -p$MYSQL_ROOT_PASSWORD <<EOF
-- Create a new MySQL user and grant all privileges
CREATE USER '$MYSQL_USER'@'localhost' IDENTIFIED BY '$MYSQL_PASSWORD';
GRANT ALL PRIVILEGES ON *.* TO '$MYSQL_USER'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;

-- Create a new database
CREATE DATABASE $MYSQL_DATABASE;

-- Grant all privileges on the new database to the new user
GRANT ALL PRIVILEGES ON $MYSQL_DATABASE.* TO '$MYSQL_USER'@'localhost';

-- Apply changes
FLUSH PRIVILEGES;
EOF

# Restart MySQL service
sudo systemctl restart mysql

# Output the MySQL version to verify installation
mysql --version
