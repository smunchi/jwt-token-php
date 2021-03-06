<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9a26c91180ce4e6f39a55630210837a9
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9a26c91180ce4e6f39a55630210837a9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9a26c91180ce4e6f39a55630210837a9::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
