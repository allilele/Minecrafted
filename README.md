# Minecrafted
A link between PHP and a Minecraft server.

usage :

$server = new Minecrafted('IP',PORT); //initialise server object
$server.connect();                    //Conenct to server

Get infos :
$server->getMotd();     //Get server's Motd
$server->getIp();       //Get server IP
$server->getPort();		//Get server Port
$server->getOnPlyrs();	//Get online players count
$server->getMaxPlyers();//Get max player count
$server->getPing();		//Get ping between Minecraft Server and WebServer

