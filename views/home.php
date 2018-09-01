<div class="about">
	<div class="container">
	<!---728x90--->
		<h3 class="tittle">ABOUT US</h3>
		<div class="about-grids">
			<div class="col-md-12 about-left-two">
				<h4>Temporibus autem quibusdam et aut officiis</h4>
				<p>Nam libero tempore, cum soluta nobis est 
				eligendi optio cumque nihil impedit quo minus 
				id quod maxime placeat facere possimus, 
				omnis voluptas assumenda est, omnis dolor repellendus.  
				Itaque earum rerum hic 
				tenetur a sapiente delectus, ut aut reiciendis 
				voluptatibus maiores alias consequatur 
				aut perferendis doloribus asperiores repellat.</p>
			</div>
			<div class="clearfix"></div>
		</div>
		<!---728x90--->
	</div>
</div>

<div class="abt-bottom">
	<div class="container">
		<h2 class="tittle">Our team</h2>
		
		<?php
		
			$result = $db->query("select * from team");
			// echo "<pre>";
			// print_r($result);
			// echo "</pre>";
		
		?>
		
		<div class="team-grids"> 
			
			<div class="container">
				
				<?php while($row = mysqli_fetch_array($result)): ?>
				<div class="column dt-sc-one-fourth  space">
					<div class="dt-sc-team type2">
						<div class="team-thumb"><img alt="Please specify image url." title="Selena" src="images/team/<?= $row['images'] ?>">
							<h3><span><?= $row['name'] ?></span></h3>
							<div class="team-detail">
								<h4><?= $row['description'] ?></h4>
								<ul>
									<li><span class="fa fa-trophy"></span> <b>Awards:</b> 5 </li>
									<li><span class="fa fa-mortar-board"></span> Meditation, Yoga </li>
									<li><span class="fa fa-certificate"></span> <b>Experience:</b> 3+ years </li>
								</ul>
							</div>
						</div>
						<ul class="dt-sc-social-icons">
							<li class="twitter"><a class="fa fa-twitter" href="#" title="Twitter"></a></li>
							<li class="facebook"><a class="fa fa-facebook" href="#" title="Facebook"></a></li>
							<li class="google"><a class="fa fa-google-plus" href="#" title="Google"></a></li>
						</ul>
					</div>
				</div>
				<?php endwhile; ?>
			</div>
		</div>
		<!---728x90--->
	</div>
</div>

<div class="testimonial">
<div class="container">
	<h2 class="tittle"><strong>Testimonial</strong></h2>
    <div class="row">
        <div class="col-sm-12">
            
            <div class="seprator"></div>
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
			<?php
			$i = 1;
				$result = $db->query("select * from testimonials");
				while($row = mysqli_fetch_array($result)) :
				
			?>
                <!-- Wrapper for slides -->
                
                    <div class="item <?php  if($i==1) { echo 'active'; } ?>">
                        <div class="row" style="padding: 20px">
						<div class="col-sm-6">
							<div class="testimonial_video">
							 <iframe width="420" height="315"
src="https://www.youtube.com/embed/<?php echo $row['video']; ?>">
</iframe> 
								 
							</div>
							</div>
							<div class="col-sm-6">
                            <button style="border: none;"><i class="fa fa-quote-left testimonial_fa" aria-hidden="true"></i></button>
                            <p class="testimonial_para"><?php echo $row['user_message']; ?></p><br>
                            <div class="row">
                                <div class="col-sm-2">
                                    <img src="http://demos1.showcasedemos.in/jntuicem2017/html/v1/assets/images/jack.jpg" class="img-responsive" style="width: 80px">
                                </div>
                                <div class="col-sm-10">
                                    <h4><strong><?php echo $row['user_name']; ?></strong></h4>
                                    <p class="testimonial_subtitle"><span>Chlinical Chemistry Technologist</span><br>
                                        <span>Officeal All Star Cafe</span>
                                    </p>
                                </div>
                            </div>
							</div>
							
                        </div>
                    </div>
			<?php
				$i++;
				endwhile;
			?>
			
            </div>
            </div>
            <div class="controls testimonial_control pull-right">
                <a class="left fa fa-chevron-left btn btn-default testimonial_btn" href="#carousel-example-generic" data-slide="prev"></a>

                <a class="right fa fa-chevron-right btn btn-default testimonial_btn" href="#carousel-example-generic" data-slide="next"></a>
            </div>
        </div>
    </div>
</div>
</div>



