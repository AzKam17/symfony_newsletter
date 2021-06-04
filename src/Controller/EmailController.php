<?php

namespace App\Controller;

use App\Entity\MailTemplates;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class EmailController extends AbstractController
{
    /**
     * @Route("/email_templates_data/{id}", name="email_templates_data")
     * @param Request $request
     * @return Response
     */
    public function email_templates_data(MailTemplates $templates, SerializerInterface $serializer): Response
    {
        return new Response($serializer->serialize($templates->getData(), 'json'), 200);
        /*$data = $request->getContent();
        return $this->render('email/index.html.twig', [
            'controller_name' => 'EmailController',
        ]);*/
    }

    /**
     * @Route("/visualize/{id}", name="visualize", methods={"POST"})
     */
    public function visualize(MailTemplates $templates, Request $request, LoggerInterface $logger)
    {
        $jsonData = $request->getContent();

        $arr = explode('&', $jsonData);
        $final = [];

        foreach ($arr as $a)
        {
            $f = $this->arrAss($a);
            foreach ($f as $k => $v)
            {
                $final[$k] = $v;
            }
        }


        $logger->info("@@@@@@@@@@@@@@@@@@@@@".json_encode($final));


        return $this->render($templates->getPath(), $final);
    }

    /**
     * @Route("/email/{id}", name="email")
     * @param MailTemplates $templates
     * @param Request $request
     * @param MailerInterface $mailer
     */
    public function send_mail(MailTemplates $templates, Request $request, MailerInterface $mailer)
    {
        $jsonData = $request->getContent();
        $final = json_decode($jsonData, true);


        $rec = explode(";", $final['receiver']);
        for ($i = 0; $i < sizeof($rec); $i++)
        {
            $email = (new TemplatedEmail())
                ->from("azkamadou17@gmail.com")
                ->to($rec[$i])
                ->subject($final['object'])
                ->htmlTemplate($templates->getPath())
                ->context($final);

            $mailer->send($email);
        }



        return new Response("Mail Sent", 200);
    }

    public function arrAss(string $str)
    {
        $arr = explode('=', $str);
        return [$arr[0] => $arr[1]];
    }
}
