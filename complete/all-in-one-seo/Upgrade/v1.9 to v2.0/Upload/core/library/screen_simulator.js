
/*
 * @author Balaji
 * @name: A to Z SEO Tools v2 - PHP Script
 * @copyright © 2017 ProThemes.Biz
 *
 */
 
//Screen Simulator

function doscreen_simulator(){
	var my_url=$("#url").val();
	var my_res=$("input[type='radio'][name='resolution']:checked").val();
    var res = my_res.split("x"); 
	var width=res[0];
	var height=res[1];
    var ssValue=width+'X'+height;
	if(my_url==""){
	    sweetAlert(oopsStr, msgDomain , "error");
	}  else{
        if (my_url.indexOf("https://") == 0){ }else if (my_url.indexOf("http://") == 0){ }else{
            my_url = "http://" + my_url;
        }  
        window.open(my_url,ssValue,'toolbar=no,status=yes,scrollbars=yes,location=yes,menubar=no,directories=yes,width='+width+',height='+height);  
	}
}