<div class="membership">
<div class="container">
<div class="row">
<div class="column col-sm-3 space first">
    <div class="dt-sc-programs">
        <div class="dt-sc-pro-thumb"><img src="http://fitnesszonewp.wpengine.com/wp-content/uploads/2015/02/product8-420x287.jpg" alt="Muscle Build Pro"></div>
        <div class="dt-sc-pro-detail">
            <div class="dt-sc-pro-content">
                <div class="dt-sc-pro-title">
                    <h3>Muscle Build Pro</h3><span>trial program</span></div>
                <ul class="dt-sc-fancy-list   circle-o">
                    <li>Lorem ipsum dolor sit</li>
                    <li>Praesent convallis nibh</li>
                    <li>Phasellus auctor augue</li>
                </ul>
            </div>
            <div class="dt-sc-pro-price">
                <p class="pro-price-content">
				<i class="fas fa-rupee-sign"></i>
				<sup>R</sup> 99.99/<span>1 Years</span></p><a class="dt-sc-button small" href=""><span data-hover="Enroll Now">Enroll Now</span></a></div>
        </div>
    </div>
</div>
<div class="column col-sm-3 space first">
    <div class="dt-sc-programs">
        <div class="dt-sc-pro-thumb"><img src="http://fitnesszonewp.wpengine.com/wp-content/uploads/2015/02/product8-420x287.jpg" alt="Muscle Build Pro"></div>
        <div class="dt-sc-pro-detail">
            <div class="dt-sc-pro-content">
                <div class="dt-sc-pro-title">
                    <h3>Muscle Build Pro</h3><span>1 month training program</span></div>
                <ul class="dt-sc-fancy-list   circle-o">
                    <li>Lorem ipsum dolor sit</li>
                    <li>Praesent convallis nibh</li>
                    <li>Phasellus auctor augue</li>
                </ul>
            </div>
            <div class="dt-sc-pro-price">
                <p class="pro-price-content"><sup>R</sup> 99.99/<span>1 Years</span></p><a class="dt-sc-button small" href=""><span data-hover="Enroll Now">Enroll Now</span></a></div>
        </div>
    </div>
</div>
<div class="column col-sm-3 space first">
    <div class="dt-sc-programs">
        <div class="dt-sc-pro-thumb"><img src="http://fitnesszonewp.wpengine.com/wp-content/uploads/2015/02/product8-420x287.jpg" alt="Muscle Build Pro"></div>
        <div class="dt-sc-pro-detail">
            <div class="dt-sc-pro-content">
                <div class="dt-sc-pro-title">
                    <h3>Muscle Build Pro</h3><span>6 months training program</span></div>
                <ul class="dt-sc-fancy-list   circle-o">
                    <li>Lorem ipsum dolor sit</li>
                    <li>Praesent convallis nibh</li>
                    <li>Phasellus auctor augue</li>
                </ul>
            </div>
            <div class="dt-sc-pro-price">
                <p class="pro-price-content"><sup>R</sup> 999.99/<span>1 Years</span></p><a class="dt-sc-button small" href=""><span data-hover="Enroll Now">Enroll Now</span></a></div>
        </div>
    </div>
</div>
<div class="column col-sm-3 space first">
    <div class="dt-sc-programs">
        <div class="dt-sc-pro-thumb"><img src="http://fitnesszonewp.wpengine.com/wp-content/uploads/2015/02/product8-420x287.jpg" alt="Muscle Build Pro"></div>
        <div class="dt-sc-pro-detail">
            <div class="dt-sc-pro-content">
                <div class="dt-sc-pro-title">
                    <h3>Muscle Build Pro</h3><span>1 yr training program</span></div>
                <ul class="dt-sc-fancy-list   circle-o">
                    <li>Lorem ipsum dolor sit</li>
                    <li>Praesent convallis nibh</li>
                    <li>Phasellus auctor augue</li>
                </ul>
            </div>
            <div class="dt-sc-pro-price">
                <p class="pro-price-content"><sup>R</sup> 9999.99/<span>1 Years</span></p><a class="dt-sc-button small" href=""><span data-hover="Enroll Now">Enroll Now</span></a></div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<div class="clear"></div>
<!--footer-top-->
<div class="footer-top">
    <div class="container">
        <div class="footer-left">
            <h3>INFORMATION</h3>
            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
            <ul>
                <li>The company name <span>Lorem ipsum dolor,</span>New Delhi. </li>
                <li>1234567890 </li>
                <li><a href="mailto:info@example.com">contact@example.com</a> </li>
            </ul>
        </div>
        <div class="footer-right">
            <h3>Map</h3>
            <div id="map"></div>
            <script>
                function initMap() {
                    var uluru = {lat: 28.631451, lng: 77.216667};
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 10,
                        center: uluru
                    });
                    var marker = new google.maps.Marker({
                        position: uluru,
                        map: map
                    });
                }
            </script>
            <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD-htrm8sYik3TqUotBzYL_io5lHyqa8yY&callback=initMap">
            </script>
			<style>
				 #map {
				   width: 100%;
				   height: 400px;
				   background-color: grey;
				 }

			</style>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!--//footer-top-->
