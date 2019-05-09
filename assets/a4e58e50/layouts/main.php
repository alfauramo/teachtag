<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use app\assets\OlympusAsset;
use app\models\User;
use yii\helpers\Url;

OlympusAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?= Html::csrfMetaTags() ?>

    <meta name="author" content="Alfredo Faura">
    <link rel="shortcut icon" href="/img/favicon.png">
    <title><?= Html::encode($this->title) ?></title>

	<script>
		WebFont.load({
			google: {
				families: ['Roboto:300,400,500,700:latin']
			}
		});
	</script>
	<?php $this->head() ?>
</head>
<body class="body-bg-white">


<div class="main-header main-header-fullwidth main-header-has-header-standard">

	
	<!-- Header Standard Landing  -->
	
	<div class="header--standard header--standard-landing" id="header--standard">
		<div class="container">
			<div class="header--standard-wrap">
	
				<a href="#" class="logo">
					<div class="img-wrap">
						<img src="img/theme/logo.png" alt="Olympus">
						<img src="img/theme/logo-colored-small.png" alt="Olympus" class="logo-colored">
					</div>
					<div class="title-block">
						<h6 class="logo-title">olympus</h6>
						<div class="sub-title">SOCIAL NETWORK</div>
					</div>
				</a>
	
				<a href="#" class="open-responsive-menu js-open-responsive-menu">
					<svg class="olymp-menu-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg>
				</a>
	
				<div class="nav nav-pills nav1 header-menu">
					<div class="mCustomScrollbar">
						<ul>
							<li class="nav-item">
								<a href="#" class="nav-link">Home</a>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false" tabindex='1'>Profile</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="#">Profile Page</a>
									<a class="dropdown-item" href="#">Newsfeed</a>
									<a class="dropdown-item" href="#">Post Versions</a>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-has-megamenu">
								<a href="#" class="nav-link dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false" tabindex='1'>Forums</a>
								<div class="dropdown-menu megamenu">
									<div class="row">
										<div class="col col-sm-3">
											<h6 class="column-tittle">Main Links</h6>
											<a class="dropdown-item" href="#">Profile Page<span class="tag-label bg-blue-light">new</span></a>
											<a class="dropdown-item" href="#">Profile Page</a>
											<a class="dropdown-item" href="#">Profile Page</a>
											<a class="dropdown-item" href="#">Profile Page</a>
											<a class="dropdown-item" href="#">Profile Page</a>
											<a class="dropdown-item" href="#">Profile Page</a>
										</div>
										<div class="col col-sm-3">
											<h6 class="column-tittle">BuddyPress</h6>
											<a class="dropdown-item" href="#">Profile Page</a>
											<a class="dropdown-item" href="#">Profile Page</a>
											<a class="dropdown-item" href="#">Profile Page<span class="tag-label bg-primary">HOT!</span></a>
											<a class="dropdown-item" href="#">Profile Page</a>
											<a class="dropdown-item" href="#">Profile Page</a>
											<a class="dropdown-item" href="#">Profile Page</a>
										</div>
										<div class="col col-sm-3">
											<h6 class="column-tittle">Corporate</h6>
											<a class="dropdown-item" href="#">Profile Page</a>
											<a class="dropdown-item" href="#">Profile Page</a>
											<a class="dropdown-item" href="#">Profile Page</a>
											<a class="dropdown-item" href="#">Profile Page</a>
											<a class="dropdown-item" href="#">Profile Page</a>
											<a class="dropdown-item" href="#">Profile Page</a>
										</div>
										<div class="col col-sm-3">
											<h6 class="column-tittle">Forums</h6>
											<a class="dropdown-item" href="#">Profile Page</a>
											<a class="dropdown-item" href="#">Profile Page</a>
											<a class="dropdown-item" href="#">Profile Page</a>
											<a class="dropdown-item" href="#">Profile Page</a>
											<a class="dropdown-item" href="#">Profile Page</a>
											<a class="dropdown-item" href="#">Profile Page</a>
										</div>
									</div>
								</div>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">Terms & Conditions</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">Events</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">Privacy Policy</a>
							</li>
							<li class="close-responsive-menu js-close-responsive-menu">
								<svg class="olymp-close-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
							</li>
							<li class="nav-item js-expanded-menu">
								<a href="#" class="nav-link">
									<svg class="olymp-menu-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg>
									<svg class="olymp-close-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
								</a>
							</li>
							<li class="shoping-cart more">
								<a href="#" class="nav-link">
									<svg class="olymp-shopping-bag-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-shopping-bag-icon"></use></svg>
									<span class="count-product">2</span>
								</a>
								<div class="more-dropdown shop-popup-cart">
									<ul>
										<li class="cart-product-item">
											<div class="product-thumb">
												<img src="img/theme/product1.png" alt="product">
											</div>
											<div class="product-content">
												<h6 class="title">White Enamel Mug</h6>
												<ul class="rait-stars">
													<li>
														<i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
													</li>
													<li>
														<i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
													</li>
	
													<li>
														<i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
													</li>
													<li>
														<i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
													</li>
													<li>
														<i class="far fa-star star-icon" aria-hidden="true"></i>
													</li>
												</ul>
												<div class="counter">x2</div>
											</div>
											<div class="product-price">$20</div>
											<div class="more">
												<svg class="olymp-little-delete"><use xlink:href="svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
											</div>
										</li>
										<li class="cart-product-item">
											<div class="product-thumb">
												<img src="img/theme/product2.png" alt="product">
											</div>
											<div class="product-content">
												<h6 class="title">Olympus Orange Shirt</h6>
												<ul class="rait-stars">
													<li>
														<i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
													</li>
													<li>
														<i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
													</li>
	
													<li>
														<i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
													</li>
													<li>
														<i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
													</li>
													<li>
														<i class="far fa-star star-icon" aria-hidden="true"></i>
													</li>
												</ul>
												<div class="counter">x1</div>
											</div>
											<div class="product-price">$40</div>
											<div class="more">
												<svg class="olymp-little-delete"><use xlink:href="svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
											</div>
										</li>
									</ul>
	
									<div class="cart-subtotal">Cart Subtotal:<span>$80</span></div>
	
									<div class="cart-btn-wrap">
										<a href="#" class="btn btn-primary btn-sm">Go to Your Cart</a>
										<a href="#" class="btn btn-purple btn-sm">Go to Checkout</a>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- ... end Header Standard Landing  -->
	<div class="header-spacer--standard"></div>

	<div class="content-bg-wrap bg-landing"></div>

	<div class="container">
		<div class="row display-flex">
			<div class="col col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
				<div class="landing-content">
					<h1>The Most Complete Social Network is Here!</h1>
					<p>We are the best and biggest social network with 5 billion active users all around the world. Share you
						thoughts, write blog posts, show your favourite music via Stopify, earn badges and much more!
					</p>
					<a href="#" class="btn btn-md btn-border c-white">Register Now!</a>
				</div>
			</div>

			<div class="col col-xl-5 ml-auto col-lg-6 col-md-12 col-sm-12 col-12">

				
				<!-- Login-Registration Form  -->
				
				<div class="registration-login-form">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#home" role="tab">
								<svg class="olymp-login-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-login-icon"></use></svg>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#profile" role="tab">
								<svg class="olymp-register-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-register-icon"></use></svg>
							</a>
						</li>
					</ul>
				
					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane active" id="home" role="tabpanel" data-mh="log-tab">
							<div class="title h6">Register to Olympus</div>
							<form class="content">
								<div class="row">
									<div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
										<div class="form-group label-floating is-empty">
											<label class="control-label">First Name</label>
											<input class="form-control" placeholder="" type="text">
										</div>
									</div>
									<div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
										<div class="form-group label-floating is-empty">
											<label class="control-label">Last Name</label>
											<input class="form-control" placeholder="" type="text">
										</div>
									</div>
									<div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="form-group label-floating is-empty">
											<label class="control-label">Your Email</label>
											<input class="form-control" placeholder="" type="email">
										</div>
										<div class="form-group label-floating is-empty">
											<label class="control-label">Your Password</label>
											<input class="form-control" placeholder="" type="password">
										</div>
				
										<div class="form-group date-time-picker label-floating">
											<label class="control-label">Your Birthday</label>
											<input name="datetimepicker" value="10/24/1984" />
											<span class="input-group-addon">
															<svg class="olymp-calendar-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-calendar-icon"></use></svg>
														</span>
										</div>
				
										<div class="form-group label-floating is-select">
											<label class="control-label">Your Gender</label>
											<select class="selectpicker form-control">
												<option value="MA">Male</option>
												<option value="FE">Female</option>
											</select>
										</div>
				
										<div class="remember">
											<div class="checkbox">
												<label>
													<input name="optionsCheckboxes" type="checkbox">
													I accept the <a href="#">Terms and Conditions</a> of the website
												</label>
											</div>
										</div>
				
										<a href="#" class="btn btn-purple btn-lg full-width">Complete Registration!</a>
									</div>
								</div>
							</form>
						</div>
				
						<div class="tab-pane" id="profile" role="tabpanel" data-mh="log-tab">
							<div class="title h6">Login to your Account</div>
							<form class="content">
								<div class="row">
									<div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="form-group label-floating is-empty">
											<label class="control-label">Your Email</label>
											<input class="form-control" placeholder="" type="email">
										</div>
										<div class="form-group label-floating is-empty">
											<label class="control-label">Your Password</label>
											<input class="form-control" placeholder="" type="password">
										</div>
				
										<div class="remember">
				
											<div class="checkbox">
												<label>
													<input name="optionsCheckboxes" type="checkbox">
													Remember Me
												</label>
											</div>
											<a href="#" class="forgot">Forgot my Password</a>
										</div>
				
										<a href="#" class="btn btn-lg btn-primary full-width">Login</a>
				
										<div class="or"></div>
				
										<a href="#" class="btn btn-lg bg-facebook full-width btn-icon-left"><i class="fab fa-facebook-f" aria-hidden="true"></i>Login with Facebook</a>
				
										<a href="#" class="btn btn-lg bg-twitter full-width btn-icon-left"><i class="fab fa-twitter" aria-hidden="true"></i>Login with Twitter</a>
				
				
										<p>Don’t you have an account? <a href="#">Register Now!</a> it’s really simple and you can start enjoing all the benefits!</p>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				
				<!-- ... end Login-Registration Form  -->
			</div>
		</div>
	</div>

	<img class="img-bottom" src="img/theme/group-bottom.png" alt="friends">
	<img class="img-rocket" src="img/theme/rocket.png" alt="rocket">
