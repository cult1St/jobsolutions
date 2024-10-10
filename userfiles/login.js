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
    
})