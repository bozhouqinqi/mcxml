<?php
    include_once 'www/status.class.php';
    
    $status = new MinecraftServerStatus(); // 类
    $response = $status-> getStatus('ADD.HUAFIA.WIN', 26061); // 服务器地址

if(!$response) {
    echo"服务器可能离线!";
} else {
    echo"".$response['players']."";
}
 
?>