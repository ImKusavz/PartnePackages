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
use pocketmine\world\Position;
use pocketmine\world\particle\Particle;
use pocketmine\world\particle\HugeExplodeParticle;
use pocketmine\world\sound\ExplodeSound;
use pocketmine\item\LegacyStringToItemParser;
use pocketmine\item\StringToItemParser;

final class Utils {
  
  private $player = [];
  
  static function giveItem(Player $player) : void {
    $item = VanillaBlocks::ENDER_CHEST()->asItem();
    
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
$player->getInventory()->setItemInHand($player->getInventory()->getItemInHand()->setCount($player->getInventory()->getItemInHand()->getCount() - 1));
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
    $world = $player->getWorld();
    $world->addParticle($player->getPosition(), new HugeExplodeParticle(), [$player]);

$world->addSound($player->getPosition(), new ExplodeSound(), [$player]);

$player->getInventory()->setItemInHand($player->getInventory()->getItemInHand()->setCount($player->getInventory()->getItemInHand()->getCount() - 1));
  }
}