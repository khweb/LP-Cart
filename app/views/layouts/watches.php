<!DOCTYPE html>
<html>
<body> 
<head>
	<base href="/lpcart/">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/flexslider.css">
	<link rel="stylesheet" href="css/ionicons.min.css">
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="css/style.css">
	<?php echo $meta;?>
</head>

	<!--top-header-->
	<div class="top-header">
		<div class="container">
			<div class="top-header-main">
				<div class="col-md-6 top-header-left">
					<div class="drop">
						<div class="box">
							<select id="currency" class="dropdown drop">
								<?php new \app\widgets\currency\Currency();?>							
							</select>
						</div>
						<div class="btn-group">
							<a href="javascript:;" class="dropdown" data-toggle="dropdown">Мой кабинет<span class="caret"></span>
								<ul class="dropdown-menu">
									<?php if (!empty($_SESSION['user'])):?>
									<li><a href="#">Добро пожаловать, <?=h($_SESSION['user']['name']);?></a></li>
									<li><a href="user/logout">Выход</a></li>
								<?php else:?>
									<li><a href="user/login">Вход</a></li>
									<li><a href="user/signup">Регистрация</a></li>
								<?php endif;?>
								</ul>
							</a>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-md-6 top-header-left">
					<div class="cart box_1">
						<a href="/cart/show" class="show-cart">
							<div class="total">
								<img src="images/cart-1.png" alt="" />
								<?php if (!empty($_SESSION['cart'])):?>
									<span class="simpleCart_total"><?= $_SESSION['cart.currency']['symbol_left'] . $_SESSION['cart.sum'] . $_SESSION['cart.currency']['symbol_right'];?>	</span>
								<?php else:?>
									<span class="simpleCart_total">Корзина путса</span>
								<?php endif;?>							
							</div>
						</a>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--top-header-->
	<!--start-logo-->
	<div class="logo">
		<a href="<?= $home_url; ?>"><h1>LPCART CMS</h1></a>
	</div>
	<!--start-logo-->
	<!--bottom-header-->
	<div class="header-bottom">
		<div class="container">
			<div class="header">
				<div class="col-md-9 header-left">

					<div class="menu-container">
						<div class="menu">
							<?php new \app\widgets\menu\Menu([
								'tpl' => WIDGETS . '/menu/menu_tpl/menu.php',														
							]);?>
						</div>
					</div>
										
						<!-- <div class="top-nav"><ul class="memenu skyblue"><li class="active"><a href="index.html">Home</a></li>
							<li class="grid"><a href="#">Men</a>
								<div class="mepanel">
									<div class="row">
										<div class="col1 me-one">
											<h4>Shop</h4>
											<ul>
												<li><a href="products.html">New Arrivals</a></li>
												<li><a href="products.html">Blazers</a></li>
												<li><a href="products.html">Swem Wear</a></li>
												<li><a href="products.html">Accessories</a></li>
												<li><a href="products.html">Handbags</a></li>
												<li><a href="products.html">T-Shirts</a></li>
												<li><a href="products.html">Watches</a></li>
												<li><a href="products.html">My Shopping Bag</a></li>
											</ul>
										</div>
										<div class="col1 me-one">
											<h4>Style Zone</h4>
											<ul>
												<li><a href="products.html">Shoes</a></li>
												<li><a href="products.html">Watches</a></li>
												<li><a href="products.html">Brands</a></li>
												<li><a href="products.html">Coats</a></li>
												<li><a href="products.html">Accessories</a></li>
												<li><a href="products.html">Trousers</a></li>
											</ul>	
										</div>
										<div class="col1 me-one">
											<h4>Popular Brands</h4>
											<ul>
												<li><a href="products.html">499 Store</a></li>
												<li><a href="products.html">Fastrack</a></li>
												<li><a href="products.html">Casio</a></li>
												<li><a href="products.html">Fossil</a></li>
												<li><a href="products.html">Maxima</a></li>
												<li><a href="products.html">Timex</a></li>
												<li><a href="products.html">TomTom</a></li>
												<li><a href="products.html">Titan</a></li>
											</ul>		
										</div>
									</div>
								</div>
							</li>
							<li class="grid"><a href="#">Women</a>
								<div class="mepanel">
									<div class="row">
										<div class="col1 me-one">
											<h4>Shop</h4>
											<ul>
												<li><a href="products.html">New Arrivals</a></li>
												<li><a href="products.html">Blazers</a></li>
												<li><a href="products.html">Swem Wear</a></li>
												<li><a href="products.html">Accessories</a></li>
												<li><a href="products.html">Handbags</a></li>
												<li><a href="products.html">T-Shirts</a></li>
												<li><a href="products.html">Watches</a></li>
												<li><a href="products.html">My Shopping Bag</a></li>
											</ul>
										</div>
										<div class="col1 me-one">
											<h4>Style Zone</h4>
											<ul>
												<li><a href="products.html">Shoes</a></li>
												<li><a href="products.html">Watches</a></li>
												<li><a href="products.html">Brands</a></li>
												<li><a href="products.html">Coats</a></li>
												<li><a href="products.html">Accessories</a></li>
												<li><a href="products.html">Trousers</a></li>
											</ul>
										</div>
										<div class="col1 me-one">
											<h4>Popular Brands</h4>
											<ul>
												<li><a href="products.html">499 Store</a></li>
												<li><a href="products.html">Fastrack</a></li>
												<li><a href="products.html">Casio</a></li>
												<li><a href="products.html">Fossil</a></li>
												<li><a href="products.html">Maxima</a></li>
												<li><a href="products.html">Timex</a></li>
												<li><a href="products.html">TomTom</a></li>
												<li><a href="products.html">Titan</a></li>
											</ul>	
										</div>
									</div>
								</div>
							</li>
							<li class="grid"><a href="#">Kids</a>
								<div class="mepanel">
									<div class="row">
										<div class="col1 me-one">
											<h4>Shop</h4>
											<ul>
												<li><a href="products.html">New Arrivals</a></li>
												<li><a href="products.html">Blazers</a></li>
												<li><a href="products.html">Swem Wear</a></li>
												<li><a href="products.html">Accessories</a></li>
												<li><a href="products.html">Handbags</a></li>
												<li><a href="products.html">T-Shirts</a></li>
												<li><a href="products.html">Watches</a></li>
												<li><a href="products.html">My Shopping Bag</a></li>
											</ul>
										</div>
										<div class="col1 me-one">
											<h4>Style Zone</h4>
											<ul>
												<li><a href="products.html">Shoes</a></li>
												<li><a href="products.html">Watches</a></li>
												<li><a href="products.html">Brands</a></li>
												<li><a href="products.html">Coats</a></li>
												<li><a href="products.html">Accessories</a></li>
												<li><a href="products.html">Trousers</a></li>
											</ul>	
										</div>
										<div class="col1 me-one">
											<h4>Popular Brands</h4>
											<ul>
												<li><a href="products.html">499 Store</a></li>
												<li><a href="products.html">Fastrack</a></li>
												<li><a href="products.html">Casio</a></li>
												<li><a href="products.html">Fossil</a></li>
												<li><a href="products.html">Maxima</a></li>
												<li><a href="products.html">Timex</a></li>
												<li><a href="products.html">TomTom</a></li>
												<li><a href="products.html">Titan</a></li>
											</ul>	
										</div>
									</div>
								</div>
							</li>
							<li class="grid"><a href="typo.html">Blog</a>
							</li>
							<li class="grid"><a href="contact.html">Contact</a>
							</li>
						</ul></div> -->

				<div class="clearfix"> </div>
			</div>
			<div class="col-md-3 header-right"> 
				<div class="search-bar">
					<form action="search" method="get" autocomplete="off">
							<input type="text" class="typeahead" id="typeahead" name="s" placeholder="Поиск по товарам">
							<input type="submit" value="">
					</form>
					<!-- <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
					<input type="submit" value=""> -->
				</div>
			</div>
			<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--bottom-header-->
