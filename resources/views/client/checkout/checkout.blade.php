@extends('client.layout.master')

@section('list')
	<li class="nav-item mr-lg-3 mb-lg-0 mb-2">
		<a class="nav-link" href="{{ route('client_index') }}">Trang chủ
			<span class="sr-only">(current)</span>
		</a>
	</li>
	<li class="nav-item dropdown mr-lg-3 mb-lg-0 mb-2">
		<a class="nav-link dropdown-toggle" href="{{ route('client_product') }}">
			Điện thoại
		</a>
		<div class="dropdown-menu">
			<div class="agile_inner_drop_nav_info p-4">
				<div class="row">
					<div class="col-sm-6 multi-gd-img">
						<ul class="multi-column-dropdown">
							<li>
								<a href="{{ route('client_product') }}">Iphone</a>
							</li>
							<li>
								<a href="{{ route('client_product') }}">Samsung</a>
							</li>
						</ul>
					</div>
					<div class="col-sm-6 multi-gd-img">
						<ul class="multi-column-dropdown">
							<li>
								<a href="{{ route('client_product') }}">Oppo</a>
							</li>
							<li>
								<a href="{{ route('client_product') }}">Vinsmart</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</li>
	<li class="nav-item dropdown mr-lg-3 mb-lg-0 mb-2">
		<a class="nav-link dropdown-toggle" href="{{ route('client_product') }}">
			Smart Watch
		</a>
		<div class="dropdown-menu">
			<div class="agile_inner_drop_nav_info p-4">
				<div class="row">
					<div class="col-sm-6 multi-gd-img">
						<ul class="multi-column-dropdown">
							<li>
								<a href="{{ route('client_product') }}">Apple</a>
							</li>
							<li>
								<a href="{{ route('client_product') }}">Huawei</a>
							</li>
						</ul>
					</div>
					<div class="col-sm-6 multi-gd-img">
						<ul class="multi-column-dropdown">
							<li>
								<a href="{{ route('client_product') }}">Realme</a>
							</li>
							<li>
								<a href="{{ route('client_product') }}">Samsung</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</li>
	<li class="nav-item dropdown mr-lg-3 mb-lg-0 mb-2">
		<a class="nav-link dropdown-toggle" href="{{ route('client_product') }}">
			Laptop
		</a>
		<div class="dropdown-menu">
			<div class="agile_inner_drop_nav_info p-4">
				<div class="row">
					<div class="col-sm-6 multi-gd-img">
						<ul class="multi-column-dropdown">
							<li>
								<a href="{{ route('client_product') }}">Dell</a>
							</li>
							<li>
								<a href="{{ route('client_product') }}">HP</a>
							</li>
						</ul>
					</div>
					<div class="col-sm-6 multi-gd-img">
						<ul class="multi-column-dropdown">
							<li>
								<a href="{{ route('client_product') }}">Asus</a>
							</li>
							<li>
								<a href="{{ route('client_product') }}">Mac</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</li>
	<li class="nav-item mr-lg-3 mb-lg-0 mb-2">
		<a class="nav-link" href="{{ route('client_news') }}">Tin tức</a>
	</li>
	<li class="nav-item mr-lg-3 mb-lg-0 mb-2">
		<a class="nav-link" href="{{ route('client_about') }}">Về chúng tôi</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="{{ route('client_contact') }}">Liên hệ ngay</a>
	</li>
@endsection

