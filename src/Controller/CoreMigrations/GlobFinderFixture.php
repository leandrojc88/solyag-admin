<?php

declare(strict_types=1);

namespace App\Controller\CoreMigrations;

use Doctrine\Migrations\Finder\Finder;

use function glob;
use function rtrim;

/**
 * The GlobFinder class finds Fixture in a directory using the PHP glob() function.
 * 
 */
final class GlobFinderFixture extends Finder {
    /**
     * redefinir el metodo <findMigrations()> para acomodarlo a los Fixture
     */
    public function findMigrations(string $directory, ?string $namespace = null): array
    {
        $dir = $this->getRealPath($directory);

        $files = glob(rtrim($dir, '/') . '/*Fixture.php');
        if ($files === false) {
            $files = [];
        }

        return $this->loadMigrations($files, $namespace);
    }
}