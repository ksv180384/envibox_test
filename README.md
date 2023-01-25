## Тестовое задание

Сделать форму обратной связи.
При сохранении заявки использовать паттерн фабрика.
Реализовать структуру, чтобы можно было добавлять новые места для хранения заявок, например другая база данных или email.
Изначально реализовать сохранение в базу и в файл. Саму структуру базы можно не делать.

Поля: имя, телефон, само обращение. Валидация данных на бекенде.

Что необходимо использовать:
- PHP 7
  ООП (для создания заявки и места для хранения заявки)
- - Фреймворк Laravel или mvc фреймворк
    -DDD для организации приложения (не обязательно)
- Обязательно Vuejs

---

#### [Demo](https://site4.ksv-test.ru)

---

### Laravel, mysql, Vue.js

- После клонирования репозитория, в корневой папке переименуйте файл `.env.example` в `.env`
- Измените настройки подключения к БД в `.env`
- Создайте БД `envibox`

Выполните следующие команды:
- `composer install`
- `php artisan key:generate`
- `php artisan storage:link`
- `php artisan migrate`
- `npm install`
