<?php

namespace Atekushi\Support;

use Atekushi\Container\Container;
use Atekushi\Container\Exceptions\ContainerException;
use Atekushi\Container\Exceptions\NotFoundException;
use ReflectionException;

class Facade
{
    /**
     * Perform static call to selected subject
     *
     * @param string $name
     * @param array $arguments
     * @return mixed
     * @throws ContainerException
     * @throws NotFoundException
     * @throws ReflectionException
     */
    public static function __callStatic(string $name, array $arguments)
    {
        $subject = static::getClassSubject();
        $instance = self::buildSubject($subject);

        return call_user_func_array([$instance, $name], $arguments);
    }

    /**
     * Get facade instance subject
     *
     * @return string
     */
    protected static function getClassSubject(): string
    {
        return static::class;
    }

    /**
     * Build facade subject
     *
     * @param string $class_name
     * @return object
     * @throws ContainerException
     * @throws NotFoundException
     * @throws ReflectionException
     */
    protected static function buildSubject(string $class_name): object
    {
        return Container::getInstance()->get($class_name);
    }
}