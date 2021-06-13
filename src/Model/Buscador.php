<?php
namespace Eladiolink\Crawler\Model;

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\DomCrawler\Crawler;

class Buscador{

    private  HttpBrowser $browser;
    private  Crawler     $response;
    
    public function __construct( HttpBrowser $HttpBrowser )
    {
        $this->browser = new $HttpBrowser(HttpClient::create());
    }

    public function request(string $method='GET', string $url):void
    {
        $this->response = $this->browser->request('GET', 'https://www.google.com');
    }

    public function search(string $searchParam): string
    {   
     
        $form = $this->response->selectButton("Pesquisa Google")->form();
        $form['q'] = $searchParam;

        $crawler = $this->browser->submit($form);

        $http = $this->browser->clickLink('Shopping');
  
        return  $http->html();
    }
}