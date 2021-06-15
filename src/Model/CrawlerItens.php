<?php

namespace Eladiolink\Crawler\Model;

use Symfony\Component\DomCrawler\Crawler;

use function PHPSTORM_META\map;

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
    
    public function getItensArray(string $html): array
    {
        $this->crawler->addHtmlContent($html);
        $elementosTitle = iterator_to_array($this->crawler->filter("div.rgHvZc")->getIterator());
        $elementosPrice = iterator_to_array($this->crawler->filter("span.HRLxBb")->getIterator());
        
        $array=[];
        
        if(sizeof( $elementosTitle) != 0 && sizeof($elementosTitle) ==  sizeof($elementosPrice) ) {
            foreach($elementosTitle as $index => $elementoTitle){
                $array[$index]=[
                    "title" => $elementoTitle->textContent
                    ];
                }

            foreach($elementosPrice as $index => $elementoPrice){
                $array[$index]+=[
                    "price" => $elementoPrice->textContent
                    ];
            }
         }

        return $array;
    }
}