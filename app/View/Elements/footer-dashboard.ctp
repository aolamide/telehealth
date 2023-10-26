<!--===================================Footer Section===================================-->
<?php echo $this->element('footer-content');?>

<a href="#" class="back-to-top"><img src="<?php echo $base_url; ?>images/scrolltop.png" alt=""></a> 
<?php 
if(($this->request->params['controller']=='Dashboards' || $this->request->params['controller']=='dashboards' || $this->request->params['controller']=='Appdetails' || $this->request->params['controller']=='appdetails')&& ($this->request->params['action']=='ManageAvailability' || $this->request->params['action']=='AddAppointment' || $this->request->params['action']=='EditAppointment' || $this->request->params['action']=='EditProfilePatient' || $this->request->params['action']=='editprofiledoctor' || $this->request->params['action']=='fulltimeavilability' || $this->request->params['action']=='selectdate')){?>
<script type="text/javascript">
  $(".datepicker").datepicker({
                    minDate: 0,
                    changeYear: true,
                    changeMonth: true,
                });

    $(".datepicker1").datepicker({
                    maxDate: 0,
                    changeYear: true,
                    changeMonth: true,
                });

  $(".timepicker").timepicker({
                    showInputs: false,
                    showMeridian: false,
                });
</script>
<?php }?>
<?php 
if(($this->request->params['controller']=='Appdetails' || $this->request->params['controller']=='appdetails')&& ($this->request->params['action']=='feedback')){?>
<script type="text/javascript">
jQuery(document).ready(function () {
        $("#input-21f").rating({
            starCaptions: function(val) {
                /*if (val < 3) {
                    return val;
                } else {
                    return 'high';
                }*/
				return val;
            },
            starCaptionClasses: function(val) {
                if (val < 3) {
                    return 'label label-danger';
                } else {
                    return 'label label-success';
                }
            },
            hoverOnClear: false
        });
	});
</script>
<?php }?>
<script>            
jQuery(document).ready(function() {
  var offset = 220;
  var duration = 500;
  jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() > offset) {
      jQuery('.back-to-top').fadeIn(duration);
    } else {
      jQuery('.back-to-top').fadeOut(duration);
    }
  });
  
  jQuery('.back-to-top').click(function(event) {
    event.preventDefault();
    jQuery('html, body').animate({scrollTop: 0}, duration);
    return false;
  })
});
</script>

<script src="<?php echo $base_url; ?>js/jquery.responsiveTabs.js" type="text/javascript"></script>
<script type="text/javascript">
$('#responsiveTabsDemo').responsiveTabs({
startCollapsed: 'accordion'
});
</script>



<script type="text/javascript">

$(window).load(function() {
    $("#flexiselDemo1").flexisel();
    $("#flexiselDemo2").flexisel({
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: { 
            portrait: { 
                changePoint:480,
                visibleItems: 1
            }, 
            landscape: { 
                changePoint:640,
                visibleItems: 2
            },
            tablet: { 
                changePoint:768,
                visibleItems: 3
            }
        }
    });
    $("#flexiselDemo3").flexisel({
        visibleItems: 3,
        animationSpeed: 500,
        autoPlay: false,
        autoPlaySpeed: 3000,            
        pauseOnHover: true,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: { 
            portrait: { 
                changePoint:480,
                visibleItems: 1
            }, 
            landscape: { 
                changePoint:640,
                visibleItems: 1
            },
            tablet: { 
                changePoint:768,
                visibleItems: 2
            }
        }
    });

    $("#flexiselDemo4").flexisel({
        clone:false
    });
    
});
</script>
 <?php 
if(($this->request->params['controller']=='Dashboards' || $this->request->params['controller']=='dashboards') && ($this->request->params['action']!='AddAppointment' && $this->request->params['action']!='EditAppointment' && $this->request->params['action']!='EditProfilePatient')){?> 
    <!-- <script src="<?php echo $base_url; ?>js/selectbox.js"></script> -->
  <?php }?>
<script>
function showsearchpan(){
  $('.searchField').toggle(300);
};
</script>
<script type="text/javascript">var jsBaseUrl="<?php echo $base_url;?>";</script>

<script src="<?php echo $base_url; ?>myadmin/js/validation.js"></script>

</body>
</html>