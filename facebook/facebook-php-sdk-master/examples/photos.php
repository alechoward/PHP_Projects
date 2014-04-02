<?php
/**
 * Copyright 2011 Facebook, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may
 * not use this file except in compliance with the License. You may obtain
 * a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

 require_once('facebook.php');

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '265361030308261',
  'secret' => 'b5da2791a55c9f3fbaf984111ca95fed',
));

// Get User ID
$user = $facebook->getUser();
$accessToken = $facebook->getAccessToken();

// We may or may not have this data based on whether the user is logged in.
//
// If we have a $user id here, it means we know the user is logged into
// Facebook, but we don't know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');


    $fql = 'SELECT status_id, message from status where uid = me()';
    $ret_obj = $facebook->api(array(
                                 'method' => 'fql.query',
                                 'access_token' => $accessToken,
                                 'query' => $fql,
                               ));
 // echo json_encode($ret_obj); 

    $fql2 = 'SELECT link, comment_info, place_id from photo where owner = me()';
    $ret_obj2 = $facebook->api(array(
                                 'method' => 'fql.query',
                                 'access_token' => $accessToken,
                                 'query' => $fql2,
                               ));
  
    $fql3 = 'SELECT url from profile_pic where id = me()';
    $ret_obj3 = $facebook->api(array(
                                 'method' => 'fql.query',
                                 'access_token' => $accessToken,
                                 'query' => $fql3,
                               ));
    $fql4 = 'SELECT parent_id, fromid, text, post_fbid, object_id from comment where object_id in(SELECT status_id from status where uid = me())';
    $ret_obj4 = $facebook->api(array(
                                 'method' => 'fql.query',
                                 'access_token' => $accessToken,
                                 'query' => $fql4,
                               ));

    $fql5 = 'SELECT name, id from profile where id in (select uid2 from friend where uid1 = me())';
    $ret_obj5 = $facebook->api(array(
                                 'method' => 'fql.query',
                                 'access_token' => $accessToken,
                                 'query' => $fql5,
                               ));
    // select public photos where tagged
    $fql6 = 'SELECT object_id, src_big from photo where object_id in (select object_id from photo_tag where subject = me())';
    $ret_obj6 = $facebook->api(array(
                                 'method' => 'fql.query',
                                 'access_token' => $accessToken,
                                 'query' => $fql6,
                               ));
    // select comments on photos where tagged
    $fql7 = 'SELECT fromid, text, post_fbid, object_id from comment where object_id in(select object_id from photo_tag where subject = me())';
    $ret_obj7 = $facebook->api(array(
                                 'method' => 'fql.query',
                                 'access_token' => $accessToken,
                                 'query' => $fql7,
                               ));




    /* $results = $facebook->api(array(
                   
                            'method' => 'fql.query',
                             'query' => 'SELECT status_id, message from status where uid = me())',
                     )); */
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}

// Login or logout url will be needed depending on current user state.
if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  $statusUrl = $facebook->getLoginStatusUrl();
  $loginUrl = $facebook->getLoginUrl(array('scope' => 'user_status,user_photos,export_stream,read_stream, user_photo_video_tags, friends_photos, friends_photo_video_tags'));
}

// This call will always work since we are fetching public data.

// my added code
if(isset($_GET['action']) && $_GET['action'] === 'logout'){
    $facebook->destroySession();
}
// end of my added code

$naitik = $facebook->api('/naitik');

?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <html class="no-js" lang="en" data-useragent="Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Harrison Howard Home Page</title>

    
    <meta name="description" content="Documentation and reference library for ZURB Foundation. JavaScript, CSS, components, grid and more." />
    
    <meta name="author" content="ZURB, inc. ZURB network also includes zurb.com" />
    <meta name="copyright" content="ZURB, inc. Copyright (c) 2013" />

    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/modernizr.js"></script>
  </head>
  






  <body>
      <!-- Header and Nav -->
 <div class = "fixed">
  <nav class="top-bar" data-topbar>
    <ul class="title-area">
      <li class="name">
       <h1><a href="#">Screen</a></h1>
     </li>
    </ul>

  <section class = "top-bar-section">
     <?php if ($user): ?>
      <ul class = "right"> 
        <li class = "active"><a href="<?php echo $logoutUrl; ?>">Logout</a></li>
      </ul>
      <ul class = "center"> 
        <li class = "active"><a href="index.php">Status</a></li>
      </ul>
      <ul class = "center"> 
        <li class = "active"><a href="photos.php">Photos</a></li>
      </ul>
      <ul class = "center"> 
        <li class = "active"><a href="<?php echo $logoutUrl; ?>">Comments</a></li>
      </ul>
      <ul class = "center"> 
        <li class = "active"><a href="<?php echo $logoutUrl; ?>">Likes</a></li>
      </ul>
    <?php else: ?>
      <ul class = "right"> 
        <li class = "active"><a href="<?php echo $statusUrl; ?>">Check the login status</a></li>
      </ul>
      <ul class = "left">
        <li><a href="<?php echo $loginUrl; ?>">Login with Facebook</a></li>
      </ul>
    <?php endif ?>
  </section>
  
  </nav>
</div>
  <!-- End Header and Nav -->
  <div class="row">
 <!-- Nav Sidebar -->
    <!-- This is source ordered to be pulled to the left on larger screens -->

    <!-- Main Feed -->
    <!-- This has been source ordered to come first in the markup (and on small devices) but to be to the right of the nav on larger screens -->
    <div class="large-12 columns">
 
      <!-- Feed Entry -->
       <?php
       $total = count($ret_obj6);
       $totalcomment = count($ret_obj7);
       $comments = $ret_obj7;
       $friendscount = count($ret_obj5);
          
          for($i=0;$i<$total;$i++) { 
          $product = $ret_obj6[$i];
          $id = $product["object_id"] ?>
          
          <div class="row">
              <div class="large-2 columns small-3"><img src="" /></div>
              <div class="large-10 columns">
               <p><strong><?php echo $user_profile["name"]; ?>: </strong> <img src="<?php echo $product["src_big"]; ?>"></p>
              <ul class="inline-list">
              <li><a href="">Approve</a></li>
            <li><a href="">Delete</a></li>
          
          </ul>      
         <h6>Comments</h6>

                        <?php 
                          for($i2=0;$i2<$totalcomment;$i2++) { 
                          $product2 = $ret_obj7[$i2];

                              if(array_search($id, $product2) !== false) {
                                  $Fid = $product2["fromid"];
                                    
                                    for($i3=0;$i3<$friendscount;$i3++) { 
                                    
                                    $friendname = $ret_obj5[$i3];
                                        if(array_search($Fid, $friendname) !== false) {
?>
                                  <div class="row">
                                  <div class="large-10 columns"><p>
                                  <strong><?php echo $friendname["name"];?>: </strong><?php echo $product2["text"]; ?></p>
                                  </div>
                                  </div>
                          <?php }}} ?>
                      <?php } ?> 

        </div>
      </div>
      <!-- End Feed Entry -->
 
      <hr />
          <?php }; ?>

      
 
    <!-- Right Sidebar -->
  
    <!-- <aside class="large-3 columns hide-for-small">
      <p><img src="http://placehold.it/300x440&text=[ad]" /></p>
      <p><img src="http://placehold.it/300x440&text=[ad]" /></p>
    </aside>-->
 
  </div>
 

  </body>
</html>