</div>



<!-- Clients Block -->

<section class="crumina-module crumina-clients">
	<div class="container">
		<div class="row">
			<div class="col col-xl-2 m-auto col-lg-2 col-md-6 col-sm-6 col-6">
				<a class="clients-item" href="#">
					<img src="img/theme/client1.png" class="" alt="logo">
				</a>
			</div>
			<div class="col col-xl-2 m-auto col-lg-2 col-md-6 col-sm-6 col-6">
				<a class="clients-item" href="#">
					<img src="img/theme/client2.png" class="" alt="logo">
				</a>
			</div>
			<div class="col col-xl-2 m-auto col-lg-2 col-md-6 col-sm-6 col-6">
				<a class="clients-item" href="#">
					<img src="img/theme/client3.png" class="" alt="logo">
				</a>
			</div>
			<div class="col col-xl-2 m-auto col-lg-2 col-md-6 col-sm-6 col-6">
				<a class="clients-item" href="#">
					<img src="img/theme/client4.png" class="" alt="logo">
				</a>
			</div>
			<div class="col col-xl-2 m-auto col-lg-2 col-md-6 col-sm-6 col-6">
				<a class="clients-item" href="#">
					<img src="img/theme/client5.png" class="" alt="logo">
				</a>
			</div>
		</div>
	</div>
