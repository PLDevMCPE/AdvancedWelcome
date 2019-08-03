<?php

namespace Seeker;

use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class Main extends PluginBase implements Listener{

    public function onLoad(){
        $this->getLogger()->info("AdvancedWelcome is Loading");
    }
    public function onEnable(){
 $this->saveResource("config.yml"); 
 $this->getServer()->getPluginManager()->registerEvents($this, $this);
 $this->getLogger()->info("AdvancedWelcome by Seeker has been Enabled!");
    }
    public function onDisable(){
        $this->getLogger()->info("AdvancedWelcome has been Disabled");
    } 
    public function onJoin(PlayerJoinEvent $event){

    $player = $event->getPlayer();
    $name = $event->getPlayer()->getName();
    $event->setJoinMessage(str_replace(["&", "{ign}"], ["§", $player->getName()], strval($this->getConfig()->get("jmessage"))));
    
    $player->sendMessage($this->getConfig()->get("jmessage"));
  }
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool{
          if($cmd->getName() == "advwlchelp"){
               $sender->sendMessage("§3Sends a message to player onJoin. Edit the message on config.yml. §2Credits to Seeker.");
          }
          return true;
     }
}
