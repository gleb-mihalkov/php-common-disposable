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
        private $isDisposed = false;

        /**
         * Сигнализирует, что ресурсы, занятые объектом, следует освободить.
         *
         * @return void
         */
        public function dispose()
        {
            if ($this->isDisposed) return;
            $this->isDisposed = true;

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