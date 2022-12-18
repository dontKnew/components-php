/*
 * @author Balaji
 * @name: A to Z SEO Tools v2 - PHP Script
 * @copyright 2018 ProThemes.Biz
 *
 */
 
//XML Sitemap Generator
var countLinks = 0;
var strTime = 800;
var limitAdmin = 5000;
var linksArr =[];
var maxLinksCrawl = 50;
var authCode,myUrl,maxLinks,checkDate,customDate,defPriority,defFreq;

function doSitemap(){

    myUrl=$("#url").val();
    maxLinks=$("#mapPages").val();
    checkDate=$("#mapDate").val();
    customDate=$("#mapdateBox").val();
    defPriority=$("#mapPri").val();
    defFreq=$("#mapFre").val();
    if(checkDate == '2'){
        if(customDate=="" || customDate == null){
            sweetAlert(oopsStr, dateErr , "error");
            return false;
        }
    }
	if(myUrl==null || myUrl=="") {
		sweetAlert(oopsStr, msgDomain , "error");
        return false;
	}else {
        //Fix URL
        if (myUrl.indexOf("http://") == 0) {
        myUrl=myUrl.substring(7);
        }
        
        if (myUrl.indexOf("https://") == 0) {
        myUrl=myUrl.substring(8);
        }
        validateCaptcha();
    }
}

function startTask(auth){
    authCode = auth;
    jQuery("#mainBox").fadeOut();
   	jQuery("#resultBox").css({"display":"block"});
   	jQuery(".percentimg").css({"display":"block"});
   	jQuery("#resultBox").show();
   	jQuery("#resultBox").fadeIn();
	var pos = $('.topBox').offset();
	$('body,html').animate({ scrollTop: pos.top },strTime);
    jQuery("#resultList").append('&lt;?xml version="1.0" encoding="UTF-8"?&gt; \n');
    jQuery("#resultList").append('&lt;urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"&gt; \n');
    var countMe = 0;
    processSitemap(countMe);  
}

function processSitemap(countMe){
        jQuery.post(axPath,{sitemap:'1', url:myUrl, authcode:authCode},function(data){
        if(data == 'DOWN'){
            $(".percentimg").fadeOut();
            $("#saveXMLFile").fadeOut();
            $("#resultList").html(msgDown);
            sweetAlert(oopsStr, msgDown , "error");
            return false;
        }
        var resData = data.split("::|::"); 
        var resCount = parseInt(resData[0]);
        var resLinkData = resData[1];
        if(resCount === 0){
            var resLinks = [];
        }else{
            var resLinks = resLinkData.split("\n");
        }
        
        var ccLinks = [];
        jQuery(".linksCount").html('<br/>'+crawlingStr+': '+ myUrl +'<br/>'+linksFound+': ' + resLinks.length);
        
        for (var i = 0; i < resLinks.length; i++) {
        var ccData = resLinks[i].trim();
        if(jQuery.inArray(ccData, linksArr) == -1){
        ccLinks.push(ccData);  
        countLinks++;
        if(countLinks != maxLinks){
        jQuery("#resultList").append('&lt;url&gt;'+'\n'); 
        jQuery("#resultList").append('  &lt;loc&gt;'+ ccData + '&lt;/loc&gt;' + '\n'); 
        if(defPriority != 'N/A'){
        jQuery("#resultList").append('  &lt;priority&gt;'+ defPriority + '&lt;/priority&gt;' + '\n'); 
        }
        if(defFreq != 'N/A'){
        defFreqT = defFreq.toString().toLowerCase();
        jQuery("#resultList").append('  &lt;changefreq&gt;'+ defFreqT + '&lt;/changefreq&gt;' + '\n'); 
        }
        if(checkDate != 'N/A'){
            if(checkDate == '1'){
            var fullDate = new Date();
            var twoDigitMonth = fullDate.getMonth()+1+"";if(twoDigitMonth.length==1)  twoDigitMonth="0" +twoDigitMonth;
            var twoDigitDate = fullDate.getDate()+"";if(twoDigitDate.length==1) twoDigitDate="0" +twoDigitDate;
            var currentDate = fullDate.getFullYear() + "-" + twoDigitMonth + "-" + twoDigitDate;
            jQuery("#resultList").append('  &lt;lastmod&gt;'+ currentDate + '&lt;/lastmod&gt;' + '\n'); 
            }
            if(checkDate == '2'){
            customDate = customDate.trim();customDate=customDate.split('/');
            customDate = customDate[2] + "-" + customDate[1] + "-" + customDate[0];
            jQuery("#resultList").append('  &lt;lastmod&gt;'+ customDate + '&lt;/lastmod&gt;' + '\n');   
            }
        }
        jQuery("#resultList").append('&lt;/url&gt;'+'\n');
        }else{
          jQuery(".percentimg").fadeOut();
          jQuery("#resultList").append('&lt;/urlset&gt;');
          jQuery(".genCount").html('<br/>' + ssLimit.replace('[count]',countLinks));
          break;
        }
        }
        }
        if(countLinks == maxLinks){
            return false;
        }
        if (countMe == maxLinksCrawl){
          jQuery(".percentimg").fadeOut();
          jQuery("#resultList").append('&lt;/urlset&gt;');
          jQuery(".genCount").html('<br/>' + ccErr + ' <br/>'+ ssLimit.replace('[count]',countLinks));
          return false;
        }
        else{
        linksArr = linksArr.concat(ccLinks);
        myUrl= linksArr[countMe];
        countMe++;
        if (parseInt(countMe) < parseInt(linksArr.length)) {
            processSitemap(countMe);  
        }else{
          jQuery(".percentimg").fadeOut();
          jQuery("#resultList").append('&lt;/urlset&gt;');
          jQuery(".genCount").html('<br/>'+ ssLimit.replace('[count]',countLinks));
          return false;
        }
        }
    });
}

function htmlspecialchars_fix(string, quoteStyle) {

  var strTemp = 0,
    i = 0,
    noquotes = false;
  if (typeof quoteStyle === 'undefined') {
    quoteStyle = 2;
  }
  string = string.toString()
    .replace(/&lt;/g, '<')
    .replace(/&gt;/g, '>');
  var OPTS = {
    'ENT_NOQUOTES': 0,
    'ENT_HTML_QUOTE_SINGLE': 1,
    'ENT_HTML_QUOTE_DOUBLE': 2,
    'ENT_COMPAT': 2,
    'ENT_QUOTES': 3,
    'ENT_IGNORE': 4
  };
  if (quoteStyle === 0) {
    noquotes = true;
  }
  if (typeof quoteStyle !== 'number') { 
    quoteStyle = [].concat(quoteStyle);
    for (i = 0; i < quoteStyle.length; i++) {
      if (OPTS[quoteStyle[i]] === 0) {
        noquotes = true;
      } else if (OPTS[quoteStyle[i]]) {
        strTemp = strTemp | OPTS[quoteStyle[i]];
      }
    }
    quoteStyle = strTemp;
  }
  if (quoteStyle & OPTS.ENT_HTML_QUOTE_SINGLE) {
    string = string.replace(/&#0*39;/g, "'");
  }
  if (!noquotes) {
    string = string.replace(/&quot;/g, '"');
  }
  
  return string;
}
$(document).ready(function() {
document.getElementById('saveXMLFile').onclick = function() {                  

var xmlData = 'data:application/xml;charset=utf-8,' + encodeURIComponent(htmlspecialchars_fix(document.getElementById('resultList').innerHTML));
                        this.href = xmlData;
                        this.target = '_blank';
                        this.download = 'sitemap.xml';
};
});