<?php

declare(strict_types=1);

namespace ImKusav\commands;

use ImKusav\Loader;
use ImKusav\utils\Utils;

use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat;

class PartnerPackageCommand extends Command
{

    public function __construct()
    {
        parent::__construct('partnerpackage', '§dGive PartnerPackage', 'pp');
        $this->setAliases(["pp"]);
        $this->setPermission('partner.command');
    }

    /**
     * @param CommandSender $sender
     * @param string $commandLabel
     * @param array $args
     */
    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {
        if (!$sender instanceof Player) return;
        
        if (!$this->testPermission($sender))
            return;
            
        if (count($args) === 0) {
          $sender->sendMessage("§l§dPartnerPackages");
          $sender->sendMessage("§cAuthor: ImKusavz");
          $sender->sendMessage("§cUsa /partnerpackage give (all | player)");
          
          return;
        }
        
        switch ($args[0]) {
          case 'give':
            if (empty($args[1])) {

                    $sender->sendMessage(TE::RED . "Usage: /partnerpackage give (player|all)");

                    return;
                }
                
                $player = Loader::getInstance()->getServer()->getPlayerExact($args[1]);
                if ($player !== null) {
                    Utils::giveItem($player);
                    return;
                }
                foreach (Loader::getInstance()->getServer()->getOnlinePlayers() as $player) {
                  Utils::giveItem($player);
                }
            break;
        }
    }
}