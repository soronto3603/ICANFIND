<?php
    //The Client
    error_reporting(E_ALL);
    
    $address = "127.0.0.1";                                                 // 접속할 IP //
    $port = 7630;                                                                         // 접속할 PORT //
    
    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP); // TCP 통신용 소켓 생성 //
    if ($socket === false) {
        echo "socket_create() 실패! 이유: " . socket_strerror(socket_last_error()) . "\n";
    echo "<br>";
    } else {
        echo "socket 성공적으로 생성.\n";
        echo "<br>";
    }
    
    echo "다음 IP '$address' 와 Port '$port' 으로 접속중...";
    echo "<BR>";
    $result = socket_connect($socket, $address, $port);           // 소켓 연결 및 $result에 접속값 지정 //
    if ($result === false) {
        echo "socket_connect() 실패.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    echo "<br>";
    } else {
        echo "다음 주소로 연결 성공 : $address.\n";
    echo "<br>";
    }
    $i = "/var/www/html/ICANFIND/images/%".$_GET['filename'];  //보내고자 하는 전문 //
    echo "서버로 보내는 전문 : $i|종료|.\n";

    socket_write($socket, $i, strlen($i)); // 실제로 소켓으로 보내는 명령어 //
    socket_close($socket);
    echo "<script>location.href='./index.php?file_uploaded=1';</script>";
 ?> 