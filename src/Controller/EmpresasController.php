<?php

namespace App\Controller;

use App\Controller\backup\SGBD;
use App\Controller\CoreMigrations\MigratorExcecuter;
use App\Entity\Administradores;
use App\Entity\Empleados;
use App\Entity\Empresas;
use App\Form\AdministradoresType;
use App\Form\EmpresasType;
use App\Repository\EmpleadosRepository;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * Class EmpresasController
 * @package App\Controller
 * @Route("/empresas")
 */
class EmpresasController extends AbstractController
{
    /**
     * @Route("/", name="empresas")
     */
    public function index(EntityManagerInterface $em): Response
    {
        $empresas = $em->getRepository(Empresas::class)->findBy(['activo' => true]);

        $row = [];
        //        $query = 'SELECT * FROM cuenta';
        /** @var Empresas $item */
        foreach ($empresas as $item) {
            $row[] = [
                'nombre' => $item->getNombre(),
                'siglas' => $item->getSiglas(),
                'identificacion' => $item->getIdentificacion(),
                'correo' => $item->getCorreo(),
                'telefono' => $item->getTelefono(),
                'nro_contrato' => $item->getNroContrato(),
                'id' => $item->getId(),
                'ready' => $item->getReady(),
                'restore' => $item->getRestore(),
                'icono' => $item->getIcono(),
                'icono_ticket' => $item->getIconoTicket(),
                'restore_test' => $item->getRestoreTest(),
            ];
        }

        $form = $this->createForm(EmpresasType::class);
        $form_administrador = $this->createForm(AdministradoresType::class);
        return $this->render('empresas/index.html.twig', [
            'controller_name' => 'EmpresasController',
            'form' => $form->createView(),
            'form_administrador' => $form_administrador->createView(),
            'empresas' => $row
        ]);
    }

    /**
     * @Route("/delete/{id}", name="empresas_delete")
     */
    public function delete(
        EntityManagerInterface $em,
        EmpleadosRepository $empleadosRepository,
        $id
    ): Response {
        $empresa = $em->getRepository(Empresas::class)->find($id);
        if (!$empresa) {
            $this->addFlash('error', 'La empresa no existe');
            return $this->redirectToRoute('empresas');
        }

        $empreados = $empleadosRepository->findBy(['id_empresa' => $id]);

        foreach ($empreados as $empleado) {
            $em->remove($empleado);
        }
        $em->flush();

        $empresa->setActivo(false);
        $em->persist($empresa);
        $em->flush();
        $this->addFlash('success', 'Empresa elimminada satisfactoriamente');
        return $this->redirectToRoute('empresas');
    }

    /**
     * @Route("/activar", name="empresas_activar")
     */
    public function activar(EntityManagerInterface $em, Request $request): Response
    {
        $id = $request->request->get('id');
        $empresa = $em->getRepository(Empresas::class)->find($id);
        if (!$empresa) {
            $this->addFlash('error', 'La empresa no existe');
            return $this->redirectToRoute('empresas');
        }
        $empresa->setReady(true);
        $em->persist($empresa);
        $em->flush();
        $name_database = 'db_emp' . $empresa->getId();
        $name_database_prueba = 'db_prueba_emp' . $empresa->getId();
        //crear la base de datos
        $this->createDB($name_database, $name_database_prueba);
        $this->addFlash('success', 'Empresa activada satisfactoriamente');
        return $this->redirectToRoute('empresas');
    }

    /**
     * @Route("/desactivar", name="empresas_desactivar")
     */
    public function desactivar(EntityManagerInterface $em, Request $request): Response
    {
        $id = $request->request->get('id');
        $empresa = $em->getRepository(Empresas::class)->find($id);
        if (!$empresa) {
            $this->addFlash('error', 'La empresa no existe');
            return $this->redirectToRoute('empresas');
        }
        $empresa->setReady(false);
        $em->persist($empresa);
        $em->flush();
        $this->addFlash('success', 'Empresa desactivada satisfactoriamente');
        return $this->redirectToRoute('empresas');
    }


