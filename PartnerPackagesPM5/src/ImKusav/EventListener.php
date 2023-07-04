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
use pocketmine\block\Block;
use pocketmine\block\EnderChest;

class EventListener implements Listener{
  
  function itemUse(PlayerItemUseEvent $event) : void {
    $player = $event->getPlayer();
    $block = $event->getItem();
    if(!$player instanceof Player) return;
    switch ($block->getCustomName()){
case TextFormat::colorize("&r&r&r&l&dPartnerPackage&r&r&r"):
      $event->cancel();
      Utils::addItem($player);
      Utils::addParticle($player);
break;
    }
  }
}
?>