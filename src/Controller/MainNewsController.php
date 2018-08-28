<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainNewsController extends AbstractController
{
    /**
     * @Route("/", name="main_news")
     */
    public function index()
    {
        $news = $this->getNews();

        return $this->render('main_news/index.html.twig', [
            'controller_name' => 'MainNewsController',
            'news' => $news
        ]);
    }

    public function getNews()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'www.mocky.io/v2/5b082d3b3200008000700208');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json')); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        
        $response = curl_exec($ch);
        
        return json_decode($response);
    }
}
