<?php
defined('AJAX_CUS') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name: A to Z SEO Tools - PHP Script
 * @copyright 2017 ProThemes.Biz
 *
 */

//AJAX ONLY 

//POST REQUEST Handler
if ($_SERVER['REQUEST_METHOD'] =='POST'){
    
    $authCode = '';
    $authError = true;
    $authData = array();
    if(isset($_POST['authcode'])){
        $authCode = raino_trim($_POST['authcode']);
                
        if(isset($_SESSION[N_APP.'sec'.$authCode])){
            $authData = $_SESSION[N_APP.'sec'.$authCode];
            if(time() <= $authData[1]){
                $authError = false;
                $authData[0] = $authData[0] +1;
                $_SESSION[N_APP.'sec'.$authCode] = $authData;
            }
        }
    }
    if($authError)
        die('Invalid authentication code!');
        
  //Blog Ping
    if(isset($_POST['blogPing'])){
        if(isset($_POST['pingUrl'])){
            $pingUrl = raino_trim($_POST['pingUrl']);
            $myBlogName = raino_trim($_POST['blogName']);
            $myBlogUrl = raino_trim($_POST['blogUrl']);
            $myBlogUpdateUrl = raino_trim($_POST['blogUpdateUrl']);
            $myBlogRSSFeedUrl = raino_trim($_POST['blogRssUrl']);
            $errorMsg = $lang['221'];
            $outData = xmlRpcPing($pingUrl,$myBlogName,$myBlogUrl,$myBlogUpdateUrl,$myBlogRSSFeedUrl,'Thanks for the ping.');
            echo $outData["message"];
            die();
        }else{
            echo $lang['4'];
            die();
        }
    }
    
    //Google Cache Checker
    if(isset($_POST['googleCache'])){
        if(isset($_POST['sitelink'])) {
            $siteLink = clean_with_www(raino_trim($_POST['sitelink']));
            $data = googleCache("http://".$siteLink);
            if ($data != "") {
                echo $data;
                die();
            }
            else {
                echo '0';
                die();
            }
            
        }
        else {
             echo '0';
             die();
        } 
    }
    
    //SEOMoz Page / Domain Authority Checker
    if(isset($_POST['mozAuthority'])){
        if(isset($_POST['sitelink'])) {
        $query =  "SELECT * FROM pr24 where id='1'";
        $result = mysqli_query($con,$query);
        $resArr = mysqli_fetch_array($result);
        extract($resArr);
    
        if($moz_access_id == null || $moz_access_id== '')
        $error = $lang['209'];
    
        if($moz_secret_key == null || $moz_secret_key== '')
        $error = $lang['210'];
        
        if (!isset($error)) {
        $siteLink = raino_trim($_POST['sitelink']);
        if($siteLink != ""){
        $siteLink = "http://".clean_with_www($siteLink);
        if (!filter_var($siteLink, FILTER_VALIDATE_URL) === false) {
        $my_url = parse_url($siteLink);
        $host = $my_url['host'];
        $seoMoz = seoMoz($host,$moz_access_id,$moz_secret_key);
        $mozRank = $seoMoz[0];
        $pageAuth = $seoMoz[1];
        $domainAuth = $seoMoz[2];
        if(isset($_POST['domainAuthority'])) {
        if ($domainAuth != "") {
            echo $domainAuth;
            die();
        } } elseif(isset($_POST['pageAuthority'])){
        if ($pageAuth != "") {
            echo $pageAuth;
            die();
        }} } } } }
        echo '0';
        die();
    }
    
    //Keyword Position Checker 
    if(isset($_POST['keywordPos'])){
    
    if(isset($_POST['keyword'])) {  
     $searchKeyword = raino_trim($_POST['keyword']);
     if($searchKeyword == "" || $searchKeyword == null){
        echo $lang['168'].'::|::'.$lang['168'];
        die();
     }
     $searchUrl = "http://".clean_with_www(raino_trim($_POST['searchUrl']));
     $keyPos = raino_trim($_POST['pos']);
     $yahooDomain = "yahoo.com";
     $googleDomain = "google.com";
     $googleRes = googleRank($searchUrl,$searchKeyword,$keyPos,$googleDomain);
     $yahooRes = yahooRank($searchUrl,$searchKeyword,$keyPos,$yahooDomain);
     $resultData = ($googleRes[1] == "" ? $lang['167']." $keyPos" : ordinal($googleRes[1])." ".$lang['169']). "::|::". ($yahooRes[1] == "" ? $lang['167']." $keyPos" : ordinal($yahooRes[1])." ".$lang['169']);
     echo $resultData;
     die();
    }else{
        echo $lang['4'].'::|::'.$lang['4'];
        die();
    }
    }
    
    //Backlink Maker
    if(isset($_POST['backlink'])) {
        if(isset($_POST['sitelink'])) {
            $siteLink = raino_trim($_POST['sitelink']);
            $data = simpleCurlGET($siteLink);
            echo '1';      
        } else {
             echo '0';
        }
        die();
    }
    
    //XML Sitemap Generator
    if(isset($_POST['sitemap'])){
      $my_url = raino_trim($_POST['url']);        

      if(substr($my_url, 0, 7) !== 'http://' && substr($my_url, 0, 8) !== 'https://')
          $my_url = 'http://'.$my_url;

      $outData = genSiteLinks($my_url);
      
      if(!is_array($outData)){
          if($outData !== NULL)
              die('DOWN');
      } 
      $outDataCount = count($outData);  
      $loop = 1;
      foreach ($outData as $link){
        if ($loop == $outDataCount){
            $genData .=  Trim($link);
        }else{
            $genData .=  Trim($link) . PHP_EOL;
        }
        $loop++;
      }
      echo $outDataCount.'::|::'.$genData;
      die();
    }
    
    //Plagiarism Checker
    if(isset($_POST['plagiarism'])) {
        
    $type= (int)raino_trim($_POST['type']);    
    $check_data = stripslashes(Trim($_POST['data']));
    
    if($type == 3){
        //Google CSE API (New)
        $check_data = str_replace("’", "'", $check_data);
        $check_data = strtolower($check_data);
        $gcheck_data = urlencode('"' . $check_data . '"');
        if(googleCSEQueryCheck($gcheck_data)){
            die('1'); //Matched
        }else{
            die('2'); //No Match Found
        }
    } elseif($type == 2) {
        //ProThemes Plagiarism API
        $url = 'http://googleapi.prothemes.biz/api.php?data='.urlencode($check_data).'&domain='.$_SERVER['HTTP_HOST'].'&code='.$item_purchase_code;
        $palData = getMyData($url);
        echo $palData;
        die();  
    } elseif($type == 1) {
        //Google Direct Search
        $search_keyword = str_replace("’", "'", $check_data);
        $search_keyword = '"'.$search_keyword.'"';
        $googleDomains = array('google.com', 'google.ad', 'google.ae', 'google.com.af', 'google.com.ag', 'google.com.ai', 'google.al', 'google.am', 'google.co.ao', 'google.com.ar', 'google.as', 'google.at', 'google.com.au', 'google.az', 'google.ba', 'google.com.bd', 'google.be', 'google.bf', 'google.bg', 'google.com.bh', 'google.bi', 'google.bj', 'google.com.bn', 'google.com.bo', 'google.com.br', 'google.bs', 'google.bt', 'google.co.bw', 'google.by', 'google.com.bz', 'google.ca', 'google.cd', 'google.cf', 'google.cg', 'google.ch', 'google.ci', 'google.co.ck', 'google.cl', 'google.cm', 'google.cn', 'google.com.co', 'google.co.cr', 'google.com.cu', 'google.cv', 'google.com.cy', 'google.cz', 'google.de', 'google.dj', 'google.dk', 'google.dm', 'google.com.do', 'google.dz', 'google.com.ec', 'google.ee', 'google.com.eg', 'google.es', 'google.com.et', 'google.fi', 'google.com.fj', 'google.fm', 'google.fr', 'google.ga', 'google.ge', 'google.gg', 'google.com.gh', 'google.com.gi', 'google.gl', 'google.gm', 'google.gp', 'google.gr', 'google.com.gt', 'google.gy', 'google.com.hk', 'google.hn', 'google.hr', 'google.ht', 'google.hu', 'google.co.id', 'google.ie', 'google.co.il', 'google.im', 'google.co.in', 'google.iq', 'google.is', 'google.it', 'google.je', 'google.com.jm', 'google.jo', 'google.co.jp', 'google.co.ke', 'google.com.kh', 'google.ki', 'google.kg', 'google.co.kr', 'google.com.kw', 'google.kz', 'google.la', 'google.com.lb', 'google.li', 'google.lk', 'google.co.ls', 'google.lt', 'google.lu', 'google.lv', 'google.com.ly', 'google.co.ma', 'google.md', 'google.me', 'google.mg', 'google.mk', 'google.ml', 'google.com.mm', 'google.mn', 'google.ms', 'google.com.mt', 'google.mu', 'google.mv', 'google.mw', 'google.com.mx', 'google.com.my', 'google.co.mz', 'google.com.na', 'google.com.nf', 'google.com.ng', 'google.com.ni', 'google.ne', 'google.nl', 'google.no', 'google.com.np', 'google.nr', 'google.nu', 'google.co.nz', 'google.com.om', 'google.com.pa', 'google.com.pe', 'google.com.pg', 'google.com.ph', 'google.com.pk', 'google.pl', 'google.pn', 'google.com.pr', 'google.ps', 'google.pt', 'google.com.py', 'google.com.qa', 'google.ro', 'google.ru', 'google.rw', 'google.com.sa', 'google.com.sb', 'google.sc', 'google.se', 'google.com.sg', 'google.sh', 'google.si', 'google.sk', 'google.com.sl', 'google.sn', 'google.so', 'google.sm', 'google.sr', 'google.st', 'google.com.sv', 'google.td', 'google.tg', 'google.co.th', 'google.com.tj', 'google.tk', 'google.tl', 'google.tm', 'google.tn', 'google.to', 'google.com.tr', 'google.tt', 'google.com.tw', 'google.co.tz', 'google.com.ua', 'google.co.ug', 'google.co.uk', 'google.com.uy', 'google.co.uz', 'google.com.vc', 'google.co.ve', 'google.vg', 'google.co.vi', 'google.com.vn', 'google.vu', 'google.ws', 'google.rs', 'google.co.za', 'google.co.zm', 'google.co.zw', 'google.cat');
        $random_domain =array_rand($googleDomains,1);
        $googleDomain = $googleDomains[$random_domain];
        
        $googleUrl = 'https://www.' . $googleDomain . '/search?hl=en&q=' . urlencode($search_keyword);
        $pageData = curlGET_Text($googleUrl);
        
        if(str_contains($pageData,'No results found for')){
            //No Match Found
            die('2');
        }else{
            //Matched
            die('1');   
        }
    }
    }
}


