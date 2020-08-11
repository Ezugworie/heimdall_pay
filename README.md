# A Simple Wallet System

Heimdall Pay is a Wallet App based on Lumen/Laravel PHP framework (backend) and Quasar/Vuejs JavaScript framework (frontend) that credits and 
and debits users wallet account on the system

## Official Documentation

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).

See [Configuring quasar.conf.js](https://quasar.dev/quasar-cli/quasar-conf-js). for the Quasar documentation


## How to Use

clone/download this repo, 

run ``` php artisan migrate:fresh ``` to run database migrations

run ``` php artisan db:seed ``` to seed database with test data

run ``` php -S localhost:port -t public ``` to serve the app

run ``` php artisan queue:work ``` to watch and execute queued jobs



## End points
``` /users ``` fetch all users

### The end points below creates and queues jobs for execution

``` /wallets/credit ``` credit all wallets with a random amount

``` /wallets/debit ``` debit all wallets with a random amount


## License

The Heimdall pay is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
