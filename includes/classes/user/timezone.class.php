<?php
/**
 * Timezone classfile. 
 *
 * This file is part of 'Kitto_Kitto_Kitto'.
 *
 * 'Kitto_Kitto_Kitto' is free software; you can redistribute
 * it and/or modify it under the terms of the GNU
 * General Public License as published by the Free
 * Software Foundation; either version 3 of the License,
 * or (at your option) any later version.
 * 
 * 'Kitto_Kitto_Kitto' is distributed in the hope that it will
 * be useful, but WITHOUT ANY WARRANTY; without even the
 * implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE.  See the GNU General Public
 * License for more details.
 * 
 * You should have received a copy of the GNU General
 * Public License along with 'Kitto_Kitto_Kitto'; if not,
 * write to the Free Software Foundation, Inc., 51
 * Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @author Nicholas 'Owl' Evans <owlmanatt@gmail.com>
 * @copyright Nicolas Evans, 2007
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPLv3
 * @package Kitto_Kitto_Kitto
 * @subpackage Core
 * @version 1.0.0
 **/

/**
 * Timezone 
 * 
 * @uses ActiveTable
 * @package Kitto_Kitto_Kitto
 * @subpackage Core 
 * @copyright 2007 Nicholas Evans
 * @author Nick 'Owl' Evans <owlmanatt@gmail> 
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPLv3
 **/
class Timezone extends ActiveTable
{
    protected $table_name = 'timezone';
    protected $primary_key = 'timezone_id';

    /**
     * Makes the timezone offset human-readable.
     *
     * + added if it's not there, .0 stripped, .5 => :30.
     * 
     * @return string 
     **/
    public function getFormattedOffset()
    {
        $offset = $this->getTimezoneOffset();
        
        $broken = explode('.',$offset);
        if($broken[1] == 0)
        {
            $offset = $broken[0];
        }
        else
        {
            $offset = $broken[0].':30'; 
        }
       
        if(substr($offset,0,1) != '-')
        {
            $offset = '+'.$offset;
        }

        return $offset;
    } // end getFormattedOffset

    /**
     * Output a nicely-formatted timezone name - Continent/CODE. 
     *
     * UTC is returned as 'UTC (0)'.
     * 
     * @return string 
     **/
    public function getTimezoneName()
    {
        if($this->getTimezoneShortName() != 'UTC')
        {
            return "{$this->getTimezoneContinent()}/{$this->getTimezoneShortName()} ({$this->getFormattedOffset()})";
        }

        return 'UTC (0)';
    } // end getTimezoneName
} // end Timezone

?>