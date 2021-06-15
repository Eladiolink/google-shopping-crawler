<?php

use Eladiolink\Crawler\Model\Buscador;
use Eladiolink\Crawler\Model\CrawlerItens;

require_once "vendor/autoload.php";
use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

$browser = new HttpBrowser(HttpClient::create());

$buscador = new Buscador($browser);

$buscador->request('GET','https://www.google.com');

$html = $buscador->search("Nintendo Switch");

$crawler = new CrawlerItens( );

$value = $crawler->getItensArray($html);
//print_r($crawler->getItens($html));
//print_r($value);



