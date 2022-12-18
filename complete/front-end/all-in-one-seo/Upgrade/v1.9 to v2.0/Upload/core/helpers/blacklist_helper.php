<?php

/*
 * @author Balaji
 * @name: A to Z SEO Tools - PHP Script
 * @copyright © 2017 ProThemes.Biz
 *
 */
 
function dnsblookup($ip) {
    $outArr = array();
    $dnsbl_lookup = array(
        "dnsbl-1.uceprotect.net",
        "dnsbl-2.uceprotect.net",
        "dnsbl-3.uceprotect.net",
        "dnsbl.dronebl.org",
        "dnsbl.sorbs.net",
        "spam.dnsbl.sorbs.net",
        "bl.spamcop.net",
        "recent.dnsbl.sorbs.net",
        "all.spamrats.com",
        "b.barracudacentral.org",
        "bl.blocklist.de",
        "bl.emailbasura.org",
        "bl.mailspike.org",
        "bl.spamcannibal.org",
        "bl.spamcop.net",
        "cblplus.anti-spam.org.cn",
        "dnsbl.anticaptcha.net",
        "ip.v4bl.org",
        "fnrbl.fast.net",
        "dnsrbl.swinog.ch",
        "mail-abuse.blacklist.jippg.org",
        "singlebl.spamgrouper.com",
        "spam.abuse.ch",
        "spamsources.fabel.dk",
        "virbl.dnsbl.bit.nl",
        "cbl.abuseat.org",
        "dnsbl.justspam.org",
        "zen.spamhaus.org"); // Add your preferred list of DNSBL's

        $reverse_ip = implode(".", array_reverse(explode(".", $ip)));
       
        foreach ($dnsbl_lookup as $host) {
            if (checkdnsrr($reverse_ip . "." . $host . ".", "A")) {
                $outArr[] = array($host,1);
                $listed = 1;
            }else{
                $outArr[] = array($host,2);
            }
        }
        
        if($listed)
        $overall = 1;
        else
        $overall = 2;
        
        return array($outArr,$overall);
}

?>