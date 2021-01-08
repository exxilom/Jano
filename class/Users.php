<?php

    class Users extends DBAbstractModel {

        private static $_instancia;

        public function __construct() {

        }
        
        public static function singleton() {
            if (!isset(self::$_instancia)) {
                $miClase = __CLASS__;
                self::$_instancia = new $miClase;
            }
            return self::$_instancia;
        }

        public function __clone() {
            trigger_error('La clonación no es permitida.', E_USER_ERROR);
        }

        /**
         * Devuelve todos los usuarios de la tabla usuarios
         */
        /* public function getAllUsers () {
            $this->query = "SELECT * FROM sevi_usuarios";

            $this->get_results_from_query();
            $this->close_connection();
            
            return $this->rows;
        } */

        /**
         * Busca usuario por nick
         */
        public function getUserByNick ( $busqueda = '' ) {
            if ( $busqueda !== '' ) {
                $this->query = "SELECT 
                U.id,
                U.nick,
                AES_DECRYPT(UNHEX(U.pass),K.password),
                AES_DECRYPT(UNHEX(U.name),K.password),
                AES_DECRYPT(UNHEX(U.surname),K.password),
                U.email,
                U.perfil,
                U.current_state
                FROM keysbank_users U, keysbank_keys K
                WHERE U.id = K.idUser and K.idPlataform = 0 and U.id = (SELECT id FROM keysbank_users WHERE lower( nick ) = :nick)";

                $this->parametros['nick'] = strtolower( $busqueda );

                $this->get_results_from_query();
                $this->close_connection();
            }

            return $this->rows;
        }

        /**
         * Inserta un nuevo usuario en el sistema
         */
        /* public function setUser ( $user_data = array() ) {
            if ( sizeof( $this->getUserByNick( $user_data['nick'] ) ) )         //Si existe ese nick invalidamos el registro
                throw new UserExistException();
            elseif ( !preg_match('/^([^-_@()<>[\]\"\'\.,;:])\w+([^-_@()<>[\]\"\'\.,;:])@([^-_@()<>[\]\"\'\.,;:])+\.(com|es)$/', 
            $user_data['email']) )                                              //Si el email no cumple con el formato válido
                throw new MailInvalidException();
            elseif ( sizeof( $this->getUserByEmail( $user_data['email'] ) ) )   //Si ya existe este email registrado
                throw new MailExistException();
            elseif ( $user_data['pass'] !== $user_data['pass2'])                //Si la contraseña y su verificación no coinciden
                throw new PassCheckException();
            else {
                $this->query = "INSERT INTO sevi_usuarios (nick,pass,perfil,estado,nombre,apellidos,email) 
                                VALUES (:nick,:pass,:perfil,:estado,:nombre,:apellidos,:email)";

                $this->parametros['nick'] = $user_data['nick'];
                $this->parametros['pass'] = $user_data['pass'];
                $this->parametros['perfil'] = "user";
                $this->parametros['estado'] = "pendiente";
                $this->parametros['nombre'] = $user_data['nombre'];
                $this->parametros['apellidos'] = $user_data['apellidos'];
                $this->parametros['email'] = $user_data['email'];
                //$this->parametros['dni'] = strtoupper( preg_replace('/(-|\s)/',"",$user_data['dni']) );
                //$this->parametros['telefono'] = $user_data['telefono'];
                //$this->parametros['img'] = $user_data['img'];

                $this->get_results_from_query();
                $this->close_connection();
            }
        } */
        
        /**
         * Edita el estado del usuario
         */
        /* public function editEstado ( $user_data = array() ) {
            $this->query = "UPDATE sevi_usuarios SET estado = :estado, directorio = :directorio WHERE id = :id";

            $this->parametros['estado'] = $user_data['estado'];
            $this->parametros['directorio'] = $user_data['directorio'];
            $this->parametros['id'] = $user_data['id'];

            $this->get_results_from_query();
            $this->close_connection();
        } */
        
        /**
         * Activa el perfil del usuario:
         * 
         * -Se genera una carpeta con un nombre único para el usuario
         * -Actualiza el perfil del usuario (estado = "activo" | nombre de su directorio)
         */
        /* public function activarPerfil( $id ) {
            //Generar nombre único para carpeta
            $usuario = $this->getUserById( $id )[0];
            $nombreDirectorio = $this->getDirectoryNameUser( $usuario['nombre'], $usuario['apellidos'] );
            
            if ( !file_exists("users/".$nombreDirectorio) )     //crear carpeta con permisos
                mkdir("users/".$nombreDirectorio,0777,true);
            
            //actualizamos perfil a activo y guardarmos el nombre de la carpeta generada
            $user_data = array(
                'id' => $id,
                'estado' => "activo",
                'directorio' => $nombreDirectorio
            );
            $this->editEstado( $user_data );
        } */
        
        /**
         * Cambiar contraseña
         */
        /* public function editPass ( $user_data = array() ) {
            if ( $this->getUserById( $user_data['id'] )[0]['pass'] !== $user_data['old_pass'] )      //Si la contraseña vieja no coincide con la alamacenada
                throw new CheckOldPassException();
            elseif ( $user_data['new_pass'] !== $user_data['new_pass2'])
                throw new PassCheckException();
            else {
                $this->query = "UPDATE sevi_usuarios SET pass = :pass WHERE id = :id";
    
                $this->parametros['id'] = $user_data['id'];
                $this->parametros['pass'] = $user_data['new_pass'];
    
                $this->get_results_from_query();
                $this->close_connection();
            }
        } */
    
        /**
         * Actualizar perfil
         */
        /* public function editUser ( $user_data = array() ) {
            if ( !preg_match( '/^([^-_@()<>[\]\"\'\.,;:])\w+([^-_@()<>[\]\"\'\.,;:])@([^-_@()<>[\]\"\'\.,;:])+\.(com|es)$/', $user_data['email'] ) )                                      //Si el email no cumple con el formato válido
                throw new MailInvalidException();
            elseif ( $this->getUserById( $user_data['id'] )[0]['email'] !== $user_data['email'] && 
                        sizeof( $this->getUserByEmail( $user_data['email'] ) ) )  //Si ya existe este email registrado
                throw new MailExistException();
            else {
                $this->query = "UPDATE sevi_usuarios SET nombre = :nombre, apellidos = :apellidos, email = :email 
                                WHERE id = :id";
    
                $this->parametros['id'] = $user_data['id'];
                $this->parametros['nombre'] = $user_data['nombre'];
                $this->parametros['apellidos'] = $user_data['apellidos'];
                $this->parametros['email'] = $user_data['email'];
    
                $this->get_results_from_query();
                $this->close_connection();
            }
        } */
    }
    
?>