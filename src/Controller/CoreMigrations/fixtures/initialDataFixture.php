<?php

namespace App\Controller\CoreMigrations\fixtures;

use App\Controller\CoreMigrations\AbstratFixture;

class initialDataFixture extends AbstratFixture
{

    private $unit = "";
    private $phone = "";
    private $email = "";

    public function __construct($unid = "", $phone = "", $email = "")
    {
        $this->unit = $unid;
        $this->phone = $phone;
        $this->email = $email;

        $this->up();
    }

    public function up(): void
    {
        $file = file_get_contents(dirname(__FILE__) . '/sql/initialData.sql');
        $sqlList = explode(";", $file);

        foreach ($sqlList as $key => $sql) {

            $niceSql = str_replace(["\n", "\r", "\t"], '', $sql);
            if (!$niceSql) continue;
            $this->addSql($niceSql);
        }

        // unidad
        $this->addSql("INSERT INTO `unidad` (`id`, `id_padre_id`, `id_moneda_id`, `nombre`, `activo`, `codigo`, `direccion`, `telefono`, `correo`, `rnc`, `url`) VALUES (1, NULL, 2, '$this->unit', 1, '', 'dir.', '$this->phone', '$this->email', '', '');");

        // almacen de transito
        $this->addSql("INSERT INTO `almacen` VALUES (1, 1, 61, 'Almacén de Tránsito', 1, '000', 0, 'Dir.', 0, 0, 0, 0, 0);");

        // User para cierres automaticos
        $this->addSql("INSERT INTO `user` VALUES (1, 1, '$this->email', '[\"ROLE_ADMIN\"]', 1, 1, '', '$this->unit');");
    }
}
