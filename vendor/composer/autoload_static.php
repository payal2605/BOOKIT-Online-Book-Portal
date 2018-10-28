<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitae768ff8e3234d07a4f60a798dc4f7c4
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitae768ff8e3234d07a4f60a798dc4f7c4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitae768ff8e3234d07a4f60a798dc4f7c4::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
