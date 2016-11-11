#!/usr/bin/env bash

echo '------------------------------------'
echo '[1/3] Deleting temporary files'
echo '------------------------------------'
	rm -rf /vagrant/temp/*
	rm -rf /vagrant/log/*
echo '------------------------------------'
echo '[2/3] Configuring mysql'
echo '------------------------------------'
	mkdir -p /vagrant/www/phpmyadmin > /dev/null
	rm -rf /vagrant/www/phpmyadmin/* > /dev/null
	cp -r /usr/share/phpmyadmin/* /vagrant/www/phpmyadmin/ > /dev/null
echo '------------------------------------'
echo '[3/3] Configuring apache'
echo '------------------------------------'
	#/etc/init.d/nginx stop > /dev/null
	apt-get install vim > /dev/null
	cp /vagrant/.vagrant/vagrant_config/000-default.conf /etc/apache2/sites-available/000-default.conf
	cp /vagrant/.vagrant/vagrant_config/default-ssl.conf /etc/apache2/sites-available/default-ssl.conf
	cp /vagrant/.vagrant/vagrant_config/apache2.conf /etc/apache2/apache2.conf
	cp /vagrant/.vagrant/vagrant_config/hosts /etc/hosts > /dev/null
	/etc/init.d/apache2 restart > /dev/null
echo '------------------------------------'
echo 'FINISHED SUCCESSFULLY'
echo '------------------------------------'
