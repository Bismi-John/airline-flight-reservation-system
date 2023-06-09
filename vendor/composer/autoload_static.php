<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite6c6a027f18b28ee7d6cf05edb83afd9
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite6c6a027f18b28ee7d6cf05edb83afd9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite6c6a027f18b28ee7d6cf05edb83afd9::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite6c6a027f18b28ee7d6cf05edb83afd9::$classMap;

        }, null, ClassLoader::class);
    }
}
