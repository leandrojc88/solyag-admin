<?php

namespace App\Controller\CoreMigrations\fixtures;

use App\Controller\CoreMigrations\AbstratFixture;

class testDataFixture extends AbstratFixture
{

    public function up(): void
    {
        $file = file_get_contents(dirname(__FILE__) . '/testData.sql');
        $sqlList = explode(";", $file);

        foreach ($sqlList as $key => $sql) {

            $niceSql = str_replace(["\n", "\r", "\t"], '', $sql);
            if (!$niceSql) continue;
            $this->addSql($niceSql);
        }
    }
}
