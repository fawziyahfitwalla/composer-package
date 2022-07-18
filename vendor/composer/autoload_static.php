<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfb20e8ca672d8df4214976206731d850
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Fawzi\\Dmcc\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Fawzi\\Dmcc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'simplehtmldom\\Debug' => __DIR__ . '/..' . '/simplehtmldom/simplehtmldom/Debug.php',
        'simplehtmldom\\HtmlDocument' => __DIR__ . '/..' . '/simplehtmldom/simplehtmldom/HtmlDocument.php',
        'simplehtmldom\\HtmlElement' => __DIR__ . '/..' . '/simplehtmldom/simplehtmldom/HtmlElement.php',
        'simplehtmldom\\HtmlNode' => __DIR__ . '/..' . '/simplehtmldom/simplehtmldom/HtmlNode.php',
        'simplehtmldom\\HtmlWeb' => __DIR__ . '/..' . '/simplehtmldom/simplehtmldom/HtmlWeb.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfb20e8ca672d8df4214976206731d850::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfb20e8ca672d8df4214976206731d850::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfb20e8ca672d8df4214976206731d850::$classMap;

        }, null, ClassLoader::class);
    }
}