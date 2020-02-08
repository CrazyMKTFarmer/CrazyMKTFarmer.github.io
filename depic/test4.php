
<!DOCTYPE html>
<html lang="en-US" class="no-js">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

<title>Spinbot - A Free Article Spinner, Article Rewriter Tool Online</title>
<meta name="description" content="Spinbot - A 100% Free Article Spinner,  best article rewriter Tool Online for webmasters and Bloggers. This Best word Spinner (Spin bot) Spinbolt tool is to create unique article by  rewriting sentences with Free article spinbot.com." />
<meta name="keywords" content="article spinner, article spinbot, spin bot, rewriter, article, spinbolt" />

<!-- Mobile viewport -->
<meta name="viewport" content="width=device-width; initial-scale=1.0" />

<link rel="shortcut icon" href="images/favicon.ico"  type="image/x-icon" />

<!-- CSS-->
<!-- Google web fonts. You can get your own bundle at https://www.google.com/fonts. Don't forget to update the CSS accordingly!-->
<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic|Oswald:400,300' rel='stylesheet' type='text/css'>
<link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css' />
<link rel="stylesheet" href="https://freearticlespinbot.com/css/normalize.css" />
<link rel="stylesheet" href="https://freearticlespinbot.com/css/theme.css" />
<link
rel="canonical" href="https://freearticlespinbot.com/" />

<!-- end CSS-->
    
<!-- JS-->
<script src="https://freearticlespinbot.com/js/libs/modernizr-2.6.2.min.js"></script>
<!-- end JS-->


<!-- Style -->
<style type="text/css">
<!--
@media only screen and (min-width : 10px) and (max-width : 380px) {
#imagever
{
    margin-left: 0;
}
}
@media only screen and (min-width : 10px) and (max-width : 800px) {
.sp_grid_1
{
    width:25%;
    float: left;
    content: "";
    display: table;
    margin: 0 0 30px 0;
}
.sp_grid_2
{
    width:45%;
    float: left;
    content: "";
    display: table;
    margin: 0 0 30px 0;

}
.sp_grid_2 .imagever
{
    border: 4px solid #FFFFFF;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.3), 0 0 30px rgba(0, 0, 0, 0.2) inset;
    transition: box-shadow 0.2s ease 0s;
}
.sp_grid_3
{
    float: left;
    content: "";
    display: table;
    margin: 0 0 30px 0;
}
}
.callout.callout-danger {
    background-color: #F2DEDE;
    border-color: #DFB5B4;
}
.callout.callout-success {
    background-color: #DFF0D8;
    border-color: #D6E9C6;
}
.callout {
    border-left: 5px solid #EEEEEE;
    margin: 0 0 20px;
    padding: 6px 3px 1px 15px;
}
.callout.callout-danger h4 {
    color: #B94A48;
}
.callout.callout-success h4 {
    color: #3C763D;
}
.callout h4 {
    margin-top: 0;
}
#lcontent{
    display:none;
}
#preloader{
    display:none;
}
#failed
{
    display:none;
}
#success{
    display:none;
}
#try_new{
    display:none;
}
.nav-item {
    line-height: 28px;
}
dd {
    margin-left: 0;
}
.nav-item  a {
    color: #AAB2BD;
    text-decoration: none;
}
@media only screen and (min-width : 801px) and (max-width : 1780px) {
.sp_grid_1
{
    width:25%;
    float: left;
    content: "";
    display: table;
    margin: 0 0 30px 0;
}
.sp_grid_2
{
    width:45%;
    float: left;
    content: "";
    display: table;
    margin: 0 0 30px 0;
    

}
.sp_grid_2 .imagever
{
    margin-top:-11px;
    border: 4px solid #FFFFFF;
    border-radius: 5px;
    float: right;
    transition: box-shadow 0.2s ease 0s;
}
.sp_grid_3
{
    float: left;
    content: "";
    display: table;
    margin: 9px 0 30px 0;
    margin-left: 50px;
}
#lcontent
{
    margin-bottom:360px;
}
#preloader
{
    padding: 260px;
    margin-bottom:230px;
}
}
-->
</style>

<script>
function tryAgain(){
    showLoading();
    $("#spin_new").show();
    $("#try_new").hide();
    $("#imagever").show();
    $("#failed").hide();
    $("#lcontent").hide();
    $("#index_content").show();
    hideLoading();
}
function showLoading() {
    $("#preloader").show();
    $("#index_content").hide();
    $("#lcontent").hide();
}
function hideLoading() {
    $("#preloader").hide();
}
function loadXMLDoc()
{
var xmlhttp;
var strr = jQuery("textarea#message").val();
var capc = $('input[name=scode]').val();
var la = $('select[id=lang]').val();
if (strr == "")
{
    alert('Enter the article to spin!');
    return false;
}
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    }
  }
