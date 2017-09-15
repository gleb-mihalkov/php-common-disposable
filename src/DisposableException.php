<?php
namespace Common
{
    use LogicException;

    /**
     * Исключение, возникшее при неверном использовании освобождаемого объекта.
     */
    class DisposableException extends LogicException
    {
        /**
         * Освобождаемый объект, выбросивший исключение.
         *
         * @var IDisposable
         */
        private $_disposable;

        /**
         * Получает Освобождаемый объект, выбросивший исключение.
         *
         * @return IDisposable Освобождаемый объект.
         */
        public function getDisposable()
        {
            return $this->_disposable;
        }

        /**
         * Создает экземпляр класса.
         *
         * @param IDisposable $disposable Освобождаемый объект, выбросивший исключение.
         * @param string      $message    Сообщение об ошибке.
         */
        public function __construct(IDisposable $disposable, string $message)
        {
            parent::__construct($message);
        }
    }
}