<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticIniteefd069a05a875c77a05ba4dedcd8006
{
    public static $prefixLengthsPsr4 = array (
        'Y' => 
        array (
            'YooKassa\\' => 9,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'YooKassa\\' => 
        array (
            0 => __DIR__ . '/..' . '/yoomoney/yookassa-sdk-php/lib',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticIniteefd069a05a875c77a05ba4dedcd8006::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticIniteefd069a05a875c77a05ba4dedcd8006::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticIniteefd069a05a875c77a05ba4dedcd8006::$classMap;

        }, null, ClassLoader::class);
    }
}
