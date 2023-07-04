<?php

declare(strict_types=1);

namespace ImKusav\commands;

use ImKusav\utils\Utils;

use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat;

class PartnerPackageCommand extends Command
{

    public function __construct()
    {
        parent::__construct('partnerpackage', '§bGive PartnerPackage', 'pp');
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
            
        Utils::addItem($sender);
    }
}