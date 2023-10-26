<?php
  $patientDetail=$this->Custom->userDet($feedbackdet['Feedback']['user_id']);
  $docDetail=$this->Custom->userDet($feedbackdet['Feedback']['doctorid']);
?>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Contact Request Detail</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered">
            
           <tr>
                <td><?php echo __('Patient'); ?></td>
                <td>
                    <?php echo h(ucwords($patientDetail)); ?>
                    
                </td>
          </tr>
          <tr>
                <td><?php echo __('Doctor'); ?></td>
                <td>
                    <?php echo h(ucwords($docDetail)); ?>
                </td>
          </tr>
           <tr>
               <td valign="top"><?php echo __('Feedback'); ?></td>
                <td>
                   <?php echo stripslashes($feedbackdet['Feedback']['feedback']); ?> 
                </td>
           </tr>
            <tr>
               <td><?php echo __('Rate'); ?></td>
                <td>
                	<?php echo h($feedbackdet['Feedback']['rate']); ?>
                </td>
           </tr>
           
           
           
        </table>
    </div><!-- /.box-body -->
    
</div><!-- /.box -->
