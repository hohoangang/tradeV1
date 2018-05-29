<?php
namespace MuaItem;

use pocketmine\item\Item;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\Command\Command;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\event\Listener;

class Main extends PluginBase implements Listener{
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getLogger()->info(TF::GREEN. "§aMua Item đã bật");
	}
	public function onCommand(CommandSender $sender, Command $command, $label, array $args): bool {
		$cmd = $command->getName();
		switch(strtolower($cmd)){
			#TODO: cải thiện các lệnh
			case "muaitemUI":
			$sender->sendMessage(TF::RED . "Sự dụng: /muaitemui [help|list]");
			if(isset($args[0])){
				switch(strtolower($args[0])){
					case "help":
					$sender->sendMessage(TF::YELLOW . "§b►§a Mua Item - Help");
					$sender->sendMessage(TF::AQUA . "• /muaitem item (item) để mua đồ, /muaitemui list (trang) để xem các item trong shop.");
					$sender->sendMessage(TF::AQUA . "• /muaitem credits để xem thông tin về plugin MuaItem");
					return true;
					break;
					case "list":
					$sender->sendMessage(TF::YELLOW . "§b►§a Mua Item - Cúp (trang 1)");
					$sender->sendMessage(TF::BLUE . "§a-§f Cúp Thiên Đường <cupthienduong>");
					$sender->sendMessage(TF::BLUE . "§a-§f Cúp Thánh <cupthanh>");
					$sender->sendMessage(TF::BLUE . "§a-§f Cúp Thủy <cupthuy>");
					$sender->sendMessage(TF::BLUE . "§a-§f Cúp Titanium <cuptitanium>");
					$sender->sendMessage(TF::BLUE . "§a-§f Cúp Huyền Thoại <cuplegendary>");
					
					if(isset($args[1])){
						switch(strtolower($args[1])){
							case "2":
							$sender->sendMessage(TF::YELLOW . "§b►§a Mua Item - Ngọc (trang 2)");
							$sender->sendMessage(TF::AQUA . "§a-§f Hồng Ngọc <hongngoc>");
							$sender->sendMessage(TF::AQUA . "§a-§f Lam Ngọc <lamngoc>");
							$sender->sendMessage(TF::AQUA . "§a-§f Hỏa Ngọc <hoangoc>");
							$sender->sendMessage(TF::AQUA . "§a-§f Mảnh Ngôi Sao <star>");
							break;
							case "3":
							$sender->sendMessage(TF::YELLOW . "§b►§a Mua Item - Kiếm (trang 3)");
							$sender->sendMessage(TF::AQUA . "§a-§f Kiếm Hoàng Tộc  <royalsword>");
							$sender->sendMessage(TF::AQUA . "§a-§f Kiếm Thợ Săn <huntersword>");
							$sender->sendMessage(TF::AQUA . "§a-§f Kiếm Thạch Anh - Event <quartzsword>");
							$sender->sendMessage(TF::AQUA . "§a-§f Kiếm Huyền Thoại <legendarysword>");
							break;
							case "4":
							$sender->sendMessage(TF::YELLOW . "§b►§a Mua Item - Set (trang 4)");
							$sender->sendMessage(TF::AQUA . "§a-§f Set Thiên Đường  <setthienduong>");
							$sender->sendMessage(TF::AQUA . "§a-§f Set Thánh <setthanh>");
							$sender->sendMessage(TF::AQUA . "§a-§f Set Titanium <settitanium>");
							$sender->sendMessage(TF::AQUA . "§a-§f Set Huyền Thoại <sethuyenthoai>");
							break;
							case "5":
							$sender->sendMessage(TF::YELLOW . "§b►§a Mua Item - Rìu (trang 5)");
							$sender->sendMessage(TF::AQUA . "§a-§f Rìu Thiên Đường  <riuthienduong>");
							$sender->sendMessage(TF::AQUA . "§a-§f Rìu Thánh <riuthanh>");
							$sender->sendMessage(TF::AQUA . "§a-§f Rìu Titanium <riutitanium>");
							$sender->sendMessage(TF::AQUA . "§a-§f Rìu Huyền Thoại <riuhuyenthoai>");
							break;
						}
					}
					break;
					case "credits":
					$sender->sendMessage(TF::AQUA . "Plugin được viết bởi ThinkerS");
					$sender->sendMessage(TF::GREEN . " Phiên bản hiện tại: 4.0");
					return true;
					break;
					case "item":
					$sender->sendMessage(TF::RED . "§b[§aMuaItem§b]§e /muaitem item <item> để mua đồ. Nhấn /muaitem list để xem danh sách item có thể mua.");
					if (isset($args[1])){
						switch(strtolower($args[1])){
							case "cupthienduong":
							if ($sender instanceof Player){
								$inv = $sender->getInventory();
								if($inv->contains(Item::get(378, 0, 10))){
									$i = Item::get(278, 0, 1);
									$i->setCustomName("§a§lCúp §bThiên§f Đường");
									$i->setLore(array(TF::RED."§lVật Phẩm Hiếm Không Bán Tại Shop!"));
									$e = Enchantment::getEnchantment(15);
									$e->setLevel(9);
									$e1 = Enchantment::getEnchantment(17);
									$e1->setLevel(20);
									$e2 = Enchantment::getEnchantment(18);
									$e2->setLevel(7);
									$i->addEnchantment($e);
									$i->addEnchantment($e1);
									$i->addEnchantment($e2);
									$inv->removeItem(Item::get(378, 0, 10));
									$inv->addItem($i);
									$sender->sendMessage(TF::GREEN . "§b[§aMuaItem§b]§e Mua Cúp Thiên Đường thành công!");
									return true;
									break;
								}
								else{
									$sender->sendMessage(TF::RED . "§b[§aMuaItem§b]§e Bạn cần 10 Hồng Ngọc để mua vật phẩm này!");
								}
							}
							break;
							case "cupthuy":
							if ($sender instanceof Player){
								$inv = $sender->getInventory();
								if($inv->contains(Item::get(351, 12, 7))){
									$i = Item::get(278,0,1);
									$i->setCustomName("§a§lCúp §bThủy");
									$i->setLore(array(TF::RED."§lVật Phẩm Hiếm Không Bán Tại Shop!"));
									$e = Enchantment::getEnchantment(15);
									$e->setLevel(16);
									$e1 = Enchantment::getEnchantment(17);
									$e1->setLevel(30);
									$e2 = Enchantment::getEnchantment(18);
									$e2->setLevel(8);
									$i->addEnchantment($e);
									$i->addEnchantment($e1);
									$i->addEnchantment($e2);
									$inv->removeItem(Item::get(351, 12, 7));
									$inv->addItem($i);
									$sender->sendMessage(TF::GREEN . "§b[§aMuaItem§b]§e Mua Cúp Thủy thành công!");
									return true;
									break;
								}
								else{
									$sender->sendMessage(TF::RED . "§b[§aMuaItem§b]§e Bạn cần 10 Lam Ngọc để mua vật phẩm này!");
								}
							}
							break;
							case "cupthanh":
							if ($sender instanceof Player){
								$inv = $sender->getInventory();
								if($inv->contains(Item::get(372, 0, 15))){
									$i = Item::get(278,0,1);
									$i->setCustomName("§a§lCúp §eThánh");
									$i->setLore(array(TF::RED."§lVật Phẩm Hiếm Không Bán Tại Shop!"));
									$e = Enchantment::getEnchantment(15);
									$e->setLevel(20);
									$e1 = Enchantment::getEnchantment(17);
									$e1->setLevel(50);
									$e2 = Enchantment::getEnchantment(18);
									$e2->setLevel(10);
									$i->addEnchantment($e);
									$i->addEnchantment($e1);
									$inv->removeItem(Item::get(372, 0, 15));
									$inv->addItem($i);
									$sender->sendMessage(TF::GREEN . "§b[§aMuaItem§b]§e Mua Cúp Thánh thành công!");
									return true;
									break;
								}
								else{
									$sender->sendMessage(TF::RED . "§b[§aMuaItem§b]§e Bạn cần 15 Hỏa Ngọc để mua vật phẩm này");
								}
							}
							break;
							case "cuptitanium":
							if ($sender instanceof Player){
								$inv = $sender->getInventory();
								if($inv->contains(Item::get(264, 0, 7))){
									$i = Item::get(278,0,1);
									$i->setCustomName("§a§lCúp §eTitanium");
									$i->setLore(array(TF::RED."§lVật Phẩm Hiếm Không Bán Tại Shop!"));
									$e = Enchantment::getEnchantment(15);
									$e->setLevel(50);
									$e1 = Enchantment::getEnchantment(17);
									$e1->setLevel(50);
									$e2 = Enchantment::getEnchantment(18);
									$e2->setLevel(15);
									$i->addEnchantment($e);
									$i->addEnchantment($e1);
									$i->addEnchantment($e2);
									$inv->removeItem(Item::get(264, 0, 7));
									$inv->addItem($i);
									$sender->sendMessage(TF::GREEN . "§b[§aMuaItem§b]§e Mua Cúp Titanium thành công!");
									return true;
									break;
								}
								else{
									$sender->sendMessage(TF::RED . "§b[§aMuaItem§b]§e Bạn cần 7 Diamonds để mua vật phẩm này");
								}
							}
							break;
							case "cuplegendary":
							if ($sender instanceof Player){
								$inv = $sender->getInventory();
								if($inv->contains(Item::get(399, 0, 4))){
									$i = Item::get(278,0,1);
									$i->setCustomName("§a§lCúp §eHuyền §6Thoại");
									$i->setLore(array(TF::RED."§lVật Phẩm Hiếm Không Bán Tại Shop!"));
									$e = Enchantment::getEnchantment(15);
									$e->setLevel(100);
									$e1 = Enchantment::getEnchantment(17);
									$e1->setLevel(100);
									$e2 = Enchantment::getEnchantment(18);
									$e2->setLevel(20);
									$i->addEnchantment($e);
									$i->addEnchantment($e1);
									$i->addEnchantment($e2);
									$inv->removeItem(Item::get(399, 0, 4));
									$inv->addItem($i);
									$sender->sendMessage(TF::GREEN . "§b[§aMuaItem§b]§e Mua Cúp Thần Thánh thành công!");
									return true;
									break;
								}
								else{
									$sender->sendMessage(TF::RED . "§b[§aMuaItem§b]§e Bạn cần 4 Mảnh Ngôi Sao để mua vật phẩm này");
								}	
							}
							break;
							case "hongngoc":
							if ($sender instanceof Player){
								$inv = $sender->getInventory();
								if($inv->contains(Item::get(331,0,64))){
									$i = Item::get(378,0,1);
									$i->setCustomName("§c§lHồng Ngọc");
									$i->setLore(array(TF::RED."§lVật Phẩm Hiếm Không Bán Tại Shop!"));
									$inv->removeItem(Item::get(331,0,64));
									$inv->addItem($i);
									$sender->sendMessage(TF::GREEN . "§b[§aMuaItem§b]§e Mua Hồng Ngọc thành công!");
									return true;
									break;
								}
								else{
									$sender->sendMessage(TF::RED . "§b[§aMuaItem§b]§e Bạn cần 64 Redstone để mua vật phẩm này");
								}
							}
							break;
							case "lamngoc":
							if ($sender instanceof Player){
								$inv = $sender->getInventory();
								if($inv->contains(Item::get(351,4,64))){
									$i = Item::get(351,12,1);
									$i->setCustomName("§b§lLam Ngọc");
									$i->setLore(array(TF::RED."§lVật Phẩm Hiếm Không Bán Tại Shop!"));
									$inv->removeItem(Item::get(351,4,64));
									$inv->addItem($i);
									$sender->sendMessage(TF::GREEN . "§b[§aMuaItem§b]§e Mua Lam Ngọc thành công!");
									return true;
									break;
								}
								else{
									$sender->sendMessage(TF::RED . "§b[§aMuaItem§b]§e Bạn cần 64 Lapis để mua vật phẩm này");
								}
							}
							break;
							case "hoangoc":
							if ($sender instanceof Player){
								$inv = $sender->getInventory();
								if($inv->contains(Item::get(266,0,32))){
									$i = Item::get(372,0,1);
									$i->setCustomName("§c§lHỏa Ngọc");
									$i->setLore(array(TF::RED."§lVật Phẩm Hiếm Không Bán Tại Shop!"));
									$inv->removeItem(Item::get(266,0,32));
									$inv->addItem($i);
									$sender->sendMessage(TF::GREEN . "§b[§aMuaItem§b]§e Mua Hỏa Ngọc thành công!");
								}
								else{
									$sender->sendMessage(TF::RED . "§b[§aMuaItem§b]§e Bạn cần 64 Vàng để mua vật phẩm này");
								}
							}
							break;
							case "star":
							if ($sender instanceof Player){
								$inv = $sender->getInventory();
								if($inv->contains(Item::get(388,0,6))){
									$i = Item::get(399,0,1);
									$i->setCustomName("§a§lMảnh Ngôi Sao");
									$i->setLore(array(TF::RED."§lVật Phẩm Hiếm Không Bán Tại Shop!"));
									$inv->removeItem(Item::get(388,0,6));
									$inv->addItem($i);
									$sender->sendMessage(TF::GREEN . "§b[§aMuaItem§b]§e Mua Mảnh Ngôi Sao thành công!");
								}
								else{
									$sender->sendMessage(TF::RED . "§b[§aMuaItem§b]§e Bạn cần 6 Emerald để mua vật phẩm này");
								}
							}
							break;
							case "royalsword":
							if ($sender instanceof Player){
								$inv = $sender->getInventory();
								if($inv->contains(Item::get(372, 0, 7))){
									$i = Item::get(276,0,1);
									$i->setCustomName("§a§lKiếm§f Qúy§e Tộc");
									$i->setLore(array(TF::RED."§lVật Phẩm Hiếm Không Bán Tại Shop!"));
									$e = Enchantment::getEnchantment(9);
									$e->setLevel(15);
									$e1 = Enchantment::getEnchantment(17);
									$e1->setLevel(20);
									$e2 = Enchantment::getEnchantment(14);
									$e2->setLevel(5);
									$i->addEnchantment($e);
									$i->addEnchantment($e1);
									$i->addEnchantment($e2);
									$inv->removeItem(Item::get(372, 0, 7));
									$inv->addItem($i);
									$sender->sendMessage(TF::GREEN . "§b[§
