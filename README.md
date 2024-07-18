Hey! This is a completed task for ReizTech php laravel programmer.

Simple instructions:

ReizTechTask

- Docker download Docker from here: https://www.docker.com/products/docker-desktop/
- Docker Compose

## Setup
You can follow the commands from here:

git clone https://github.com/BevardisEsu/ReizTechTask.git <br>
cd ReizTestingProject<br>
composer install<br>
cp .env.example .env <br>
docker-compose up --build <br>
docker-compose exec app php artisan migrate <br>
 WARN  The SQLite database configured for this application does not exist: database/database.sqlite. [Select Yes] <br>
 And that's it!<br>

 You can test API using CURL: <br>

 To create a job: curl -X POST http://localhost:8000/jobs -H "Content-Type: application/json" -d "{\"urls\": [\"http://HopeItsWorking.com\"], \"selectors\": [\"body\"]}" <br>
 To view a job: curl http://localhost:8000/jobs/1 <br>
 to delete a job: curl -X DELETE http://localhost:8000/jobs/1 <br>

 Surely you can setup a POSTMAN and do it in the app, but this way is easier, I believe <br>

Hope it works on your machine as well as it works on my machine ¯\_(ツ)_/¯ <br>
