  var pageOverlay = pageOverlay || (function ($) {
    return {
      show: function (message, options) {
        if(!$('#page-overlay').hasClass('active')){
          $('#page-overlay').addClass('active');
          $('#page-overlay .page-loading-image').removeClass('d-none');
        }
      },

      hide: function () {
        if($('#page-overlay').hasClass('active')){
          $('#page-overlay').removeClass('active');
          $('#page-overlay .page-loading-image').addClass('d-none');
        }
      }
    };

  })(jQuery);

  
  var alertMessage = alertMessage || (function ($) {
    var $html = $('<div class="alert alert-icon content d-none" role="alert">' +
                  '<i class="fe icon-symbol" aria-hidden="true"></i>' +
                  '<span class="message">Message is in here</span>' +
                '</div>');
    return {
      show: function (_message, _type) {
        switch(_type) {
          case 'error':
            var _type = 'alert-warning',
                _icon = 'fe-alert-triangle';
            break; 
          case 'success':
            var _type = 'alert-success',
                _icon = 'fe-check';
            break;
          default:
            var _type = 'alert-warning',
                _icon = 'fe-bell';
        }
        $('#alert-message').html($html);
        $('#alert-message .content').addClass(_type);
        $('#alert-message .icon-symbol').addClass(_icon);
        $('#alert-message .content').removeClass('d-none');
        $('#alert-message .content .message').html(_message);
      },

      hide: function () {
        $('#alert-message').html('');
      }
    };

  })(jQuery);

  // Confirm notice
  function confirm_notice(_ms) {
      switch(_ms) {
        case 'deleteItem':
            return confirm(deleteItem);
            break;
        case 'deleteItems':
            return confirm(deleteItems);
            break;
        default:
            return confirm(_ms);
    }
    return confirm(_ms);
  }

  function is_json(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
  }

  // Reload page
  function reloadPage(_url){
    if(_url != ''){
      setTimeout(function(){window.location = _url;}, 2500);
    }else{
      setTimeout(function(){location.reload()}, 2500);
    }
  }

 function notify(_ms, _type){
  switch(_type) {
      
    case 'error':
      _text = _ms;
      _icon = 'warning';
      break; 

    case 'success':
      _text = _ms;
      _icon = 'success';
      break;

    default:
      // code block
  }

  $.toast({
      text: _text, 
      icon: _icon,
      showHideTransition: 'fade',
      allowToastClose: true,
      hideAfter: 3000,
      stack: 5,
      position: 'bottom-center', 
      textAlign: 'left',
      loader: true,
      loaderBg: '#0ef1f1',
      beforeShow: function () {},
      afterShown: function () {},
      beforeHide: function () {}, 
      afterHidden: function () {} 
  });
}

/*----------  Configure tinymce editor  ----------*/
function plugin_editor(selector, settings){
  selector = typeof(selector) == 'undefined' ? '.tinymce' : selector;
  var _settings = {
    selector: selector,
    menubar: false,
    theme: "modern",
    branding: false,
    paste_data_images: true,
    relative_urls: false,
    convert_urls: false,
    inline_styles: true,
    verify_html: false,
    cleanup: false,
    autoresize_bottom_margin: 25,
    plugins: [
      "advlist autolink lists link charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar1: "forecolor backcolor | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link image media | print preview emoticons",
    // file_browser_callback: elFinderBrowser,
  }

  if (typeof(settings) != 'undefined') {
    for (var key in settings) {
      if (key == 'append_plugins') {
        _settings['plugins'].push(settings[key]);
      } else if(key == 'toolbar') {
        _settings['toolbar1'] = _settings['toolbar1'] + " " + settings[key];
      }else{
        _settings[key] = settings[key];
      }
    }
  }
  var editor = tinymce.init(_settings);
  return editor;
}

function elFinderBrowser (field_name, url, type, win) {
  tinymce.activeEditor.windowManager.open({
    file: PATH + 'file_manager/elfinder_init',// use an absolute path!
    title: 'File manager',
    width: 900,  
    height: 450,
    resizable: 'yes',
    inline:true
  }, {
    setUrl: function (url) {
      win.document.getElementById(field_name).value = url;
    }
  });
  return false;
}

function sendXMLPostRequest($url, $params){
  var Url      = $url;
  var params   = $params;
  var xhr      = new XMLHttpRequest();
  xhr.open('POST', Url, true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = processRequest;
  function processRequest(e) {
    console.log(xhr);
    if (xhr.readyState == 4 && xhr.status == 200) {
      var response = JSON.parse(xhr.responseText);
      console.log(response.status);
    }
  }
  xhr.send(params);
}

/*----------  Upload media and return path to input selector  ----------*/
function getPathMediaByelFinderBrowser(_this, default_selector){
  var _that = _this;
  var _passToElement = typeof(default_selector) == 'undefined' ? _that.siblings('input')  : default_selector;
  tinymce.activeEditor.windowManager.open({
    file: PATH + 'file_manager/elfinder_init',
    title: 'File manager',
    width: 900,  
    height: 450,
    resizable: 'yes',
    inline:true
  }, {
    setUrl: function (url) {
      _passToElement.val(url);
    }
  });
  return false;
}
