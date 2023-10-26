<?php
mail('ashok.ifresher@gmail.com', 'callback called', 'test instagram email');
/*require_once "../../../../config/Server.php";
require_once "../../../utils/dbUtils.php";
require_once "../../../utils/imageUtils.php";
require_once "../../../utils/xssClean.php";
require_once "../../company_social_link.php";*/
require_once "app_config.php";
//require_once 'phpirt.php';
/*
class MyProcessor extends SubscriptionProcessor {
	const client_secret = INSTAGRAM_APP_CLIENTSECRET;

	// Redefine this function
	public static function process($data)
	{	// sample change response:

		//[{
		//	"changed_aspect"	:	"media",
		//	"object"			:	"user",
		//	"object_id"			:	"2871792723",
		//	"time"				:	1454243491,
	//		"subscription_id"	:	21827282,
	//		"data"	: {
	//			"media_id"	:	"1174601993745503050_2871792723"
	//		}
	//	}]

		
		// Steps:
		// 1. Query company from database
		// 2. Download post picture and caption from instagram from here:
		// 		https://api.instagram.com/v1/media/{media_id}?access_token={company.tok_instagram}
		// 3. Put picture into uploaded / postimages
		// 3. Upload to database

		// Step 1: Query company from database
			$instagramId = $data[0]->{'object_id'};
			$company = queryCompanyByInstagramId($instagramId);

		// Step 2: Download post picture and text from instagram
			$mediaId 				= $data[0]->{'data'}->{'media_id'};
			$companyInstaAccessToken= $company['tok_instagram'];

			// Step 2.1: Download post's JSON 
			$irt = new InstagramRealTime(
				INSTAGRAM_APP_CLIENTID,
				INSTAGRAM_APP_CLIENTSECRET,
				INSTAGRAM_CALLBACK_URL);

			$curl = $irt->getCurl();
			$response = $curl->get(
				'https://api.instagram.com/v1/media/{$mediaId}?access_token={$companyInstaAccessToken}', 
				array()
			);

			$respObj = json_decode($response);

			$data = $respObj->{'data'};
			$postType = $data->{'type'};

			if (strcmp($postType, "image"))
			{
				return;
			}

			$instaImageUrl 	= $data->{'images'}->{'thumbnail'}->{'url'};
			$instaPostText 	= $data->{'caption'}->{'text'};

			$imageTargetDir 	 =  '../../../../uploaded/postimages/' ;
			$imageExt 			 = pathinfo($instaImageUrl, PATHINFO_EXTENSION);
			$imageDestinationUrl = $imageTargetDir . ImageUtils::generatePostImageFileName($imageTargetDir, $imageExt);

			// Step 2.2: Download and save thumbnail image
			grab_image($instaImageUrl, $imageDestinationUrl);

		// Step 3: Upload to database
			$name 		= $company['name'];
			$content 	= $instaPostText;
			$company_id = $company['id'];
			$email 		= $company['email'];
			$imgurl 	= $imageDestinationUrl;

			// TODO: random or gps + randomEpsilon() coords
			$pos_x 		= 0.5;
			$pos_z 		= 0.5;
			$pos_y 		= 0.0;
			
			// TODO: set this to zero and send email to admin-email-address
			$validity 	= 1;

			$name 		= mysql_real_escape_string(xss_clean($name));
			$email 		= mysql_real_escape_string(xss_clean($email));
			$content 	= mysql_real_escape_string(xss_clean($content));
			$imgurl 	= mysql_real_escape_string($imgurl);

			_swConnect();
			_swQuery("INSERT INTO chunk_0_0( 
								name, 
								email, 
								company_id, 
								in_id, 
								content, 
								imgurl, 
								pos_x, pos_y, pos_z, 
								valid )
					  VALUES( '{$name}', 
					  		  '{$email}', 
					  		  '{$company_id}', 
					  		  '{$mediaId}', 
					  		  '{$content}', 
					  		  '{$imgurl}', 
							  '{$pos_x}', 
							  '{$pos_y}', 
							  '{$pos_z}', 
							  '{$validity}' );");
	}
}
*/

