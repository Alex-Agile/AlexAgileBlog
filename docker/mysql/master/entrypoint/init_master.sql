CREATE USER 'repl_user'@'172.20.0.3' IDENTIFIED BY 'repl_password';
GRANT REPLICATION SLAVE ON *.* TO 'repl_user'@'172.20.0.3' IDENTIFIED BY 'repl_password';
FLUSH PRIVILEGES;
