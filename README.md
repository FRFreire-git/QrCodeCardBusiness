<h1>QrCode for Card Business</h1>

## About Project

This is a small project made for an interview. The goal was safe some infos about you in a card redirected by a QrCode. For this project, I used:

- Laravel 10;
- Bootstrap;
- Axios;
- Github API;
- Vue.js (only in a fancy thing);
- SQLite;

## How to run the project

- run "gitclone [link for this repository]" in your terminal;
- run "composer update" inside the project directory;
- create a .env file via .env.example;
- run "php artisan serve" inside the project directory;
- in another terminal redirected on a project directory, you have to run "php artisan migrate" to set the tables to your local database. *The .sqlite can see inside the database file*

## Opening in browser

After you run "php artisan serve" in your terminal, this command will return an url that will be running the project locally [localhost:8000] and will show an dashboard. You have to create an new card to see your QrCode being generated.