//Get Website Screenshot
if(isset($_GET['getWebSnap'])) {
    $site = raino_trim($_GET['site']);
    $token = raino_trim($_GET['token']);
    $tokenKey = raino_trim($_SESSION['getWebSnap']);
    if(!isset($token))
    die();
    if($token==null||$token=="")
    die();
    if($tokenKey != $token)
    die();
    $site = clean_url($site); $site = "http://$site";
    $site = parse_url(Trim($site));
    $host = $site['host'];
    if (file_exists(HEL_DIR."site_snapshot/$host.jpg")) {
    $file = HEL_DIR."site_snapshot/$host.jpg";
    }else {
    $file = HEL_DIR."site_snapshot/no-preview.png";
    }
    header("Content-type: image/png");
    readfile("$file");
    die();
}


//Upgrade / Add Ons Installation - Only Authenticated Users
if(isset($_GET['upgrade'])){

    if(isset($_GET['itemCode'])){
    $itemCode = raino_trim($_GET['itemCode']);  
    if($itemCode == $item_purchase_code){
    //Delete the Index!
    unlink(ROOT_DIR."index.php");
    //Delete the old files if needed!
    if(isset($_GET['delUy'])){
    $delUy = raino_trim($_GET['delUy']); 
    unlink($delUy); 
    }
    }
    //Finished  - Start the Installation
    die('1');
    }
    if(isset($_GET['authCode'])){
    $userAuthCode = raino_trim($_GET['authCode']);
    if($authCode == $userAuthCode){
    //Delete the Index!
    unlink(ROOT_DIR."index.php");
    //Delete the old files if needed!
    if(isset($_GET['delUy'])){
    $delUy = raino_trim($_GET['delUy']); 
    unlink($delUy); 
    }
    //Finished  - Start the Installation
    die('1');
    }  
    }
    //Unknown Error
    echo "0";
    die();
}

