Выполнено за 5 часов 55 минут

**Установка**
Неоходим:
PHP >=8.0

Процесс установки:

    git clone https://github.com/amkopyt/ln_parsing_excel.git
    cd ln_parsing_excel
    composer install
    cp .env.example .en
    php artisan key:generate
    touch database/database.sqlite
    php artisan migrate
    npm i
    npm run production
    php artisan serve

**Использование**
- После сборки можно открыть сайт по адресу http://localhost:8000
- Для загрузки файла используйте кнопку - Create New
- Перед каждой загрузкой данные в базе очищаются

В качестве примера для загрузки использовался файл 'Задание.xlsx'

---
**Задание**

Время выполнения 8-16 часов
Стек: Python, PHP Laravel, VueJS в любых комбинациях

Создать парсер excel файла (во вложении).
1. Создать таблицу согласно нормам реляционных баз данных
2. Добавить расчетный тотал по Qoil, Qliq, сгруппированный по датам (даты можете указать свои, при условии, что дни будут разные, а месяц и год одинаковые)

   Результат оформить в виде дашборда примерно как тут
   https://www.figma.com/file/B7lZ78uVTP5xflPYL3Asmt/Dashboard-Advanced?node-id=0%3A1

   Базу данных можете использовать любую SQL, например SQLite

3. Задание должно быть выполнено с соблюдением методологий SOLID и DRY как минимум
4. Результат должен представлять готовое к использованию решение
5. Результат для проверки разместить на Github, предоставить ссылку
6. Наличие тестов приветствуется
