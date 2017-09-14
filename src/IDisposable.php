<?php
namespace Common
{
    /**
     * Освобождаемый объект.
     *
     * @package Common
     */
    interface IDisposable
    {
        /**
         * Освобождает ресурсы, занятые объектом.
         *
         * @return void
         */
        public function dispose();
    }
}