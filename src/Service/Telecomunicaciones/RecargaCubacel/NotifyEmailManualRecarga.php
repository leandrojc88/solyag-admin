<?php

namespace App\Service\Telecomunicaciones\RecargaCubacel;

use App\Repository\EmpresasRepository;
use App\Repository\Telecomunicaciones\ServicioEmpresaRepository;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;

class NotifyEmailManualRecarga
{

    private ServicioEmpresaRepository $servicioEmpresaRepository;
    private EmpresasRepository $empresasRepository;
    private MailerInterface $mailer;

    public function __construct(
        ServicioEmpresaRepository $servicioEmpresaRepository,
        EmpresasRepository $empresasRepository,
        MailerInterface $mailer
    ) {

        $this->servicioEmpresaRepository = $servicioEmpresaRepository;
        $this->empresasRepository = $empresasRepository;
        $this->mailer = $mailer;
    }


    public function __invoke($id_empresa)
    {

        try {

            $recargas = $this->servicioEmpresaRepository->getRecargaCubacelManual($id_empresa);
            $empresa = $this->empresasRepository->find($id_empresa);

            if ($recargas) {
                // enviar email

                $cantidad = count($recargas);

                $emailsDir = explode("|", $_ENV['EMAILS_CUBACEL_MANUAL']);

                $email = (new TemplatedEmail())
                    ->from(new Address($_ENV['EMAIL_ADMIN'], 'Administrador de credenciales'))
                    // ->to($_ENV['EMAILS_CUBACEL_MANUAL'])
                    ->subject("Existen $cantidad Recargas Manuales sin procesar!")
                    ->htmlTemplate('emails/notify-recargas-manuales.html.twig')
                    ->context([
                        'cantidad' => $cantidad,
                        'empresa' => $empresa->getNombre(),
                        'url_sitema' => $_ENV["SITE_URL"]
                    ]);

                foreach ($emailsDir as $key => $value) {
                    if ($key == 0) {
                        $email->to($value);
                    } else
                        $email->addTo($value);
                }

                $this->mailer->send($email);
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
