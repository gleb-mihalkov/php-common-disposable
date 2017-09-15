<?php
namespace Common
{
    /**
     * Делает так, чтобы освобождение ресурсов объекта происходило однократно - не важно, сколько
     * раз был вызван метод dispose.
     */
    trait TDisposable
    {
        /**
         * Показывает, были ли освобождены ресурсы данного объекта.
         *
         * @var bool
         */
        private $_isDisposed = false;

        /**
         * Показывает, были ли освобождены ресурсы данного объекта.
         *
         * @return bool Да или нет.
         */
        public function isDisposed()
        {
            return $this->_isDisposed;
        }

        /**
         * Сигнализирует, что ресурсы, занятые объектом, следует освободить.
         *
         * @return void
         */
        public function dispose()
        {
            if ($this->isDisposed())
            {
                throw new DisposableDisposedException($this);
            }

            $this->_isDisposed = true;
            $this->_dispose();
        }

        /**
         * Выполняет реальное освобождение ресурсов объекта. Метод должен быть
         * переопределен в целевом классе.
         *
         * @return void
         */
        protected function _dispose() {}
    }
}