</section>

<!-- ... end Clients Block -->


<!-- Section Img Scale Animation -->

<section class="align-center pt80 section-move-bg-top img-scale-animation scrollme">
	<div class="container">
		<div class="row">
			<div class="col col-xl-10 m-auto col-lg-10 col-md-12 col-sm-12 col-12">
				<img class="main-img" src="img/theme/scale1.png" alt="screen">
			</div>
		</div>

		<img class="first-img1" alt="img" src="img/theme/scale2.png">
		<img class="second-img1" alt="img" src="img/scale3.png">
		<img class="third-img1" alt="img" src="img/theme/scale4.png">
	</div>
	<div class="content-bg-wrap bg-section2"></div>
</section>

<!-- ... end Section Img Scale Animation -->

<section class="medium-padding120">
	<div class="container">
		<div class="row">
			<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
				<img src="img/theme/icon-fly.png" alt="screen">
			</div>

			<div class="col col-xl-4 col-lg-4 m-auto col-md-12 col-sm-12 col-12">
				<div class="crumina-module crumina-heading">
					<h2 class="heading-title">Why Join <span class="c-primary">Olympus Social Network</span>?</h2>
					<p class="heading-text">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
						Excepteur sint occaecat cupidatat non proident, sunt in culpa.
					</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="medium-padding120">
	<div class="container">
		<div class="row">
			<div class="col col-xl-4 col-lg-4 m-auto col-md-12 col-sm-12 col-12">
				<div class="crumina-module crumina-heading">
					<h2 class="heading-title">Meet New People <span class="c-primary">all over the World</span></h2>
					<p class="heading-text">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
						Excepteur sint occaecat cupidatat non proident, sunt in culpa.
					</p>
				</div>
			</div>

			<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
				<img src="img/theme/image1.png" alt="screen">
			</div>
		</div>
	</div>
</section>


<section class="medium-padding120">
	<div class="container">
		<div class="row">
			<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
				<img src="img/theme/image2.png" alt="screen">
			</div>

			<div class="col col-xl-4 col-lg-4 m-auto col-md-12 col-sm-12 col-12">
				<div class="crumina-module crumina-heading">
					<h2 class="heading-title">The Best UI/UX and <span class="c-primary">Awesome Features</span></h2>
					<p class="heading-text">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
						Excepteur sint occaecat cupidatat non proident, sunt in culpa.
					</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="medium-padding120">
	<div class="container">
		<div class="row">
			<div class="col col-xl-4 col-lg-4 m-auto col-md-12 col-sm-12 col-12">
				<div class="crumina-module crumina-heading">
					<h2 class="heading-title">Find People with <span class="c-primary">Your Same Interests</span></h2>
					<p class="heading-text">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
						Excepteur sint occaecat cupidatat non proident, sunt in culpa.
					</p>
				</div>
			</div>

			<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
				<img src="img/theme/image3.png" alt="screen">
			</div>
		</div>
	</div>
