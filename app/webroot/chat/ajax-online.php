<?php 
session_start();
include_once('../html/includes/config.php');
extract($_POST);
if (isset($_SESSION['user_id'])) {

  $userid = $_SESSION['user_id'] ; 
  $user_det =  mysql_query("SELECT * FROM `master_users` WHERE `status` = 1 AND id =$userid" ) or die(mysql_error());
  $user_det = mysql_fetch_object($user_det);


 ?>


<?php 
       $oluser = mysql_query("SELECT * FROM `master_users` WHERE `status` = 1 AND id !=$userid AND `chat_name` LIKE '%$search%'  ");

        while ($ol_user = mysql_fetch_array($oluser)) {
?>
<!--  <li   <?php if (!in_array($ol_user['id'], $_SESSION['online_user'])): ?> class="online" <?php else: ?>  class="onlinetabe" <?php endif ?>  id="<?php echo $ol_user['id']; ?>" >
                  <a  id="<?php echo $ol_user['id']; ?>"  href=""   <?php if (in_array($ol_user['id'], $_SESSION['online_user'])): ?> class="onlinetabe" <?php endif ?>>
   -->
  <li    class="online"  id="<?php echo $ol_user['id']; ?>" >
                  <a  id="<?php echo $ol_user['id']; ?>"  href="" >
                      <div class="prof_img">
                         <img src="<?php if (!empty($ol_user['avatar_image'])): ?>
                           <?php echo "uploads/".$ol_user['avatar_image']; ?>
                         <?php else: ?>
                           <?php echo "uploads/noimg.png"; ?>
                         <?php endif ?>" />
                         <div class="status_r">&nbsp;</div> 
                      </div>
                     <div class="prof_text">  
                      <h3><?php echo $ol_user['chat_name']; ?></h3>
                      <span>Your status</span>
                      </div>
                  </a>
              </li>




<?php
        }}
        ?>