#!/bin/bash

set -e

service mysql start


mysql -u root -palexagile -e "CHANGE MASTER TO MASTER_HOST='172.20.0.2', MASTER_PORT=3306, MASTER_USER='repl_user', MASTER_PASSWORD='repl_password', MASTER_AUTO_POSITION=1;"
# mysql -u root -palexagile -e "SHOW SLAVE STATUS\G;"

#echo "CHANGE MASTER TO MASTER_HOST='172.20.0.2', MASTER_PORT=3306, MASTER_USER='repl_user', MASTER_PASSWORD='$MYSQL_ROOT_PASSWORD', MASTER_AUTO_POSITION=1;"
