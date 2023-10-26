<div class="box">
    <div class="box-header">
        <h3 class="box-title">Product Detail</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered">
            
           <tr>
                <td><?php echo __('Title'); ?></td>
                <td>
                    <?php echo h($product['Product']['title']); ?>
                    
                </td>
          </tr>
          <tr>
                <td><?php echo __('Slug'); ?></td>
                <td>
                    <?php echo h($product['Product']['slug']); ?>
                </td>
          </tr>
           <tr>
               <td><?php echo __('Image'); ?></td>
                <td>
                   <img src="<?php echo $base_url;?>files/product/<?php echo $product['Product']['img']; ?>" style="width:80px;" alt="<?php echo h($product['Product']['title']); ?>" /> 
                </td>
           </tr>

           <tr>
               <td><?php echo __('PDF'); ?></td>
                <td>
                  <?php if($product['Product']['pdf']!=""){?>
                   <a href="<?php echo $base_url.'files/product/'.$product['Product']['pdf'];?>" target="_blank">View Uploaded PDF</a>
                  <?php }?>
                </td>
           </tr>

            <tr>
               <td valign="top"><?php echo __('Desc'); ?></td>
                <td>
                	<?php echo stripslashes($product['Product']['desc']); ?>
                </td>
           </tr>
           <tr>
               <td valign="top"><?php echo __('Short Desc'); ?></td>
                <td>
                	<?php echo stripslashes($product['Product']['short_desc']); ?>
                </td>
           </tr>
           
           <tr>
               <td><?php echo __('Status'); ?></td>
                <td>
           			<?php 
					$status=array(1=> 'Active', 0 => 'Inactive');
					echo $status[$product['Product']['status']]; ?>
			</td>
           </tr>

           <tr>
               <td valign="top"><?php echo __('Created'); ?></td>
                <td>
                   <?php echo date("d-m-Y",strtotime($product['Product']['created'])); ?>
                </td>
           </tr>
           
        </table>
    </div><!-- /.box-body -->
    
</div><!-- /.box -->


