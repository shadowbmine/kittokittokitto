<?php
/**
 *  
 **/

/**
 * Notifications.
 * 
 * @uses ActiveTable
 * @package Kitto_Kitto_Kitto
 * @subpackage Core 
 * @copyright 2007 Nicholas Evans
 * @author Nick 'Owl' Evans <owlmanatt@gmail> 
 * @license GNU GPL v2 {@link http://www.gnu.org/licenses/gpl-2.0.txt}
 **/
class Notification extends ActiveTable
{
    protected $table_name = 'user_notification';
    protected $primary_key = 'user_notification_id';

} // end Notification

?>