</section>



<!-- Planer Animation -->

<section class="medium-padding120 bg-section3 background-cover planer-animation">
	<div class="container">
		<div class="row mb60">
			<div class="col col-xl-4 col-lg-4 m-auto col-md-12 col-sm-12 col-12">
				<div class="crumina-module crumina-heading align-center">
					<div class="heading-sup-title">SOCIAL NETWORK</div>
					<h2 class="h1 heading-title">Community Reviews</h2>
					<p class="heading-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="swiper-container pagination-bottom" data-show-items="3">
				<div class="swiper-wrapper">
					<div class="ui-block swiper-slide">

						
						<!-- Testimonial Item -->
						
						<div class="crumina-module crumina-testimonial-item">
							<div class="testimonial-header-thumb"></div>
						
							<div class="testimonial-item-content">
						
								<div class="author-thumb">
									<img src="img/theme/avatar3.jpg" alt="author">
								</div>
						
								<h3 class="testimonial-title">Amazing Community</h3>
						
								<ul class="rait-stars">
									<li>
										<i class="fa fa-star star-icon"></i>
									</li>
									<li>
										<i class="fa fa-star star-icon"></i>
									</li>
						
									<li>
										<i class="fa fa-star star-icon"></i>
									</li>
									<li>
										<i class="fa fa-star star-icon"></i>
									</li>
									<li>
										<i class="far fa-star star-icon"></i>
									</li>
								</ul>
						
								<p class="testimonial-message">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
									incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
									exercitation ullamco.
								</p>
						
								<div class="author-content">
									<a href="#" class="h6 author-name">Mathilda Brinker</a>
									<div class="country">Los Angeles, CA</div>
								</div>
							</div>
						</div>
						
						<!-- ... end Testimonial Item -->
					</div>

					<div class="ui-block swiper-slide">

						
						<!-- Testimonial Item -->
						
						<div class="crumina-module crumina-testimonial-item">
							<div class="testimonial-header-thumb"></div>
						
							<div class="testimonial-item-content">
						
								<div class="author-thumb">
									<img src="img/theme/avatar17.jpg" alt="author">
								</div>
						
								<h3 class="testimonial-title">This is the Best Social Network ever!</h3>
						
								<ul class="rait-stars">
									<li>
										<i class="fa fa-star star-icon"></i>
									</li>
									<li>
										<i class="fa fa-star star-icon"></i>
									</li>
						
									<li>
										<i class="fa fa-star star-icon"></i>
									</li>
									<li>
										<i class="fa fa-star star-icon"></i>
									</li>
									<li>
										<i class="fa fa-star star-icon"></i>
									</li>
								</ul>
						
								<p class="testimonial-message">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
									nulla pariatur laborum.
								</p>
						
								<div class="author-content">
									<a href="#" class="h6 author-name">Marina Valentine</a>
									<div class="country">Long Island, NY</div>
								</div>
							</div>
						</div>
						
						<!-- ... end Testimonial Item -->

					</div>

					<div class="ui-block swiper-slide">

						
						<!-- Testimonial Item -->
						
						<div class="crumina-module crumina-testimonial-item">
							<div class="testimonial-header-thumb"></div>
						
							<div class="testimonial-item-content">
						
								<div class="author-thumb">
									<img src="img/theme/avatar1.jpg" alt="author">
								</div>
						
								<h3 class="testimonial-title">Incredible Design!</h3>
						
								<ul class="rait-stars">
									<li>
										<i class="fa fa-star star-icon"></i>
									</li>
									<li>
										<i class="fa fa-star star-icon"></i>
									</li>
						
									<li>
										<i class="fa fa-star star-icon"></i>
									</li>
									<li>
										<i class="fa fa-star star-icon"></i>
									</li>
									<li>
										<i class="far fa-star star-icon"></i>
									</li>
								</ul>
						
								<p class="testimonial-message">Sed ut perspiciatis unde omnis iste natus error sit
									voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab
									illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
								</p>
						
								<div class="author-content">
									<a href="#" class="h6 author-name">Nicholas Grissom</a>
									<div class="country">San Francisco, CA</div>
								</div>
							</div>
						</div>
						
						<!-- ... end Testimonial Item -->
					</div>
				</div>

				<div class="swiper-pagination"></div>
			</div>
		</div>
	</div>

	<img src="img/theme/planer.png" alt="planer" class="planer">
</section>

<!-- ... end Section Planer Animation -->

