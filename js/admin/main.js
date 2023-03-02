/* JavaScripts for admin Panel */
/****************************** create user *********************/


/*--------- From Main Blade Layout ------- */
$(function(){
    $(document).on("click", "[data-hide]", function(){
        $(this).closest("." + $(this).attr("data-hide")).hide();
    });
});


function initToolbarBootstrapBindings() {
       var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 
             'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
             'Times New Roman', 'Verdana'],
             fontTarget = $('[title=Font]').siblings('.dropdown-menu');
       $.each(fonts, function (idx, fontName) {
           fontTarget.append($('<li><a data-edit="fontName ' + fontName +'" style="font-family:\''+ fontName +'\'">'+fontName + '</a></li>'));
       });
       $('a[title]').tooltip({container:'body'});
       $('.dropdown-menu input').click(function() {return false;})
           .change(function () {$(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');})
         .keydown('esc', function () {this.value='';$(this).change();});

       $('[data-role=magic-overlay]').each(function () { 
         var overlay = $(this), target = $(overlay.data('target')); 
         overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
       });
       if ("onwebkitspeechchange" in document.createElement("input")) {
         var editorOffset = $('#editor').offset();
         // $('#voiceBtn').css('position','absolute').offset({top: editorOffset.top, left: editorOffset.left+$('#editor').innerWidth()-35});
       } else {
         $('#voiceBtn').hide();
       }
   }
   function showErrorAlert (reason, detail) {
       var msg='';
       if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
       else {
           console.log("error uploading file", reason, detail);
       }
       $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+ 
        '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
   }

  $(document).ready(function(){            
      $(document).on("click", ".nav-link", function(e){
          $("#pageContent").html("");
          $("#pageContent").html('<p class="m-t-lg text-center"><i class="fa fa-spinner fa fa-spin fa fa-4x"></i></p>');
          e.preventDefault();
          var url=$(this).find('a').attr('href'); var u=url;
          $.get(url, function(data){
              pageContent = $(data).find("#pageContent").html();
              $("#pageContent").html(pageContent);
              
              initToolbarBootstrapBindings();
              //$('#editor').wysiwyg({ fileUploadError: showErrorAlert});  
              if(url==globalPath+"/admin/contact/contactdetails"){
                startContactSummernote();
              }
              if(url==globalPath+"/admin/programs/addprogram"){
                startProgramSummernote();
              }
              if(url==globalPath+"/admin/othercourses/manage"){
                startOthercourseSummernote();
              }      
          }).done(function(data) {
            pageModals = $(data).find("#pageModals").html();
              $("#pageModals").html(pageModals);
		console.log(u);
	    if(u.indexOf(globalPath+"/admin/people")>-1){
            }else if(u.indexOf(globalPath+"/admin/events")>-1) {
              eventPageDatePicker();
            }else if(u.indexOf(globalPath+"/admin/report")>-1) {
              reportPageDatePicker();
            }  
                         
          }).fail(function() {
              $("#pageContent").html("Sorry! Error processing your Request.");
          });              
      });            
      
  });

  $(document).ready(function(){            
      $(document).on("click", ".link", function(e){
          $("#pageContent").html("");
          $("#pageContent").html('<p class="m-t-lg text-center"><i class="fa fa-spinner fa fa-spin fa fa-4x"></i></p>');
          e.preventDefault();
          var url=$(this).attr('href'); var u=url;
          $.get(url, function(data){
              pageContent = $(data).find("#pageContent").html();
              $("#pageContent").html(pageContent);
              
              initToolbarBootstrapBindings();
              //$('#editor').wysiwyg({ fileUploadError: showErrorAlert});  
              if(url==globalPath+"/admin/contact/contactdetails"){
                startContactSummernote();
              }
              if(url==globalPath+"/admin/programs/addprogram"){
                startProgramSummernote();
              } 
              if(url==globalPath+"/admin/othercourses/manage"){
                startOthercourseSummernote();
              }          
          }).done(function(data) {
            pageModals = $(data).find("#pageModals").html();
              $("#pageModals").html(pageModals);
    console.log(u);
      if(u.indexOf(globalPath+"/admin/people")>-1){
            }else if(u.indexOf(globalPath+"/admin/events")>-1) {
              eventPageDatePicker();
            }else if(u.indexOf(globalPath+"/admin/report")>-1) {
              reportPageDatePicker();
            }  
                         
          }).fail(function() {
              $("#pageContent").html("Sorry! Error processing your Request.");
          });              
      });            
      
  });

  $(document).ready(function(){            
      $(document).on("click", ".linked-card", function(e){
          $("#pageContent").html("");
          $("#pageContent").html('<p class="m-t-lg text-center"><i class="fa fa-spinner fa fa-spin fa fa-4x"></i></p>');
          e.preventDefault();
          var url=$(this).attr('data-href'); var u=url;
          $.get(url, function(data){
              pageContent = $(data).find("#pageContent").html();
              $("#pageContent").html(pageContent);
              
              initToolbarBootstrapBindings();
              //$('#editor').wysiwyg({ fileUploadError: showErrorAlert});  
              if(url==globalPath+"/admin/contact/contactdetails"){
                startContactSummernote();
              }
              if(url==globalPath+"/admin/programs/addprogram"){
                startProgramSummernote();
              }  
              if(url==globalPath+"/admin/othercourses/manage"){
                startOthercourseSummernote();
              }        
          }).done(function(data) {
            pageModals = $(data).find("#pageModals").html();
              $("#pageModals").html(pageModals);
    console.log(u);
      if(u.indexOf(globalPath+"/admin/people")>-1){
            }else if(u.indexOf(globalPath+"/admin/events")>-1) {
              eventPageDatePicker();
            }else if(u.indexOf(globalPath+"/admin/report")>-1) {
              reportPageDatePicker();
            }  
                         
          }).fail(function() {
              $("#pageContent").html("Sorry! Error processing your Request.");
          });              
      });            
      
  });
/*---------------------------------------- */

 $(document).on('submit',"#addnewpeople",function(event){
        event.preventDefault();
        var data = $(this).serializeArray();
        //data.push({'name':'usertype','value':$("#usertype option:selected").text()});
        var url=$(this).attr("action");
        $.post(url,data,function(){

        }).done(function(res){
            //alert success/error
            if(res=='true')
            {
                $('#addnewpeople').trigger("reset");
                $(".flash-message-text").text("User Added Successfully!");
                $(".flash-message").removeClass("alert-danger");
                $(".flash-message").removeClass("alert-warning");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-success");
                $(".flash-message").show();
            }
            else if(res=='error')
            {
                //$('#addnewpeople').trigger("reset");
                $(".flash-message-text").text("Error! There was some problem processing your request. Please try again.");
                $(".flash-message").removeClass("alert-danger");
                $(".flash-message").removeClass("alert-warning");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-success");
                $(".flash-message").show();
            }
            else
            {
                //$('#addnewpeople').trigger("reset");
                $(".flash-message-text").text("Error! email id already taken");
                $(".flash-message").removeClass("alert-danger");
                $(".flash-message").removeClass("alert-warning");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-success");
                $(".flash-message").show();
            }
        });
    });

$(document).on("click",".deletepeople",function(event){
  event.preventDefault();
  var tmp=$(this);
  bootbox.confirm("Are you sure to delete ?",function(res){
    if(res)
    {
      $.post(globalPath+'/admin/useractivity/deleteuser/'+tmp.attr('data-id'),{},function(){

      }).done(function(res){
          if(res==1)
          {
            $(".flash-message-text").text("User Removed Successfully!");
            $(".flash-message").removeClass("alert-danger");
            $(".flash-message").removeClass("alert-warning");
            $(".flash-message").removeClass("alert-info");
            $(".flash-message").addClass("alert-success");
            $(".flash-message").show();
            tmp.parents('tr').remove();
          }
          else
          {
            $(".flash-message-text").text("Error! There was some problem processing your request. Please try again.");
            $(".flash-message").removeClass("alert-danger");
            $(".flash-message").removeClass("alert-warning");
            $(".flash-message").removeClass("alert-info");
            $(".flash-message").addClass("alert-success");
            $(".flash-message").show();
          }
      });    
    }
  });
});

$(document).on("click",".editpeople",function(event){
  event.preventDefault();
  $.get(globalPath+'/admin/useractivity/updateuser/'+$(this).attr('data-id'),function(data){
      $("#userdetailsupdate").html(data);
      $("#editUserDetails").modal('show');
  });
  
});


$(document).on("submit","#updateuserbyadmin",function(event){
  event.preventDefault();
  $.post(globalPath+'/useractivity/updateuser/'+$(this).attr('data-id'),$(this).serialize(),function(){

  }).done(function(res){
      if(res==1)
          {
            $(".flash-message-text").text("User Updated Successfully!");
            $(".flash-message").removeClass("alert-danger");
            $(".flash-message").removeClass("alert-warning");
            $(".flash-message").removeClass("alert-info");
            $(".flash-message").addClass("alert-success");
            $(".flash-message").show();
            $("#editUserDetails").modal("hide");
          }
          else
          {
            $(".flash-message-text").text("Error! There was some problem processing your request. Please try again.");
            $(".flash-message").removeClass("alert-danger");
            $(".flash-message").removeClass("alert-warning");
            $(".flash-message").removeClass("alert-info");
            $(".flash-message").addClass("alert-success");
            $(".flash-message").show();
            $("#editUserDetails").modal("hide");
          }
  });
});

/****************************************************************/


/*------ Resource -> Link -------*/

  $(document).on("click", ".add-link-btn", function(e){
    e.preventDefault();
    $("#pageContent").html("");
    $("#pageContent").html('<p class="m-t-lg text-center"><i class="fa fa-spinner fa fa-spin fa fa-4x"></i></p>');
    $.get($(this).attr('href'), function(data){
      pageContent = $(data).find("#pageContent").html();
      $("#pageContent").html(pageContent);      
      initToolbarBootstrapBindings();
      //$('#editor').wysiwyg({ fileUploadError: showErrorAlert});                       
    }).done(function(data) {
      pageModals = $(data).find("#pageModals").html();
        $("#pageModals").html(pageModals);  
    }).fail(function() {
      $("#pageContent").html("Sorry! Error processing your Request.");
    });
  });

  $(document).on("click",".deletelink",function(event){
    event.preventDefault();
    var url=globalPath+"/admin/resources/deletelinks"+'/'+$(this).attr('data-id');
    var tmp=$(this);
    bootbox.confirm("Are you sure to delete this link?", function(result) {
      if(result)
      {
        $.post(url,{},function(data){         
            }).done(function(data){
              if(data.deleted==="true")
              {
                $("#autoRefresh").html(data.listoflinks);
            $(".flash-message-text").text("Link deleted Successfully!");
            $(".flash-message").removeClass("alert-danger");
            $(".flash-message").removeClass("alert-warning");
            $(".flash-message").removeClass("alert-info");
            $(".flash-message").addClass("alert-success");
            $(".flash-message").show();
              }
              else if(data.deleted==="false")
              {
                $(".flash-message-text").text("Sorry! There was some problem deleting the link.");
            $(".flash-message").removeClass("alert-success");
            $(".flash-message").removeClass("alert-warning");
            $(".flash-message").removeClass("alert-info");
            $(".flash-message").addClass("alert-danger");
            $(".flash-message").show();
              }
              else
              {
                $(".flash-message-text").text(data.deleted);
            $(".flash-message").removeClass("alert-danger");
            $(".flash-message").removeClass("alert-success");
            $(".flash-message").removeClass("alert-info");
            $(".flash-message").addClass("alert-warning");
            $(".flash-message").show();
              }
            });
      }
    });
  });

/*------------------------------------*/

/* --------- Resource -> Create Link ----------*/
  $(document).on("submit","#addlinksform",function(event){
      event.preventDefault();
      var url=$(this).attr('action');
      var data=$(this).serializeArray();
      $.post(url,data,function(){

      }).done(function(res){
        if(res=="true")
        {
          $(".flash-message-text").text("Link added Successfully !");
              $(".flash-message").removeClass("alert-danger");
              $(".flash-message").removeClass("alert-warning");
              $(".flash-message").removeClass("alert-info");
              $(".flash-message").addClass("alert-success");
              $(".flash-message").show();
              $("#addlinksform").trigger('reset');
        }
        else if(res==="false")
        {
          $(".flash-message-text").text("Error! There was some problem processing your request. Please try again");
              $(".flash-message").removeClass("alert-danger");
              $(".flash-message").removeClass("alert-warning");
              $(".flash-message").removeClass("alert-info");
              $(".flash-message").addClass("alert-success");
              $(".flash-message").show();
              $("#addlinksform").trigger('reset');
        }
        else
        {
          $(".flash-message-text").text("It seems to be SESSION OUT ! please reload the page and try again !");
              $(".flash-message").removeClass("alert-danger");
              $(".flash-message").removeClass("alert-warning");
              $(".flash-message").removeClass("alert-info");
              $(".flash-message").addClass("alert-success");
              $(".flash-message").show();
              $("#addlinksform").trigger('reset');
        }
      });
  });

  $(document).on("click","#donotaddlink",function(event){
    event.preventDefault();
    $("#pageContent").html("");
      $("#pageContent").html('<p class="m-t-lg text-center"><i class="fa fa-spinner fa fa-spin fa fa-4x"></i></p>');
      $.get(globalPath+"/admin/resources/links", function(data){
        pageContent = $(data).find("#pageContent").html();
        $("#pageContent").html(pageContent);      
        initToolbarBootstrapBindings();
        //$('#editor').wysiwyg({ fileUploadError: showErrorAlert});                       
      }).done(function(data) {
        pageModals = $(data).find("#pageModals").html();
          $("#pageModals").html(pageModals);
      }).fail(function() {
        $("#pageContent").html("Sorry! Error processing your Request.");
      });
  }); 
/*---------------------------------------------*/


/*------------ Resource -> Documents ----------------*/
  $(document).on("click", ".add-docs-btn", function(e){
    e.preventDefault();
    $("#pageContent").html("");
    $("#pageContent").html('<p class="m-t-lg text-center"><i class="fa fa-spinner fa fa-spin fa fa-4x"></i></p>');
    $.get($(this).attr('href'), function(data){
      pageContent = $(data).find("#pageContent").html();
      $("#pageContent").html(pageContent);      
      initToolbarBootstrapBindings();
      //$('#editor').wysiwyg({ fileUploadError: showErrorAlert});                       
    }).done(function(data) {
      pageModals = $(data).find("#pageModals").html();
        $("#pageModals").html(pageModals);
    }).fail(function() {
      $("#pageContent").html("Sorry! Error processing your Request.");
    });
  });

  $(document).on("click",".deletedocs",function(event){
    event.preventDefault();
    var url=globalPath+"/admin/resources/deletedocs"+'/'+$(this).attr('data-id');
    var tmp=$(this);
    bootbox.confirm('Are you sure to delete this document?',function(result)
    {
      if(result)
      {
        $.post(url,{},function(data){

        }).done(function(data){
          if(data.deleted==="true")
          {
            $(".flash-message-text").text("Document was deleted Successfully !");
                $(".flash-message").removeClass("alert-danger");
                $(".flash-message").removeClass("alert-warning");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-success");
                $(".flash-message").show();
                //tmp.parents('.each-event').remove();
                //tmp.parents('tr').remove();
                tmp.parents('tr').animo({animation:'bounceOut', keep: true}).done(tmp.parents('tr').remove());
               
          }
          else if(data.deleted==="false")
          {
            $(".flash-message-text").text("Sorry! There was some problem deleting the document. Please try again.");
                $(".flash-message").removeClass("alert-success");
                $(".flash-message").removeClass("alert-warning");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-danger");
                $(".flash-message").show();
          }
          else
          {
            $(".flash-message-text").text(data.deleted);
                $(".flash-message").removeClass("alert-danger");
                $(".flash-message").removeClass("alert-success");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-warning");
                $(".flash-message").show();
          }
        });
      }
    });
  });

  $(document).on("click",".viewdocd",function(event){
    event.preventDefault();
    $.get($(this).attr('href'),function(){

    }).done(function(res){
      $("#displayDocument .modal-body").html(res);
      $("#displayDocument").modal("show");
    });
  });

/*---------------------------------------------------*/

/* --------- Resource -> Create Document ----------*/

var docscreateoption = {
      success:   function(res) { 
       if(res==1)
        {
          $(".flash-message-text").text("Document added Successfully !");
          $(".flash-message").removeClass("alert-danger");
          $(".flash-message").removeClass("alert-warning");
          $(".flash-message").removeClass("alert-info");
          $(".flash-message").addClass("alert-success");
          $(".flash-message").show();
          $("#adddocsform").trigger('reset');
        }
        else if(res===0)
        {
          $(".flash-message-text").text("Error! There was some problem processing your request. Please try again");
          $(".flash-message").removeClass("alert-danger");
          $(".flash-message").removeClass("alert-warning");
          $(".flash-message").removeClass("alert-info");
          $(".flash-message").addClass("alert-success");
          $(".flash-message").show();
          $("#adddocsform").trigger('reset');
        }
        else
        {
          $(".flash-message-text").text(res);
          $(".flash-message").removeClass("alert-danger");
          $(".flash-message").removeClass("alert-success");
          $(".flash-message").removeClass("alert-info");
          $(".flash-message").addClass("alert-warning");
          $(".flash-message").show();
          $("#createevent").trigger('reset');
        }
    } 
};

$(document).on("submit","#adddocsform",function(event){
    event.preventDefault();
    var data=$(this).serialize();
    $(this).ajaxSubmit(docscreateoption);
});
  // $(document).on("submit","#adddocsform",function(event){
  //     event.preventDefault();
  //     var url=$(this).attr('action');
  //     var data=$(this).serializeArray();
  //     $.post(url,data,function(){

  //     }).done(function(res){
  //       if(res=="true")
  //       {
  //         $(".flash-message-text").text("Document added Successfully !");
  //             $(".flash-message").removeClass("alert-danger");
  //             $(".flash-message").removeClass("alert-warning");
  //             $(".flash-message").removeClass("alert-info");
  //             $(".flash-message").addClass("alert-success");
  //             $(".flash-message").show();
  //             $("#adddocsform").trigger('reset');
  //       }
  //       else if(res==="false")
  //       {
  //         $(".flash-message-text").text("Error! There was some problem processing your request. Please try again");
  //             $(".flash-message").removeClass("alert-danger");
  //             $(".flash-message").removeClass("alert-warning");
  //             $(".flash-message").removeClass("alert-info");
  //             $(".flash-message").addClass("alert-success");
  //             $(".flash-message").show();
  //             $("#adddocsform").trigger('reset');
  //       }
  //       else
  //       {
  //         $(".flash-message-text").text("It seems to be SESSION OUT ! please reload the page and try again !");
  //             $(".flash-message").removeClass("alert-danger");
  //             $(".flash-message").removeClass("alert-warning");
  //             $(".flash-message").removeClass("alert-info");
  //             $(".flash-message").addClass("alert-success");
  //             $(".flash-message").show();
  //             $("#adddocsform").trigger('reset');
  //       }
  //     });
  // });
  $(document).on("click","#donotadddoc",function(event){
    event.preventDefault();
    $("#pageContent").html("");
      $("#pageContent").html('<p class="m-t-lg text-center"><i class="fa fa-spinner fa fa-spin fa fa-4x"></i></p>');
      $.get(globalPath+"/admin/resources/docs", function(data){
        pageContent = $(data).find("#pageContent").html();
        $("#pageContent").html(pageContent);      
        initToolbarBootstrapBindings();
        //$('#editor').wysiwyg({ fileUploadError: showErrorAlert});                       
      }).done(function(data) {
        pageModals = $(data).find("#pageModals").html();
          $("#pageModals").html(pageModals);
      }).fail(function() {
        $("#pageContent").html("Sorry! Error processing your Request.");
      });
  }); 
/*---------------------------------------------*/

/*------ Resource -> Hall -------*/

  $(document).on("click", ".add-hall-btn", function(e){
    e.preventDefault();
    $("#pageContent").html("");
    $("#pageContent").html('<p class="m-t-lg text-center"><i class="fa fa-spinner fa fa-spin fa fa-4x"></i></p>');
    $.get($(this).attr('href'), function(data){
      pageContent = $(data).find("#pageContent").html();
      $("#pageContent").html(pageContent);      
      initToolbarBootstrapBindings();
      //$('#editor').wysiwyg({ fileUploadError: showErrorAlert});                       
    }).done(function(data) {
      pageModals = $(data).find("#pageModals").html();
        $("#pageModals").html(pageModals); 
    }).fail(function() {
      $("#pageContent").html("Sorry! Error processing your Request.");
    });
  });

  $(document).on("click",".deletehall",function(event){
    event.preventDefault();
    var url=globalPath+"/admin/resources/deletehall"+'/'+$(this).attr('data-id');
    var tmp=$(this);
    bootbox.confirm("Are you sure to delete this hall?", function(result) {
      if(result)
      {
        $.post(url,{},function(data){         
            }).done(function(data){
              if(data.deleted==="true")
              {
                $("#autoRefresh").html(data.listofhalls);
            $(".flash-message-text").text("Hall deleted Successfully!");
            $(".flash-message").removeClass("alert-danger");
            $(".flash-message").removeClass("alert-warning");
            $(".flash-message").removeClass("alert-info");
            $(".flash-message").addClass("alert-success");
            $(".flash-message").show();
              }
              else if(data.deleted==="false")
              {
                $(".flash-message-text").text("Sorry! There was some problem deleting the link.");
            $(".flash-message").removeClass("alert-success");
            $(".flash-message").removeClass("alert-warning");
            $(".flash-message").removeClass("alert-info");
            $(".flash-message").addClass("alert-danger");
            $(".flash-message").show();
              }
              else
              {
                $(".flash-message-text").text(data.deleted);
            $(".flash-message").removeClass("alert-danger");
            $(".flash-message").removeClass("alert-success");
            $(".flash-message").removeClass("alert-info");
            $(".flash-message").addClass("alert-warning");
            $(".flash-message").show();
              }
            });
      }
    });
  });

/*------------------------------------*/

/* --------- Resource -> Create Hall----------*/
  $(document).on("submit","#addhallsform",function(event){
      event.preventDefault();
      var url=$(this).attr('action');
      var data=$(this).serializeArray();
      $.post(url,data,function(){

      }).done(function(res){
        if(res=="true")
        {
          $(".flash-message-text").text("Hall added Successfully !");
              $(".flash-message").removeClass("alert-danger");
              $(".flash-message").removeClass("alert-warning");
              $(".flash-message").removeClass("alert-info");
              $(".flash-message").addClass("alert-success");
              $(".flash-message").show();
              $("#addhallsform").trigger('reset');
        }
        else if(res==="false")
        {
          $(".flash-message-text").text("Error! There was some problem processing your request. Please try again");
              $(".flash-message").removeClass("alert-danger");
              $(".flash-message").removeClass("alert-warning");
              $(".flash-message").removeClass("alert-info");
              $(".flash-message").addClass("alert-success");
              $(".flash-message").show();
        }
        else
        {
          $(".flash-message-text").text("It seems to be SESSION OUT ! please reload the page and try again !");
              $(".flash-message").removeClass("alert-danger");
              $(".flash-message").removeClass("alert-warning");
              $(".flash-message").removeClass("alert-info");
              $(".flash-message").addClass("alert-success");
              $(".flash-message").show();
        }
      });
  });

  $(document).on("click","#donotaddhall",function(event){
    event.preventDefault();
    $("#pageContent").html("");
      $("#pageContent").html('<p class="m-t-lg text-center"><i class="fa fa-spinner fa fa-spin fa fa-4x"></i></p>');
      $.get(globalPath+"/admin/resources/conferencehalls", function(data){
        pageContent = $(data).find("#pageContent").html();
        $("#pageContent").html(pageContent);      
        initToolbarBootstrapBindings();
        //$('#editor').wysiwyg({ fileUploadError: showErrorAlert});                       
      }).done(function(data) {
        pageModals = $(data).find("#pageModals").html();
          $("#pageModals").html(pageModals);
      }).fail(function() {
        $("#pageContent").html("Sorry! Error processing your Request.");
      });
  }); 
/*---------------------------------------------*/

/****************Delete image gallery image**********************/

$(document).on("click",".deleteimage",function(event){
  event.preventDefault();
  var tmp=$(this);
  bootbox.confirm("Are you sure to Delete ?",function(res){
    if(res)
    {
      $.post(globalPath+'/admin/resources/deleteimage/'+tmp.attr('data-id'),{},function(){

      }).done(function(result){
          if(result==1)
          {
              tmp.parents('.eachimage').remove();
              $(".flash-message-text").text("Image deleted Successfully !");
              $(".flash-message").removeClass("alert-danger");
              $(".flash-message").removeClass("alert-warning");
              $(".flash-message").removeClass("alert-info");
              $(".flash-message").addClass("alert-success");
              $(".flash-message").show();

          }
          else
          {
              $(".flash-message-text").text("Error! There was some problem processing your request. Please try again");
              $(".flash-message").removeClass("alert-success");
              $(".flash-message").removeClass("alert-warning");
              $(".flash-message").removeClass("alert-info");
              $(".flash-message").addClass("alert-danger");
              $(".flash-message").show();
          }
      });
    }
  });
});

/***************************************/

/*------------ Slider --------------------*/

$(document).on("click",".deletesliderimg",function(event){
  event.preventDefault();
  event.stopPropagation();
  var tmp=$(this);
  bootbox.confirm('Are you sure to delete ? ',function(result){
    if(result)
    {
      $.post(globalPath+'/admin/slider/delete/'+tmp.attr('data-id'),{},function(){

      }).done(function(res){
        if(res==1)
        {
          $(".flash-message-text").text("Slider Image Removed Successfully !");
              $(".flash-message").removeClass("alert-danger");
              $(".flash-message").removeClass("alert-warning");
              $(".flash-message").removeClass("alert-info");
              $(".flash-message").addClass("alert-success");
              $(".flash-message").show();
              tmp.parents('tr').remove();
        }
        else
        {
          $(".flash-message-text").text("Error! There was some problem processing your request. Please try again");
              $(".flash-message").removeClass("alert-success");
              $(".flash-message").removeClass("alert-warning");
              $(".flash-message").removeClass("alert-info");
              $(".flash-message").addClass("alert-danger");
              $(".flash-message").show();
        }
      });
    }
  });
});

var sliderOptions = { 
            beforeSubmit:showSliderUploadRequest,
            success:showSliderUploadResponse,
            dataType:'json'
        };
$(document).on("submit", "#uploadSlideimage1", function(event){
  event.preventDefault();
  $(this).ajaxSubmit(sliderOptions);
});

function showSliderUploadRequest(formData, jqForm, options) { 
            //$("#validation-errors").hide().empty();
            //$("#output").css('display','none');
            //return true; 
} 
function showSliderUploadResponse(response, statusText, xhr, $form)  
{ 
    if(response.success == false)
    {
        var arr = response.errors;
        $.each(arr, function(index, value)
        {
            if (value.length != 0)
            {
                //$("#validation-errors").append('<div class="alert alert-error"><strong>'+ value +'</strong><div>');
            }
        });
        // $("#UploadImgForSlider").modal("hide");
        // $("#uploadSlideimage1").trigger('reset');
        // $(".flash-message-text").text("Error! There was some problem processing your request. Please try again");
        // $(".flash-message").removeClass("alert-danger");
        // $(".flash-message").removeClass("alert-warning");
        // $(".flash-message").removeClass("alert-info");
        // $(".flash-message").addClass("alert-danger");
        // $(".flash-message").show();
        //$("#validation-errors").show();
        console.log("Error in Upload !");
    } 
    else 
    {
      $("#UploadImgForSlider").modal("hide");
      $("#sliderimagelist").append("<tr><td class=\"slidetext\">"+response.text+"<td><img class=\"sligeimg\" src=\""+globalPath+"/siteimages/slider/"+response.file+"\"/></td><td>"+response.order+"</td><td><a href=\"#\" class=\"btn btn-xs btn-danger deletesliderimg\" data-id=\""+response.dataid+"\"><i class=\"fa fa-trash-o\"></i> Delete</a></td></tr>");
      $("#uploadSlideimage1").trigger('reset');
      $(".flash-message-text").text("Image uploaded Successfully!");
      $(".flash-message").removeClass("alert-danger");
      $(".flash-message").removeClass("alert-warning");
      $(".flash-message").removeClass("alert-info");
      $(".flash-message").addClass("alert-success");
      $(".flash-message").show();
    }
}

/*-----------------------------------------*/

/*------ Gallery ---------------*/

  $(document).ready(function() {
      var options = { 
          beforeSubmit:showRequest,
          success:showGalleryResponse,
          dataType:'json'
      };
      // $('body').delegate('#fileuploadtogallery','change', function(){
      //     $('.postUploadform').ajaxForm(options).submit();          
      // }); 
      $(document).on("click", "#uploadAlbum", function(){
        event.preventDefault();
        $('.postUploadform').ajaxForm(options).submit();
        w = $("#uploadModal .modal-body").width()+parseInt($("#uploadModal .modal-body").css("paddingLeft").replace('px', ''))+parseInt($("#uploadModal .modal-body").css("paddingRight").replace('px', ''));
        h = $("#uploadModal .modal-body").height();
        pL = $("#uploadModal .modal-body").css("paddingLeft");
        pT = $("#uploadModal .modal-body").css("paddingTop");
        $('<div class="spinner-container" style="margin-left:-'+pL+'; margin-top:-'+pT+';"><div class="fa fa-spinner fa fa-spin fa fa-4x spinner" style="padding-top:'+parseInt(h/2-26+20)+'px; padding-left:'+(w/2-23)+'px;"></div></div>').insertBefore("#uploadModal .modal-body .spinner-base");
      })
  });
  function showRequest(formData, jqForm, options) { 
      //$("#validation-errors").hide().empty();
      //$("#output").css('display','none');
      //return true; 
  } 
  function showGalleryResponse(response, statusText, xhr, $form)  
  { 
    console.log(response);
		if(response.success === false)
    {
      // var arr = response.errors;
      // $.each(arr, function(index, value)
      // {
      //   if (value.length !== 0)
      //   {
      //     //$("#validation-errors").append('<div class="alert alert-error"><strong>'+ value +'</strong><div>');
      //   }
      // });
      //$("#validation-errors").show();
	    $("#uploadModal").modal("hide");
      $('.postUploadform').trigger('reset');
      $("#uploadModal .spinner-container").remove();
      $(".flash-message-text").text(response.msg);
      $(".flash-message").removeClass("alert-success");
      $(".flash-message").removeClass("alert-warning");
      $(".flash-message").removeClass("alert-info");
      $(".flash-message").addClass("alert-danger");
      $(".flash-message").show();
    } 
    else 
    {
      $("#uploadModal").modal("hide");
      $('.postUploadform').trigger('reset');
      $("#uploadModal .spinner-container").remove();
      var uploadedPics = "";
      for (var i = 0; i < response.files.length; i++) {
        uploadedPics += "<div class=\"col-sm-2 eachimage wrapper m-b\" style=\"height:100px;\"><a href=\""+globalPath+"/gallery/"+response.files[i]+"\" title=\""+response.files[i]+"\" data-gallery class=\"thumbnail thumb\" target=\"_blank\"><img src=\""+globalPath+"/gallery/"+response.files[i]+"\" alt=\"\"></a><div align=\"center\" style=\"margin-top:-60px; position: absolute; margin-left: 60px;\" class=\"deleteimage-container\"><a href=\"#\" class=\"deleteimage\" data-id=\""+response.ids[i]+"\" title=\"Delete this image\"><span class=\"fa fa-trash-o fa-2x text-danger\" style=\"margin-top:-50px;\"></span></a></div></div>";
      }
      if($('#gallerycontent').length!=0){
        $("#gallerycontent").append(uploadedPics);
      }else{
        $("#gallery").html("<div id=\"gallerycontent\">"+uploadedPics+"</div>");
      }
      $(".flash-message-text").text("Image uploaded Successfully!");
      $(".flash-message").removeClass("alert-danger");
      $(".flash-message").removeClass("alert-warning");
      $(".flash-message").removeClass("alert-info");
      $(".flash-message").addClass("alert-success");
      $(".flash-message").show();
    } 
  }

  $(document).on("submit", "#createAlbumform", function(event){
    event.preventDefault();
    var url=$(this).attr("action");
    if($("#albumname").val()<=0)
    {
        alert("Please select a user !");
    }
    else
    {
      $.post(url,$(this).serialize(),function(){

      }).done(function(res){
        if(res.status=="true")
        {
          //$("#albumlist").append('<div class="col-sm-4 linked-card" data-href="'+globalPath+'/admin/resources/album/'+res.id+'"><section class="panel bg-light"><div class="panel-body lter"><div class="text-center padder m-t"><a href="'+globalPath+'/admin/resources/album/'+res.id+'"><span class="h4 block"><i class="fa fa-picture-o"></i> '+res.album+'</span></a></div></div></section></div>');
          $("#gotoGallery").trigger("click");
          $("#createModal").modal('hide');
          bootbox.alert("Album Created Successfully");
        }
        else if(res.status=="false")
        {
          $("#createModal").modal('hide');
          bootbox.alert('Error : Unable to process you request ! Try again later');
        }
        else
        {
          $("#createModal").modal('hide');
          bootbox.alert('Error : Unknown Request !');
        }
      });
    }
  });

$(document).on("click","#deletealbum",function(event){
  event.preventDefault();
  var id=$(this).attr('data-id');
  bootbox.confirm("Are you sure you want to delete this album.",function(res){
    if(res)
    {
      $.post(globalPath+'/admin/resources/deletealbum',{'id':id},function(){

      }).done(function(res){
        if(res==1)
        {
          $("#gotoGallery").trigger("click");
          //window.location.href = globalPath+'/admin';
          bootbox.alert("Album deleted successfully");
        }
        else if(res==0)
        {
          bootbox.alert('Error : Unable to process you request ! Try again later');
        }
        else
        {
          bootbox.alert(res);
        }
      });
      
    }

  });
});
/*-------------------------------*/

/**************** Make as admin **************/
$(document).on("submit","#makeasadmin",function(event){
  event.preventDefault();
  if($("#makeppladmin").val()<=0)
  {
      alert("Please select a user !");
  }
  else
  {
      if($("#giveadminprivilege").prop('checked')==true)
      {
        $.post(globalPath+'/admin/changepermission',$(this).serialize(),function(){

        }).done(function(res){
          if(res==1)
          {
            //success
            $("#AdminListTable").append('<tr><td>'+$("#makeppladmin :selected").text()+'</td><td>'+$("#makeppladmin :selected").data("email")+'</td><td><a href="#" class="revokeadmin" title="" data-original-title="Revoke Admin" data-uid="'+$("#makeppladmin").val()+'"><span class="glyphicon glyphicon-remove"></span></a></td></tr>');
            $("#makeasadmin").trigger('reset');
          }
          else if(res==0)
          {
            //error 
            alert("Error : Unable to process your request ! please try again");
          }
          else if(res==2)
          {
            //un authorized
            alert("Error : Unknown Request");
          }
        });
      }
      else
      {
        alert('You have not checked');
      }
  }

});

$(document).on("click",".revokeadmin",function(event){
  event.preventDefault();
  var tmp=$(this);
  bootbox.confirm("Are you sure to remove this admin",function(res){
    if(res)
    {
      $.post(globalPath+'/admin/revokepermission',{'removeadmin':tmp.attr('data-uid')},function(){

      }).done(function(res){
        if(res==1)
        {
          tmp.parents('tr').remove();
        }
        else if(res==0)
        {
          alert('Error : Unable to process you request ! Try again later');
        }
        else if(res==2)
        {
          alert('Error : Unknown Request !');
        }
      });
      
    }

  });
});

/*************/


/********************* Program *******************/

  $(document).on("click", ".add-course", function(e){
    e.preventDefault();
    $("#sameno").html($(this).attr('data-whichsem'));
    $("#whichprogram").val($(this).attr('data-whichprogram'));
    $("#whichsem").val($(this).attr('data-whichsem'));
    $("#addCourseModal").modal("show");
  });

  $(document).on("submit", "#addCourseForm", function(e){
    e.preventDefault();
    var url=$(this).attr("action");
    var data1=$(this).serialize();
    $("#addCourseForm input").attr("disabled", "disabled");
    $("#addCourseForm textarea").attr("disabled", "disabled");
    $("#addCourseBtn").attr("disabled", "disabled");
    $("#addCourseBtn").html('<i class="fa fa-spinner fa fa-spin"></i> Adding Course');
    $(".flash-message").hide();
    $(".modal-flash-message").hide();
    w = $("#addCourseModal .modal-body").width()+parseInt($("#addCourseModal .modal-body").css("paddingLeft").replace('px', ''))+parseInt($("#addCourseModal .modal-body").css("paddingRight").replace('px', ''));
    h = $("#addCourseModal .modal-body").height();
    pL = $("#addCourseModal .modal-body").css("paddingLeft");
    pT = $("#addCourseModal .modal-body").css("paddingTop");
    $('<div class="spinner-container" style="margin-left:-'+pL+'; margin-top:-'+pT+';"><div class="fa fa-spinner fa fa-spin fa fa-4x spinner" style="padding-top:'+parseInt(h/2-26+20)+'px; padding-left:'+(w/2-23)+'px;"></div></div>').insertBefore("#addCourseModal .modal-body .spinner-base");
    
    $.post(url,data1,function(){

    }).done(function(data){
      if(data!="error"){ console.log(e);
        $("#addCourseModal .spinner-container").remove();
        $(".tab-content>.active").html("");
        $(".tab-content>.active").html(data);
        $("#addCourseForm").trigger('reset');
        $("#addCourseModal input").removeAttr("disabled");
        $("#addCourseModal textarea").removeAttr("disabled");
        $("#addCourseBtn").removeAttr("disabled");
        $("#addCourseBtn").html('<i class="fa fa-plus"></i> Add Course');
        $("#addCourseModal").modal('hide');

        $(".flash-message-text").text("Course added Successfully!");
        $(".flash-message").removeClass("alert-danger");
        $(".flash-message").removeClass("alert-warning");
        $(".flash-message").removeClass("alert-info");
        $(".flash-message").addClass("alert-success");
        $(".flash-message").show();
          }
          else
          {
            $("#addCourseModal .spinner-container").remove();
        $("#addCourseModal input").removeAttr("disabled");
        $("#addCourseModal textarea").removeAttr("disabled");
        $("#addCourseBtn").removeAttr("disabled");
        $("#addCourseBtn").html('<i class="fa fa-check"></i> Add Group');
        $(".modal-flash-message-text").text("Error! There was some problem processing your request. Please try again.");
        $(".modal-flash-message").removeClass("alert-success");
        $(".modal-flash-message").removeClass("alert-warning");
        $(".modal-flash-message").removeClass("alert-info");
        $(".modal-flash-message").addClass("alert-danger");
        $(".modal-flash-message").show();
      }
      
    }).fail(function(e){
      $("#addCourseModal .spinner-container").remove();
      $("#addCourseModal input").removeAttr("disabled");
      $("#addCourseModal textarea").removeAttr("disabled");
      $("#addCourseBtn").removeAttr("disabled");
      $("#addCourseBtn").html('<i class="fa fa-check"></i> Add Course');
      $(".modal-flash-message-text").text("Error! There was some problem processing your request. Please try again.");
      $(".modal-flash-message").removeClass("alert-success");
      $(".modal-flash-message").removeClass("alert-warning");
      $(".modal-flash-message").removeClass("alert-info");
      $(".modal-flash-message").addClass("alert-danger");
      $(".modal-flash-message").show();
    });
  });

  $(document).on("click", "#cancelAddingCourse", function(e){
    e.preventDafault();
    $("#addCourseForm").trigger('reset');
    $("#addCourseModal").modal("hide");
  });

  $(document).on('hidden.bs.modal', '#addCourseModal', function (e) {
    e.preventDefault();
      $("#addCourseForm").trigger("reset");
  });

  $(document).on("click", "#editProgramDetailsBtn", function(e){
    e.preventDefault();
    $("#programDetails").hide();
    $('#otherdetails').summernote({
        height: 300,   //set editable area's height
        //airMode: true,
        focus: true,
        toolbar: [
          //[groupname, [button list]]
          ['style', ['style']],
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['font', ['strike']],
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['edit', ['undo', 'redo']],
          ['misc', ['codeview', 'fullscreen']],
        ]
    });
    $("#editProgramDetails").show();
  });

  $(document).on("click", ".add-program-details", function(e){
    e.preventDefault();
    $("#programDetails").hide();
    $('#otherdetails').summernote({
        height: 300,   //set editable area's height
        //airMode: true,
        focus: true,
        toolbar: [
          //[groupname, [button list]]
          ['style', ['style']],
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['font', ['strike']],
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['edit', ['undo', 'redo']],
          ['misc', ['codeview', 'fullscreen']],
        ]
    });
    $("#editProgramDetails").show();
  });

  $(document).on("click", "#cancelEditingProgram", function(e){
    e.preventDefault();
    $('#otherdetails').destroy();
    $("#editProgramDetails").hide();
    $("#programDetails").show();    
  });
  
  $(document).on("click", "#deleteProgram", function(e){
    //Delete Program Functionality
    e.preventDefault();
    var program = $(this);
    console.log(program);
    bootbox.confirm("Are you sure?", function(result) {
      if(result)
      {
        $(".flash-message").hide();
        w = $("#programPanel .panel-body:first").width()+parseInt($("#programPanel .panel-body:first").css("paddingLeft").replace('px', ''))+parseInt($("#programPanel .panel-body:first").css("paddingRight").replace('px', ''));
        h = $("#programPanel .panel-body:first").height();
        pL = $("#programPanel .panel-body:first").css("paddingLeft");
        pT = $("#programPanel .panel-body:first").css("paddingTop");
        $('<div class="spinner-container" style="margin-left:-'+pL+'; margin-top:-'+pT+';"><div class="fa fa-spinner fa fa-spin fa fa-4x spinner" style="padding-top:'+parseInt(h/2-26+20+60)+'px; padding-left:'+(w/2-23+20)+'px;"></div></div>').insertBefore("#programPanel .panel-body .spinner-base:first");

        $.post(globalPath+"/admin/programs/deleteprogram/"+program.attr('data-id'),{},function(data){         
        }).done(function(data){         
          if (data.deleted==="true") 
          {
            $("#programPanel .spinner-container:first").remove();
            $("#programslist").html("");
            $("#programslist").html(data.newMenu);
            $("#pageContent a").attr("disabled", "disabled");
            $("#pageContent button").attr("disabled", "disabled");
            $("#pageContent input").attr("disabled", "disabled");
            $("#pageContent textarea").attr("disabled", "disabled");
            $("#pageContent a").removeAttr("href");
            $("#programTabs li a").removeAttr("data-toggle");
            $("#pageContent").css("opacity", "0.8");
            w = $("#programPanel .panel-body:first").width()+parseInt($("#programPanel .panel-body:first").css("paddingLeft").replace('px', ''))+parseInt($("#programPanel .panel-body:first").css("paddingRight").replace('px', ''));
            h = $("#programPanel .panel-body:first").height();
            pL = $("#programPanel .panel-body:first").css("paddingLeft");
            pT = $("#programPanel .panel-body:first").css("paddingTop");
            $('<div class="spinner-container text-danger text-center" style="margin-left:-'+pL+'; margin-top:-'+pT+';"><div class="fa fa-warning fa fa-5x" style="padding-top:'+parseInt(h/2-26+20+60)+'px;"></div><div class="fa-5x text-white">Program Deleted!</div></div>').insertBefore("#programPanel .panel-body:first .spinner-base:first");
            $(".flash-message-text").text("Program deleted Successfully!");
            $(".flash-message").removeClass("alert-danger");
            $(".flash-message").removeClass("alert-warning");
            $(".flash-message").removeClass("alert-info");
            $(".flash-message").addClass("alert-success");
            $(".flash-message").show();
          }
          else if(data.deleted==="false")
          {
            $("#editProgramDetails .spinner-container").remove();
            $(".flash-message-text").text("Error! Sorry Program could not be deleted.");
            $(".flash-message").removeClass("alert-success");
            $(".flash-message").removeClass("alert-warning");
            $(".flash-message").removeClass("alert-info");
            $(".flash-message").addClass("alert-danger");
            $(".flash-message").show();
          }
          else
          {
            $("#editProgramDetails .spinner-container").remove();
            $(".flash-message-text").text(data);
            $(".flash-message").removeClass("alert-success");
            $(".flash-message").removeClass("alert-danger");
            $(".flash-message").removeClass("alert-info");
            $(".flash-message").addClass("alert-warning");
            $(".flash-message").show();
          }
        });      
      }
    });
  });

  $(document).on("click", "#saveProgramSettings", function(e){
    //Save Program Settings Functionality
    e.preventDefault();
  });

  $(document).on("click", ".editCourseDetailsBtn", function(e){
    e.preventDefault();
    var c = $(this).attr("data-course");
    $("#"+c).find(".courseDetails").hide();
    $("#"+c).find(".editCourseDetails").show();    
  });

  $(document).on("click", ".cancelEditingCourse", function(e){
    e.preventDefault();
    var c = $(this).attr("data-course");
    $("#"+c).find(".courseDetails").show();   
    $("#"+c).find(".editCourseDetails").hide();
  });
  
  /*$(document).on("click", ".saveCoursedetails", function(e){
    e.preventDefault();
    // Save Course Details Functionality  
  });*/

  $(document).on("click", ".deleteCourse", function(e){
    e.preventDefault();
    var tmp=$(this);
    var url=globalPath+'/admin/programs/deletecourse/'+$(this).attr('data-id');
    bootbox.confirm("Are you sure?", function(result) {
        if(result)
        {
          $.post(url,{},function(){

          }).done(function(res){
            if(res==1)
            {
              tmp.parents('.each-coursedetails').remove();
            }
            else if(res==0)
            {
              $(".modal-flash-message-text").text("Error! There was some problem processing your request. Please try again.");
              $(".modal-flash-message").removeClass("alert-success");
              $(".modal-flash-message").removeClass("alert-warning");
              $(".modal-flash-message").removeClass("alert-info");
              $(".modal-flash-message").addClass("alert-danger");
              $(".modal-flash-message").show();
            }
            else if(ers==2)
            {
              $(".modal-flash-message-text").text("It seems to be SESSION OUT ! please reload the page ");
              $(".modal-flash-message").removeClass("alert-success");
              $(".modal-flash-message").removeClass("alert-warning");
              $(".modal-flash-message").removeClass("alert-info");
              $(".modal-flash-message").addClass("alert-danger");
              $(".modal-flash-message").show();
            }
          });         
        }
    });
    //Delete Course Functionality
  });

  $(document).on("click", ".saveCourseSettings", function(e){
    e.preventDefault();
    //Save Course Settings Functionality
  });

  $(document).on("submit","#updateprogramdetails",function(event){
    event.preventDefault();
    var tmp=$(this);
    var url=globalPath+'/admin/programs/addprogram/'+$(this).attr('data-id');
    var data=$(this).serializeArray();console.log(data);
    data.push({'name':'otherdetails','value':$('#otherdetails').code()});
    bootbox.confirm("Are you sure?", function(result) {
        if(result)
        {
          $.post(url,data,function(){

          }).done(function(res){
            if(res.updated=="true")
            {
              $("#programslist").html("");
              $("#programslist").html(res.newMenu);
              $(".flash-message-text").text("Program was Successfully Updated.");
              $(".flash-message").removeClass("alert-danger");
              $(".flash-message").removeClass("alert-warning");
              $(".flash-message").removeClass("alert-info");
              $(".flash-message").addClass("alert-success");
              $(".flash-message").show();

              var updatprogramlink=globalPath+'/admin/programs/showprogramdetails/'+tmp.attr('data-id');    
              $.get(updatprogramlink, function(data){
                pageContent = $(data).find("#pageContent").html();
                $("#pageContent").html(pageContent);      
                initToolbarBootstrapBindings();
              }).done(function(data) {
                // Add here anything to be done if proceess if done successfully              
              }).fail(function() {
                $("#pageContent").html("Sorry! Error processing your Request.");
              });

            }
            else if(res.updated=="false")
            {
              $(".modal-flash-message-text").text("Error! There was some problem processing your request. Please try again.");
              $(".modal-flash-message").removeClass("alert-success");
              $(".modal-flash-message").removeClass("alert-warning");
              $(".modal-flash-message").removeClass("alert-info");
              $(".modal-flash-message").addClass("alert-danger");
              $(".modal-flash-message").show();
            }
            else
            {
              $(".modal-flash-message-text").text(res.updated);
              $(".modal-flash-message").removeClass("alert-success");
              $(".modal-flash-message").removeClass("alert-danger");
              $(".modal-flash-message").removeClass("alert-info");
              $(".modal-flash-message").addClass("alert-warning");
              $(".modal-flash-message").show();
            }

          });
        }
    });
    
    //$("#cancelEditingProgram").trigger('click');
  });

  $(document).on("submit","#updateCoursedetails",function(event){
    event.preventDefault();
    var tmp=$(this);
    var url=globalPath+'/admin/programs/updatecourse/'+$(this).attr('data-id');
    var data=$(this).serialize();
    bootbox.confirm("Are you sure?", function(result) 
    {
        if(result)
        {
          $.post(url,data,function(){

          }).done(function(res){
            if(res==1)
            {
              /*var updatprogramlink="{{url('admin/programs/coursedetails')}}"+'/'+tmp.attr('data-id');
    
            $.get(updatprogramlink, function(data){
                  //pageContent = $(data).find("#pageContent").html();
                  //$("#pageContent").html(pageContent);      
                  //initToolbarBootstrapBindings();
                }).done(function(data) {                                    
                  /*$(".each-coursedetails").each(function(){
                      if($(this).attr('data-id')==tmp.attr('data-id'))
                      {
                        $(this).html(data);
                      }
                  });

                }).fail(function() {
                  $("#pageContent").html("Sorry! Error processing your Request.");
                });*/
              $(".flash-message-text").text("Course Updated Successfully!");
            }
          else if(res==2)
          {
                $(".modal-flash-message-text").text("It seems to be SESSION OUT ! please reload the page ");
              $(".modal-flash-message").removeClass("alert-success");
              $(".modal-flash-message").removeClass("alert-warning");
              $(".modal-flash-message").removeClass("alert-info");
              $(".modal-flash-message").addClass("alert-danger");
              $(".modal-flash-message").show();
          }
          else if(res==0)
          {
                $(".modal-flash-message-text").text("Error! There was some problem processing your request. Please try again.");
              $(".modal-flash-message").removeClass("alert-success");
              $(".modal-flash-message").removeClass("alert-warning");
              $(".modal-flash-message").removeClass("alert-info");
              $(".modal-flash-message").addClass("alert-danger");
              $(".modal-flash-message").show();
          }

        });
      //console.log("okok");
      //$(".cancelEditingCourse").trigger('click');
      }
  });
});

/*************************************************/

 /*-----------------Program - Create -------------------*/
function startProgramSummernote(){
    $('#otherdetails').summernote({
        height: 300,   //set editable area's height
        //airMode: true,
        focus: true,
        toolbar: [
          ['style', ['style']],
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['font', ['strike']],
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['edit', ['undo', 'redo']],
          ['misc', ['codeview', 'fullscreen']],
        ]
      }); 
  }
$(document).on("submit", "#addProgramForm", function(event){
    event.preventDefault();
    var url=$(this).attr("action");
    var data1=$(this).serializeArray();
    data1.push({'name':'otherdetails','value':$('#otherdetails').code()});
    $("#addProgramForm input").attr("disabled", "disabled");
    $("#addProgramForm textarea").attr("disabled", "disabled");
    $("#addProgramBtn").attr("disabled", "disabled");
    $("#addProgramBtn").html('<i class="fa fa-spinner fa fa-spin"></i> Adding Program');
    $(".flash-message").hide();
    w = $("#addProgramPanel .panel-body").width()+parseInt($("#addProgramPanel .panel-body").css("paddingLeft").replace('px', ''))+parseInt($("#addProgramPanel .panel-body").css("paddingRight").replace('px', ''));
    h = $("#addProgramPanel .panel-body").height();
    pL = $("#addProgramPanel .panel-body").css("paddingLeft");
    pT = $("#addProgramPanel .panel-body").css("paddingTop");
    $('<div class="spinner-container" style="margin-left:-'+pL+'; margin-top:-'+pT+';"><div class="fa fa-spinner fa fa-spin fa fa-4x spinner" style="padding-top:'+parseInt(h/2-26+20+60)+'px; padding-left:'+(w/2-23+20)+'px;"></div></div>').insertBefore("#addProgramPanel .panel-body .spinner-base");
  
    $.post(url,data1,function(data){

    }).done(function(data){
      if(data.added=="true")
      { 
        $("#addProgramPanel .spinner-container").remove();
        $("#addProgramForm").trigger('reset');
        $("#addProgramForm input").removeAttr("disabled");
        $("#addProgramForm textarea").removeAttr("disabled");
        $("#addProgramBtn").removeAttr("disabled");
        $("#addProgramBtn").html('<i class="fa fa-plus"></i> Add Program');

        $(".flash-message-text").text("Program added Successfully!");
        $(".flash-message").removeClass("alert-danger");
        $(".flash-message").removeClass("alert-warning");
        $(".flash-message").removeClass("alert-info");
        $(".flash-message").addClass("alert-success");
        $(".flash-message").show();

        var newProgramLink = "admin/programs/showprogramdetails/"+data.progid;

        $("#programslist").html("");
        $("#programslist").html(data.newMenu);
        // Redirecting to newly created program
        $("#pageContent").html("");
        $("#pageContent").html('<p class="m-t-lg text-center"><i class="fa fa-spinner fa fa-spin fa fa-4x"></i> Redirecting ...</p>');
        $.get(newProgramLink, function(data){
          pageContent = $(data).find("#pageContent").html();
          $("#pageContent").html(pageContent);      
          initToolbarBootstrapBindings();
          //$('#editor').wysiwyg({ fileUploadError: showErrorAlert});                       
        }).done(function(data) {
          pageModals = $(data).find("#pageModals").html();
            $("#pageModals").html(pageModals);                        
        }).fail(function() {
          $("#pageContent").html("Sorry! Error processing your Request.");
        });
      }
      else if(data.added=="false")
      {
        $("#addProgramPanel .spinner-container").remove();
        $("#addProgramForm input").removeAttr("disabled");
        $("#addProgramForm textarea").removeAttr("disabled");
        $("#addProgramBtn").removeAttr("disabled");
        $("#addProgramBtn").html('<i class="fa fa-check"></i> Add Group');
        $(".flash-message-text").text("Error! There was some problem processing your request. Please try again.");
        $(".flash-message").removeClass("alert-success");
        $(".flash-message").removeClass("alert-warning");
        $(".flash-message").removeClass("alert-info");
        $(".flash-message").addClass("alert-danger");
        $(".flash-message").show();
      }
      else
      {
        $("#addProgramPanel .spinner-container").remove();
        $("#addProgramForm input").removeAttr("disabled");
        $("#addProgramForm textarea").removeAttr("disabled");
        $("#addProgramBtn").removeAttr("disabled");
        $("#addProgramBtn").html('<i class="fa fa-check"></i> Add Group');
        $(".flash-message-text").text(data.added);
        $(".flash-message").removeClass("alert-success");
        $(".flash-message").removeClass("alert-warning");
        $(".flash-message").removeClass("alert-info");
        $(".flash-message").addClass("alert-danger");
        $(".flash-message").show();
      }
    }).fail(function(e){
      $("#addProgramPanel .spinner-container").remove();
      $("#addProgramForm input").removeAttr("disabled");
      $("#addProgramForm textarea").removeAttr("disabled");
      $("#addProgramBtn").removeAttr("disabled");
      $("#addProgramBtn").html('<i class="fa fa-check"></i> Add Program');
      $(".flash-message-text").text("Error! There was some problem processing your request. Please try again.");
      $(".flash-message").removeClass("alert-success");
      $(".flash-message").removeClass("alert-warning");
      $(".flash-message").removeClass("alert-info");
      $(".flash-message").addClass("alert-danger");
      $(".flash-message").show();
    });      
    /*var ttlsem=parseInt($("#ttlsem").val());
    for(var i=1;i<=4;i++)
    {
      $("#programmenutab").append('<li class="active"><a href="#tab'+i+'" data-toggle="tab"> Semester'+i+'</a></li>');
      $("#programmenudetails").append('<div class="tab-pane" id="tab'+i+'">');
    }*/
  });
  
  $(document).on("click", "#cancelAddingProgramBtn", function(e){
    e.preventDefault();
    $("#pageContent").html("");
    $("#pageContent").html('<p class="m-t-lg text-center"><i class="fa fa-spinner fa fa-spin fa fa-4x"></i></p>');
    $.get(globalPath+"/admin", function(data){
      pageContent = $(data).find("#pageContent").html();
      $("#pageContent").html(pageContent);      
      initToolbarBootstrapBindings();
      //$('#editor').wysiwyg({ fileUploadError: showErrorAlert});                       
    }).done(function(data) {
      pageModals = $(data).find("#pageModals").html();
        $("#pageModals").html(pageModals);
    }).fail(function() {
      $("#pageContent").html("Sorry! Error processing your Request.");
    });
  });
/*-----------------------------------------------------*/ 

/*----------- Student - View ----------------*/

  $(document).ready(function() {

    $(document).on("change", "#changeyear", function(){
      $.post(globalPath+'/admin/student/allstudentbyyear/'+$(this).val(),{'progid':$(this).attr('data-progid')},function(){

      }).done(function(data){
        $("#studentlistbyyear").html(data);
      });
    });

    $(document).on("keyup", "#studentsearch", function(){
        var value = this.value.toLowerCase();//.trim();
        $("#studentlistbyyear tr").each(function(index) 
        {
              $row = $(this);
              var name = $row.find("td:nth-child(3)").text().toLowerCase().trim();
              var roll = $row.find("td:nth-child(4)").text().toLowerCase().trim();
              //console.log(name + roll);
              if (name.indexOf(value) === 0 || roll.indexOf(value) === 0) 
              {
                  //console.log(name.indexOf(value));
                  $row.show();
              }
              else 
              {
                  //$row.show();
                  //console.log(roll.indexOf(value));
                  $row.hide();
              }
        });
    });
  });

/*-------------------------------------------*/

/*---------- Student - Create -----------------*/

$(document).on('submit',"#addnewstudent",function(event){
    event.preventDefault();
    var data = $(this).serializeArray();
    var url=$(this).attr("action");
    $.post(url,data,function(){

    }).done(function(data){
        if(data=='true')
        {
            $('#addnewstudent').trigger("reset");
            $(".flash-message-text").text("Student Added Successfully!");
            $(".flash-message").removeClass("alert-danger");
            $(".flash-message").removeClass("alert-warning");
            $(".flash-message").removeClass("alert-info");
            $(".flash-message").addClass("alert-success");
            $(".flash-message").show();
        }
        else if(data=='false')
        {
            //$('#addnewpeople').trigger("reset");
            $(".flash-message-text").text("Error! There was some problem processing your request. Please try again.");
            $(".flash-message").removeClass("alert-danger");
            $(".flash-message").removeClass("alert-warning");
            $(".flash-message").removeClass("alert-info");
            $(".flash-message").addClass("alert-success");
            $(".flash-message").show();
        }
    });
});

$(document).on("change", "#whichprogram", function(e){
  var selected = $("#whichprogram").children("option:selected").text();
  if ((selected=='M.Sc')||(selected=='M.Tech')) {
    $('#styear').removeClass('hide');
    $('#selectYear').addAttr('required');
  }else{
    $('#styear').addClass('hide');
    $('#selectYear').removeAttr('required');
  }
});
/*---------------------------------------------*/

/*----------------Student - Delete -------------*/

  $(document).on("click",".deletestudent",function(event){
    event.preventDefault();
    var url=globalPath+"/admin/student/deletestudent"+'/'+$(this).attr('data-id');
    var tmp=$(this);
    bootbox.confirm('Are you sure to delete this document?',function(result)
    {
      if(result)
      {
        $.post(url,{},function(data){

        }).done(function(data){
          if(data.deleted==="true")
          {
            $(".flash-message-text").text("Student was removed Successfully !");
                $(".flash-message").removeClass("alert-danger");
                $(".flash-message").removeClass("alert-warning");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-success");
                $(".flash-message").show();
                //tmp.parents('.each-event').remove();
                //tmp.parents('tr').remove();
                tmp.parents('tr').animo({animation:'bounceOut', keep: true}).done(tmp.parents('tr').remove());
               
          }
          else if(data.deleted==="false")
          {
            $(".flash-message-text").text("Sorry! There was some problem removing the student. Please try again.");
                $(".flash-message").removeClass("alert-success");
                $(".flash-message").removeClass("alert-warning");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-danger");
                $(".flash-message").show();
          }
          else
          {
            $(".flash-message-text").text(data.deleted);
                $(".flash-message").removeClass("alert-danger");
                $(".flash-message").removeClass("alert-success");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-warning");
                $(".flash-message").show();
          }
        });
      }
    });
  });
  $(document).on("click", "#deleteselectedstudent", function(event){
	event.preventDefault();
	var notdeleted=error=0;
	var selectedstudents = [];
	$('input[name="selectstudent"]:checked').each(function(){selectedstudents.push($(this).attr("data-id"))});
	console.log(selectedstudents);
	bootbox.confirm('Are you sure to delete this document?',function(result)
    	{
     		if(result)
      		{
		
		$.each(selectedstudents, function(i, val) {
        		var url=globalPath+"/admin/student/deletestudent"+'/'+val;
			console.log(url);
  			var tmp=$(document).find("[data-id='" + val + "']");
			$.post(url,{},function(data){
        		}).done(function(data){
				if(data.deleted==="true")
          			{
               				tmp.parents('tr').animo({animation:'bounceOut', keep: true}).done(tmp.parents('tr').remove());          	     
          			}
         		 	else if(data.deleted==="false")
          			{
					notdeleted+=1;
			        }
          			else
          			{
            				error+=1;
         			}

			});

    		});
		if(notdeleted>0){
			$(".flash-message-text").text("Sorry! Some students were not removed. Please try again.");
                	$(".flash-message").removeClass("alert-success");
                	$(".flash-message").removeClass("alert-warning");
                	$(".flash-message").removeClass("alert-info");
                	$(".flash-message").addClass("alert-danger");
                	$(".flash-message").show();
		}else{
			$(".flash-message-text").text("Selected students were removed Successfully !");
               		$(".flash-message").removeClass("alert-danger");
                	$(".flash-message").removeClass("alert-warning");
                	$(".flash-message").removeClass("alert-info");
                	$(".flash-message").addClass("alert-success");
                	$(".flash-message").show();
		}
  
	
		}
	});

  });

/*----------------------------------------------*/

/*----------- News - View ----------------------*/  

  $(document).on("keyup", "#newssearch", function(){
      var value = this.value.toLowerCase();//.trim();
      $(".newslist tr").each(function(index) 
      {
            $row = $(this);
            var name = $row.find("td:nth-child(2)").text().toLowerCase().trim();
            var roll = $row.find("td:last").text().trim();
            console.log(name + roll);
            if (name.indexOf(value) === 0 || roll.indexOf(value) === 0) 
            {
                //console.log(name.indexOf(value));
                $row.show();
            }
            else 
            {
                //$row.show();
                //console.log(roll.indexOf(value));
                $row.hide();
            }
      });
  });

  $(document).on("click", ".publishnews", function(event){
    event.preventDefault();
    var url=globalPath+"/admin/news/publishnews"+'/'+$(this).attr('data-id');
    var tmp=$(this);
    bootbox.confirm('Are you sure to publish this News?',function(result)
    {
      if(result)
      {
        $.post(url,{},function(data){

        }).done(function(data){
          if(data.published==="true")
          {
            $(".flash-message-text").text("News was published Successfully !");
                $(".flash-message").removeClass("alert-danger");
                $(".flash-message").removeClass("alert-warning");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-success");
                $(".flash-message").show();
                //tmp.parents('.each-event').remove();
                //tmp.parents('tr').remove();
                //tmp.parents('tr').animo({animation:'bounceOut', keep: true}).done(tmp.parents('tr').remove());
                tmp.removeClass('btn btn-xs btn-success publishnews');
                tmp.addClass('text-muted');
                tmp.html('<i class="fa fa-check text-success"></i> Published');
               
          }
          else if(data.published==="false")
          {
            $(".flash-message-text").text("Sorry! There was some problem removing the student. Please try again.");
                $(".flash-message").removeClass("alert-success");
                $(".flash-message").removeClass("alert-warning");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-danger");
                $(".flash-message").show();
          }
          else
          {
            $(".flash-message-text").text(data.published);
                $(".flash-message").removeClass("alert-danger");
                $(".flash-message").removeClass("alert-success");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-warning");
                $(".flash-message").show();
          }
        });
      }
    });
  });

  $(document).on("click", ".publisharchivednews", function(event){
    event.preventDefault();
    var url=globalPath+"/admin/news/publisharchivednews"+'/'+$(this).attr('data-id');
    var tmp=$(this);
    bootbox.confirm('Are you sure to publish this News?',function(result)
    {
      if(result)
      {
        $.post(url,{'newstype':tmp.attr('data-type')},function(data){

        }).done(function(data){
          if(data.published==="true")
          {
            $(".flash-message-text").text("News was published Successfully !");
                $(".flash-message").removeClass("alert-danger");
                $(".flash-message").removeClass("alert-warning");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-success");
                $(".flash-message").show();
                //tmp.parents('.each-event').remove();
                //tmp.parents('tr').remove();
                
                if(data.newstype=="archivednews"){
                  $("#activenewslist").html(data.activenewslist);
                }               
                else if(data.newstype=="archivedannouncements")
                {
                  $("#activeannouncementslist").html(data.activeannouncementslist);
                }
                tmp.parents('tr').animo({animation:'bounceOut', keep: true}).done(tmp.parents('tr').remove());
               
          }
          else if(data.published==="false")
          {
            $(".flash-message-text").text("Sorry! There was some problem removing the student. Please try again.");
                $(".flash-message").removeClass("alert-success");
                $(".flash-message").removeClass("alert-warning");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-danger");
                $(".flash-message").show();
          }
          else
          {
            $(".flash-message-text").text(data.published);
                $(".flash-message").removeClass("alert-danger");
                $(".flash-message").removeClass("alert-success");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-warning");
                $(".flash-message").show();
          }
        });
      }
    });
  });

  $(document).on("click", ".archivenews", function(event){
    event.preventDefault();
    var url=globalPath+"/admin/news/archivenews"+'/'+$(this).attr('data-id');
    var tmp=$(this);
    bootbox.confirm('Are you sure to archive this News?',function(result)
    {
      if(result)
      {
        $.post(url,{'newstype':tmp.attr('data-type')},function(data){

        }).done(function(data){
          if(data.archived==="true")
          {
            $(".flash-message-text").text("News was archived Successfully !");
                $(".flash-message").removeClass("alert-danger");
                $(".flash-message").removeClass("alert-warning");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-success");
                $(".flash-message").show();
                //tmp.parents('.each-event').remove();
                //tmp.parents('tr').remove();
                
                if(data.newstype=="activenews"){
                  $("#archivednewslist").html(data.archivednewslist);
                }               
                else if(data.newstype=="activeannouncements")
                {
                  $("#archivedannouncementslist").html(data.archivedannouncementslist);
                }
                tmp.parents('tr').animo({animation:'bounceOut', keep: true}).done(tmp.parents('tr').remove());
               
          }
          else if(data.archived==="false")
          {
            $(".flash-message-text").text("Sorry! There was some problem removing the student. Please try again.");
                $(".flash-message").removeClass("alert-success");
                $(".flash-message").removeClass("alert-warning");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-danger");
                $(".flash-message").show();
          }
          else
          {
            $(".flash-message-text").text(data.archived);
                $(".flash-message").removeClass("alert-danger");
                $(".flash-message").removeClass("alert-success");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-warning");
                $(".flash-message").show();
          }
        });
      }
    });
  });


  $(document).on("click", ".viewarchivednews", function(event){
    event.preventDefault();
    $("#activenewslist").addClass("hide");
    $("#archivednewslist").removeClass("hide");
    $(this).html("See Active News");
    $(this).removeClass("viewarchivednews");
    $(this).addClass("viewactivenews");
    $("#newsthead th").eq(-2).hide();
    $("#newsthead th").eq(-3).html("Publish");
    $("#news .panel-heading-text").html("Archived News");
  });

  $(document).on("click", ".viewarchivedannouncements", function(event){
    event.preventDefault();
    $("#activeannouncementslist").addClass("hide");
    $("#archivedannouncementslist").removeClass("hide");
    $(this).html("See Active Announcements");
    $(this).removeClass("viewarchivedannouncements");
    $(this).addClass("viewactiveannouncements");
    $("#announcementsthead th").eq(-2).hide();
    $("#announcementsthead th").eq(-3).html("Publish");
    $("#announcements .panel-heading-text").html("Archived Announcements");
  });

  $(document).on("click", ".viewactivenews", function(event){
    event.preventDefault();
    $("#activenewslist").removeClass("hide");
    $("#archivednewslist").addClass("hide");
    $(this).html("See Archived News");
    $(this).removeClass("viewactivenews");
    $(this).addClass("viewarchivednews");
    $("#newsthead th").eq(-2).show();
    $("#newsthead th").eq(-3).html("Published");
    $("#news .panel-heading-text").html("News");
  });

  $(document).on("click", ".viewactiveannouncements", function(event){
    event.preventDefault();
    $("#activeannouncementslist").removeClass("hide");
    $("#archivedannouncementslist").addClass("hide");
    $(this).html("See Archived Announcements");
    $(this).removeClass("viewactiveannouncements");
    $(this).addClass("viewarchivedannouncements");
    $("#announcementsthead th").eq(-2).show();
    $("#announcementsthead th").eq(-3).html("Published");
    $("#announcements .panel-heading-text").html("Announcements");
  });

  $(document).on("click", ".add-news-btn", function(e){
    e.preventDefault();
    $("#pageContent").html("");
    $("#pageContent").html('<p class="m-t-lg text-center"><i class="fa fa-spinner fa fa-spin fa fa-4x"></i></p>');
    $.get($(this).attr('href'), function(data){
      pageContent = $(data).find("#pageContent").html();
      $("#pageContent").html(pageContent);      
      initToolbarBootstrapBindings();
      //$('#editor').wysiwyg({ fileUploadError: showErrorAlert});                       
    }).done(function(data) {
      $('[name=type]').filter(function() { 
          return ($(this).val() == e.target.attributes['data-type'].value); //To select Blue
      }).prop('checked', true);
      if($("input[name='type']:checked").val()==2){
        $("input[name='title']").next(".suggestion").removeClass('hidden');       
      }else{
        $("input[name='title']").next(".suggestion").addClass('hidden');
      }
      pageModals = $(data).find("#pageModals").html();
        $("#pageModals").html(pageModals);
    }).fail(function() {
      $("#pageContent").html("Sorry! Error processing your Request.");
    });
  });
/*----------------------------------------------*/

/*----------- News - Create --------------------*/
$('input[name="publish"]').on('change', function(e){
    if($(this).prop('checked'))
    {
        $(this).next().val(1);
    } else {
        $(this).next().val(0);
    }
});
$(document).on('change','input[name="type"]', function(e){
    if($(this).val()==2){
      $("input[name='title']").next(".suggestion").removeClass('hidden');       
    }else{
      $("input[name='title']").next(".suggestion").addClass('hidden');
    }
});



$(document).on("click","#donotaddnews",function(event){
    event.preventDefault();
    $("#pageContent").html("");
      $("#pageContent").html('<p class="m-t-lg text-center"><i class="fa fa-spinner fa fa-spin fa fa-4x"></i></p>');
      $.get(globalPath+"/admin/news/shownews", function(data){
        pageContent = $(data).find("#pageContent").html();
        $("#pageContent").html(pageContent);      
        initToolbarBootstrapBindings();
        //$('#editor').wysiwyg({ fileUploadError: showErrorAlert});                       
      }).done(function(data) {
        pageModals = $(data).find("#pageModals").html();
          $("#pageModals").html(pageModals);
      }).fail(function() {
        $("#pageContent").html("Sorry! Error processing your Request.");
      });
  });

$(document).on('submit',"#addnews",function(event){
    event.preventDefault();
    var valid = 1;
    if($("input[name='type']:checked").val()==2)
    {
      if($("input[name='title']").val().length>40){
        valid = 0 ;
        bootbox.alert("Please limit announcement title to only 40 characters.");        
      }
    }
    
    if(valid==1){
      var data = $(this).serializeArray();
      var url=$(this).attr("action");
      $.post(url,data,function(){

      }).done(function(data){
          if(data=='true')
          {
              $('#addnews').trigger("reset");
              $(".flash-message-text").text("News Added Successfully!");
              $(".flash-message").removeClass("alert-danger");
              $(".flash-message").removeClass("alert-warning");
              $(".flash-message").removeClass("alert-info");
              $(".flash-message").addClass("alert-success");
              $(".flash-message").show();
          }
          else if(data=='false')
          {            
              $(".flash-message-text").text("Error! There was some problem processing your request. Please try again.");
              $(".flash-message").removeClass("alert-danger");
              $(".flash-message").removeClass("alert-warning");
              $(".flash-message").removeClass("alert-info");
              $(".flash-message").addClass("alert-success");
              $(".flash-message").show();
          }
      });
    }    
});

$(document).on('submit',"#editnews",function(event){
    event.preventDefault();
    var valid = 1;
    if($("input[name='type']:checked").val()==2)
    {
      if($("input[name='title']").val().length>40){
        valid = 0 ;
        bootbox.alert("Please limit announcement title to only 40 characters.");        
      }
    }
    
    if(valid==1){
      var data = $(this).serializeArray();
      var url=$(this).attr("action");
      $.post(url,data,function(){

      }).done(function(data){
          if(data=='true')
          {
              $('#addnews').trigger("reset");
              $(".flash-message-text").text("News updated Successfully!");
              $(".flash-message").removeClass("alert-danger");
              $(".flash-message").removeClass("alert-warning");
              $(".flash-message").removeClass("alert-info");
              $(".flash-message").addClass("alert-success");
              $(".flash-message").show();
          }
          else if(data=='false')
          {            
              $(".flash-message-text").text("Error! There was some problem processing your request. Please try again.");
              $(".flash-message").removeClass("alert-danger");
              $(".flash-message").removeClass("alert-warning");
              $(".flash-message").removeClass("alert-info");
              $(".flash-message").addClass("alert-success");
              $(".flash-message").show();
          }
      });
    }    
});
/*----------------------------------------------*/

/*----------------News - Delete -------------*/

  $(document).on("click",".deletenews",function(event){
    event.preventDefault();
    var url=globalPath+"/admin/news/deletenews"+'/'+$(this).attr('data-id');
    var tmp=$(this);
    bootbox.confirm('Are you sure to delete this News?',function(result)
    {
      if(result)
      {   
        $.post(url,{'newstype':tmp.attr('data-type')},function(data){

        }).done(function(data){
          if(data.deleted==="true")
          {
            $(".flash-message-text").text("News was deleted Successfully !");
                $(".flash-message").removeClass("alert-danger");
                $(".flash-message").removeClass("alert-warning");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-success");
                $(".flash-message").show();
                //tmp.parents('.each-event').remove();
                //tmp.parents('tr').remove();
                //tmp.parents('tr').animo({animation:'bounceOut', keep: true}).done(tmp.parents('tr').remove());
                if(data.newstype=="activenews"){
                  $("#activenewslist").html(data.activenewslist);
                }
                else if(data.newstype=="archivednews")
                {
                  $("#archivednewslist").html(data.archivednewslist);
                }
                else if(data.newstype=="activeannouncements")
                {
                  $("#activeannouncementslist").html(data.activeannouncementslist);
                }
                else if(data.newstype=="archivedannouncements")
                {
                  $("#archivedannouncementslist").html(data.archivedannouncementslist);
                }
               
          }
          else if(data.deleted==="false")
          {
            $(".flash-message-text").text("Sorry! There was some problem removing the student. Please try again.");
                $(".flash-message").removeClass("alert-success");
                $(".flash-message").removeClass("alert-warning");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-danger");
                $(".flash-message").show();
          }
          else
          {
            $(".flash-message-text").text(data.deleted);
                $(".flash-message").removeClass("alert-danger");
                $(".flash-message").removeClass("alert-success");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-warning");
                $(".flash-message").show();
          }
        });
      }
    });
  });

/*----------------------------------------------*/

/*------ News - Edit ------------ */
$(document).on("click", ".editnews", function(e){
    e.preventDefault();
    $("#pageContent").html("");
    $("#pageContent").html('<p class="m-t-lg text-center"><i class="fa fa-spinner fa fa-spin fa fa-4x"></i></p>');
    var url=globalPath+'/admin/news/edit/'+$(this).attr('data-id');
    $.get(url, function(data){
      pageContent = $(data).find("#pageContent").html();
      $("#pageContent").html(pageContent);                      
    }).done(function(data) { 
      $('[name=type]').filter(function() { console.log(e.target.attributes['data-newstype'].value); console.log($(this).val());
          return ($(this).val() == e.target.attributes['data-newstype'].value); //To select Blue
      }).prop('checked', true);
      if($("input[name='type']:checked").val()==2){
        $("input[name='title']").next(".suggestion").removeClass('hidden');       
      }else{
        $("input[name='title']").next(".suggestion").addClass('hidden');
      }
      $('[name=publish]').filter(function() {
          return ($(this).val() == e.target.attributes['data-publish'].value); //To select Blue
      }).prop('checked', true);
      pageModals = $(data).find("#pageModals").html();
        $("#pageModals").html(pageModals);
    }).fail(function() {
      $("#pageContent").html("Sorry! Error processing your Request.");
    });
  });
/*--------------------------------*/

/******************* Events *********************/

$(document).on("click", ".create-event-btn", function(e){
    e.preventDefault();
    $("#pageContent").html("");
    $("#pageContent").html('<p class="m-t-lg text-center"><i class="fa fa-spinner fa fa-spin fa fa-4x"></i></p>');
    $.get($(this).attr('href'), function(data){
      pageContent = $(data).find("#pageContent").html();
      $("#pageContent").html(pageContent);      
      initToolbarBootstrapBindings();
      //$('#editor').wysiwyg({ fileUploadError: showErrorAlert});                       
    }).done(function(data) { 
      $('[name=forwhichcat] option').filter(function() { 
          return ($(this).text() == e.target.attributes['data-event'].value); //To select Blue
      }).prop('selected', true);
      pageModals = $(data).find("#pageModals").html();
        $("#pageModals").html(pageModals);
      eventPageDatePicker();
    }).fail(function() {
      $("#pageContent").html("Sorry! Error processing your Request.");
    });
  });

  $(document).on("click",".deleteevent",function(event){
    event.preventDefault();
    var url=globalPath+'/admin/events/delete/'+$(this).attr('data-id');
    var tmp=$(this);
    bootbox.confirm("Are you sure?", function(result) {
      if(result)
      {
        $.post(url,{},function(){

      }).done(function(res){
        if(res==1)
        {
          $(".flash-message-text").text("Event Removed Successfully !");
              $(".flash-message").removeClass("alert-danger");
              $(".flash-message").removeClass("alert-warning");
              $(".flash-message").removeClass("alert-info");
              $(".flash-message").addClass("alert-success");
              $(".flash-message").show();
              //tmp.parents('.each-event').remove();
              $('.each-event').each(function(){
                if($(this).attr('data-id')==tmp.attr('data-id'))
                {
                  $(this).remove();
                }
              });
        }
        else if(res==0)
        {
          $(".flash-message-text").text("Error! There was some problem processing your request. Please try again");
              $(".flash-message").removeClass("alert-danger");
              $(".flash-message").removeClass("alert-warning");
              $(".flash-message").removeClass("alert-info");
              $(".flash-message").addClass("alert-success");
              $(".flash-message").show();
              $("#createevent").trigger('reset');
        }
        else
        {
          $(".flash-message-text").text("It seems to be SESSION OUT ! please repload the page and try again !");
              $(".flash-message").removeClass("alert-danger");
              $(".flash-message").removeClass("alert-warning");
              $(".flash-message").removeClass("alert-info");
              $(".flash-message").addClass("alert-success");
              $(".flash-message").show();
              $("#createevent").trigger('reset');
        }
      });
    }     
    });
  });

/**********************************************/

/*===================== Event - Edit ======================*/
  $(document).on("click", ".editevent", function(e){
    e.preventDefault();
    $("#pageContent").html("");
    $("#pageContent").html('<p class="m-t-lg text-center"><i class="fa fa-spinner fa fa-spin fa fa-4x"></i></p>');
    var url=globalPath+'/admin/events/edit/'+$(this).attr('data-id');
    $.get(url, function(data){
      pageContent = $(data).find("#pageContent").html();
      $("#pageContent").html(pageContent);                      
    }).done(function(data) { 
      $('[name=forwhichcat] option').filter(function() { 
          return ($(this).text() == e.target.attributes['data-event'].value); //To select Blue
      }).prop('selected', true);
      $('[name=eventplace] option').filter(function() {
          return ($(this).text() == e.target.attributes['data-eventplace'].value); //To select Blue 
      }).prop('selected', true);
      pageModals = $(data).find("#pageModals").html();
        $("#pageModals").html(pageModals);
    }).fail(function() {
      $("#pageContent").html("Sorry! Error processing your Request.");
    });
  });

var eventeditoption = {
      success:   function(res) { 
       if(res.updated=="true")
        {
          $(".flash-message-text").text("Event Edited Successfully !");
          $(".flash-message").removeClass("alert-danger");
          $(".flash-message").removeClass("alert-warning");
          $(".flash-message").removeClass("alert-info");
          $(".flash-message").addClass("alert-success");
          $(".flash-message").show();
          $("#editEventForm").trigger('reset');
          $("#pageContent").html("");
          $("#pageContent").html('<p class="m-t-lg text-center"><i class="fa fa-spinner fa fa-spin fa fa-4x"></i></p>');
          var url=globalPath+"/admin/events/details/"+res.eventcat;
          $.get(url, function(data){
            pageContent = $(data).find("#pageContent").html();
            $("#pageContent").html(pageContent);                      
          }).done(function(data) {
            pageModals = $(data).find("#pageModals").html();
              $("#pageModals").html(pageModals);
          }).fail(function() {
            $("#pageContent").html("Sorry! There was some problem. Please Reload.");
          });

        }
        else if(res.updated=="false")
        {
          $(".flash-message-text").text("Error! There was some problem processing your request. Please try again");
          $(".flash-message").removeClass("alert-danger");
          $(".flash-message").removeClass("alert-warning");
          $(".flash-message").removeClass("alert-info");
          $(".flash-message").addClass("alert-success");
          $(".flash-message").show();
        }
        else
        {
          $(".flash-message-text").text(res.updated + res);
          $(".flash-message").removeClass("alert-danger");
          $(".flash-message").removeClass("alert-success");
          $(".flash-message").removeClass("alert-info");
          $(".flash-message").addClass("alert-warning");
          $(".flash-message").show();
        }
    } 
};
$(document).on("submit","#editEventForm",function(event){
    event.preventDefault();
    var data=$(this).serialize();
    $(this).ajaxSubmit(eventeditoption);
});

/*=========================================================*/

/********************Event***********************/

$(document).on('change', 'input[name="wantanewpage"]', function(e){
        if($(this).prop('checked'))
        {
            $(this).next().val(1);
        } else {
            $(this).next().val(0);
        }
});
$(document).on('change', 'input[name="needlogin"]', function(e){
        if($(this).prop('checked'))
        {
            $(this).next().val(1);
        } else {
            $(this).next().val(0);
        }
});
var eventcreateoption = {
      success:   function(res) { 
       if(res==1)
        {
          $(".flash-message-text").text("Event Created Successfully !");
          $(".flash-message").removeClass("alert-danger");
          $(".flash-message").removeClass("alert-warning");
          $(".flash-message").removeClass("alert-info");
          $(".flash-message").addClass("alert-success");
          $(".flash-message").show();
          $("#createevent").trigger('reset');
        }
        else if(res===0)
        {
          $(".flash-message-text").text("Error! There was some problem processing your request. Please try again");
          $(".flash-message").removeClass("alert-danger");
          $(".flash-message").removeClass("alert-warning");
          $(".flash-message").removeClass("alert-info");
          $(".flash-message").addClass("alert-success");
          $(".flash-message").show();
          $("#createevent").trigger('reset');
        }
        else
        {
          $(".flash-message-text").text(res);
          $(".flash-message").removeClass("alert-danger");
          $(".flash-message").removeClass("alert-success");
          $(".flash-message").removeClass("alert-info");
          $(".flash-message").addClass("alert-warning");
          $(".flash-message").show();
          $("#createevent").trigger('reset');
        }
    } 
};

$(document).on("submit","#createevent",function(event){
    event.preventDefault();
    /*var url=$(this).attr('action');
    var data=$(this).serializeArray();*/
    var data=$(this).serialize();
    $(this).ajaxSubmit(eventcreateoption);
    /*$.post(url,data,function(){

    }).done(function(res){
      if(res==1)
      {
        $(".flash-message-text").text("Event Created Successfully !");
            $(".flash-message").removeClass("alert-success");
            $(".flash-message").removeClass("alert-warning");
            $(".flash-message").removeClass("alert-info");
            $(".flash-message").addClass("alert-danger");
            $(".flash-message").show();
            $("#createevent").trigger('reset');
      }
      else if(res==0)
      {
        $(".flash-message-text").text("Error! There was some problem processing your request. Please try again");
            $(".flash-message").removeClass("alert-danger");
            $(".flash-message").removeClass("alert-warning");
            $(".flash-message").removeClass("alert-info");
            $(".flash-message").addClass("alert-success");
            $(".flash-message").show();
            $("#createevent").trigger('reset');
      }
      else
      {
        $(".flash-message-text").text("It seems to be SESSION OUT ! please repload the page and try again !");
=======

            $("#createevent").trigger('reset');
      }
    }); */
});

$(document).on("click", "#donotcreateevent", function(e){
      e.preventDefault();
      $("#pageContent").html("");
      $("#pageContent").html('<p class="m-t-lg text-center"><i class="fa fa-spinner fa fa-spin fa fa-4x"></i></p>');
      $.get(globalPath+"/admin", function(data){
        pageContent = $(data).find("#pageContent").html();
        $("#pageContent").html(pageContent);      
        initToolbarBootstrapBindings();
        //$('#editor').wysiwyg({ fileUploadError: showErrorAlert});                       
      }).done(function(data) {
        pageModals = $(data).find("#pageModals").html();
          $("#pageModals").html(pageModals);
      }).fail(function() {
        $("#pageContent").html("Sorry! Error processing your Request.");
      });
  });
/*---------------------------------------------*/

/*==================== Event-Category =========================*/

// Creating an Event Category
$(document).on("submit", "#addeventcat", function(event){
    event.preventDefault();
    var url=$(this).attr("action");
    var data=$(this).serialize();
    $.post(url,data,function(){

    }).done(function(res){
      //add this event to list 
      $("#eventslist").prepend('<li class="nav-link"><a href="admin/events/details/'+res+'">'+$("#eventcatname").val()+'</a></li>');
      $("#addeventcat").trigger("reset");
    });
});


// Canceling the event creation process
$(document).on("click", "#donotcreateeventcat", function(e){
    e.preventDefault();
    $("#pageContent").html("");
    $("#pageContent").html('<p class="m-t-lg text-center"><i class="fa fa-spinner fa fa-spin fa fa-4x"></i></p>');
    $.get(globalPath+"/admin", function(data){
      pageContent = $(data).find("#pageContent").html();
      $("#pageContent").html(pageContent);      
      initToolbarBootstrapBindings();
      //$('#editor').wysiwyg({ fileUploadError: showErrorAlert});                       
    }).done(function(data) {
      pageModals = $(data).find("#pageModals").html();
        $("#pageModals").html(pageModals);
    }).fail(function() {
      $("#pageContent").html("Sorry! Error processing your Request.");
    });
});

$(document).on("submit", "#editeventcat", function(e){
    event.preventDefault();
    var url=$(this).attr("action");
    var data=$(this).serialize();
    $.post(url,data,function(){

    }).done(function(data){
      if (data.updated==="true") 
      {
          $(".flash-message-text").text("Event Category updated Successfully!");
          $(".flash-message").removeClass("alert-danger");
          $(".flash-message").removeClass("alert-warning");
          $(".flash-message").removeClass("alert-info");
          $(".flash-message").addClass("alert-success");
          $(".flash-message").show();
          $("#eventslist").html("");
          $("#eventslist").html(data.newMenu);
      }else{
        $(".flash-message-text").text(data.updated);
        $(".flash-message").removeClass("alert-success");
        $(".flash-message").removeClass("alert-danger");
        $(".flash-message").removeClass("alert-info");
        $(".flash-message").addClass("alert-warning");
        $(".flash-message").show();
      }
    });
  });

$(document).on("click", "#deleteEventCategory", function(e){
    //Delete Program Functionality
    e.preventDefault();
    var eventcat = $(this);
    console.log(eventcat);
    bootbox.confirm("Are you sure?", function(result) {
      if(result)
      {
        $(".flash-message").hide();
        // w = $("#programPanel .panel-body:first").width()+parseInt($("#programPanel .panel-body:first").css("paddingLeft").replace('px', ''))+parseInt($("#programPanel .panel-body:first").css("paddingRight").replace('px', ''));
        // h = $("#programPanel .panel-body:first").height();
        // pL = $("#programPanel .panel-body:first").css("paddingLeft");
        // pT = $("#programPanel .panel-body:first").css("paddingTop");
        // $('<div class="spinner-container" style="margin-left:-'+pL+'; margin-top:-'+pT+';"><div class="fa fa-spinner fa fa-spin fa fa-4x spinner" style="padding-top:'+parseInt(h/2-26+20+60)+'px; padding-left:'+(w/2-23+20)+'px;"></div></div>').insertBefore("#programPanel .panel-body .spinner-base:first");

        $.post(globalPath+"/admin/events/deleteeventcategory/"+eventcat.attr('data-eventcat'),{},function(data){         
        }).done(function(data){         
          if (data.deleted==="true") 
          {
            // $("#programPanel .spinner-container:first").remove();
            $("#eventslist").html("");
            $("#eventslist").html(data.newMenu);

            // $("#pageContent a").attr("disabled", "disabled");
            // $("#pageContent button").attr("disabled", "disabled");
            // $("#pageContent input").attr("disabled", "disabled");
            // $("#pageContent textarea").attr("disabled", "disabled");
            // $("#pageContent a").removeAttr("href");
            // $("#programTabs li a").removeAttr("data-toggle");
            // $("#pageContent").css("opacity", "0.8");
            // w = $("#programPanel .panel-body:first").width()+parseInt($("#programPanel .panel-body:first").css("paddingLeft").replace('px', ''))+parseInt($("#programPanel .panel-body:first").css("paddingRight").replace('px', ''));
            // h = $("#programPanel .panel-body:first").height();
            // pL = $("#programPanel .panel-body:first").css("paddingLeft");
            // pT = $("#programPanel .panel-body:first").css("paddingTop");
            // $('<div class="spinner-container text-danger text-center" style="margin-left:-'+pL+'; margin-top:-'+pT+';"><div class="fa fa-warning fa fa-5x" style="padding-top:'+parseInt(h/2-26+20+60)+'px;"></div><div class="fa-5x text-white">Program Deleted!</div></div>').insertBefore("#programPanel .panel-body:first .spinner-base:first");
            
            $(".flash-message-text").text("Event Category deleted Successfully!");
            $(".flash-message").removeClass("alert-danger");
            $(".flash-message").removeClass("alert-warning");
            $(".flash-message").removeClass("alert-info");
            $(".flash-message").addClass("alert-success");
            $(".flash-message").show();
            window.location.href = globalPath+'/admin';
          }
          else if(data.deleted==="false")
          {
            // $("#editProgramDetails .spinner-container").remove();
            $(".flash-message-text").text("Error! Sorry Event Category could not be deleted.");
            $(".flash-message").removeClass("alert-success");
            $(".flash-message").removeClass("alert-warning");
            $(".flash-message").removeClass("alert-info");
            $(".flash-message").addClass("alert-danger");
            $(".flash-message").show();
          }
          else
          {
            // $("#editProgramDetails .spinner-container").remove();
            $(".flash-message-text").text(data);
            $(".flash-message").removeClass("alert-success");
            $(".flash-message").removeClass("alert-danger");
            $(".flash-message").removeClass("alert-info");
            $(".flash-message").addClass("alert-warning");
            $(".flash-message").show();
          }
        });      
      }
    });
  });

/*=============================================================*/

/*==================== Recent Publications ====================*/
$(document).on("keyup", "#publicationsearch", function(){
      var value = this.value.toLowerCase();//.trim();
      $("#publicationlist tr").each(function(index) 
      {
            $row = $(this);
            var name = $row.find("td:nth-child(2)").text().toLowerCase().trim();
            var roll = $row.find("td:last").text().trim();
            console.log(name + roll);
            if (name.indexOf(value) === 0 || roll.indexOf(value) === 0) 
            {
                //console.log(name.indexOf(value));
                $row.show();
            }
            else 
            {
                //$row.show();
                //console.log(roll.indexOf(value));
                $row.hide();
            }
      });
  });

/*=============================================================*/

/****************** booking verification *******************/
$(document).on("click",".verifybooking",function(event){
  event.preventDefault();
  var tmp=$(this);
  bootbox.confirm('Are you sure ?',function(res){
        if(res)
        {
            $.post(globalPath+"/admin/booking/confirm/"+tmp.attr('data-id'),{},function(){

            }).done(function(result){
              if(result==1)
              {
                tmp.parents('tr').remove();
                $(".flash-message-text").text("Booking Verified Successfully !");
                $(".flash-message").removeClass("alert-danger");
                $(".flash-message").removeClass("alert-warning");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-success");
                $(".flash-message").show();
              }
              else
              {
                $(".flash-message-text").text("Unable to process you Request ! Try again later");
                $(".flash-message").removeClass("alert-success");
                $(".flash-message").removeClass("alert-warning");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-danger");
                $(".flash-message").show();
              }
            });
        }
    });
});
$(document).on("click",".deletebooking",function(event){
  event.preventDefault();
  var tmp=$(this);
  bootbox.confirm('Are you sure ?',function(res){
        if(res)
        {
            $.post(globalPath+"/admin/booking/delete/"+tmp.attr('data-id'),function(){

            }).done(function(result){
              if(result==1)
              {
                tmp.parents('tr').remove();
                $(".flash-message-text").text("Booking Details Removed Successfully !");
                $(".flash-message").removeClass("alert-danger");
                $(".flash-message").removeClass("alert-warning");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-success");
                $(".flash-message").show();
              }
              else
              {
                $(".flash-message-text").text("Unable to process you Request ! Try again later");
                $(".flash-message").removeClass("alert-success");
                $(".flash-message").removeClass("alert-warning");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-danger");
                $(".flash-message").show();
              }
            });
        }
    });
});
$(document).on("click",".cancelbooking",function(event){
  event.preventDefault();
  var tmp=$(this);
  bootbox.confirm('Are you sure ?',function(res){
        if(res)
        {
            $.post(globalPath+"/admin/booking/cancel/"+tmp.attr('data-id'),function(){

            }).done(function(result){
              if(result==1)
              {
                tmp.parents('tr').remove();
                $(".flash-message-text").text("Booking was canceled Successfully !");
                $(".flash-message").removeClass("alert-danger");
                $(".flash-message").removeClass("alert-warning");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-success");
                $(".flash-message").show();
              }
              else
              {
                $(".flash-message-text").text("Unable to process you Request ! Try again later");
                $(".flash-message").removeClass("alert-success");
                $(".flash-message").removeClass("alert-warning");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-danger");
                $(".flash-message").show();
              }
            });
        }
    });
});

$(document).on("click", ".create-booking-btn", function(e){
    e.preventDefault();
    $("#pageContent").html("");
    $("#pageContent").html('<p class="m-t-lg text-center"><i class="fa fa-spinner fa fa-spin fa fa-4x"></i></p>');
    $.get($(this).attr('href'), function(data){
      pageContent = $(data).find("#pageContent").html();
      $("#pageContent").html(pageContent);      
      initToolbarBootstrapBindings();
      //$('#editor').wysiwyg({ fileUploadError: showErrorAlert});                       
    }).done(function(data) { 
      newBookingJS();
    }).fail(function() {
      $("#pageContent").html("Sorry! Error processing your Request.");
    });
  });

/* ------- New Booking ------------*/
function newBookingJS(){
$(document).on('change',"#whichhall",function(){
	$.post(globalPath+'/booking/allbookeddates/'+$(this).val(),{},function(data){
		bookeddate=data;
	});
});
$("#bookfrom").datetimepicker({
	pickTime: false
});
$("#timefrom").datetimepicker({
	pickDate: false
});
$("#timeto").datetimepicker({
	pickDate: false
});
}

$(document).on("submit","#createBooking",function(event){
	event.preventDefault();
	if ($("#whichhall").val()!=0)
	{
		var from=$("#bookfrom").val()+' '+$("#timefrom").val();
	    var to=$("#bookfrom").val()+' '+$("#timeto").val();
	    var a = moment(from,"DD-MM-YYYY H:m");
	    var b = moment(to,"DD-MM-YYYY H:m");
	    var d=new Date();
		var month = d.getMonth()+1;
		var day = d.getDate();
		var year=d.getFullYear();
		var hr=d.getHours();
		var min=d.getMinutes();
		var today=moment(day+'-'+month+'-'+year+' '+hr+':'+min,"DD-MM-YYYY H:m");
		var flag=0;
		//console.log("a.diff(today)"+a.diff(today)+' '+"b.diff(today)"+b.diff(today));
		if($("#bookfrom").val() && $("#timefrom").val() && $("#timeto").val() && a.diff(today)>0 && b.diff(today)>0)
	    {
	        //console.log(to+' '+from);
	        /*var from1=from.split("-");
	        //from1.reverse();        
	        var to1=to.split("-");*/
	        //to1.reverse();*/
	        
	       // console.log(a.diff(b));
	        if(b.diff(a)<=0)
	        {
	          bootbox.alert("Booking is not available at this particular time and date. Please check availability and reschedule!");
	        }
	        else
	        {
			      for (var i=0; i<bookeddate.length;i++) 
            {
              var start=moment(bookeddate[i][0], "DD-MM-YYYY H:m");
              var end=moment(bookeddate[i][1],"DD-MM-YYYY H:m");
              // console.log(start+' '+a.diff(start));  
              // console.log(end+' '+b.diff(end));
              av = a.valueOf();
              bv = b.valueOf();
              sv = start.valueOf();
              ev = end.valueOf();
              if((av == sv)||(bv == ev)){
                flag = 1;
              }
              if(av>sv){
                if(av<ev){
                  flag = 1;
                }
              }else{
                if(bv>sv){
                  flag = 1;
                }
              }
              if (a.diff(end)==0)
              {
                alert('Sorry ! Date already taken');
                $("#bookfrom").val('');
                flag=1;
                break;
              }
            }
				    if(!flag)
  			    {
  			    	var data = $(this).serializeArray();
  					  $.post($(this).attr('action'), data).done(function(){	

    					}).done(function(res){
    						if(res==1)
    						{
    							bootbox.alert("Your booking request has been successffully registered!");
    							$("#createBooking").trigger('reset');
    						}
    						else
    						{
    							bootbox.alert("Error : Unable to process request, Try again later");
    						}		
    					});
  			    }else{
              bootbox.alert("Sorry! Room is unavailable during specified time.")
            }

	        /*

				var start= moment($('#bookfrom').val(), "DD-MM-YYYY");
				var end;
				var d = new Date();
				var month = d.getMonth()+1;
				var day = d.getDate();
				var year=d.getFullYear();
				var today=moment(day+'-'+month+'-'+year,"DD-MM-YYYY");
				var flag=0;
				//cheeck if date greater than today 
				
				if(!flag)
			    {
			    	var data = $(this).serializeArray();
					$.post($(this).attr('action'), data).done(function(){	

					}).done(function(res){
						if(res==1)
						{
							alert("Your booking request has been successffully registered!");
							$("#createBooking").trigger('reset');
						}
						else
						{
							alert("Error : Unable to process request, Try again later");
						}		
					});
			    }
*/
			}
		}
		else
		{
			bootbox.alert("Select an available date and time after checking the availability table.");
		}
	}
    else
    {
		bootbox.alert("Please!Select a Room for booking.");
	}
	//console.log(start.diff(end,'days'));

});



/*----------------------------------*/

/* -------- Create/Edit Event ------ */
function eventPageDatePicker(){
    $("#eventdate").datetimepicker({
      pickTime: false
    });
    $("#eventdate input").datetimepicker({
      pickTime: false
    });
    $("#eventenddate").datetimepicker({
      pickTime: false
    });
    $("#eventenddate input").datetimepicker({
      pickTime: false
    });
    $("#eventstarttime").datetimepicker({
      pickDate: false
    });
    $("#eventstarttime input").datetimepicker({
      pickDate: false
    });
    $("#eventendtime").datetimepicker({
      pickDate: false
    });
    $("#eventendtime input").datetimepicker({
      pickDate: false
    });
 }
/* -----------------------------------*/


/*--------- Research Group ---------------*/

$(document).on("submit", "#addnewgroup", function(event){
    event.preventDefault();
    if($("#researchgroupname").val())
    {
      var data1=$(this).serialize();
      var url=$(this).attr("action");
      //console.log(url);
      $("#addGroupModal input").attr("disabled", "disabled");
      $("#addGroupModal textarea").attr("disabled", "disabled");
      $("#addGroupBtn").attr("disabled", "disabled");
      $("#addGroupBtn").html('<i class="fa fa-spinner fa fa-spin"></i> Adding Group');
      $(".flash-message").hide();
      $(".modal-flash-message").hide();
      w = $("#addGroupModal .modal-body").width()+parseInt($("#addGroupModal .modal-body").css("paddingLeft").replace('px', ''))+parseInt($("#addGroupModal .modal-body").css("paddingRight").replace('px', ''));
      h = $("#addGroupModal .modal-body").height();
      pL = $("#addGroupModal .modal-body").css("paddingLeft");
      pT = $("#addGroupModal .modal-body").css("paddingTop");
      $('<div class="spinner-container" style="margin-left:-'+pL+'; margin-top:-'+pT+';"><div class="fa fa-spinner fa fa-spin fa fa-4x spinner" style="padding-top:'+parseInt(h/2-26+20)+'px; padding-left:'+(w/2-23)+'px;"></div></div>').insertBefore("#addGroupModal .modal-body .spinner-base");
      $.post(url,data1,function(data){
        
      }).done(function(data){
        if(data!="error"){
          $("#addGroupModal .spinner-container").remove();
          $("#autoRefresh").html(data);
          $("#addnewgroup").trigger('reset');
          $("#addGroupModal input").removeAttr("disabled");
          $("#addGroupModal textarea").removeAttr("disabled");
          $("#addGroupBtn").removeAttr("disabled");
          $("#addGroupBtn").html('<i class="fa fa-check"></i> Add Group');
          $("#addGroupModal").modal('hide');

          $(".flash-message-text").text("Group added Successfully!");
          $(".flash-message").removeClass("alert-danger");
          $(".flash-message").removeClass("alert-warning");
          $(".flash-message").removeClass("alert-info");
          $(".flash-message").addClass("alert-success");
          $(".flash-message").show();
        }
        else
        {
          $("#addGroupModal .spinner-container").remove();
          $("#addGroupModal input").removeAttr("disabled");
          $("#addGroupModal textarea").removeAttr("disabled");
          $("#addGroupBtn").removeAttr("disabled");
          $("#addGroupBtn").html('<i class="fa fa-check"></i> Add Group');
          $(".modal-flash-message-text").text("Error! There was some problem processing your request. Please try again.");
          $(".modal-flash-message").removeClass("alert-success");
          $(".modal-flash-message").removeClass("alert-warning");
          $(".modal-flash-message").removeClass("alert-info");
          $(".modal-flash-message").addClass("alert-danger");
          $(".modal-flash-message").show();
        }
      });
    }
    else
    {
      alert("Enter a Group Name");
    }
});

$(document).on("click", ".delete-research-group", function(e){
  e.preventDefault();
  var group = $(this);
  console.log(group);
  bootbox.confirm("Are you sure?", function(result) {
      if(result)
      {
        $.post(globalPath+"/admin/research/deletegroup/"+group.attr('data-id'),{},function(data){         
        }).done(function(data){
          // $("#autoRefresh").html(data);
          $(".flash-message-text").text("Group deleted Successfully!");
          $(".flash-message").removeClass("alert-danger");
          $(".flash-message").removeClass("alert-warning");
          $(".flash-message").removeClass("alert-info");
          $(".flash-message").addClass("alert-success");
          $(".flash-message").show();
          $("#researchGroupLink").trigger("click");
        });      
      }
  });    
});

$(document).on("click", ".edit-research-group", function(e){
  e.preventDefault();
  var group = $(this);
  $.get(globalPath+"/admin/research/researchgroupinfo/"+group.attr('data-id'),{},function(data){
  }).done(function(data){
    $("#editgroup").attr("action", globalPath+"/admin/research/addgroup/"+group.attr('data-id'));
    $("#editresearchgroupname").val(data.researchgroup_name);
    $("#editresearchgroupdesc").val(data.researchgroup_desc);
    $("#editGroupModal").modal("show");
  });
});

$(document).on("submit", "#editgroup", function(event){
    event.preventDefault();
    if($("#editresearchgroupname").val())
    {
      var data1=$(this).serialize();
      var url=$(this).attr("action");
      //console.log(url);
      $("#editGroupModal input").attr("disabled", "disabled");
      $("#editGroupModal textarea").attr("disabled", "disabled");
      $("#editGroupBtn").attr("disabled", "disabled");
      $("#editGroupBtn").html('<i class="fa fa-spinner fa fa-spin"></i> Updating Group');
      $(".flash-message").hide();
      $(".modal-flash-message").hide();
      w = $("#editGroupModal .modal-body").width()+parseInt($("#editGroupModal .modal-body").css("paddingLeft").replace('px', ''))+parseInt($("#editGroupModal .modal-body").css("paddingRight").replace('px', ''));
      h = $("#editGroupModal .modal-body").height();
      pL = $("#editGroupModal .modal-body").css("paddingLeft");
      pT = $("#editGroupModal .modal-body").css("paddingTop");
      $('<div class="spinner-container" style="margin-left:-'+pL+'; margin-top:-'+pT+';"><div class="fa fa-spinner fa fa-spin fa fa-4x spinner" style="padding-top:'+parseInt(h/2-26+20)+'px; padding-left:'+(w/2-23)+'px;"></div></div>').insertBefore("#editGroupModal .modal-body .spinner-base");
      $.post(url,data1,function(data){
        
      }).done(function(data){
        if(data!="error"){
          $("#editGroupModal .spinner-container").remove();
          $("#autoRefresh").html(data);
          $("#editgroup").trigger('reset');
          $("#editGroupModal input").removeAttr("disabled");
          $("#editGroupModal textarea").removeAttr("disabled");
          $("#editGroupBtn").removeAttr("disabled");
          $("#editGroupBtn").html('<i class="fa fa-check"></i> Update Group');
          $("#editGroupModal").modal('hide');

          $(".flash-message-text").text("Group updated Successfully!");
          $(".flash-message").removeClass("alert-danger");
          $(".flash-message").removeClass("alert-warning");
          $(".flash-message").removeClass("alert-info");
          $(".flash-message").addClass("alert-success");
          $(".flash-message").show();
        }
        else
        {
          $("#addGroupModal .spinner-container").remove();
          $("#addGroupModal input").removeAttr("disabled");
          $("#addGroupModal textarea").removeAttr("disabled");
          $("#addGroupBtn").removeAttr("disabled");
          $("#addGroupBtn").html('<i class="fa fa-check"></i> Add Group');
          $(".modal-flash-message-text").text("Error! There was some problem processing your request. Please try again.");
          $(".modal-flash-message").removeClass("alert-success");
          $(".modal-flash-message").removeClass("alert-warning");
          $(".modal-flash-message").removeClass("alert-info");
          $(".modal-flash-message").addClass("alert-danger");
          $(".modal-flash-message").show();
        }
      });
    }
    else
    {
      alert("Enter a Group Name");
    }
});
/*----------------------------------------*/

/* ------------ Research Area ------------- */
$(document).on("click", "#editreserachinfo", function(){
    $('#reserachinfo').summernote({
      height: 300,   //set editable area's height
      focus: true,
      toolbar: [
        //[groupname, [button list]]
        ['style', ['style']],
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strike']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['edit', ['undo', 'redo']],
        ['misc', ['codeview', 'fullscreen']],
      ]
      //airMode: true
    });    
    $("#editreserachinfo").removeClass("btn-info");
    $("#editreserachinfo").addClass("btn-success");
    $("#editreserachinfo").html('<i class="fa fa-check fa-1x"></i> Save Changes');
    $("#editreserachinfo").attr("id", "savereserachinfo");
    $('#cancelediting').removeClass("hide");
  });

  $(document).on("change", ".switch", function(){
    if($(this).prop("checked")){
      $(this).parents().find(".control-label").text("Enabled");
    }else{
      $(this).parents().find(".control-label").text("Disabled");
    }
  });

  $(document).on("click", "#cancelediting", function(){ 
    $('#reserachinfo').destroy();
    $('#cancelediting').addClass("hide");
    $("#savereserachinfo").removeClass("btn-primary");
    $("#savereserachinfo").addClass("btn-info");
    $("#savereserachinfo").html('<i class="fa fa-edit fa-2x"></i> Edit Content');
    $("#savereserachinfo").attr("id", "editreserachinfo");
  });

  $(document).on("click", "#savereserachinfo", function(event){
    event.preventDefault();
    //$("#savereserachinfo").removeClass("btn-success");
    $("#savereserachinfo").attr("disabled","disabled");
    $("#savereserachinfo").html('<i class="fa fa-spinner fa fa-spin"></i> Updating ...');
    $.post($(this).parents("form").attr('action'),{'researchdesc':$('#reserachinfo').code()},function(data){

    }).done(function(data){
      if(data=="true"){
        $('#reserachinfo').destroy();
        $(".flash-message-text").text("Content Updated Successfully!");
        $(".flash-message").removeClass("alert-danger");
        $(".flash-message").removeClass("alert-warning");
        $(".flash-message").removeClass("alert-info");
        $(".flash-message").addClass("alert-success");
        $(".flash-message").show();

        $('#cancelediting').addClass("hide");
        $("#savereserachinfo").removeAttr("disabled");
        $("#savereserachinfo").removeClass("btn-success");
        $("#savereserachinfo").addClass("btn-info");
        $("#savereserachinfo").html('<i class="fa fa-edit fa-2x"></i> Edit Content');
        $("#savereserachinfo").attr("id", "editreserachinfo");
      }
      else
      {
        $(".flash-message-text").text("Error! There was some problem in updating content.");
        $(".flash-message").removeClass("alert-success");
        $(".flash-message").removeClass("alert-warning");
        $(".flash-message").removeClass("alert-info");
        $(".flash-message").addClass("alert-danger");
        $(".flash-message").show();

        $("#savereserachinfo").removeAttr("disabled");
        $("#savereserachinfo").html('<i class="fa fa-check fa-1x"></i> Save Changes');
      }
    });
    //console.log($('#reserachinfo').code());
  });

  $(document).on("change.bs.fileinput", function(){
    var options = { 
      beforeSubmit:showRequest,
      success:showResponse,
      dataType:'json'
      };
    $('.postForm').ajaxForm(options).submit();
  });

  function showRequest(formData, jqForm, options) { 
    //$("#validation-errors").hide().empty();
    //$("#output").css('display','none');
      //return true; 
  } 
  function showResponse(response, statusText, xhr, $form)  
  { 
    if(response.success === false)
    {
      var arr = response.errors;
      $.each(arr, function(index, value)
      {
        if (value.length !== 0)
        {
          //$("#validation-errors").append('<div class="alert alert-error"><strong>'+ value +'</strong><div>');
        }
      });
      //$("#validation-errors").show();
      $(".flash-message-text").text("Error! Failed to upload the image.");
      $(".flash-message").removeClass("alert-success");
      $(".flash-message").removeClass("alert-warning");
      $(".flash-message").removeClass("alert-info");
      $(".flash-message").addClass("alert-danger");
      $(".flash-message").show();
    } 
    else 
    {
      $(".flash-message-text").text("Image uploaded Successfully!");
      $(".flash-message").removeClass("alert-danger");
      $(".flash-message").removeClass("alert-warning");
      $(".flash-message").removeClass("alert-info");
      $(".flash-message").addClass("alert-success");
      $(".flash-message").show();
    }
  }

/* ------------------------------------------ */

/* ------------ Researchifno Create -------- */
$(document).on("click", "#initiateesearchinfobtn", function(){
  $("#createresearchinfoform").removeClass("hide");
  $(this).parent("div").addClass("hide");
  $('#createreserachinfo').summernote({
    height: 300,   //set editable area's height
    focus: true,
    toolbar: [
      //[groupname, [button list]]
      ['style', ['style']],
      ['style', ['bold', 'italic', 'underline', 'clear']],
      ['font', ['strike']],
      ['fontsize', ['fontsize']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video']],
      ['edit', ['undo', 'redo']],
      ['misc', ['codeview', 'fullscreen']],
    ]
    //airMode: true
  });
});

$(document).on("submit", "#createresearchinfoform", function(){
  event.preventDefault();
    //$("#savereserachinfo").removeClass("btn-success");
    $("#createresearchinfobtn").attr("disabled","disabled");
    $("#createresearchinfobtn").html('<i class="fa fa-spinner fa fa-spin"></i> Submitting ...');
    $.post($(this).attr('action'),{'researchdesc':$('#createreserachinfo').code()},function(data){

    }).done(function(data){
      if(data=="true"){
        $('#reserachinfo').destroy();
        $(".flash-message-text").text("Content Updated Successfully!");
        $(".flash-message").removeClass("alert-danger");
        $(".flash-message").removeClass("alert-warning");
        $(".flash-message").removeClass("alert-info");
        $(".flash-message").addClass("alert-success");
        $(".flash-message").show();

        $("#researchAreaLink").trigger("click");
      }
      else
      {
        $(".flash-message-text").text("Error! There was some problem in updating content.");
        $(".flash-message").removeClass("alert-success");
        $(".flash-message").removeClass("alert-warning");
        $(".flash-message").removeClass("alert-info");
        $(".flash-message").addClass("alert-danger");
        $(".flash-message").show();

        $("#savereserachinfo").removeAttr("disabled");
        $("#savereserachinfo").html('<i class="fa fa-check fa-1x"></i> Save Changes');
      }
    });
});
/* ------------------------------------------ */

/* ----------- Usertype Create --------------*/
$("#addnewpeopletype").submit(function(event){
    event.preventDefault();
    var url=$(this).attr('action');
    var data=$(this).serialize();
    $.post(url,data,function(){

    }).done(function(res){
      if(res['success']=='true')
      {
        $("#addnewpeopletype").trigger('reset');
        $("#updateUsertypeList").prepend(res['list']);
        $(".flash-message-text").text("User Type created Successfully!");
            $(".flash-message").removeClass("alert-danger");
            $(".flash-message").removeClass("alert-warning");
            $(".flash-message").removeClass("alert-info");
            $(".flash-message").addClass("alert-success");
            $(".flash-message").show();
      }
      else
      {
        alert("Error in saving data !");
        $(".flash-message-text").text("Error! There was some problem processing your request. Please try again.");
            $(".flash-message").removeClass("alert-danger");
            $(".flash-message").removeClass("alert-warning");
            $(".flash-message").removeClass("alert-info");
            $(".flash-message").addClass("alert-success");
            $(".flash-message").show();
      }
      //console.log("create type !");
    });
  });

  $(".deleteusertype").click(function(event){
    event.preventDefault();
    var tabrow=$(this);
    var url1=globalPath+"/admin/usertype'"+"/"+$(this).attr('data-id');
    console.log(url1);

    bootbox.confirm("On delete , you will not be able to access user under this type .\n Are you sure?", function(result){
      if(result)
          {
              
            $.ajax({
              url: url1,
              type: 'DELETE',
              success: function(res) {
                    // Do something with the result
                    if(res=='true')
                {
                  tabrow.parents('tr').remove();
                  $(".flash-message-text").text("User Type deleted Successfully!");
                      $(".flash-message").removeClass("alert-danger");
                      $(".flash-message").removeClass("alert-warning");
                      $(".flash-message").removeClass("alert-info");
                      $(".flash-message").addClass("alert-success");
                      $(".flash-message").show();
                }
                else
                {
                  $(".flash-message-text").text("Error! There was some problem processing your request. Please try again.");
                      $(".flash-message").removeClass("alert-danger");
                      $(".flash-message").removeClass("alert-warning");
                      $(".flash-message").removeClass("alert-info");
                      $(".flash-message").addClass("alert-success");
                      $(".flash-message").show();
                }
              }
          });     
          }
    });
  });
/* --------------------------------------- */


/* ------------ Contact ----------------- */
    function startContactSummernote(){
      $('#officeaddress').summernote({
          height: 300,   //set editable area's height
          //airMode: true,
          focus: true,
          toolbar: [
            ['style', ['style']],
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strike']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['edit', ['undo', 'redo']],
            ['misc', ['codeview', 'fullscreen']],
          ]
          /*toolbar: [
              ['style', ['style']],
              ['style', ['bold', 'italic', 'underline', 'clear']],
              ['font', ['strike']],
              ['fontsize', ['fontsize']],
              ['color', ['color']],
              ['para', ['ul', 'ol', 'paragraph']],
              ['table', ['table']],
              ['insert', ['link', 'picture', 'video']],
              ['edit', ['undo', 'redo']],
              ['misc', ['codeview', 'fullscreen']],
          ]*/
        }); 
    }
    $(document).on("submit","#contactupdate",function(event){
        event.preventDefault();
        var data=$(this).serializeArray();
        data.push({'name':'detailaddress','value':$('#officeaddress').code()});
        $.post($(this).attr('action'),data,function(){

        }).done(function(res){
            if(res==1)
          {
            $(".flash-message-text").text("Contact Information Successfully !");
                $(".flash-message").removeClass("alert-danger");
                $(".flash-message").removeClass("alert-warning");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-success");
                $(".flash-message").show();
                ///$('#officeaddress').destroy();
                //tmp.parents('.each-event').remove();
                //tmp.parents('tr').remove();
               
          }
          else if(res==0)
          {
            $(".flash-message-text").text("Error! There was some problem processing your request. Please try again");
                $(".flash-message").removeClass("alert-danger");
                $(".flash-message").removeClass("alert-warning");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-success");
                $(".flash-message").show();
          }
          else
          {
            $(".flash-message-text").text("It seems to be SESSION OUT ! please repload the page and try again !");
                $(".flash-message").removeClass("alert-danger");
                $(".flash-message").removeClass("alert-warning");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-success");
                $(".flash-message").show();
          }
        });
    });
/* ---------------------------------------- */
/* ------------ Other Courses ----------------- */
    function startOthercourseSummernote(){
      $('#othercourses').summernote({
          height: 300,   //set editable area's height
          //airMode: true,
          focus: true,
          toolbar: [
            ['style', ['style']],
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strike']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['edit', ['undo', 'redo']],
            ['misc', ['codeview', 'fullscreen']],
          ]
          /*toolbar: [
              ['style', ['style']],
              ['style', ['bold', 'italic', 'underline', 'clear']],
              ['font', ['strike']],
              ['fontsize', ['fontsize']],
              ['color', ['color']],
              ['para', ['ul', 'ol', 'paragraph']],
              ['table', ['table']],
              ['insert', ['link', 'picture', 'video']],
              ['edit', ['undo', 'redo']],
              ['misc', ['codeview', 'fullscreen']],
          ]*/
        }); 
    }
    $(document).on("submit","#othercoursesupdate",function(event){
        event.preventDefault();
        var data=$(this).serializeArray();
        data.push({'name':'details','value':$('#othercourses').code()});
        $.post($(this).attr('action'),data,function(){

        }).done(function(res){
            if(res==1)
          {
            $(".flash-message-text").text("Information Successfully Updated!");
                $(".flash-message").removeClass("alert-danger");
                $(".flash-message").removeClass("alert-warning");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-success");
                $(".flash-message").show();
                ///$('#officeaddress').destroy();
                //tmp.parents('.each-event').remove();
                //tmp.parents('tr').remove();
               
          }
          else if(res==0)
          {
            $(".flash-message-text").text("Error! There was some problem processing your request. Please try again");
                $(".flash-message").removeClass("alert-danger");
                $(".flash-message").removeClass("alert-warning");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-success");
                $(".flash-message").show();
          }
          else
          {
            $(".flash-message-text").text("It seems to be SESSION OUT ! please repload the page and try again !");
                $(".flash-message").removeClass("alert-danger");
                $(".flash-message").removeClass("alert-warning");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-success");
                $(".flash-message").show();
          }
        });
    });
/* ---------------------------------------- */
/* --------------- Home -------------------- */
$(document).on("click", "#edithomecontent", function(){
      $('#homecontent').summernote({
        height: 300,   //set editable area's height
        //airMode: true,
        focus: true,
        toolbar: [
        //[groupname, [button list]]
        ['style', ['style']],
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strike']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['edit', ['undo', 'redo']],
        ['misc', ['codeview', 'fullscreen']],
      ]
      });      
      $("#edithomecontent").removeClass("btn-info");
      $("#edithomecontent").addClass("btn-success");
      $("#edithomecontent").html('<i class="fa fa-check fa-1x"></i> Save Changes');
      $("#edithomecontent").attr("id", "savehomecontent");
      $('#cancelediting').removeClass("hide");
    });

    $(document).on("click", "#cancelediting", function(){
      $('#homecontent').destroy();
      $('#cancelediting').addClass("hide");
      $("#savehomecontent").removeClass("btn-success");
      $("#savehomecontent").addClass("btn-info");
      $("#savehomecontent").html('<i class="fa fa-edit fa-2x"></i> Edit Content');
      $("#savehomecontent").attr("id", "edithomecontent");
    });

    $(document).on("click", "#savehomecontent", function(event){
        event.preventDefault();
        if(!$.trim($('#homecontent').code()))
        {
            alert("Add some content to home page ...");
        }
        else
        {
            var url=$(this).parents("form").attr("action");
            $.post(url,{'homecontent':$('#homecontent').code()},function(data){ 
              $("#savehomecontent").removeClass("btn-success");
              $("#savehomecontent").addClass("btn-default");
              $("#savehomecontent").text('Updating ...');
            }).done(function(data){
              if(data=="true"){
                $('#homecontent').destroy();
                $(".flash-message-text").text("Content Updated Successfully!");
                $(".flash-message").removeClass("alert-danger");
                $(".flash-message").removeClass("alert-warning");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-success");
                $(".flash-message").show();

                $('#cancelediting').addClass("hide");
                $("#savehomecontent").removeClass("btn-default");
                $("#savehomecontent").addClass("btn-info");
                $("#savehomecontent").html('<i class="fa fa-edit fa-2x"></i> Edit Content');
                $("#savehomecontent").attr("id", "edithomecontent");
              }
              else
              {
                $(".flash-message-text").text("Error! There was some problem in updating content.");
                $(".flash-message").removeClass("alert-success");
                $(".flash-message").removeClass("alert-warning");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-danger");
                $(".flash-message").show();

                $("#savehomecontent").removeClass("btn-default");
                $("#savehomecontent").addClass("btn-success");
                $("#savehomecontent").html('<i class="fa fa-check fa-1x"></i> Save Changes');
              }              
            });            
        }
    });
/*-------------------------------------------*/

/* --------------- Video -------------------- */
$(document).on("click", "#editvideocontent", function(){
      $('#videocontent').summernote({
        height: 300,   //set editable area's height
        //airMode: true,
        focus: true,
        toolbar: [
        //[groupname, [button list]]
        ['style', ['style']],
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strike']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['edit', ['undo', 'redo']],
        ['misc', ['codeview', 'fullscreen']],
      ]
      });      
      $("#editvideocontent").removeClass("btn-info");
      $("#editvideocontent").addClass("btn-success");
      $("#editvideocontent").html('<i class="fa fa-check fa-1x"></i> Save Changes');
      $("#editvideocontent").attr("id", "savevideocontent");
      $('#cancelediting').removeClass("hide");
    });

    $(document).on("click", "#cancelediting", function(){
      $('#videocontent').destroy();
      $('#cancelediting').addClass("hide");
      $("#savevideocontent").removeClass("btn-success");
      $("#savevideocontent").addClass("btn-info");
      $("#savevideocontent").html('<i class="fa fa-edit fa-2x"></i> Edit Content');
      $("#savevideocontent").attr("id", "editvideocontent");
    });

    $(document).on("click", "#savevideocontent", function(event){
        event.preventDefault();
        if(!$.trim($('#videocontent').code()))
        {
            alert("Add some content to video page ...");
        }
        else
        {
            var url=$(this).parents("form").attr("action");
            $.post(url,{'videocontent':$('#videocontent').code()},function(data){ 
              $("#savevideocontent").removeClass("btn-success");
              $("#savevideocontent").addClass("btn-default");
              $("#savevideocontent").text('Updating ...');
            }).done(function(data){
              if(data=="true"){
                $('#videocontent').destroy();
                $(".flash-message-text").text("Content Updated Successfully!");
                $(".flash-message").removeClass("alert-danger");
                $(".flash-message").removeClass("alert-warning");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-success");
                $(".flash-message").show();

                $('#cancelediting').addClass("hide");
                $("#savevideocontent").removeClass("btn-default");
                $("#savevideocontent").addClass("btn-info");
                $("#savevideocontent").html('<i class="fa fa-edit fa-2x"></i> Edit Content');
                $("#savevideocontent").attr("id", "editvideocontent");
              }
              else
              {
                $(".flash-message-text").text("Error! There was some problem in updating content.");
                $(".flash-message").removeClass("alert-success");
                $(".flash-message").removeClass("alert-warning");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-danger");
                $(".flash-message").show();

                $("#savevideocontent").removeClass("btn-default");
                $("#savevideocontent").addClass("btn-success");
                $("#savevideocontent").html('<i class="fa fa-check fa-1x"></i> Save Changes');
              }              
            });            
        }
    });
/*-------------------------------------------*/

/* ------------ Report -------------------- */

function reportPageDatePicker(){
    $("#reportfrom").datetimepicker({
      pickTime: false
    });
    $("#reportto").datetimepicker({
      pickTime: false
    });
}
$(document).ready(function(){
 reportPageDatePicker();
});

  $(document).on("click", "#edithomecontent", function(){
  });

$(document).on("change", "#reportmodule", function(){
  if (($(this).val()=='publication')||($(this).val()=='books')) {
    $("#reportfrom").data("DateTimePicker").destroy();
    $("#reportto").data("DateTimePicker").destroy();
    $("#reportfrom").attr('placeholder','Year');
    $("#reportfrom").attr('type','number');
    $("#reportfrom").attr('min','1900');
    $("#reportfrom").attr('max','3000');
    $("#reportfrom").attr('pattern','.{4,4}');
    $("#reportto").attr('placeholder','Year');
    $("#reportto").attr('type','number');
    $("#reportto").attr('min','1900');
    $("#reportto").attr('max','3000');
    $("#reportto").attr('pattern','.{4,4}');
  } else {
    $("#reportfrom").datetimepicker({
      pickTime: false
    });
    $("#reportto").datetimepicker({
      pickTime: false
    });
    $("#reportfrom").attr('placeholder','Start Date');
    $("#reportto").attr('placeholder','To Date(Default Today)');
    $("#reportfrom").removeAttr('type');
    $("#reportfrom").removeAttr('min');
    $("#reportfrom").removeAttr('max');
    $("#reportfrom").removeAttr('pattern');
    $("#reportto").removeAttr('type');
    $("#reportto").removeAttr('min');
    $("#reportto").removeAttr('max');
    $("#reportto").removeAttr('pattern');
  }
})
  $(document).on("submit","#reportform",function(event){
    event.preventDefault();
    if($("#reportmodule").val()!==0 && $("#reportfrom").val())
    {

        //compare
        var from=$("#reportfrom").val();
        var to=$("#reportto").val()?$("#reportto").val():moment(new Date()).format("YYYY-MM-DD");
        console.log(to);
        var from1=from.split("-");
        //from1.reverse();        
        var to1=to.split("-");
        //to1.reverse();
        var a = moment(from1);
        var b = moment(to1);
        if(a.diff(b, 'days')>0)
        {
          alert("Check the from and to date !");
        }
        else
        {
            if($("#reportmodule").val()=='people')
            {
              var url=globalPath+"/admin/report/people";
              $.post(url,$(this).serialize(),function(){

              }).done(function(res){
              	$("#resultBody").html(res);
              });
            }
            else if($("#reportmodule").val()=='publication')
            {
              var url=globalPath+"/admin/report/publication";
              $.post(url,$(this).serialize(),function(){

              }).done(function(res){
                  $("#resultBody").html(res);
              });
            }
            else if($("#reportmodule").val()=='books')
            {
              var url=globalPath+"/admin/report/books";
              $.post(url,$(this).serialize(),function(){

              }).done(function(res){
                  $("#resultBody").html(res);
              });
            }
            else if($("#reportmodule").val()=='student')
            {
              var url=globalPath+"/admin/report/student";
              $.post(url,$(this).serialize(),function(){

              }).done(function(res){
              	$("#resultBody").html(res);
              });
            }
            else if($("#reportmodule").val()=='programs')
            {
              var url=globalPath+"/admin/report/programs";
              $.post(url,$(this).serialize(),function(){

              }).done(function(res){
              	$("#resultBody").html(res);
              });
            }
            else if($("#reportmodule").val()=='events')
            {
              var url=globalPath+"/admin/report/events";
              $.post(url,$(this).serialize(),function(){

              }).done(function(res){
                   $("#resultBody").html(res);
              });
            }
            else if($("#reportmodule").val()=='activities')
            {
              var url=globalPath+"/admin/report/activities";
              $.post(url,$(this).serialize(),function(){

              }).done(function(res){
                   $("#resultBody").html(res);
              });
            }
            else if($("#reportmodule").val()=='resources')
            {
              var url=globalPath+"/admin/report/resources";
              $.post(url,$(this).serialize(),function(){

              }).done(function(res){
              	$("#resultBody").html(res);
              });
            }
            else if($("#reportmodule").val()=='news')
            {
              var url=globalPath+"/admin/report/news";
              $.post(url,$(this).serialize(),function(){

              }).done(function(res){
                   $("#resultBody").html(res);
              });
            }
            else if($("#reportmodule").val()=='announcement')
            {
              var url=globalPath+"/admin/report/announcement";
              $.post(url,$(this).serialize(),function(){

              }).done(function(res){
                   $("#resultBody").html(res);
              });
            }
        }
    }
    else
    {
      alert("Select a report module !");
      $("#reportmodule").focus();
    }
  });
/*------------------------------------------ */

/* --------------- Scientiic Officer View -------------- */
function updateDataTable(){
}   
/* ----------------------------------------------------- */

$(document).on('click','.viewpermission',function(){
  $("#PrevillageModal").modal("show");
  $.post(globalPath+'/admin/abailablepermission',{'uid':$(this).data('id')},function(){
    $("#availablePrevillage").html("<p>Loading ....</p>");
  }).done(function(res){
      $("#availablePrevillage").html(res);
  });
});

$(document).on("click","#saveUserPermission",function(){
  var data=[];
  var people,student,events,resource,bookings,newannouncement,programs,createadmin,research;
  if($("#people").prop('checked')==true)
  {
      people=1;
  }
  else
  {
      people=0;
  }
  if($("#student").prop('checked')==true)
  {
      student=1;
  }
  else
  {
      student=0;
  }
  if($("#events").prop('checked')==true)
  {
      events=1;

  }
  else
  {
    events=0;
  }
  if($("#resource").prop('checked')==true)
  {
      resource=1;

  }
  else
  {
    resource=0;
  }
  if($("#bookings").prop('checked')==true)
  {
      bookings=1;

  }
  else
  {
    bookings=0;
  }

  if($("#newannouncement").prop('checked')==true)
  {
      newannouncement=1;

  }
  else
  {
    newannouncement=0;
  }
  if($("#programs").prop('checked')==true)
  {
        programs=1;

  }
  else
  {
    programs=0;
  }
  if($("#createadmin").prop('checked')==true)
  {
      createadmin=1;
  }
  else
  {
    createadmin=0;
  }
  if($("#research").prop('checked')==true)
  {
      research=1;
  }
  else
  {
    research=0;
  }
  $.post(globalPath+'/admin/changeuserpermission',{'people':people,'student':student,'events':events,'resource':resource,'bookings':bookings,'newannouncement':newannouncement,'programs':programs,'createadmin':createadmin, 'research':research,'userid':$("#useridinchangepermission").val()},function(){

  }).done(function(res){
     if(res==1)
     {
       $("#availablePrevillage").html('Saved ....');
      $("#PrevillageModal").modal("hide"); 
     }    
     else{
      alert('Unable to process right now ! Try later');
     }
  });
});
// btn for import data from .xls
$(document).on("click","#importstudent",function(event){
  event.preventDefault();
  $("#ImportDataModal").modal("show");
  $("#uploadDatafromfileform").attr("action",globalPath+"/admin/student/import/"+$(this).data('id'));
});

// prepare the form when the DOM is ready 
// 
var options12 = { 
           // target element(s) to be updated with server response 
       // beforeSubmit:  showRequest12,  // pre-submit callback 
        success:       showResponse12  // post-submit callback
    }; 
/*$(document).delegate('#importStudentfile','change', function(){
    //console.log("hi");
    $('#uploadDatafromfileform').ajaxSubmit(options12); 
    $('#uploadDatafromfileform').submit(function(event) {
        event.preventDefault(); 
        $(this).ajaxSubmit(options12); 
        //return false; 
    });      
});*/
$(document).on("submit","#uploadDatafromfileform",function(event){
  event.preventDefault();
  var tmp=$(this);
  bootbox.confirm("Are you sure ?",function(res){
    if(res)
    {
      tmp.ajaxSubmit(options12);
    }
  });
}); 
// pre-submit callback 
/*function showRequest12(formData, jqForm, options) { 
    alert('About to submit'); 
    return true; 
}*/ 
 
// post-submit callback 
function showResponse12(responseText, statusText, xhr, $form){console.log(responseText, xhr);
  if(responseText.result == "true")
  {
    $('#displayResponse').html("Uploaded successfully !");
    $("#ImportDataModal").modal("hide");
    $('#studentlistbyyear').html(responseText.studentlist);
  }
  else if(responseText.result == "false")
  {
    $('#displayResponse').html("Error in importing data. Please verify that data in your xls file is in correct format.");
  }
  else
  {
    $('#displayResponse').html("File format not suppotred ! only .xls files allowed");
  }
}  

$(document).on('hidden.bs.modal', '#ImportDataModal', function (e) {
    e.preventDefault();
    $("#displayResponse").html(" ");
    $("#uploadDatafromfileform").trigger("reset");
});


$(document).on("click",".editstudent",function(event){
  event.preventDefault();
  $("#StudentEditModal").modal("show");
  $.get(globalPath+'/admin/student/edit/'+$(this).data('id')).done(function(res){
      $("#editStudentInfo").html(res);
  }); 
});


$(document).on("submit","#studentUpdate",function(event){
  event.preventDefault();
  $.post(globalPath+'/admin/student/edit',$(this).serialize()).done(function(res){
        if(res==1)
        {
          bootbox.alert("Data Updated successfully !");
          $("#StudentEditModal").modal("hide");
          $("#editStudentInfo").html(" ");
        }
        else
        {
          bootbox.alert('Unable to process request !');
        }
  }); 
});


$(document).on("change", "#usertype", function(e){
  if (($("#usertype").val()=='Staff')||($("#usertype").val()=='Retired-Faculty')) {
    $('input[name="email"]').removeAttr('required');
  }else{

  }
});

////////////// 17 Jan 2016


/* --------- Publications -> Create Publication ----------*/
  $(document).on("click", ".add-publication-btn", function(e){
    e.preventDefault();
    $("#pageContent").html("");
    $("#pageContent").html('<p class="m-t-lg text-center"><i class="fa fa-spinner fa fa-spin fa fa-4x"></i></p>');
    $.get($(this).attr('href'), function(data){
      pageContent = $(data).find("#pageContent").html();
      $("#pageContent").html(pageContent);      
      initToolbarBootstrapBindings();
      //$('#editor').wysiwyg({ fileUploadError: showErrorAlert});                       
    }).done(function(data) {
      pageModals = $(data).find("#pageModals").html();
        $("#pageModals").html(pageModals);  
    }).fail(function() {
      $("#pageContent").html("Sorry! Error processing your Request.");
    });
  });

  $(document).on("submit","#addpublicationsform",function(event){
      event.preventDefault();
      var url=$(this).attr('action');
      
      var data=$(this).serializeArray();
      $.post(url,data,function(){

      }).done(function(data){
        if(data.status=="true")
        {
          if (data.action=='created') {
            $(".flash-message-text").text("Publication added Successfully !");
            $(".flash-message").removeClass("alert-danger");
            $(".flash-message").removeClass("alert-warning");
            $(".flash-message").removeClass("alert-info");
            $(".flash-message").addClass("alert-success");
            $(".flash-message").show();
            $("#addpublicationsform").trigger('reset');
          } else if(data.action=='updated'){
            $("#autoRefresh").html(data.listofpublications);
            $(".flash-message-text").text("Publication details updated Successfully !");
            $(".flash-message").removeClass("alert-danger");
            $(".flash-message").removeClass("alert-warning");
            $(".flash-message").removeClass("alert-info");
            $(".flash-message").addClass("alert-success");
            $(".flash-message").show();
            $("#addpublicationsform").trigger('reset');
            $("#editPublicationDetails").modal('hide');
          }
        }
        else if(data.status==="false")
        {
          $(".flash-message-text").text("Error! There was some problem processing your request. Please try again");
          $(".flash-message").removeClass("alert-danger");
          $(".flash-message").removeClass("alert-warning");
          $(".flash-message").removeClass("alert-info");
          $(".flash-message").addClass("alert-success");
          $(".flash-message").show();
          $("#addlabsform").trigger('reset');
        }
        else
        {
          $(".flash-message-text").text("Unauthorized access !");
          $(".flash-message").removeClass("alert-danger");
          $(".flash-message").removeClass("alert-warning");
          $(".flash-message").removeClass("alert-info");
          $(".flash-message").addClass("alert-success");
          $(".flash-message").show();
          $("#addlabsform").trigger('reset');
        }
      });
  });

  // $(document).on("click","#donotaddpublication",function(event){
  //   event.preventDefault();
  //   $("#pageContent").html("");
  //     $("#pageContent").html('<p class="m-t-lg text-center"><i class="fa fa-spinner fa fa-spin fa fa-4x"></i></p>');
  //     $.get(globalPath+"/admin/publications/managepublications", function(data){
  //       pageContent = $(data).find("#pageContent").html();
  //       $("#pageContent").html(pageContent);      
  //       initToolbarBootstrapBindings();
  //       //$('#editor').wysiwyg({ fileUploadError: showErrorAlert});                       
  //     }).done(function(data) {
  //       pageModals = $(data).find("#pageModals").html();
  //         $("#pageModals").html(pageModals);
  //     }).fail(function() {
  //       $("#pageContent").html("Sorry! Error processing your Request.");
  //     });
  // }); 

/*------ Publications -> Edit Publication -------*/

  $(document).on("click",".editpublication",function(event){
    event.preventDefault();
    $.get(globalPath+'/admin/publications/updatepublication/'+$(this).attr('data-id'),function(data){
        $("#publicationdetailsupdate").html(data);
        $("#editPublicationDetails").modal('show');
    });  
  });

  $(document).on("click",".deletepublication",function(event){
    event.preventDefault();
    var url=globalPath+"/admin/publications/deletepublication"+'/'+$(this).attr('data-id');
    var tmp=$(this);
    bootbox.confirm("Are you sure to delete this publication?", function(result) {
      if(result)
      {
        $.post(url,{},function(data){         
            }).done(function(data){
              if(data.deleted==="true")
              {
                $("#autoRefresh").html(data.listofpublications);
                $(".flash-message-text").text("Publication deleted Successfully!");
                $(".flash-message").removeClass("alert-danger");
                $(".flash-message").removeClass("alert-warning");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-success");
                $(".flash-message").show();
              }
              else if(data.deleted==="false")
              {
                $(".flash-message-text").text("Sorry! There was some problem deleting the publication.");
                $(".flash-message").removeClass("alert-success");
                $(".flash-message").removeClass("alert-warning");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-danger");
                $(".flash-message").show();
              }
              else
              {
                $(".flash-message-text").text(data.deleted);
                $(".flash-message").removeClass("alert-danger");
                $(".flash-message").removeClass("alert-success");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-warning");
                $(".flash-message").show();
              }
            });
      }
    });
  });

/*------------------------------------*/
  /* --------------- User Publications -------------------- */
  $(document).on("click", "#editpublications", function(){
      $('#userpublications').summernote({
        height: 300,   //set editable area's height
        //airMode: true,
        focus: true,
        toolbar: [
        //[groupname, [button list]]
        ['style', ['style']],
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strike']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['edit', ['undo', 'redo']],
        ['misc', ['codeview', 'fullscreen']],
      ]
      });      
      $("#editpublications").removeClass("btn-info");
      $("#editpublications").addClass("btn-success");
      $("#editpublications").html('<i class="fa fa-check fa-1x"></i> Save Changes');
      $("#editpublications").attr("id", "savepublications");
      $('#canceleditingpub').removeClass("hide");
    });

    $(document).on("click", "#canceleditingpub", function(){
      $('#userpublications').destroy();
      $('#canceleditingpub').addClass("hide");
      $("#savepublications").removeClass("btn-success");
      $("#savepublications").addClass("btn-info");
      $("#savepublications").html('<i class="fa fa-edit fa-2x"></i> Edit Content');
      $("#savepublications").attr("id", "editpublications");
    });

    $(document).on("click", "#savepublications", function(event){
        event.preventDefault();
        if(!$.trim($('#userpublications').code()))
        {
            alert("Add some content to Publications ...");
        }
        else
        {            
            var url=globalPath+'/admin/useractivity/updateuserpub/'+$(this).parents("form").attr('data-id')
            $.post(url,{'userpublications':$('#userpublications').code()},function(data){ 
              $("#savepublications").removeClass("btn-success");
              $("#savepublications").addClass("btn-default");
              $("#savepublications").text('Updating ...');
            }).done(function(data){
              if(data==1){
                $('#userpublications').destroy();
                $(".flash-message-text").text("Content Updated Successfully!");
                $(".flash-message").removeClass("alert-danger");
                $(".flash-message").removeClass("alert-warning");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-success");
                $(".flash-message").show();

                $('#canceleditingpub').addClass("hide");
                $("#savepublications").removeClass("btn-default");
                $("#savepublications").addClass("btn-info");
                $("#savepublications").html('<i class="fa fa-edit fa-2x"></i> Edit Content');
                $("#savepublications").attr("id", "editpublications");
              }
              else
              {
                $(".flash-message-text").text("Error! There was some problem in updating content.");
                $(".flash-message").removeClass("alert-success");
                $(".flash-message").removeClass("alert-warning");
                $(".flash-message").removeClass("alert-info");
                $(".flash-message").addClass("alert-danger");
                $(".flash-message").show();

                $("#savepublications").removeClass("btn-default");
                $("#savepublications").addClass("btn-success");
                $("#savepublications").html('<i class="fa fa-check fa-1x"></i> Save Changes');
              }              
            });            
        }
    });
/*-------------------------------------------*/
// btn for import data from .xls
$(document).on("click","#importpublication",function(event){
  event.preventDefault();
  $("#ImportDataModal").modal("show");
  $("#uploadBIBform").attr("action",globalPath+"/admin/publications/import");
});

var optionsImortBIB = {
        success:       showResponseImportBIB  // post-submit callback
    }; 

$(document).on("submit","#uploadBIBform",function(event){
  event.preventDefault();
  var tmp=$(this);
  bootbox.confirm("Are you sure ?",function(res){
    if(res)
    {
      tmp.ajaxSubmit(optionsImortBIB);
    }
  });
}); 

 
// post-submit callback 
function showResponseImportBIB(responseText, statusText, xhr, $form){console.log(responseText, xhr);
  if(responseText.result == "true")
  {
    var id = $("#importPublicationBtn").data('id');
    $('#displayResponse').html("Uploaded successfully !");
    $.get(globalPath+'/bibteximport?id='+id, function(){
             
    }).done(function(data) {
      if (data=='true') {
        $("#ImportDataModal").modal("hide");
      } else{
        $('#displayResponse').html("Error in importing data. Please verify that data in your bib file is in correct format.");
      }                
    }).fail(function() {
        $("#pageContent").html("Sorry! Error processing your Request.");
    });
  }
  else if(responseText.result == "false")
  {
    $('#displayResponse').html("Error in uploading file.");
  }
  else
  {
    $('#displayResponse').html("File format not suppotred ! only .bib files allowed");
  }
}


$(document).on("click", "#newsDesc", function(){
  bootbox.alert({
    title: "Description",
    message: $(this).data('description')
  });
});

$(document).on("click", "#downloadReport", function(event){console.log('hi');
  event.preventDefault();
    if($("#reportmodule").val()!==0 && $("#reportfrom").val())
    {
        //compare
        var f =$("#reportfrom").val();
        var to=$("#reportto").val()?$("#reportto").val():moment(new Date()).format("YYYY");
        
        if((f - to)>0)
        {
          alert("Check the from and to date !");
        }
        else
        {
            if($("#reportmodule").val()=='people')
            {
              var url=globalPath+"/admin/report/peopledownload";
              $.post(url,{'reportfrom':f, 'reportto':to},function(){

              }).done(function(res){
                bootbox.alert('<div class="text-center">Your report has been successfully generated.<br><br><a href="'+res+'" class="btn btn-success"><i class="fa fa-download"></i> Download</a></div>');
              });
            }
            else if($("#reportmodule").val()=='publication')
            {
              var url=globalPath+"/admin/report/pubdownload";
              console.log('going');
              $.post(url,{'reportfrom':f, 'reportto':to},function(){

              }).done(function(res){
                bootbox.alert('<div class="text-center">Your report has been successfully generated.<br><br><a href="'+res+'" class="btn btn-success"><i class="fa fa-download"></i> Download</a></div>');
              });
            }
            else if($("#reportmodule").val()=='books')
            {
              var url=globalPath+"/admin/report/booksdownload";
              console.log('going');
              $.post(url,{'reportfrom':f, 'reportto':to},function(){

              }).done(function(res){
                bootbox.alert('<div class="text-center">Your report has been successfully generated.<br><br><a href="'+res+'" class="btn btn-success"><i class="fa fa-download"></i> Download</a></div>');
              });
            }
            else if($("#reportmodule").val()=='student')
            {
              $(this).ajaxSubmit();
              // var url=globalPath+"/admin/report/student";
              // $.post(url,$(this).serialize(),function(){

              // }).done(function(res){

              // });
            }
            else if($("#reportmodule").val()=='programs')
            {
              var url=globalPath+"/admin/report/programs";
              $.post(url,$(this).serialize(),function(){

              }).done(function(res){

              });
            }
            else if($("#reportmodule").val()=='events')
            {
              var url=globalPath+"/admin/report/eventsdownload";
              console.log('going');
              $.post(url,{'reportfrom':f, 'reportto':to},function(){

              }).done(function(res){
                bootbox.alert('<div class="text-center">Your report has been successfully generated.<br><br><a href="'+res+'" class="btn btn-success"><i class="fa fa-download"></i> Download</a></div>');
              });
            }
            else if($("#reportmodule").val()=='activities')
            {
              var url=globalPath+"/admin/report/activitiesdownload";
              console.log('going');
              $.post(url,{'reportfrom':f, 'reportto':to},function(){

              }).done(function(res){
                bootbox.alert('<div class="text-center">Your report has been successfully generated.<br><br><a href="'+res+'" class="btn btn-success"><i class="fa fa-download"></i> Download</a></div>');
              });
            }
            else if($("#reportmodule").val()=='resources')
            {
              var url=globalPath+"/admin/report/resources";
              $.post(url,$(this).serialize(),function(){

              }).done(function(res){

              });
            }
            else if($("#reportmodule").val()=='news')
            {
              var url=globalPath+"/admin/report/newsdownload";
              $.post(url,{'reportfrom':f, 'reportto':to},function(){

              }).done(function(res){
                bootbox.alert('<div class="text-center">Your report has been successfully generated.<br><br><a href="'+res+'" class="btn btn-success"><i class="fa fa-download"></i> Download</a></div>');
              });
            }
            else if($("#reportmodule").val()=='announcement')
            {
              var url=globalPath+"/admin/report/announcementdownload";
              $.post(url,{'reportfrom':f, 'reportto':to},function(){

              }).done(function(res){
                bootbox.alert('<div class="text-center">Your report has been successfully generated.<br><br><a href="'+res+'" class="btn btn-success"><i class="fa fa-download"></i> Download</a></div>');
              });
            }
        }
    }
    else
    {
      alert("Select a report module !");
      $("#reportmodule").focus();
    }

});

$(document).on("click", ".changepassword", function(){
    $("#uid").val($(this).data('id'));
    $("#ChangePWDModal").modal('show');
});

$(document).on("submit", "#changePWD", function(event)
      {
          event.preventDefault();
          var url=$(this).attr('action');
          var data=$(this).serialize();
          $.post(url,data,function(res){

          }).done(function(res){
              if(res=='success')
              {
                $("#ChangePWDModal").modal('hide');
                window.location.reload();
              
              }else{
                $(".error").text("Unknown Error!.");
                $(".error").css("display","block");
              }
          });
      }); 
