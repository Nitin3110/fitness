<!--copy right-->
<div class="copyright">
    <div class="container">
        <div class="copy-left">
            <p> &copy; <?= date('Y'); ?> MBF. All Rights Reserved | Design by <a href="http://nitinnathani.com/"> Nitin Nathani</a></p>
        </div>
        <div class="copy-right">
            <ul>
                <li><a class="fb1" href="#"></a></li>
                <li><a class="fb2" href="#"></a></li>
                <li><a class="fb3" href="#"></a></li>
                <li><a class="fb4" href="#"></a></li>
                <li><a class="fb5" href="#"></a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!--//copy right-->
<!-- smooth scrolling -->
<script type="text/javascript">
    $(document).ready(function() {
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
	
	function myMap() {
		var mapOptions = {
			center: new google.maps.LatLng(51.5, -0.12),
			zoom: 10,
			mapTypeId: google.maps.MapTypeId.HYBRID
		}
	var map = new google.maps.Map(document.getElementById("map"), mapOptions);
	} 
</script>
<a href="#" id="toTop" style="display: none;"><span id="toTopHover"></span> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->
<!-- for bootstrap working -->
<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->


<a href="#" id="toTop">To Top</a></body>

</html>