<?php

class db{

    // instancia atual
    private static $instance;

    public static function getInstance(){

        if (!isset (self::$instance)){

            try{
                // Setamos a conexão com o banco de dados;

                self::$instance = new PDO('mysql:host=localhost; dbname=chamado', 'root', 'asdqwe');

                // Setamos o atributo responsável pelos erros; ERRMOD_EXCEPTION representa o erro;

                self::$instance->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Setamos o atributo responsável pelos retornos padrões (retorna como objetos);

                self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            }

            //Configuramos a variavel $erro em exception;

            catch (PDOException $erro){

                //exibimos o erro na tela, no caso o erro em questão é sobre conexão;

                echo $erro->getMessage();

            }

        }

        //retornamos o resultado;

        return self::$instance;

    }

    public static function prepare($sql){
        return self::getInstance()->prepare($sql);
    }
}

?>