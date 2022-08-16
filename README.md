# SOLYAG-Admin

## .env

configuracion de las variables necesarias para el correcto funcionamiento del sistema

```xml
APP_ENV=dev
APP_SECRET=5ac461836e162cf8dab84406b9ba3e37

DATABASE_URL="mysql://root:""@localhost:3306/admin_solyag"

MAILER_URL=null://localhost

HOST="localhost:3306"
USER="root"
PASS=""

SITE_SOLYAG=https://localhost:8000
SITE_URL=https://localhost:8001

# DTone Dev
DTONE_API=https://preprod-dvs-api.dtone.com/v1/
DTONE_API_KEY=
DTONE_API_SECRET=

# larga Distancia
LARGA_DISTANCIA_MODE=dev
mCustomerID=
mPassword=""
mAPIKey=""

# emails
MAILER_DSN=
EMAIL_ADMIN=example@gmail.com
EMAILS_CUBACEL_MANUAL=example@gmail.com|example2@gmail.com
```

## migrations

recomendamos utilizar las migraciones de Symfony debido a que ya existen algunas que manejan el comportamiento de la bd y algunos datos 

` php bin/console d:m:m` 

## public/js/*

se encuentran los .js organizados por las carpetas de los modulos que se utilizan ejemplo, **js/Remesas/monedas/*.js** se encuentran los js necesarios para las configuracion de las monedas en remesas

![image-20220809110302604](readme\image-20220809110302604.png)

## src\Controller\Api

estan ubicadas las apis necesarias para intercambiar informacion con los sitemas de 3ros, principalmente solyag.online 

- **campanna/DisminuirSaldoCampannaController** -> dispinulle el saldo de una empresa despues de ejecutado algun servicio
- **campanna/GetCostoAndSaldoByEmpresaController** -> obiene el saldo y cosato de la empresa para la campaña sms
- **DTOneApiCallback** -> calback utilizado por el servicio DTOne
- **EmpleadoApiController** -> en este controlador se puede obtener el empleado por un email, el cual se utiliza para el login de solyag.online y tambien se crean empleados
- **EmpresaApiController**-> gestiona las interacciones con la empresa mediante api
  - `getEmpresaData` - retorna los datos de la empresa
  - `manageEmpresaCierre` - guarda las empresas q van a tener un cierre automatico con la tarea programada
  - `getAllEmpresaCierre` - retorna todas las empreas que el cierre automatico se realizara
- **ExecLargaDistanciaApiController** -> ejecuta la larga distancia proveniente desde solyag.online y retonra el `no_orden` y `status` 
- **NotifyFromEmailApiController** -> notifica cuando se ejecuto alguna recarga manual por email
- **ServicioEmpresaApiController** -> registra las recargas desde solyag.online, tanto las manuales como las DTOne

## src\Controller\Campanna

este modulo carga los datos necesarios para la configuracion de las campannas desde la admin

- **GetConfigController** - carga inicial
- **PostCostoCampannaController** - creacion de la configuracion de campañas 
- **PostSaldoCampannaController** - asignacion de saldo a las campañas

## src\Controller\CoreMigrations

modulo que controla todo el procesos de actualizacion de las bases de datos de las empresas con las migraciones y fixtures, los ficheros php dentro del modulo no deben modificarse son las clases necesarias para hacer el proceso de migracion de las bases de datos

### \fixtures

en esta carpeta estan los fixtures con los datos necesarios para el correcto funcionamiento del sistema

### \migrations

en esta carpeta las migraciones de las esctructuras de la base de datos

### proceso de creacion de una migracion del core

1. tener una bd en solyag.online donde se ejecuten todas las migraciones de symfony de forma normal, con los comandos de symfony

2. crear la migracion en solyag.online `php bin/console make:migration` recomendamos ejecutarla tambien `d:m:m`

3. copiar la migracion de **solyag.online** a **admin.solyag** en el directorio src\Controller\CoreMigrations\migrations que es el contenedor de las migraciones genericas de todas las bases de datos

4. editar la migracion copiada ejemplo `Version20220803151455.php` cambiando

   - `namespace App\Controller\CoreMigrations\migrations;`
   - que herede de `extends AbstratCoreMigration`
   - el metodo `public function up() : void` eliminar los parametros

5. una ves terminado esto ir a la plataforma https://adminpruebas.solyag.online/empresas/ al menu de empresas y  ejecutar por cada empresa la opcion de restaurar base de datos, esto puede demorar dependiendo de la cantidad modificaciones 

   ![image-20220809120219934](readme\image-20220809120219934.png)

### proceso de creacion de un fixtuare del core

los pasoso son iguales que la migracion lo que este no debe crearse en solyag.online ya que contiene datos que seran insertados directamente en SQL

## src\Controller\Remesas

### \ConfigPais

configuracion de los paises, provincia y municipios

- **DeleteController**-> elimina las configuraciones
- **GetAllConfigPaisesController** -> obtiene todas las configuraciones para mostraras
- **GetListBySelectedConfig** -> listado de todaas las config dependiendo del id, muestra todos los paises, provicnias o municipios
- **PostCreateController** -> crea paises, provincia y municipios dependiendo del tipo

### \Moneda

configuracion de las moendas dependiendo de la empresa

- **GetMonedasController** -> listado de todas las monedas de una empresa saleccionada
- **PostAsociarController** -> crea la moneda y la actualiza en la base de dato de la empresa

## src\Controller\Telecomunicaciones

**TelecomunicacionesController** - reporte con el listado de los servicios de telecomunicaciones ejecutados y sus filtros

### \Config

- **IsActiveController** - ejecuta el servicio que verifica si el servicio de DTOne esta activo para realizarce 
- **PostActiveController** - cambia el estado del servicio de DTOne actovo/desactivado

### \Empresas

- **ActiveOrCancelSubservicioCubacelController** - activa o desactiva un subservicio de Cubacel para la empresa selecionada y lo actualiza en solyag.online
- **GetEmpresasController** - listado de las configuraciones de la empresa 
- **GetHistorialRecargasSaldoController** - configura el reporte del historial de la empresa
- **GetSubserviciosRecargaController** - listado de subservicios
- **PostCostoLargaDistanciaController** - cambiar el costo de la larga distancia y actualizarlo en solyag.online
- **UpdateCostoEmpresaCubacelController** - actualizar el costo de la empresa y actualizar con solyag.online
- **UpdateSaldoEmpresaControlle** - actualizar el saldo de la empresa y actualizar con solyag.online
- **UpdateTipoPagoEmpresaControlle** - actualizar los tipos de pago (prepago | pospago)

### \Factura

- **ConfigureFacturaPospagoController** - configuracion de las facturas post pago, muestra la vista para generar la factura
- **GetFacturasPospagoController** - lista de las facturas con sus filtros
- **GetPrintFacturaByIdController** - impresion de la factura y generacion del codigo QR
- **PostFacturaPospagoController** - genera una factura y guarda los datos
- **PostServiciosForPeriodoFacturacionController** - el total de los servicios faturados en un periodo dado

### \RecargaCubacelManual

- **GetRecargaCubacelManualController** - listado de recargas cubacel manual 
- **GetReporteRecargaCubacelController** - reporte de las recargas con sus filtros
- **PutDoneRecargaCubacelManual** - ejecuta una recarga manual y la actualiza en solyag.online
- **PutRecargaCubacelManualToDTOneController** - convierte temporalmente una recarga manual a DTOne para poderla ejecutar en la api

### \Servicios

- **GetServiciosController** - listado de todos los servicios
- **PostDesactivarServicioController** - activar y desactivar algun servicio
- **PostServiciosController** - crear los servicios

### \Subservicios

- **DeleteSubserviciosController** - eliminar el subservicio 
- **GetSubserviciosController** - listado de subservicios
- **PostSubserviciosController** - crear el subservicio
- **PutSubserviciosController** - actualizar el subservicio y el nombre en solyag.online

## src\Controller\DToneController.php

controlador donde se ejecuta la tarea programada que ejecuta los servicios de recarga cada 1 min, procesando los servicios `ExecTransactionForInit`, `ExecTransactionForDeclined`, `ExecTransactionForManual` que ejecutan cada una de las recargas del tipo espesificado 

## src\Controller\EmpresasController.php

controlador que tiene toda la gestion del menu de empresas `CRUD`, activar, restaurar base de datos, crear admin, etc...

### flujo de creacion de una nueva empresa

![image-20220809130839242](readme\image-20220809130839242.png)

1. crear la nueva empresa en https://adminpruebas.solyag.online/empresas/ 
2. restaurar la base de datos para que obtenga la estructura y los datos iniciales 
3. crear un usuario administrador
4. configurar los modulos que tiene acceso la empresa

## src\Service

estan desarrollado todos los casos de usos necesarios para el funcionamiento del sistema, siguiendo el estandar de agruparlos en subacarpetas dependiendo del modulo