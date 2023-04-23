
//Backlink Maker

var myArr = new Array();
var myURL,authCode;

function startTask(auth){
    authCode = auth;
    jQuery("#mainbox").fadeOut();
   	jQuery("#resultBox").css({"display":"block"});
   	jQuery("#resultBox").show();
   	jQuery("#resultBox").fadeIn();
   	jQuery(".percentimg").css({"display":"block"});
   	jQuery(".percentimg").show();
   	jQuery(".percentimg").fadeIn();
    jQuery.get(baseUrl + 'core/library/backlink.dblinks',function(data){
		myArr = data.split('\n');
		if(myArr.length < 2){
            sweetAlert(oopsStr, smErr , "error");
			return;
		}
		var listHTML = '<br><table class="table table-bordered"><thead><tr><th>#</th><th>'+msgTab1+'</th><th>'+msgTab3+'</th></tr></thead><tbody>';
		for(i=0; i < myArr.length; i++){
			var classTr = i % 2 == 0?'even':'odd';
			listHTML+= '<tr class="'+classTr+'"><td align="center">'+(i+1)+'</td><td id="link-'+i+'"><a href="'+myArr[i].replace('{host}', myURL)+'" target="_blank">'+myArr[i].replace('{host}', myURL)+'</a></td><td align="center" id="status-'+i+'">&nbsp;</td></tr>';
		}
		listHTML+= '</tbody></table>';
		jQuery("#results").html(listHTML);
		jQuery("#results").slideDown();
        setTimeout(function(){
		var pos = $('#results').offset();
		$('body,html').animate({ scrollTop: pos.top });
		}, 1500);
        make(0);
    });
}

function getDomain(linkSt) {
	return linkSt.replace(/(http:\/\/[^\/]*)+([^$]*)/g, '$1');
}

function make(domainID) {
	if(domainID >= myArr.length){
		jQuery(".percentimg").fadeOut();
		return;
	}
    var c_link = myArr[domainID].replace('{host}', myURL);
	jQuery.post(axPath,{backlink:'1',sitelink:c_link,authcode:authCode},function(data){
        if(data == '1')
			jQuery("#status-"+domainID).html('<b style="color:green">'+sucMsg+'</b>');
		else
			jQuery("#status-"+domainID).html('<b style="color:red">'+errMsg+'</b>');
		window.setTimeout("make("+(domainID+1)+")", 1000);
	});
}

jQuery(document).ready(function(){
    jQuery("#checkButton").click(function(){
        myURL = $.trim($("#myurl").val());
    	if (myURL.indexOf("https://") == 0){myURL=myURL.substring(8);}
        if (myURL.indexOf("http://") == 0){myURL=myURL.substring(7);}
    	if (myURL.indexOf("/") != -1){var xGH=myURL.indexOf("/");myURL=myURL.substring(0,xGH);}
    	if (myURL.indexOf(".") == -1 ){myURL+=".com";}
    	if (myURL.indexOf(".") == (myURL.length-1)){myURL+="com";}
        var regular = /^([www\.]*)+(([a-zA-Z0-9_\-\.])+\.)+([a-zA-Z0-9]{2,4})+$/;
    	if(!regular.test(myURL)){
    	    sweetAlert(oopsStr, msgDomain , "error");
    		return;
    	}else{
            validateCaptcha();
        }
    });
});

/*
 * @author Balaji
 * @name: A to Z SEO Tools v2 - PHP Script
 * @copyright © 2017 ProThemes.Biz
 *
 */