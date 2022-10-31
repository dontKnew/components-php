
//Online Blog Ping Tool

var myArr = new Array();
var authCode, myURL, blogNameData,myBlogUpdateUrlData,myBlogRSSFeedUrlData;

function startTask(auth){
    authCode = auth;
    jQuery("#mainbox").fadeOut();
    jQuery("#resultBox").css({"display":"block"});
    jQuery("#resultBox").show();
    jQuery("#resultBox").fadeIn();
    jQuery(".percentimg").css({"display":"block"});
    jQuery(".percentimg").show();
    jQuery(".percentimg").fadeIn();
    jQuery.get(baseUrl + 'core/library/blogPing.dblinks',function(data){
	myArr = data.split('\n');
	if(myArr.length < 2){
	    sweetAlert(oopsStr, smErr , "error");
		return;
	}
	var listHTML = '<br><table class="table table-bordered"><thead><tr><th>#</th><th>'+msgTab1+'</th><th>'+msgTab2+'</th></tr></thead><tbody>';
	for(i=0; i < myArr.length; i++){
		var classTr = i % 2 == 0?'even':'odd';
        var pingLink = myArr[i];
        if (pingLink.indexOf("https://") == 0){pingLink=pingLink.substring(8);}
        if (pingLink.indexOf("http://") == 0){pingLink=pingLink.substring(7);}
		listHTML+= '<tr class="'+classTr+'"><td align="center">'+(i+1)+'</td><td id="link-'+i+'">'+pingLink+'</td><td align="center" id="status-'+i+'">&nbsp;</td></tr>';
	}
	listHTML+= '</tbody></table>';
	jQuery("#results").html(listHTML);
	jQuery("#results").slideDown();
    setTimeout(function(){
	var pos = $('#results').offset();
	$('body,html').animate({ scrollTop: pos.top });
	}, 1500);
	make(0,myURL);
});  
}

function getDomain(linkSt){
	return linkSt.replace(/(http:\/\/[^\/]*)+([^$]*)/g, '$1');
}

function make(domainID,sqURL) {
	if(domainID >= myArr.length){
		jQuery(".percentimg").fadeOut();
		return;
	}
    var c_link = myArr[domainID];
	jQuery.post(axPath,{blogPing:'1',authcode:authCode,pingUrl:c_link,blogUrl:sqURL,blogName:blogNameData,myBlogUpdateUrl:myBlogUpdateUrlData,myBlogRSSFeedUrl:myBlogRSSFeedUrlData},function(data){
        if(data=='Thanks for the ping.')
            jQuery("#status-"+domainID).html('<b style="color:green">'+data+'</b>');  
        else
            jQuery("#status-"+domainID).html('<b style="color:orange">'+data+'</b>');
        

		window.setTimeout("make("+(domainID+1)+",'"+sqURL+"')", 500);
	});
}

jQuery(document).ready(function(){
    
    jQuery("#checkButton").click(function(){
    myURL=jQuery("#myurl").val();
    blogNameData=jQuery("#blogNameData").val();
    myBlogUpdateUrlData=jQuery("#myBlogUpdateUrlData").val();
    myBlogRSSFeedUrlData=jQuery("#myBlogRSSFeedUrlData").val();

    myURL=jQuery.trim(myURL);
   	if(myURL==''||myURL==null){
        sweetAlert(oopsStr, msgDomain , "error");
		return;
	}
   	if(blogNameData==''||blogNameData==null){
	   sweetAlert(oopsStr, msgName , "error");
	   return;
	}
	if(myBlogUpdateUrlData==''||myBlogUpdateUrlData==null){
	    sweetAlert(oopsStr, msgUpdate , "error");
		return;
	}
	if(myBlogRSSFeedUrlData==''||myBlogRSSFeedUrlData==null){
        sweetAlert(oopsStr, msgRss , "error");
		return;
	}
	if (myURL.indexOf("https://") == 0){ } else if (myURL.indexOf("http://") == 0){ } else{
        myURL = "http://" + myURL;
    }
    validateCaptcha();
    
    });
});

/*
 * @author Balaji
 * @name: A to Z SEO Tools v2 - PHP Script
 * @copyright © 2017 ProThemes.Biz
 *
 */