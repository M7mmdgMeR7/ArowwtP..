<?php

namespace; ArowwTP 

use Pocketmine\plugin\pluginbase;
use Pocketmine\utils\textformat as Color;
use Pocketmine\Player
use Pocketmine\Command\CommandSender

class mini extends PluginBase{

  public function OnEnable(){
   $this->getLogger()->info(Color:GREEN."ArowwtpPlugin Enable");

  }
  public function OnDisable(){
   $this->getLogger()->info(Color:RED."ArowwtpPlugin Disable");

  }

  
   public function onShoot (\pocketmine\event\entity\EntityShootBowEvent $event)
		{
				$shooter = $event->getEntity();
				if ($shooter instanceof Player) {
					$id = $shooter->getID();
					$this->launch[$id] = (bool) true;
				}
		}
		
		function onHit (\pocketmine\event\entity\ProjectileHitEvent $event)
		{
				$entity = $event->getEntity();
				$level = $entity->getLevel();
				if ($entity instanceof Arrow) {
					$shooter = $entity->shootingEntity;
					$pos = $entity->getPosition();
					if ($shooter instanceof Player) {
						$id = $shooter->getID();
						$shoot = $this->launch[$id];
						if ($pos instanceof Position and isset($shoot)) {
							$level->removeEntity($entity);
							$event->teleport($pos);
							unset($this->launch[$id]);
						}
					}
				}
		}                      
          
 
