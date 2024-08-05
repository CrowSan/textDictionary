
// with doc.ready() code waits for HTML to load and then JS code runs. if the code runs first it can not find elements
$(document).ready(function() {
    $(".mode").click(function() {
        $("body").toggleClass("body_dark");
    });

    $("#namelist_maker_form").submit(function(event){
        //now submitting sould not send our ass to another page
        event.preventDefault(); 
       
        //assign datas to var so we put them in array
        var txtFile = $("#namelist_txt").prop("files")[0];
        var jsonName = $("#json_file_name").val();

        //making an Obj from datas
        var formData = new FormData();
        formData.append("txtFile", txtFile);
        formData.append("jsonName", jsonName);

        $.ajax({
            url: "factory.php",
            type: "POST",
            data:  formData,
            contentType: false,
            processData: false,
            success: function (data) {
                $(".new_NameList_btn").attr("href",data);
                $(".new_NameList_btn").html(data);
            }

        });
    });




    $("#add_form").submit(function(event){
        //now submitting sould not send our ass to another page
        event.preventDefault(); 
       
        //assign datas to var so we put them in array
        var newTxtFile = $("#add_txt_file").prop("files")[0];
        var oldJsonFile = $("#add_json_file").prop("files")[0];

        //making an Obj from datas
        var addFormData = new FormData();
        addFormData.append("txtFile", newTxtFile);
        addFormData.append("jsonFile", oldJsonFile);

        $.ajax({
            url: "factory.php",
            type: "POST",
            data:  addFormData,
            contentType: false,
            processData: false,
            success: function (data) {
                $("#add_btn").attr("href",data);
                $("#add_btn").html(data);
            
            }
        });
    });

        //hides all forms in the page
        $(".container").hide();

        // Toggle forms when list items are clicked
        $("#frm_btn1").click(function() {
            $(".newNL_frm").toggle();
            $(".add2NL_frm, .NumText_frm").hide();
        });

        $("#frm_btn2").click(function() {
            $(".add2NL_frm").toggle();
            $(".newNL_frm, .NumText_frm").hide();
        });

        $("#frm_btn3").click(function() {
            $(".NumText_frm").toggle();
            $(".newNL_frm, .add2NL_frm").hide();
        });

















});