<?php //session_unset();?>
<?php //debug($_SESSION);?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php if (isset($_SESSION['error'])):?>
				<div class="alert alert-danger">
					<?php
					echo $_SESSION['error'];
					unset($_SESSION['error']);
					?>
				</div>
			<?php endif;?>
			<?php if (isset($_SESSION['success'])):?>
				<div class="alert alert-success">
					<?php echo $_SESSION['success']; unset($_SESSION['success']);?>
				</div>
			<?php endif;?>
		</div>
	</div>
</div>

<?php echo $content;?> 

	<!--information-starts-->
	<div class="information">
		<div class="container">
			<div class="infor-top">
				<div class="col-md-3 infor-left">
					<h3>Follow Us</h3>
					<ul>
						<li><a href="#"><span class="fb"></span><h6>Facebook</h6></a></li>
						<li><a href="#"><span class="twit"></span><h6>Twitter</h6></a></li>
						<li><a href="#"><span class="google"></span><h6>Google+</h6></a></li>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>Information</h3>
					<ul>
						<li><a href="#"><p>Specials</p></a></li>
						<li><a href="#"><p>New Products</p></a></li>
						<li><a href="#"><p>Our Stores</p></a></li>
						<li><a href="contact.html"><p>Contact Us</p></a></li>
						<li><a href="#"><p>Top Sellers</p></a></li>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>My Account</h3>
					<ul>
						<li><a href="account.html"><p>My Account</p></a></li>
						<li><a href="#"><p>My Credit slips</p></a></li>
						<li><a href="#"><p>My Merchandise returns</p></a></li>
						<li><a href="#"><p>My Personal info</p></a></li>
						<li><a href="#"><p>My Addresses</p></a></li>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>Store Information</h3>
					<h4>The company name,
						<span>Lorem ipsum dolor,</span>
						Glasglow Dr 40 Fe 72.</h4>
					<h5>+955 123 4567</h5>	
					<p><a href="mailto:example@email.com">contact@example.com</a></p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--information-end-->
	<!--footer-starts-->
	<div class="footer">
		<div class="container">
			<div class="footer-top">
				<div class="col-md-6 footer-left">
					<form>
						<input type="text" value="Enter Your Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Your Email';}">
						<input type="submit" value="Subscribe">
					</form>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>


	<div id="cart" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">корзина</h4>
				</div>
				<div class="modal-body">
				
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>
					<a href="cart/view" class="btn btn-primary not-empty-cart">Оформить заказ</a>
					<button type="button" class="btn btn-danger del-all-items not-empty-cart">Очистить корзину</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->


	<!--footer-end-->	
