<?php

namespace App\Controller\CoreMigrations;

use App\Controller\CoreMigrations\fixtures\initialDataFixture;
use Doctrine\DBAL\Connection;
use Doctrine\Migrations\Finder\GlobFinder;
use Doctrine\ORM\EntityManagerInterface;

class MigratorExcecuter
{

    /** @var AbstratCoreMigration[] */
    private $migrationsClass = [];
    private $fixtureClass = [];

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
        $trsShow = [];

        // para lograr ordenar consecutivamente por el nombre de la migracion el $strMigrationsClass 
        asort($strMigrationsClass);

        foreach ($strMigrationsClass as $key => $strMigration) {

            $this->migrationsClass[] = new $strMigration();
        }
    }

    /**
     * Load all fixture in dir(/fixtures) and save in $migrationsClass
     */
    public function loadFixturesFile(): void
    {

        $finder = new GlobFinderFixture();

        $strFixtureClass = $finder->findMigrations(__DIR__ . '/fixtures');

        // para lograr ordenar consecutivamente por el nombre de la migracion el $strMigrationsClass
        asort($strFixtureClass);

        foreach ($strFixtureClass as $key => $strFixture) {

            $this->strFixtureClass[] = new $strFixture();
        }

        // dd($this->strFixtureClass);
        // dd($this->migrationsClass,  $this->strFixtureClass);
    }

    /**
     * ejecuta todas las migraciones en una base de datos
     * de una en una para evitar la `Maximum execution time`
     * 
     * @return bool
     *      **true**  - en caso que se ejecute correctamente | 
     *      **false** - para poder dar paso a que se ejecute mas codigo ocmo las `Fixtures`
     */
    public function excecuteMigrations($empresaId, bool $test = false)
    {
        $this->loadMigrationsFile();

        $dbname = $test ? 'db_prueba_emp' . $empresaId : 'db_emp' . $empresaId;
        $conn = $this->getConnextion($dbname);

        foreach ($this->migrationsClass as $key => $migration) {
            // validar que se ejecute una sola migracion para hacerlo async con ajax
            if ($migration->exceute($conn)) return true;
        }

        return false;
    }


    /**
     * ejecuta todas las fixtures en una base de datos
     * de una en una para evitar la `Maximum execution time`
     * 
     * @return bool
     *      **true**  - en caso que se ejecute correctamente | 
     *      **false** - para poder dar paso a que se ejecute mas codigo como las `Fixtures`
     */
    public function excecuteFixtures($empresaId, bool $test = false)
    {
        $this->loadFixturesFile();

        $dbname = $test ? 'db_prueba_emp' . $empresaId : 'db_emp' . $empresaId;
        $conn = $this->getConnextion($dbname);

        foreach ($this->strFixtureClass as $key => $fixture) {
            // validar que se ejecute una sola migracion para hacerlo async con ajax
            if ($fixture->exceute($conn)) return true;
        }

        return false;
    }

    /**
     * ejecuta `initialDataFixture` en una base de datos
     * de una en una para evitar la `Maximum execution time`
     * 
     * @return bool
     *      **true**  - en caso que se ejecute correctamente | 
     *      **false** - para poder dar paso a que se ejecute mas codigo
     */
    public function loadInitFixtures($empresaId, $unit, $phone, $email, $test = false)
    {

        $dbname = $test ? 'db_prueba_emp' . $empresaId : 'db_emp' . $empresaId;
        $conn = $this->getConnextion($dbname);

        $testFixture = new initialDataFixture($unit, $phone, $email);

        if ($testFixture->exceute($conn)) return true;

        return false;
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
