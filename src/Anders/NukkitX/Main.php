<?php 
namespace Anders\NukkitX;
class Main extends \pocketmine\plugin\PluginBase{
    public function onEnable(){
        //手动Logger->info("NukkitX by Ander (滑稽)");
        //鄙人最不喜欢那些在启动，加载，卸载时输出一些无用信息的人
        //干干净净的控制台多好看，看着多舒心！
    }
    public function onCommand(\pocketmine\command\CommandSender $sender, \pocketmine\command\Command $command, string $label, array $args) : bool{
        switch ($command->getName()){
            case "ver":
            case "version":
            case "about":
                $sender->sendMessage("此服务器正在运行Nukkit git-2542d45 「」API 版本 1.0.8 的 Minecraft: PE  " . \pocketmine\network\mcpe\protocol\ProtocolInfo::MINECRAFT_VERSION. " (协议版本 " . \pocketmine\network\mcpe\protocol\ProtocolInfo::CURRENT_PROTOCOL. ") ");
                break;
        }
        return false;
    }
}
?>