<?php

namespace ImKusav\utils;

use ImKusav\Loader;

use pocketmine\player\Player;
use pocketmine\item\Item;
use pocketmine\item\VanillaItems;
use pocketmine\block\Block;
use pocketmine\block\VanillaBlocks;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
use pocketmine\item\LegacyStringToItemParser;
use pocketmine\item\StringToItemParser;

final class Utils {
  
  private $player = [];
  
  static function giveItem(Player $player, int $int) : void {
    $item = VanillaBlocks::ENDER_CHEST()->asItem();
    $item->setCount($int);
    $item->setCustomName(TextFormat::colorize("&r&r&r&l&dPartnerPackage&r&r&r"));
    $item->setLore([
      "§r ",
      "§r§7Use Right To Open The PartnerPackage",
      "§r ",
      "§r§eGet More our store§7: §dastralmc.cc"
      ]);
    $player->getInventory()->addItem($item);
  }
  
  static function addItem(Player $player) : void {
    $c = new Config(Loader::getInstance()->getDataFolder()."items.yml", Config::YAML);
		$items = $c->getAll()["Items"];
		foreach ($items as $key => $value) {
			$itemData = $value;
			
			$item = LegacyStringToItemParser::getInstance()->parse($itemData["id"]) ?? StringToItemParser::getInstance()->parse($itemData["id"]);
			$item->setCustomName(TextFormat::colorize($itemData["name"]));
			$item->setCount($itemData["count"]);
			
			$player->getInventory()->addItem($item);
		}
  }
  
  static function addParticle(Player $player) : void {
    
  }
}