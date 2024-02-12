<img src="https://img.hhcdn.ru/employer-logo/3752060.jpeg">
<h3>Тестовое задание. </h3> <h1>АО Балтийский Телекоммуникационный Холдинг</h1>

<a href="https://docs.google.com/document/d/1fl4eCKdpSXUNyu899NCKaDy_fdHcVPDE-GoO9siZPX4/edit">Ссылка на задание</a>

1. Поднять проект.
2. Установить зависимости.
3. Настроить .env по docker-compose.yml(также настроить mail-hog, для тестирования отправки почты).
4. Запустить докер (docker-compose up -d)
5. Зайти в контейнер php (docker-compose exec --user=1000 php bash).
6. Запустить внутри контейнера миграции и сиды (php artisan migrate --seed)
7. Тестируем со стороны фронта (http://localhost/products)
