#!/bin/bash

set -e

service mysql start

mysql -u root -p$MYSQL_ROOT_PASSWORD -e "CREATE USER '$MYSQL_REPLICATION_USER'@'$MYSQL_REPLICATION_SLAVE_IP' IDENTIFIED BY '$MYSQL_REPLICATION_PASSWORD';"
mysql -u root -p$MYSQL_ROOT_PASSWORD -e "GRANT REPLICATION SLAVE ON *.* TO '$MYSQL_REPLICATION_USER'@'$MYSQL_REPLICATION_SLAVE_IP' IDENTIFIED BY '$MYSQL_REPLICATION_PASSWORD';"
mysql -u root -p$MYSQL_ROOT_PASSWORD -e "FLUSH PRIVILEGES;"
