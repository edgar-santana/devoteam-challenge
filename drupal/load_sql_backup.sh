#! /bin/bash

cat drupal/devoteam_backup.sql  | docker exec -i drupal8_mysql /usr/bin/mysql -u root --password=password drupal