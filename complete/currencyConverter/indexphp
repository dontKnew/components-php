<?php
require_once  "vendor/autoload.php";
$client = new \GuzzleHttp\Client(array( 'curl' => array(CURLOPT_SSL_VERIFYPEER => false)));
$from = trim(strtolower($_GET['from']));
$to = trim(strtolower($_GET['to']));
$response = $client->request('GET', 'https://www.google.com/search?q='.$from.'+to+'.$to.'');
//$response = $client->request('GET', 'https://books.toscrape.com/');
$htmlString = (string) $response->getBody();
libxml_use_internal_errors(true);
$doc = new DOMDocument();
$doc->loadHTML($htmlString);
$xpath = new DOMXPath($doc);
$titles = $xpath->evaluate('//div[@class="BNeawe iBp4i AP7Wnd"]//div[@class="BNeawe iBp4i AP7Wnd"]');
foreach ($titles as $key => $title) {
    echo ( (float)filter_var($title->textContent, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION ) ); // float(55.35)
}



<script>
function fromCurrency() {
    let rateBox = document.querySelector(".rate-box");
    rateBox.textContent = "";
    
    let  fromInput = document.querySelector("#cur-input-1").value;
    let  toInput = document.querySelector("#cur-input-2").value;
    
    let  fromCurrency = document.querySelector(".cur-item-1").value;
    let  toCurrency = document.querySelector(".cur-item-2").value;
    
    if(fromInput!=='' && toInput!=='' && fromCurrency !== toCurrency ){
        if(fromInput!==0 && fromInput!==1 ){
         fromCurrency  = fromInput+fromCurrency; 
     }
        let theurl = 'https://rapidexworldwide.com/include/currency_converter/index.php?from='+fromCurrency+'&to='+toCurrency+'';
        let xmlHttpReq = new XMLHttpRequest();
        xmlHttpReq.open("GET", theurl, false);
        xmlHttpReq.onload = function(){
            if(this.status == 200){
                rateBox.textContent =  fromInput+" "+document.querySelector(".cur-item-1").value+" = "+this.responseText+" "+toCurrency; 
            }else {
                console.warn("Response :", this.responseText);
            }
        }
            
      xmlHttpReq.send(null);
    }
}

function toCurrency() {
    let rateBox = document.querySelector(".rate-box");
    rateBox.textContent = ""
        
    let  fromInput = document.querySelector("#cur-input-1").value;
    let  toInput = document.querySelector("#cur-input-2").value;
    
    let  fromCurrency = document.querySelector(".cur-item-1").value;
    let  toCurrency = document.querySelector(".cur-item-2").value;
    
    if(toInput!=='' && fromInput!=='' && fromCurrency !== toCurrency ){
      if(toInput!==0 && toInput!==1){
          toCurrency  = toInput+toCurrency; 
        }
    }
    let theurl = 'https://rapidexworldwide.com/include/currency_converter/index.php?to='+fromCurrency+'&from='+toCurrency+'';
    console.warn(theurl);
      let xmlHttpReq = new XMLHttpRequest();
      xmlHttpReq.open("GET", theurl, false);
      xmlHttpReq.onload = function(){
            if(this.status == 200){
                rateBox.textContent =  toInput+" "+document.querySelector(".cur-item-2").value+" = "+this.responseText+" "+fromCurrency;
            }else {
                console.warn("Response :", this.responseText);
            }
          
      }
      xmlHttpReq.send(null);

}

</script>