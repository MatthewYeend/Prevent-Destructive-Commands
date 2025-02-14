<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit17287753869c999f5296ac74dd383647
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Mattyeend\\PreventDestructiveCommands\\' => 37,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Mattyeend\\PreventDestructiveCommands\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit17287753869c999f5296ac74dd383647::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit17287753869c999f5296ac74dd383647::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit17287753869c999f5296ac74dd383647::$classMap;

        }, null, ClassLoader::class);
    }
}
