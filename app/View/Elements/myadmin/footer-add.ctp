    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- InputMask -->
        <script src="<?php echo $base_url;?>myadmin/js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>myadmin/js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>myadmin/js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
        <!-- date-range-picker -->
        <script src="<?php echo $base_url;?>myadmin/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- bootstrap color picker -->
        <script src="<?php echo $base_url;?>myadmin/js/plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
        <!-- bootstrap time picker -->
        <script src="<?php echo $base_url;?>myadmin/js/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo $base_url;?>myadmin/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo $base_url;?>myadmin/js/AdminLTE/demo.js" type="text/javascript"></script>

         <script src="<?php echo $base_url;?>myadmin/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- Page script -->
        <script type="text/javascript">
            $(function() {
            	$("#MasterUserDob").datepicker({
            		maxDate: 0,
            		changeYear: true,
            		changeMonth: true,
					yearRange: (new Date).getFullYear()-130+':'+(new Date).getFullYear(),
            	});
                $("#MasterDoctorDob").datepicker({
                    maxDate: 0,
                    changeYear: true,
                    changeMonth: true,
					yearRange: (new Date).getFullYear()-130+':'+(new Date).getFullYear(),
                });
                $(".datepicker").datepicker({
                    minDate: 0,
                    changeYear: true,
                    changeMonth: true,
					yearRange: (new Date).getFullYear()-130+':'+(new Date).getFullYear(),
                });
                //Datemask dd/mm/yyyy
                $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
                 //Datemask dd/mm/yyyy
               // $("#MasterUserDob").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
                //Datemask2 mm/dd/yyyy
                $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
                //Money Euro
                $("[data-mask]").inputmask();
                //Date range picker
                $('#reservation').daterangepicker();
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
                //Date range as a button
                $('#daterange-btn').daterangepicker(
                        {
                            ranges: {
                                'Today': [moment(), moment()],
                                'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                                'Last 7 Days': [moment().subtract('days', 6), moment()],
                                'Last 30 Days': [moment().subtract('days', 29), moment()],
                                'This Month': [moment().startOf('month'), moment().endOf('month')],
                                'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                            },
                            startDate: moment().subtract('days', 29),
                            endDate: moment()
                        },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
                );

                //iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal',
                    radioClass: 'iradio_minimal'
                });
                //Red color scheme for iCheck
                $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                    checkboxClass: 'icheckbox_minimal-red',
                    radioClass: 'iradio_minimal-red'
                });
                //Flat red color scheme for iCheck
                $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                    checkboxClass: 'icheckbox_flat-red',
                    radioClass: 'iradio_flat-red'
                });

                //Colorpicker
                $(".my-colorpicker1").colorpicker();
                //color picker with addon
                $(".my-colorpicker2").colorpicker();

                //Timepicker
                $(".timepicker").timepicker({
                    showInputs: false,
                    showMeridian: false,
                });
            });
        </script>
        <?php if($this->request->params['controller']=='SocialIcons'){?>
        <script type="text/javascript">

            $('#is_icon').on('ifChecked', function(event){
                $("#social_icon").attr('style','display:block');
				$("#SocialIconSocialIcon").attr('required','true');
                $("#social_image").attr('style','display:none');
				$("#SocialIconSocialImg").removeAttr('required');
                $("#hid_div").attr('style','display:none');
            });

            // Script Radio button
            $('#is_iamge').on('ifChecked', function(event){
                $("#social_image").css("display",'block');
				$("#SocialIconSocialImg").attr('required','true');
                $("#hid_div").css("display",'block');
                $("#social_icon").css("display",'none');
				$("#SocialIconSocialIcon").removeAttr('required');
            });
        </script>
        <?php }?>
         <?php if($this->request->params['controller']=='MasterMenus'){?>
        <script type="text/javascript">

            $('#assigntype10').on('ifChecked', function(event){
                $.ajax({
                    type:"POST",
                    url: "<?php echo $base_url;?>/MasterMenus/getpagelink",
                    data:"page=yes",
                    success: function(data){
                        if(data){
                            $(".customerLink").html(data);
                        }
                    }
                });
               
            });
            // Script Radio button
            $('#assigntype11').on('ifChecked', function(event){
                $.ajax({
                    type:"POST",
                    url: "<?php echo $base_url;?>/MasterMenus/getpagelink",
                    data:"page=no",
                    success: function(data){
                        if(data){
                            $(".customerLink").html(data);
                        }
                    }
                });
            });
        </script>
        <?php }?>
        <script type="text/javascript">var jsBaseUrl="<?php echo $base_url; ?>";</script>
<script src="<?php echo $base_url;?>myadmin/js/validation.js" type="text/javascript"></script>
    </body>
</html>
