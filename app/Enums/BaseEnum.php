<?php

namespace App\Enums;

abstract class BaseEnum {


    private static $constCacheArray = NULL;

    /**
     * @return array|mixed
     * @throws \ReflectionException
     */
    public static function getConstants() {
        if (self::$constCacheArray == NULL) {
            self::$constCacheArray = [];
        }
        $calledClass = get_called_class();
        if (!array_key_exists($calledClass, self::$constCacheArray)) {
            $reflect = new \ReflectionClass($calledClass);
            self::$constCacheArray[$calledClass] = $reflect->getConstants();
        }
        return self::$constCacheArray[$calledClass];
    }

    /**
     * @param $name
     * @param false $strict
     * @return bool
     * @throws \ReflectionException
     */
    public static function isValidName($name, $strict = false): bool
    {
        $constants = self::getConstants();

        if ($strict) {
            return array_key_exists($name, $constants);
        }

        $keys = array_map('strtolower', array_keys($constants));
        return in_array(strtolower($name), $keys);
    }

    /**
     * @param $value
     * @param bool $strict
     * @return bool
     * @throws \ReflectionException
     */
    public static function isValidValue($value, bool $strict = true): bool
    {
        $values = array_values(self::getConstants());
        return in_array($value, $values, $strict);
    }

    /**
     * @param int $val
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Translation\Translator|string|null
     */
    public static function getLocalizedName(int $val){
        $class = new \ReflectionClass(get_called_class());
        $constants = $class->getConstants();
        $constName = null;
        foreach ( $constants as $name => $value )
        {
            if ( $value == $val )
            {
                $constName = $name;
                break;
            }
        }
        return __($constName);
    }
}
