<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<style>
body {
  margin: 0 auto;
  max-width: 800px;
  padding: 0 20px;
}

.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
.anyClass{
    height: 350px;
    overflow-y: scroll;
}
</style>
</head>
<body>
<nav class="site-header sticky-top py-1">
  <div class="container d-flex flex-column flex-md-row justify-content-between">
    <a class="py-2" href="#" aria-label="Product">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24" focusable="false"><title>Product</title><circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></svg>
    </a>
    <a class="py-2 d-none d-md-inline-block" href="#">Home</a>
    <a class="py-2 d-none d-md-inline-block" href="#">About Us</a>
    <a class="py-2 d-none d-md-inline-block" href="#">Services</a>
    <a class="py-2 d-none d-md-inline-block" href="#">Contact Us</a>
  </div>
</nav>
<h2>Chat Messages -:<?php echo $_GET['roomname'];?></h2>
<div class="anyClass">
<div class="container">
  <img src="/w3images/bandmember.jpg" alt="Avatar" style="width:100%;">
  <p>Hello. How are you today?-</p>
  <span class="time-right">11:00</span>
</div>
</div>
<input type="text" class="form-control" name="usermsg" id="usermsg" placeholder="Add message"/><br>
<button type="button" class="btn btn-primary" name="submitmsg" id="submitmsg">Send</button>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script></body>

<script type="text/javascript">

setInterval(runFunction,1000);
function runFunction(){
    console.log("hi");
    $.post("htcont.php",{room:'<?php echo $_GET['roomname'];?>'},
        function(data,status){
            console.log("hhgh"+data);
            document.getElementsByClassName('anyClass')[0].innerHTML = data
        }
    )
}




var input = document.getElementById("usermsg");
input.addEventListener("keyup",function(event){
    event.preventDefault();
    if(event.keyCode == 13){
        document.getElementById("submitmsg").click();
    }
})

$("#submitmsg").click(function(){
    var clientmsg = $("#usermsg").val();
console.log(clientmsg);
  $.post("postmsg.php", {text:clientmsg,room:'<?php echo $_GET['roomname'];?>',ip:'<?php echo $_SERVER['REMOTE_ADDR']?>'},
  function(data,status){
    document.getElementsByClassName('anyClass')[0].innerHTML = data;
    $("#usermsg").val("");
    return false;
  });
});
</script>
</body>
</html>
