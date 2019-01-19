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
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\event\Listener;
use pocketmine\Player;

class EventListener implements Listener {
	
    private $plugin;
  
    public function __construct(Main $plugin){
        $this->plugin = $plugin;
    }
    
    public function onJoin(PlayerJoinEvent $event){
        if($this->plugin->config->get("lightning-join") == true){
          $this->plugin->summonLightning(new Player, true);
          return;
        }
    }
    
    public function onDeath(PlayerDeathEvent $event){
        if($this->plugin->config->get("lightning-death") == true){
          $this->plugin->summonLightning(new Player, true);
          return;
        }
    }
    
    public function onQuit(PlayerQuitEvent $event){
        if($this->plugin->config->get("lightning-quit") == true){
          $this->plugin->summonLightning(new Player, true);
          return;
        }
    }
    
    public function onRespawn(PlayerRespawnEvent $event){
        if($this->plugin->config->get("lightning-respawn") == true){
          $this->plugin->summonLightning(new Player, true);
          return;
        }
    }
}