<section class="medium-padding120">
	<div class="container">
		<div class="row">
			<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
				<img src="img/theme/image4.png" alt="screen">
			</div>

			<div class="col col-xl-5 col-lg-5 m-auto col-md-12 col-sm-12 col-12">
				<div class="crumina-module crumina-heading">
					<h2 class="h1 heading-title">Release all the Power with the <span class="c-primary">Olympus App!</span></h2>
					<p class="heading-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
						incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
						ullamco laboris nisi ut aliquip ex ea commodo consequat.
					</p>
				</div>

				
				<ul class="list--styled">
					<li>
						<i class="far fa-check-circle" aria-hidden="true"></i>
						Build your profile in just minutes, it’s that simple!
					</li>
					<li>
						<i class="far fa-check-circle" aria-hidden="true"></i>
						Unlimited messaging with the best interface.
					</li>
				</ul>

				<a href="#" class="btn btn-market">
					<img class="icon" src="svg-icons/apple-logotype.svg" alt="app store">
					<div class="text">
						<span class="sup-title">AVAILABLE ON THE</span>
						<span class="title">App Store</span>
					</div>
				</a>

				<a href="#" class="btn btn-market">
					<img class="icon" src="svg-icons/google-play.svg" alt="google">
					<div class="text">
						<span class="sup-title">ANDROID APP ON</span>
						<span class="title">Google Play</span>
					</div>
				</a>
			</div>
		</div>
	</div>
</section>


<!-- Section Subscribe Animation -->

<section class="medium-padding100 subscribe-animation scrollme bg-users">
	<div class="container">
		<div class="row">
			<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
				<div class="crumina-module crumina-heading c-white custom-color">
					<h2 class="h1 heading-title">Olympus Newsletter</h2>
					<p class="heading-text">Subscribe to be the first one to know about updates, new features and much more!
					</p>
				</div>

				
				<!-- Subscribe Form  -->
				
				<form class="form-inline subscribe-form" method="post">
					<div class="form-group label-floating is-empty">
						<label class="control-label">Enter your email</label>
						<input class="form-control bg-white" placeholder="" type="email">
					</div>
				
					<button class="btn btn-blue btn-lg">Send</button>
				</form>
				
				<!-- ... end Subscribe Form  -->

			</div>
		</div>

		<img src="img/theme/paper-plane.png" alt="plane" class="plane">
	</div>
</section>

<!-- ... end Section Subscribe Animation -->
<section class="medium-padding120">
	<div class="container">
		<div class="row mb60">
			<div class="col col-xl-4 col-lg-4 m-auto col-md-12 col-sm-12 col-12">
				<div class="crumina-module crumina-heading align-center">
					<div class="heading-sup-title">OLYMPUS BLOG</div>
					<h2 class="h1 heading-title">Latest News</h2>
					<p class="heading-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">

				
				<!-- Post -->
				
				<article class="hentry blog-post">
				
					<div class="post-thumb">
						<img src="img/theme/post1.jpg" alt="photo">
					</div>
				
					<div class="post-content">
						<a href="#" class="post-category bg-blue-light">THE COMMUNITY</a>
						<a href="#" class="h4 post-title">Here’s the Featured Urban photo of August! </a>
						<p>Here’s a photo from last month’s photoshoot. We got really awesome shots for the new catalog.</p>
				
						<div class="author-date">
							by
							<a class="h6 post__author-name fn" href="#">Maddy Simmons</a>
							<div class="post__date">
								<time class="published" datetime="2017-03-24T18:18">
									- 7 hours ago
								</time>
							</div>
						</div>
				
						<div class="post-additional-info inline-items">
				
							<ul class="friends-harmonic">
								<li>
									<a href="#">
										<img src="img/theme/icon-chat27.png" alt="icon">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="img/theme/icon-chat2.png" alt="icon">
									</a>
								</li>
							</ul>
							<div class="names-people-likes">
								26
							</div>
				
							<div class="comments-shared">
								<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-speech-balloon-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use></svg>
									<span>0</span>
								</a>
							</div>
				
						</div>
					</div>
				
				</article>
				
				<!-- ... end Post -->
			</div>
			<div class="col col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">

				
				<!-- Post -->
				
				<article class="hentry blog-post">
				
					<div class="post-thumb">
						<img src="img/theme/post2.jpg" alt="photo">
					</div>
				
					<div class="post-content">
						<a href="#" class="post-category bg-primary">OLYMPUS NEWS</a>
						<a href="#" class="h4 post-title">Olympus Network added new photo filters!</a>
						<p>Here’s a photo from last month’s photoshoot. We got really awesome shots for the new catalog.</p>
				
						<div class="author-date">
							by
							<a class="h6 post__author-name fn" href="#">JACK SCORPIO</a>
							<div class="post__date">
								<time class="published" datetime="2017-03-24T18:18">
									- 12 hours ago
								</time>
							</div>
						</div>
				
						<div class="post-additional-info inline-items">
				
							<ul class="friends-harmonic">
								<li>
									<a href="#">
										<img src="img/theme/icon-chat4.png" alt="icon">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="img/theme/icon-chat26.png" alt="icon">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="img/theme/icon-chat16.png" alt="icon">
									</a>
								</li>
							</ul>
							<div class="names-people-likes">
								82
							</div>
				
							<div class="comments-shared">
								<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-speech-balloon-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use></svg>
									<span>14</span>
								</a>
							</div>
				
						</div>
					</div>
				
				</article>
				
				<!-- ... end Post -->
			</div>
			<div class="col col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">

				
				<!-- Post -->
				
				<article class="hentry blog-post">
				
					<div class="post-thumb">
						<img src="img/theme/post3.jpg" alt="photo">
					</div>
				
					<div class="post-content">
						<a href="#" class="post-category bg-purple">INSPIRATION</a>
						<a href="#" class="h4 post-title">Take a look at these truly awesome worspaces</a>
						<p>Here’s a photo from last month’s photoshoot. We got really awesome shots for the new catalog.</p>
				
						<div class="author-date">
							by
							<a class="h6 post__author-name fn" href="#">Maddy Simmons</a>
							<div class="post__date">
								<time class="published" datetime="2017-03-24T18:18">
									- 2 days ago
								</time>
							</div>
						</div>
				
						<div class="post-additional-info inline-items">
				
							<ul class="friends-harmonic">
								<li>
									<a href="#">
										<img src="img/theme/icon-chat28.png" alt="icon">
									</a>
								</li>
							</ul>
							<div class="names-people-likes">
								0
							</div>
				
							<div class="comments-shared">
								<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-speech-balloon-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use></svg>
									<span>22</span>
								</a>
							</div>
				
						</div>
					</div>
				
				</article>
				
				<!-- ... end Post -->
			</div>
		</div>
	</div>
