<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitDrupal8
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Wikimedia\\Composer\\' => 19,
        ),
        'D' => 
        array (
            'Drupal\\Driver\\' => 14,
            'Drupal\\Core\\Composer\\' => 21,
            'Drupal\\Core\\' => 12,
            'Drupal\\Component\\' => 17,
        ),
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Wikimedia\\Composer\\' => 
        array (
            0 => __DIR__ . '/..' . '/wikimedia/composer-merge-plugin/src',
        ),
        'Drupal\\Driver\\' => 
        array (
            0 => __DIR__ . '/../..' . '/drivers/lib/Drupal/Driver',
        ),
        'Drupal\\Core\\Composer\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core/lib/Drupal/Core/Composer',
        ),
        'Drupal\\Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core/lib/Drupal/Core',
        ),
        'Drupal\\Component\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core/lib/Drupal/Component',
        ),
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
    );

    public static $classMap = array (
        'Drupal' => __DIR__ . '/../..' . '/core/lib/Drupal.php',
        'Drupal\\Component\\Utility\\Timer' => __DIR__ . '/../..' . '/core/lib/Drupal/Component/Utility/Timer.php',
        'Drupal\\Component\\Utility\\Unicode' => __DIR__ . '/../..' . '/core/lib/Drupal/Component/Utility/Unicode.php',
        'Drupal\\Core\\Database\\Database' => __DIR__ . '/../..' . '/core/lib/Drupal/Core/Database/Database.php',
        'Drupal\\Core\\DrupalKernel' => __DIR__ . '/../..' . '/core/lib/Drupal/Core/DrupalKernel.php',
        'Drupal\\Core\\DrupalKernelInterface' => __DIR__ . '/../..' . '/core/lib/Drupal/Core/DrupalKernelInterface.php',
        'Drupal\\Core\\Site\\Settings' => __DIR__ . '/../..' . '/core/lib/Drupal/Core/Site/Settings.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitDrupal8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitDrupal8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitDrupal8::$classMap;

        }, null, ClassLoader::class);
    }
}
