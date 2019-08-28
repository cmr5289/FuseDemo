#!/usr/bin/env bash

cd $HOME

function installDefaults() {
    echo "************************************"
    echo "Installing Default Packages"
    echo "************************************"

    if [[ -e /usr/bin/php ]] ; then
        echo "Already done! Skipping..."
        return
    fi

    sudo add-apt-repository ppa:ondrej/php

    sudo apt-get update

    sudo apt-get install -yq \
    apache2 \
    php7.3 \
    php7.3-dev \
    libapache2-mod-php7.3 \
    php7.3-gd \
    php7.3-curl \
    php7.3-json \
    php7.3-xml \
    php7.3-mbstring \
    php7.3-mysql \
    php7.3-zip \
    build-essential \
    unzip \
    ntpdate

    sudo ntpdate -u ntp.ubuntu.com

    echo "<VirtualHost *:80>
	ServerAdmin webmaster@vagrant.com
	ServerName vagrant.local
	DocumentRoot /home/vagrant/Code/public
	<Directory /home/vagrant/Code/public>
		Options -Indexes +FollowSymLinks
		AllowOverride All
		Order allow,deny
		Allow from all
	</Directory>

	SetEnvIf Request_URI '.(gif)|(jpg)|(jpeg)|(png)|(ico)|(css)|(js)$' exclude_from_log
    CustomLog /var/log/apache2/vagrant_access.log vhost_combined env=!exclude_from_log
    ErrorLog /var/log/apache2/vagrant_error.log
</VirtualHost>" | sudo tee /etc/apache2/sites-available/vagrant.conf

    sudo a2ensite vagrant

    cp /home/vagrant/Code/var/etc/apache2/apache2.conf /etc/apache2/apache2.conf

    sed -i "s/www-data/vagrant/" /etc/apache2/envvars
    sudo a2enmod rewrite
    sudo a2enmod headers

    rm /var/www/html/index.html
    echo "<?php phpinfo();" > /var/www/html/index.php

    sudo service apache2 restart

    echo "127.0.0.1 vagrant.local" | sudo tee -a /etc/hosts
}

function installComposer() {
    echo "************************************"
    echo "Installing Composer"
    echo "************************************"

    if [[ -e /usr/bin/composer ]] ; then
        echo "Already done! Skipping..."
        return
    fi

    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php composer-setup.php
    php -r "unlink('composer-setup.php');"
    sudo cp composer.phar /usr/bin/composer
}

function installXdebug() {
  echo "************************************"
  echo "Installing xDebug"
  echo "************************************"

    if [[ -e /usr/lib/php/20180731/xdebug.so ]] ; then
        echo "Already done! Skipping..."
        return
    fi

    git clone https://github.com/xdebug/xdebug
    cd xdebug/
    phpize
    ./configure --enable-xdebug
    make
    cp modules/xdebug.so /usr/lib/php/20180731/xdebug.so
    echo "zend_extension=xdebug.so" | sudo tee -a /etc/php/7.3/mods-available/xdebug.ini
    phpenmod xdebug

    echo "xdebug.remote_enable=1
xdebug.remote_host=10.0.2.2
xdebug.remote_port=9000
xdebug.remote_connect_back=1" | tee -a /etc/php/7.3/mods-available/xdebug.ini

    echo "export XDEBUG_CONFIG='idekey=PhpStorm1'" | tee -a /home/vagrant/.bashrc


    phpenmod xdebug
    sudo service apache2 restart

}

function installMysql() {
  echo "************************************"
  echo "Installing Mysql"
  echo "************************************"

    if [[ -e /usr/bin/mysql ]] ; then
        echo "Already done! Skipping..."
        return
    fi

    sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password password'
    sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password password'
    sudo apt-get -y install mysql-server

    sed -i "s/127.0.0.1/0.0.0.0/" /etc/mysql/mysql.conf.d/mysqld.cnf
    echo "
general_log_file        = /var/log/mysql/mysql.log
general_log             = 1" | tee -a /etc/mysql/mysql.conf.d/mysqld.cnf
    mysql -uroot -ppassword mysql -e "update user set Host = '%' where user = 'root';"

    /etc/init.d/mysql restart

    mysql -uroot -ppassword -e "create database vagrant"

}


echo "************************************"
echo "* Welcome to the FuseOS Code Demo  *"
echo "************************************"

echo "Please wait while we configure your vagrant box"
installDefaults
installComposer
installMysql

echo "************************************"
echo "* All Done!                        *"
echo "*                                  *"
echo "* Before you start. You need to    *"
echo "* edit your hosts file.            *"
echo "* On linux or mac edit /etc/hosts  *"
echo "* On Windows                       *"
echo "* edit %SYSTEM32%\drives\etc\hosts *"
echo "*                                  *"
echo "* Add 192.168.33.10 vagrant.local  *"
echo "* to your hosts file               *"
echo "*                                  *"
echo "* Navigate to http://vagrant.local *"
echo "*                                  *"
echo "* Mysql User: root                 *"
echo "* Mysql Password: password         *"
echo "************************************"