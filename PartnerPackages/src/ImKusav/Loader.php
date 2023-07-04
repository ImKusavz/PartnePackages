<?php

namespace ImKusav;

use ImKusav\EventListener;
use ImKusav\commands\PartnerPackageCommand;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\SingletonTrait;

final class Loader extends PluginBase {
  
  use SingletonTrait;
  
  function onLoad() : void {
    self::setInstance($this);
  }
  
  function onEnable() : void {
    # database
    $this->saveResource("items.yml");
    
    # listener
    $this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);
    
    # commands
    $this->getServer()->getCommandMap()->register('/pp', new PartnerPackageCommand());
  }
}
?>