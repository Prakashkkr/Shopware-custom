<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite6b8b107c88b994e7c634d6319ead6d2
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'SwagBlogFinder\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'SwagBlogFinder\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInite6b8b107c88b994e7c634d6319ead6d2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite6b8b107c88b994e7c634d6319ead6d2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite6b8b107c88b994e7c634d6319ead6d2::$classMap;

        }, null, ClassLoader::class);
    }
}