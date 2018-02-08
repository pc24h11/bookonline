<?php 

	use Zend\Session\Container;

	$cartSS			= new Container(BOOKONLINE_KEY . '_cart');
	$total			= !empty($cartSS->quantity)	? array_sum($cartSS->quantity) : 0;
	$linkViewCart	= $this->linkCart();
?>

<div class="cart-position">
	<div class="cart-inner">
		<div id="cart" class="">
			<div class="heading">
				<a href="<?php echo $linkViewCart;?>"><span class="link_a"> 
					<i class="fa fa-shopping-cart"></i> <b>Cart:</b>
					<span class="sc-button"></span> <span id="cart-total2"><?php echo $total;?></span> 
				</span>
				</a>
			</div>
		</div>
	</div>
</div>