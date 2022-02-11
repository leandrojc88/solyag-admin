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
     * 
     * @return bool if migration true(se esta ejecutando), false(no puede ser ejecutada)
     */
    public function exceute(Connection $conn): bool
    {
        if (!$this->canExcecute($conn)) return false;

        $tempListSql = $this->plannedSql;
        // dd($tempListSql);
        while (count($tempListSql) > 0) {

            try {

                $sql = array_shift($tempListSql);
                
                $conn->executeQuery($sql->getStatement());
            } catch (ForeignKeyConstraintViolationException $th) {
                array_push($tempListSql, $sql);
            } catch (UniqueConstraintViolationException $th) {
                continue;
            } catch (\Exception $th) {
                array_push($tempListSql, $sql);
            }
        }

        $this->registerInDB($conn);
        return true;
    }
}
