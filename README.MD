A.	Diagrama E-R de la solución propuesta.
Este diagrama se desarrollo usando la herramienta Data Modeler, Ahí se definieron los datos de entrada y de que tipo seria cada uno, también se definió la clave primeria de la tabla Usuarios, luego de eso se procedió a definir los datos que contendrá la tabla teléfonos, así mismo se le definió una clave primaria para los teléfonos y adicional a eso se le implemento una clave foránea, para así identificar al dueño de ese teléfono 

![1](/READMEIMG/1.png?raw=true "Title")

![2](/READMEIMG/2.png?raw=true "Title")

B.	Nombre de la Base de Datos
La base de datos utilizada se llama Agenda y las tablas adentro de esta son USUARIOS y TELEFONOS

![3](/READMEIMG/3.png?raw=true "Title")

C.	Sentencias SQL de la estructura de la base de datos

![4](/READMEIMG/4.png?raw=true "Title")
![5](/READMEIMG/5.png?raw=true "Title")
![6](/READMEIMG/6.png?raw=true "Title")

D.	El desarrollo de cada uno de los requerimientos antes descritos.
Cuando se ingresa a la página web se verifica si alguna sesión ya ha sido iniciada y como en este caso es no, al pasar el ratón sobre el ítem de perfil se mostrar el iniciar sesión y el registrarse, en este caso vamos a explicar el proceso que se toma al registrarse  

![7](/READMEIMG/7.png?raw=true "Title")
![8](/READMEIMG/8.png?raw=true "Title")

En este php lo que se hace es recoger los datos del formulario mediante el $_POST para que se logre insertar en las variables del php se deberá de verificar que el dato obtenido no este vacío además si es que el dato no esta vacío; en el dato obtenido con el $_POST se eliminan los datos en blanco con el trim además  si es que el dato es un texto lo pondremos en mayúsculas con el mb_stroupper después de esto haremos una consulta en html incluyendo a las variables creadas anteriormente, esta consulta se guardara en la variable $sql la cual se enviara a la tabla de usuarios de la base de datos mediante el comando $conn->query($sql) si es que esta sentencia nos devuelve un true creamos una consulta para poder almacenar el teléfono del usuario incluyendo las variables recibidas del teléfono, esta consulta se almacenara en la variable $sqlTel esta se enviara a la base de datos mediante el comando $conn->query($sqlTel) si esta sentencia nos devuelve un true quiere decir que las dos fases de inserción de datos se han completado correctamente por lo tanto podemos aplastar el botón de atrás para poder logearnos desde el $index.sql.
-Cuando un usuario quiera acceder a la guía telefónica de forma anónima lo hace a travez de la interfaz principal al seleccionar 'Guia Telefonica (Anonimo)' y es redireccionado al archivo llamado teléfonos.php que se encuentra dentro de la carpeta public/paginashtml

![9](/READMEIMG/9.png?raw=true "Title")

Dependiendo del botón pulsado se activarán las funciones de buscar por mail o buscar por Cedula las cuales, gracias al uso de AJAX hacen que se tomen los datos de los campos de texto y hacen que en el div de información se muestre la tabla generada gracias a la información ingresada  

![10](/READMEIMG/10.png?raw=true "Title")

En le caso de la función buscar por cedula se manda a abrir una nueva página php con la información de la cedula la cual se mostrará en la página teléfonos php con la estructura, el ccs de la página teléfonos.php se encarga de darle estilo 

![11](/READMEIMG/11.png?raw=true "Title")
![12](/READMEIMG/12.png?raw=true "Title")

Al Buscar el teléfono por cedula primero se busca si hay un usuario con dicha cedula registrado en el sistema y en caso de que exista se guarda su email para usarla en una futura función
Luego de haber verificado la existencia de dicho usuario se realiza otro query pero esta es en la tabla de teléfonos para poder obtener la información de estos

-Y de una vez aprovechando que ya se tienen los datos del usuario cargados añadimos dos ítems mas a la tabla, uno donde se encuentra la posibilidad de usar  el teléfono encontrado para realizar una llamada y el otro donde se usa el mail anteriormente guardado y se lo referencia para que el usuario anónimo pueda enviarle un mail si así lo desea

![13](/READMEIMG/13.png?raw=true "Title")

-Al pulsar el botón de inicio de sesión en la pagina de login se carga la pag login.php la cual toma los valores insertados en los campos de correo y contraseña para poder hacer un query con estos datos, cabe resaltar que al momento de mandar la contraseña para hacer el query esta se transforma antes con MD5 por cuestiones de seguridad 

