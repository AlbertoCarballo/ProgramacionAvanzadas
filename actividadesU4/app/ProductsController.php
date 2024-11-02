<?php

    session_start();
    if(isset($_POST["action"])){
        switch($_POST["action"]){
            case "add_product":{
                $name=$_POST["name"];
                $slug=$_POST["slug"];
                $description=$_POST["description"];
                $features=$_POST["features"];
                $idBrand=$_POST["id_brand"];
                $productController= new controllerProducts();
                $productController->postProduct($name,$slug,$description,$features,$idBrand);
                break;
            }
            case "update_product":{
                if (isset($_GET["id"])){
                    $id=$_GET["id"];
                };
                $name=$_POST["name"];
                $slug=$_POST["slug"];
                $description=$_POST["description"];
                $features=$_POST["features"];
                $productController= new controllerProducts();
                $productController->updateProduct($id,$name,$slug,$description,$features);
                break;
            }
            case "delete_product":{
                $id=$_POST["id_product"];
                
                $productController= new controllerProducts();
                $productController->delete($id);
                break;
            }

        }
    };
    class controllerProducts{
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
            'Authorization: Bearer 57|ZTliqXzuTSnF4Ogsrj3BdVSH4HPMkfHdmhVrJn4I'
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
            'Authorization: Bearer 57|ZTliqXzuTSnF4Ogsrj3BdVSH4HPMkfHdmhVrJn4I'
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

    public function postProduct($name,$slug,$description,$features,$idBrand){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('name' => $name,
                                    'slug' => $slug,
                                    'description' => $description,
                                    'features' => $features,
                                    'brand_id' => $idBrand),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer 57|ZTliqXzuTSnF4Ogsrj3BdVSH4HPMkfHdmhVrJn4I'),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response=json_decode($response);
        if(isset($response->code)&&$response->code > 0){
            header("Location: ../home.php?status=ok");
        }else{
            header("Location: ../home.php?status=error");
        }
    }

    public function updateProduct($id,$name,$slug,$description,$features){
        $postFields = "name=" . urlencode($name) .
                    "&slug=" . urlencode($slug) .
                    "&description=" . urlencode($description) .
                    "&features=" . urlencode($features) .
                    "&id=" . urlencode($id);
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => $postFields,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded',
            'Authorization: Bearer 57|ZTliqXzuTSnF4Ogsrj3BdVSH4HPMkfHdmhVrJn4I'
        ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        $response=json_decode($response);
        if(isset($response->code)&&$response->code > 0){
            header("Location: ../home.php?status=ok");
        }else{
            header("Location: ../home.php?status=error");
        }
        

    
    }

    public function delete($id){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/'.$id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'DELETE',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer 57|ZTliqXzuTSnF4Ogsrj3BdVSH4HPMkfHdmhVrJn4I'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response=json_decode($response);
        if(isset($response->code)&&$response->code > 0){
            header("Location: ../home.php?status=ok");
        }else{
            header("Location: ../home.php?status=error");
        }
    }
}


?>