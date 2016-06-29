
service GenericAgentIdl{
 i32 checkAlive(),
 string getReply(),
 string sendCommand(1: string command),
 void sendReply(1: string reply),
}