![14](/READMEIMG/14.png?raw=true "Title")

En el momento que se encuentra la cuenta el navegador vuelve a la pagina principal, pero esta vez con el id, la pagina principal al detectar el id usa este para retirar los datos del usuario y cargar las nuevas opciones que se presentaran ahora en esa página.

![15](/READMEIMG/15.png?raw=true "Title")

Si la sesión esta iniciada se cargan las diferentes opciones 

![16](/READMEIMG/16.png?raw=true "Title")

-Al cargar las distintas opciones, dependiendo si es admin o no enrutara a los diferentes usuarios a las paginas que les corresponde, en este caso estamos tratando con un usuario con el rol de admin

![17](/READMEIMG/17.png?raw=true "Title")

Cuando pulsamos el botón 'Entrar a la guía Telefónica' toma el dato del rol del usuario y el navegador se dirigirá a la pag que le corresponda dependiendo del rol.
Como estamos con un usuario Admin no dirige a: "../../../admin/vista/admin/telefonos.php donde se podrá administrar a todos los usuarios.

![18](/READMEIMG/18.png?raw=true "Title")

Al inicar la pag autmaticamente se carga la función mostrarTodos() la cual hace que se muestren todos los usuarios de la base de datos mediante AJAX en el div usuarios.
Lo que hace la función mostrar todos manda un query para retirar a todos los usuarios, sin ninguna condición extra.

![19](/READMEIMG/19.png?raw=true "Title")

Al momento de que esta pagina se carga en teléfonos.php también carga otra función con AJAX que hace que el div de mas abajo con id teléfonos cargue otra tabla al ser pulsado. 

![20](/READMEIMG/20.png?raw=true "Title")

Esta tabla contendrá los números del usuario relacionado con la opción.
Para los métodos de búsqueda solo se les añade otra condición al query, de ahí funcionan de la misma manera.
Si es que el administrador quiere editar a un usuario debe seleccionar la opción modificar que este junto al usuario que quiera modificar, esto ara que se tome el id del Admin y el del usuario a editar y los llevara a la pestaña de edición

![21](/READMEIMG/21.png?raw=true "Title")

Desde este punto el administrador podrá utilizar todas las funciones de edición, tanto como al usuario como a los teléfonos de este, como si estuviese entrando con la propia cuenta del usuario al que quiere editar. Mas abajo explicamos el proceso de edición de perfiles, que usa esta interfaz.
Una vez iniciada sesión , al pulsar el nombre del del usuario se abrirá una interfaz donde se le mostraran sus datos personales y el mismo usuario podrá editarla 

![22](/READMEIMG/22.png?raw=true "Title")

En este php lo que se hace es recoger los datos del formulario mediante el $_POST para obtener el id se envia el dato por url así que se obtiene mediante el $_GET para que se logre insertar en las variables del php se deberá de verificar que el dato obtenido no este vacío además si es que el dato no esta vacío; en el dato obtenido con el $_POST se eliminan los datos en blanco con el trim además  si es que el dato es un texto lo pondremos en mayúsculas con el mb_stroupper después de esto haremos una consulta en html incluyendo a las variables creadas anteriormente, esta consulta se guardara en la variable $sql la cual se enviara a la tabla de usuarios de la base de datos mediante el comando $conn->query($sql) si el resultado de la sentencia es true se regresa a la pagina del usuario con los datos modificados caso contrario enviara un error.
Eliminar

![23](/READMEIMG/23.png?raw=true "Title")
![24](/READMEIMG/24.png?raw=true "Title")

En este php lo que se hace es recoger obtener el id que fue enviado por url así que se obtiene mediante el $_GET, después de esto haremos una consulta en html incluyendo a las variables creadas anteriormente, esta consulta se guardara en la variable $sql la cual se enviara a la tabla de usuarios de la base de datos mediante el comando $conn->query($sql) si el resultado de la sentencia es true se regresa a la página de inicio por que el usuario ya no existe.
Cambiar contraseña

![25](/READMEIMG/25.png?raw=true "Title")

En este php lo que se hace es recoger obtener el id que fue enviado por url así que se obtiene mediante el $_GET, después de esto haremos una consulta en html incluyendo a las variables creadas anteriormente, esta consulta se guardara en la variable $sql la cual se enviara a la tabla de usuarios de la base de datos mediante el comando $conn->query($sql) si el resultado de la sentencia es true se regresa a la página de inicio por que la contraseña es distinta.
Sobre la misma interfaz existe una tabla que se presenta ahí gracias al uso de AJAX donde el usuario puede agregar modificar, eliminar, buscar y listar sus teléfonos.
Agregar teléfonos

