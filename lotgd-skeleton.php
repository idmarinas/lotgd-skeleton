<?php

namespace LoTGD;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

class Skeleton
{
    public static function skeleton(): void
    {
        echo "\n";
        echo 'Coping files of LoTGD Core to Skeleton for active commands in local dev.';
        echo "\n";

        $fs = new FileSystem();

        //-- ./bin folder with console app
        $fs->mirror('vendor/idmarinas/lotgd/bin', './bin', null, ['delete' => true, 'override' => true]);

        //-- src core files
        $fs->remove('./src/core');
        $fs->mirror('vendor/idmarinas/lotgd/src/core', './src/core', null, ['delete' => true, 'override' => true]);

        echo "\n";
        echo 'Finish copy files';
    }

    public static function core(): void
    {
        echo "\n";
        echo 'Coping files of LoTGD Core to "_core_files/" folder';
        echo "\n";

        $fs = new FileSystem();

        //-- Copy  main files
        $finder = (new Finder())->ignoreUnreadableDirs()
            ->directories()
            ->in('vendor/idmarinas/lotgd')
            ->exclude([
                'assets',
                'docs',
                'gulp',
                'release',
                'vendor',
            ])
        ;

        foreach ($finder as $dir)
        {
            $fs->mirror($dir, \str_replace('vendor/idmarinas/lotgd', './_core_files', $dir), null, ['delete' => true, 'override' => true]);
        }

        //-- Other files
        $files = [
            '.env',
            'composer.json',
            'lotgd-check-requeriments.php',
            'symfony.lock',
        ];

        foreach ($files as $file)
        {
            $fs->copy('vendor/idmarinas/lotgd/'.$file, './_core_files/'.$file, true);
        }

        //-- Copy Assets folders
        $finder = (new Finder())->ignoreUnreadableDirs()
            ->directories()
            ->in('vendor/idmarinas/lotgd/assets/lotgd')
            ->exclude([
                'css/semantic/',
            ])
        ;

        foreach ($finder as $dir)
        {
            $fs->mirror($dir, \str_replace('vendor/idmarinas/lotgd/assets/lotgd', './assets/lotgd', $dir), null, ['delete' => true, 'override' => true]);
        }

        //-- Copy Assets files
        $finder = (new Finder())->ignoreUnreadableDirs()
            ->in('vendor/idmarinas/lotgd/assets/lotgd/')
            ->depth('== 0')
            ->files()
        ;

        foreach ($finder as $file)
        {
            $fs->copy($file, \str_replace('vendor/idmarinas/lotgd/assets/lotgd', './assets/lotgd', $file), true);
        }

        //-- Copy config folder
        $finder = (new Finder())->ignoreUnreadableDirs()
            ->directories()
            ->in('vendor/idmarinas/lotgd/config/')
        ;

        foreach ($finder as $dir)
        {
            $fs->mirror($dir, \str_replace('vendor/idmarinas/lotgd/config', './config', $dir), null, ['delete' => true, 'override' => true]);
        }

        //-- Copy config files
        $finder = (new Finder())->ignoreUnreadableDirs()
            ->in('vendor/idmarinas/lotgd/config/')
            ->depth('== 0')
            ->files()
        ;

        foreach ($finder as $file)
        {
            $fs->copy($file, \str_replace('vendor/idmarinas/lotgd/config', './config', $file), true);
        }

        echo "\n";
        echo 'Finish coping files of LoTGD Core to "_core_files/" folder';
    }

    public static function upgrade()
    {
        echo "\n";
        echo 'Upgrading files of LoTGD Core Skeleton';
        echo "\n";

        $fs = new FileSystem();

        $files = (new Finder())->ignoreUnreadableDirs()
            ->in('vendor/idmarinas/lotgd')
            ->files()
            ->name('package.json')
            ->name('CHANGELOG-*.md')
            ->name('README.md')
            ->name('lotgd-check-requeriments.php')
            ->notName('CHANGELOG-dev.md')
        ;

        foreach ($files as $file)
        {
            $fs->copy($file, \str_replace('vendor/idmarinas/lotgd', './', $file));
        }

        $files = (new Finder())->ignoreUnreadableDirs()
            ->in('vendor/idmarinas/lotgd-skeleton')
            ->files()
            ->name('composer.json')
            ->name('lotgd-skeleton.php')
        ;

        foreach ($files as $file)
        {
            $fs->copy($file, \str_replace('vendor/idmarinas/lotgd-skeleton', './', $file));
        }

        //-- Copy gulp folder
        $finder = (new Finder())->ignoreUnreadableDirs()
            ->directories()
            ->in('vendor/idmarinas/lotgd-skeleton/gulp/')
        ;

        foreach ($finder as $dir)
        {
            $fs->mirror($dir, \str_replace('vendor/idmarinas/lotgd-skeleton/gulp', './gulp', $dir), null, ['delete' => true, 'override' => true]);
        }

        //-- Update translations
        //-- Need add translations for modules other time
        $fs->mirror('vendor/idmarinas/lotgd/translations/en', './translations/en', null, ['delete' => true, 'override' => true]);

        echo "\n";
        echo 'Finish upgrading files';
    }
}
