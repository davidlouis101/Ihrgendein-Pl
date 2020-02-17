<?php

  

  namespace Crow\xD;

use pocketmine\event\Listener

use pocketmine\event\player\PlayerJoinEvent;

use pocketmine\event\player\PlayerQuitEvent;

use pocketmine\utils\TextFormat as Co;

use pocketmine\plugin\PluginBase;

use pocketmine\plugin\Plugin;

use pocketmine\command\Command;

use pocketmine\command\CommandSender;

use pocketmine\Player;

use pocketmine\Server;

class Main extends PluginBase implements Listener {

  

  public function onEnable() {

    $this->getLogger()->info(Co::GREEN . "Aktiviert.");

    $this->getServer()->getPluginManager()->registerEvents($this, $this);

    $this->getServer()->getCommandMap()->unregister($this->getServer()->getCommandMap()->getCommand("version"));

  }

  

  public function onDisable() {

    $this->getLogger()->info(Co::YELLOW . "[xD]" . Co::RED . "Deaktiviert");

    

  }

  

  public function onJoin(PlayerJoinEvent $event) {

    $name = $event->getPlayer()->getName();

    $event->setJoinMessage("§a§l§oWillkommen $name");

  }

  

  public function onQuit(PlayerQuitEvent $event) {

    $name = $event->getPlayer()->getName();

    $event->setJoinMessage("§4§l§oTschau Tschau $name");

  }

  

  public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool {

     

    if($cmd->getName() == "YT") {

      $sender->sendMessage("YT : Crow Balde");

      return true;

    }

    

    if($cmd->getName() == "Heal") {

      if($sender instanceof Player) {

        if($sender->hasPermission("Heal.rechte")) {

          $sender->sendMessage(" §4Du Wurdest Geheilt");

          $sender->setHealth(20);

          return true;

        } else {

          $sender->sendMessage("§4du hast keine rechte");

          return true;

        }

      } else {

        $sender->sendMessage(Co::RED . "Du kannst den Command nur In-Game");

        return true;

      }

    }

    

    

    

    

     // ab hier kein commands!!!!!!!!!!!

    return true;

  }

}