![26](/READMEIMG/26.png?raw=true "Title")

En este php lo que se hace es recoger los datos del formulario mediante el $_POST para obtener el id se envia el dato por url así que se obtiene mediante el $_GET para que se logre insertar en las variables del php se deberá de verificar que el dato obtenido no este vacío además si es que el dato no esta vacío; en el dato obtenido con el $_POST se eliminan los datos en blanco con el trim además  si es que el dato es un texto lo pondremos en mayúsculas con el mb_stroupper después de esto haremos una consulta en html incluyendo a las variables creadas anteriormente, esta consulta se guardara en la variable $sql la cual se enviara a la tabla de telefonos de la base de datos mediante el comando $conn->query($sql) si el resultado de la sentencia es true se regresa a la página se recargara para que el nuevo teléfono se cargue en la tabla de teléfonos.
Modificar Telefonos

![27](/READMEIMG/27.png?raw=true "Title")

En este php lo que se hace es recoger los datos del formulario mediante el $_POST para obtener el id se envía el dato por url así que se obtiene mediante el $_GET para que se logre insertar en las variables del php se deberá de verificar que el dato obtenido no este vacío además si es que el dato no esta vacío; en el dato obtenido con el $_POST se eliminan los datos en blanco con el trim además  si es que el dato es un texto lo pondremos en mayúsculas con el mb_stroupper después de esto haremos una consulta en html incluyendo a las variables creadas anteriormente, esta consulta se guardara en la variable $sql la cual se enviara a la tabla de telefonos de la base de datos mediante el comando $conn->query($sql) si el resultado de la sentencia es true se regresa a la página se recargara para que se muestre la tabla de teléfonos con el teléfono modificado.
Eliminar teléfonos

![28](/READMEIMG/28.png?raw=true "Title")

En este php lo que se hace es recoger obtener el id que fue enviado por url así que se obtiene mediante el $_GET, después de esto haremos una consulta en html incluyendo a las variables creadas anteriormente, esta consulta se guardara en la variable $sql la cual se enviara a la tabla de telefonos de la base de datos mediante el comando $conn->query($sql) si el resultado de la sentencia es true se recarga la página sin ese teléfono.
Listar teléfonos

![29](/READMEIMG/29.png?raw=true "Title")

En este php se hace una consulta general de los teléfonos que tiene el usuario, por cada teléfono se agrega una fila a la tabla cada uno de los atributos se pone en cada columna de la tabla así mismo cada fila tiene guardado el id del teléfono para futuras modificaciones o eliminaciones
-Los Formularios ejecutan funciones evitar que se ingresen datos irreales, estas funciones de validan los distintos campos que son necesarios llenar para poder lograr el registro de un usuario sobre la base de datos
Validación de la cedula

![30](/READMEIMG/30.png?raw=true "Title")

En esta función primero validamos que lo que ingresemos sean solo letras mediante la función validarLetras si son números estos se eliminan, luego de validar que todos los caracteres sean letra lo que hacemos es dividir el texto en dos variables luego se valida que ninguna de las dos este vacío, de ser el caso se mostrara un mensaje de error de que los nombres ingresados son incorrectos.
Validación de los apellidos

![31](/READMEIMG/31.png?raw=true "Title")

En esta función primero validamos que lo que ingresemos sean solo letras mediante la función validarLetras si son números estos se eliminan, luego de validar que todos los caracteres sean letra lo que hacemos es dividir el texto en dos variables luego se valida que ninguna de las dos este vacío, de ser el caso se mostrara un mensaje de error de que los apellidos ingresados son incorrectos.
Validación del telefono

![32](/READMEIMG/32.png?raw=true "Title")

En esta función lo que se hace es validar que lo que ingresemos sean solo números mediante la función validarNumero, también se valida que la longitud no sea mayor a 10 dígitos si supera los 10 dígitos se eliminan los caracteres extra. Después de estas validaciones llamamos a la función validarLongTel, que nos valida si la longitud es menor a 10 saldrá un mensaje de error con relación a la longitud del número de teléfono

![33](/READMEIMG/33.png?raw=true "Title")

Búsqueda de números
Para que el usuario pueda buscar la información acera de su propio numero puede ingresarlo en la barra de búsqueda luego al confirmar la búsqueda se remplaza los contenidos del div por una nueva tabla con los resultados de la consulta a la tabla de números telefónicos pero con un condicional extra la cual ara que se muestre el numero buscado, si es que existe
Validación del teléfono para la parte de modificar teléfono desde la interfaz de usuario.

