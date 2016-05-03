<!DOCTYPE html>
<html>
<head>
	<title><?php echo $meta_title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" media="screen">
	<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" media="screen">
	<!--[if lt IE 7]>
		<link href="<?php echo base_url(); ?>assets/css/font-awesome-ie7.min.css" rel="stylesheet" media="screen">
	<![endif]-->
	<script src="<?php echo base_url(); ?>assets/js/modernizr.custom.28468.js"></script>
	<!--[if lt IE 9]>
		<script src="<?php echo base_url(); ?>assets/js/html5shiv.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/respond.min.js"></script>
	<![endif]-->
	<noscript>
		<link href="<?php echo base_url(); ?>assets/css/nojs.css" rel="stylesheet">
	</noscript>
</head>
<body>
	<div class="window">
		<div class="navbar">
			<div class="navbar-container">
				<ul class="navbar-menu">
					<li><?php echo anchor('#home', '<i class="icon-home"></i> Home', array('id' => 'home')); ?></li>
					<li><?php echo anchor('#about', '<i class="icon-group"></i> About us', array('id' => 'about')); ?></li>
					<li><?php echo anchor('#products', '<i class="icon-food"></i> Our products', array('id' => 'products')); ?></li>
					<li><?php echo anchor('#news', '<i class="icon-book"></i> News', array('id' => 'news')); ?></li>
					<li><?php echo anchor('#contact', '<i class="icon-comments"></i> Contact us', array('id' => 'contact')); ?></li>
				</ul>
			</div>
		</div>
		<div class="logo">
			<?php echo anchor(base_url(), '<img src="'. base_url() .'assets/img/logo.png">'); ?>
		</div>
		<div id="slider" class="slider">
			<img src="<?php echo base_url(); ?>assets/img/1.jpg" alt="0">
			<img src="<?php echo base_url(); ?>assets/img/2.jpg" alt="1">
			<img src="<?php echo base_url(); ?>assets/img/3.jpg" alt="2">
			<img src="<?php echo base_url(); ?>assets/img/4.jpg" alt="3">
			<img src="<?php echo base_url(); ?>assets/img/5.jpg" alt="4">
		</div>
	</div>
	<div class="window">
		<div class="container about" id="content-about">
			<div class="row">
				<h1 class="about-title">Who we are...</h1>
				<div class="about-content">
					<p>MieRip : Cara Lain Makan Mie Instan, Mie yang mirip dengan tampilan pada bungkusnya.
					Menikmati MieRip bisa menjadikan trend baru karena tampilan yang unik serta tidak membohongi konsumen.
					Fitur - fitur baru akan selalu di update oleh MieRip agar konsumen bisa puas dengan layanan kami.
					Penasaran? Langsung aja dinikmati dan jangan lupa <?php echo anchor('#contact', 'comment', array('class' => 'content-link contact-link')); ?> di web ini.</p>
				</div>
				<div class="about-logo" id="logo-list">
					<img src="<?php echo base_url(); ?>assets/img/sisfotime.png" alt="sisfotime" class="sisfotime" id="logo-sisfotime">
					<img src="<?php echo base_url(); ?>assets/img/mierip.png" alt="mierip" class="mierip move-right" id="logo-mierip">
				</div>
			</div>
		</div>
	</div>
	<div class="window">
		<div class="container product" id="content-menu">
			<div class="row">
				<div id="da-slider" class="da-slider">
				<?php if($products != NULL) : ?>
				<?php foreach($products as $menu) : ?>
					<div class="da-slide">
						<h2><?php echo $menu->name; ?></h2>
						<p><?php echo $menu->description; ?><br></p>
						<div class="da-img"><img src="<?php echo base_url(); ?>assets/products/<?php echo $menu->image; ?>" alt="image"></div>
					</div>
				<?php endforeach; ?>
				<?php unset($menu); ?>
				<?php else : ?>
					<div class="da-slide">
						<p>No product available.</p>
					</div>
				<?php endif; ?>
					<nav class="da-arrows">
						<span class="da-arrows-prev"></span>
						<span class="da-arrows-next"></span>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<div class="window">
		<div class="container news" id="content-news">
			<div class="row">
				<h1 class="news-title">What's new?</h1>
				<div class="news-content">
				<?php if($news->result() != NULL) : ?>
					<?php foreach($news->result() as $berita) : ?>
						<div class="well well-sm">
							<h1 style="padding-bottom:5px;"><?php echo $berita->title; ?></h1>
							<small><i>Published on <?php echo date('D, j F Y H:i:s', strtotime($berita->date)); ?></i></small>
							<p style="padding-top:15px;"><?php echo $berita->content; ?></p>
						</div>
					<?php endforeach; ?>
					<?php unset($berita); ?>
				<?php else : ?>
					<div class="well well-sm">
						<p>No topic yet.</p>
					</div>
				<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="window">
		<div class="container contact" id="content-contact">
			<div class="row">
				<div class="testi-form">
					<h1 class="testi-title">Tell something<br>about us!</h1>
					<?php echo form_open('home/testi_post'); ?>
						<?php echo form_input(array('name' => 'name', 'placeholder' => 'Name', 'class' => 'form-control')); ?><br>
						<?php echo form_input(array('name' => 'email', 'placeholder' => 'Email', 'class' => 'form-control')); ?><br>
						<?php echo form_textarea(array('name' => 'comment', 'placeholder' => 'Testimonials', 'class' => 'form-control')); ?><br>
						<?php echo form_submit(array('name' => 'submit', 'value' => 'Submit', 'class' => 'btn btn-primary')); ?>
					<?php echo form_close(); ?>
				</div>
				<div class="testi-list">
					<h1 class="testi-title">What the others say...</h1>
					<?php if($testi->result() != NULL) : ?>
					<?php foreach($testi->result() as $comment) : ?>
						<div class="well well-sm">
							<h4><?php echo ucfirst($comment->name); ?></h4><br>
							<blockquote><i>"<?php echo $comment->comment; ?>"</i></blockquote>
						</div>
					<?php endforeach; ?>
					<?php unset($comment); ?>
					<?php else : ?>
						<div class="well well-sm">
							<p>No testimonials yet.</p>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.slides.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.cslider.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/TweenMax.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.superscrollorama.js"></script>
	<script>
		$(document).ready(function() {
			var controller = $.superscrollorama({
				reverse: true
			});
			controller.addTween("#logo-list", TweenMax.from($('#logo-list'), .5, {css:{opacity:0, right:"600px"}, ease:Quad.easeInOut}));
			
			$("#home").click(function() {
				$('html, body').animate({
					scrollTop: $("body").offset().top
				}, 500);
			});

			$("#about").click(function() {
				$('html, body').animate({
					scrollTop: $("#content-about").offset().top
				}, 500)
			})

			$("#products").click(function() {
				$('html, body').animate({
					scrollTop: $("#content-menu").offset().top
				}, 500);
			});

			$("#news").click(function() {
				$('html, body').animate({
					scrollTop: $("#content-news").offset().top
				}, 500);
			});			

			$("#contact, .contact-link").click(function() {
				$('html, body').animate({
					scrollTop: $("#content-contact").offset().top
				}, 500);
			});

			$("#slider").slidesjs({
				width: 1000,
				height: 450,
				navigation: {
					active: false,
				},
				pagination: {
					effect: "fade"
				},
				play: {
					active: false,
					effect: "fade",
					auto: true,
					interval: 4000,
					pauseOnHover: true,
					swap: false
				},
			});

			$('#da-slider').cslider({
				autoplay	: true,
				bgincrement	: 450
			});
		})
	</script>
</body>
</html>