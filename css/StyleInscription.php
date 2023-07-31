<?php 
    header("content-type: text/css; charset:UTF-8");
?>
* {
  margin:0;
  padding:0;
}
body{
  background-color:white;
  background-position:center;
  background-size:cover;
}
.main{
  width:100%;
  height:109vh;
}

.content{
  width:1200px;
  height:auto;
  margin:auto;
  color:rgb(15, 15, 15);
  position:relative;
}
.content{
  padding-left:20px;
  padding-bottom:25px;
  font-family:arial;
  letter-spacing:1.2px;
  line-height:30px;
}
.side{
  margin-left:160px;
}
.content h1{
  font-family:sans-serif;
  font-size:60px;
  padding-left:50px;
  margin-top:7.5%;
  letter-spacing:2px;
  height: 120px;
  color:rgb(3, 195, 243);
}
span{
  padding-left:60px;
}
.form{
  width:250px;
  height:450px;
  background:linear-gradient(to top right,rgba(167, 234, 243, 0.8),rgba(10, 94, 221, 0.8));
  position:absolute;
  top:-20px;
  left:870px;
  border-radius:10px;
  padding:25px;
}
.form h2{
  width:220px;
  font-family:sans-serif;
  text-align:center;
  color:#ffffff;
  font-size:22px;
  border-radius:10px;
  margin:2px;
  padding:8px;
}
.form input{
  width:240px;
  height:35px;
  background:transparent;
  border-bottom:1px solid #ffffff;
  border-top:none;
  border-right:none;
  border-left:none;
  color:white;
  font-size:15px;
  letter-spacing:1px;
  margin-top:30px;
  font-family:sans-serif;
}
.form input:focus{
  outline:none;
}
::placeholder{
  color:white;
  font-family:arial;
}
.btnn{
  width:240px;
  height:40px;
  background:rgb(3, 195, 243);
  border:none;
  font-size:18px;
  border-radius:10px;
  margin-top: 20px;
  cursor:pointer;
  color:white;
  transition:0.4s ease;
}
.btnn:hover{
  background:#044deb;
  color:#ffffff;
}
.btnn a{
  text-decoration:none;
  color:rgb(255, 255, 255);
  font-weight:bold;
}