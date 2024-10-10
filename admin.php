<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="images/logo">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    
    <title>Admin Page</title>
    <style>
        body{
            background: linear-gradient(45deg, rgb(203, 207, 240), rgb(229, 229, 246));
        }
        #hidenavbtn2{
            display: none;
        }
       
           /* border: 1px solid red;*/
        
        .linkp div span a{
            text-decoration: none;
            color: rgb(81, 79, 79);
        }
        .cont{
            background-color: white;
            margin: 10px;
            margin-left: 10px;
            margin-right: 10px;
            border-radius: 20px;
            border: 1px solid blue;
            min-height: 100px;
            min-width: 50px;
            box-shadow: 5px 5px 5px grey;

        }
        .cont h4{
            color: blueviolet;
            text-align: center;
        }
        .cont h5{
            color: blue;
            text-align: center;
        }
        .adminnav{
            background-color: white;
           
            margin-top: 20px;
            text-align: center;
            position: fixed;
            width: 200px;
            
            
        }
        .adminnav li{
            list-style-type: none;
            margin-bottom: 10px;
            
            
        }
        .adminnav li a{
            text-decoration: none;
            color: black;
            font-size: 20px;
        }
        .navigation{
            margin-top: 20px;
            background-color: aliceblue;
            position: fixed;
            
        }
        .navlinks ul{
            list-style-type: none;

        }
        .navlinks ul li a{
            text-decoration: none;
            color: blue;
          
            border-radius: 30px;
            height: 100px;


        }
        .navlinks ul li{
            animation: 4s ease-in forwards;
        }
        .navlinks ul li a:hover {
            background-color: grey;
        }
        .navlinks ul li a div{
            min-height: 50px;
        }
        .navlinks ul li a div span{
            margin: 10px;
        }
        .headingnav h1 span{
            margin: 10px;
        }
        .navtxttoggle{
            animation: 8s ease-in-out forwards;
            transform: rotateX(90deg);
            display: none;
        }
        @media all and (max-width:1121px){
            .navtxt{
                display: none;
            }
            #hidenavbtn1{
                display: none;
            }
            #hidenavbtn2{
                display: inline-block;
            }
        }
        @media all and (max-width:380px){
            .navtxt{
                display: none;
                position: inherit;
            }
        }
        
    </style>
   
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="row">
                <div class="col-3">
                    <div class="navigation ">
                        <div class="headingnav bg-light">
                            <h1 class="text-secondary"><span class="fa fa-user"></span><span class="navtxt">Menu</span></h1>
                        </div>
                        <div class="navlinks">
                            <ul>
                                <li>
                                    <a href=""><div><span class="fa fa-user"></span><span class="navtxt">User Management</span></div></a>
                                </li>
                                <li>
                                    <a href=""><div><span class="fa fa-user"></span><span class="navtxt">Application</span></div></a>
                                </li>
                                <li>
                                    <a href=""><div><span class="fa fa-user"></span><span class="navtxt">Forms</span></div></a>
                                </li>
                                <li>
                                    <a href=""><div><span class="fa fa-user"></span><span class="navtxt">Application builder</span></div></a>
                                </li>
                                <li>
                                    <a href=""><div><span class="fa fa-user"></span><span class="navtxt">Admins</span></div></a>
                                </li>
                                <li>
                                    <a href=""><div><span class="fa fa-user"></span><span class="navtxt">Job Applications</span></div></a>
                                </li>
                                <li>
                                    <a href=""><div><span class="fa fa-user"></span><span class="navtxt">Employers Chatting Mails</span></div></a>
                                </li>
                                <li>
                                    <a href=""><div><span class="fa fa-exit"></span><span class="navtxt">Log Out</span></div></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="row admin-header">
                        
                        <div class="col-12">
                            <nav class="navbar navbar-expand-lg ">
                                <div class="container-fluid">
                                    <button type="button" id="hidenavbtn1" class="btn btn-secondary"><span class=" fa fa-bars"></span></button>
                                    <button type="button" id="hidenavbtn2" class="btn btn-secondary" ><span class=" fa fa-bars"></span></button>

                                  
                                    <div class="input-group bg-light">
                                        <form class="d-flex" role="search">
                                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                            <button class="btn btn-outline-primary" type="submit"><span class="fa fa-search"></span></button>
                                          </form>
                                
                                  </div>
                                  <div>
                                    <span id="notification count">1</span>
                                    <button class="btn btn-outline-info" style="border-radius: 50%;" data-bs-toggle="modal" data-bs-target="#exampleModal"></span><span class="fa fa-bell" style="float: left;"></button>
                                  </div>
                                  
                                </div>
                            </nav>
                        
                    </div>
                </div>
                <div class="row linkp">
                    <div class="col">
                        <span><h1>Dashboard</h1></span><span><a href="#">Home</a>/ <a href="#">application Overview</a></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 cont">
                        <h3>Top Employers</h3>
                        <table class="table table-striped">
                            <tr>
                                <th>Id</th>
                                <th>Company Name</th>
                                <th>No. of Jobs Posted</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>JJ Furnitures</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>JJ Furnitures</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>JJ Furnitures</td>
                                <td>5</td>
                            </tr>
                        </table>
                        <a href="#" style="text-decoration: none; color: green;">See More ...</a>
                    </div>
                </div>
                <div class="row admin-body">
                    <div class="col-5 col-md-3 cont card card-primary">
                       <div class="card-fluid" style="display: flex; flex-direction: column; justify-content: center;">
                        
                        <h4>No. Of Users</h4>
                        <h5 class="users">0</h5>
                       </div>
                    </div>
                    <div class="col-5 col-md-3 cont">
                        <div class="card-fluid" style="display: flex; flex-direction: column; justify-content: center;">
                        
                            <h4>No. Of Job Seekers</h4>
                            <h5 class="users">0</h5>
                           </div>
                    </div>
                    <div class="col-5 col-md-3 cont">
                        <div class="card-fluid" style="display: flex; flex-direction: column; justify-content: center;">
                        
                            <h4>No. Of Employers</h4>
                            <h5 class="users">0</h5>
                           </div>
                    </div>
                    <div class="col-5 col-md-3 cont">
                        <div class="card-fluid" style="display: flex; flex-direction: column; justify-content: center;">
                        
                            <h4>No. Of Applications</h4>
                            <h5 class="users">0</h5>
                           </div>
                    </div>
                    <div class="col-5 col-md-3 cont">
                        <div class="card-fluid" style="display: flex; flex-direction: column; justify-content: center;">
                        
                            <h4>No. Of Job applications closed</h4>
                            <h5 class="users">0</h5>
                           </div>
                    </div>
                    <div class="col-5 col-md-3 cont">
                        <div class="card-fluid" style="display: flex; flex-direction: column; justify-content: center;">
                        
                            <h4>No. Of Job Applications Opened</h4>
                            <h5 class="users">0</h5>
                           </div>
                    </div>

                </div>
            </div>
        </div>
            
        </div>
    
    </div>
    



    
    
    
    
    
    
    
   



      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      

      <script>
        // window.addEventListener('DOMContentLoaded', event => {
        //     const slideToggle = document.querySelector("#hidenavbtn1");
        //     slideToggle.addEventListener('click', event => {
        //         document.querySelector(".navtxt").classList.toggle("navtxttoggle");
        //         //document.getElementById("#hidenavbtn2").style="display:inline;";
        //         alert("Hello World");
        //     })
        // })
      </script>
    
    <script src="jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".navigation").children("div").children("ul").children("li").hover(function(){
                $(this).toggleClass("bg-secondary")
            })
            $("#hidenavbtn1").click(function(){
                $(".navtxt").hide(1000);
                $(".navigation").parent().css("width","100px");
                $(this).hide();
                $("#hidenavbtn2").show();
                
                
            })
            $("#hidenavbtn2").click(function(){
                $(".navtxt").show(1000);
                $(".navigation").parent().css("width","");
                $(this).hide();
                $("#hidenavbtn1").show();
                
                
            })
        
         })
    </script>


    <script src="bootstrap/js/bootstrap.min.js"></script>
   
</body>
</html>