<?php $curr = \lpcart\App::$app->getProperty('currency');?>
<script>
var path = "<?= PATH;?>",
		cource = "<?= $curr['value'];?>",
		symbol_left = "<?= $curr['symbol_left'];?>",
		symbol_right = "<?= $curr['symbol_right'];?>";
</script>

<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.min.js.js"></script>
<script src="js/validator.min.js"></script>
<script src="js/typeahead.bundle.js"></script>
<!--Slider-Starts-Here-->
<script src="js/responsiveslides.min.js"></script>
<script>
	// You can also use "$(window).load(function() {"
	$(function () {
		// Slideshow 4
		$("#slider4").responsiveSlides({
			auto: true,
			pager: true,
			nav: true,
			speed: 500,
			namespace: "callbacks",
			before: function () {
				$('.events').append("<li>before event fired.</li>");
			},
			after: function () {
				$('.events').append("<li>after event fired.</li>");
			}
		});

	});
</script>
<!--End-slider-script-->

<script>
// Can also be used with $(document).ready()						
$(window).load(function() {
	if ($('.flexslider').length>0) {
		$('.flexslider').flexslider({
		animation: "slide",
		controlNav: "thumbnails"
		});
	}
});
</script>

<script>
	if ($('.menu_drop > li > ul').length>0) {
		$(function() {	
				var menu_ul = $('.menu_drop > li > ul'),
							menu_a  = $('.menu_drop > li > a');
				
				menu_ul.hide();
		
				menu_a.click(function(e) {
						e.preventDefault();
						if(!$(this).hasClass('active')) {
								menu_a.removeClass('active');
								menu_ul.filter(':visible').slideUp('normal');
								$(this).addClass('active').next().stop(true,true).slideDown('normal');
						} else {
								$(this).removeClass('active');
								$(this).next().stop(true,true).slideUp('normal');
						}
				});
		
		})
	};
</script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--start-menu-->

<script src="js/megamenu.js"></script>
<!--dropdown-->
<script src="js/jquery.easydropdown.js"></script>
<script src="js/main.js"></script>		
<!-- FlexSlider -->
<script src="js/imagezoom.js"></script>
<script defer src="js/jquery.flexslider.js"></script>

</body>
</html>