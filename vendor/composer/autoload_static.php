<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit671ae737fc6b52d65615517a4ee717fa
{
    public static $prefixLengthsPsr4 = array (
        'i' => 
        array (
            'ishop\\' => 6,
        ),
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ishop\\' => 
        array (
            0 => __DIR__ . '/..' . '/ishop/core',
        ),
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit671ae737fc6b52d65615517a4ee717fa::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit671ae737fc6b52d65615517a4ee717fa::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit671ae737fc6b52d65615517a4ee717fa::$classMap;

        }, null, ClassLoader::class);
    }
}