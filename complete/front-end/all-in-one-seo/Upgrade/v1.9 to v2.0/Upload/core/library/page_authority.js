
//Bulk Page Authority Checker

var linksArr = new Array();
var nlinksArr = new Array();
var downloadData, authCode, myUrl;

function startTask(auth){
    authCode = auth;
    jQuery("#mainbox").fadeOut();
    jQuery("#resultBox").css({"display":"block"});
    jQuery("#resultBox").show();
    jQuery("#resultBox").fadeIn();
    jQuery(".percentimg").css({"display":"block"});
    jQuery(".percentimg").show();
    jQuery(".percentimg").fadeIn();
    
    var nLoop = 0;  
    var listHTML = '<br><table class="table table-bordered"><thead><tr><th>#</th><th>'+msgTab1+'</th><th>'+msgTab2+'</th></tr></thead><tbody>';
    for(i=0; i < linksArr.length; i++){
       myURL=jQuery.trim(linksArr[i]);
   	   if (myURL.indexOf("https://") == 0){myURL=myURL.substring(8);}
       if (myURL.indexOf("http://") == 0){myURL=myURL.substring(7);}
       if(myURL != ""){
        nlinksArr[nLoop] = myURL;
        var classTr = nLoop % 2 == 0?'even':'odd';
        listHTML+= '<tr class="'+classTr+'"><td align="center">'+(nLoop+1)+'</td><td id="link-'+nLoop+'"><a href="'+ "http://" + myURL +'" target="_blank">'+ myURL +'</a></td><td align="center" id="status-'+nLoop+'">&nbsp;</td></tr>';
        if(nLoop===19){
        break;
        }
        nLoop = nLoop +1;
       }
    }
    listHTML+= '</tbody></table>';
    jQuery("#results").html(listHTML);
    jQuery("#results").slideDown();
    setTimeout(function(){
    var pos = $('#results').offset();
    $('body,html').animate({ scrollTop: pos.top });
    }, 1500);
    make(0,myURL);
}

function make(domainID,sqURL) { 
	if(domainID >= nlinksArr.length){
		jQuery(".percentimg").fadeOut();
		return;
	}
    var c_link = nlinksArr[domainID];
    //AJAX Call
	jQuery.post(axPath,{mozAuthority:'1',pageAuthority:'1',sitelink:c_link, authcode:authCode},function(data){
		if(data == '0'){
			jQuery("#status-"+domainID).html('<b style="color:red">'+msgTab3+'</b>');
            downloadData = downloadData + c_link + "," + data + "\r\n";
		}else{
			jQuery("#status-"+domainID).html('<b style="color:green">'+data+'</b>');
            downloadData = downloadData + c_link + "," + data + "\r\n";
		}
		window.setTimeout("make("+(domainID+1)+",'"+sqURL+"')", 6000);
	});
}

function saveAsFile(str) {      
    var textToWrite = str;
    var textFileAsBlob = new Blob([textToWrite], {type:'text/csv'});
    var downloadLink = document.createElement("a");
    downloadLink.download = 'page_authority.csv';
    downloadLink.innerHTML = "My Link";
    window.URL = window.URL || window.webkitURL;
    downloadLink.href = window.URL.createObjectURL(textFileAsBlob);
    downloadLink.onclick = destroyClickedElement;
    downloadLink.style.display = "none";
    document.body.appendChild(downloadLink);
    downloadLink.click();
}

function destroyClickedElement(event){
    document.body.removeChild(event.target);
}

jQuery(document).ready(function(){
    
    jQuery("#exportButton").click(function() {
        saveAsFile(downloadData);    
    });
    
    jQuery("#checkButton").click(function(){
        var myURLs=jQuery("#linksBox").val();
        
        if(myURLs == ""){
    	    sweetAlert(oopsStr, msgDomain , "error");
    		return false;
        }
        linksArr = myURLs.split('\n');
        validateCaptcha();
    });
});

/*
 * @author Balaji
 * @name: A to Z SEO Tools v2 - PHP Script
 * @copyright © 2017 ProThemes.Biz
 *
 */