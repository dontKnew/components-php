<?php

/*
 * @author Balaji
 * @name: A to Z SEO Tools - PHP Script
 * @copyright © 2017 ProThemes.Biz
 *
 */

function googleRank($searchDomain, $keyword, $position = 50, $googleDomain)
{

    $currentPage = 1;
    $resPerPage = 0;
    $totalCount = 1;

    $googleUrl = "https://www." . $googleDomain . "/search?hl=en&q=" . urlencode($keyword);

    $data = curlGET_Text($googleUrl);

    while (true)
    {

        $dom = new DOMDocument();
        @$dom->loadHTML($data);

        $xpath = new DOMXPath($dom);

        $hrefs = $xpath->evaluate('//div[@id="ires"]//ol//div[@class="g"]//h3[@class="r"]//a');
        $linkcount = $hrefs->length;

        for ($i = 0; $i < $linkcount; $i++)
        {

            $href = $hrefs->item($i);
            $url = $href->getAttribute('href');
 
            $searchDomain = "http://".clean_url($searchDomain);
            $searchDomainArr = parse_url($searchDomain);
            $searchDomain = $searchDomainArr['host'];
        
            $url = cleanWWW($url);

            if (!strstr($url, $searchDomain))
            {

            } else
            {
                $searchDetails = array(
                    $url,
                    $totalCount,
                    $currentPage);
                return $searchDetails;
                exit;
            }
            if ($totalCount == $position)
            {
                return;
                exit;
            }
            $totalCount++;
        }

        if (!strstr($data, "Next"))
        {

            break;
        }

        sleep(rand(2, 4));
        $resPerPage = $resPerPage + 10;
        $currentPage++;
        flush();
        $googleUrl = "https://www." . $googleDomain . "/search?hl=en&q=" . urlencode($keyword) .
            "&start=" . $resPerPage . "&sa=N";
        $data = curlGET_Text($googleUrl);
    }
}

function yahooRank($searchDomain, $keyword, $position = 50, $yahooDomain = 'yahoo.com') {
    $data = $resData = $yahooUrl = '';
    
    $yahooTLD = clean_url($yahooDomain);
    $yahooTLD = explode(".", $yahooTLD);
    $yahooTLD = $yahooTLD[1];

    if ($yahooTLD == 'com')
        $yahooTLD = '';
    else
        $yahooTLD = $yahooTLD . '.';

    $currentPage = 1;
    $resPerPage = 0;
    $totalCount = 1;

    $rn = $resPerPage == '0' ? '' : $resPerPage;

    $yahooUrl = "https://" . $yahooTLD . "search." . $yahooDomain . "/search?p=" .
        urlencode($keyword) . "&b=" . $rn . "1";

    $data = curlGET_Text($yahooUrl);
    $resData = getCenterText('<ol class="mb-15 reg searchCenterMiddle">', '</ol>', $data);
    $resPerPage = 10;
    while (true)
    {

        $dom = new DOMDocument();
        @$dom->loadHTML($resData);

        $xpath = new DOMXPath($dom);
        $hrefs = $dom->getElementsByTagName('a');


        $linkcount = $hrefs->length;

        for ($i = 0; $i < $linkcount; $i++)
        {

            $href = $hrefs->item($i);
            $url = $href->getAttribute('href');
            $searchDomain = clean_url($searchDomain);
            $url = clean_url($url);

            if (!strstr($url, $searchDomain))
            {

            } else
            {
                $searchDetails = array(
                    $url,
                    $totalCount,
                    $currentPage);
                return $searchDetails;
                exit;
            }
            if ($totalCount == $position)
            {
                return;
                exit;
            }
            $totalCount++;
        }

        if (!strstr($data, "Next")){
            break;
        }

        sleep(rand(3, 5));
        $resPerPage = $resPerPage + 10;
        $currentPage++;
        flush();
        $yahooUrl = "https://" . $yahooTLD . "search." . $yahooDomain . "/search?p=" .
            urlencode($keyword) . "&b=" . $resPerPage;
        $data = curlGET_Text($yahooUrl);
        $resData = getCenterText('<ol class="mb-15 reg searchCenterMiddle">', '</ol>', $data);
    }
}
?>