### Проверка корректности скобок, реализованная через сокеты

1) Запускаем сервер
```php
./server [--port=9999] [--address=127.0.0.1] [--threads=1]
```

2) Запускаем клиента
```php
./client --message="(((())"
```