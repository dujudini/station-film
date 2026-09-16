<?php
/* 
Template Name: About 1
*/
get_header(); ?>
<style>

.navbar-dark .navbar-nav .nav-link,.navbar-dark .navbar-nav .nav-link:hover{color: #fff; font-size:16px}
.social a, .social a:visited{color: #fff ; font-size:16px}
.nav-item a:hover,..social a:hover{-ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity=60);filter:alpha(opacity=60);-moz-opacity:0.6;-khtml-opacity:0.6;opacity:0.6}
.navbar-expand-lg .navbar-nav .nav-link {
    padding-right: 1rem;
    padding-left: 1rem;
}
.navbar {

     padding: 0.7rem 0.7rem;
	background-color: #000;

}
.navbar-dark .navbar-nav .nav-link.active,.navbar-dark .navbar-nav .nav-link:hover{color:#F8D700}

.vidcont{
    top: 0px;
	position:relative;
    height: 100vh;
	width:100%;
	overflow:hidden;
}
.dircont{

	position:relative;
	width:100%;
	overflow:hidden;
	min-height:70vh;
	    background-color: #000;
}
.dircontsub{
    max-height:100%;
	padding-top:60px;
	width:100%;
	height:100%;
}
.list-inline-item{
	padding: 0 30px;
}
.nexts{cursor:url(https://cdn.stationfilm.com/img/right.png),auto!important;}
.prevs{cursor:url(https://cdn.stationfilm.com/img/left.png),auto!important;}
.grid-adjust{padding:2px;margin:0;}

.grid-adjust1 a {

text-align:center;
color:#fff;
font-size:1rem;

}
.grid-adjust1 a:hover {

text-align:center;
color:#F8D700;

}
@media only screen and (min-width : 1376px) and (max-width : 1560px) {
.grid-adjust1 a {

text-align:center;

font-size:1rem;

}
    }
@media only screen and (min-width : 1100px) and (max-width : 1375px) {
.grid-adjust1 a {

text-align:center;

font-size:0.8rem;

}
    }
@media only screen and  (max-width : 1099px) {
.grid-adjust1 a {

text-align:center;

font-size:0.5rem;

}
    }
	
.grid-adjust1 a:hover {
text-align:center;

text-decoration:none
}

.lp li{
	min-height: 28px;
    margin: 4px 0 4px 0	;
    background: url(https://beta2019.stationfilm.com/wp-content/themes/station19/img/bgboard.png?v=1);
    background-position: left center;
    background-repeat: space;
    background-repeat-y: no-repeat;
	letter-spacing: 0.52rem;
	max-height:28px;
	line-height: 28px;
}

.footerdown{

background-color:#000;
width:100%;
height:13vh;

}
.footerdown1{
position:relative;
background-color:#000;
width:100%;
height:13vh;
bottom:0;
}
.footland{
position:absolute;
bottom:0;

}
section{	
scroll-snap-align: start;
}
.content-scroll{scroll-snap-type: mandatory;
	scroll-snap-points-y: repeat(100vw);
	scroll-snap-type: x mandatory;}
	.dirlist{
width:100%;position:relative;
z-index:13;
}
.vidall{
	position:relative;
    min-height: 100vh;
	width:100%;
	overflow:hidden;
}
.vcont{
    top: 0px;
	position:absolute;
    height: 100vh;
	width:100%;
	overflow:hidden;
	z-index:12;
	display:none
}
.myvideo {
    position: fixed;
    right: 0;
    bottom: 0;
    min-width: 100%; 
    min-height: 100vh;
	z-index:0
}
 .displays {
                padding: 30px;
                border: 10px solid #ccc;
                background-color: #222;
                border-radius: 30px;
                box-shadow: 0 0 12px 4px #000 inset;
            }
		
.panel {
  background: url("https://beta2019.stationfilm.com/wp-content/themes/station19/img/panel-bg.png") #27282c;
  margin: 0 0 10px 0;
  padding: 10px;
  border-top: 1px solid #46494a;
  text-shadow: #000000 1px 1px 1px;
}
.solari-board-columns, .solari-board-header, .solari-board-rows {
  background: url("https://beta2019.stationfilm.com/wp-content/themes/station19/img/train-panel-bg.png") repeat #262829;
  margin: 0 0 8px 0;
  box-shadow: 1px 1px 3px #000;
  -webkit-box-shadow: 1px 1px 3px #000;
  -moz-box-shadow: 1px 1px 3px #000;
}
.solari-board-rows li{margin-bottom:3px; background:  url("https://beta2019.stationfilm.com/wp-content/themes/station19/img/bgboard.png") 0 0 #000;}
.solari-board-header {
  padding: 10px 15px 10px;
  height: 55px;
}
ul.solari-board-columns {

  height: 31px;
  padding: 5px 1px 11px 17px;
}
ul.solari-board-rows {
  padding: 2px 0 0;
}




li.departure {
  width: 100%;
  list-style: none;
  color:#fff;
}
.dot {
  float: left;
  font-size: 200%;
  margin-top: 3px;
  margin-right: 1px;
  margin-left: 0;
  font-weight: bold;
}
li.board-data {
  padding-left: 15px;
  height: 35px;
  padding-top: 2px;
  clear: left;
  border-bottom: 1px solid #000;
}

#arrivals h1, #departures h1 {
  font-size: 36px;
  text-transform: uppercase;
  padding-top: 10px;
  text-shadow: #000000 1px 1px 1px;
}



.rounded {
  border-radius: 4px;
  -webkit-border-radius: 4px;
  border-radius: 4px;
}

.ellipsis {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
div#ticker-data {
  float: left;
  display:none;
}
div#ticker {
  display:none;
}

.column {
  margin-left: auto;
  margin-right: auto;
  overflow: hidden;
  display: block;
}
.solari-board-rows input{opacity:0}
#point { position:relative; padding-left:2px; padding-right:2px; }
#ampm { font-size:2em; margin-left:2px; }
.col-1-5 {
	flex: 0 0 4.166666%;
    max-width: 4.166666%;
}
	@media only screen and  (max-width : 768px) {
.dircont{

	max-height:none;

}
.footerdownmob{
position:relative;
background-color:#000;
width:100%;
height:13vh;

}
.vidallmob{
	height:auto;
}
    }
.contact{
	background: url(https://beta2019.stationfilm.com/wp-content/themes/station19/img/dirbg.jpg?v=1) repeat top center;
	padding:50px 0;
	}
.office{
	font-family:"bebas", sans-serif;
	color: #fff
}

.office h2{
	color:#fff3b4;
	font-size: 19px;
	font-family: "bdr-mono", sans-serif;
	padding-bottom:15px;
	letter-spacing:9px
	}
.office h3{
	color:#fff;
	font-size: 18px;
	padding-top:20px;
	font-weight:bold;
	letter-spacing:4px
}
.office .staff{
		font-size:12px;
		letter-spacing:1.3px
}
.office .ny .address{
	font-size:14px;
	letter-spacing:1.3px

}
.office .la .address{
	font-size:14px;
	letter-spacing:1.8px
}
.office .global li{
	padding-bottom:5px;
}
.office .global{
	font-size:18px;
}
.representation{
	padding-top:40px;
	font-family:"bebas", sans-serif;
	color: #fff
}
.representation h2{
	width:100%;
	color:#fff3b4;
	font-size: 19px;
	font-family: "bdr-mono", sans-serif;
	padding-bottom:15px;
	letter-spacing:15px
}
.allreps{
	text:transform:uppercase;
}
.allreps h2{
	color:#fff;
	font-size: 17px;
	font-family: "bdr-mono", sans-serif;
	padding-bottom:0;
	letter-spacing:8px;
	}
	.allreps p{
		color:#fff;
		font-size: 17px;
		font-weight:bold;
		letter-spacing:3px;
		margin-bottom:15px
	}
	.allreps li{
		font-size:13px;
		letter-spacing:2.8px
}
.about{
	background: url(https://beta2019.stationfilm.com/wp-content/themes/station19/img/about.png?v=1) no-repeat 101% center / contain;
	padding:25px 0;
	}
	.about h2{
	color:#fff3b4;
	font-size: 18px;
	font-family: "bdr-mono", sans-serif;
	padding-bottom:15px;
	margin-bottom: .5rem;

	}
	.about p{
		font-family:"bebas", sans-serif;
		font-size:14px;
		letter-spacing:2.8px;
		color:#fff;
		text-align: justify;
		text-justify: inter-word;
	}
	.vidall2{
		min-height:unset;
	}
</style>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-black" id="navspy">
    <div class="container-fluid" >
        <a href="<?php echo "//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" class="navbar-brand"><img class="img-fluid" style="max-height:30px" src="https://beta2019.stationfilm.com/wp-content/uploads/2018/11/logo-station.png"></a>
        <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#navbar9">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbar9">
            <ul class="navbar-nav ml-auto" style="text-transform:uppercase;font-weight:bold">
                 <li class="nav-item">
                    <a class="nav-link linkscroll" href="#directors">Directors</a>
                </li>
				<li class="nav-item">
                    <a class="nav-link linkscroll" href="#">Film + TV</a>
                </li>
				<li class="nav-item">
                    <a class="nav-link linkscroll" href="#contact">Contact</a>
                </li>
				<li class="nav-item">
                    <a class="nav-link linkscroll" href="#news">News</a>
                </li>	
            </ul>
        </div>
    </div>
</nav>
<div class="vidall">
	<div class="vidcont section" id="film"> 
		<div style="position:absolute;top:0;bottom:0;left:0;width:15vw;z-index:2;" class="prevs">
			&nbsp;
		</div>	
		<div style="position:absolute;top:0;bottom:0;right:0;width:15vw;z-index:2;" class="nexts">
			&nbsp;
		</div>
	<?php 
	echo do_shortcode('[smartslider3 slider=2]');
	?>
	</div>
	<div class="footland footerdown">
		<div class="social d-flex align-items-center justify-content-center h-100">
			<div class="text-center">
				
				<ul class="list-inline">
					<li class="list-inline-item"> <a href="" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a></li>
					<li class="list-inline-item"> <a href="" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a></li>
					<li class="list-inline-item"> <a href="" target="_blank" aria-label="Twitter"><i class="fab fa-twitter"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="vidall vidall2 vidallmob">
	<div class="dircont d-flex align-items-center section" id="directors"> 
		<div class="dirlist">
			<div class="container-fluid">
				<div class="row">
					<div class="d-none d-md-block col-12 col-md-12 col-xl-12 mx-auto" id="visualgrid">
						<!--Line-->
						<div class="row d-flex justify-content-center align-items-center grid-adjust1" >		
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>				
							<div class="col-1 d-none d-xl-block">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
							<div class="col-1 d-none d-xl-block">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
						</div>
						<!--Line-->
						<div class="row d-flex justify-content-center align-items-center grid-adjust1" >		
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>				
							<div class="col-1 d-none d-xl-block">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
							<div class="col-1 d-none d-xl-block">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
						</div>
						<!--Line-->
						<div class="row d-flex justify-content-center align-items-center grid-adjust1" >		
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>				
							<div class="col-1 d-none d-xl-block">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
							<div class="col-1 d-none d-xl-block">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
						</div>
						<!--Line-->
						<div class="row d-flex justify-content-center align-items-center grid-adjust1" >		
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>				
							<div class="col-1 d-none d-xl-block">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
							<div class="col-1 d-none d-xl-block">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
						</div>
						<!--Line-->
						<div class="row d-flex justify-content-center align-items-center grid-adjust1" >		
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a href="#" class="animaletras d-flex align-items-center justify-content-left">Allen Coulter</a></li>	
								</ul>
							</div>				
							<div class="col-1 d-none d-xl-block">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a href="#" class="animaletras d-flex align-items-center justify-content-left">Jason Perlman</a></li>
								</ul>
							</div>
							<div class="col-1 d-none d-xl-block">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a href="#" class="animaletras d-flex align-items-center justify-content-left">Ramaa Mosley</a></li>
								</ul>
							</div>
						</div>
						<!--Line-->
						<div class="row d-flex justify-content-center align-items-center grid-adjust1" >		
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a href="#" class="animaletras d-flex align-items-center justify-content-left">Brendan Gibbons</a></li>							
								</ul>
							</div>				
							<div class="col-1 d-none d-xl-block">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a href="#" class="animaletras d-flex align-items-center justify-content-left">Jeremy Charbit</a></li>
								</ul>
							</div>
							<div class="col-1 d-none d-xl-block">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a href="#" class="animaletras d-flex align-items-center justify-content-left">Sarah Chatfield</a></li>
								</ul>
							</div>
						</div>
						<!--Line-->
						<div class="row d-flex justify-content-center align-items-center grid-adjust1" >		
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a href="#" class="animaletras d-flex align-items-center justify-content-left " data-video="v3">Chris Balmond</a></li>							
								</ul>
							</div>				
							<div class="col-1 d-none d-xl-block">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a href="#" class="animaletras d-flex align-items-center justify-content-left">Lena Beug</a></li>
								</ul>
							</div>
							<div class="col-1 d-none d-xl-block">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a href="#" class="animaletras d-flex align-items-center justify-content-left">Scott Corbett</a></li>
								</ul>
							</div>
						</div>
						<!--Line-->
						<div class="row d-flex justify-content-center align-items-center grid-adjust1" >		
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a href="#" class="animaletras d-flex align-items-center justify-content-left">dom&nic</a></li>
								</ul>
							</div>				
							<div class="col-1 d-none d-xl-block">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a href="#" class="animaletras d-flex align-items-center justify-content-left">Mark Gilbert</a></li>
								</ul>
							</div>
							<div class="col-1 d-none d-xl-block">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a href="#" class="animaletras d-flex align-items-center justify-content-left">Seyi Peter Thomas</a></li>
								</ul>
							</div>
						</div>
						<!--Line-->
						<div class="row d-flex justify-content-center align-items-center grid-adjust1" >		
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a href="#" class="animaletras d-flex align-items-center justify-content-left">Henry Ssong</a></li>
								</ul>
							</div>				
							<div class="col-1 d-none d-xl-block">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a href="#" class="animaletras d-flex align-items-center justify-content-left">Mathias Hovgaard</a></li>			
								</ul>
							</div>
							<div class="col-1 d-none d-xl-block">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a href="#" class="animaletras d-flex align-items-center justify-content-left">Thomas Beug</a></li>
								</ul>
							</div>
						</div>
						<!--Line-->
						<div class="row d-flex justify-content-center align-items-center grid-adjust1" >		
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a href="#" class="animaletras d-flex align-items-center justify-content-left">James D Cooper</a></li>
								</ul>
							</div>				
							<div class="col-1 d-none d-xl-block">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a href="#" class="animaletras d-flex align-items-center justify-content-left">Peter King</a></li>
								</ul>
							</div>
							<div class="col-1 d-none d-xl-block">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
						</div>
						<!--Line-->
						<div class="row d-flex justify-content-center align-items-center grid-adjust1" >		
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>				
							<div class="col-1 d-none d-xl-block">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
							<div class="col-1 d-none d-xl-block">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
						</div>
						<!--Line-->
						<div class="row d-flex justify-content-center align-items-center grid-adjust1" >		
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>				
							<div class="col-1 d-none d-xl-block">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
							<div class="col-1 d-none d-xl-block">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
						</div>
						<!--Line-->
						<div class="row d-flex justify-content-center align-items-center grid-adjust1" >		
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>				
							<div class="col-1 d-none d-xl-block">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
							<div class="col-1 d-none d-xl-block">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
						</div>
						<!--Line-->
						<div class="row d-flex justify-content-center align-items-center grid-adjust1" >		
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>				
							<div class="col-1 d-none d-xl-block">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
							<div class="col-1 d-none d-xl-block">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a>&nbsp;</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="d-block d-md-none col-12 col-md-12 col-xl-12 mx-auto" id="visualgrid" style="padding:5% 0;">
						<div class="row d-flex justify-content-center align-items-center grid-adjust1" >
							
							
							
							<div class="col-12 col-md-4 col-xl-3">
								<ul class="list-unstyled lp">
									<li><a href="#" class=" d-flex align-items-center justify-content-left changev" data-video="v1">Allen Coulter</a></li>							
									<li><a href="#" class=" d-flex align-items-center justify-content-left changev" data-video="v2">Brendan Gibbons</a></li>							
									<li><a href="#" class=" d-flex align-items-center justify-content-left " data-video="v3">Chris Balmond</a></li>							
									<li><a href="#" class=" d-flex align-items-center justify-content-left">dom&nic</a></li>
									<li><a href="#" class=" d-flex align-items-center justify-content-left">Henry Ssong</a></li>
									<li><a href="#" class=" d-flex align-items-center justify-content-left">James D Cooper</a></li>

									
								
									<li><a href="#" class=" d-flex align-items-center justify-content-left">Jason Perlman</a></li>
									<li><a href="#" class=" d-flex align-items-center justify-content-left">Jeremy Charbit</a></li>
									<li><a href="#" class=" d-flex align-items-center justify-content-left">Lena Beug</a></li>
									<li><a href="#" class=" d-flex align-items-center justify-content-left">Mark Gilbert</a></li>
									<li><a href="#" class=" d-flex align-items-center justify-content-left">Mathias Hovgaard</a></li>			
									<li><a href="#" class=" d-flex align-items-center justify-content-left">Peter King</a></li>
									
									<li><a href="#" class=" d-flex align-items-center justify-content-left">Ramaa Mosley</a></li>
									<li><a href="#" class=" d-flex align-items-center justify-content-left">Sarah Chatfield</a></li>
									<li><a href="#" class=" d-flex align-items-center justify-content-left">Scott Corbett</a></li>
									<li><a href="#" class=" d-flex align-items-center justify-content-left">Seyi Peter Thomas</a></li>
									<li><a href="#" class=" d-flex align-items-center justify-content-left">Thomas Beug</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footerdown1">
		
	</div>
</div>
<div class="vidall vidall2">
	<div class="contact section" id="contact">
		<div class="row">
			<div class="col-10 mx-auto">
				<div class="office d-flex justify-content-between">
					<div class="ny country">
						<h2>NEW YORK</h2>
						<ul class="list-unstyled address">
							<li>37 GREENPOINT AV STE 420</li>
							<li>BROOKLY, NY 11222</li>
							<li>OFFICE:(212)675-2554</li>
							<li>FAX:(212)675-2558</li>
						</ul>
						<h3>STEPHEN ORENT</h3>
						<ul class="list-unstyled staff">
							<li>PARTNER/EXECUTIVE PRODUCER</li>
							<li>SORENT@STATIONFILM.COM</li>
						</ul>
						<h3>MICHELLE TOWSE</h3>
						<ul class="list-unstyled staff">
							<li>EXECUTIVE PRODUCER</li>
							<li>MTOWSE@STATIONFILM.COM</li>
						</ul>
					</div>
					<div class="la country">
						<h2>LOS ANGELES</h2>
						<ul class="list-unstyled address">
							<li>3641 HOLDREGE AV STE C</li>
							<li>LOS ANGELES, CA 90016</li>
							<li>OFFICE:(310)895-7950</li>
							<li>FAX:(310)895-7951</li>
						</ul>
						<h3>CAROLINE GIBNEY</h3>
						<ul class="list-unstyled staff">
							<li>PARTNER/EXECUTIVE PRODUCER</li>
							<li>CGIBNEY@STATIONFILM.COM</li>
						</ul>
						<h3>LETÍCIA GURJÃO</h3>
						<ul class="list-unstyled staff">
							<li>EXECUTIVE PRODUCER</li>
							<li>LETICIA@STATIONFILM.COM</li>
						</ul>
					</div>
					<div class="global">
						<h2>GLOBAL</h2>
						<ul class="list-unstyled">
							<li>BERLIN</li>
							<li>HAMBURG</li>
							<li>TORONTO</li>
							<li>MELBOURNE</li>
						</ul>
					</div>
				</div>
				<div class="representation">
					<h2 class="text-center">Representation</h2>
					<div class="allreps d-flex justify-content-between">
						<div class="ny2">
							<h2>NEW YORK</h2>
							<p>Miss Smith Inc.</p>
							<ul class="list-unstyled address">
								<li>Jamie Scalera</li>
								<li>Sasha Stern</li>
								<li>Julie Margilaj</li>
								<li>+(917)237-6532</li>
							</ul>	
						</div>
						<div class="la2">
							<h2>LOS ANGELES</h2>
							<p>Siobhan McCafferty</p>
							<ul class="list-unstyled address">
								<li>Siobhan McCafferty</li>
								<li>Nikolai Giefer</li>
								<li>+(323)666-6030</li>
							</ul>
						</div>
						<div class="chicago">
							<h2>CHICAGO</h2>
							<p>Obsidian</p>
							<ul class="list-unstyled address">
								<li>Matthew Bucher</li>
								<li>+(630)695-6543</li>
							</ul>
						</div>
						<div class="dallas">
							<h2>DALLAS</h2>
							<p>The Gossip Company</p>
							<ul class="list-unstyled address">
								<li>Alyson Griffith</li>
								<li>+(214)477-8965</li>
							</ul>
						</div>
						<div class="london">
							<h2>LONDON</h2>
							<p>Outsider</p>
							<ul class="list-unstyled address">
								<li>Simon Elborne</li>
								<li>ROBERT CAMPBELL</li>
								<li>RICHARD PARKER</li>
								<li>+44(207)636-666</li>
							</ul>
						</div>
					</div>	
				</div>
				
			</div>
		</div>
	</div>
	<div class="about section" id="about">
		<div class="row">
			<div class="col-10 mx-auto">
				<h2 class="text-center">&nbsp;ABOUT</h2>
				<p>Since its launch in 2008, bicoastal/international Station Film has quickly established itself as one of the industry’s top creative shops. Its roster of award-winning directors excels at cross-platform storytelling - from film, television, and music videos to VR/AR and digital creation. Station Film's partners are Stephen Orent and Caroline Gibney.</p>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>