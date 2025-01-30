<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitebff577604cc9888793dc42348e92f04
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Model\\' => 6,
        ),
        'C' => 
        array (
            'Controller\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/models',
        ),
        'Controller\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controllers',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitebff577604cc9888793dc42348e92f04::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitebff577604cc9888793dc42348e92f04::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitebff577604cc9888793dc42348e92f04::$classMap;

        }, null, ClassLoader::class);
    }
}
