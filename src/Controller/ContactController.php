<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request,\Swift_Mailer $mailer)
    {
        dump($request);
        $our_form  = $this->createForm(ContactType::class);
        $this->addFlash('info','Flash message info');
        $our_form->handleRequest($request);
        if ($our_form->isSubmitted() && $our_form->isValid()) {

        
            $contactFormData = $our_form->getData();
            dump($contactFormData);
            $message = (new \Swift_Message('You got mail'))
            ->setFrom('dushyant@htmtinteractive.com')
            ->setTo('dushyantjoshia@gmail.com')
            ->setBody(
                $contactFormData['message'],
                'text/plain'                
            );
            $mailer->send($message);
            $this->addFlash('success','message was sent');
            
        // do something interesting here
        }
        return $this->render('contact/index.html.twig', [
            'our_form' => $our_form->createView(),
        ]);
    }
}