    /**
     * @Route("/add_admin", name="empresas_add_admin")
     */
    public function add_admin(
        EntityManagerInterface $em,
        Request $request,
        UserPasswordEncoderInterface $passEncoder,
        HttpClientInterface $httpClientInterface
    ): Response {
        $admin = $request->request->get('administradores');
        $nombre = $admin['nombre'];
        $usuario = $admin['usuario'];
        $id_empresa = $request->request->get('id_empresa');

        $duplicate = $em->getRepository(Empleados::class)->findBy([
            'correo' => $usuario,
            'activo' => true
        ]);

        if (empty($duplicate)) {

            $empresa = $em->getRepository(Empresas::class)->find($id_empresa);

            $response = $httpClientInterface->request(
                "POST",
                $_ENV['SITE_SOLYAG'] . "/api/employee/create-employee-from-adminsolyag",
                [
                    "body" => [
                        "user" => $usuario,
                        "name" => $nombre,
                        "id_empresa" => $id_empresa,
                        "empresa_name" => $empresa->getNombre(),
                        "icon" => $empresa->getIconoTicket()
                    ],
                    'verify_peer' => false
                ]
            );

            if ($response->getStatusCode() == 501)
                $this->addFlash('error', 'el usuario esta en uso');

            if ($response->getStatusCode() == 502) {
                $this->addFlash('error', 'Erro de Envio de correo');
            } else {

                // enviar contrasena por email

                $empleado = new Empleados();
                $empleado
                    ->setIdEmpresa($empresa)
                    ->setActivo(true)
                    ->setNombre($nombre)
                    ->setAdministrador(true)
                    ->setCorreo($usuario);

                $em->persist($empleado);

                $em->flush();
                $this->addFlash('success', 'Adminitrador creado satisfactoriamente');
            }
        } else {
            $this->addFlash('error', 'El empleado ya se encuentra registrado en la empresa ' . $duplicate[0]->getIdEmpresa()->getNombre());
        }
        return $this->redirectToRoute('empresas');
    }

