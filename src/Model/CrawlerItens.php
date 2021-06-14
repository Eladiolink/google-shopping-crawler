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

    public function getItensArray(string $html): array
    {
        $this->crawler->addHtmlContent($html);
        $elementosTitle = $this->crawler->filter("div.rgHvZc");
        $elementosPrice = $this->crawler->filter("span.HRLxBb");
        
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