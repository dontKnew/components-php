<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name A to Z SEO Tools v2 - PHP Script
 * @copyright © 2017 ProThemes.Biz
 *
 */
?>
<style>
.pageData{
    display: none;
}
.smartBlue{
    color: #2980b9;
}
</style>
<div class="container main-container">
<div class="row">
        <?php
        if($themeOptions['general']['sidebar'] == 'left')
            require_once(THEME_DIR."sidebar.php");
        ?>
      	<div class="col-md-8 main-index">
        
        <div class="xd_top_box">
         <?php echo $ads_720x90; ?>
        </div>
        
          	<h2 id="title"><?php echo $data['tool_name']; ?></h2>

           <?php if ($pointOut != 'output') { ?>
           <br />
           <p><?php echo $lang['23']; ?>
           </p>
           <form method="POST" action="<?php echo $toolOutputURL;?>" onsubmit="return fixURL();"> 
           <input type="text" name="url" id="url" value="" class="form-control"/>
           <br />
           <?php if ($toolCap) echo $captchaCode; ?>
           <div class="text-center">
           <input class="btn btn-info" type="submit" value="<?php echo $lang['8']; ?>" name="submit"/>
           </div>
           </form>     
                      
           <?php 
           } else { 
           //Output Block
           if(isset($error)) {
            
            echo '<br/><br/><div class="alert alert-error">
            <strong>Alert!</strong> '.$error.'
            </div><br/><br/>
            <div class="text-center"><a class="btn btn-info" href="'.$toolURL.'">'.$lang['12'].'</a>
            </div><br/>';
            
           } else {
           ?>
           <script>
            // Specify your actual API key here:
            var API_KEY = 'AIzaSyBI5-_mv2U5sf5NomQyKRO8CSwB8pywM0c';
            
            // Specify the URL you want PageSpeed results for here:
            var URL_TO_GET_RESULTS_FOR = "<?php echo $my_url; ?>";
            var API_URL = 'https://www.googleapis.com/pagespeedonline/v1/runPagespeed?';
            var CHART_API_URL = 'http://chart.apis.google.com/chart?';
            
            // Object that will hold the callbacks that process results from the
            // PageSpeed Insights API.
            var callbacks = {}
            
            // Invokes the PageSpeed Insights API. The response will contain
            // JavaScript that invokes our callback with the PageSpeed results.
            function runPagespeed() {
              var s = document.createElement('script');
              s.type = 'text/javascript';
              s.async = true;
              var query = [
                'url=' + URL_TO_GET_RESULTS_FOR,
                'callback=runPagespeedCallbacks',
                'key=' + API_KEY,
              ].join('&');
              s.src = API_URL + query;
              document.head.insertBefore(s, null);
            }
            
            // Our JSONP callback. Checks for errors, then invokes our callback handlers.
            function runPagespeedCallbacks(result) {
              if (result.error) {
                var errors = result.error.errors;
                for (var i = 0, len = errors.length; i < len; ++i) {
                  if (errors[i].reason == 'badRequest' && API_KEY == 'AIzaSyBI5-_mv2U5sf5NomQyKRO8CSwB8pywM0c') {
                    alert('Please specify your Google API key in the API_KEY variable.');
                  } else {
                    // NOTE: your real production app should use a better
                    // mechanism than alert() to communicate the error to the user.
                    alert(errors[i].message);
                  }
                }
                return;
              }
            
              // Dispatch to each function on the callbacks object.
              for (var fn in callbacks) {
                var f = callbacks[fn];
                if (typeof f == 'function') {
                  callbacks[fn](result);
                }
              }
            }
            
            // Invoke the callback that fetches results. Async here so we're sure
            // to discover any callbacks registered below, but this can be
            // synchronous in your code.
            setTimeout(runPagespeed, 0);
            </script>
            <script>
            callbacks.displayPageSpeedScore = function(result) {
              var score = result.score;
              // Construct the query to send to the Google Chart Tools.
              var query = [
                'chtt=Page+Speed+score:+' + score,
                'chs=300x180',
                'cht=gom',
                'chd=t:' + score,
                'chxt=x,y',
                'chxl=0:|' + score,
              ].join('&');
              var i = document.createElement('img');
              i.src = CHART_API_URL + query;
              document.getElementById('score').insertBefore(i, null);
            };
            </script>
            
            
            <script>
            callbacks.displayTopPageSpeedSuggestions = function(result) {
              var results = [];
              var ruleResults = result.formattedResults.ruleResults;
              for (var i in ruleResults) {
                var ruleResult = ruleResults[i];
                // Don't display lower-impact suggestions.
                if (ruleResult.ruleImpact < 3.0) continue;
                results.push({name: ruleResult.localizedRuleName,
                              impact: ruleResult.ruleImpact});
              }
              results.sort(sortByImpact);
              var ul = document.createElement('ul');
              for (var i = 0, len = results.length; i < len; ++i) {
                var r = document.createElement('li');
                r.innerHTML = results[i].name;
                ul.insertBefore(r, null);
              }
              $(".percentimgBox").fadeOut();
              $(".pageData").fadeIn();
              if (ul.hasChildNodes()) {
            	  document.getElementById('suggestions').insertBefore(ul, null);
              } else {
                var div = document.createElement('div');
                div.innerHTML = 'No high impact suggestions. Good job!';
                document.getElementById('suggestions').insertBefore(div, null);
              }
            };
            
            // Helper function that sorts results in order of impact.
            function sortByImpact(a, b) { return b.impact - a.impact; }
            </script>
            
            
            <script>
            var RESOURCE_TYPE_INFO = [
              {label: 'JavaScript', field: 'javascriptResponseBytes', color: '27ae60'},
              {label: 'Images', field: 'imageResponseBytes', color: 'e74c3c'},
              {label: 'CSS', field: 'cssResponseBytes', color: '8e44ad'},
              {label: 'HTML', field: 'htmlResponseBytes', color: 'f39c12'},
              {label: 'Flash', field: 'flashResponseBytes', color: 'd35400'},
              {label: 'Text', field: 'textResponseBytes', color: '2980b9'},
              {label: 'Other', field: 'otherResponseBytes', color: 'ecf0f1'},
            ];
            
            callbacks.displayResourceSizeBreakdown = function(result) {
              var stats = result.pageStats;
              var labels = [];
              var data = [];
              var colors = [];
              var totalBytes = 0;
              var largestSingleCategory = 0;
              for (var i = 0, len = RESOURCE_TYPE_INFO.length; i < len; ++i) {
                var label = RESOURCE_TYPE_INFO[i].label;
                var field = RESOURCE_TYPE_INFO[i].field;
                var color = RESOURCE_TYPE_INFO[i].color;
                if (field in stats) {
                  var val = Number(stats[field]);
                  totalBytes += val;
                  if (val > largestSingleCategory) largestSingleCategory = val;
                  labels.push(label);
                  data.push(val);
                  colors.push(color);
                }
              }
              // Construct the query to send to the Google Chart Tools.
              var query = [
                'chs=300x180',
                'cht=p3',
                'chts=' + ['000000', 16].join(','),
                'chco=' + colors.join('|'),
                'chd=t:' + data.join(','),
                'chdl=' + labels.join('|'),
                'chdls=000000,14',
                'chp=1.6',
                'chds=0,' + largestSingleCategory,
              ].join('&');
              var i = document.createElement('img');
              i.src = 'http://chart.apis.google.com/chart?' + query;
              document.getElementById('code').insertBefore(i, null);
            };
            </script>
            <br />
            <div class="text-center">
            
            <div class="percentimgBox">
                <img src="<?php themeLink('img/load.gif'); ?>" />
                <br />
                <?php echo $lang['146']; ?>...
                <br />
            </div>
            
            <div class="pageData">
                <h2 class="smartBlue"><?php echo $lang['AS7']; ?></h2><span id="score"></span><br /><br />
                <h2 class="smartBlue"><?php echo $lang['AS8']; ?></h2><span id="code"></span><br /><br />
                <h2 class="smartBlue"><?php echo $lang['AS9']; ?></h2>
                </div><br />
                <span id="suggestions"></span>
            </div>

        
        <div class="text-center">
        <br /> &nbsp; <br />
        <a class="btn btn-info" href="<?php echo $toolURL; ?>"><?php echo $lang['27']; ?></a>
        <br />
        </div>
        
        <?php } } ?>
        
        <br />
        
        <div class="xd_top_box">
        <?php echo $ads_720x90; ?>
        </div>
        
        <h2 id="sec1" class="about_tool"><?php echo $lang['11'].' '.$data['tool_name']; ?></h2>
        <p>
        <?php echo $data['about_tool']; ?>
        </p> <br />
        </div>              
        
        <?php
        if($themeOptions['general']['sidebar'] == 'right')
            require_once(THEME_DIR."sidebar.php");
        ?>     		
    </div>
</div> <br />