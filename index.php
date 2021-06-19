<?php

use Eladiolink\Crawler\Model\Buscador;
use Eladiolink\Crawler\Model\CrawlerItens;

require_once "vendor/autoload.php";
use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

$browser = new HttpBrowser(HttpClient::create());

$buscador = new Buscador($browser);

$buscador->request('GET','https://www.google.com');

$html = $buscador->search("RTX 3090");

$crawler = new CrawlerItens( );

$value = $crawler->getItensArray($html);

$patern2='/'."Processador".'/';
$patern='/'."Ryzen 5 2400".'/';
$notpater='/'."null".'/';

$list = array_filter($value, function($iten) use ($patern , $patern2, $notpater) {
    if( preg_match($patern2, $iten['title']) && preg_match($patern, $iten['title']) && !preg_match($notpater, $iten['title']) ) {
        return  $iten;
      }

});

printf("Hello World");

echo "<pre>";
    print_r($value);
echo "<pre/>";

echo $html;

  //  print_r($list);