if(isset($_GET['hub_challenge'])) 
{
	echo $_GET['hub_challenge'];
	mail('ashok.ifresher@gmail.com', 'hub challenge called', $_GET['hub_challenge']." |-| ".$_GET['hub.challenge']);
		mail('jabahar.pm@maastrixsolutions.com', 'hub challenge called', $_GET['hub_challenge']." |-| ".$_GET['hub.challenge']);

}
else
if(isset($_GET['hub.challenge'])) 
{
	echo $_GET['hub.challenge'];
}
else 
{
	if(isset($_SERVER['HTTP_X_HUB_SIGNATURE'])) 
	{
		$igdata = file_get_contents("php://input");
		
		/*if(hash_hmac('sha1', $igdata, MyProcessor::client_secret) == $_SERVER['HTTP_X_HUB_SIGNATURE'])
			MyProcessor::process(json_decode($igdata));*/

mail('ashok.ifresher@gmail.com', 'callback called', $igdata);

		mail('jabahar.pm@maastrixsolutions.com', 'callback called', $igdata);
		
		
	####======================Code to save data into mysqldatabase ===============================####
	
		#==============connection string==============#
$mysqli_con = mysqli_connect("localhost", "root", "", "inhealth");
include($_SERVER['DOCUMENT_ROOT']."/social/instagram/library/myfunction.class.php");
$CSDB= new CSDB();
		#=======json decode to array format==========# 
	$responseData=json_decode($igdata);
if(!empty($responseData)){
	foreach($responseData as $response){
		
#=========Get media Id for Post details ============#

$media_id=$response->data->media_id;

#==========Api for getting the post details=================#
 $data=file_get_contents('https://api.instagram.com/v1/media/'.$media_id.'?access_token='.INSTAGRAM_APP_VERIFYTOKEN);
$alldata=json_decode($data);

$itemsDataArr=array();
$item=$alldata->data;
if(!empty($item)){
		//foreach($filterData as $item){
		
#==============profile Image====================#	
	if(isset($item->user->profile_picture) && !empty($item->user->profile_picture)){
    $profileImg=$item->user->profile_picture;
    $pextension = substr(strrchr($profileImg, "."), 1);
    $pImgName= urldecode(substr(strrchr($profileImg, "/"), 1));
    copy($profileImg, $_SERVER['DOCUMENT_ROOT']."/social/instagram/uploads/profileimg/".$pImgName);
   
   }	
		 	
		
	 //Attachment functionality start=========
    $attachmentallList=array();
	$media=$item->images;
	
    if(isset($media) && !empty($media)){
        foreach($media as $attachmentList){
			
           $postImgdetail= $attachmentList->url;
        
          if(isset($attachmentList->url)){
           $attachImgURL= $attachmentList->url;
            $attachImgArr=explode("?",$attachImgURL);
            $attachImg=$attachImgArr[0];
            $attachExtension = substr(strrchr($attachImg, "."), 1);
            $attachfileName = urldecode(substr(strrchr($attachImg, "/"), 1));
            copy($attachImg, $_SERVER['DOCUMENT_ROOT']."/social/instagram/uploads/postimg/".$attachfileName);
           }
	   
          array_push($attachmentallList, array('attach_display_name' => $item->user->username, 'attach_url' => $item->images->standard_resolution->url, 'attach_img' => $attachfileName));
        }
    }
   // =============End Attachment Here=======
		
			
		array_push($itemsDataArr,array('post_title' => $item->caption->text, 'post_url' => $item->link, 'published' => $item->created_time, 'profile_id' =>$item->user->id, 'screen_name' =>$item->user->username, 'profile_img' =>$item->user->profile_picture,'instagram_post_id' => $item->id));	
				
		//====Post data saved in array==============

//===========Now Start save itemdata in your DB============

if(!empty($itemsDataArr)){echo "data found<br>";
  foreach($itemsDataArr as $itemDataVal){
	  

    $google_post_id = $itemDataVal['instagram_post_id'];
    $chkSql=$CSDB->singleFetch('instagram_item',array('instagram_post_id' => $google_post_id));
    if( mysqli_num_rows($chkSql)<=0){
      $saveItem = $CSDB->Insert('instagram_item', $itemDataVal);
       $itemID=mysqli_insert_id($mysqli_con);
      if($saveItem){
        if(!empty($attachmentArray)){
          foreach($attachmentArray as $singleAttachment){
            $singleAttachment+=array('item_id' => $itemID);
           // $CSDB->Insert('googleplus_item_attachment', $singleAttachment);
          }
        }
      }
    }else{
      //===========Update Item====
      $updateItemres=mysqli_fetch_object($chkSql);
        $saveItem = $CSDB->Update('instagram_item', $itemDataVal,array('id' => $updateItemres->id));
        $itemID=$updateItemres->id;
        if($saveItem){
          if(!empty($attachmentArray)){
            foreach($attachmentArray as $singleAttachment){
              $singleAttachment+=array('item_id' => $itemID);
             //$CSDB->Insert('googleplus_item_attachment', $singleAttachment);
            }
          }
        }
      //==============================End Saving data====================//
    }
	
  }
}
	
			
/*echo "all post fetch from Instagram successfully";
//Data save end Here==========
	echo "<pre>";
	print_r($itemsDataArr);	
	//print_r($attachmentallList);
	echo "<br><br></pre>";*/
			
			//}
			
		}
		
	}
}
		
		
		
	
	}
}