@section('content')
	<!-- banner-2 -->
	<div class="page-head_agile_info_w3l">

	</div>
	<!-- //banner-2 -->
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.html">Home</a>
						<i>|</i>
					</li>
					<li>Checkout</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- checkout page -->
	<div class="privacy py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>C</span>heckout
			</h3>
			<!-- //tittle heading -->
			<div class="checkout-right">
				<h4 class="mb-sm-4 mb-3">Your shopping cart contains:
					<span>3 Products</span>
				</h4>
				<div class="table-responsive">
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>SL No.</th>
								<th>Product</th>
								<th>Quality</th>
								<th>Product Name</th>

								<th>Price</th>
								<th>Remove</th>
							</tr>
						</thead>
						<tbody>
							<tr class="rem1">
								<td class="invert">1</td>
								<td class="invert-image">
									<a href="single.html">
										<img src="{{ URL::asset('project/images/a.jpg') }}" alt=" " class="img-responsive">
									</a>
								</td>
								<td class="invert">
									<div class="quantity">
										<div class="quantity-select">
											<div class="entry value-minus">&nbsp;</div>
											<div class="entry value">
												<span>1</span>
											</div>
											<div class="entry value-plus active">&nbsp;</div>
										</div>
									</div>
								</td>
								<td class="invert">Back Cover</td>
								<td class="invert">$259</td>
								<td class="invert">
									<div class="rem">
										<div class="close1"> </div>
									</div>
								</td>
							</tr>
							<tr class="rem2">
								<td class="invert">2</td>
								<td class="invert-image">
									<a href="single2.html">
										<img src="{{ URL::asset('project/images/a4.jpg') }}" alt=" " class="img-responsive">
									</a>
								</td>
								<td class="invert">
									<div class="quantity">
										<div class="quantity-select">
											<div class="entry value-minus">&nbsp;</div>
											<div class="entry value">
												<span>1</span>
											</div>
											<div class="entry value-plus active">&nbsp;</div>
										</div>
									</div>
								</td>
								<td class="invert">Cordless Trimmer</td>
								<td class="invert">$1,999</td>
								<td class="invert">
									<div class="rem">
										<div class="close2"> </div>
									</div>
								</td>
							</tr>
							<tr class="rem3">
								<td class="invert">3</td>
								<td class="invert-image">
									<a href="single.html">
										<img src="{{ URL::asset('project/images/a3.jpg') }}" alt=" " class="img-responsive">
									</a>
								</td>
								<td class="invert">
									<div class="quantity">
										<div class="quantity-select">
											<div class="entry value-minus">&nbsp;</div>
											<div class="entry value">
												<span>1</span>
											</div>
											<div class="entry value-plus active">&nbsp;</div>
										</div>
									</div>
								</td>
								<td class="invert">Nikon Camera</td>
								<td class="invert">$37,490</td>
								<td class="invert">
									<div class="rem">
										<div class="close3"> </div>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="checkout-left">
				<div class="address_form_agile mt-sm-5 mt-4">
					<h4 class="mb-sm-4 mb-3">Add a new Details</h4>
					<form action="{{route('client_payment')}}" method="post" class="creditly-card-form agileinfo_form">
						@csrf
						<div class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">
								<div class="first-row">
									<div class="controls form-group">
										<input class="billing-address-name form-control" type="text" name="name" placeholder="Full Name" required="">
									</div>
									<div class="w3_agileits_card_number_grids">
										<div class="w3_agileits_card_number_grid_left form-group">
											<div class="controls">
												<input type="text" class="form-control" placeholder="Mobile Number" name="number" required="">
											</div>
										</div>
										<div class="w3_agileits_card_number_grid_right form-group">
											<div class="controls">
												<input type="text" class="form-control" placeholder="Landmark" name="landmark" required="">
											</div>
										</div>
									</div>
									<div class="controls form-group">
										<input type="text" class="form-control" placeholder="Town/City" name="city" required="">
									</div>
									<div class="controls form-group">
										<select class="option-w3ls">
											<option>Select Address type</option>
											<option>Office</option>
											<option>Home</option>
											<option>Commercial</option>

										</select>
									</div>
								</div>
								<button class="submit check_out btn">Delivery to this Address</button>
							</div>
						</div>
					</form>
					<div class="checkout-right-basket">
						<a href="{{route('client_payment')}}">Make a Payment
							<span class="far fa-hand-point-right"></span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //checkout page -->

	<!-- middle section -->
	<div class="join-w3l1 py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<div class="row">
				<div class="col-lg-6">
					<div class="join-agile text-left p-4">
						<div class="row">
							<div class="col-sm-7 offer-name">
								<h6>Smooth, Rich & Loud Audio</h6>
								<h4 class="mt-2 mb-3">Branded Headphones</h4>
								<p>Sale up to 25% off all in store</p>
							</div>
							<div class="col-sm-5 offerimg-w3l">
								<img src="{{ URL::asset('project/images/off1.png') }}" alt="" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 mt-lg-0 mt-5">
					<div class="join-agile text-left p-4">
						<div class="row ">
							<div class="col-sm-7 offer-name">
								<h6>A Bigger Phone</h6>
								<h4 class="mt-2 mb-3">Smart Phones 5</h4>
								<p>Free shipping order over $100</p>
							</div>
							<div class="col-sm-5 offerimg-w3l">
								<img src="{{ URL::asset('project/images/off2.png') }}" alt="" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- middle section -->
