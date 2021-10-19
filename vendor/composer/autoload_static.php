<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit631af241f267bfdf3a854f789e7abdbc
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'A' => 
        array (
            'Alex\\Dz5\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Alex\\Dz5\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit631af241f267bfdf3a854f789e7abdbc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit631af241f267bfdf3a854f789e7abdbc::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit631af241f267bfdf3a854f789e7abdbc::$classMap;

        }, null, ClassLoader::class);
    }
}
