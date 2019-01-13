<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class WelcomeController extends AbstractController
{
    /**
     * @Route("/", name="welcome")
     */
    public function index()
    {
        return $this->render('welcome/index.html.twig', [
            'controller_name' => 'WelcomeController',
        ]);
    }
    /**
     * @Route("/hello/{name}", name="hello_page", requirements={"name"="[A-Za-z]+"})
     * @param string $name
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function hello(string $name = NULL) 
    {
        $some_name = $name;
        return $this->render('hello_page.html.twig',compact('some_name'));
    }
}
