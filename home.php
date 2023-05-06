<?php
require_once "config.php";
session_start();

  $role_id = $_SESSION['role_id'];

    $song_name = array();
	$audio_id = array();
	$image_id = array();
	$audio_file = array();
	$image_file = array();
	$user_id = array();
	$artist_name = array();

	static $i = 0;

	$sql = "SELECT * FROM upload_songs";

	$result = mysqli_query($link,$sql);
	while($data = mysqli_fetch_array($result)){
		
        $song_name[$i] = $data['song_name'];
		$audio_id[$i] = $data['song_audio_id'];
		$image_id[$i] = $data['song_image_id'];
        $user_id[$i] = $data['user_id'];
		$i++ ;
	}

	$i--;

	$arrlength = count($song_name);

	for($x = 0; $x < $arrlength; $x++) {
		$result = mysqli_query($link , "SELECT * FROM songs_audio where id='$audio_id[$x]'");
		
	   	while($row = mysqli_fetch_array($result)){

			$audio_file[$x] = $row['song_audio'];
		}

		$result = mysqli_query($link , "SELECT * FROM songs_image where id='$image_id[$x]'" );

		while($row1 = mysqli_fetch_array($result)){

			$image_file[$x] = $row1['song_image'];
		}

		$result = mysqli_query($link , "SELECT * FROM login where id='$user_id[$x]'" );

		while($row1 = mysqli_fetch_array($result)){

			$artist_name[$x] = $row1['username'];
		}

	}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Home</title>
	<!-- Description, Keywords and Author -->
	<meta name="description" content="Your description">
	<meta name="keywords" content="Your,Keywords">
	<meta name="author" content="HimanshuGupta">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Styles -->
	<!-- Bootstrap CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Animate CSS -->
	<link href="css/animate.min.css" rel="stylesheet">
	<!-- Basic stylesheet -->
	<link rel="stylesheet" href="css/owl.carousel.css">
	<!-- Font awesome CSS -->
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="css/style.css" rel="stylesheet">
	<link href="css/style-color.css" rel="stylesheet">

</head>

