# Паттерн "Disposable"

Интерфейс, объявляющий паттерн "освобождаемый объект". *Освобождаемый объект* - это это объект, который занимает какие-то ресурсы и обязан освободить, когда в них отпадет нужда. Такими ресурсами, например, могут быть: незакрытое соединения с БД, занятые или временные файлы и т.п. Библиотека является частью пакета [php-common](https://github.com/gleb-mihalkov/php-common/).

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

Но вместе с тем рекомендуется использовать типаж `TDispostable`. Он реализует интерфейс `IDisposable` так, чтобы освобождение ресурсов объекта происходило однократно, сколько бы раз не был вызывался метод `dispose`:

```php
require 'vendor/autoload.php';
use Common\IDisposable;
use Common\TDisposable;

class MyDisposable implements IDisposable
{
    use TDisposable;
    
    // Типаж добавляет классу свой защищенный виртуальный метод.
    // В нем и должно происходить освобождение ресурсов.
    protected function _dispose()
    {
        echo 'Hello, world!';
    }
}

$a = new MyDisposable();
$a->dispose();
$a->dispose();
$a->dispose();

// Выведет:
// Hello, world!
```