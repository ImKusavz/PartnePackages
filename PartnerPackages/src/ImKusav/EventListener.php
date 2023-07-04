<?php

namespace ImKusav;

use ImKusav\Loader;
use ImKusav\utils\Utils;

use pocketmine\event\Event;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerItemUseEvent;

use pocketmine\Server;
use pocketmine\utils\TextFormat;
use pocketmine\player\Player;

class EventListener implements Listener{
  
  function itemUse(PlayerItemUseEvent $event) : void {
    $player = $event->getPlayer();
    $item = $event->getItem();
    if(!$player instanceof Player) return;
    if($item->getTypeId() === 138){
      Utils::addItem($player);
    }
  }
}
?>