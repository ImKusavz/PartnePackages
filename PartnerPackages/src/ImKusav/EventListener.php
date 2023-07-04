<?php

namespace ImKusav;

use ImKusav\Loader;
use ImKusav\utils\Utils;

use pocketmine\event\Event;
use pocketmine\event\Listener;
use pocketmine\event\block\BlockPlaceEvent;

use pocketmine\Server;
use pocketmine\utils\TextFormat;
use pocketmine\player\Player;

class EventListener implements Listener{
  
  function itemUse(BlockPlaceEvent $event) : void {
    $player = $event->getPlayer();
    $block = $event->getBlockAgainst();
    if(!$player instanceof Player) return;
    if($block->getTypeId() === 130 && $block->getCustomName("&r&r&r&l&dPartnerPackage&r&r&r")){
      Utils::addItem($player);
    }
  }
}
?>