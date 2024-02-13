<img src="https://img.hhcdn.ru/employer-logo/1977455.png">
<h3>Тестовое задание. </h3> <h1>Social Media Holding</h1>

<a href="https://hh1.az/applicant/vacancy_response?vacancyId=92916154&hhtmFrom=vacancy">Ссылка на задание</a>

1. Поднять проект.
2. Установить зависимости.
3. Настроить .env по docker-compose.yml.
4. Запустить докер (docker-compose up -d)
5. Зайти в контейнер php (docker-compose exec --user=1000 php bash).
6. Запустить внутри контейнера миграции и сиды (php artisan migrate --seed)
7. php artisan parse {model} <- где model (что мы парсим "products,posts,users,recipes) {searchName?} <- (не обязательный параметр для поиска по названию товара "products" пример "iPhone", если не передаете параметр для продукта то сохраняться все).
