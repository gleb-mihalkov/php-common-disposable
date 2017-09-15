# Паттерн "Disposable"

Интерфейс, объявляющий паттерн "освобождаемый объект". *Освобождаемый объект* - это это объект, который занимает какие-то ресурсы и обязан освободить их, когда закончит работу. Такими ресурсами, например, могут быть: незакрытое соединения с БД, занятые или временные файлы и т.п. Библиотека является частью пакета [php-common](https://github.com/gleb-mihalkov/php-common/).

* [Документация](https://gleb-mihalkov.github.io/php-common-disposable/)

## Использование

Если мы хотим просто пометить класс как освобождаемый, достаточно реализовать интерфейс `IDisposable`:

```php
require 'vendor/autoload.php';
use Common\IDisposable;

class MyDisposable implements IDisposable
{
    // Освобождает занятые ресурсы.
    public function dispose() {}
}
```

Но также рекомендуется использовать типаж `TDispostable`. Он запрещает повторное освобождение ресурсов:

```php
require 'vendor/autoload.php';
use Common\IDisposable;
use Common\TDisposable;

class MyDisposable implements IDisposable
{
    use TDisposable;
    
    // Освобождает занятые ресурсы.
    protected function _dispose() { echo 'Dispose'.PHP_EOL; }
}

$a = new MyDisposable();
$a->dispose(); // >_ Dispose
$a->dispose(); // Exception!
```