<?php
    // var_dump($_POST);
    session_start();
    
    if (isset($_POST["action"]) && $_POST["action"] === 'access') {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $controller = new ControllerLogin;

        $controller->access($email, $password);
    }

    class ControllerLogin {

        public function access($email, $password) {

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://crud.jonathansoto.mx/api/login',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array(
                    'email' => $email,     
                    'password' => $password 
                ),
            ));

            $response = curl_exec($curl);
            curl_close($curl);
            $response=json_decode($response);
            var_dump($response);


            if (isset($response->message) && $response->message === "Registro obtenido correctamente" 
            && is_object($response->data)) {
                $token = $this->token();
                $_SESSION['token'] = $token;
                header("Location: ../home");
            }else{
                header("Location: ../index.html");
            }
        }

        public function token ($leng=40) {
            $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $token = "";
            
            for($i=0; $i<$leng; $i++){
                $token .= $cadena[rand(0,35)];
            }
            return $token;
        }
    }



?>