![34](/READMEIMG/34.png?raw=true "Title")

En esta función lo que se hace es validar que lo que ingresemos al momento de modificar los teléfonos en la ventana del usuario sean solo números mediante la función validarNumero, también se valida que la longitud no sea mayor a 10 dígitos si supera los 10 dígitos se eliminan los caracteres extra. Después de estas validaciones llamamos a la función validarLongTel, que nos valida si la longitud es menor a 10 saldrá un mensaje de error con relación a la longitud del número de teléfono.
Validar el tipo de teléfono

![35](/READMEIMG/35.png?raw=true "Title")

Esta función verifica que el campo del tipo de teléfono no este vacío, no tiene restricciones ya que como es una pagina web no se limita a solo a las jergas del país.
Validación de operadora

![36](/READMEIMG/36.png?raw=true "Title")
![37](/READMEIMG/37.png?raw=true "Title")

Esta función verifica que el campo de la operadora del teléfono no este vacío, no tiene restricciones ya que como es una página web no se limita a solo a las compañías del país.
Validación de la fecha

![38](/READMEIMG/38.png?raw=true "Title")

En esta función lo que hacemos es que la fecha tenga el formato de dd/mm/yyyy verificando desde variables las cuales almacenan cada uno de los si no se cumple cada uno de estos campo el campo incorrecto se elimina, si el año es mayor a 2020 o menor  a 1920 se tomara como un año incorrecto.
Validación del correo

![39](/READMEIMG/39.png?raw=true "Title")

En esta función lo que se hace es separar los textos que están a los lados de la arroba dentro de variables, luego se valida que estas variables no estén vacías para proceder a comparar que la parte anterior al arroba no tenga una longitud menor a 3 y que la parte posterior sea igual a ups.edu.ec o est.ups.edu.ec.
Validación de la contraseña

![40](/READMEIMG/40.png?raw=true "Title")

En esta función lo que hacemos es validar que la contraseña sea tenga 8 caracteres como mínimo, después de pasar esta validación evaluamos si alguno de los assci se encuentra dentro del rango de las mayúsculas o minúsculas además de comparar si son iguales a los assci de los caracteres especiales antes descritos.
E.	La evidencia del correcto diseño de las páginas HTML usando CSS. Para lo cual, se puede generar fotografías instantáneas (pantallazos).
En la Página de login.html No se encontraron errores que corregir:

![41](/READMEIMG/41.png?raw=true "Title")

En la página crear_usuario.html no se tuvo la misma suerte.

![42](/READMEIMG/42.png?raw=true "Title")

Para solucionar el Warning en pantalla se utilizo lo que es un polyfill para las variables de tipo date.
Es necesario el uso de un polyfill debido a que el tipo date no es compatible con otros navegadores.
Para aplicar el polyfill se tuvo que descargar unas librerías de github e implementarlas dentro del proyecto de la siguiente manera:
-Creamos una nueva carpeta donde se almacenarán los datos de la librería 

![43](/READMEIMG/43.png?raw=true "Title")

Llamamos a estos componentes desde la pag que queremos que los ejecuten:

![44](/READMEIMG/44.png?raw=true "Title")

Y listo, ya no hay problema con el campo date en los demás navegadores.
F.	La evidencia del correcto funcionamiento de cada uno de los puntos requeridos. 
-Se le agrego los roles a la tabla usuario al definir las tablas usando el diagrama hecho en el DataModeler como guía para recrear estas tablas em la base de datos:

![45](/READMEIMG/45.png?raw=true "Title")

Aquí se muestra cómo se guardan los datos.

![46](/READMEIMG/46.png?raw=true "Title")

-Usando el DataModeler también se creó la tabla teléfonos y así mismo se usó el modelo como referencia para la base de datos del MariaBD

![47](/READMEIMG/47.png?raw=true "Title")

Así estarían ingresados los datos:

![48](/READMEIMG/48.png?raw=true "Title")

-El formulario de creación de cuentas es mostrado a los usuarios que recién entran a la página, al pasar el ratón sobre la opción de perfil se revelan dos opciones más, la de iniciar sesión y la de registrarse. 

![49](/READMEIMG/49.png?raw=true "Title")

En este caso la pulsar ese botón se redirecciona al formulario correspondiente, esta interfaz de aquí se asegura que los datos ingresados sean correctos antes de enviarlos

![50](/READMEIMG/50.png?raw=true "Title")

Al estar correctos los datos el usuario es creado y registrado en la base de datos:

