<div class="box">
    <div class="box-header">
        <h3 class="box-title">Social Icon Details</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered">
            
            <tr>
                <td><?php echo __('Social Name'); ?></td>
                <td><?php echo h($socialIcon['SocialIcon']['social_name']); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Social Image'); ?></td>
                <td><img src="<?php echo $this->webroot.'files/socialicon/'.$socialIcon['SocialIcon']['social_img']; ?>" title="<?php echo h($socialIcon['SocialIcon']['social_name']); ?>" style="width:100px;height:100px" ></td>
            </tr>
             <tr>
                <td><?php echo __('Social Link'); ?></td>
                <td><?php echo h($socialIcon['SocialIcon']['social_link']); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Order No'); ?></td>
                <td><?php echo h($socialIcon['SocialIcon']['orderno']); ?></td>
            </tr>
             <tr>
                <td><?php echo __('Created'); ?></td>
                <td><?php echo date('d/m/Y',strtotime($socialIcon['SocialIcon']['created'])); ?></td>    
            </tr>
        </table>
    </div><!-- /.box-body -->
    
</div><!-- /.box -->


