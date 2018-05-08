<?php

define( 'APP_ID', (getenv('APP_ID') ? getenv('APP_ID') : '0bbf3412'));
define( 'APP_KEY', (getenv('APP_KEY') ? getenv('APP_KEY') : '1d447d826e6c02ed02aba9ab5f4a8670'));
define( 'API_URL', (getenv('API_URL') ? getenv('API_URL') : 'api.kairos.com'));
define( 'DEMO1_ID', (getenv('DEMO1_ID') ? getenv('DEMO1_ID') : '993d216683423a13626d6c35'));
define( 'CURL_API_TIMEOUT', (getenv('CURL_API_TIMEOUT') ? getenv('CURL_API_TIMEOUT') : 300));
define( 'API_TIMEOUT', (getenv('API_TIMEOUT') ? getenv('API_TIMEOUT') : 10));
define( 'POLL_TIMEOUT', (getenv('POLL_TIMEOUT') ? getenv('POLL_TIMEOUT') : 300));
define( 'DEMO_SECRET_KEY', (getenv('DEMO_SECRET_KEY') ? getenv('DEMO_SECRET_KEY') : ''));

return array(

    "highchartsColors" => '[
        ["#22B573"],
        ["#1175E3"],
        ["#FB623E"],
        ["#DA0059"],
        ["#752673"],
        ["#FBB03B"]
    ]',
    "mediaPath" => "/",
    "uploadFileSizeImage" => "10000000",
    "uploadFileTypesImage" => '[
        ["image/gif"],
        ["image/png"],
        ["image/jpeg"],
        ["image/jpg"]
    ]',
    "uploadFileSizeVideo" => "100000000",
    "uploadFileTypesEmotion" => '[
        ["video/mp4"],
        ["video/x-flv"],
        ["video/webm"],
        ["video/quicktime"],
        ["video/mov"],
        ["video/wmv"],
        ["video/mpeg"],
        ["video/x-msvideo"],
        ["video/x-ms-asf"],
        ["image/png"],
        ["image/jpeg"],
        ["image/jpg"],
        ["application/octet-stream"],
        ["video/x-matroska"],
        ["image/x-ms-bmp"]
    ]',
    "apiTimeout" => API_TIMEOUT,
    "pollTimeout" => POLL_TIMEOUT,
    "demoMedia"  => array(
        "video_1"=>DEMO1_ID
    )
);

?>
