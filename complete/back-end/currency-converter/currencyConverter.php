<?php

require __DIR__."./vendor/autoload.php";
use GuzzleHttp\Client;

class currencyConverter
{
    private string $from;
    private string $to;
    public mixed $response;

    public function __construct($currencyFrom, $currencyTo)
    {
        $this->from = trim(strtolower($currencyFrom));
        $this->to = trim(strtolower($currencyTo));
        $this->converter();
    }

    private function converter(): void
    {
        try  {
            $client = new Client(['curl' => [CURLOPT_SSL_VERIFYPEER => false]]);
            $response = $client->request('GET', 'https://www.google.com/search?q=' . $this->from . '+to+' . $this->to . '');
            $htmlString = $response->getBody();
            libxml_use_internal_errors(true);
            $doc = new DOMDocument();
            $doc->loadHTML($htmlString);
            $xpath = new DOMXPath($doc);
            $titles = $xpath->evaluate('//div[@class="BNeawe iBp4i AP7Wnd"]//div[@class="BNeawe iBp4i AP7Wnd"]');
            foreach ($titles as $key => $title) {
                $this->response = (float) filter_var($title->textContent, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            }
        } catch (Exception $e) {
            $this->response = $e->getMessage();
        }
    }
}
