</section>
<!-- container section start -->

<!-- javascripts -->
<script src="js/jquery.js"></script>
<script src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
<!-- bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- nice scroll -->
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<!-- charts scripts -->
<script src="js/jquery.sparkline.js" type="text/javascript"></script>
<script src="js/owl.carousel.js" ></script>
<!-- jQuery full calendar -->
<!--script for this page only-->
<script src="js/calendar-custom.js"></script>
<!-- custom select -->
<script src="js/jquery.customSelect.min.js" ></script>
<!--custome script for all page-->
<script src="js/scripts.js"></script>
<!-- custom script for this page-->
<script src="js/sparkline-chart.js"></script>
<script src="js/easy-pie-chart.js"></script>

<script>

    //knob
    $(function() {
        $(".knob").knob({
            'draw' : function () {
                $(this.i).val(this.cv + '%')
            }
        })
    });

    //carousel
    $(document).ready(function() {
        $("#owl-slider").owlCarousel({
            navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true

        });
    });

    //custom select box

    $(function(){
        $('select.styled').customSelect();
    });

    var btnUpdate = document.querySelector("btnUpdate");
    btnUpdate.addEventListener("click", function(e) {
        e.preventDefault();
        console.log("Hello, World!");
    })
</script>

    </body>
</html>