</section>


<!-- Section Call To Action Animation -->

<section class="align-right pt160 pb80 section-move-bg call-to-action-animation scrollme">
	<div class="container">
		<div class="row">
			<div class="col col-xl-10 m-auto col-lg-10 col-md-12 col-sm-12 col-12">
				<a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#registration-login-form-popup">Start Making Friends Now!</a>
			</div>
		</div>
	</div>
	<img class="first-img" alt="guy" src="img/theme/guy.png">
	<img class="second-img" alt="rocket" src="img/theme/rocket1.png">
	<div class="content-bg-wrap bg-section1"></div>
</section>

<!-- ... end Section Call To Action Animation -->


<div class="modal fade" id="registration-login-form-popup" tabindex="-1" role="dialog" aria-labelledby="registration-login-form-popup" aria-hidden="true">
	<div class="modal-dialog window-popup registration-login-form-popup" role="document">
		<div class="modal-content">
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
			</a>
			<div class="modal-body">
				<div class="registration-login-form">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#home1" role="tab">
								<svg class="olymp-login-icon">
									<use xlink:href="svg-icons/sprites/icons.svg#olymp-login-icon"></use>
								</svg>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#profile1" role="tab">
								<svg class="olymp-register-icon">
									<use xlink:href="svg-icons/sprites/icons.svg#olymp-register-icon"></use>
								</svg>
							</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane active" id="home1" role="tabpanel" data-mh="log-tab">
							<div class="title h6">Register to Olympus</div>
							<form class="content">
								<div class="row">
									<div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
										<div class="form-group label-floating is-empty">
											<label class="control-label">First Name</label>
											<input class="form-control" placeholder="" type="text">
										</div>
									</div>
									<div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
										<div class="form-group label-floating is-empty">
											<label class="control-label">Last Name</label>
											<input class="form-control" placeholder="" type="text">
										</div>
									</div>
									<div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="form-group label-floating is-empty">
											<label class="control-label">Your Email</label>
											<input class="form-control" placeholder="" type="email">
										</div>
										<div class="form-group label-floating is-empty">
											<label class="control-label">Your Password</label>
											<input class="form-control" placeholder="" type="password">
										</div>

										<div class="form-group date-time-picker label-floating">
											<label class="control-label">Your Birthday</label>
											<input name="datetimepicker" value="10/24/1984" />
											<span class="input-group-addon">
											<svg class="olymp-calendar-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-calendar-icon"></use></svg>
										</span>
										</div>

										<div class="form-group label-floating is-select">
											<label class="control-label">Your Gender</label>
											<select class="selectpicker form-control">
												<option value="MA">Male</option>
												<option value="FE">Female</option>
											</select>
										</div>

										<div class="remember">
											<div class="checkbox">
												<label>
													<input name="optionsCheckboxes" type="checkbox">
													I accept the <a href="#">Terms and Conditions</a> of the website
												</label>
											</div>
										</div>

										<a href="#" class="btn btn-purple btn-lg full-width">Complete Registration!</a>
									</div>
								</div>
							</form>
						</div>

						<div class="tab-pane" id="profile1" role="tabpanel" data-mh="log-tab">
							<div class="title h6">Login to your Account</div>
							<form class="content">
								<div class="row">
									<div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="form-group label-floating is-empty">
											<label class="control-label">Your Email</label>
											<input class="form-control" placeholder="" type="email">
										</div>
										<div class="form-group label-floating is-empty">
											<label class="control-label">Your Password</label>
											<input class="form-control" placeholder="" type="password">
										</div>

										<div class="remember">

											<div class="checkbox">
												<label>
													<input name="optionsCheckboxes" type="checkbox">
													Remember Me
												</label>
											</div>
											<a href="#" class="forgot">Forgot my Password</a>
										</div>

										<a href="#" class="btn btn-lg btn-primary full-width">Login</a>

										<div class="or"></div>

										<a href="#" class="btn btn-lg bg-facebook full-width btn-icon-left"><i class="fab fa-facebook-f" aria-hidden="true"></i>Login with Facebook</a>

										<a href="#" class="btn btn-lg bg-twitter full-width btn-icon-left"><i class="fab fa-twitter" aria-hidden="true"></i>Login with Twitter</a>


										<p>Don’t you have an account?
											<a href="#">Register Now!</a> it’s really simple and you can start enjoing all the benefits!
										</p>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Footer Full Width -->

