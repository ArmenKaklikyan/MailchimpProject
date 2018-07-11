# Mailchimp API


## How to deploy

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

```
1. composer install
2. make .env file from .env.example and put api key for mailchimp in front of MAILCHIMP_KEY
3. php artisan migrate
4. php artisan passport:install
```