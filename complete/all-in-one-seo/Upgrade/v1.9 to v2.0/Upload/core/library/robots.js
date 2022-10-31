
/*
 * @author Balaji
 * @name: A to Z SEO Tools v2 - PHP Script
 * @copyright © 2017 ProThemes.Biz
 *
 */
 
//robots.txt generator

function genRobots(form,msg1,msg2,saveAs) {
  if (saveAs === undefined) {
    saveAs = false;
  }
  if (confirm(msg1)){
  var roboListData =form.robolist;
    roboListData.value = msg2;
    if (form.google.value != "") {
      roboListData.value +="User-agent: Googlebot\nDisallow:" +
      form.google.value + "\n";
    }
    if (form.gimage.value != "") {
      roboListData.value +="User-agent: googlebot-image\nDisallow:" +
      form.gimage.value + "\n";
    }
      if (form.gmobile.value != "") {
      roboListData.value +="User-agent: googlebot-mobile\nDisallow:" +
      form.gmobile.value + "\n";
    }    
    if (form.msn.value != "") {
      roboListData.value +="User-agent: MSNBot\nDisallow:" +
      form.msn.value + "\n";
    }     
    if (form.yahoo.value != "") {
      roboListData.value +="User-agent: Slurp\nDisallow:" +
      form.yahoo.value + "\n";
    }     
    if (form.teoma.value != "") {
      roboListData.value +="User-agent: Teoma\nDisallow:" +
      form.teoma.value + "\n";
	}          
    if (form.gigablast.value != "") {
      roboListData.value +="User-agent: Gigabot\nDisallow:" +
      form.gigablast.value + "\n";
    }          
     if (form.dmoz.value != "") {
      roboListData.value +="User-agent: Robozilla\nDisallow:" +
      form.dmoz.value + "\n";
    }
     if (form.nutch.value != "") {
      roboListData.value +="User-agent: Nutch\nDisallow:" +
      form.nutch.value + "\n";
    }
     if (form.alexa.value != "") {
      roboListData.value +="User-agent: ia_archiver\nDisallow:" +
      form.alexa.value + "\n";
    }
     if (form.baidu.value != "") {
      roboListData.value +="User-agent: baiduspider\nDisallow:" +
      form.baidu.value + "\n";
          }
     if (form.naver.value != "") {
      roboListData.value +="User-agent: naverbot\nDisallow:" +
      form.naver.value + "\n";
      roboListData.value +="User-agent: yeti\nDisallow:" +
      form.naver.value + "\n";
    }
     if (form.ymm.value != "") {
      roboListData.value +="User-agent: yahoo-mmcrawler\nDisallow:" +
      form.ymm.value + "\n";
    }
     if (form.psbot.value != "") {
      roboListData.value +="User-agent: psbot\nDisallow:" +
      form.psbot.value + "\n";
    }
     if (form.blogs.value != "") {
      roboListData.value +="User-agent: yahoo-blogs/v3.9\nDisallow:" +
      form.blogs.value + "\n";
    } 
    if (form.allow.value != "") {
      roboListData.value +="User-agent: *\nDisallow:" +
      form.allow.value + "\n";
    }
     if (form.delay.value != "") {
      roboListData.value +="Crawl-delay: " +
      form.delay.value + "\n";
	}
    if (form.dir1.value != "") {
      roboListData.value +="Disallow: " +
      form.dir1.value + "\n";
    }
    if (form.dir2.value != "") {
      roboListData.value +="Disallow: " +
      form.dir2.value + "\n";
    }    
    if (form.dir3.value != "") {
      roboListData.value +="Disallow: " +
      form.dir3.value + "\n";
    }
    if (form.dir4.value != "") {
      roboListData.value +="Disallow: " +
      form.dir4.value + "\n";
    }
    if (form.dir5.value != "") {
      roboListData.value +="Disallow: " +
      form.dir5.value + "\n";
    }  
    if (form.dir6.value != "") {
      roboListData.value +="Disallow: " +
      form.dir6.value + "\n";
    } 
    if (form.sitemap.value != "") {
      roboListData.value +="Sitemap: " +
      form.sitemap.value + "\n";
	}
    if(saveAs){
        var roStr = document.getElementById("robolist").value.replace(/\n/g, "\r\n");
        saveAsFile(roStr);
    }
}
}

function saveAsFile(str) {      
    var textToWrite = str;
    var textFileAsBlob = new Blob([textToWrite], {type:'text/plain'});
    var downloadLink = document.createElement("a");
    downloadLink.download = 'robots.txt';
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

/*
 * @author Balaji
 * @name: A to Z SEO Tools v2
 * @copyright © 2017 ProThemes.Biz
 *
 */