if(isset($_POST['getMobileFriendly'])){
   
    $my_url = raino_trim($_POST['url']);
    $my_url = clean_with_www($my_url); 
    
    $myHost = ucfirst($my_url);
    $my_url = "http://$my_url";
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_URL, 'https://www.googleapis.com/pagespeedonline/v3beta1/mobileReady?url=' . $my_url);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch,CURLOPT_TIMEOUT, 1000);
    $data = curl_exec($ch);
    curl_close($ch);

    $jsonData = json_decode($data,true);
    
    if($jsonData != null || $jsonData == ""){
    $mobileScoreData = Trim($jsonData['ruleGroups']['USABILITY']['score']);
    $mobileScore = ($mobileScoreData == '' ? 0 : $mobileScoreData);
    
    $isMobileFriendly = Trim($jsonData['ruleGroups']['USABILITY']['pass']);
    $isMobileFriendly = filter_var($isMobileFriendly, FILTER_VALIDATE_BOOLEAN);
    
    $screenData = str_replace("_","/",$jsonData['screenshot']['data']);
    $screenData = str_replace("-","+",$screenData);
    }else{
        $error = "1";
    }

    if(!isset($error)){
    if($mobileScoreData != ""){
    if($isMobileFriendly){
        $isMobileFriendlyMsg = $lang['AD82'];
        $isMobileFriendlyColor = "2cc36b";
    }
    else{
        $isMobileFriendlyMsg = $lang['AD83'];
        $isMobileFriendlyColor = "c0392b";
    }
    
    echo '              <div class="mobileRes">
                        <br />         
                         <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td><strong>'.$lang['24'].'</strong></td>
                                <td>'.$myHost.'</td>
                            </tr>
                            <tr>
                                <td><strong>'.$lang['69'].'</strong></td>
                                <td style="color: #'.$isMobileFriendlyColor.'; font-size: 18px;">'.$isMobileFriendlyMsg.'</td>
                            </tr>
                            <tr>
                                <td><strong>'.$lang['AD84'].'</strong></td>
                                <td>      
                                <div><input type="text" data-readonly="true" data-fgcolor="#'.$isMobileFriendlyColor.'" data-height="90" data-width="90" value="'.$mobileScore.'" class="knob" readonly="readonly" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px; margin-left: -69px; border: 0px none; background: none repeat scroll 0% 0% transparent; font: bold 18px Arial; text-align: center; color: rgb(60, 141, 188); padding: 0px;" /></div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>'.$lang['AD85'].'</strong></td>
                                <td><img src="data:image/jpeg;base64,'.$screenData.'" /></td>
                            </tr>
                        </tbody></table>
                        </div>';
    die();
    }else{
        echo '
        <div class="mobileRes">
        <br />   
        <div class="alert alert-error">
        <strong>Alert!</strong> '.$lang['327'].'
        </div>
        </div>';
        die();
    }
    }else{
        echo '
        <div class="mobileRes">
        <br />   
        <div class="alert alert-error">
        <strong>Alert!</strong> '.$lang['97'].'
        </div>
        </div>';
        die();
    }
    
}