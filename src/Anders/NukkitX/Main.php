<?php

declare(strict_types=1);

namespace Anders\NukkitX;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\network\mcpe\protocol\ProtocolInfo;
use function substr;
use function str_shuffle;
use function str_replace;
use function mt_rand;

class Main extends PluginBase {

    protected $msg;

    public function onEnable() {
        $lang = [
            "eng" => "This server is running Nukkit git-{%1} 「」 implementing API version 1.0.{%3} for Minecraft: BE {%4} (protocol version {%5})",
            "chs" => "此服务器正在运行 Nukkit git-{%1} 「」 API 版本 1.0.{%3} 的 Minecraft: BE {%4} (协议版本 {%5})",
            "zho" => "此伺服器正在運作 Nukkit git-{%1} 「」 執行 API 版本 1.0.{%3} 支援 Minecraft: BE {%4} （協定版本 {%5}）",
            "ces" => "Server bezi Nukkit git-{%1} 「」 implementovano API verze 1.0.{%3} pro Minecraft: BE {%4} (protocol version {%5})",
            "deu" => "Dieser Server läuft unter der Version Nukkit git-{%1} 「」und nutzt die Version 1.0.{%3} der API für Minecraft:BE {%4} (Protokoll Version {%5})",
            "fin" => "Tämä palvelin ajaa Nukkit git-{%1} 「」 sisältäen API version 1.0.{%3} Minecraft BE versio {%4}:lle (protokollaversio {%5})",
            "ind" => "This server is running Nukkit git-{%1} 「」 implementing API version 1.0.{%3} for Minecraft: BE {%4} (protocol version {%5})",
            "jpn" => "このサーバーが実行しているNukkitのバージョンはgit-{%1}「」Minecraft BE {%4}用実装APIバージョン1.0.{%3}(プロトコルバージョン{%5})です",
            "kor" => "이 서버는 Minecraft: BE {%4} (프로토콜 버전 {%5})용 API 버전 1.0.{%3}을(를) 포함하는 Nukkit git-{%1} 「」을(를) 실행하고 있습니다",
            "pol" => "Ten serwer dziala na Nukkit git-{%1} 「」na implementacji API 1.0.{%3} dla Minecraft: BE {%4} (wersja protokolu {%5})",
            "rus" => "Сервер использует Nukkit git-{%1}「 」 , версия API 1.0.{%3} для Minecraft: BE {%4} (версия протокола {%5})",
            "spa" => "Este servidor esta ejecutando Nukkit git-{%1}  implementando la API versión 1.0.{%3} para Minecraft: BE {%4} (Protocolo versión {%5})",
            "tur" => "This server is running Nukkit git-{%1} 「」 implementing API version 1.0.{%3} for Minecraft: BE {%4} (protocol version {%5})",
            "ukr" => "This server is running Nukkit git-{%1} 「」 implementing API version 1.0.{%3} for Minecraft: BE {%4} (protocol version {%5})",
            "por" => "Este servidor está rodando Nukkit git-{%1} 「」 implementando versão da API 1.0.{%3} para Minecraft: BE {%4} (versão do protocolo {%5})"
        ];
        $sLang = $lang[$this->getServer()->getLanguage()->getLang()];
        $this->msg = str_replace("{%5}", ProtocolInfo::CURRENT_PROTOCOL, str_replace("{%4}", ProtocolInfo::MINECRAFT_VERSION, str_replace("{%3}", mt_rand(5, 8), str_replace("{%1}", substr(str_shuffle("0123456789abcdef"), 0, 7), isset($sLang) ? $sLang : $lang["eng"]))));
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        switch ($command->getName()) {
            case "ver":
            case "version":
            case "about":
                $sender->sendMessage($this->msg);
                break;
        }
        return false;
    }

}