showLoading();
$.post("php/verify.php", {scode:capc}, function(results){
if (results == 1) {
$.post("php/process.php", {data:strr,lang:la,scode:capc}, function(results){
    hideLoading();
    $("#spin_new").hide();
    $("#try_new").show();
    $("#try_again").hide();
    $("#imagever").hide();
    $("#success").show();
    $("#lcontent").show();
    $('#content').val(results);
});
}
else
{
    hideLoading();
    $("#spin_new").hide();
    $("#try_new").show();
    $("#imagever").hide();
    $("#failed").show();
    $("#lcontent").show();
    $('#content').val(strr);
}
});
}
</script>






<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144832273-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-144832273-1');
</script>


</head>


<body id="home">
<!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> or <a href="https://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
<!-- header area -->
 
		
		<!-- #topnav -->
  
    </header><!-- end header -->
 
 
<!-- hero area (the grey one with a slider) -->
    <section id="hero" class="clearfix">    
    
    
    
    <div class="wrapper">
        
        
<div>


</div>


    <br />
        <div id="index_content">
        		<!-- responsive FlexSlider image slideshow -->
        <textarea style="width: 100%;
    height: 370px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    color: #666666;
    border: 0 none;
    border-radius: 4px;
    box-shadow: 0 0 0 0.5em #FFFFFF;
    background: url(https://freearticlespinbot.com/images/note.png) repeat;
    font: normal 14px verdana;
    line-height: 25px;
    padding: 2px 10px;
    border: solid 1px #ddd;
    transition: all 0.1s ease-in-out 0s;
    animation-delay: 250ms;
    animation-name: slideInRight;
    animation-duration: 1s;
    animation-fill-mode: both;" id="message"></textarea>
                </div><!-- end grid div -->
                
                <div id="preloader" style="text-align:center;padding: 10px 0 0 0;">
                <img src="https://freearticlespinbot.com/images/loading.gif" alt="loading" />
                </div>
                
                        <div id="lcontent">
        		<!-- responsive FlexSlider image slideshow -->
        <textarea style="width: 100%;
    height: 370px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    color: #666666;
    border: 0 none;
    border-radius: 4px;
    box-shadow: 0 0 0 0.5em #FFFFFF;
    background: url(https://freearticlespinbot.com/images/note.png) repeat;
    font: normal 14px verdana;
    line-height: 25px;
    padding: 2px 10px;
    border: solid 1px #ddd;
    transition: all 0.1s ease-in-out 0s;
    animation-delay: 250ms;
    animation-name: slideInRight;
    animation-duration: 1s;
    animation-fill-mode: both;" id="content"></textarea>
         
                      </div><!-- end grid div -->
                
<div>


</div>


<br /><br />
<div class="sp_grid_1"> 
<b>Language:</b>
<select class="form-control" id="lang">

  <option value="in">Indonesian</option>
</select> 

</div>

  <div class="sp_grid_2">

<div id="imagever">
  </div>
       <div id="failed">
       <div class="callout callout-danger">
        <h4>Oh No!</h4>
       <p>Captcha Code is Wrong.</p>
       </div>
       </div>
    <div id="success">
       <div class="callout callout-success">
        <h4>Wowww Success!</h4>
       <p>Your document successfully spinned.</p>
       </div>
       </div>
       </div>
       <div class="sp_grid_3">
       <div id="try_new">
       <a href="index.php" class="buttonlink">Try New Document</a> 
       <a class="buttonlink" onclick="tryAgain()" id="try_again" href="#">Try Again</a>
       </div>
       <div id="spin_new">
            <a href="#" onclick="loadXMLDoc()" class="buttonlink">Spin</a> <a href="https://freearticlespinbot.com/index.php" class="buttonlink">Reset</a>
       </div>
       </div>
       <br />       <br />
        </div><!-- end .wrapper div -->
    </section><!-- end hero area -->


        </div>
        
        </div>
   	  



                <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '', 'auto');
  ga('send', 'pageview');

</script>


<!-- Default Statcounter code for Freearticlespinbot.com
https://freearticlespinbot.com/ -->
<script type="text/javascript">
var sc_project=11235447; 
var sc_invisible=1; 
var sc_security="aab93f6b"; 
</script>
<script type="text/javascript"
src="https://www.statcounter.com/counter/counter.js"
async></script>
<noscript><div class="statcounter"><a title="Web Analytics
Made Easy - StatCounter" href="https://statcounter.com/"
target="_blank"><img class="statcounter"
src="//c.statcounter.com/11235447/0/aab93f6b/1/" alt="Web
Analytics Made Easy - StatCounter"></a></div></noscript>
<!-- End of Statcounter Code -->

<script type='text/javascript' src='https://stats.wp.com/e-201826.js' async='async' defer='defer'></script>
<script type='text/javascript'>
	_stq = window._stq || [];
	_stq.push([ 'view', {v:'ext',j:'1:6.2.1',blog:'148296324',post:'1',tz:'0',srv:'blog.freearticlespinbot.com'} ]);
	_stq.push([ 'clickTrackerInit', '148296324', '1' ]);
</script> 

</footer><!-- footer area end-->  

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="https://freearticlespinbot.com/js/libs/jquery-1.9.0.min.js">\x3C/script>')</script>

<!-- fire ups - read this file!  -->   
<script src="https://freearticlespinbot.com/js/main.js"></script>

</body>
</html>
