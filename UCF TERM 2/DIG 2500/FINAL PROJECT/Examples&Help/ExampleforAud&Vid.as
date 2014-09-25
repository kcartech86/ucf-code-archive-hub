Code Examples from Class:
/*AUDIO:   */
var tempSound:Sound = new Sound();
var tempRequest:URLRequest = new URLRequest();
var tempChannel:SoundChannel=new SoundChannel();

tempRequest.url="audio.mp3";
tempSound.load(tempRequest);

tempChannel=tempSound.play();
tempChannel.stop();
var pausePosition:Number=tempChannel.position;
tempChannel=tempSound.play(pausePosition);

/*VIDEO:   */

var nc:NetConnection = new NetConnection();
nc.connect(null);

var ns:NetStream=new NetStream(nc);

ns.addEventListener(NetStatusEvent.NET_STATUS, onStatusEvent);
function onStatusEvent(stat:Object):void {
	//trace(stat.info.code);
}

var meta:Object = new Object();
meta.onMetaData = function(meta:Object){
	//trace(meta.duration);
};

ns.client=meta;
video.attachNetStream(ns);

ns.play("http://sulley.dm.ucf.edu/~dig2500c/media/video.f4v");
ns.pause();
ns.togglePause();