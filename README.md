# Neto Tech Task

### Installation Instructions

To correctly setup this project on your machine locally, follow these instructions:
1. Clone the repository by running, using `git clone https://github.com/Filip785/neto-tech-task.git`
2. Navigate your CLI to `<project_root>` and install composer packages by running `composer update`.
3. Once that is done, in `<project_root>` copy the `.env.example` file into `.env` in the same location.
4. Create new database on your machine and insert its data (host, port, name, credentials) in the newly created `.env` file
5. Run migrations & seeds by running `php artisan migrate:fresh --seed` from `<project_root>`.
6. Set your servers DocumentRoot to point to `<project_root>/public` folder.
7. Run `php api-client/generate_key.php` from `<project_root>`. This will generate the API key that will be used for authentication `APIClient` requests to the API.
8. To test usage of API client run `php api-client/usage.php`.
9. Code for API client is in `<project_root>/api-client/`.