    /**
     * @Route("/add", name="empresas_add")
     */
    public function add(EntityManagerInterface $em, Request $request): Response
    {
        $empresas = $request->request->get('empresas');
        $nombre = $empresas['nombre'];
        $identificacion = $empresas['identificacion'];
        $siglas = $empresas['siglas'];
        $nro_contrato = $empresas['nro_contrato'];
        $telefono = $empresas['telefono'];
        $correo = $empresas['correo'];

        /*** DUPLICATES ***/
        $duplicate = $em->getRepository(Empresas::class)->findBy([
            'activo' => true,
            'nombre' => $nombre
        ]);
        if (!empty($duplicate)) {
            $this->addFlash('error', 'Ya existe la empresa ' . $nombre);
            return $this->redirectToRoute('empresas');
        }

        $duplicate = $em->getRepository(Empresas::class)->findBy([
            'activo' => true,
            'siglas' => $siglas
        ]);
        if (!empty($duplicate)) {
            $this->addFlash('error', 'Ya existe la empresa con las siglas ' . $siglas);
            return $this->redirectToRoute('empresas');
        }

        $duplicate = $em->getRepository(Empresas::class)->findBy([
            'activo' => true,
            'identificacion' => $identificacion
        ]);
        if (!empty($duplicate)) {
            $this->addFlash('error', 'Ya existe la empresa con la identificaci??n ' . $identificacion);
            return $this->redirectToRoute('empresas');
        }

        $duplicate = $em->getRepository(Empresas::class)->findBy([
            'activo' => true,
            'correo' => $correo
        ]);
        if (!empty($duplicate)) {
            $this->addFlash('error', 'Ya existe la empresa con el correo ' . $correo);
            return $this->redirectToRoute('empresas');
        }

        if ($nro_contrato != '') {
            $duplicate = $em->getRepository(Empresas::class)->findBy([
                'activo' => true,
                'nro_contrato' => $nro_contrato
            ]);
            if (!empty($duplicate)) {
                $this->addFlash('error', 'Ya existe la empresa con el contrato ' . $nro_contrato);
                return $this->redirectToRoute('empresas');
            }
        }
        if ($telefono != '') {
            $duplicate = $em->getRepository(Empresas::class)->findBy([
                'activo' => true,
                'telefono' => $telefono
            ]);
            if (!empty($duplicate)) {
                $this->addFlash('error', 'Ya existe la empresa con el tel??fono ' . $telefono);
                return $this->redirectToRoute('empresas');
            }
        }

        $duplicate = $em->getRepository(Empresas::class)->findBy([
            'activo' => true,
            'nombre' => $nombre
        ]);
        if (!empty($duplicate)) {
            $this->addFlash('error', 'Ya existe la empresa ' . $nombre);
            return $this->redirectToRoute('empresas');
        }

        /**** FIN DUPLICATE ***/

        $new_Empresa = new Empresas();
        $new_Empresa
            ->setActivo(true)
            ->setNombre($nombre)
            ->setIdentificacion($identificacion)
            ->setCorreo($correo)
            ->setNroContrato($nro_contrato)
            ->setSiglas($siglas)
            ->setTelefono($telefono)
            ->setRestore(false)
            ->setReady(true)
            ->setRestoreTest(false);
        $em->persist($new_Empresa);


        /***COPY IMAGE EMPRES**/
        $fichero = $siglas . '-' . $identificacion . '.png';
        if ($request->files->get('icono_empresa')) {
            $destino = $this->getParameter('kernel.project_dir') . "/public/images/empresas/" . $siglas . "/";
            $archivo = $request->files->get('icono_empresa');
            $archivo->move($destino, $fichero);
            $new_Empresa->setIcono($_ENV['SITE_URL'] . '/images/empresas/' . $siglas . '/' . $fichero);
        }
        /***COPY IMAGE TICKET**/
        $fichero = $siglas . '-' . $identificacion . '-ticket.png';
        if ($request->files->get('icono_ticket')) {
            $destino = $this->getParameter('kernel.project_dir') . "/public/images/empresas/" . $siglas . "/";
            $archivo = $request->files->get('icono_ticket');
            $archivo->move($destino, $fichero);
            $new_Empresa->setIconoTicket($_ENV['SITE_URL'] . '/images/empresas/' . $siglas . '/' . $fichero);
        }

        $em->flush();

        $name_database = 'db_emp' . $new_Empresa->getId();
        $name_database_prueba = 'db_prueba_emp' . $new_Empresa->getId();
        //crear la base de datos
        $this->createDB($name_database, $name_database_prueba);

        $this->addFlash('success', 'Empresa adicionada satisfactoriamente.');
        return $this->redirectToRoute('empresas');
    }

