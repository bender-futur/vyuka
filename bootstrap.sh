#!/usr/bin/env bash

echo '------------------------------------'
echo '[1/2] Deleting temporary files'
echo '------------------------------------'
	rm -rf /vagrant/temp/*
	rm -rf /vagrant/log/*
echo '------------------------------------'
echo '[2/2] Configuring apache'
echo '------------------------------------'
	sudo apt-get install vim > /dev/null
	sudo cp /vagrant/.vagrant/vagrant_config/000-default.conf /etc/apache2/sites-available/000-default.conf
	sudo cp /vagrant/.vagrant/vagrant_config/default-ssl.conf /etc/apache2/sites-available/default-ssl.conf
	sudo /etc/init.d/apache2 restart
echo '------------------------------------'
echo 'FINISHED SUCCESSFULLY'
echo '------------------------------------'
