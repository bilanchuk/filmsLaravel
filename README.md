## Установка


Клонуйте цей репорзиторій

    git clone https://github.com/bilanchuk/filmsLaravel.git
    
Установіть всі залежності за допомогою composer

    composer install
    npm i
    npm run dev

Копіюйте example env і зробіть всі необхідні зміни в .env файлі

    cp .env.example .env

Згенеруйте новий ключ для додатку

    php artisan key:generate


Запустіть міграції бази даних (**Установіть налаштування для бази даних в файлі .env перед міграцією**)

    php artisan migrate
    
Згенеруйте символьну ссилку на директорію

    php artisan storage:link
Запустіть локальний сервер

    php artisan serve

Зараз ви маєте доступ до серверу через http://localhost:8000
