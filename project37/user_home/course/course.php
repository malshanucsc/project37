<!DOCTYPE html>
<html>
<style>
body {
    font-family: "calibri", sans-serif;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s
}

.sidenav a:hover, .offcanvas a:focus{
    color: #f1f1f1;
}

.closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px !important;
    margin-left: 50px;
}

#main {
    transition: margin-left .5s;
    padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.iframe{display:none;}


</style>

<script>
function ifr(id1){
//var e2 = document.getElementById(id2);
var e = document.getElementById(id1);


 e.style.display = 'block';


}

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
}
</script>


<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">x</a>
  <a href="#">Modules</a>
  <a href="#">Quizzes</a>
  <a onclick="ifr('ivf1');" href="../../assignment.php" target="iframe_b">Assignments</a>
  <a href="#">Performance</a>
</div>

<div id="main">
 
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">Menu</span>
<p>This is course page</p>
<hr>


<div ><iframe id ="ivf1" class="overlay" width="100%" scrolling="no" frameborder="0" height="900px" src="" onload="this.style.height=this.contentDocument.body.scrollHeight +'px';" name="iframe_b"></iframe>

<div ><iframe id ="ivf2" class="overlay" width="100%" scrolling="no" frameborder="0" height="900px" src="" onload="this.style.height=this.contentDocument.body.scrollHeight +'px';" name="iframe_d"></iframe>

</div>

</div>

     
</body>
</html> 
