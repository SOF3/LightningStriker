<?php
/**
*  ______         _          _            
* |___  /        | |        | |           
*    / / __ _  __| | ___ ___| |_ ___ _ __ 
*   / / / _` |/ _` |/ _ \_  / __/ _ \ '__|
*  / /_| (_| | (_| |  __// /| ||  __/ |   
* /_____\__,_|\__,_|\___/___|\__\___|_|                                         
*
* LightningStriker for PocketMine-MP
* Copyright (c) 2019 Zadezter  < https://github.com/Implasher >
*
* This software is distributed under "GNU General Public License v3.0".
* This license allows you to use it and/or modify it but you are not at
* all allowed to sell this plugin at any cost. If found doing so the
* necessary action required would be taken.
*
* LightningStriker is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License v3.0 for more details.
*
* You should have received a copy of the GNU General Public License v3.0
* along with this program. If not, see
* < https://opensource.org/licenses/GPL-3.0 >.
* ------------------------------------------------------------------------
**/
declare(strict_types=1);

namespace Zadezter\LightningStriker;

use pocketmine\entity\Entity;
use pocketmine\network\mcpe\protocol\AddEntityPacket;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\Player;

class Main extends PluginBase {
	
    public function onEnable() : void{
        $this->saveResource("lightning.yml");
        $config = new Config($this->getDataFolder() . "lightning.yml");
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($config), $this);
    }
	
    public static function summonLightning(Player $player){
        $pk = new AddEntityPacket();
        $pk->type = 93;
        $pk->entityRuntimeId = Entity::$entityCount++;
        $pk->position = $player->asVector3();
        $pk->yaw = $player->getYaw();
        $pk->pitch = $player->getPitch();
        $player->getServer()->broadcastPacket($player->getServer()->getOnlinePlayers(), $pk);
    }
}
