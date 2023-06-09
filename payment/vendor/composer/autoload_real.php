<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInite6c6a027f18b28ee7d6cf05edb83afd9
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInite6c6a027f18b28ee7d6cf05edb83afd9', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInite6c6a027f18b28ee7d6cf05edb83afd9', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInite6c6a027f18b28ee7d6cf05edb83afd9::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
