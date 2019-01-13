<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ContactType;
class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index()
    {
        $our_form  = $this->createForm(ContactType::class);
        return $this->render('contact/index.html.twig', [
            'our_form' => $our_form->createView(),
        ]);
    }
}
