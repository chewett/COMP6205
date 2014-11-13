#!/bin/sh

#This is used to export database tables and convert them into PHP annotations to be used
#This doesnt need to be run unless you have added things to the database and want to export them

cd ../
./vendor/bin/doctrine orm:convert-mapping --from-database annotation setup_database/
