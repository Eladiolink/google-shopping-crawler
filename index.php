<?php

use Eladiolink\Crawler\Model\Buscador;
use Eladiolink\Crawler\Model\CrawlerItens;

require_once "vendor/autoload.php";
use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

$browser = new HttpBrowser(HttpClient::create());

$buscador = new Buscador($browser);

$buscador->request('GET','https://www.google.com');

<<<<<<< HEAD
$html = $buscador->search("Nintendo Switch");
=======
$html = $buscador->search("AJKAJSKAJSAKS");
>>>>>>> 24e0e1734ce30e9d07872a90738fa10f5f58fe68

$crawler = new CrawlerItens( );

$value = $crawler->getItensArray($html);
<<<<<<< HEAD
//print_r($crawler->getItens($html));
//print_r($value);


=======
echo "<pre>";
print_r($value);
echo "</pre>";

// foreach($value as $item){
//    if(strtolower($item['title']) == "processador ryzen 5 3600 amd am4") {
//       echo "{$item['title']} - {$item['price']}".PHP_EOL;
//     } 
// }
>>>>>>> 24e0e1734ce30e9d07872a90738fa10f5f58fe68

