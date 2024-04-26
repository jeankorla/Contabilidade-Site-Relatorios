<?php
namespace sysborg\autentiquev2;

final class autoloader{
    private static array $loadPath = [
        'sysborg\autentiquev2\layouts'                  => '/layouts.interface.php',
        'sysborg\autentiquev2\common'                   => '/layouts/common.class.php',
        'sysborg\autentiquev2\listDir'                  => '/layouts/dir/listDir.class.php',
        'sysborg\autentiquev2\createDir'                => '/layouts/dir/createDir.class.php',
        'sysborg\autentiquev2\deleteDir'                => '/layouts/dir/deleteDir.class.php',
        'sysborg\autentiquev2\rescueDir'                => '/layouts/dir/rescueDir.class.php',
        'sysborg\autentiquev2\createDoc'                => '/layouts/doc/createDoc.class.php',
        'sysborg\autentiquev2\deleteDoc'                => '/layouts/doc/deleteDoc.class.php',
        'sysborg\autentiquev2\listDoc'                  => '/layouts/doc/listDoc.class.php',
        'sysborg\autentiquev2\listDocDir'               => '/layouts/doc/listDocDir.class.php',
        'sysborg\autentiquev2\moveDoc'                  => '/layouts/doc/moveDoc.class.php',
        'sysborg\autentiquev2\signDoc'                  => '/layouts/doc/signDoc.class.php',
        'sysborg\autentiquev2\rescueDoc'                => '/layouts/doc/rescueDoc.class.php',
        'sysborg\autentiquev2\docSignaturePosition'     => '/layouts/doc/docSignaturePosition.class.php',
        'sysborg\autentiquev2\utils'                    => '/utils.traits.php',
        'sysborg\autentiquev2\autentique'               => '/autentique.class.php'
    ];

    public static function getClassPath(string $className) : string
    {
        if (isset(self::$loadPath[$className])) {
            return self::$loadPath[$className];
        }
        throw new \Exception("Classe não encontrada no autoloader: " . $className);
    }
}

spl_autoload_register(function($cls){
    if (strpos($cls, 'sysborg\autentiquev2') === 0) {
        require_once __DIR__ . autoloader::getClassPath($cls);
    }
});
