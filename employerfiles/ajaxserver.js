
$(function(){
    $("#stats").change(function(){
        var datum = $(this).serialize();
        $.ajax({
            url:"process/ajaxserver2.php",
            method:"post",
            data:datum,
            dataType:"json",
            success:function(res){
                if(res.status==false){
                    $("#view").show()
                    $("#view").html("<div class='alert alert-danger'>"+res.message+"</div>")
                    $("#stats").empty()
                   
                }else{
                    $("#view").show()
                    $("#view").html("<div class='alert alert-success'>"+res.message+"</div>")
                    $("#stats").empty()
                }
               
                
            }
        })
    })
})