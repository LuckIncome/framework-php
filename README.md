![framework](https://github.com/LuckIncome/framework-php/assets/54973796/7a48fb8b-1950-47a7-a7c9-e36337f767eb)

## Требования

        *  PHP 8.0
        *  MySQL 8.0
        *  Apache 2.4

## Установка

```bash
    
    # Создайте БД названием "fw"

    # Импортируйте файл "fw.sql"

    # Напишите свои настройки БД в файле:
    /config/config_db.php
    <?php

    return [
        'dsn' => 'mysql:host=localhost:3306;dbname=fw;charset=utf8',
        'user' => 'root',
        'pass' => '',
    ];

```

```bash
    composer update
```
