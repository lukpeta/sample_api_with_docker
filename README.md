## Installation project from git

1. Install
- HTTPS: https://github.com/lukpeta/retencja.git
- SSH: git@github.com:lukpeta/retencja.git
- GitHUB CLI: gh repo clone lukpeta/retencja

2. Laravel app setup in .env:

- DB_CONNECTION=pgsql
- DB_HOST=postgres
- DB_PORT=5432
- DB_DATABASE=default
- DB_USERNAME=default
- DB_PASSWORD=secret


## Installation Docker

1. Clone Laradock inside your PHP project:
- git clone https://github.com/Laradock/laradock.git

2. Enter the laradock folder and rename .env.example to .env.
- cp .env.example .env

3. Edit .env:
   - change POSTGRES=alpine to: POSTGRES_VERSION=14.1
   - change PHP_VERSION to PHP_VERSION=8.1

4. Run your containers:
   docker-compose up -d nginx postgres pgadmin  workspace

5. Open browser:
- webpage:  http://localhost

6. Enter the Workspace container:
   docker-compose exec workspace bash

7. Run migrations by command:
- php artisan migrate:fresh --seed

## How to use

- http://localhost/api/date/2022.07.07 -  results of the draw after entering it's date. Date format: yyyy.mm.dd
- http://localhost/api/number/1 - Number of repeats of the entered number and all dates of it's repeats in previous draws


## Cron
Activate the scheduled jobs, run the Cron command. Go to your application from the Applications tab, and then to the Cron Jobs Manager.
Place the following command:

    * * * * * php /home/mylogin/public_html/artisan schedule:run >> /dev/null 2>&1