<div class="footer footer-full-width" id="footer">
	<div class="container">
		<div class="row">
			<div class="col col-lg-4 col-md-4 col-sm-6 col-6">

				
				<!-- Widget About -->
				
				<div class="widget w-about">
				
					<a href="02-ProfilePage.html" class="logo">
						<div class="img-wrap">
							<img src="img/theme/logo-colored.png" alt="Olympus">
						</div>
						<div class="title-block">
							<h6 class="logo-title">olympus</h6>
							<div class="sub-title">SOCIAL NETWORK</div>
						</div>
					</a>
					<p>Lorem ipsum dolor sit amet, consect adipisicing elit, sed do eiusmod por incidid ut labore et lorem.</p>
					<ul class="socials">
						<li>
							<a href="#">
								<i class="fab fa-facebook-square" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fab fa-twitter" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fab fa-youtube" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fab fa-google-plus-g" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fab fa-instagram" aria-hidden="true"></i>
							</a>
						</li>
					</ul>
				</div>
				
				<!-- ... end Widget About -->

			</div>

			<div class="col col-lg-2 col-md-4 col-sm-6 col-6">

				
				<!-- Widget List -->
				
				<div class="widget w-list">
					<h6 class="title">Main Links</h6>
					<ul>
						<li>
							<a href="#">Landing</a>
						</li>
						<li>
							<a href="#">Home</a>
						</li>
						<li>
							<a href="#">About</a>
						</li>
						<li>
							<a href="#">Events</a>
						</li>
					</ul>
				</div>
				
				<!-- ... end Widget List -->

			</div>
			<div class="col col-lg-2 col-md-4 col-sm-6 col-6">

				
				<div class="widget w-list">
					<h6 class="title">Your Profile</h6>
					<ul>
						<li>
							<a href="#">Main Page</a>
						</li>
						<li>
							<a href="#">About</a>
						</li>
						<li>
							<a href="#">Friends</a>
						</li>
						<li>
							<a href="#">Photos</a>
						</li>
					</ul>
				</div>

			</div>
			<div class="col col-lg-2 col-md-4 col-sm-6 col-6">

				
				<div class="widget w-list">
					<h6 class="title">Features</h6>
					<ul>
						<li>
							<a href="#">Newsfeed</a>
						</li>
						<li>
							<a href="#">Post Versions</a>
						</li>
						<li>
							<a href="#">Messages</a>
						</li>
						<li>
							<a href="#">Friend Groups</a>
						</li>
					</ul>
				</div>

			</div>
			<div class="col col-lg-2 col-md-4 col-sm-6 col-6">

				
				<div class="widget w-list">
					<h6 class="title">Olympus</h6>
					<ul>
						<li>
							<a href="#">Privacy</a>
						</li>
						<li>
							<a href="#">Terms & Conditions</a>
						</li>
						<li>
							<a href="#">Forums</a>
						</li>
						<li>
							<a href="#">Statistics</a>
						</li>
					</ul>
				</div>

			</div>

			<div class="col col-lg-12 col-md-12 col-sm-12 col-12">

				
				<!-- SUB Footer -->
				
				<div class="sub-footer-copyright">
					<span>
						Copyright <a href="index.html">Olympus Buddypress + WP</a> All Rights Reserved 2017
					</span>
				</div>
				
				<!-- ... end SUB Footer -->

			</div>
		</div>
	</div>
