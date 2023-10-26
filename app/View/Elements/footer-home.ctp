
<?php echo $this->element('footer-content');?>

<a href="#" class="back-to-top"><img src="<?php echo $base_url;?>images/scrolltop.png" alt=""></a> 

<script>

<?php if($this->request->params['controller']=='Registers' || $this->request->params['controller']=='registers'){?>
$("#RegisterDob").datepicker({
	      maxDate: 0,
          changeYear: true,
          changeMonth: true,
		  yearRange: (new Date).getFullYear()-130+':'+(new Date).getFullYear(),		  
        }); 
  <?php }?>         
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
<script src="<?php echo $base_url;?>js/jquery.responsiveTabs.js" type="text/javascript"></script>
<script type="text/javascript">
$('#responsiveTabsDemo').responsiveTabs({
startCollapsed: 'accordion'
});
</script>


<script type="text/javascript" src="<?php echo $base_url;?>js/script.js"></script> 



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

<!--<script src="<?php echo $base_url;?>js/selectbox.js"></script>-->
<script>
function showsearchpan(){
  $('.searchField').toggle(300);
};
</script>
<script type="text/javascript">var jsBaseUrl="<?php echo $base_url; ?>";</script>
<script type="text/javascript" src="<?php echo $base_url;?>myadmin/js/validation.js"></script> 

</body>
</html>