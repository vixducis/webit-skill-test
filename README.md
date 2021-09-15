# Webit skill test

This code was written as part of a skill test for a job interview at 'webit' by Wouter Henderickx. It uses the laravel framework as the basis for an an auction house website. A fully functioning demo can be found at https://www.wouterh.be/webit/

## Initialization
```bash
touch database/database.sqlite
php artisan migrate
php artisan db:seed
```

### Larastan

This codebase supports static code analysis thanks to larastan. The included configuration uses the highest level of checks, 8. You can run it with the following command

``` bash
./vendor/bin/phpstan
```