// 'https://api.instagram.com/v1/media/{$mediaId}?access_token={$companyInstaAccessToken}'
// EXAMPLE RESPONSE FORMAT :
/*
{  
   "meta":{  
      "code":200
   },
   "data":{  
      "attribution":null,
      "tags":[  

      ],
      "type":"image",
      "location":null,
      "comments":{  
         "count":0
      },
      "filter":"Normal",
      "created_time":"1454243490",
      "link":"https:\/\/www.instagram.com\/p\/BBNBko9qpNK\/",
      "likes":{  
         "count":0
      },
      "images":{  
         "low_resolution":{  
            "url":"https:\/\/scontent.cdninstagram.com\/t51.2885-15\/s320x320\/e35\/12555868_150526911993369_1017031076_n.jpg",
            "width":320,
            "height":320
         },
         "thumbnail":{  
            "url":"https:\/\/scontent.cdninstagram.com\/t51.2885-15\/s150x150\/e35\/12555868_150526911993369_1017031076_n.jpg",
            "width":150,
            "height":150
         },
         "standard_resolution":{  
            "url":"https:\/\/scontent.cdninstagram.com\/t51.2885-15\/s320x320\/e35\/12555868_150526911993369_1017031076_n.jpg",
            "width":320,
            "height":320
         }
      },
      "users_in_photo":[  

      ],
      "caption":{  
         "created_time":"1454243490",
         "text":"Hello",
         "from":{  
            "username":"onemillionreasonsproject",
            "profile_picture":"https:\/\/scontent.cdninstagram.com\/t51.2885-19\/11906329_960233084022564_1448528159_a.jpg",
            "id":"2871792723",
            "full_name":"onemillion"
         },
         "id":"1174601996891231041"
      },
      "user_has_liked":false,
      "id":"1174601993745503050_2871792723",
      "user":{  
         "username":"onemillionreasonsproject",
         "profile_picture":"https:\/\/scontent.cdninstagram.com\/t51.2885-19\/11906329_960233084022564_1448528159_a.jpg",
         "id":"2871792723",
         "full_name":"onemillion"
      }
   }
}
*/
?>