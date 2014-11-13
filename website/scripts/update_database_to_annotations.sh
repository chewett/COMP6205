#!/bin/sh

# This is used to update the database to match the annotations. This is required for doctrine to work
# When the annotations work this needs to be run

cd ../
php vendor/bin/doctrine orm:schema-tool:update --force
