<?php

use Eladiolink\Crawler\Model\Buscador;
use Eladiolink\Crawler\Model\CrawlerItens;

require_once "vendor/autoload.php";
use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

$browser = new HttpBrowser(HttpClient::create());

$buscador = new Buscador($browser);

$buscador->request('GET','https://www.google.com');

$html = $buscador->search("AJKAJSKAJSAKS");

$crawler = new CrawlerItens( );

$value = $crawler->getItensArray($html);
echo "<pre>";
print_r($value);
echo "</pre>";

// foreach($value as $item){
//    if(strtolower($item['title']) == "processador ryzen 5 3600 amd am4") {
//       echo "{$item['title']} - {$item['price']}".PHP_EOL;
//     } 
// }

