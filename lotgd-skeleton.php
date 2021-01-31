<?php

namespace LoTGD;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

class Skeleton
{
    public static function skeleton()
    {
        echo "\n";
        echo 'Coping files of LoTGD Core to Skeleton for active commands in local dev.';
        echo "\n";

        $fs = new FileSystem();

        $fs->mirror('vendor/idmarinas/lotgd/lib/AdvertisingBundle', './lib/AdvertisingBundle');
        $fs->mirror('vendor/idmarinas/lotgd/src', './src');
        $fs->mirror('vendor/idmarinas/lotgd/themes', './themes');

        echo "\n";
        echo 'Finish copy files';
    }

    public static function core()
    {
        echo "\n";
        echo 'Coping files of LoTGD Core to "_core_files/" folder';
        echo "\n";

        $finder = new Finder();
        $fs     = new FileSystem();

        $finder->ignoreUnreadableDirs()
            ->directories()
            ->in('vendor/idmarinas/lotgd')
            ->exclude([
                'assets',
                'docs',
                'gulp',
                'release',
                'vendor'

            ])
        ;

        foreach ($finder as $dir)
        {
            $fs->mirror($dir, str_replace('vendor/idmarinas/lotgd', './_core_files/', $dir));
        }

        $files = [
            '.env',
            '.gitignore',
            'composer.json',
            'composer.lock',
            'lotgd-check-requeriments.php',
            'README.md',
            'symfony.lock',
        ];

        foreach($files as $file)
        {
            $fs->copy('vendor/idmarinas/lotgd/'.$file, './_core_files/'.$file);
        }

        echo "\n";
        echo 'Finish copy files';
    }
}