![51](/READMEIMG/51.png?raw=true "Title")

Al pulsar aceptar se guarda en la base de datos creada en MariaBD

![52](/READMEIMG/52.png?raw=true "Title")

-Si un visitante quiere consultar la guía telefónica, puede acceder a esta como anónimo con el botón de más a la derecha.

![53](/READMEIMG/53.png?raw=true "Title")

Al entrar se le presentara al usuario anónimo buscar teléfonos ya sea por numero o por mail utilizando los buscadores proporcionados
Por mail: 

![54](/READMEIMG/54.png?raw=true "Title")

Por Cedula:

![55](/READMEIMG/55.png?raw=true "Title")
![56](/READMEIMG/56.png?raw=true "Title")

-Desde esa interfaz los Usuario Anónimos pueden llamar al numero mostrado o enviarle un mail al dueño de ese número al seleccionar llamar o enviar un mail respectivamente 

![57](/READMEIMG/57.png?raw=true "Title")

-Después de registrarse en el sistema los usuarios puede iniciar sesión seleccionan la primera opción revelada al seleccionar la opción de Perfil: 

![58](/READMEIMG/58.png?raw=true "Title")

Se piden las credenciales del usuario dentro de esta interfaz, que es la que luego de que se envíen los datos, cargara los datos del usuario

![59](/READMEIMG/59.png?raw=true "Title")

Una vez iniciada la sesión se podrá hacer uso de funciones únicas, dependiendo si es Admin o no y además el botón perfil cambiara t ahora mostrara el nombre del usuario y solo la opción serrar sesión

![60](/READMEIMG/60.png?raw=true "Title")

Al ser Admin, se puede entrar a la guía telefónica para administrar la base de datos desde ahí. La guía telefónica muestra todos los datos disponibles en la base de datos y provee acceso a los otros perfiles

![61](/READMEIMG/61.png?raw=true "Title")

Desde aquí Se pueden añadir nuevos usuarios con el Botón de Añadir, al ingresar ahí se carga un formulario donde al igual que en la interfaz de registro, se validaran los datos antes de poder ingresarlos. 

![62](/READMEIMG/62.png?raw=true "Title")

Al registrar al usuario se vuelve a al menú del admin ya con la tabla actualizada mostrando al nuevo usuario recién creado:

![63](/READMEIMG/63.png?raw=true "Title")

Al seleccionar la opción de modificar se redirecciona al admin a la pagina de modificaciones del usuario al que quiere modificar y puede realizar cambios como:

![64](/READMEIMG/64.png?raw=true "Title")

Modificar la información del Usuario: 

![65](/READMEIMG/65.png?raw=true "Title")

Cambiar Contraseña:

![66](/READMEIMG/66.png?raw=true "Title")

Agregar más teléfonos:

![67](/READMEIMG/67.png?raw=true "Title")

Abajo se muestran los teléfonos que tienen registrados el usuario:

![68](/READMEIMG/68.png?raw=true "Title")

Así mismo se puede modificar el numero al seleccionar modificar en el teléfono que se quiere modificar:

![69](/READMEIMG/69.png?raw=true "Title")

Al pulsar aceptar se guarda:

![70](/READMEIMG/70.png?raw=true "Title")

Y por ultimo las funciones de eliminar, se puede eliminar los números y al usuario en si, si se quiere eliminar un solo numero en si se lo puede hacer en la lista personal de teléfonos del usuario que se muestra abajo.
En este caso vamos a liminar al usuario directo y luego de hacer eso se redirecciona de nuevo al menú de la guía telefónica ya actualizada y obvio, sin el usuario eliminado.

![71](/READMEIMG/71.png?raw=true "Title")

-Por otra parte, todos los usuarios pueden acceder a la información de su propio perfil al pulsar su nombre en la interfaz principal

![72](/READMEIMG/72.png?raw=true "Title")

Una vez en el perfil del usuario este puede modificar sus datos, añadir más teléfonos a su cuenta eliminar teléfonos de su cuenta y por supuesto, eliminar su propia cuenta.

![73](/READMEIMG/73.png?raw=true "Title")

-En la tabla que se muestra abajo el usuario puede gestionar sus propios teléfonos, los puede agregar desde la opción de arriba y estos se mostraran automáticamente abajo y desde abajo se los puede modificar o eliminar según el usuario quiera.

![74](/READMEIMG/74.png?raw=true "Title")

G.	Información del GitHub
Usuario: Florencio P
URL: https://github.com/FlorencioP/Practica04-Mi-Agenda-Telef-nica

