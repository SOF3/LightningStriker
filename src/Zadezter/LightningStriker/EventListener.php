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

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\Listener;
use pocketmine\Player;

class EventListener implements Listener {
	
    private $config;
  
    public function __construct($config){
        $this->config = $config;
    }
    
    public function onJoin(PlayerJoinEvent $event){
        if($this->config->get("lightning-join")){
            Main::summonLightning($event->getPlayer());
        }
    }
    
    public function onDeath(PlayerDeathEvent $event){
        if($this->config->get("lightning-death")){
            Main::summonLightning($event->getPlayer());
        }
    }
    
    public function onQuit(PlayerQuitEvent $event){
        if($this->config->get("lightning-quit")){
            Main::summonLightning($event->getPlayer());
        }
    }
}
