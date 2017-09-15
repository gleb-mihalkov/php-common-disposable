<?php
namespace Common
{
    use LogicException;

    /**
     * Исключение, возникшее при повторной попытке освободить ресурсы.
     */
    class DisposableDisposedException extends DisposableException
    {
        /**
         * Создает экземпляр класса.
         *
         * @param IDisposable $disposable Освобождаемый объект, выбросивший исключение.
         */
        public function __construct(IDisposable $disposable)
        {
            parent::__construct($message, 'Disposable is already disposed.');
        }
    }
}