<body>

	<!-- primary menu -->
	<nav class="navbar navbar-fixed-top navbar-default">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
					data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- logo area -->
				<a class="navbar-brand" href="#">
					<!-- logo image -->
					<img class="img-responsive" src="img/logo/logo45.jpeg" alt="" style="height:100px;width:100px;border-radius:60%;" />
				</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<h1 style="color:white; font-family: Perpetua; font-size: 40px;">Music Album</h1>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#latestalbum" style="font-size: 20px;">New Releases</a></li>
					<li><a href="#featuredalbum" style="font-size: 20px;">Artists</a></li>
					
					<li><a href="vp.php" style="font-size: 20px;">Profile</a></li>
					<li><a href="artist.php" style="font-size: 20px;" ><?php if($role_id == 2){ ?> Upload Song  <?php } ?></a></li>
				
					<li><a href="userallprofile.php" style="font-size: 20px;" ><?php if($role_id == 3){ ?> All Profile  <?php } ?></a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>

	<!---#######################################################################################################################################################-->
	<!---#######################################################################################################################################################-->
	<!---#######################################################################################################################################################-->

	<!-- banner area -->
	<div class="banner">
		
				</div>
			</div>

			<!--##############################################################################################################################-->
			<!--#############################################################################################################################-->
			<!--#############################################################################################################################-->

			
		</div>
	</div>
	<!--/ banner end -->

	<!-- block for animate navigation menu -->
	<div class="nav-animate"></div>

	<!-- Hero block area -->
	<div id="latestalbum" class="hero pad">
		<div class="container">
			<!-- hero content -->
			<div class="hero-content ">
				<!-- heading -->
				<h2><b><i>New Releases</i></b></h2>
				<hr color="#a9a9a9">
				<!-- paragraph -->
				
			</div>
			<!-- hero play list -->
			<div class="hero-playlist">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<!-- music album image -->
						<div class="figure">
							<!-- image -->
							<a href="veiwsong.php?id=<?php echo $i; ?>"><img class="img-responsive" alt="" src="upload_image/<?php echo $image_file[$i]?>" height="430" width="430"> </a>
	
						</div>
						<!-- album details -->
						<div class="album-details">
							<!-- title -->
							<h4><?php echo $song_name[$i]; ?></h4>
							<!-- composed by -->
							<h5>By <?php echo $artist_name[$i]; ?></h5>
							<!-- button -->
							<audio controls>
								<a href="#" class="btn btn-lg btn-theme" id="playNowBtn"><i
										class="fa fa-play"></i>&nbsp; Play Now</a>
							<source src="<?php echo 'upload_audio/'.$audio_file[$i] ;?>" type="audio/mpeg">
							</audio>  <?php $i--; ?>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<!-- play list -->
						<div class="playlist-content">
							<ul class="list-unstyled">
								<li class="playlist-number">
									<!-- song information -->
									<div class="song-info">
										<!-- song title -->
										<h4>
										<a href="veiwsong.php?id=<?php echo $i; ?>"><img src="upload_image/<?php echo $image_file[$i]?>" height="85" width="85"></a>
												<b><i>&emsp;<?php echo $song_name[$i]; ?> &emsp;</i></b>&emsp; <b>|&emsp;
												Singer:</b>&emsp;<?php echo $artist_name[$i];?> </h4>
									</div>
									<!-- music icon -->
									<audio controls>
										<a href="#" class="btn btn-lg btn-theme" id="playNowBtn"><i
												class="fa fa-play"></i>&nbsp; Play Now</a>
												<source src="<?php echo 'upload_audio/'.$audio_file[$i] ;?>" type="audio/mpeg">
									</audio><?php $i--; ?>

									<div class="clearfix"></div>
								</li>
								<li class="playlist-number">
									<!-- song information -->
									<div class="song-info">
										<!-- song title -->
										<h4>
										<a href="veiwsong.php?id=<?php echo $i; ?>"><img src="upload_image/<?php echo $image_file[$i]?>" height="85" width="85"> </a>
	
												<b><i>&emsp;<?php echo $song_name[$i]; ?> &emsp;</i></b>&emsp; <b>| &emsp;
												Singer:</b>&emsp;<?php echo $artist_name[$i]; ?> </h4>
									</div>
									<!-- music icon -->
									<audio controls>
										<a href="#" class="btn btn-lg btn-theme" id="playNowBtn"><i
												class="fa fa-play"></i>&nbsp; Play Now</a>
												<source src="<?php echo 'upload_audio/'.$audio_file[$i] ;?>" type="audio/mpeg">
									</audio><?php $i--; ?>
									<div class="clearfix"></div>
								</li>
								<li class="playlist-number">
									<!-- song information -->
									<div class="song-info">
										<!-- song title -->
										<h4>
										<a href="veiwsong.php?id=<?php echo $i; ?>"><img src="upload_image/<?php echo $image_file[$i]?>" height="85" width="85"> </a>
	
												<b><i>&emsp;<?php echo $song_name[$i]; ?> &emsp;</i></b>&emsp13; <b>| &emsp;
												Singer:</b>&ensp;<?php echo $artist_name[$i]; ?> </h4>
									</div>
									<!-- music icon -->
									<audio controls>
										<a href="#" class="btn btn-lg btn-theme" id="playNowBtn"><i
												class="fa fa-play"></i>&nbsp; Play Now</a>
												<source src="<?php echo 'upload_audio/'.$audio_file[$i] ;?>" type="audio/mpeg">
									</audio><?php $i--; ?>
									<div class="clearfix"></div>
								</li>
								<li class="playlist-number">
									<!-- song information -->
									<div class="song-info">
										<!-- song title -->
										<h4>
										<a href="veiwsong.php?id=<?php echo $i; ?>"><img src="upload_image/<?php echo $image_file[$i]?>" height="85" width="85"> </a>
	
												<b><i>&emsp;<?php echo $song_name[$i]; ?> &emsp;</i></b>&emsp13; <b>| &emsp;
												Singer:</b>&ensp;<?php echo $artist_name[$i]; ?> </h4>
									</div>
									<!-- music icon -->
									<audio controls>
										<a href="#" class="btn btn-lg btn-theme" id="playNowBtn"><i
												class="fa fa-play"></i>&nbsp; Play Now</a>
												<source src="<?php echo 'upload_audio/'.$audio_file[$i] ;?>" type="audio/mpeg">
									</audio><?php $i--; ?>
									<div class="clearfix"></div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/ hero end -->
	<!--#################################################################################################################################################################################-->
	<!--#################################################################################################################################################################################-->
	<!--#################################################################################################################################################################################-->

	
	<!--#################################################################################################################################################################################-->
	<!--#################################################################################################################################################################################-->
	<!--#################################################################################################################################################################################-->

	<!-- featured abbum -->
	<div class="featured pad" id="featuredalbum">
		<div class="container">
			<!-- default heading -->
			<div class="default-heading">
				<!-- heading -->
				<h2>Featured Artists </h2>
				
			</div>
			<!-- featured album elements -->
			<div class="featured-element">
				<div class="row">
					<div class="col-md-4 col-sm-6">
						<!-- featured item -->
						<div class="featured-item ">
							<!-- image container -->
							<div class="figure">
								<!-- image -->
								<a href="hindipage/ArijitSingh.html">
									<img class="img-responsive" class="hover" src="hindipage/ArijitSingh.jpg" alt="" /></a>
							</div>
							<!-- featured information -->
							<div class="featured-item-info">
								<!-- featured title -->
								<h4><b>Arijit Singh</b></h4>
								<!-- horizontal line -->
								<hr />
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<!-- featured item -->
						<div class="featured-item ">
							<!-- image container -->
							<div class="figure">
								<!-- image -->
								<a href="hindipage/DarshanRaval.html">
								<img class="img-responsive" src="hindipage/DarshanRaval.jpg" alt="" /></a>
								<!-- paragraph -->
							</div>
							<!-- featured information -->
							<div class="featured-item-info">
								<!-- featured title -->
								<h4><b>Darshan Raval</b></h4>
								<!-- horizontal line -->
								<hr />
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<!-- featured item -->
						<div class="featured-item ">
							<!-- image container -->
							<div class="figure">
								<!-- image -->
								<a href="hindipage/GuruRandhawa.html">
								<img class="img-responsive" src="hindipage/GuruRandhawa.jpg" alt="" /></a>
							</div>
							<!-- featured information -->
							<div class="featured-item-info">
								<!-- featured title -->
								<h4><b>Guru Randhawa</b></h4>
								<!-- horizontal line -->
								<hr />
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<!-- featured item -->
						<div class="featured-item ">
							<!-- image container -->
							<div class="figure">
								<!-- image -->
								<a href="hindipage/Badshah.html">
								<img class="img-responsive" src="hindipage/Badshah.jpeg" alt="" /></a>
							</div>
							<!-- featured information -->
							<div class="featured-item-info">
								<!-- featured title -->
								<h4><b>Badshah</b></h4>
								<!-- horizontal line -->
								<hr />
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<!-- featured item -->
						<div class="featured-item ">
							<!-- image container -->
							<div class="figure">
								<!-- image -->
								<a href="hindipage/TulsiKumar.html">
								<img class="img-responsive" src="hindipage/TulsiKumar.jpg" alt="" /></a>
							</div>
							<!-- featured information -->
							<div class="featured-item-info">
								<!-- featured title -->
								<h4><b>Tulsi Kumar</b></h4>
								<!-- horizontal line -->
								<hr />
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<!-- featured item -->
						<div class="featured-item ">
							<!-- image container -->
							<div class="figure">
								<!-- image -->
								<a href="englishpage/justin.html">
								<img class="img-responsive" src="englishpage/justin.webp" alt="" /></a>
							</div>
							<!-- featured information -->
							<div class="featured-item-info">
								<!-- featured title -->
								<h4><b>Justin Bieber</b></h4>
								<!-- horizontal line -->
								<hr />
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<!-- featured item -->
						<div class="featured-item ">
							<!-- image container -->
							<div class="figure" style="align-items: flex-start;">
								<!-- image -->
								<a href="englishpage/ed.html">
								<img class="img-responsive" src="englishpage/ed.png" alt="" /></a>
							</div>
							<!-- featured information -->
							<div class="featured-item-info">
								<!-- featured title -->
								<h4><b>Ed Sheeran</b></h4>
								<!-- horizontal line -->
								<hr />
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<!-- featured item -->
						<div class="featured-item ">
							<!-- image container -->
							<div class="figure">
								<!-- image -->
								<img class="img-responsive" src="img/album/white.jpg" alt="" />
							</div>
							<!-- featured information -->
							<div class="featured-item-info">
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<!-- featured item -->
						<div class="featured-item ">
							<!-- image container -->
							<div class="figure">
								<!-- image -->
								<a href="englishpage/alan.html">
								<img class="img-responsive" src="englishpage/alan.jpg" alt="" /></a>
							</div>
							<!-- featured information -->
							<div class="featured-item-info">
								<!-- featured title -->
								<h4><b>Alan Walker</b></h4>
								<!-- horizontal line -->
								<hr />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- features end -->
	<hr />

	<!-- about -->
	

		<!--#################################################################################################################################################################################-->
		<!--#################################################################################################################################################################################-->
		<!--#################################################################################################################################################################################-->
		<br><br><br><br><br><br><br><br><br>
		

	<!-- Scroll to top -->
	<span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span>

	</div>

	<!--#################################################################################################################################################################################-->
	<!--#################################################################################################################################################################################-->
	<!--#################################################################################################################################################################################-->


	<!-- Javascript files -->
	<!-- jQuery -->
	<script src="js/jquery.js"></script>
	<!-- Bootstrap JS -->
	<script src="js/bootstrap.min.js"></script>
	<!-- WayPoints JS -->
	<script src="js/waypoints.min.js"></script>
	<!-- Include js plugin -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- One Page Nav -->
	<script src="js/jquery.nav.js"></script>
	<!-- Respond JS for IE8 -->
	<script src="js/respond.min.js"></script>
	<!-- HTML5 Support for IE -->
	<script src="js/html5shiv.js"></script>
	<!-- Custom JS -->
	<script src="js/custom.js"></script>

</body>

</html>