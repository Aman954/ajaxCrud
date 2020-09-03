$("#succ").hide();
$("#err").hide();
var loading=()=>{
$.ajax({
         
         url:"load.php",
         type:"POST",
         success:(data)=>{

                       $("#getRecord").html(data);

                       }

});
}

loading();


$("#submit").on("click",function(e)
{
e.preventDefault();
var in1=$("#fname").val();
var in2=$("#lname").val();
if(in1==""||in2=="")
{
    $("#err").html("Please! fill all fields").slideDown('slow');
    setTimeout(function()
    {
       $("#err").slideUp('slow');
    },2000);
    $("#succ").slideUp();
}
else{


$.ajax({
        
         url:"insert.php",
         type:"POST",
         data:{fname:in1,lname:in2},
         success:data=>{
             if(data==1)
             {
                 loading();               
                 $("#succ").html("Successfully saved!").slideDown('slow');
                 setTimeout(function()
                 {
                    $("#succ").slideUp('slow');
                 },2000);
                 $("#err").slideUp();
                 $("#trp").trigger("reset",true);
             }
             else 
             {
                $("#err").html("Something wrong!").slideDown('slow');
                $("#succ").slideUp();
             }
         }


});
}

});


$(".over").hide();


$(document).on("click",".ed",function(e)
{
    e.preventDefault();
    var idd=$(this).data("id");
    $.ajax({
   
        url:"update.php",
        type:"POST",
        data:{eid:idd},
        success:data=>{
            if(data)
            {
              $("#set").html(data);
            }
            else
            {
                alert("something wrong");
            }
        }
    
     });
      
     $(".over").fadeIn('slow');
     

     $(document).on("click","#update",function(e)
     {
       e.preventDefault();  
      var ufname=$("#ufname").val();
      var ulname=$("#ulname").val();
      var idt=$(this).data("vid");

      $.ajax({

               url:"up.php",
               type:"POST",
               data:{uf:ufname,ul:ulname,cd:idt},
               success:data=>{
                   if(data==1)
                   {
                    loading();
                    $("#succ").html("Updated Successfully!").slideDown('slow');
                    setTimeout(function()
                    {
                       $("#succ").slideUp('slow');
                    },2000);
                    $("#err").slideUp();
                    $(".over").fadeOut("fast");
                    
                   }
                   else
                   {
                    $("#err").html("Something wrong!").slideDown('slow');
                    $("#succ").slideUp();
                   }


               }
            });



      });   



    
});


$(document).on("click",".close",function()
{

$(".over").fadeOut('slow');


});


$(document).on("click",".del",function(e)
{
 e.preventDefault();
 let con=$(this).data("did");
 var el=this;
 $.ajax({
    url:"delete.php",
    type:"POST",
    data:{di:con},
    success:data=>{
        if(data==1)
        {
            $(el).closest("tr").fadeOut('slow');
            $("#succ").html("Deleted Successfully!").slideDown('slow');
            setTimeout(function()
            {
               $("#succ").slideUp('slow');
            },2000);
            $("#err").slideUp();
        }
        else{
            $("#err").html("Something wrong!").slideDown('slow');
            $("#succ").slideUp();
        }

    }
 });
});


$("#search").on("keyup",function()
{
   let getval=$(this).val();
    $.ajax({

          url:"search.php",
          type:"POST",
          data:{getv:getval},
          success:data=>{
                        $("#getRecord").html(data);
                        }

         

    });

});


$(document).on('click','.go',function(e){

e.preventDefault();

let getno=$(this).data("page");
let rt=this;
$.ajax({

 url:"load.php",
 type:"POST",
 data:{page:getno},
 success:(data)=>{
     $("#getRecord").html(data);
 }


});




});