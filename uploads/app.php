<?php

    require "../vendor/autoload.php";
    $router = new \Bramus\Router\Router();
    $dotenv = Dotenv\Dotenv::createImmutable("../")->load();

    $router->get("/campers", function(){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM campers");
        $res->execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
        echo json_encode($res);
    });

    $router->put("/campers", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("UPDATE campers SET nombreCamper = :nombreCamper, apellidoCamper = :apellidoCamper, fechaNac = :fechaNac, idReg = :idReg WHERE idCamper = :idCamper");
        $res->bindParam("idCamper", $_DATA['idCamper']);
        $res->bindParam("nombreCamper", $_DATA['nombreCamper']);
        $res->bindParam("apellidoCamper", $_DATA['apellidoCamper']);
        $res->bindParam("fechaNac", $_DATA['fechaNac']);
        $res->bindParam("idReg", $_DATA['idReg']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->post("/campers", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("INSERT INTO campers (idCamper,nombreCamper,apellidoCamper,fechaNac,idReg) VALUES (:idCamper,:nombreCamper,:apellidoCamper,:fechaNac,:idReg)");
        $res->bindParam("idCamper", $_DATA['idCamper']);
        $res->bindParam("nombreCamper", $_DATA['nombreCamper']);
        $res->bindParam("apellidoCamper", $_DATA['apellidoCamper']);
        $res->bindParam("fechaNac", $_DATA['fechaNac']);
        $res->bindParam("idReg", $_DATA['idReg']);
        $res->execute();
        $res = $res->rowCount();

        echo json_encode($res);
    });

    $router->delete("/campers", function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res = $cox->con->prepare("DELETE FROM campers WHERE idCamper = :idCamper");
        $res->bindParam("idCamper", $_DATA['idCamper']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });





$router->run();



?>