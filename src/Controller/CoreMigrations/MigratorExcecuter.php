<?php

namespace App\Controller\CoreMigrations;

use App\Controller\CoreMigrations\fixtures\initialDataFixture;
use App\Controller\CoreMigrations\fixtures\testDataFixture;
use Doctrine\DBAL\Connection;
use Doctrine\Migrations\Finder\GlobFinder;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

class MigratorExcecuter
{

    /** @var AbstratCoreMigration[] */
    private $migrationsClass = [];

    private EntityManagerInterface $em;

    private Connection $currentConn;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;

        $this->currentConn = $this->em->getConnection();
    }


    /**
     * Load all migrations in dir(/migrations) and save in $migrationsClass
     */
    public function loadMigrationsFile(): void
    {

        $finder = new GlobFinder();

        $strMigrationsClass = $finder->findMigrations(__DIR__ . '/migrations');

        foreach ($strMigrationsClass as $key => $strMigration) {

            $this->migrationsClass[] = new $strMigration();
        }
    }

    public function excecuteMigrations($empresaId, bool $test = false)
    {
        $this->loadMigrationsFile();

        $dbname = $test ? 'db_prueba_emp' . $empresaId : 'db_emp' . $empresaId;
        $conn = $this->getConnextion($dbname);

        foreach ($this->migrationsClass as $key => $migration) {
            $migration->exceute($conn);
        }
    }

    public function loadInitFixtures($empresaId, $unit, $phone, $email, $test = false)
    {

        $dbname = $test ? 'db_prueba_emp' . $empresaId : 'db_emp' . $empresaId;
        $conn = $this->getConnextion($dbname);

        $testFixture = new initialDataFixture($unit, $phone, $email);

        $testFixture->exceute($conn);
    }

    public function loadTestFixtures($empresaId)
    {

        $dbname = 'db_prueba_emp' . $empresaId;
        $conn = $this->getConnextion($dbname);

        $testFixture = new testDataFixture();

        $testFixture->exceute($conn);
    }

    public function loadListFixtures($empresaId)
    {
    }

    public function createDB($name, $name_prueba): bool
    {
        $conexion = new \mysqli($_ENV["HOST"], $_ENV["USER"], $_ENV["PASS"]);
        if ($conexion->connect_error) {
            die("conexion fallida " . $conexion->connet_error);
        }
        $sql = "CREATE DATABASE " . $name;
        if ($conexion->query($sql) === true) {
            $sql = "CREATE DATABASE " . $name_prueba;
            if ($conexion->query($sql) === true) {
                return true;
            } else
                return false;
        }
        return false;
    }

    private function getConnextion($dbname): Connection
    {
        $params = $this->currentConn->getParams();

        $params['dbname'] = $dbname;

        $conn = new Connection(
            $params,
            $this->currentConn->getDriver(),
            $this->currentConn->getConfiguration(),
            $this->currentConn->getEventManager()
        );

        return $conn;
    }
}