    /**
     * @Route("/upd/{id}", name="empresas_upd")
     */
    public function upd(EntityManagerInterface $em, Request $request, $id): Response
    {
        $empresas = $request->request->get('empresas');
        $nombre = $empresas['nombre'];
        $identificacion = $empresas['identificacion'];
        $siglas = $empresas['siglas'];
        $nro_contrato = $empresas['nro_contrato'];
        $telefono = $empresas['telefono'];
        $correo = $empresas['correo'];

        /*** DUPLICATES ***/
        $duplicate = $em->getRepository(Empresas::class)->findBy([
            'activo' => true,
            'nombre' => $nombre
        ]);
        if (!empty($duplicate)) {
            if (!$this->isTheSame($duplicate, $id)) {
                $this->addFlash('error', 'Ya existe la empresa ' . $nombre);
                return $this->redirectToRoute('empresas');
            }
        }

        $duplicate = $em->getRepository(Empresas::class)->findBy([
            'activo' => true,
            'siglas' => $siglas
        ]);
        if (!empty($duplicate)) {
            if (!$this->isTheSame($duplicate, $id)) {
                $this->addFlash('error', 'Ya existe la empresa con las siglas ' . $siglas);
                return $this->redirectToRoute('empresas');
            }
        }

        $duplicate = $em->getRepository(Empresas::class)->findBy([
            'activo' => true,
            'identificacion' => $identificacion
        ]);
        if (!empty($duplicate)) {
            if (!$this->isTheSame($duplicate, $id)) {
                $this->addFlash('error', 'Ya existe la empresa con la identificaci??n ' . $identificacion);
                return $this->redirectToRoute('empresas');
            }
        }

        $duplicate = $em->getRepository(Empresas::class)->findBy([
            'activo' => true,
            'correo' => $correo
        ]);
        if (!empty($duplicate)) {
            if (!$this->isTheSame($duplicate, $id)) {
                $this->addFlash('error', 'Ya existe la empresa con el correo ' . $correo);
                return $this->redirectToRoute('empresas');
            }
        }

        if ($nro_contrato != '') {
            if (!$this->isTheSame($duplicate, $id)) {
                $duplicate = $em->getRepository(Empresas::class)->findBy([
                    'activo' => true,
                    'nro_contrato' => $nro_contrato
                ]);
            }
            if (!empty($duplicate)) {
                if (!$this->isTheSame($duplicate, $id)) {
                    $this->addFlash('error', 'Ya existe la empresa con el contrato ' . $nro_contrato);
                    return $this->redirectToRoute('empresas');
                }
            }
        }
        if ($telefono != '') {
            $duplicate = $em->getRepository(Empresas::class)->findBy([
                'activo' => true,
                'telefono' => $telefono
            ]);
            if (!empty($duplicate)) {
                if (!$this->isTheSame($duplicate, $id)) {
                    $this->addFlash('error', 'Ya existe la empresa con el tel??fono ' . $telefono);
                    return $this->redirectToRoute('empresas');
                }
            }
        }

        $duplicate = $em->getRepository(Empresas::class)->findBy([
            'activo' => true,
            'nombre' => $nombre
        ]);
        if (!empty($duplicate)) {
            if (!$this->isTheSame($duplicate, $id)) {
                $this->addFlash('error', 'Ya existe la empresa ' . $nombre);
                return $this->redirectToRoute('empresas');
            }
        }

        /**** FIN DUPLICATE ***/

        /** @var Empresas $new_Empresa */
        $new_Empresa = $em->getRepository(Empresas::class)->find($id);

        $new_Empresa
            ->setActivo(true)
            ->setNombre($nombre)
            ->setIdentificacion($identificacion)
            ->setCorreo($correo)
            ->setNroContrato($nro_contrato)
            ->setSiglas($siglas)
            ->setTelefono($telefono);



        /***COPY IMAGE EMPRES**/
        $fichero = $siglas . '-' . $identificacion . '.png';
        if ($request->files->get('icono_empresa')) {
            $destino = $this->getParameter('kernel.project_dir') . "/public/images/empresas/" . $siglas . "/";
            $archivo = $request->files->get('icono_empresa');
            $archivo->move($destino, $fichero);
            $new_Empresa->setIcono($_ENV['SITE_URL'] . '/images/empresas/' . $siglas . '/' . $fichero);
        }
        /***COPY IMAGE TICKET**/
        $fichero_ticket = $siglas . '-' . $identificacion . '-ticket.png';
        if ($request->files->get('icono_ticket')) {
            $destino = $this->getParameter('kernel.project_dir') . "/public/images/empresas/" . $siglas . "/";
            $archivo = $request->files->get('icono_ticket');
            $archivo->move($destino, $fichero_ticket);
            $new_Empresa->setIconoTicket($_ENV['SITE_URL'] . '/images/empresas/' . $siglas . '/' . $fichero_ticket);
        }
        $em->persist($new_Empresa);
        $em->flush();
        $this->addFlash('success', 'Empresa modificada satisfactoriamente.');
        return $this->redirectToRoute('empresas');
    }

    public function isTheSame(array $empresas, $id)
    {
        /** @var Empresas $emp */
        foreach ($empresas as $emp) {
            if ($emp->getId() != $id)
                return false;
        }
        return true;
    }

    public function createDB($name, $name_prueba)
    {
        $conexion = new \mysqli($_ENV["HOST"], $_ENV["USER"], $_ENV["PASS"]);
        if ($conexion->connect_error) {
            die("conexion fallida " . $conexion->connet_error);
        }
        $sql = "CREATE DATABASE " . $name;
        if ($conexion->query($sql) === true) {
            $sql = "CREATE DATABASE " . $name_prueba;
            if ($conexion->query($sql) === true) {
                return 'true';
            } else
                return 'false';
        }
        return 'false';
    }


