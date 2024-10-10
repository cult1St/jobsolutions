$(document).ready(function(){
    $(".ff").hover(function(){
       $(this).children("div").slideToggle(100).siblings("a").children("span").toggleClass("fa-xmark")
    })
    $(".login").hide()
    $("#btnnnn1").click(function(){
    $(".login").slideDown(2000)
    $(".signup").slideUp(1500)
    })
    $("#btnnnn").click(function(){
    $(".signup").slideDown(2000)
    $(".login").slideUp(1500)
    })
    $(".secondform").hide()
    $("input[type='text'],input[type='password'],input[type='email']").focus(function(){
    $(this).css({"background-color":"aqua"})
    })
    $("input[type='text'],input[type='password'],input[type='email']").blur(function(){
    $(this).css({"background-color":"white"})
    })
    var functions = ["Accounting, Auditing & Finance",
                       "Admin & Office",
                       "Creative & Design",
                       "Building & Architecture",
                       "Consulting & Strategy",
                       "Customer Service & Support",
                       "Engineering & Technology",
                       "Farming & Agriculture",
                       "Food Services & Catering",
                       "Hospitality & Leisure",
                       "Software & Data",
                       "Legal Services",
                       "Marketing & Communications",
                       "Medical & Pharmaceutical",
                       "Product & Project Management",
                       "Estate Agents & Property Management",
                       "Quality Control & Assurance",
                       "Human Resources",
                       "Management & Business Development",
                       "Community & Social Services",
                       "Sales",
                       "Supply Chain & Procurement",
                       "Research, Teaching & Training",
                       "Trades & Services",
                       "Driver & Transport Services",
                       "Health & Safety"]
    for (var f = 0;f<26;f++) {
       $("#functionss").append("<option value='"+functions[f]+"'>"+functions[f]+"</option>")
       $("#functionsss").append("<option value='"+functions[f]+"'>"+functions[f]+"</option>")
       
    }
    
    
       for (var y = 2; y <= 10; y++) {
           $("#yox").append("<option value='"+y+"'>"+y+"years</option>")
          
       }
       $("#yox").append("<option value='11'>11 years and above</option>")
           
      
           
       for (var d = 1; d <= 31; d++) {
           $("#select2").append("<option value='"+d+"'>"+d+"</option>")
           
           
       }
       var month = $(this).children().val();
       
    
    $(".passbtn").click(function(){
           $(this).attr("type","button")
           $(this).siblings().attr("type","text")
           $(this).hide()
           $(this).siblings("button").show()
            })
    $(".passbtn2").click(function(){
           $(this).attr("type","button")
           $(this).siblings().attr("type","password")
           $(this).hide()
           $(this).siblings("button").show()
    
            })
    $("#nextbtn").click(function(){
    const fname = $("#firstname").val();
    const lname = $("#lastname").val();
    const number = $("#number").val();
    const email = $("#email").val();
    const pass1= $("#pass1").val();
    const pass2= $("#pass2").val();
    const select = $(".firsts").val();
    const select1 = $(".firsts1").val();
    const select2 = $(".firsts2").val();
    const select3 = $(".firsts3").val();
    const select4 = $("#gender").val();
    
    if(fname==""){
        $("#paraone").show()
        $("#firstname").focus()
        }
        else if(lname==""){
            $("#para2").show()
            $("#lastname").focus()
        }else if(number==""||number.length <11){
            $("#para3").show()
            $("#number").focus()
        }else if(email==""){
            $("#para4").show()
            $("#email").focus()
        }else if(pass1==""||pass1.length <8){
            $("#para5").show()
            $("#pass1").focus()
        }else if(pass2==""||pass1!=pass2){
            $("#para6").show()
            $("#pass2").focus()
        }else if (select==""){
            $("#para7").show()
            $(".firsts").focus()
        }else if (select1==""){
            $("#para8").show()
            $(".firsts1").focus()
        }else if (select2==""){
            $("#para9").show()
            $(".firsts2").focus()
        }else if (select4==""){
            $("#para11").show()
            $("#gender").focus()
        }else if (select3==""){
            $("#para10").show()
            $(".firsts3").focus();
        }else{
            $(".secondform").slideDown(1000);
            $(".firstform").slideUp(1000)
            $("p").hide()
        }
        
    
   
    
    
    
    })
    $("#prevbtn").click(function(){
        $(".firstform").slideDown(1000);
            $(".secondform").slideUp(1000)
    })
    $("#agree").click(function(){
        var agreed = $(this).prop("checked");
   if (agreed) {
        
        $("#submiting").removeAttr("disabled")
   }else{
    $("#submiting").attr("disabled")

   }
   $("#submiting").click(function(){
   
        $(this).attr("type","submit")
        
  
   })
    
    })
    $("#looginbtn").click(function(){
        var username = $("#username").val();
        var password = $("#password").val();
        if(username==""){
            $("#para1").show();
            $("#username").focus();
        }else if(password==""){
            $("#paratwo").show();
            $("#password").focus();
        }else{
            $(this).attr("type","submit")
        }
    })
})
   
    