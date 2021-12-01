<?php

namespace App\Controller\CoreMigrations;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Exception\ForeignKeyConstraintViolationException;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Psr\Log\LoggerInterface;

abstract class AbstratFixture extends AbstratCoreMigration
{

    /**
     * do it excecute the sql while is not done!
     */
    public function exceute(Connection $conn): void
    {
        if (!$this->canExcecute($conn)) return;

        $tempListSql = $this->plannedSql;

        while (count($tempListSql) > 0) {

            try {

                $sql = array_shift($tempListSql);
                
                $conn->executeQuery($sql->getStatement());
            } catch (ForeignKeyConstraintViolationException $th) {
                array_push($tempListSql, $sql);
            } catch (UniqueConstraintViolationException $th) {
                continue;
            } catch (\Exception $th) {
                dd($th, $sql, $sql->getStatement(), $tempListSql);
                array_push($tempListSql, $sql);
            }
        }

        $this->registerInDB($conn);
    }
}