    /**
     * @Route("/restore", name="empresas_restore")
     */
    public function reastoreBackup(
        EntityManagerInterface $em,
        Request $request,
        MigratorExcecuter $migratorExcecuter
    ) {

        $id = $request->request->get('id');
        $fullLoading = false;

        /** @var Empresas $empresa */
        $empresa = $em->getRepository(Empresas::class)->find($id);

        if ($empresa) {

            $unit = $empresa->getNombre();
            $phone = $empresa->getTelefono();
            $email = $empresa->getCorreo();

            // cuando se no queden mas migraciones por ejecutar, entonces ejecutar Fixtures
            if ($migratorExcecuter->excecuteMigrations($id))
                return $this->json(['full_loading' => $fullLoading]);

            // load initial data
            if ($migratorExcecuter->loadInitFixtures($id, $unit, $phone, $email))
                return $this->json(['full_loading' => $fullLoading]);

            // load all the Fixtuares
            if ($migratorExcecuter->excecuteFixtures($id))
                return $this->json(['full_loading' => $fullLoading]);

            $fullLoading = true;

            $empresa->setRestore(true);
            $em->persist($empresa);
            $em->flush();
        }
        return $this->json(['full_loading' => $fullLoading]);
        // $this->addFlash('success', 'Bases de Datos restaurada satisfactoriamente');
        // return $this->redirectToRoute('empresas');
    }

    /**
     * @Route("/restore_prueba", name="empresas_restore_prueba")
     */
    public function reastoreBackupPrueba(
        EntityManagerInterface $em,
        Request $request,
        MigratorExcecuter $migratorExcecuter
    ) {
        $id = $request->request->get('id');

        $fullLoading = false;

        /** @var Empresas $empresa */
        $empresa = $em->getRepository(Empresas::class)->find($id);
        if ($empresa) {

            $unit = $empresa->getNombre();
            $phone = $empresa->getTelefono();
            $email = $empresa->getCorreo();

            // cuando se no queden mas migraciones por ejecutar, entonces ejecutar Fixtures
            if (!$migratorExcecuter->excecuteMigrations($id, true)) {
                // load initial data
                if (!$migratorExcecuter->loadInitFixtures($id, $unit, $phone, $email, true))
                    $fullLoading = true;
            }
            // load test data
            // $migratorExcecuter->loadTestFixtures($id);

            $empresa->setRestoreTest(true);
            $em->persist($empresa);
            $em->flush();
        }
        return $this->json(['full_loading' => $fullLoading]);
        // return $this->redirectToRoute('empresas');
    }


    //********************************************//
    // Funciones que reastauran la base de datos //
    //******************************************//

    //FUNCION 1
    function restoreDatabaseTables($dbHost, $dbUsername, $dbPassword, $dbName, $filePath)
    {
        // Connect & select the database
        $db = new \mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

        // Temporary variable, used to store current query
        $templine = '';

        // Read in entire file
        $lines = file($filePath);

        $error = '';

        // Loop through each line
        foreach ($lines as $line) {
            // Skip it if it's a comment
            if (substr($line, 0, 2) == '--' || $line == '') {
                continue;
            }

            // Add this line to the current segment
            $templine .= $line;

            // If it has a semicolon at the end, it's the end of the query
            if (substr(trim($line), -1, 1) == ';') {
                // Perform the query
                if (!$db->query($templine)) {
                    $error .= 'Error performing query "<b>' . $templine . '</b>": ' . $db->error . '<br /><br />';
                }

                // Reset temp variable to empty
                $templine = '';
            }
        }
        return !empty($error) ? $error : true;
    }

    //FUNCION 2-----no se usa
    function restore2($nameDB)
    {
        $restorePoint = addslashes('../src/Controller/backup/db.sql');
        $sql = explode(";", file_get_contents($restorePoint));
        $totalErrors = 0;
        for ($i = 0; $i < (count($sql) - 1); $i++) {
            if (SGBD::sql("$sql[$i];", $nameDB)) {
            } else {
                $totalErrors++;
            }
        }
        if ($totalErrors <= 0) {
            echo "Restauraci??n completada con ??xito";
        } else {
            echo "Ocurrio un error inesperado, no se pudo hacer la restauraci??n completamente";
        }
    }
}
