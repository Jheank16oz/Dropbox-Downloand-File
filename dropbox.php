

<?php

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        func();
    }

    function func(){
        // do stuff     
            $ch = curl_init();
            
            curl_setopt($ch, CURLOPT_URL, "https://api.dropboxapi.com/2/files/get_temporary_link");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"path\":\"/Aplicaciones/testDownloand/testFile.docx\"}");
            curl_setopt($ch, CURLOPT_POST, 1);

            $headers = array();
            $access = "your - current access Token";
            $headers[] = "Authorization: Bearer " . $access;
            $headers[] = "Content-Type: application/json";
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $result = curl_exec($ch);
            if (curl_errno($ch)) {
                curl_close ($ch);
                echo 'Error:' . curl_error($ch);
            }else{
                curl_close ($ch);
                $myJSON = json_decode($result);
                $url = $myJSON -> link;
                header("Location: ".$url);
                exit;
            }        
    }

?>

       
    

