<html>
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body class="purple_background">
    <div id=head>Mask R-CNN tool</div>
    <div onclick="window.scrollTo(0,0);" id=move_top>
    <img class=move_top_img src="./iconmonstr-arrow-77-240.png"></div>
    <div onclick="window.scrollTo(0,$(window).height());" id=move_bot>
    <img class=move_bot_img src="./iconmonstr-arrow-77-240.png"></div>
    <div class=file_upload_wrap>
        <center>
            
            <div class="preview_wrap">
                <div id=preview_box class="preview_box" onclick="onclick_preview_box()">
                    <!-- <img id=preview src="" width=100 height=100> -->
                    <i class="far fa-image purple_color"></i>
                </div>
                <form enctype="multipart/form-data" action="fileupload.php" method="POST">
                    
                    <input id=myfile class=hidden name="myfile" onchange="onchange_myfile()" type="file" />
                    <input id=submit class=hidden type="submit" value="파일 전송" />
                </form>
            </div>
            <div class="image_upload_wrap" onclick="$('#submit').click()">
                START
            </div>
            <div id=resultview_wrap class="resultview_wrap">
                <!-- <div class="resultview_box">
                    <img class="resultview" src="outputs/20180201.png">
                </div> -->
            </div>
        </center>
    </div>
    
    <script src="js/index.js"></script>
</body>
</html>
