#!/bin/bash
tables=( jump_page )

if [ "$1" = '' ]
then
    echo "o hi, pass the database password as an argument plx. thx.";
    exit 2;
fi

mysqldump -d -u root --password=$1 kkk > ddl.sql

for table in  ${tables[@]}
do
    mysqldump -t -c -u root --password=$1 kkk $table > data/${table}.sql
done