<?php
  /***************************************************
   * Only these origins are allowed to upload images *
   ***************************************************/
  // $accepted_origins = array("http://localhost", "http://192.168.1.1", "http://example.com");

  /*********************************************
   * Change this line to set the upload folder *
   *********************************************/
  // $imageFolder = "../../uploads/test/";

//   if (isset($_SERVER['HTTP_ORIGIN'])) {
//     // same-origin requests won't set an origin. If the origin is set, it must be valid.
//     if (in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)) {
//       header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
//     } else {
//       header("HTTP/1.1 403 Origin Denied");
//       return;
//     }
//   }

  // Don't attempt to process the upload on an OPTIONS request
//   if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
//     header("Access-Control-Allow-Methods: POST, OPTIONS");
//     return;
//   }

  reset ($_FILES);
  $temp = current($_FILES);
  if (is_uploaded_file($temp['tmp_name'])){
    /*
      If your script needs to receive cookies, set images_upload_credentials : true in
      the configuration and enable the following two headers.
    */
    // header('Access-Control-Allow-Credentials: true');
    // header('P3P: CP="There is no P3P policy."');

    // Sanitize input
    if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])) {
        header("HTTP/1.1 400 Invalid file name.");
        return;
    }

    // Verify extension
    if (!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png"))) {
        header("HTTP/1.1 400 Invalid extension.");
        return;
    }

    // Accept upload if there was no origin, or if it is an accepted origin
    $gallery_images_name = $temp['name'];
    $gallery_images_tmpName = $temp['tmp_name'];
    $ext = pathinfo($gallery_images_name, PATHINFO_EXTENSION);

    $gallery_images_name_new = uniqid('',true).".".$ext;
    $file_destination = '../../uploads/blog-images/'.$gallery_images_name_new;
    move_uploaded_file( $gallery_images_tmpName, $file_destination);

    // Determine the base URL
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? "https://" : "http://";
    $baseurl = $protocol . $_SERVER["HTTP_HOST"];
    
    // Respond to the successful upload with JSON.
    // Use a location key to specify the path to the saved image resource.
    // { location : '/your/uploaded/image/file'}
    $file_destination = 'test/'.$gallery_images_name_new;

    $imageFolder = "/photoborko/uploads/blog-images/";
    $filetowrite = $imageFolder . $gallery_images_name_new;
    echo json_encode(array('location' => $baseurl . $filetowrite));
  } else {
    // Notify editor that the upload failed
    header("HTTP/1.1 500 Server Error");
  }
?>