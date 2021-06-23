#!/bin/bash
docker-compose -p laravel-basis -f docker-compose.yml up --build --remove-orphans -d
