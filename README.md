# Lab2-Kev-Yen
# Laboratorio 2 - Segundo Cómputo
*Asignatura:* Programación Computacional IV  
[cite_start]*Institución:* Universidad Gerardo Barrios (UGB) [cite: 1, 2]

---

## 1. Análisis del Sistema de Login
[cite_start]*¿De qué forma manejaste el login de usuarios?* Para este laboratorio, implementamos un control de acceso basado en *Sesiones de PHP* (session_start()) y validación de credenciales mediante consultas preparadas a la base de datos MySQL[cite: 4, 6]. 

*¿Por qué funciona de esta forma?* Funciona así porque las sesiones permiten que el servidor identifique de forma única a un navegador durante su visita. Al validar que el usuario existe en nuestra tabla usuarios, guardamos su nombre en la superglobal $_SESSION. [cite_start]Esto permite que la página dashboard.php verifique si el usuario tiene permiso de estar ahí; de lo contrario, lo expulsa automáticamente al login, garantizando la seguridad del sistema[cite: 6, 12].

## 2. Persistencia: Bases de Datos vs. Variables
*¿Por qué es necesario utilizar bases de datos en lugar de variables?* En el desarrollo web profesional, las variables de PHP son temporales y su ciclo de vida termina apenas el script se deja de ejecutar o el usuario cierra la pestaña. [cite_start]Las bases de datos son necesarias porque ofrecen *persistencia de datos*[cite: 13]. Esto significa que la información se guarda físicamente en el disco duro del servidor (en nuestro caso, gestionado por XAMPP en el puerto 8805), permitiendo que los registros no se pierdan al apagar la computadora o reiniciar el servidor.

## 3. Almacenamiento: DB vs. Datos Temporales
[cite_start]*¿En qué casos es mejor cada solución?* * *Bases de Datos*: Se deben utilizar para información crítica, permanente y de gran volumen, como el registro de usuarios, inventarios o el historial de transacciones que se solicitó en la guía[cite: 7, 14].
* *Datos Temporales (Cookies/Sesiones)*: 
    * [cite_start]*Sesiones*: Son ideales para el manejo de estados de autenticación (como el login solicitado), ya que se borran al cerrar el navegador y son más seguras al estar del lado del servidor[cite: 14].
    * [cite_start]*Cookies*: Se utilizan para datos de conveniencia del usuario que no comprometen la seguridad, como recordar un tema oscuro, un idioma o el nombre de usuario para futuras visitas[cite: 14].

## 4. Descripción del Diccionario de Datos
[cite_start]A continuación, se describen las tablas diseñadas para cumplir con los requerimientos del laboratorio[cite: 15, 16]:

### Tabla: usuarios
| Campo | Tipo de Dato | Justificación |
| :--- | :--- | :--- |
| *id* | INT (AI) | Clave primaria. El autoincremento asegura que cada usuario tenga un identificador único sin errores manuales. |
| *usuario* | VARCHAR(50) | Permite almacenar nombres de usuario alfanuméricos de longitud variable de forma eficiente. |
| *clave* | VARCHAR(255) | Espacio suficiente para manejar contraseñas, incluso si se deciden encriptar con algoritmos de hash en el futuro. |

### Tabla: registros
| Campo | Tipo de Dato | Justificación |
| :--- | :--- | :--- |
| *id* | INT (AI) | Necesario para poder gestionar (editar o eliminar) cada entrada de la tabla de forma independiente. |
| *nombre_item* | VARCHAR(100) | Tipo de dato ideal para descripciones de texto cortas y nombres de objetos. |
| *cantidad* | INT | Se eligió entero para permitir validaciones matemáticas y asegurar que no se ingresen caracteres no numéricos. |
| *fecha* | TIMESTAMP | Registra automáticamente el momento de la creación, asegurando la integridad del historial. |

---
[cite_start]Este proyecto cumple con los criterios de Código, Funcionalidad, Diseño y Análisis solicitados en la evaluación[cite: 17, 18, 19, 20, 21].