</div>

<!-- ... end Footer Full Width -->




<!-- Window-popup-CHAT for responsive min-width: 768px -->

<div class="ui-block popup-chat popup-chat-responsive" tabindex="-1" role="dialog" aria-labelledby="update-header-photo" aria-hidden="true">

	<div class="modal-content">
		<div class="modal-header">
			<span class="icon-status online"></span>
			<h6 class="title" >Chat</h6>
			<div class="more">
				<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
				<svg class="olymp-little-delete js-chat-open"><use xlink:href="svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
			</div>
		</div>
		<div class="modal-body">
			<div class="mCustomScrollbar">
				<ul class="notification-list chat-message chat-message-field">
					<li>
						<div class="author-thumb">
							<img src="img/theme/avatar14-sm.jpg" alt="author" class="mCS_img_loaded">
						</div>
						<div class="notification-event">
							<span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="img/theme/author-page.jpg" alt="author" class="mCS_img_loaded">
						</div>
						<div class="notification-event">
							<span class="chat-message-item">Don’t worry Mathilda!</span>
							<span class="chat-message-item">I already bought everything</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:29pm</time></span>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="img/theme/avatar14-sm.jpg" alt="author" class="mCS_img_loaded">
						</div>
						<div class="notification-event">
							<span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
						</div>
					</li>
				</ul>
			</div>

			<form class="need-validation">

		<div class="form-group label-floating is-empty">
			<label class="control-label">Press enter to post...</label>
			<textarea class="form-control" placeholder=""></textarea>
			<div class="add-options-message">
				<a href="#" class="options-message">
					<svg class="olymp-computer-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use></svg>
				</a>
				<div class="options-message smile-block">

					<svg class="olymp-happy-sticker-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-sticker-icon"></use></svg>

					<ul class="more-dropdown more-with-triangle triangle-bottom-right">
						<li>
							<a href="#">
								<img src="img/theme/icon-chat1.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/theme/icon-chat2.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/theme/icon-chat3.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/theme/icon-chat4.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/theme/icon-chat5.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/theme/icon-chat6.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/theme/icon-chat7.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/theme/icon-chat8.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/theme/icon-chat9.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/theme/icon-chat10.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/theme/icon-chat11.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/theme/icon-chat12.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/theme/icon-chat13.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/theme/icon-chat14.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/theme/icon-chat15.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/theme/icon-chat16.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/theme/icon-chat17.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/theme/icon-chat18.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/theme/icon-chat19.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/theme/icon-chat20.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/theme/icon-chat21.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/theme/icon-chat22.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/theme/icon-chat23.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/theme/icon-chat24.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/theme/icon-chat25.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/theme/icon-chat26.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/theme/icon-chat27.png" alt="icon">
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

	</form>
		</div>
	</div>

</div>

<!-- ... end Window-popup-CHAT for responsive min-width: 768px -->



<a class="back-to-top" href="#">
	<img src="svg-icons/back-to-top.svg" alt="arrow" class="back-icon">
</a>



<!-- JS Scripts -->
<script src="js/jquery-3.2.1.js"></script>
<script src="js/jquery.appear.js"></script>
<script src="js/jquery.mousewheel.js"></script>
<script src="js/perfect-scrollbar.js"></script>
<script src="js/jquery.matchHeight.js"></script>
<script src="js/svgxuse.js"></script>
<script src="js/imagesloaded.pkgd.js"></script>
<script src="js/Headroom.js"></script>
<script src="js/velocity.js"></script>
<script src="js/ScrollMagic.js"></script>
<script src="js/jquery.waypoints.js"></script>
<script src="js/jquery.countTo.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/material.min.js"></script>
<script src="js/bootstrap-select.js"></script>
<script src="js/smooth-scroll.js"></script>
<script src="js/selectize.js"></script>
<script src="js/swiper.jquery.js"></script>
<script src="js/moment.js"></script>
<script src="js/daterangepicker.js"></script>
<script src="js/simplecalendar.js"></script>
<script src="js/fullcalendar.js"></script>
<script src="js/isotope.pkgd.js"></script>
<script src="js/ajax-pagination.js"></script>
<script src="js/Chart.js"></script>
<script src="js/chartjs-plugin-deferred.js"></script>
<script src="js/circle-progress.js"></script>
<script src="js/loader.js"></script>
<script src="js/run-chart.js"></script>
<script src="js/jquery.magnific-popup.js"></script>
<script src="js/jquery.gifplayer.js"></script>
<script src="js/mediaelement-and-player.js"></script>
<script src="js/mediaelement-playlist-plugin.min.js"></script>

<script src="js/base-init.js"></script>
<script defer src="fonts/fontawesome-all.js"></script>

<script src="Bootstrap/dist/js/bootstrap.bundle.js"></script>

</body>
</html>