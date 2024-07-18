Hey! This is a completed task for ReizTech php laravel programmer.

Simple instructions:

ReizTechTask

- Docker download Docker from here: https://www.docker.com/products/docker-desktop/
- Docker Compose

## Setup
You can follow the commands from here:

git clone https://github.com/BevardisEsu/ReizTechTask.git
cd ReizTestingProject
composer install
cp .env.example .env
docker-compose up --build
docker-compose exec app php artisan migrate
 WARN  The SQLite database configured for this application does not exist: database/database.sqlite. [Select Yes]
 And that's it!

 You can test API using CURL:

 To create a job: curl -X POST http://localhost:8000/jobs -H "Content-Type: application/json" -d "{\"urls\": [\"http://HopeItsWorking.com\"], \"selectors\": [\"body\"]}"
 To view a job: curl http://localhost:8000/jobs/1
 to delete a job: curl -X DELETE http://localhost:8000/jobs/1

 Surely you can setup a POSTMAN and do it in the app, but this way is easier, I believe

Hope it works on your machine as well as it works on my machine ¯\_(ツ)_/¯
