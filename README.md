## I. Setup Laravel Skeleton in Local (for module development)
1. `git clone https://github.com/laraviet/vs-laravel-skeleton.git`
2. `composer install`
3. `cp .env.example .env`
4. Create database end edit `.env` for updated db connection
5. `php artisan key:generate`
6. `php artisan migrate --seed`
7. `php artisan module:seed`
8. update `CACHE_DRIVER=redis` in .env (make sure install redis in local)
9. update `email info` in `.env` (for reset password) 
10. Setup cron job to run schedule
    - `* * * * * cd /<PROJECT> && php artisan schedule:run >> /dev/null 2>&1`
11. `rm -rf Module/*`
12. `git clone https://github.com/laraviet/core-module.git Modules/Core`
13. `git clone https://github.com/laraviet/admin-home-module.git Modules/AdminHome`

## II. Installation for client's real project
1. composer create-project laraviet/vs-laravel-skeleton -s dev project-name
2. inside new <project> folder, run: php artisan theme:install
3. config database vs update .env
4. update `CACHE_DRIVER=redis` in .env (make sure install redis in vps)
5. update `email info` in `.env` (for reset password) 
6. php artisan migrate —seed
7. php artisan module:seed

## III. Auto Deploy in Github
1. Edit file `public/deploy.php` => update `cd` command to right folder in VPS
2. Access VPS and add below line into `.git/config`
    ```
        [credential]
               helper = store --file /var/www/sites/licensing.viralsoft.vn/.git-credentials
    ```
   - (Choose right folder)
1. Access `Settings/Webhooks` => Add webhook
2. Fill Payload URL as `fullurl/deploy.php`
    - Example `http://licensing.viralsoft.vn/deploy.php`
3. Choose `Content type` as `application/json`
4. Click `Add webhook` button

