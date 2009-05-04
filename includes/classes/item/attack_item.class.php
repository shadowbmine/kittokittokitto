<?php
/**
 * Fooditem definition. 
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
 * @subpackage Items
 * @version 1.0.0
 **/

/**
 * An item of food. 
 * 
 * @uses ActiveTable
 * @package Kitto_Kitto_Kitto
 * @subpackage Items 
 * @copyright 2007 Nicholas Evans
 * @author Nick 'Owl' Evans <owlmanatt@gmail> 
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPLv3
 **/
class Attack_Item extends Item
{
    /**
     * Give the item to a specified pet.
     *
     * Increases pet's attack level and destroys the item. 
     * 
     * @param Pet $pet 
     * @return string The success message. 
     **/
    public function AttachTo(Pet $pet,$quantity)
    {
        if($quantity > $this->getQuantity())
        {
            throw new ArgumentError("This stack does not have $quantity items.");
        }
        
        // Do it before destroying the object.
        $pet->consume(($this->getHungerBonus() * $quantity));
        $text = "You have increased {$pet->getPetName()} attack by  {$this->makeActionText($quantity)}.";
        
        if($quantity == $this->getQuantity())
        {
            $this->destroy();
        }
        else
        {
            $this->setQuantity(($this->getQuantity() - $quantity));
            $this->save();
        }
         
        return $text;
    } // end feedTo

    public function listAttributes()
    {
        return array(
            array(
                'name' => 'attack_bonus',
                'label' => 'Attack damage',
                'type' => 'text',
                'validation_type' => 'integer',
                'max_length' => 3,
                'size' => 7,
            ),
        );
    } // end listAttributes

} // end Attack_Item

?>