 <style>
 	iframe {
 		width: 100% !important;
 		height: auto;
 	}
 </style>
 <div class="jumbotron jumbotron-fluid jumbotron-head">
 	<div class="container">
 		<h1 class="display-4 text-center heading-menu"><?php echo $title_sub ?></h1>
 		<p class="lead text-center subheading-menu"><a href="<?php echo base_url(); ?>" target="_blank"><?php echo $title ?> Study Club</a></p>
 	</div>
 </div>

 <div class="gtco-section">
 	<div class="gtco-container">
 		<div class="row row-pb-md">
 			<div class="col-md-6 animate-box">
 				<h3></h3>
 				<!-- <form action="<?php echo site_url('contact/prosespengiriman'); ?>"> -->
 				<form action="#">
 					<div class="row form-group">
 						<div class="col-md-12">
 							<label class="sr-only" for="name">Name</label>
 							<input type="text" id="name" class="form-control" placeholder="Your firstname">
 						</div>

 					</div>

 					<div class="row form-group">
 						<div class="col-md-12">
 							<label class="sr-only" for="email">Email</label>
 							<input type="text" id="email" class="form-control" placeholder="Your email address">
 						</div>
 					</div>

 					<div class="row form-group">
 						<div class="col-md-12">
 							<label class="sr-only" for="subject">Subject</label>
 							<input type="text" id="subject" class="form-control" placeholder="Your subject of this message">
 						</div>
 					</div>

 					<div class="row form-group">
 						<div class="col-md-12">
 							<label class="sr-only" for="message">Message</label>
 							<textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Write us something"></textarea>
 						</div>
 					</div>
 					<div class="form-group">
 						<input type="submit" value="Send Message" class="btn btn-primary btn-lg">
 					</div>
 				</form>

 			</div>
 			<div class="col-md-5 col-md-push-1 animate-box">
 				<div class="gtco-contact-info">
 					<h3></h3>
 					<ul>
 						<li class="address"><?php echo nl2br($site->alamat); ?></li>
 						<li class="phone"><a href="tel://1234567920"><?php echo $site->telepon ?></a></li>
 						<li class="email"><a href="mailto:<?php echo $site->email ?>"><?php echo $site->email ?></a></li>
 					</ul>
 				</div>
 				<div>
 					<p><?php echo $site->google_map ?></p>
 				</div>
 			</div>
 		</div>
 	</div>

 </div>
 </div>


 <div id="gtco-features" style="padding:0px;">
 	<div class="gtco-container">
 		<div class="row">
 			<div class="col-md-4 col-sm-6">
 				<div class="feature-center animate-box" data-animate-effect="fadeIn" style="border-top: 5px solid #18C09B; border-bottom: 5px solid #18C09B; padding-top: 30px;">
 					<span class="icon">
 						<i class="ti-announcement"></i>
 					</span>
 					<h3>INFORMASI</h3>
 					<p>Temukan informasi menarik seputar teknologi. </p>
 					<hr>
 					<p><a href="<?php echo base_url('informasi'); ?>" class="btn btn-primary">Lanjut Baca</a></p>
 				</div>
 			</div>
 			<div class="col-md-4 col-sm-6">
 				<div class="feature-center animate-box" data-animate-effect="fadeIn" style="border-top: 5px solid #18C09B; border-bottom: 5px solid #18C09B; padding-top: 30px;">
 					<span class="icon">
 						<i class="ti-settings"></i>
 					</span>
 					<h3>DIVISI</h3>
 					<p>Computer Cyber memiliki 5 divisi. </p>
 					<hr>
 					<p><a href="<?php echo base_url('divisi'); ?>" class="btn btn-primary">Lanjut Baca</a></p>
 				</div>
 			</div>
 			<div class="col-md-4 col-sm-6">
 				<div class="feature-center animate-box" data-animate-effect="fadeIn" style="border-top: 5px solid #18C09B; border-bottom: 5px solid #18C09B; padding-top: 30px;">
 					<span class="icon">
 						<i class="ti-user"></i>
 					</span>
 					<h3>PENGURUS</h3>
 					<p>Pengerus serta anggota Computer Cyber. </p>
 					<hr>
 					<p><a href="<?php echo base_url('pengurus'); ?>" class="btn btn-primary">Lanjut Baca</a></p>
 				</div>
 			</div>
 		</div>
 	</div>
 </div>