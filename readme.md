## Test Allware
Implementacion de una Rest API en Formato JSON

#### Requisitos

1. PHP >= 5.4 (Apache2)
2. CodeIgniter 3.0+
3. MySQL (phpMyAdmin)
4. [Composer](https://getcomposer.org/download/ "Composer")
5. [Postman](https://www.getpostman.com/ "Composer")

**************************
#### Instalacion
El desarrollo del este prueba se realizo utilizando el sistema operativo Linux. Seguir los siguientes pasos:

1.  Colocar el proyecto TEST-ALLWARE en la carpeta `var/www/html/`
2.  Modificar el Archivo databese.php el cual se encuentra en la carpeta `application/config/database.php` con la configuracion de su mysql en su equipo.

	```
		'hostname' => 'localhost',
		'username' => 'root',
		'password' => '123456',
		'database' => 'luisana_lizarazo',
	```
3.  Descarga luisana_lizarazo.sql e importarlo a la base de datos Mysql.

*******************
#### Rutas

Las rutas a continuacion se mostraran utilizando el servidor localhost de apache:

###### Empresas:
- *GET* - http://localhost/test-allware/Empresa (Listados de empresas)
- *GET* - http://localhost/test-allware/Empresa/$id (Consulta una empresa)
   - id: numero entero  que identifica el id de la empresa
- *POST* - http://localhost/test-allware/Empresa/empresa (Agrega una empresa)
    - body json: `{"nombre": "Beval"}`
- *PUT*  - http://localhost/test-allware/Empresa/$id (Actualiza una empresa)
    - id: numero entero  que identifica el id de la empresa
	- body json: `{"nombre": "Beval22"}`
- *DELETE* - http://localhost/test-allware/Empresa/$id (Elimina una empresa)
     - id: numero entero que identifica el id de la empresa

###### Empleado:
- *GET*  - http://localhost/test-allware/empleado/listado/$id (Listados de los empleados de una empresa)
     - id: numero entero que identifica el id de la empresa
- *GET*  - http://localhost/test-allware/Empleado/$id (Consulta un empleado)
- *POST* - http://localhost/test-allware/Empleado/empleado (Agrega un empleado)
	- body json: `{"nombre":"Carmen","id_empresa":10,"correo":"carmen@febeca.com","fecha_nacimiento":"10/07/1889"}`
- *PUT*  - http://localhost/test-allware/Empleado/$id (Actualiza un empleado)
	- body json: `{"nombre":"Carmen","id_empresa":10,"correo":"carmen@febeca.com","fecha_nacimiento":"10/07/1889"}`
- *DELETE* - http://localhost/test-allware/Empleado/$id (Elimina un empleado)
     - id: numero entero que identifica el id de la empleado

************
#### Pruebas
************

Para la realizacion de las pruebas se debe utilizar *POSTMAN* como herramienta de envio de datos al servidor. Se deben configurar los siguientes pasos:

- Seleccionar el tipo de peticion GET, POST, PUT o DELETE para realizar pruebas de cada ruta.
- Ingresar la ruta.
- Configurar Headers: 
 - `Content-Type:application/json`
- Ingresar en body (POST y PUT) los parametros del body json.
- Hacer click en Send para realizar la prueba.