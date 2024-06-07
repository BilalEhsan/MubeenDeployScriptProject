#!/bin/bash

# Update package lists
sudo apt update

# Install MySQL server in non-interactive mode
sudo DEBIAN_FRONTEND=noninteractive apt install -y mysql-server

# Wait a few seconds for MySQL to start
sleep 5

# Secure the MySQL installation using the `mysql_secure_installation` tool
sudo mysql_secure_installation

echo "MySQL installation complete. Remember to set a strong root password using 'mysql_secure_installation'."