@endsection

@section('js')
	<!-- js-files -->
	<!-- jquery -->
	<script src="{{ URL::asset('project/js/jquery-2.2.3.min.js') }}"></script>
	<!-- //jquery -->

	<!-- nav smooth scroll -->
	<script>
		$(document).ready(function () {
			$(".dropdown").hover(
				function () {
					$('.dropdown-menu', this).stop(true, true).slideDown("fast");
					$(this).toggleClass('open');
				},
				function () {
					$('.dropdown-menu', this).stop(true, true).slideUp("fast");
					$(this).toggleClass('open');
				}
			);
		});
	</script>
	<!-- //nav smooth scroll -->

	<!-- popup modal (for location)-->
	<script src="{{ URL::asset('project/js/jquery.magnific-popup.js') }}"></script>
	<script>
		$(document).ready(function () {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>
	<!-- //popup modal (for location)-->

	<!-- cart-js -->
	<script src="{{ URL::asset('project/js/minicart.js') }}"></script>
	<script>
		paypals.minicarts.render(); //use only unique class names other than paypals.minicarts.Also Replace same class name in css and minicart.min.js

		paypals.minicarts.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});
	</script>
	<!-- //cart-js -->

	<!-- password-script -->
	<script>
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>
	<!-- //password-script -->

	<!-- quantity -->
	<script>
		$('.value-plus').on('click', function () {
			var divUpd = $(this).parent().find('.value'),
				newVal = parseInt(divUpd.text(), 10) + 1;
			divUpd.text(newVal);
		});

		$('.value-minus').on('click', function () {
			var divUpd = $(this).parent().find('.value'),
				newVal = parseInt(divUpd.text(), 10) - 1;
			if (newVal >= 1) divUpd.text(newVal);
		});
	</script>
	<!--quantity-->
	<script>
		$(document).ready(function (c) {
			$('.close1').on('click', function (c) {
				$('.rem1').fadeOut('slow', function (c) {
					$('.rem1').remove();
				});
			});
		});
	</script>
	<script>
		$(document).ready(function (c) {
			$('.close2').on('click', function (c) {
				$('.rem2').fadeOut('slow', function (c) {
					$('.rem2').remove();
				});
			});
		});
	</script>
	<script>
		$(document).ready(function (c) {
			$('.close3').on('click', function (c) {
				$('.rem3').fadeOut('slow', function (c) {
					$('.rem3').remove();
				});
			});
		});
	</script>
	<!-- //quantity -->

	<!-- smoothscroll -->
	<script src="{{ URL::asset('project/js/SmoothScroll.min.js') }}"></script>
	<!-- //smoothscroll -->

	<!-- start-smooth-scrolling -->
	<script src="{{ URL::asset('project/js/move-top.js') }}"></script>
	<script src="{{ URL::asset('project/js/easing.js') }}"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->

	<!-- smooth-scrolling-of-move-up -->
	<script>
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->

	<!-- for bootstrap working -->
	<script src="{{ URL::asset('project/js/boostrap.js') }}"></script>
	<!-- //for bootstrap working -->
	<!-- //js-files -->
@endsection