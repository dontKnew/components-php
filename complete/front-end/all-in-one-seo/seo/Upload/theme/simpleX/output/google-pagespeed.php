<?php
defined('APP_NAME') or die(header('HTTP/1.1 403 Forbidden'));

/*
 * @author Balaji
 * @name A to Z SEO Tools - PHP Script
 * @copyright 2020 ProThemes.Biz
 *
 */
?>
<style>
    table {
        table-layout: fixed; width: 100%;
    }
    td {
        word-wrap: break-word;
    }
    .screenImg{
        width: 100%;
        height: auto;
        max-height: 450px;
    }
</style>
<script>
    function processLoadBar() {
        var myUrl= jQuery.trim($('input[name=url]').val());
        if (myUrl==null || myUrl=="") {}else if(myUrl.indexOf(".") == -1){}else{
            jQuery("#percentimg").css({"display":"block"});
            jQuery("#mainBox").fadeOut();
        }
    }
</script>
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
                <form method="POST" action="<?php echo $toolOutputURL;?>" onsubmit="return fixURL();" id="mainBox">
                    <input type="text" name="url" id="url" value="" class="form-control"/>
                    <br />
                    <?php if ($toolCap) echo $captchaCode; ?>
                    <div class="text-center">
                        <input class="btn btn-info" onclick="processLoadBar();" type="submit" value="<?php echo $lang['8']; ?>" name="submit"/>
                    </div>
                </form>

                <div id="percentimg" class="text-center" style="display:none;">
                    <img src="<?php themeLink('img/load.gif'); ?>" />
                    <br /><br />
                    <?php echo $lang['146']; ?>...
                    <br /><br />
                </div>

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
                    <br />

                    <table class="table table-hover table-bordered table-striped" style="margin-bottom: 30px;">
                        <thead>
                        <tr>
                            <th>Final URL</th>
                            <td><?php echo $pageSpeedInsight['url']; ?></td>
                        </tr>
                        <tr>
                            <th>Loading Experience</th>
                            <td><?php echo $pageSpeedInsight['loadingExperience']; ?></td>
                        </tr>
                        <tr>
                            <th>Performance Score</th>
                            <td><?php echo $pageSpeedInsight['score']; ?></td>
                        </tr>
                        <tr>
                            <th>Warnings</th>
                            <td><?php echo $pageSpeedInsight['warning']; ?></td>
                        </tr>
                        <tr>
                            <th>Tested Mode</th>
                            <td>Desktop</td>
                        </tr>
                        <tr>
                            <th>User Agent</th>
                            <td><?php echo $pageSpeedInsight['userAgent']; ?></td>
                        </tr>
                        <tr>
                            <th>Screenshot</th>
                            <td><?php echo $pageSpeedInsight['screenshot']; ?></td>
                        </tr>
                        </thead>
                    </table>


                    <h4>Details</h4>
                    <table class="table table-hover table-bordered table-striped" style="margin-bottom: 30px;">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Score</th>
                            <th>Suggestion</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php echo $pageSpeedInsight['audit']; ?>
                        </tbody>
                    </table>
                    <br />


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