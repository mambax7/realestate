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


// Module Info
\define('_MI_REALESTATE_NAME', 'Inmobiliaria y Alquileres');
\define('_MI_REALESTATE_DESC', 'Un sistema completo de anuncios inmobiliarios y alquileres para XOOPS');

// Admin Menu
\define('_MI_REALESTATE_ADMENU_DASHBOARD', 'Panel de Control');
\define('_MI_REALESTATE_ADMENU_PROPERTIES', 'Propiedades');
\define('_MI_REALESTATE_ADMENU_MESSAGES', 'Mensajes');
\define('_MI_REALESTATE_ADMENU_ABOUT', 'Acerca de');

// Property Types
\define('_MI_REALESTATE_TYPE_APARTMENT', 'Apartamento');
\define('_MI_REALESTATE_TYPE_HOUSE', 'Casa');
\define('_MI_REALESTATE_TYPE_VILLA', 'Villa');
\define('_MI_REALESTATE_TYPE_OFFICE', 'Oficina');
\define('_MI_REALESTATE_TYPE_LAND', 'Terreno');

// Status
\define('_MI_REALESTATE_STATUS_FOR_SALE', 'En Venta');
\define('_MI_REALESTATE_STATUS_FOR_RENT', 'En Alquiler');
\define('_MI_REALESTATE_STATUS_SOLD', 'Vendido');
\define('_MI_REALESTATE_STATUS_RENTED', 'Alquilado');

// Config
\define('_MI_REALESTATE_CFG_CURRENCY', 'Moneda Predeterminada');
\define('_MI_REALESTATE_CFG_CURRENCY_DESC', 'Código de moneda predeterminado para nuevos anuncios');
\define('_MI_REALESTATE_CFG_PERPAGE', 'Anuncios por Página');
\define('_MI_REALESTATE_CFG_PERPAGE_DESC', 'Número de anuncios inmobiliarios a mostrar por página');
\define('_MI_REALESTATE_CFG_MAX_IMAGES', 'Máximo de Imágenes por Propiedad');
\define('_MI_REALESTATE_CFG_MAX_IMAGES_DESC', 'Número máximo de imágenes permitidas por propiedad');
\define('_MI_REALESTATE_CFG_MAX_FILESIZE', 'Tamaño Máximo de Archivo de Imagen (MB)');
\define('_MI_REALESTATE_CFG_MAX_FILESIZE_DESC', 'Tamaño máximo del archivo de imagen en megabytes');
\define('_MI_REALESTATE_CFG_THUMB_W', 'Ancho de Miniatura');
\define('_MI_REALESTATE_CFG_THUMB_W_DESC', 'Ancho de imagen miniatura en píxeles');
\define('_MI_REALESTATE_CFG_THUMB_H', 'Alto de Miniatura');
\define('_MI_REALESTATE_CFG_THUMB_H_DESC', 'Alto de imagen miniatura en píxeles');
\define('_MI_REALESTATE_CFG_FEATURED_COUNT', 'Cantidad de Anuncios Destacados');
\define('_MI_REALESTATE_CFG_FEATURED_COUNT_DESC', 'Número de anuncios destacados en la página principal');
\define('_MI_REALESTATE_CFG_ENABLE_MAP', 'Habilitar Mapas');
\define('_MI_REALESTATE_CFG_ENABLE_MAP_DESC', 'Mostrar OpenStreetMap en páginas de detalles de propiedades');
\define('_MI_REALESTATE_CFG_REQUIRE_LOGIN', 'Requerir Inicio de Sesión para Contacto');
\define('_MI_REALESTATE_CFG_REQUIRE_LOGIN_DESC', 'Requerir inicio de sesión de usuario para enviar mensajes de contacto');
\define('_MI_REALESTATE_CFG_SEED_DATA', 'Datos de Ejemplo');
\define('_MI_REALESTATE_CFG_SEED_DATA_DESC', 'Insertar propiedades e imágenes de ejemplo durante la instalación');

// Blocks
\define('_MI_REALESTATE_BLOCK_FEATURED', 'Propiedades Destacadas');
\define('_MI_REALESTATE_BLOCK_FEATURED_DESC', 'Mostrar anuncios inmobiliarios destacados');
\define('_MI_REALESTATE_BLOCK_LATEST', 'Últimos Anuncios');
\define('_MI_REALESTATE_BLOCK_LATEST_DESC', 'Mostrar los anuncios inmobiliarios más recientes');
\define('_MI_REALESTATE_BLOCK_CITIES', 'Explorar por Ciudad');
\define('_MI_REALESTATE_BLOCK_CITIES_DESC', 'Mostrar enlaces de filtro de ciudad');

// Permissions
\define('_MI_REALESTATE_PERM_SUBMIT', 'Enviar Propiedad');
\define('_MI_REALESTATE_PERM_SUBMIT_DESC', 'Permitido enviar nuevos anuncios inmobiliarios');
\define('_MI_REALESTATE_PERM_EDIT_OWN', 'Editar Propiedades Propias');
\define('_MI_REALESTATE_PERM_EDIT_OWN_DESC', 'Permitido editar sus propios anuncios inmobiliarios');
\define('_MI_REALESTATE_PERM_EDIT_ALL', 'Editar Todas las Propiedades');
\define('_MI_REALESTATE_PERM_EDIT_ALL_DESC', 'Permitido editar cualquier anuncio inmobiliario');
\define('_MI_REALESTATE_PERM_DELETE', 'Eliminar Propiedades');
\define('_MI_REALESTATE_PERM_DELETE_DESC', 'Permitido eliminar anuncios inmobiliarios');
\define('_MI_REALESTATE_PERM_IMAGES', 'Gestionar Imágenes');
\define('_MI_REALESTATE_PERM_IMAGES_DESC', 'Permitido cargar y gestionar imágenes de propiedades');
\define('_MI_REALESTATE_PERM_APPROVE', 'Aprobar Anuncios');
\define('_MI_REALESTATE_PERM_APPROVE_DESC', 'Permitido aprobar anuncios inmobiliarios enviados');

// Search
\define('_MI_REALESTATE_SEARCH', 'Buscar Propiedades');

// Notifications
\define('_MI_REALESTATE_NOTIFY_GLOBAL', 'Global');
\define('_MI_REALESTATE_NOTIFY_GLOBAL_DESC', 'Notificaciones inmobiliarias globales');
\define('_MI_REALESTATE_NOTIFY_NEW_LISTING', 'Nuevo Anuncio');
\define('_MI_REALESTATE_NOTIFY_NEW_LISTING_DESC', 'Notificar cuando se publique una nueva propiedad');
