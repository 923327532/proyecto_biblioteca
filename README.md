# 📚 Plataforma de Gestión de Biblioteca (Laravel + Oracle)

Este proyecto es una plataforma web robusta desarrollada con **Laravel 10** y **Oracle 19c** que permite gestionar de forma eficiente libros, categorías, usuarios, préstamos y reportes.

Cuenta con control de accesos según roles (📖 *Usuario Común* y 🧑‍🏫 *Bibliotecario*), diseño responsive y validaciones tanto en frontend como en backend.

---

## 🔧 Tecnologías utilizadas

* **Laravel 10** (Framework PHP)
* **Oracle 19c** (Base de datos relacional)
* **Blade** (Motor de plantillas)
* **Bootstrap 5** (Diseño responsive)
* **Chart.js** (Gráficos en reportes)
* **Procedimientos almacenados y secuencias en Oracle**

---

## 🔐 Roles y Accesos del Sistema

| Rol             | Acceso Permitido                                               |
| --------------- | -------------------------------------------------------------- |
| `usuario`       | Lectura de libros y préstamos. No puede modificar información. |
| `bibliotecario` | Acceso total (CRUD de libros, categorías, usuarios, reportes). |

Las restricciones están implementadas en:

* **Frontend:**

  * Los botones de "Categorías" y "Usuarios" están visibles pero bloqueados para `usuario`.
  * En "Libros", el `usuario` solo puede visualizar.
* **Backend:**

  * Middleware verifica el rol antes de permitir acciones.
  * Procedimientos Oracle controlan registros duplicados.

---

## 💡 Flujo de Uso de la Aplicación

1. Ingreso a la página principal `/`.
2. Registro:

   * Si no está autenticado, solo puede registrarse como `usuario`.
   * Si un `bibliotecario` está logueado, puede crear nuevos usuarios o bibliotecarios.
3. Login en `/login`.
4. Acceso a módulos según rol:

   * `usuario`: Libros, Préstamos.
   * `bibliotecario`: Todos los módulos.

---

## 📓 Módulos Detallados y Pantallas

### 📝 Pantalla de Login

* Ruta: `/login`
* ![image](https://github.com/user-attachments/assets/d156997a-1a2c-42dd-9445-7e03946fcb83)

* Valida credenciales contra Oracle.
* Redirección a `/home` según rol.

### 📥 Registro de Usuarios

* Ruta: `/register`
* ![image](https://github.com/user-attachments/assets/bc55d00f-94ba-40bd-8974-17cfb761ce68)
* Si está sin autenticar, sólo puede registrarse como `usuario`.
* `bibliotecario` puede registrar otros usuarios o bibliotecarios.
* Procedimiento Oracle: `agregar_usuario`.

### 📖 Libros

* Ruta: `/libros`
* ![image](https://github.com/user-attachments/assets/fbd69ab8-64b4-425f-afa3-41f218c38cce)

* Tabla responsiva con listado de libros.
* `bibliotecario` puede:

  * Crear, Editar, Eliminar libros.
* `usuario` solo puede visualizar.

### 🔖 Categorías

* Ruta: `/categorias`
* ![image](https://github.com/user-attachments/assets/7a68d11c-f22f-4058-bb4a-d6926569f2f0)

* Solo accesible para `bibliotecario`.
* CRUD de categorías.
* Imagen decorativa en formularios.

### 👥 Gestión de Usuarios

* Ruta: `/usuarios`
![image](https://github.com/user-attachments/assets/d739e004-7687-4fb0-be20-85e5eefa3aa5)

* Solo para `bibliotecario`.
* Listado de usuarios.
* Eliminación de usuarios.

### 📦 Préstamos

* Ruta: `/prestamos`
* ![image](https://github.com/user-attachments/assets/6eb91f9d-f8ac-4d8a-9783-9b810d0912e4)

* Acceso para todos los usuarios.
* Registro de nuevo préstamo.
* Devolución de libros.
* Historial de préstamos.

### 📊 Reportes

* Ruta: `/reportes`
* ![image](https://github.com/user-attachments/assets/1c6f5607-ef53-4cd5-a7d2-ae848931e1f3)

* Solo para `bibliotecario`.
* Reporte de:

  * Libros más prestados.
  * Usuarios más activos.
* Gráficos con Chart.js.
* Filtros por rango de fechas.

---

## 🛡️ Seguridad y Restricciones

* Middleware en rutas según `Auth::user()->rol`.
* Botones bloqueados en frontend para usuarios sin permisos.
* CSRF tokens activos en formularios.
* Validaciones en Laravel Request.
* Procedimiento Oracle `agregar_usuario` previene registros duplicados.
* Control de errores al conectar con Oracle.

---

## 📊 Estructura de Carpetas Relevante

```
resources/views/
├── home.blade.php
├── auth/
│   ├── login.blade.php
│   └── register.blade.php
├── libros.blade.php
├── categorias.blade.php
├── usuarios.blade.php
├── prestamos.blade.php
├── reportes/
│   └── index.blade.php
public/images/
├── login.png
├── registro.png
├── libros.png
├── categorias.png
├── usuarios.png
├── prestamos.png
├── reportes.png
```

---

## 🛠️ Requisitos para Ejecutar la Aplicación

1. Tener **PHP >= 8.1**.
2. Composer instalado.
3. Oracle Database 19c operativo.
4. Extensión `pdo_oci` habilitada en PHP.
5. Archivo `.env` configurado:

```ini
DB_CONNECTION=oracle
DB_HOST=localhost
DB_PORT=1521
DB_DATABASE=XE
DB_USERNAME=system
DB_PASSWORD=tu_clave
```

6. Instalar dependencias:

```bash
composer install
npm install && npm run dev
```

7. Migraciones y seeders:

```bash
php artisan migrate --seed
```

8. Iniciar servidor:

```bash
php artisan serve
```

Acceder en [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 🔄 Ejemplos de Procedimientos Oracle Utilizados

```sql
CREATE OR REPLACE PROCEDURE agregar_usuario(
    p_nombre IN VARCHAR2,
    p_email IN VARCHAR2,
    p_password IN VARCHAR2,
    p_rol IN VARCHAR2
) IS
BEGIN
    INSERT INTO usuarios(nombre, email, password, rol)
    VALUES (p_nombre, p_email, p_password, p_rol);
END;
```

Procedimientos similares para:

* Registrar préstamos.
* Reportes estadísticos.
* Prevención de duplicados.

---

## 🔹 Consideraciones Finales

* Respetar los permisos en frontend y backend.
* Validaciones tanto del lado del cliente como servidor.
* Los botones de "Categorías" y "Usuarios" están bloqueados para usuarios comunes aunque sean visibles.
* Reportes solo accesibles para `bibliotecario`.
* Los usuarios comunes no pueden modificar libros ni categorías.
* CSRF protegiendo todos los formularios.
* Compatible con navegadores modernos.

---

**💡 Recomendación:** Para pruebas, usar usuarios de ambos roles y validar todas las restricciones.

---

# 🎉 Listo para producción tras pruebas exhaustivas.

Sistema funcional, seguro y adaptado a buenas prácticas.
