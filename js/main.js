var bookeddate;
$(document).ready(function(){
	
});
$(document).on('change',"#whichhall",function(){
	$.post(indexpath+'/booking/allbookeddates/'+$(this).val(),{},function(data){
		bookeddate=data;
		console.log(data);
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
				//check if date greater than today 
				
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


/******************** my details / Publication ******************/

$("#changepass").click(function(){
	$("#changepasswordModal").modal("show");
});

$("#changepassword").submit(function(event){
	event.preventDefault();
	if($("#newpassword").val()==$("#renewpassword").val())
	{
		var url=globalPath+"/changepassword";
		var data=$(this).serialize();
		$.post(url, data , function(){
		}).done(function(res){
			if(res=='1')
			{
				$("#changepasswordModal").modal("hide");
				alert("Password updated successfully !");
			}
			else if(res=='2')
			{
				$("#errorchangepass").text("Invalid Old password !");
				$(".error").css("display","block");
				$("#oldpassword").val("");
				$("#oldpassword").focus();
			}
		});
	}
	else
	{
		$("#errorchangepass").text("Mismatch New password & Re-Password !");
		$(".error").css("display","block");
		$("#newpassword").val("");
		$("#renewpassword").val("");
		$("#newpassword").focus();
	}

});

$("#editdetails").click(function(){
	var url=globalPath+"/useractivity/myinfo";
	$.post(url+'/'+$(this).attr('data-id'),{},function(){

	}).done(function(res){
		$("#userdetails").html(res);
	});
	$("#editDetailsModal").modal('show');
});

$("#addmoreactivities").click(function(){
	$("#addActivitiyModal").modal("show");
});

$("#addmorecourses").click(function(){
	$("#addCourseModal").modal("show");
});

$("#addmorebook").click(function(){
	$("#addBookModal").modal("show");
});

$("#addpublication").click(function(){
	$("#addPublicationModal").modal("show");
});

$("#publicationform").submit(function(event){
	event.preventDefault();
	var url=globalPath+"/publication/publicationadd";
	var data=$(this).serializeArray();
	var researchgroups = [];
     $('#researchgroup :checked').each(function() {
       researchgroups.push($(this).val());
     });
    data.push({'researchgroup':researchgroups});
	$.post(url,data,function(){

	}).done(function(res){
		if(res['status']==1)
		{
		 	var tmp=[];
		 	var i=0;
		 	$(".publication").each(function(){
		 		tmp[i++]=$(this).val();
		 	});
		 	$("#publicationlist").prepend("<article class=\"media clear each-publication\" style=\"border: 0px;\"><a href=\"#\" class=\"pull-right deletepublication btn btn-xs btn-danger\" data-id=\""+res.dataid+"\"><span><i class=\"fa fa-times\"></i> Delete</span></a><a href=\"#\" class=\"pull-right editpublication m-l btn btn-xs btn-info\" data-id=\""+res.dataid+"\"><i class=\"fa fa-edit\"></i> Edit</a><h4 class=\"block pub-title\"><span class='pub-title'>"+tmp[0]+"</span></h4><p><span class='dpt-text-dark'>Authors:</span> <span class='pub-authors'>"+tmp[1]+"</span></p><p><span class='dpt-text-dark'>Journal:</span> <span class='pub-journal'>"+tmp[3]+"</span></p><p><span class='dpt-text-dark'>Volume:</span> <span class='pub-volume'>"+tmp[4]+"</span> <span class='dpt-text-dark'>Page:</span> <span class='pub-page'>"+tmp[5]+"</span> <span class='dpt-text-dark'>DOI:</span> <span class='pub-doi'>"+tmp[6]+"</span></p><p><span class='dpt-text-dark'>Year:</span> <span class='pub-year'>"+tmp[2]+"</span></p</article><div class=\"line line-dashed\"></div>");
		 	$("#publicationform").trigger('reset');
		 	$("#addPublicationModal").modal("hide");
		}
		else
		{
			alert("Unable to process your request ! try again later");
		}

	});
});

$("#activityaddform").submit(function(event){
	event.preventDefault();
	var valid = 1;
	var url=globalPath+"/activity/activityadd";
	var data=$(this).serialize();
	if($("textarea[name='activity']").val().length>200){
	    valid = 0 ;
	    bootbox.alert("Please limit activity to only 200 characters long.");        
	}
	if(valid==1){
		$.post(url,data,function(){

		}).done(function(res){
			if(res['status']==1)
			{
			 	var tmp=[];
			 	var i=0;
			 	$(".activity").each(function(){
			 		tmp[i++]=$(this).val();
			 	});
			 	//console.log(tmp[0]);
			 	$("#activitylist").prepend("<article class=\"media clear each-activity\" style=\"border: 0px;\"><a href=\"#\" class=\"pull-right deleteactivity btn btn-xs btn-danger\" data-id=\""+res['dataid']+"\"><span><i class=\"fa fa-times\"></i> Delete</span></a><a href=\"#\" class=\"pull-right editactivity m-l btn btn-xs btn-info\" data-id=\""+res['dataid']+"\"><i class=\"fa fa-edit\"></i> Edit</a><a class=\"block activity-link\" href=\""+tmp[1]+"\" target=\"_blank\"><p class=\"block activity-desc\">"+tmp[0]+"</p></a></article><div class=\"line line-dashed\"></div>");
			 	$("#activityaddform").trigger('reset');
			 	$("#addActivitiyModal").modal("hide");
			}
			else
			{
				alert("Unable to process your request ! try again later");
			}
		});
	}
});

$("#courseaddform").submit(function(event){
	event.preventDefault();
	var url=globalPath+"/course/courseadd";
	var data=$(this).serialize();
	$.post(url,data,function(){

	}).done(function(res){
		if(res['status']==1)
		{
		 	var tmp=[];
		 	var i=0;
		 	$(".course").each(function(){
		 		tmp[i++]=$(this).val();
		 	});
		 	//console.log(tmp[0]);
		 	$("#courselist").prepend("<article class=\"media clear each-course\"><a href=\"#\" class=\"pull-right deletecourse btn btn-xs btn-danger\" data-id=\""+res['dataid']+"\"><span><i class=\"fa fa-times\"></i> Delete</span></a><a href=\"#\" class=\"pull-right editcourse btn btn-xs btn-info m-l\" data-id=\""+res['dataid']+"\"><i class=\"fa fa-edit\"></i> Edit</a><a class=\"course-link\" href=\""+tmp[2]+"\" target=\"_blank\"><h4 class=\"block course-name dpt-text-dark\">"+tmp[0]+" <span class=\"bt btn-xs btn-info\">View</span></h4></a><p class=\"course-desc\">"+tmp[1]+"</p></article><div class=\"line line-dashed\"></div>");
		 	$("#courseaddform").trigger('reset');
		 	$("#addCourseModal").modal("hide");
		}
		else
		{
			alert("Unable to process your request ! try again later");
		}
	});
});

$("#bookaddform").submit(function(event){
	event.preventDefault();
	var url=globalPath+"/book/bookadd";
	var data=$(this).serialize();
	$.post(url,data,function(){

	}).done(function(res){
		if(res['status']==1)
		{
		 	var tmp=[];
		 	var i=0;
		 	$(".book").each(function(){
		 		tmp[i++]=$(this).val();
		 	});
		 	//console.log(tmp[0]);
		 	$("#booklist").prepend("<article class=\"media clear each-book\"><a href=\"#\" class=\"pull-right deletebook btn btn-xs btn-danger\" data-id=\""+res['dataid']+"\"><span><i class=\"fa fa-times\"></i> Delete</span></a><a href=\"#\" class=\"pull-right editbook btn btn-xs btn-info m-l\" data-id=\""+res['dataid']+"\"><i class=\"fa fa-edit\"></i> Edit</a><h4 class=\"block book-name\">"+tmp[0]+"</h4><p><span class=\"dpt-text-dark\">Authors : </span> <span class=\"book-authors\">"+tmp[1]+"</span></p><p><span class=\"dpt-text-dark\">Publisher : </span> <span class=\"book-publisher m-r\">"+tmp[2]+"</span><span class=\"dpt-text-dark\">Edition : </span><span class=\"book-edition\">"+tmp[3]+"</span></p><p><span class=\"dpt-text-dark\">Year : </span><span class=\"book-year m-r\">"+tmp[4]+"</span><span class=\"dpt-text-dark\">ISBN : </span><span class=\"book-isbn\">"+tmp[5]+"</span></p><p><span class=\"dpt-text-dark\">Details : </span> <span class=\"book-details\">"+tmp[6]+"</span></p></article><div class=\"line line-dashed\"></div>");
		 	$("#bookaddform").trigger('reset');
		 	$("#addBookModal").modal("hide");
		}
		else
		{
			alert("Unable to process your request ! try again later");
		}
	});
});
$(document).on("click", ".deletebook", function(event){
	event.preventDefault();
	var tmp=$(this);
	bootbox.confirm("Are you sure to delete?",function(result){
		if(result)
		{
			var url=globalPath+"/book/bookdelete/"+tmp.attr('data-id');
			$.post(url,{},function(){

			}).done(function(res){
				if(res==1)
				{
					$("#inprofilemessage").html('<div class="container alert alert-warning alert-dismissable error-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Deleted successfully !</div>');
					tmp.parents(".each-book").remove();
				}
				else if(res==0)
				{
					$("#inprofilemessage").html('<div class="container alert alert-warning alert-dismissable error-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Unable to process your request , Try again later !</div>');
				}
				else
				{
					
					$("#inprofilemessage").html('<div class="container alert alert-warning alert-dismissable error-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>It seems to be SESSION OUT ! please refresh the page to continue!</div>');
				}
			});

		}
	});

});

$(document).on("click", ".deleteactivity", function(event){
	event.preventDefault();
	var tmp=$(this);
	bootbox.confirm("Are you sure to delete?",function(result){
		if(result)
		{
			var url=globalPath+"/activity/activitydelete/"+tmp.attr('data-id');
			$.post(url,{},function(){

			}).done(function(res){
				if(res==1)
				{
					$("#inprofilemessage").html('<div class="container alert alert-warning alert-dismissable error-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Deleted successfully !</div>');
					tmp.parents(".each-activity").remove();
				}
				else if(res==0)
				{
					$("#inprofilemessage").html('<div class="container alert alert-warning alert-dismissable error-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Unable to process your request , Try again later !</div>');
				}
				else
				{
					
					$("#inprofilemessage").html('<div class="container alert alert-warning alert-dismissable error-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Unknown Error! Please Contact Support Team</div>');
				}
			});

		}
	});

});

$(document).on("click", ".deletecourse", function(event){
	event.preventDefault();
	var tmp=$(this);
	bootbox.confirm("Are you sure to delete?",function(result){
		if(result)
		{
			var url=globalPath+"/course/coursedelete/"+tmp.attr('data-id');
			$.post(url,{},function(){

			}).done(function(res){
				if(res==1)
				{
					$("#inprofilemessage").html('<div class="container alert alert-warning alert-dismissable error-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Deleted successfully !</div>');
					tmp.parents(".each-course").remove();
				}
				else if(res==0)
				{
					$("#inprofilemessage").html('<div class="container alert alert-warning alert-dismissable error-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Unable to process your request , Try again later !</div>');
				}
				else
				{
					
					$("#inprofilemessage").html('<div class="container alert alert-warning alert-dismissable error-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Unknown Error! Please Contact Support Team</div>');
				}
			});

		}
	});

});
$(document).on("click", ".editbook", function(event){
	$('input[name="editbookname"]').val($(this).parent().find(".book-name").text());
	$('input[name="editbookauthors"]').val($(this).parent().find(".book-authors").text());
	$('input[name="editbookpublisher"]').val($(this).parent().find(".book-publisher").text());
	$('input[name="editbookisbn"]').val($(this).parent().find(".book-isbn").text());
	$('input[name="editbookedition"]').val($(this).parent().find(".book-edition").text());
	$('input[name="editbookyear"]').val($(this).parent().find(".book-year").text());
	$('textarea[name="editbookdetails"]').val($(this).parent().find(".book-details").text());
	$('#editbookform').attr("data-id", $(this).attr("data-id"));
	$("#editBookModal").modal("show");
});

$(document).on("click", ".editactivity", function(event){
	$('textarea[name="editactivitydesc"]').val($(this).parent().find(".activity-desc").text());
	$('input[name="editactivitylink"]').val($(this).parent().find(".activity-link").attr('href'));
	$('[name=editpublishactivity]').filter(function() {
          return ($(this).val() == event.target.attributes['data-publish'].value); //To select Blue
      }).prop('checked', true);
	$('#editactivityform').attr("data-id", $(this).attr("data-id"));
	$("#editActivityModal").modal("show");
});

$("#editactivityform").submit(function(event){
	event.preventDefault();
	var valid = 1;
	var t = $(this);
	var url=globalPath+"/activity/activityedit/"+t.attr("data-id");
	var data=$(this).serialize();
	if($("textarea[name='activity']").val().length>200){
	    valid = 0 ;
	    bootbox.alert("Please limit activity to only 200 characters long.");        
	}
	if( valid == 1){
		$.post(url,data,function(){

		}).done(function(res){
			if(res.status==1)
			{
			 	var p = $(".editactivity[data-id='"+t.attr("data-id")+"'] ").parent(".each-activity"); 
			 	var tmp=[];
			 	var i=0;
			 	$(".updatedactivity").each(function(){
			 		tmp[i++]=$(this).val();
			 	});
			 	if(tmp[1]!=''){
			 		p.find(".activity-desc").remove();
			 		p.append('<a href="'+tmp[1]+'" class="activity-link" target="_blank"><p class="block activity-desc">'+tmp[0]+'</p></a>');
			 	}else{
			 		p.find(".activity-desc").remove();
			 		p.append('<p class="block activity-desc">'+tmp[0]+'</p>');
			 	}
			 	
			 	$("#editactivityform").trigger('reset');
			 	$("#editActivityModal").modal("hide");
			}
			else
			{
				bootbox.alert("Unable to process your request ! try again later");
			}

		});
	}
});

$(document).on("click", ".editcourse", function(event){
	$('input[name="editcoursename"]').val($(this).parent().find(".course-name").text());
	$('textarea[name="editcoursedesc"]').val($(this).parent().find(".course-desc").text());
	$('input[name="editcourselink"]').val($(this).parent().find(".course-link").attr('href'));
	$('#editcourseform').attr("data-id", $(this).attr("data-id"));
	$("#editCourseModal").modal("show");
});

$("#editcourseform").submit(function(event){
	event.preventDefault();
	var t = $(this);
	var url=globalPath+"/course/courseedit/"+t.attr("data-id");
	var data=$(this).serialize();
	$.post(url,data,function(){

	}).done(function(res){
		if(res.status==1)
		{
		 	var p = $(".editcourse[data-id='"+t.attr("data-id")+"'] ").parent(".each-course"); 
		 	var tmp=[];
		 	var i=0;
		 	$(".updatedcourse").each(function(){
		 		tmp[i++]=$(this).val();
		 	});
		 	p.find(".course-name").text(tmp[0]);
		 	p.find(".course-desc").text(tmp[1]);
		 	p.find(".course-link").attr('href', tmp[2]);
		 	
		 	$("#editcourseform").trigger('reset');
		 	$("#editCourseModal").modal("hide");
		}
		else
		{
			bootbox.alert("Unable to process your request ! try again later");
		}

	});
});
$("#editbookform").submit(function(event){
	event.preventDefault();
	var t = $(this);
	var url=globalPath+"/book/bookedit/"+t.attr("data-id");
	var data=$(this).serialize();
	$.post(url,data,function(){

	}).done(function(res){
		if(res.status==1)
		{
		 	var p = $(".editbook[data-id='"+t.attr("data-id")+"'] ").parent(".each-book"); 
		 	var tmp=[];
		 	var i=0;
		 	$(".updatedbook").each(function(){
		 		tmp[i++]=$(this).val();
		 	});
		 	p.find(".book-name").text(tmp[0]);
		 	p.find(".book-authors").text(tmp[1]);
		 	p.find(".book-publisher").text(tmp[2]);
		 	p.find(".book-isbn").text(tmp[3]);
		 	p.find(".book-year").text(tmp[4]);
		 	p.find(".book-edition").text(tmp[5]);		 	
		 	p.find(".book-details").text(tmp[6]);
		 	$("#editbookform").trigger('reset');
		 	$("#editBookModal").modal("hide");
		}
		else
		{
			bootbox.alert("Unable to process your request ! try again later");
		}

	});
});
$(document).on("click", ".deletepublication", function(event){
	event.preventDefault();
	var tmp=$(this);
	bootbox.confirm("Are you sure to delete?",function(result){
		if(result)
		{
			var url=globalPath+"/publication/publicationdelete/"+tmp.attr('data-id');
			$.post(url,{},function(){

			}).done(function(res){
				if(res==1)
				{
					$("#inprofilemessage").html('<div class="container alert alert-warning alert-dismissable error-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Deleted successfully !</div>');
					tmp.parents(".each-publication").remove();
				}
				else if(res==0)
				{
					$("#inprofilemessage").html('<div class="container alert alert-warning alert-dismissable error-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Unable to process your request , Try again later !</div>');
				}
				else
				{
					
					$("#inprofilemessage").html('<div class="container alert alert-warning alert-dismissable error-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>It seems to be SESSION OUT ! please refresh the page to continue!</div>');
				}
			});

		}
	});

});

// $(".editpublication").click(function(event){
$(document).on("click", ".editpublication", function(event){
	$this = $(this);
	$('input[name="editpubtitle"]').val($(this).parent().find(".pub-title").text());
	$('input[name="editauthors"]').val($(this).parent().find(".pub-authors").text());
	$('input[name="edityear"]').val($(this).parent().find(".pub-year").text());
	$('input[name="editvolume"]').val($(this).parent().find(".pub-volume").text());
	$('input[name="editpage"]').val($(this).parent().find(".pub-page").text());
	$('input[name="editdoi"]').val($(this).parent().find(".pub-doi").text());
	$('input[name="editjournal"]').val($(this).parent().find(".pub-journal").text());
	$('[name=editresearchgroup] option').filter(function() { 
          return ($(this).attr('value') == $this.parent().find(".pub-researchgroup").text()); //To select Blue
    }).prop('selected', true);
	if ($(this).parent().find(".pub-file").length){
		$('.pubfilespan').html("You already have a file attached to this publication. If you chose new file old one will be replaced. <br> <a href='"+$(this).parent().find(".pub-file").attr('href')+"' target='_blank' class='dpt-text-dark'>"+$(this).parent().find(".pub-file").attr('href')+"</a>");
	} else {}
	$('#editpublicationform').attr("data-id", $(this).attr("data-id"));
	$('#editpublicationform').attr("action", globalPath+"/publication/publicationedit/"+$(this).attr("data-id"));
	$("#editPublicationModal").modal("show");
});

$("#editpublicationforms").submit(function(event){
	event.preventDefault();
	var t = $(this);
	var url=globalPath+"/publication/publicationedit/"+t.attr("data-id");
	var data=$(this).serialize();
	$.post(url,data,function(){

	}).done(function(res){
		if(res.status==1)
		{
		 	var p = $(".editpublication[data-id='"+t.attr("data-id")+"'] ").parent(".each-publication"); 
		 	var tmp=[];
		 	var i=0;
		 	$(".updatedpublication").each(function(){
		 		tmp[i++]=$(this).val();
		 	});
		 	p.find(".pub-title").text(tmp[0]);
		 	p.find(".pub-authors").text(tmp[1]);
		 	p.find(".pub-year").text(tmp[2]);
		 	p.find(".pub-journal").text(tmp[3]);
			p.find(".pub-volume").text(tmp[4]);
			p.find(".pub-page").text(tmp[5]);
			p.find(".pub-doi").text(tmp[6]);
		 	$("#editpublicationform").trigger('reset');
		 	$("#editPublicationModal").modal("hide");
		}
		else
		{
			bootbox.alert("Unable to process your request ! try again later");
		}

	});
});

// $(".editpublication").click(function(event){
// 	event.preventDefault();
// 	var tmp=$(this);
	
// 	var url=globalPath+"/publication/publicationdelete/"+tmp.attr('data-id');
// 	$.post(url,{},function(){

// 	}).done(function(res){
// 		if(res==1)
// 		{
// 			$("#inprofilemessage").html('<div class="container alert alert-warning alert-dismissable error-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Deleted successfully !</div>');
// 			tmp.parents(".each-publication").remove();
// 		}
// 		else if(res==0)
// 		{
// 			$("#inprofilemessage").html('<div class="container alert alert-warning alert-dismissable error-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Unable to process your request , Try again later !</div>');
// 		}
// 		else
// 		{
			
// 			$("#inprofilemessage").html('<div class="container alert alert-warning alert-dismissable error-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>It seems to be SESSION OUT ! please refresh the page to continue!</div>');
// 		}
// 	});
// });

$("#bookingrequest").click(function(){
	$.get(globalPath+"booking/create",function(){

	}).done(function(data){
		$("#hallbookbody").html(data);
		$("#bookHall").modal('show');
	});
	
});

/***************************************************************/


$("#showmore").click(function(event){
	event.preventDefault();
	$('.showmore').each(function(){
		$(this).css('display','block');
	});
	$(this).parent('div').css('display','none');
});



/* -------- Program View ------------ */
$(document).ready(function()
{
	$(".tabclass:first").addClass('active');
	$(".sem:first").addClass('active');
	
});
$(document).on("click",".viewcourse",function(event){
	event.preventDefault();
	var url=$(this).attr("href");
	var title=$(this).attr("data-coursename");
	$.get(url,function(data){

	}).done(function(data){
		$("#course-name").html(title);
		$("#course_body").html(data);
		$("#courseViewModal").modal("show");
	});
});
$(document).on("click","#viewsyllabus",function(event){
	event.preventDefault();
	var title=$(this).attr('data-title');
	var year=$(this).attr('data-year');
	var sem=$(this).attr('data-sem');
	$.get($(this).attr('data-href'), {'year' :year, 'sem':sem},function(){

	}).done(function(data){
		$("#program-title").html(title);
		$("#syllabus-year").html(year);
		$("#syllabus-sem").html(sem);
		$("#syllabus_body").html(data);
		$("#syllabusViewModal").modal("show");

	});
	
});

/* ---------------------------------- */

/*----------- Research Group ---------- */
$("#searchgroup").on("keyup", function() {
    var value = this.value.toLowerCase();//.trim();
    $(".researchgroup-title").each(function(index) 
    {

        //var name = $row.find("td:nth-child(2)").text().toLowerCase().trim();
        var title = $(this).text().toLowerCase().trim();
        //console.log(name + roll);
        if (title.indexOf(value) == 0) 
        {
            //console.log(name.indexOf(value));
            $(this).parents('.researchgroup').show();
        }
        else 
        {
            //$row.show();
            //console.log(roll.indexOf(value));
            $(this).parents('.researchgroup').hide();
        }
	});
});
/*------------------------------------- */

/* ------------ Document View ----------- */
$(document).on("click",".viewdoc",function(event){
	event.preventDefault();
	var url=$(this).attr('href');
	var title=$(this).attr('data-title');
	$.get(url,function(data){
		//$("#DocViewModal").html('');
	}).done(function(data){
		//$('#DocViewModalTitle').html(title);
		$('#viewdocbody').html(data);
		$("#DocViewModal").modal('show');
	});
});
/*---------------------------------------  */

/* ------------- Student View ------------- */

$("#studentsearch").on("keyup", function() {
    var value = this.value.toLowerCase();//.trim();
    $("#studentlist tr").each(function(index) 
    {
        $row = $(this);
        var name = $row.find("td:nth-child(2)").text().toLowerCase().trim();
        var roll = $row.find("td:last").text().toLowerCase().trim();
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
/* ---------------------------------------- */

/* ------------- User PeopleType ------------- */
$(".each-user").click(function(){
	if($(this).attr('data-href')!=''){
		var url=$(this).attr('data-href');
		//console.log(url);
		window.location.href = url;
	}
});

$("#searchpeople").on("keyup",function() {
    var value = this.value.toLowerCase();//.trim();
    $(".each-user-title").each(function(index) 
    {

        //var name = $row.find("td:nth-child(2)").text().toLowerCase().trim();
        var name = $(this).attr('data-name').toLowerCase().trim();
        var title_name = $(this).text().toLowerCase().trim();
        //console.log(name);
        if (name.indexOf(value) == 0 || title_name.indexOf(value)==0) 
        {
            //console.log(name.indexOf(value));
            $(this).parents('.each-user').show();
        }
        else 
        {
            //$row.show();
            //console.log(roll.indexOf(value));
            $(this).parents('.each-user').hide();
        }
	});
});
/* ------------------------------------------- */

/*-------------------------------------------*/
// btn for import data from .xls
$(document).on("click","#importpublication",function(event){
  event.preventDefault();
  var id = $(this).data('id');
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