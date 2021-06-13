<?php

namespace Eladiolink\Crawler\Model;

use Symfony\Component\DomCrawler\Crawler;


class CrawlerItens 
{
    private Crawler $crawler;
    
    public function __construct()
    {
        $this->crawler = new Crawler() ;    
    }

    public function getItens(string $html): array
    {   
        $this->crawler->addHtmlContent($html);
        $elementosCurso = $this->crawler->filter("div.xcR77");
        $array=[];
        if(sizeof($elementosCurso)!=0){

           foreach($elementosCurso as $elemento){
              array_push($array, $elemento->textContent);
            }
        }

        return $array;
    }
}