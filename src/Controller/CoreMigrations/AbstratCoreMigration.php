<?php

namespace App\Controller\CoreMigrations;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Exception\TableNotFoundException;
use Doctrine\Migrations\Query\Query;
use Psr\Log\LoggerInterface;

/**
 * Clone class from AbtractMigrations by manager the migrations for multiconextion
 * 
 * @author Leandro J. Capdesuñer Garcia <leandrojc88@gmail.com>
 * 
 */
abstract class AbstratCoreMigration
{
    /** @var Query[] */
    private $plannedSql = [];

    public function __construct()
    {
        $this->up();
    }

    /**
     * @param mixed[] $params
     * @param mixed[] $types
     */
    protected function addSql(
        string $sql,
        array $params = [],
        array $types = []
    ): void {
        $this->plannedSql[] = new Query($sql, $params, $types);
    }

    /**
     * @throws MigrationException|DBALException
     */
    abstract public function up(): void;

    public function exceute(Connection $conn, LoggerInterface $loger): void
    {
        if (!$this->canExcecute($conn)) return;

        foreach ($this->plannedSql as $key => $sql) {
            $loger->notice($sql->getStatement());
            $conn->executeQuery($sql->getStatement());
        }

        $this->registerInDB($conn);
    }

    public function canExcecute(Connection $conn): bool
    {
        try {

            $className = $this->getClassName();

            $result = $conn->executeQuery(
                "SELECT version 
            FROM doctrine_migration_versions
            WHERE version = '$className'
            "
            )->fetchOne();
            
            return (bool) !$result;

        } catch (TableNotFoundException $th) {            
            return true;
        }
    }

    public function registerInDB(Connection $conn)
    {
        $name = $this->getClassName();

        $conn->executeQuery(
            "INSERT INTO doctrine_migration_versions
            (version) values ('$name')            
            "
        );
    }

    private function getClassName(): string
    {
        $name = get_class($this);
        $explode = explode('\\', $name);
        $className  = array_pop($explode);

        return $className;
    }

}
