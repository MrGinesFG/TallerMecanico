# Taller Mecánico - Monkey Motors

Sistema Integral de Gestión Operativa, Trazabilidad de Reparaciones y API REST para el taller mecánico Monkey Motors.

Este proyecto ha sido desarrollado como trabajo final para la asignatura Programación III de la Tecnicatura Universitaria en Programación (TUP) de la UTN FRRE.

## Integrantes del Equipo

- **Gines Fabrizio (Integrante 1):** Diseño General y Módulo de Clientes. Responsable de la plantilla maestra (Layout), página principal, CRUD de Clientes con Livewire y ficha detallada.
- **Mendoza Fabian (Integrante 2):** Autenticación y Gestión Automotriz. Responsable del módulo de Login, CRUD de Vehículos y Órdenes, y Control de Estados con Livewire.
- **Cuellar Alex (Integrante 3):** Módulo de Servicios y Analítica. Responsable de la implementación técnica del CRUD de Servicios, la lógica de vinculación de servicios en tabla pivote, y el Dashboard de Gestión y Componente Livewire Estadístico.
- **Sanchez Martin (Integrante 4):** Desarrollo del Ecosistema API REST. Responsable del módulo de autenticación de usuarios (Register), los endpoints y la arquitectura de servicios web, la securización mediante Laravel Sanctum y la confección de esta documentación técnica.

## Stack Tecnológico

- **Backend:** Laravel 11+ (Procesamiento lógico, seguridad y orquestación general)
- **Persistencia de Datos:** MySQL (Almacenamiento relacional estricto con integridad referencial)
- **Capa de Reactividad:** Laravel Livewire (Actualización de órdenes en tiempo real y búsquedas predictivas)
- **Frontend Estructural:** Tailwind CSS (Estilos adaptables a tablets y smartphones)
- **Seguridad API:** Laravel Sanctum (Emisión de tokens portadores para consumos REST)

## Entidades del Dominio

El sistema opera sobre cinco modelos nucleares interconectados:
1. **User:** Gestiona las credenciales de acceso del personal.
2. **Cliente:** Contiene los datos personales de contacto e identidad de los propietarios.
3. **Vehiculo:** Entidad dependiente del cliente, con número de chasis y patente.
4. **OrdenTrabajo:** Documento dinámico que nuclea el estado de la reparación, costo, y fechas.
5. **Servicio:** Catálogo maestro de prestaciones estándar ofrecidas por el taller.

## Arquitectura de Servicios Web (API REST)

El ecosistema API REST se estructura bajo el archivo `routes/api.php` y permite la interacción de sistemas externos mediante endpoints JSON seguros. Las rutas principales son:
- **POST `/api/login`:** Generación de tokens de acceso (Bearer Token).
- **POST `/api/register`:** Interfaz de altas de usuarios del sistema con validación estricta y asignación inicial de roles.
- **GET `/api/clientes` y `/api/clientes/{id}`:** Consulta de clientes.
- **GET `/api/ordenes` y `/api/ordenes/{id}`:** Consulta del historial estructurado de órdenes de trabajo.
- **POST `/api/logout`:** Cierre de sesión y revocación de token.

Todas las rutas operativas de la API están protegidas bajo el middleware `auth:sanctum`.

## Despliegue y Hosting

El sistema se encuentra empaquetado para su ejecución en entornos en la nube y actualmente hospedado en **Render.com**.
- URL de Producción: [https://monkeymotors.onrender.com](https://monkeymotors.onrender.com)

## Instrucciones de Instalación Local

1. Clonar el repositorio.
2. Ejecutar `composer install`.
3. Ejecutar `npm install && npm run build`.
4. Copiar `.env.example` a `.env` y configurar las credenciales de base de datos (`DB_DATABASE=taller_mecanico`).
5. Generar la clave de la aplicación: `php artisan key:generate`.
6. Ejecutar las migraciones y seeders: `php artisan migrate --seed` (Nota: Seguir la política anticonflictos de nunca modificar migraciones ya pusheadas).
7. Iniciar el servidor de desarrollo: `php artisan serve`.

## Configuración de Idioma

El sistema se encuentra configurado para soportar traducción completa de mensajes de validación y sistema al idioma Español (`es`), cumpliendo con los requisitos de localización exigidos.
