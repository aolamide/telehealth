<style type="text/css">
    
    .me{
    font-size: 14px;
    margin: -4px;
    border-right: 3px solid #60DF88 !important;
    padding: 5px;
    background-color: rgb(239, 255, 241);
    width: 80%;
    border-radius: 50px 0 0 50px;
    margin-bottom: 10px;
}

.you{
    font-size: 14px;
    margin: -4px;
    border-left: 3px solid rgb(255, 112, 0) !important;
    padding: 5px;
    padding-left:10px;
    background-color: rgb(247, 247, 214);
     width: 80%;
    border-radius: 0 50px 50px 0;
    margin-bottom: 10px;
}
</style>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Conversation Details</h3>
        <a href="<?php echo $base_url;?>admin/reports/conversation" class="btn btn-primary" style="color:#fff">Back To List</a>
    </div><!-- /.box-header -->
    <div class="box-body">

  <?php 
        if(!empty($conversationDetails) && count($conversationDetails)>0){//pr($convReports);


    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-primary">
                  <div class="panel-heading">View Conversation</div>
                  <div class="panel-body"  style="background:url('http://subtlepatterns.com/patterns/geometry2.png');height: auto; }">
                  <?php
                 $cnt=0;
                foreach ($conversationDetails as $conversationDetail): $cnt++;

                $from=$conversationDetails[0]['Chat']['from_id'];
                $to=$conversationDetails[0]['Chat']['to_id'];
                $class=($from==$conversationDetail['Chat']['from_id']) ? ' class="me pull-right"' : ' class="you pull-left"';
                  ?>
                    <div class="clearfix"><blockquote<?php echo $class;?>>
                    <?php  
                        $userFromDet=$this->Custom->userDetail($conversationDetail['Chat']['from_id']); 
                        if($userFromDet['MasterUser']['login_tytpe']=='P'){
                            $prefix="<b>Patient : </b>";
                        }else if($userFromDet['MasterUser']['login_tytpe']=='D'){
                            $prefix="<b>Doctor : </b>";
                        }
                        echo $prefix.stripslashes($userFromDet['MasterUser']['fname']." ".$userFromDet['MasterUser']['lname']);
                               
                    ?><br>
                    <?php echo stripslashes($conversationDetail['Chat']['chat_message']);?>
                    </blockquote></div>
                    <?php
               endforeach;
                    ?>
                  </div>
                </div>
            </div>
        </div>
    </div>

    <?php }?>
       
    </div><!-- /.box-body -->
    
</div><!-- /.box -->
