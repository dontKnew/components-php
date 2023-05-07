$(document).ready(() => {
    $("#profileImage").change(function () {
        const file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                $("#profilePreview")
                  .attr("src", event.target.result);
            };
            reader.readAsDataURL(file);
        }
    });

    // document.querySelector('.attachment-file-input').addEventListener('change', function (e) {
    //     var name = document.getElementById("attachmentFileInput").files[0].name;
        // var nextSibling = e.target.nextElementSibling
        // nextSibling.innerText = name
        // console.warn(document.getElementById("attachmentFileInput").files[0]);
        // if (document.getElementById("attachmentFileInput").files[0]) {
        //     let reader = new FileReader();
        //     reader.onload = function (event) {
        //         $("#attachmentPreview")
        //           .attr("src", event.target.result);
        //     };
        //     reader.readAsDataURL(document.getElementById("attachmentFileInput").files[0]);
        // }
      // })

      // document.querySelector('.attachment-file-input1').addEventListener('change', function (e) {
        // var name = document.getElementById("attachmentFileInput1").files[0].name;
        // var nextSibling = e.target.nextElementSibling
        // nextSibling.innerText = name
        // console.warn(document.getElementById("attachmentFileInput").files[0]);
        // if (document.getElementById("attachmentFileInput").files[0]) {
        //     let reader = new FileReader();
        //     reader.onload = function (event) {
        //         $("#attachmentPreview")
        //           .attr("src", event.target.result);
        //     };
        //     reader.readAsDataURL(document.getElementById("attachmentFileInput").files[0]);
        // }
      // })
      $("#toggle-emoji").on("click",function(){
        $("#emoji-picker").toggle();
      })
      $("#toggle-emoji").click();

      $("#toggle-emoji1").on("click",function(){
        $("#emoji-picker1").toggle();
      })
      $("#toggle-emoji1").click();
});


