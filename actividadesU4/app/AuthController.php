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

    class ControllerGetDetailProduct {
        public function getDetailProduct() {

            if (isset($_GET['slug'])) {
                $id = $_GET['slug'];
            } else {
                throw new Exception("Slug no proporcionado.");
            }

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://crud.jonathansoto.mx/api/products/$id",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer 635|dpQ8rIYnu4zuYBZB71sBeAhBrEtTuTZe8M4SGYjQ',
                'Cookie: XSRF-TOKEN=eyJpdiI6IkF3Wjd2bGZiSkU0d09IZ1BZcDdkR2c9PSIsInZhbHVlIjoiOFdERVpDUUFsNzhBbGJxRjZZSnh5dldvRTVKRzljMVl5aDRCc1NGVzJjVlNNT0hKeGE3Y2NmekVIL2JYZEZNUHAzL2M2K3NyZ09SK1pQRmZ4WFhxNVBBakpkZ20yNzBHZnA5U3ZtK2NDeVRJQTJza2Z0VjhoN2dPUngzL0IwK0siLCJtYWMiOiIxMDZlY2NlNjJkMmQ0YTY5ZmI4YjBmMDBhMDkzNThmYzI1OGFkZDA1ZTM4YTMzMWQ1ZTg3ZmU3MTkwYjBiN2I1IiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6InJiMFdINm54NFduc2RsT3oxaGJRalE9PSIsInZhbHVlIjoiOTh2d1FhbklHRW01RkNqOXd1OU1KMEZqUkQvS0Z3Y2JyZ3BNZkY1ZkhPeXY1dHNnT2pvS0k4TVlBV29PajFkQnN3a1Fqa2VCSEpuWmdTUWEyY1hvZG5pVHM0UzRuei9NSVFsZENuU01qT3dXcDMvYXkxNjJCNE94SmpiTXk0a0ciLCJtYWMiOiI4YjVmZDk5MTMxMzZlYWIxZDI0ODJjMWMxZjE1MGVhMzU3ZDRmZGZmMzUwYTFiN2E1YzJkZDg4OWYzZjM0NDBiIiwidGFnIjoiIn0%3D'
            ),
            ));

            $response = curl_exec($curl);
            $response=json_decode($response);

            if (empty($response)) {
                throw new Exception("La respuesta está vacía. Verifica la conexión a la API.");
            }
    
    
            if (isset($response->data)) {
                return $response->data; 
            } else {
                if (isset($response->message)) {
                    throw new Exception("Error de API: " . $response->message);
                } else {
                    throw new Exception("No se encontraron datos para el producto.");
                }
            }
    
            return [];
            

        }
    }
?>