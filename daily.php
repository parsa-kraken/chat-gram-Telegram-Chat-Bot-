<?php
//Developer : parsa taheri (kraken)
//github : parsa-kraken
//web : www.parsakraken.ir

// کرون جاب هر دقیقه یک بار فعال شود
include "bot.php"; 
$sendtoall = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM sendall  LIMIT 1"));
//===================================================================
if($sendtoall["step"] == "sendall"){
$users = mysqli_query($connect,"select id from user");
while($row = mysqli_fetch_assoc($users)){
     $json[] = $row["id"];
}
$get = $sendtoall["user"];
$plus = $get + 200;
for($z = $get;$z <= $plus;$z++){
     jijibot('sendmessage',[
          'chat_id'=>$json[$z],        
		  'text'=>$sendtoall["text"],
        ]);
}	
$connect->query("UPDATE sendall SET user = '$plus' LIMIT 1");
if($plus >= count($json)){
  jijibot('sendmessage',[
      'chat_id'=>$admin[0],
      'text'=>"📍 پیام برای همه کابران ارسال شد",
 ]);
$connect->query("UPDATE sendall SET step = 'none' LIMIT 1");	
}
//Developer : parsa taheri (kraken)
//github : parsa-kraken
//web : www.parsakraken.ir
//Developer : parsa taheri (kraken)
//github : parsa-kraken
//web : www.parsakraken.ir
}
//================================================
if($sendtoall["step"] == "forall"){
$users = mysqli_query($connect,"select id from user");
while($row = mysqli_fetch_assoc($users)){
     $json[] = $row["id"];
}
$get = $sendtoall["user"];
$plus = $get + 200;
for($z = $get;$z <= $plus;$z++){
jijibot('ForwardMessage',[
'chat_id'=>$json[$z], 
'from_chat_id'=>$sendtoall["chat"],
'message_id'=>$sendtoall["msgid"],
]);
}	
$connect->query("UPDATE sendall SET user = '$plus' LIMIT 1");
if($plus >= count($json)){
  jijibot('sendmessage',[
      'chat_id'=>$admin[0],
      'text'=>"📍 پیام برای همه کابران فوروارد شد",
 ]);
$connect->query("UPDATE sendall SET step = 'none' LIMIT 1");	
}
}
	
?> 