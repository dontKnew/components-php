
//Keyword Position Checker 
var keysArr = new Array();
var maxPos = 0;
var authCode, myUrl, keyData;

function startTask(auth){
    authCode = auth;
    maxPos = $("#posData").val();
	keysArr = keyData.split('\n');
    jQuery("#mainbox").fadeOut();
   	jQuery("#resultBox").css({"display":"block"});
   	jQuery("#resultBox").show();
   	jQuery("#resultBox").fadeIn();
   	jQuery(".percentimg").css({"display":"block"});
   	jQuery(".percentimg").show();
   	jQuery(".percentimg").fadeIn();
	var listHTML = '<br /><table class="table table-bordered"><thead><tr><th align="center">#</th><th align="center">'+msgTab1+'</th><th align="center">'+msgTab2+'</th><th align="center">'+msgTab3+'</th></tr></thead><tbody>';
	for(i=0; i < keysArr.length; i++){
	   var classTr = i % 2 == 0?'even':'odd';
	   listHTML+= '<tr class="'+classTr+'"><td align="center">'+(i+1)+'</td><td id="link-'+i+'">' + keysArr[i] + '</td><td align="center" id="google-'+i+'">&nbsp;</td><td align="center" id="yahoo-'+i+'">&nbsp;</td></tr>';
	}
	listHTML+= '</tbody></table>';
	jQuery("#results").html(listHTML);
	jQuery("#results").slideDown();
    setTimeout(function(){
	var pos = $('#posBox').offset();
	$('body,html').animate({ scrollTop: pos.top });
	}, 1000);
	make(0,myURL);
}

function make(loopID,sqURL) { 
	if(loopID >= keysArr.length){
		jQuery(".percentimg").fadeOut();
		return;
	}
    var keyWord = keysArr[loopID];
	jQuery.post(axPath,{keywordPos:'1',authcode:authCode, keyword:keyWord,searchUrl:sqURL,pos:maxPos},function(data){
        var resData = data.split('::|::');
		jQuery("#google-"+loopID).html(resData[0]);
		jQuery("#yahoo-"+loopID).html(resData[1]);
		window.setTimeout("make("+(loopID+1)+",'"+sqURL+"')", 1000);
	});
}

jQuery(document).ready(function(){
    jQuery("#checkButton").click(function(){
    myURL=jQuery("#myurl").val();
    myURL=jQuery.trim(myURL);
	if (myURL.indexOf("https://") == 0){myURL=myURL.substring(8);}
    if (myURL.indexOf("http://") == 0){myURL=myURL.substring(7);}
	if (myURL.indexOf("/") != -1){var xGH=myURL.indexOf("/");myURL=myURL.substring(0,xGH);}
	if (myURL.indexOf(".") == -1 ){myURL+=".com";}
	if (myURL.indexOf(".") == (myURL.length-1)){myURL+="com";}
	var regular = /^([www\.]*)+[a-zA-Z0-9-\.]\.[a-zA-Z0-9]+$/;
	var regular = /^([www\.]*)+(([a-zA-Z0-9_\-\.])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if(!regular.test(myURL)){
		sweetAlert(oopsStr, msgDomain , "error");
		return;
	}
    keyData = $("#keyData").val();
    
    if(keyData==null || keyData==""){
        sweetAlert(oopsStr, msgKey , "error");
  		return;
    }
    validateCaptcha();                      
    });
});

/*
 * @author Balaji
 * @name: AtoZ SEO Tools v2
 * @copyright © 2017 ProThemes.Biz
 *
 */