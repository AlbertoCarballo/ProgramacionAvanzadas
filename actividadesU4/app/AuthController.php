<?php
    // var_dump($_POST);

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


            if (isset($response->message) && $response->message === "Registro obtenido correctamente" 
            && is_object($response->data)) {
                
                header("Location: ../home.php");
            }else{
                header("Location: ../index.html");
            }
        }
    }


    class controllerGetProducts{
        public function getProducts() {

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer 635|dpQ8rIYnu4zuYBZB71sBeAhBrEtTuTZe8M4SGYjQ'
            ),
            ));

            $response = curl_exec($curl);

            if (curl_errno($curl)) {
                $error_msg = curl_error($curl);
                curl_close($curl);
                throw new Exception("Error en la solicitud: " . $error_msg);
            }

            curl_close($curl);
            $response = json_decode($response);

            if (isset($response->data) && is_array($response->data)) {
                return $response->data;
            }

            return [];


            
        }
    }
?>
