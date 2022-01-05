## Commands to run:

``cd database || touch database.sqlite``

``cp .env.example .env``

``php artisan key:generate``

``php artisan migrate --seed``

``php artisan serve``


## API endpoint responsible for completing this task:

Getting all items:

``{{URL}}/api/item``

Buying item:

``{{URL}}/api/buy/item/{id}``
