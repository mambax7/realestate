<?php declare(strict_types=1);
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * @copyright       2026 XOOPS Project (https://xoops.org)
 * @license         GNU GPL 2.0 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @since           1.0
 * @author          XOOPS Development Team (Mamba)
 */


// General Admin
\define('_AM_REALESTATE_DASHBOARD', 'Panel de Control');
\define('_AM_REALESTATE_PROPERTIES', 'Propiedades');
\define('_AM_REALESTATE_MESSAGES', 'Mensajes');
\define('_AM_REALESTATE_SETTINGS', 'Configuración');

// Dashboard
\define('_AM_REALESTATE_STATS_TOTAL', 'Total de Propiedades');
\define('_AM_REALESTATE_STATS_ACTIVE', 'Anuncios Activos');
\define('_AM_REALESTATE_STATS_FEATURED', 'Destacados');
\define('_AM_REALESTATE_STATS_FOR_SALE', 'En Venta');
\define('_AM_REALESTATE_STATS_FOR_RENT', 'En Alquiler');
\define('_AM_REALESTATE_STATS_SOLD', 'Vendidos');
\define('_AM_REALESTATE_STATS_RENTED', 'Alquilados');
\define('_AM_REALESTATE_STATS_MESSAGES', 'Mensajes No Leídos');

// Property Form
\define('_AM_REALESTATE_ADD_PROPERTY', 'Agregar Propiedad');
\define('_AM_REALESTATE_EDIT_PROPERTY', 'Editar Propiedad');
\define('_AM_REALESTATE_DELETE_PROPERTY', 'Eliminar Propiedad');
\define('_AM_REALESTATE_DELETE_CONFIRM', '¿Está seguro de que desea eliminar esta propiedad y todas sus imágenes?');
\define('_AM_REALESTATE_PROPERTY_SAVED', 'Propiedad guardada con éxito.');
\define('_AM_REALESTATE_PROPERTY_DELETED', 'Propiedad eliminada con éxito.');

// Form Fields
\define('_AM_REALESTATE_TITLE', 'Título');
\define('_AM_REALESTATE_SLUG', 'Slug (URL)');
\define('_AM_REALESTATE_DESCRIPTION', 'Descripción');
\define('_AM_REALESTATE_PROPERTY_TYPE', 'Tipo de Propiedad');
\define('_AM_REALESTATE_STATUS', 'Estado');
\define('_AM_REALESTATE_PRICE', 'Precio');
\define('_AM_REALESTATE_CURRENCY', 'Moneda');
\define('_AM_REALESTATE_ADDRESS', 'Dirección');
\define('_AM_REALESTATE_CITY', 'Ciudad');
\define('_AM_REALESTATE_REGION', 'Región / Provincia');
\define('_AM_REALESTATE_COUNTRY', 'País');
\define('_AM_REALESTATE_LATITUDE', 'Latitud');
\define('_AM_REALESTATE_LONGITUDE', 'Longitud');
\define('_AM_REALESTATE_BEDROOMS', 'Dormitorios');
\define('_AM_REALESTATE_BATHROOMS', 'Baños');
\define('_AM_REALESTATE_AREA', 'Superficie (m&sup2;)');
\define('_AM_REALESTATE_YEAR_BUILT', 'Año de Construcción');
\define('_AM_REALESTATE_FURNISHED', 'Amueblado');
\define('_AM_REALESTATE_AVAILABLE_FROM', 'Disponible Desde');
\define('_AM_REALESTATE_OWNER', 'Propietario');
\define('_AM_REALESTATE_FEATURED', 'Destacado');
\define('_AM_REALESTATE_ACTIVE', 'Activo');
\define('_AM_REALESTATE_VIEWS', 'Visitas');
\define('_AM_REALESTATE_CREATED', 'Creado');
\define('_AM_REALESTATE_UPDATED', 'Actualizado');

// Tabs
\define('_AM_REALESTATE_TAB_BASIC', 'Información Básica');
\define('_AM_REALESTATE_TAB_DETAILS', 'Detalles');
\define('_AM_REALESTATE_TAB_IMAGES', 'Imágenes');
\define('_AM_REALESTATE_TAB_LOCATION', 'Ubicación');

// Images
\define('_AM_REALESTATE_IMAGES', 'Imágenes de la Propiedad');
\define('_AM_REALESTATE_UPLOAD_IMAGE', 'Cargar Imagen');
\define('_AM_REALESTATE_IMAGE_TITLE', 'Título de la Imagen');
\define('_AM_REALESTATE_SET_PRIMARY', 'Establecer como Principal');
\define('_AM_REALESTATE_DELETE_IMAGE', 'Eliminar Imagen');
\define('_AM_REALESTATE_IMAGE_UPLOADED', 'Imagen cargada con éxito.');
\define('_AM_REALESTATE_IMAGE_DELETED', 'Imagen eliminada con éxito.');
\define('_AM_REALESTATE_NO_IMAGES', 'Aún no se han cargado imágenes.');
\define('_AM_REALESTATE_PRIMARY_SET', 'Imagen principal actualizada.');
\define('_AM_REALESTATE_DRAG_REORDER', 'Arrastre para reordenar las imágenes');
\define('_AM_REALESTATE_MAX_IMAGES_REACHED', 'Número máximo de imágenes alcanzado.');

// Errors
\define('_AM_REALESTATE_ERR_UPLOAD', 'Error al cargar la imagen.');
\define('_AM_REALESTATE_ERR_FILESIZE', 'El tamaño del archivo excede el máximo de %s MB.');
\define('_AM_REALESTATE_ERR_FILETYPE', 'Tipo de archivo no válido. Permitidos: JPG, PNG, GIF, WebP.');
\define('_AM_REALESTATE_ERR_NOT_FOUND', 'Propiedad no encontrada.');
\define('_AM_REALESTATE_ERR_PERMISSION', 'No tiene permiso para realizar esta acción.');
\define('_AM_REALESTATE_ERR_TOKEN', 'Token de seguridad caducado. Por favor, inténtelo de nuevo.');

// Bulk Actions
\define('_AM_REALESTATE_BULK_ACTIVATE', 'Activar Seleccionados');
\define('_AM_REALESTATE_BULK_DEACTIVATE', 'Desactivar Seleccionados');
\define('_AM_REALESTATE_BULK_DELETE', 'Eliminar Seleccionados');
\define('_AM_REALESTATE_BULK_FEATURE', 'Destacar Seleccionados');
\define('_AM_REALESTATE_BULK_UNFEATURE', 'Quitar Destacado de Seleccionados');
\define('_AM_REALESTATE_BULK_DONE', 'Acción masiva completada.');
\define('_AM_REALESTATE_SELECT_ACTION', 'Seleccionar Acción');
\define('_AM_REALESTATE_NO_SELECTION', 'No hay elementos seleccionados.');

// Messages
\define('_AM_REALESTATE_MESSAGE_LIST', 'Mensajes de Contacto');
\define('_AM_REALESTATE_MESSAGE_VIEW', 'Ver Mensaje');
\define('_AM_REALESTATE_MESSAGE_FROM', 'De');
\define('_AM_REALESTATE_MESSAGE_EMAIL', 'Email');
\define('_AM_REALESTATE_MESSAGE_PHONE', 'Teléfono');
\define('_AM_REALESTATE_MESSAGE_SUBJECT', 'Asunto');
\define('_AM_REALESTATE_MESSAGE_BODY', 'Mensaje');
\define('_AM_REALESTATE_MESSAGE_DATE', 'Fecha');
\define('_AM_REALESTATE_MESSAGE_PROPERTY', 'Propiedad');
\define('_AM_REALESTATE_MESSAGE_DELETED', 'Mensaje eliminado.');
\define('_AM_REALESTATE_NO_MESSAGES', 'No se encontraron mensajes.');

// Filter/Sort
\define('_AM_REALESTATE_FILTER', 'Filtro');
\define('_AM_REALESTATE_ALL', 'Todo');
\define('_AM_REALESTATE_SORT_NEWEST', 'Más Recientes Primero');
\define('_AM_REALESTATE_SORT_OLDEST', 'Más Antiguos Primero');
\define('_AM_REALESTATE_SORT_PRICE_ASC', 'Precio: De Menor a Mayor');
\define('_AM_REALESTATE_SORT_PRICE_DESC', 'Precio: De Mayor a Menor');
\define('_AM_REALESTATE_SORT_TITLE', 'Título A-Z');

// Misc
\define('_AM_REALESTATE_YES', 'Sí');
\define('_AM_REALESTATE_NO', 'No');
\define('_AM_REALESTATE_SAVE', 'Guardar');
\define('_AM_REALESTATE_CANCEL', 'Cancelar');
\define('_AM_REALESTATE_ACTIONS', 'Acciones');
\define('_AM_REALESTATE_ID', 'ID');

// Seeder
\define('_AM_REALESTATE_SEEDING', 'Insertando datos de ejemplo...');
\define('_AM_REALESTATE_SEED_DONE', 'Datos de ejemplo creados con éxito.');
\define('_AM_REALESTATE_SEED_FAIL', 'Error al crear datos de ejemplo.');
