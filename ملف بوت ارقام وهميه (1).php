<?php
$TOKEN="7401074404:AAGGDx32q8WcrjqeMmHGngMsjzX-RffdXcg"; 
set_time_limit(0);
$forwardM=json_decode(file_get_contents("forwardM.json"),1);
$Js=json_decode(file_get_contents("Js.json"),1);
$Ds=json_decode(file_get_contents("Ds.json"),1);
$Vs=json_decode(file_get_contents("Users/Vs.json"),1);
if($Js['bot']['sudo']==null){	
$sudo=7411444902;//ايدي المطور
}else{
$sudo=$Js['bot']['sudo'];
}
$sudos=[$sudo]; 
if($Js['bot']['start']==null){
$TART='0';
$Js['bot']['start']=$TART; 
SV("Js.json", $Js); 
}else{
$START=$Js['bot']['start'];
}
if (isset($TOKEN)) {
	define("TOKEN", $TOKEN);
} else {
	echo "<br> Hello There : <strong>The Variable " . '$TOKEN' . " Undefined :( </strong><br>";
	exit;
}

function bot($method, $datas = [])
{
	if (function_exists('curl_init')) {
		$url = "https://api.telegram.org/bot" . TOKEN . "/" . $method;
		$ch  = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
		$res = curl_exec($ch);
		if (curl_error($ch)) {
			var_dump(curl_error($ch));
		} else {
			return json_decode($res);
		} # END OF ISSET CURL
	} else {
		$iBadlz = http_build_query($datas);
		$url    = "https://api.telegram.org/bot" . TOKEN . "/" . $method . "?$iBadlz";
		$iBadlz = file_get_contents($url);
		return json_decode($iBadlz);
	} # END OF !CURL EXISTS
}



function Add($path, $content)
{
	$file = fopen("$path", "a") or die("Unable to open file!");
	fwrite($file, "$content");
	fclose($file);
}
function GetUpdates($offset = null, $limit = 1, $timeout = null, $allowed_updates = [])
{
	return bot('getUpdates', [
		'offset' => $offset,
		'limit' => $limit,
		'timeout' => $timeout,
		'allowed_updates' => $allowed_updates
	]);
}
function SetWebhook($url, $certificate = null, $max_connections = 1, $allowed_updates = [])
{
	return bot('setWebhook', [
		'url' => $url,
		'certificate' => $certificate,
		'max_connections' => $max_connections,
		'allowed_updates' => $allowed_updates,
	]);
}
function DeleteWebhook()
{
	return bot('deleteWebhook');
}
function GetWebhookInfo()
{
	return bot('getWebhookInfo');
}
function SendChatAction($chat_id, $action)
{
	bot('sendChatAction', [
		'chat_id' => $chat_id,
		'action' => $action
	]);
}
function SendMessage($chat_id, $text, $parse_mode = "MARKDOWN", $disable_web_page_preview = true, $reply_to_message_id = null, $reply_markup = null)
{
	return bot('sendMessage', [
		'chat_id' => $chat_id,
		'text' => $text,
		'parse_mode' => $parse_mode,
		'disable_web_page_preview' => $disable_web_page_preview,
		'disable_notification' => false,
		'reply_to_message_id' => $reply_to_message_id,
		'reply_markup' => $reply_markup
	]);
}
function ForwardMessage($chat_id, $from_chat_id, $message_id)
{
	return bot('forwardMessage', [
		'chat_id' => $chat_id,
		'from_chat_id' => $from_chat_id,
		'disable_notification' => false,
		'message_id' => $message_id
	]);
}
function SendPhoto($chat_id, $photo, $caption = null, $parse_mode = "MARKDOWN", $reply_to_message_id = null, $reply_markup = null)
{
	return bot('sendPhoto', [
		'chat_id' => $chat_id,
		'photo' => $photo,
		'caption' => $caption,
		'parse_mode' => $parse_mode,
		'disable_notification' => false,
		'reply_to_message_id' => $reply_to_message_id,
		'reply_markup' => $reply_markup
	]);
}
function SendAudio($chat_id, $audio, $caption = null, $parse_mode = "MARKDOWN", $duration = null, $performer = null, $title = null, $thumb = null, $reply_to_message_id = null, $reply_markup = null)
{
	return bot('sendAudio', [
		'chat_id' => $chat_id,
		'audio' => $audio,
		'caption' => $caption,
		'parse_mode' => $parse_mode,
		'duration' => $duration,
		'performer' => $performer,
		'title' => $title,
		'thumb' => $thumb,
		'disable_notification' => false,
		'reply_to_message_id' => $reply_to_message_id,
		'reply_markup' => $reply_markup
	]);
}
function SendDocument($chat_id, $document, $thumb = null, $caption = null, $parse_mode = "MARKDOWN", $reply_to_message_id = null, $reply_markup = null)
{
	return bot('sendDocument', [
		'chat_id' => $chat_id,
		'document' => $document,
		'thumb' => $thumb,
		'caption' => $caption,
		'parse_mode' => $parse_mode,
		'disable_notification' => false,
		'reply_to_message_id' => $reply_to_message_id,
		'reply_markup' => $reply_markup
	]);
}
function SendVideo($chat_id, $video, $duration = null, $width = null, $height = null, $thumb = null, $caption = null, $parse_mode = "MARKDOWN", $reply_to_message_id = null, $reply_markup = null, $supports_streaming = null)
{
	return bot('sendVideo', [
		'chat_id' => $chat_id,
		'video' => $video,
		'duration' => $duration,
		'width' => $width,
		'height' => $height,
		'thumb' => $thumb,
		'caption' => $caption,
		'parse_mode' => $parse_mode,
		'supports_streaming' => $supports_streaming,
		'disable_notification' => false,
		'reply_to_message_id' => $reply_to_message_id,
		'reply_markup' => $reply_markup
	]);
}
function SendAnimation($chat_id, $animation, $duration = null, $width = null, $height = null, $thumb = null, $caption = null, $parse_mode = "MARKDOWN", $reply_to_message_id = null, $reply_markup = null)
{
	return bot('sendAnimation', [
		'chat_id' => $chat_id,
		'animation' => $animation,
		'duration' => $duration,
		'width' => $width,
		'height' => $height,
		'thumb' => $thumb,
		'caption' => $caption,
		'parse_mode' => $parse_mode,
		'disable_notification' => false,
		'reply_to_message_id' => $reply_to_message_id,
		'reply_markup' => $reply_markup
	]);
}
function SendVoice($chat_id, $voice, $caption = null, $parse_mode = "MARKDOWN", $duration = null, $reply_to_message_id = null, $reply_markup = null)
{
	return bot('sendVoice', [
		'chat_id' => $chat_id,
		'voice' => $voice,
		'caption' => $caption,
		'parse_mode' => $parse_mode,
		'duration' => $duration,
		'disable_notification' => false,
		'reply_to_message_id' => $reply_to_message_id,
		'reply_markup' => $reply_markup
	]);
}
function SendVideoNote($chat_id, $video_note, $duration = null, $length = null, $width = null, $height = null, $thumb = null, $caption = null, $parse_mode = "MARKDOWN", $reply_to_message_id = null, $reply_markup = null)
{
	return bot('sendVideoNote', [
		'chat_id' => $chat_id,
		'video_note' => $video_note,
		'duration' => $duration,
		'length' => $length,
		'thumb' => $thumb,
		'disable_notification' => false,
		'reply_to_message_id' => $reply_to_message_id,
		'reply_markup' => $reply_markup
	]);
}
function SendMediaGroup($chat_id, $media, $reply_to_message_id = null)
{
	return bot('sendMediaGroup', [
		'chat_id' => $chat_id,
		'media' => $media,
		'disable_notification' => false,
		'reply_to_message_id' => $reply_to_message_id
	]);
}
function SendLocation($chat_id, $latitude, $longitude, $live_period = null, $reply_to_message_id = null, $reply_markup = null)
{
	return bot('sendLocation', [
		'chat_id' => $chat_id,
		'latitude' => $latitude,
		'longitude' => $longitude,
		'live_period' => $live_period,
		'disable_notification' => false,
		'reply_to_message_id' => $reply_to_message_id,
		'reply_markup' => $reply_markup
	]);
}
function SendContact($chat_id, $phone_number, $first_name, $last_name = null, $reply_to_message_id = null, $reply_markup = null, $vcard = null)
{
	return bot('sendContact', [
		'chat_id' => $chat_id,
		'phone_number' => $phone_number,
		'first_name' => $first_name,
		'last_name' => $last_name,
		'vcard' => $vcard,
		'disable_notification' => false,
		'reply_to_message_id' => $reply_to_message_id,
		'reply_markup' => $reply_markup
	]);
}
function SendPoll($chat_id, $question, $options, $reply_to_message_id = null, $reply_markup = null)
{
	return bot('sendPoll', [
		'chat_id' => $chat_id,
		'question' => $question,
		'options' => $options,
		'disable_notification' => false,
		'reply_to_message_id' => $reply_to_message_id,
		'reply_markup' => $reply_markup
	]);
}
function GetUserProfilePhotos($user_id, $offset = null, $limit = null)
{
	return bot('getUserProfilePhotos', [
		'user_id' => $user_id,
		'offset' => $offset,
		'limit' => $limit
	]);
}
function GetFile($file_id)
{
	return bot('getFile', [
		'file_id' => $file_id
	]);
}
function File_path($file_path)
{
	$info = file_get_contents("https://api.telegram.org/file/bot" . TOKEN . "/" . $file_path);
	return $info;
}
function KickChatMember($chat_id, $user_id, $until_date = null)
{
	return bot('kickChatMember', [
		'chat_id' => $chat_id,
		'user_id' => $user_id,
		'until_date' => $until_date
	]);
}
function UnKickChatMember($chat_id, $user_id)
{
	return bot('promoteChatMember', [
		'chat_id' => $chat_id,
		'user_id' => $user_id,
		'can_send_messages' => true,
	]);
}
function PromoteChatMember($chat_id, $user_id)
{
	return bot('promoteChatMember', [
		'chat_id' => $chat_id,
		'user_id' => $user_id,
		'can_send_messages' => true,
		'can_delete_messages' => true,
		'can_invite_users' => true,
		'can_restrict_members' => true,
		'can_pin_messages' => true,
	]);
}
function RestrictChatMember($chat_id, $user_id)
{
	return bot('restrictChatMember', [
		'chat_id' => $chat_id,
		'user_id' => $user_id,
		'can_send_messages' => false,
		'can_send_media_messages' => false,
		'can_invite_users' => false,
		'can_send_other_messages' => false,
	]);
}
function UnRestrictChatMember($chat_id, $user_id)
{
	return bot('promoteChatMember', [
		'chat_id' => $chat_id,
		'user_id' => $user_id,
		'can_send_messages' => true,
		'can_send_media_messages' => true,
		'can_send_other_messages' => true,
	]);
}
function DemoteChatMember($chat_id, $user_id)
{
	return bot('promoteChatMember', [
		'chat_id' => $chat_id,
		'user_id' => $user_id,
		'can_change_info' => false,
		'can_post_messages' => false,
		'can_edit_messages' => false,
		'can_delete_messages' => false,
		'can_invite_users' => false,
		'can_restrict_members' => false,
		'can_pin_messages' => false,
		'can_promote_members' => false
	]);
}
function ExportChatInviteLink($chat_id)
{
	return bot('exportChatInviteLink', [
		'chat_id' => $chat_id
	]);
}
function SetChatPhoto($chat_id, $photo)
{
	return bot('setChatPhoto', [
		'chat_id' => $chat_id,
		'photo' => $photo
	]);
}
function DeleteChatPhoto($chat_id)
{
	return bot('deleteChatPhoto', [
		'chat_id' => $chat_id
	]);
}
function SetChatTitle($chat_id, $title)
{
	return bot('setChatTitle', [
		'chat_id' => $chat_id,
		'title' => $title
	]);
}
function SetChatDescription($chat_id, $description)
{
	return bot('setChatDescription', [
		'chat_id' => $chat_id,
		'description' => $description
	]);
}
function PinChatMessage($chat_id, $message_id)
{
	return bot('pinChatMessage', [
		'chat_id' => $chat_id,
		'message_id' => $message_id,
		'disable_notification' => false
	]);
}
function UnpinChatMessage($chat_id)
{
	return bot('unpinChatMessage', [
		'chat_id' => $chat_id,
	]);
}
function LeaveChat($chat_id)
{
	return bot('LeaveChat', [
		'chat_id' => $chat_id
	]);
}
function GetChat($chat_id)
{
	return bot('getChat', [
		'chat_id' => $chat_id
	]);
}
function GetChatAdministrators($chat_id)
{
	return bot('getChatAdministrators', [
		'chat_id' => $chat_id
	]);
}
function GetChatMembersCount($chat_id)
{
	return bot('getChatMembersCount', [
		'chat_id' => $chat_id
	]);
}
function GetChatMember($chat_id, $user_id)
{
	return bot('getChatMember', [
		'chat_id' => $chat_id,
		'user_id' => $user_id
	]);
}
function AnswerCallbackQuery($callback_query_id, $text, $show_alert = false, $url = null, $cache_time = 0)
{
	return bot('answerCallbackQuery', [
		'callback_query_id' => $callback_query_id,
		'text' => $text,
		'show_alert' => $show_alert,
		'url' => $url,
		'cache_time' => $cache_time
	]);
}
function EditMessageText($chat_id, $message_id, $text, $inline_message_id = null, $parse_mode = "MARKDOWN", $disable_web_page_preview = true, $reply_markup = null)
{
	return bot('editMessageText', [
		'chat_id' => $chat_id,
		'message_id' => $message_id,
		'inline_message_id' => $inline_message_id,
		'text' => $text,
		'parse_mode' => $parse_mode,
		'disable_web_page_preview' => $disable_web_page_preview,
		'reply_markup' => $reply_markup
	]);
}
function EditMessageCaption($chat_id, $message_id, $caption, $inline_message_id = null, $parse_mode = "MARKDOWN", $reply_markup = null)
{
	return bot('editMessageCaption', [
		'chat_id' => $chat_id,
		'message_id' => $message_id,
		'inline_message_id' => $inline_message_id,
		'caption' => $caption,
		'parse_mode' => $parse_mode,
		'reply_markup' => $reply_markup
	]);
}
function EditMessageMedia($chat_id, $message_id, $media, $inline_message_id = null, $parse_mode = "MARKDOWN", $reply_markup = null)
{
	return bot('editMessageMedia', [
		'chat_id' => $chat_id,
		'message_id' => $message_id,
		'inline_message_id' => $inline_message_id,
		'media' => $media,
		'reply_markup' => $reply_markup
	]);
}
function EditMessageReplyMarkup($chat_id, $message_id, $reply_markup, $inline_message_id = null)
{
	return bot('editMessageReplyMarkup', [
		'chat_id' => $chat_id,
		'message_id' => $message_id,
		'inline_message_id' => $inline_message_id,
		'reply_markup' => $reply_markup
	]);
}
function StopPoll($chat_id, $message_id, $reply_markup = null)
{
	return bot('stopPoll', [
		'chat_id' => $chat_id,
		'message_id' => $message_id,
		'reply_markup' => $reply_markup
	]);
}
function DeleteMessage($chat_id, $message_id)
{
	return bot('deletemessage', [
		'chat_id' => $chat_id,
		'message_id' => $message_id
	]);
}
function SendSticker($chat_id, $sticker, $reply_to_message_id = null, $reply_markup = null)
{
	return bot('sendSticker', [
		'chat_id' => $chat_id,
		'sticker' => $sticker,
		'disable_notification' => false,
		'reply_to_message_id' => $reply_to_message_id,
		'reply_markup' => $reply_markup
	]);
}
function AnswerInlineQuery($inline_query_id, $results, $cache_time = 0, $is_personal = false, $next_offset = null, $switch_pm_text = null, $switch_pm_parameter = null)
{
	return bot('answerInlineQuery', [
		'inline_query_id' => $inline_query_id,
		'results' => $results,
		'cache_time' => $cache_time,
		'is_personal' => $is_personal,
		'next_offset' => $next_offset,
		'switch_pm_text' => $switch_pm_text,
		'switch_pm_parameter' => $switch_pm_parameter
	]);
}
function SendGame($chat_id, $game_short_name, $reply_to_message_id = null, $reply_markup = null)
{
	return bot('sendGame', [
		'chat_id' => $chat_id,
		'game_short_name' => $game_short_name,
		'disable_notification' => false,
		'reply_to_message_id' => $reply_to_message_id,
		'reply_markup' => $reply_markup
	]);
}
function InlineKeyBoard($inlinetext = [], $type, $contents = [], $standar = "column", $count = 1)
{
	for ($i = 0; $i < $count; $i++) {

		$text     = $inlinetext[$i];
		$content = $contents[$i];

		if ($standar == "column") {
			$keyboard['inline_keyboard'][] = [['text' => $text, $type => $content]];
		}
		if ($standar == "row") {
			$keyboard['inline_keyboard'][] = [['text' => $inlinetext[$i], $type => $contents[$i]], ['text' => $inlinetext[++$i], $type => $contents[$i]]];
		}
	}
	$inline = json_encode($keyboard);
	return $inline;
}
function KeyBoard($keytext = [], $standar = "column", $count = 1)
{
	for ($i = 0; $i < $count; $i++) {

		$text = $keytext[$i];

		if ($standar == "column") {
			$keyboard['keyboard'][] = [['text' => $text]];
		}
		if ($standar == "row") {
			$keyboard['keyboard'][] = [['text' => $keytext[$i]], ['text' => $keytext[++$i]]];
		}
	}
	$resize_keyboard = json_encode($keyboard);
	return $resize_keyboard;
}
function myZip($myZip1, $myZip2)
{
	$myZip4 = realpath($myZip1);
	$myZip = new ZipArchive();
	$myZip->open($myZip2, ZipArchive::CREATE | ZipArchive::OVERWRITE);
	$myZip3 = new RecursiveIteratorIterator(
		new RecursiveDirectoryIterator($myZip4),
		RecursiveIteratorIterator::LEAVES_ONLY
	);
	foreach ($myZip3 as $myZip5 => $myZip6) {
		if (!$myZip6->isDir()) {
			$myZip7 = $myZip6->getRealPath();
			$myZip8 = substr($myZip7, strlen($myZip4) + 1);
			$myZip->addFile($myZip7, $myZip8);
		}
	}
	$myZip->close();
}

function myZip1($myZip9, $myZip10 = 2)
{
	$myZip11 = array(' B', ' KB', ' MB', ' GB', ' TB', ' PB', ' EB', ' ZB', ' YB');
	$myZip12 = floor((strlen($myZip9) - 1) / 3);
	return sprintf("%.{$myZip10}f", $myZip9 / pow(1024, $myZip12)) . @$myZip11[$myZip12];
}

function GetMe()
{
	return bot('getMe');
}

function Slin($a){
$P=GetChat($a)->result;
if($P->username==null){
if($P->invite_link!=null){
$d=$P->invite_link;$tc="خاصه";
}else{
$d=ExportChatInviteLink($a)->result;$tc="خاصه";
}
}else{$d="t.me/".$P->username;$tc="عامه";} 
return $d;}


if (!is_dir("Users")) { // used to make dir
mkdir("Users");
}
function isthere($path) // check member.txt & chat.txt & allchat.txt
{
$exx = explode("\n", file_get_contents($path));
return $exx;
}

$update     = json_decode(file_get_contents('php://input'));

if (isset($update)) {

	$bot = GetMe()->result;
	$botid = $bot->id;
	$botname = $bot->first_name;
	$botusername = $bot->username;

	$message      = $update->message;
	$data         = $update->callback_query->data;
	$edit         = $update->edited_message;
	$inline_query = $update->inline_query->query;

	if ($message) {

		$date                  = $message->date;
		$message_id            = $message->message_id;
		$text                  = $message->text;
		$chat_id               = $message->chat->id;
		$from_id               = $message->from->id;
		$reply                 = $message->reply_to_message;
		$reply_id              = $message->reply_to_message->from->id;
		$reply_user            = $message->reply_to_message->from->username;
		$reply_message_id      = $message->reply_to_message->message_id;
		$reply_caption         = $message->reply_to_message->caption;
		$reply_audio           = $message->reply_to_message->audio;
		$reply_audio_file_id   = $message->reply_to_message->audio->file_id;
		$reply_audio_size      = $message->reply_to_message->audio->file_size;
		$forward               = $message->forward_from;
		$forward_id            = $forward->id;
		$forward_username      = $forward->username;
		$chat_forward          = $message->forward_from_chat;
		$chat_forward_id       = $chat_forward->id;
		$chat_forward_username = $chat_forward->username;
		$chat_forward_title    = $chat_forward->title;
		$chat_forward_type     = $chat_forward->type;
		$username              = $message->from->username;
		$type                  = $message->chat->type;
		$itprivate             = $type == "private";
		$itchannel             = $type == "channel";
		$itsupergroup          = $type == "supergroup";
		$itgroup               = $type == "group";
		$group_title           = $message->chat->title;
		$name                  = $message->from->first_name;
		$name_tag              = "[ • $name • ](tg://user?id=$from_id)";
		$name_reply            = $message->reply_to_message->from->first_name;
		$name_tag_reply        =  "[$name_reply](tg://user?id=$reply_id)";
		$audio                 = $message->audio;
		$audio_file_id         = $message->audio->file_id;
		$video                 = $message->video;
		$video_file_id         = $message->video->file_id;
		$voice                 = $message->voice;
		$voice_file_id         = $message->voice->file_id;
		$photo                 = $message->photo;
		$photo_file_id         = $message->photo[0]->file_id;
		$sticker               = $message->sticker;
		$sticker_file_id       = $message->sticker->file_id;
		$contact               = $message->contact;
		$contact_number        = $message->contact->phone_number;
		$contact_name          = $message->contact->first_name;
		$video_note            = $message->video_note;
		$video_note_file_id    = $message->video_note->file_id;
		$document              = $message->document;
		$document_name         = $document->file_name;
		$document_file_id      = $document->file_id;
		$gif                   = $message->animation;
		$gif_file_id           = $message->animation->file_id;
		$pin                   = $message->pinned_message;
		$pin_id                = $message->pinned_message->from->id;
		$pin_first_name        = $message->pinned_message->from->first_name;
		$pin_tag               = "[$pin_first_name](tg://user?id=$pin_id)";
		$inline                = $message->reply_markup->inline_keyboard;
		$entities              = $message->entities;
		$location              = $message->location;
		$location_file_id      = $message->location->file_id;
		$new_chat              = $message->new_chat_member;
		$left_chat             = $message->left_chat_member;
		$new_id                = $new_chat->id;
		$left_id               = $left_chat->id;
		$left_name             = $left_chat->first_name;
		$checkbots             = GetChatMember($chat_id, $new_id)->result->user->is_bot;
	} elseif ($data) {
                $username =             $update->callback_query->from->username;
		$date                  = $update->callback_query->date;
		$chat_id               = $update->callback_query->message->chat->id;
		$from_id               = $update->callback_query->message->reply_to_message->from->id;
		$message_id            = $update->callback_query->message->message_id;
		$from_id               = $update->callback_query->from->id;
		$name                  = $update->callback_query->from->first_name;
		$name_tag              = "[$name](tg://user?id=$from_id)";
	} elseif ($edit) {

		$from_id               = $update->edited_message->from->id;
		$chat_id               = $update->edited_message->chat->id;
		$message_id            = $update->edited_message->message_id;
		$name                  = $update->edited_message->from->first_name;
		$name_tag              = "[$name_edit](tg://user?id=$edit_from_id)";
	} elseif ($inline_query) {
		$inline_query_id = $update->inline_query->id;
	}
} #End of $update isset
if($from_id != $chat_id){return false;}
function SV($a,$b){file_put_contents($a,json_encode($b,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));}
$webhost = "https://" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME']; //مسار ملفك من الاستضافه
$path= "Users"; # مسار مجلد الخزن 
$Ty=$Js['type'][$chat_id];
$Ch=$Js['sub']['ch'];
if($Js['bot']['Jp']==null){
$Js['bot']['Jp']="on";
$Js['bot']['Forward']="❌";
$Js['bot']['Notices']="❌";
$Js['bot']['TSF']="❌";
$Js['bot']['backp']="❌";
$Js['bot']['TBr']="❌";
$Js['bot']['MNT']="❌";
$Js['bot']['Sutm']="❌";
$Js['bot']['SubC']="✅";
$Js['bot']['BotS']="✅";
SV("Js.json",$Js);
}
if($Js['bot']['startB']==null){$Js['bot']['startB']=0;SV("Js.json",$Js);} 
$startB=$Js['bot']['startB']; 
$Members = count(isthere("$path/member.txt")) - 1;
$Groups= count(isthere("$path/chat.txt")) - 1;
$allchat = count(isthere("$path/allchat.txt")) - 1;

if($data=="Aban"){
$button = ['رجوع']; $keys = ['band']; $keyboard2 = InlineKeyBoard($button, 'callback_data', $keys, 'column', 1);

}elseif($data=="Admin"){
$button = ['رجوع']; $keys = ['Admins']; $keyboard2 = InlineKeyBoard($button, 'callback_data', $keys, 'column', 1);

}elseif($data=="Aban"){
$button = ['رجوع']; $keys = ['band']; $keyboard2 = InlineKeyBoard($button, 'callback_data', $keys, 'column', 1);

}elseif(in_array($data,['br:forwardmessage:p','br:forwardmessage:g','br:forwardmessage:all','br:copymessage:p','br:copymessage:g','br:copymessage:all'])){
$button =['رجوع']; $keys = ['broDa']; $keyboard2 = InlineKeyBoard($button, 'callback_data', $keys, 'column', 1);


}elseif(in_array($data,['addch','Dch','Dfake','addfake','SubK'])){
$button = ['رجوع']; $keys = ['ChaneLL']; $keyboard2 = InlineKeyBoard($button, 'callback_data', $keys, 'column', 1);

}elseif(in_array($data,['DTT','AddT1'])){
$button = ['رجوع']; $keys = ['ET']; $keyboard2 = InlineKeyBoard($button, 'callback_data', $keys, 'column', 1);

}elseif(in_array($data,['AddV1','DelV1'])){
$button = ['رجوع']; $keys = ['EV1']; $keyboard2 = InlineKeyBoard($button, 'callback_data', $keys, 'column', 1);

}elseif(in_array($data,['uBK','rebackup', 'uBKg'])){
$button = ['رجوع']; $keys = ['Bckup']; $keyboard2 = InlineKeyBoard($button, 'callback_data', $keys, 'column', 1);

}elseif(!$data or !in_array($data,['DelV1','AddT1','DTT','Pbroadcast','Gbroadcast','Fbroadcast','FGbroadcast','Aban','Admin','SubK','addfake','Dfake','addch','Dch'])){
$button = ['رجوع']; $keys = ['cancel']; $keyboard2 = InlineKeyBoard($button, 'callback_data', $keys, 'column', 1);
}
$buttn = ['الغاء الاذاعه','رجوع']; $kes = ['caBr','broDa']; $keyboar2 = InlineKeyBoard($buttn, 'callback_data', $kes, 'column', 2);
//****
$keyboard=json_encode(['inline_keyboard'=>[
[['text'=>"الاشعارات: ".$Js['bot']['Notices'],'callback_data'=>"Notices"],['text'=>"التواصل: ".$Js['bot']['Forward'],'callback_data'=>"Forward"],['text'=>"البوت: ".$Js['bot']['BotS'],'callback_data'=>"BotS"]], 
[['text'=>"التصفيه التلقائيه : ".$Js['bot']['TSF'],'callback_data'=>"TSF"]], 
[['text'=>"منع التكرار : ".$Js['bot']['MNT'],'callback_data'=>"MNT"]], 
[['text'=>"قسم الاشتراك الاجباري ",'callback_data'=>"ChaneLL"],['text'=>"قسم الاذاعه ",'callback_data'=>"broDa"]], 
[['text'=>"قسم النسخه الاحتياطيه",'callback_data'=>"Bckup" ]], 
[['text'=>"قسم الادمنيه ",'callback_data'=>"Admins"],['text'=>"قسم الحظر ",'callback_data'=>"band"]], 
[['text'=>"قسم الأحصائيات",'callback_data'=>"count"]], 
[['text'=>"قسم الاعلانات ",'callback_data'=>"EV1"], ['text'=>"قسم التمويل ",'callback_data'=>"ET"]], 
[['text'=>"نقل ملكيه البوت",'callback_data'=>"sudo"]],]]);
//****
$keyboardBa=json_encode(['inline_keyboard'=>[
[['text'=>"حظر عضو ➕",'callback_data'=>"Aban"]], 
[['text'=>"المحظورين 🚫",'callback_data'=>"AllB"]], 
[['text'=>"رجوع",'callback_data'=>"cancel"]]]]);
//****
$keyboardBackup=json_encode(['inline_keyboard'=>[
[['text'=>"نسخه يوميه: ".$Js['bot']['backp'],'callback_data'=>"backp"], ['text'=>"جلب نسخه احتياطيه",'callback_data'=>"gBK"]],
[['text'=>"استعاده الخزن",'callback_data'=>"rebackup"]], 
[['text'=>"رفع نسخه اعضاء",'callback_data'=>"uBK"], ['text'=>"رفع نسخه كروبات",'callback_data'=>"uBKg"]], 
[['text'=>"رجوع",'callback_data'=>"cancel"]]]]);
//****
$keyboardAd=json_encode(['inline_keyboard'=>[
[['text'=>"رفع ادمن ➕",'callback_data'=>"Admin"]], 
[['text'=>"الادمنيه 📑",'callback_data'=>"Allad"]], 
[['text'=>"رجوع",'callback_data'=>"cancel"]]]]);
//****
$keyboardB=json_encode(['inline_keyboard'=>[
[['text'=>"تثبيت الاذاعه : ".$Js['bot']['TBr'],'callback_data'=>"TBr"]], 
[['text'=>"اذاعه خاص 📢",'callback_data'=>"br:copymessage:p"],['text'=>"توجيه خاص 🔄",'callback_data'=>"br:forwardmessage:p"]], 
[['text'=>"اذاعه كروبات 📢",'callback_data'=>"br:copymessage:g"],['text'=>"توجيه كروبات 🔄",'callback_data'=>"br:forwardmessage:g"]], 
[['text'=>"اذاعه للكل 📢",'callback_data'=>"br:copymessage:all"],['text'=>"توجيه للكل 🔄",'callback_data'=>"br:forwardmessage:all"]],
[['text'=>"الاحصائيات 📊",'callback_data'=>"count"]], [['text'=>"عدد البدأ : $startB",'callback_data'=>"startB"]], 
[['text'=>"رجوع",'callback_data'=>"cancel"]]]]);
//****
$KeyboardCH=json_encode(['inline_keyboard'=>[
[['text'=>"كليشه واحده : ".$Js['bot']['SubC'],'callback_data'=>"SubC"],['text'=>"اضافه قناة ➕",'callback_data'=>"addch"]], 
[['text'=>"عرض القنوات 📋",'callback_data'=>"Vch"],['text'=>"حذف القنوات 🗑",'callback_data'=>"Dch"]], 
[['text'=>"تغيير كليشه الاشتراك 📃",'callback_data'=>"SubK"]], 
[['text'=>"اضف اشتراك وهمي 🔢",'callback_data'=>"addfake"],['text'=>"حذف الاشتراك الوهمي 🗑",'callback_data'=>"Dfake"]], 
[['text'=>"رجوع",'callback_data'=>"cancel"]],]]); 
//****
$KeyboardT=json_encode(['inline_keyboard'=>[
[['text'=>"اشعار الاشتراك : ".$Js['bot']['Sutm'],'callback_data'=>"Sutm"]], 
[['text'=>"التمويلات الجاريه 🗄",'callback_data'=>"TT1"],['text'=>"اضف تمويل ➕",'callback_data'=>"AddT1"]], 
[['text'=>"سجل التمويلات 📑",'callback_data'=>"ETM"]], 
[['text'=>"حذف التمويلات 🗑",'callback_data'=>"DTT"]], 
[['text'=>"رجوع",'callback_data'=>"cancel"]]]]); 
//****
$KeyboardV=json_encode(['inline_keyboard'=>[
[['text'=>"عرض الاعلان ⚙️",'callback_data'=>"VV1"]], 
[['text'=>"ضع اعلان 🎁",'callback_data'=>"AddV1"], ['text'=>"حذف الاعلان 🗑",'callback_data'=>"DelV1"]], 
[['text'=>"رجوع",'callback_data'=>"cancel"]]]]); 
//****
if($Js['bot']['subK']==null){
$SubK="انت غير مشترك بقناه البوت ◽
اشترك ثم ارسل /start 
"; 
}else{
$SubK=$Js['bot']['subK']; 
} 
if(!$username){$Suser="لايوجد معرف .";}else{$Suser="@$username";}
//----------------

function txt($path, $contents, $options = null)
{
file_put_contents($path, $contents, $options);
}
function get($path)
{
return file_get_contents($path);
}
function CurlGetContents($url){
$header = array('Accept-Language: en');
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
$data = curl_exec($curl);
curl_close($curl);
return $data;
}

if (file_exists($path . "/count.json")) {
$g = explode("-", file_get_contents($path . "/info.txt"));
$gQ=$g[2]; 
$gW=$g[3]; 
$gE=$g[4]; 
}
function CopyMessage($chat_id,$from,$msg){
return bot('CopyMessage',[
'chat_id'=>$chat_id,
'from_chat_id'=>$from,
'message_id'=>$msg, 
'disable_web_page_preview' =>true,
'parse_mode' =>"markdown",
]);
} 
function broadcast($to,$type,$pin){
$path=$GLOBALS['path']; 
$Js=json_decode(file_get_contents("Js.json"),1);
$x=$Js['bot']['startB']; 
$e=$x+50;
if($to=="p"){
$ids=explode("\n",file_get_contents("$path/member.txt")); 
} elseif($to=="g"){
$ids=explode("\n",file_get_contents("$path/chat.txt")); 
} elseif($to=="all"){
$ids=explode("\n",file_get_contents("$path/allchat.txt")); 
}
$xv=$GLOBALS['message_id']+1; 
txt("$path/count.json",$e); 
txt("$path/info.txt",$GLOBALS['from_id']."-".$GLOBALS['message_id']."-".$to."-".$type."-".$pin."-".$xv); 
for($i=$x;$i<$e;$i++){
if($type=="copymessage"){
$w=CopyMessage($ids[$i],$GLOBALS['chat_id'],$GLOBALS['message_id']); 
$q=$w->result->message_id; 
}elseif($type=="forwardmessage"){
$w=ForwardMessage($ids[$i], $GLOBALS['chat_id'], $GLOBALS['message_id']);
$q=$w->result->message_id; 
} 
if($pin==true){
bot('pinchatMessage', [
'chat_id'=>$ids[$i],
'message_id'=>$q,
]);
} 
if($w->ok==true and !in_array($ids[$i],isthere("$path/true.txt"))){
file_put_contents("$path/true.txt",$ids[$i]."\n",FILE_APPEND); 
}
EditMessageText($GLOBALS['chat_id'],$xv,"تم الارسال الى *$i* ",null,"markdown",true,json_encode(['inline_keyboard'=>[[['text'=>"- الغاء الاذاعه",'callback_data'=>"caBr"]]]])); 
} 
file_get_contents("https://" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME']);
} 
function Mbroadcast($to,$type,$pin){
$path=$GLOBALS['path']; 
$we=file_get_contents("$path/info.txt"); 
$wa=explode("-",$we);
$sudo_c=$wa[0]; 
$msg_c=$wa[1]; 
$xv=end($wa); 
$Js=json_decode(file_get_contents("Js.json"),1);
$x=file_get_contents("$path/count.json"); 
$e=$x+50;
if($to=="p"){
$ids=explode("\n",file_get_contents("$path/member.txt")); 
} elseif($to=="g"){
$ids=explode("\n",file_get_contents("$path/chat.txt")); 
}elseif($to=="all"){
$ids=explode("\n",file_get_contents("$path/allchat.txt")); 
}
if($Js['bot']['startB']==0){
$count= count($ids)-1;
}else{
$count= count($ids)-$Js['bot']['startB']-1;
} 
$ko=count(explode("\n",file_get_contents("$path/true.txt")))-1; 
$ki=$count-$ko; 
if (file_exists($path . "/count.json")) {
if ($e >= count($ids)- 1 + 50) {
EditMessageText($sudo_c,$xv, "
تم الاذاعه بنجاح ✅
",null, "MARKDOWN", true,json_encode(['inline_keyboard'=>[[['text'=>"الصفحه الرئيسيه",'callback_data'=>"cancel"]]]]));
SendMessage($sudo_c, "
تم الاذاعه لـ*$count* عضو


عدد الحقيقي : *$ko*

عدد الوهمي : *$ki*
", "MARKDOWN", true,$xv,json_encode(['inline_keyboard'=>[[['text'=>"الصفحه الرئيسيه",'callback_data'=>"cancel"]]]]));
unlink($path . "/count.json");
unlink($path . "/info.txt");
unlink($path . "/true.txt");
exit;
} } 

txt("$path/count.json",$e); 
for($i=$x;$i<$e;$i++){
if($type=="copymessage"){
$w=CopyMessage($ids[$i],$sudo_c,$msg_c); 
$q=$w->result->message_id; 
}elseif($type=="forwardmessage"){
$w=ForwardMessage($ids[$i], $sudo_c, $msg_c);
$q=$w->result->message_id; 
} 
if($pin==true){
bot('pinchatMessage', [
'chat_id'=>$ids[$i],
'message_id'=>$q,
]);
} 
if($w->ok==true and !in_array($ids[$i],isthere("$path/true.txt"))){
file_put_contents("$path/true.txt",$ids[$i]."\n",FILE_APPEND); 
}
EditMessageText($sudo_c,$xv,"تم الارسال الى *$i* ",null,"markdown",true,json_encode(['inline_keyboard'=>[[['text'=>"- الغاء الاذاعه",'callback_data'=>"caBr"]]]])); 
} 
header("refresh:10");
file_get_contents("https://" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME']);

} 

if(!$update){
if($gQ!=null){
Mbroadcast($gQ,$gW,$gE); 
} 

} 
if($message and $chat_id!=$sudo and !in_array($chat_id, $Js['bot']['admin']) and $itprivate){
if(!in_array($chat_id,$Js['other']['new'])){
if(count($Js['other']['new'])<5){
$Js['other']['new'][]=$chat_id; 
SV("Js.json",$Js);
}else{
unset($Js['other']['new'][0]); 
SV("Js.json",$Js);
$Js['other']['new']=array_values($Js['other']['new']);
SV("Js.json",$Js); 
$Js['other']['new'][]=$chat_id; 
SV("Js.json",$Js);
}} 
if(!in_array($chat_id,$Js['other']['endm'])){
$Js['other']['endm'][]=$chat_id; 
SV("Js.json",$Js);
} 
if($Js['bot']['MNT']=="✅"){
if($Vs['MNT'][$from_id]==null){
$Vs['MNT'][$from_id][]=$text;
SV("$path/Vs.json",$Vs);
}elseif($Vs['MNT'][$from_id]!=null and $text==$Vs['MNT'][$from_id][0]){
$Vs['MNT'][$from_id][]=$text;
SV("$path/Vs.json",$Vs);
}elseif($Vs['MNT'][$from_id]!=null and $text!=$Vs['MNT'][$from_id][0]){
unset($Vs['MNT'][$from_id]);
SV("$path/Vs.json",$Vs);
}
$sudoo="[$sudo](tg://user?id=".$sudo.")"; 
if($itprivate and !in_array($from_id,$Js['bot']['band']) and $text==$Vs['MNT'][$from_id][30] and $from_id!=$botid){
SendMessage($chat_id,"- تم حظرك من البوت بسبب التكرار \n لفك الحظر راسل المطور $sudoo ","markdown",true,$message_id);
$Js['bot']['band'][]=$from_id;
SV("Js.json",$Js);
unset($Vs['MNT'][$from_id]);
SV("$path/Vs.json",$Vs);
SendMessage($sudo,"
- تم حظر هذا الشخص بسبب التكرار 

• معلوماته

اسمه: $name_tag
معرفه: [$Suser]
ايديه: `$from_id`
","markdown",true,null,json_encode(['inline_keyboard'=>[[['text'=>"الغاء حظر",'callback_data'=>"unban_".$from_id]],]]));
}
} 
} 

if($Js['d']!=date("d")){
if($Js['bot']['backp']=="✅" and !$data and $itprivate){
bot('senddocument',['chat_id'=>$sudo,'document'=>new CURLFile("Users/member.txt"),]);
bot('senddocument',['chat_id'=>$sudo,'document'=>new CURLFile("Users/chat.txt"),]);
bot('senddocument',['chat_id'=>$sudo,'document'=>new CURLFile("Users/allchat.txt"),]);
txt("$path/Js.txt",file_get_contents("Js.json")); 
} 
unset($Js['other']['new']); 
unset($Js['other']['endm']); 
$Js['d']=date("d"); 
SV("Js.json",$Js); 
} 

if ($chat_id == $sudo || (isset($Js['bot']['admin']) && is_array($Js['bot']['admin']) && in_array($from_id, $Js['bot']['admin']))) {

if ($text == '/start') { // start message
SendMessage($chat_id, "• اهلا بك في لوحه الأدمن الخاصه بالبوت 🤖\n\n- يمكنك التحكم في البوت الخاص بك من هنا\n\n~~~~~~~~~~~~~~~~~","markdown", true, null, $keyboard);
}

if ($data == 'cancel') { // cancel 
$inf= "• اهلا بك في لوحه الأدمن الخاصه بالبوت 🤖\n\n- يمكنك التحكم في البوت الخاص بك من هنا\n\n~~~~~~~~~~~~~~~~~";
EditMessageText($chat_id, $message_id, $inf, null, "MARKDOWN", true, $keyboard);if($Ty!=null){unset($Js['type'][$chat_id]);SV("Js.json",$Js);} 
if (file_exists("$path/broadcast$chat_id.txt")) :
unlink("$path/broadcast$chat_id.txt");
unlink("$path/type$chat_id.txt");
endif;
}
//الاحصائيات
$Allcount=$Groups + $Members;
$endM=count($Js['other']['endm']);
$band=count($Js['bot']['band']); 
if($data=="count"){
for($i=0;$i<count($Js['other']['new']);$i++){
$p=$i+1;
$uy="$uy $p - [".$Js['other']['new'][$i]."](tg://user?id=".$Js['other']['new'][$i].")\n"; 
} 
EditMessageText($chat_id,$message_id,"
مرحبا بك في قسم الاحصائيات 📊

• عدد المسخدمين الكلي : *$Allcount* 
• عدد المستخدمين في الخاص : *$Members*
• عدد الكروبات والقنوات : *$Groups*
• عدد المحظورين : *$band*
• عدد المتفاعلين اليوم : *$endM*

قائمة اخر الاعضاء الذين استخدموا البوت
-------------- 
$uy
",null,"markdown",true,$keyboard2);
}
//الاحصائيات

//رفع وجلب نسخه
if($data=="Bckup"  ){
if($Ty!=null){unset($Js['type'][$chat_id]);SV("Js.json",$Js);} 
EditMessageText($chat_id,$message_id,"اهلا بك في قسم النسخ الاحتياطيه",null,"markdown",true,$keyboardBackup);
}

if($data=="gBK"){
bot('senddocument',['chat_id'=>$chat_id,'document'=>new CURLFile("Users/member.txt"),]);
bot('senddocument',['chat_id'=>$chat_id,'document'=>new CURLFile("Users/chat.txt"),]);
bot('senddocument',['chat_id'=>$chat_id,'document'=>new CURLFile("Users/allchat.txt"),]);
}

if($data=="uBK"){
$k="قم بأرسال ملف الاعضاء بصيغه txt";
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$keyboard2);
$Js['type'][$chat_id]=$data;SV("Js.json",$Js);
}
if($data=="rebackup" ){
if(get("$path/Js.txt")!=null){
EditMessageText($chat_id,$message_id,"تم تجديد البيانات ✅",null,"markdown",true,$keyboard2);
$Js=json_decode(file_get_contents("$path/Js.txt")); 
SV("Js.json",$Js);
}else{
EditMessageText($chat_id,$message_id,"لا توجد بيانات لأستعادتها",null,"markdown",true,$keyboard2);
}}
if($Ty=="uBK"){
if($document ){
if(preg_match("/(.*).txt/",$document_name)){unset($Js['type'][$chat_id]);SV("Js.json",$Js);
$url = json_decode(file_get_contents('https://api.telegram.org/bot'.TOKEN.'/getFile?file_id='.$document_file_id),true);
$pth = $url['result']['file_path'];
$f = file_get_contents('https://api.telegram.org/file/bot'.TOKEN.'/'.$pth);
file_put_contents("Users/member.txt","$f");
file_put_contents("Users/allchat.txt","$f");
SendMessage($chat_id,"تم رفع النسخه","markdown",true,$message_id,$keyboard2);
}else{SendMessage($chat_id,"عذرا هذا الملف ليس بصيغه txt","markdown",true,$message_id,$keyboard2);}}}
if($data=="uBKg"){
$k="قم بأرسال ملف الاعضاء بصيغه txt";
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$keyboard2);
$Js['type'][$chat_id]=$data;SV("Js.json",$Js);
}
if($Ty=="uBKg"){
if($document ){
if(preg_match("/(.*).txt/",$document_name)){unset($Js['type'][$chat_id]);SV("Js.json",$Js);
$url = json_decode(file_get_contents('https://api.telegram.org/bot'.TOKEN.'/getFile?file_id='.$document_file_id),true);
$pth = $url['result']['file_path'];
$f = file_get_contents('https://api.telegram.org/file/bot'.TOKEN.'/'.$pth);
file_put_contents("Users/chat.txt","$f");
file_put_contents("Users/allchat.txt","$f");
SendMessage($chat_id,"تم رفع النسخه","markdown",true,$message_id,$keyboard2);
}else{SendMessage($chat_id,"عذرا هذا الملف ليس بصيغه txt","markdown",true,$message_id,$keyboard2);}}}
//رفع وجلب نسخه

//قسم الاشتراك الاجباري
if($data=="ChaneLL" ){if($Ty!=null){unset($Js['type'][$chat_id]);SV("Js.json",$Js);} 
EditMessageText($chat_id,$message_id,"اهلا بك في قسم الاشتراك الاجباري",null,"markdown",true,$KeyboardCH);
}
if($data=="addch"){
$k="قم بتوجيه رساله من القناه";
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$keyboard2);
$Js['type'][$chat_id]=$data;SV("Js.json",$Js);
}
if($chat_forward ){
if($Ty=="addch"){
if(!in_array($chat_forward_id,$Ch)){
if(GetChatMember($chat_forward_id, $botid)->result->status=="administrator"){
$Js['sub']['ch'][]=$chat_forward_id;
SV("Js.json",$Js);
$k="تم حفظ القناة";
SendMessage($chat_id,$k,"markdown",true,$message_id,$keyboard2);
}else{SendMessage($chat_id,"البوت ليس ادمن","markdown",true,$message_id,null);}
}else{SendMessage($chat_id,"هذه القناة مضافه بالفعل","markdown",true,$message_id,null);}
}}
$channel=$Js['chs'];
if($data=="Vch"){
if(count($Ch)!=0){
$k="اليك القنوات";
$reply_markup = [];
foreach($Js['sub']['ch'] as $T){
$o=Slin($T);
$P=GetChat($T)->result->title;
$reply_markup['inline_keyboard'][] =[['text'=>trim($P),'url'=>"$o"],['text'=>"🗑",'callback_data'=>"Del_$T"]];}
$reply_markup['inline_keyboard'][] =[['text'=>"➕",'callback_data'=>"addch"]];
$reply_markup['inline_keyboard'][] =[['text'=>"رجوع",'callback_data'=>"cancel"]];
$K=json_encode($reply_markup); 
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$K);
}else{EditMessageText($chat_id,$message_id,"لم تقم بأضافه اي قناه",null,"markdown",true,$keyboard2);}
}

if(preg_match("/(Del_)(.*?)/",$data)){
$st=str_replace("Del_","",$data);
$st=array_search($st,$Js['sub']['ch']);
unset($Js['sub']['ch'][$st]);
SV("Js.json",$Js);
$Js['sub']['ch']=array_values($Js['sub']['ch']);
SV("Js.json",$Js); $k="تم حذف القناة";
$reply_markup = [];
foreach($Js['sub']['ch'] as $T){
if($T!=$st){
$o=Slin($T);
$P=GetChat($T)->result->title;
$reply_markup['inline_keyboard'][] =[['text'=>trim($P),'url'=>"$o"],['text'=>"🗑",'callback_data'=>"Del_$T"]];}}
$reply_markup['inline_keyboard'][] =[['text'=>"➕",'callback_data'=>"addch"]];
$reply_markup['inline_keyboard'][] =[['text'=>"رجوع",'callback_data'=>"cancel"]];
$K=json_encode($reply_markup); 
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$K);
}
if($data=="Dch"){
if(count($Ch)!=0){
EditMessageText($chat_id,$message_id,"تم حذف القنوات",null,"markdown",true,$keyboard2);
unset($Js['sub']['ch']);SV("Js.json",$Js);
}else{EditMessageText($chat_id,$message_id,"لم تقم بأضافه اي قناه",null,"markdown",true,$keyboard2);}
}
if($data=="SubK"){
$k="- حسنا عزيزي ارسل رساله الاشتراك الجديده 
";
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$keyboard2);
$Js['type'][$chat_id]=$data;SV("Js.json",$Js);
}
if($Ty=="SubK" and !$data){
if($text!="/start"){
unset($Js['type'][$chat_id]);
$Js['bot']['subK']=$text;
SV("Js.json",$Js);
SendMessage($chat_id,"تم الحفظ بنجاح ✅","markdown",true,$message_id,$keyboard2);
}
} 
if($data=="startB"){
$k="- حسنا عزيزي ارسل العدد الذي ستبدأ الاذاعه منه
";
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$keyboard2);
$Js['type'][$chat_id]=$data;SV("Js.json",$Js);
}
if($Ty=="startB" and !$data){
if($text!="/start" and !preg_match("/([a-z])|([A-Z])|([ا-ي])/",$text) and preg_match("/([0-9])/",$text)){
unset($Js['type'][$chat_id]);
$Js['bot']['startB']=$text;
SV("Js.json",$Js);
SendMessage($chat_id,"تم الحفظ بنجاح ✅","markdown",true,$message_id,$keyboard2);
}
} 

if($Ty=="addfake" and preg_match("/(.com)|(www)|(http)|(.me)|(@)|(t.me)|(joinchat)/",$text)){
if($Js['sub']['fakesub']!=$text ){
SendMessage($chat_id,"تم الحفظ ✅","markdown",true,$message_id,$keyboard2);
$Js['sub']['fakesub']=$text;
SV("Js.json",$Js);unset($Js['type'][$chat_id]);SV("Js.json",$Js);
}else{SendMessage($chat_id,"هذا الاشتراك مضاف بالفعل","markdown",true,$message_id,$keyboard2);
}}
if($data=="addfake"){
$k="- حسنا عزيزي قم بأرسال كليشه لوضعها ك أشتراك وهمي
مثل


`يجب عليك دخول هذا البوت اول @XGeBoT`
";
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$keyboard2);
$Js['type'][$chat_id]=$data;SV("Js.json",$Js);
}

if($data=="Dfake"){
if($Js['sub']['fakesub']!=null){
EditMessageText($chat_id,$message_id,"تم حذف الاشتراك الوهمي \n [". $Js['sub']['fakesub']."] ",null,"markdown",true,$keyboard2);
unset($Js['sub']['fakesub']);
SV("Js.json",$Js);
unset($Ds['sub']['fakesub']);
SV("Ds.json",$Ds);
}else{EditMessageText($chat_id,$message_id,"انت لم تقم بأضافه اشتراك وهمي ",null,"markdown",true,$keyboard2);}
}

//قسم الاشتراك الاجباري

//قسم الاعلانات
if($data=="EV1" ){if($Ty!=null){unset($Js['type'][$chat_id]);SV("Js.json",$Js);} 
EditMessageText($chat_id,$message_id,"اهلا بك في قسم الاعلانات",null,"markdown",true,$KeyboardV);
}
if($Ty=="AddV1"){
if(preg_match("/([A-Z])|([a-z])|([ا-ي])/",$text)){
SendMessage($chat_id,"تم وضع الاعلان في بوت ✅","markdown",true,$message_id,$keyboard2);
$Js['bot']['ads']=json_encode($update); unset($Js['type'][$chat_id]);SV("Js.json",$Js);
}}
if($data=="AddV1"){
$k="قم بأرسال اعلان جديد";
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$keyboard2);
$Js['type'][$chat_id]=$data;SV("Js.json",$Js);
}
if($data=="VV1"){
if($Js['bot']['ads']!=null){
$u=json_decode($Js['bot']['ads']);
if(!isset($u->message->reply_markup)){
SendMessage($chat_id,$u->message->text,null,null);
}else{SendMessage($chat_id,$u->message->text,null,null,null,json_encode($u->message->reply_markup));}
}else{EditMessageText($chat_id,$message_id,"انت لم تقم بأضافه اعلان لعرضه",null,"markdown",true,$keyboard2);}
}
if($data=="DelV1"){
if($Js['bot']['ads']!=null){
EditMessageText($chat_id,$message_id,"تم حذف الاعلان بنجاح ✅",null,"markdown",true,$keyboard2);
unset($Js['bot']['ads']);
unset($Vs['ads']['adss']);
SV("Js.json",$Js);SV("$path/Vs.json",$Vs);
}else{EditMessageText($chat_id,$message_id,"انت لم تقم بأضافه اعلان لتحذفه",null,"markdown",true,$keyboard2);}
}
//قسم الاعلانات

//قسم التمويل
if($data=="ET" ){if($Ty!=null){unset($Js['type'][$chat_id]);SV("Js.json",$Js);} 
EditMessageText($chat_id,$message_id,"اهلا بك في قسم التمويلات",null,"markdown",true,$KeyboardT);
}
if(!preg_match("/([A-Z])|([a-z])|([ا-ي])/",$text) and preg_match("/([0-9])/",$text) and $text!=0){
$yt=explode("+", $Ty); 
if($yt[1]=="AddT1"){
SendMessage($chat_id,"تم اضافه التمويل ","markdown",true,$message_id,$keyboard2);
$Js['tmo']['TMM'][]=$yt[0];
$Ds['tm']['TMo'][$yt[0]]=['count'=>[],'C'=>$text]; 
SV("Ds.json", $Ds); 
unset($Ty); 
SV("Js.json", $Js); 
}} 
if($chat_forward ){
if($Ty=="AddT1"){
if(!in_array($chat_forward_id,$Js['tmo']['TMM'])){
if(GetChatMember($chat_forward_id, $botid)->result->status=="administrator"){
$Js['type'][$chat_id]=$chat_forward_id."+AddT1";SV("Js.json",$Js);
$k="حسنا ارسل عدد الاعضاء الذي تريد  اضافتهم لهذه القناه -";
SendMessage($chat_id,$k,"markdown",true,$message_id,$keyboard2);
}else{SendMessage($chat_id,"البوت ليس ادمن","markdown",true,$message_id,null);}
}else{SendMessage($chat_id,"هذه القناة تحت التمويل بالفعل","markdown",true,$message_id,null);}
}
}

if($data=="AddT1"){
$k="قم بتوجيه رساله من القناه";
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$keyboard2);
$Js['type'][$chat_id]=$data;SV("Js.json",$Js);
}
$channel=$Js['tmo']['TMM'];
if($data=="TT1"){
if(count($channel)!=0){
$k="اليك التمويلات الجاريه";
$reply_markup = [];
for($i=0;$i<count($channel);$i++){
$T=$channel[$i]; 
$o=Slin($T);
$P=GetChat($T)->result->title;
$cc=count($Ds['tm']['TMo'][$T]['count']); 
$co=$Ds['tm']['TMo'][$T]['C']; 
$reply_markup['inline_keyboard'][] =[['text'=>trim($P),'url'=>"$o"],['text'=>$co."/".$cc,'url'=>$o],['text'=>"🗑",'callback_data'=>"DelT1_$T"]];}
$reply_markup['inline_keyboard'][] =[['text'=>"➕",'callback_data'=>"AddT1"]];
$reply_markup['inline_keyboard'][] =[['text'=>"رجوع",'callback_data'=>"ET"]];
$K=json_encode($reply_markup); 
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$K);
}else{EditMessageText($chat_id,$message_id,"لم تقم بأضافه اي تمويل",null,"markdown",true,$keyboard2);}
}

if(preg_match("/(DelT1_)(.*?)/",$data)){
$st=str_replace("DelT1_","",$data);
$st=array_search($st,$Js['tmo']['TMM']);
unset($Js['tmo']['TMM'][$st]);
SV("Js.json",$Js);
$Js['tmo']['TMM']=array_values($Js['tmo']['TMM']);SV("Js.json",$Js); 
unset($Ds['tm']['TMo'][$st]); 
unset($Ds['tm']['X'][$st]); 
SV("Ds.json", $Ds); 
$k="تم حذف التمويل";
$reply_markup = [];
for($i=0;$i<count($channel);$i++){
$T=$channel[$i]; 
if($T!=$st){
$o=Slin($T);
$P=GetChat($T)->result->title;
$cc=count($Ds['tm']['TMo'][$T]['count']); 
$co=$Ds['tm']['TMo'][$T]['C']; 
$reply_markup['inline_keyboard'][] =[['text'=>trim($P),'url'=>"$o"],['text'=>$co."/".$cc,'url'=>$o],['text'=>"🗑",'callback_data'=>"DelT1_$T"]];}} 
$reply_markup['inline_keyboard'][] =[['text'=>"➕",'callback_data'=>"AddT1"]];
$reply_markup['inline_keyboard'][] =[['text'=>"رجوع",'callback_data'=>"ET"]];
$K=json_encode($reply_markup); 
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$K);
}
if($data=="ETM"){
for($i=0;$i<count($Js['tmo']['ETM']);$i++){
$t=$i+1;
$io=explode("+",$Js['tmo']['ETM'][$i]); 
$io1=$io[0]; $io2=$io[1]; 
$u="$u $t - القناه:  [$io1] 
عدد الاعضاء المضافين:  *$io2*

--------------------
 "; 
} 
EditMessageText($chat_id,$message_id," 
- اليك سجل التمويلات

$u
",null,"markdown",true,$keyboard2);
} 
if($data=="DTT"){
if(count($Js['tmo']['TMM'])!=0){
EditMessageText($chat_id,$message_id,"تم حذف التمويلات ",null,"markdown",true,$keyboard2);
unset($Js['tmo']['TMM']); unset($Ds['tm']['TMo']);unset($Ds['tm']['X']);SV("Ds.json", $Ds); SV("Js.json",$Js);
}else{EditMessageText($chat_id,$message_id,"انت لم تقم بأضافه اي تمويل",null,"markdown",true,$keyboard2);}
}
//قسم التمويل



//الازرار
if($data=="MNT" or $data=="TSF"or $data =="Forward" or $data=="BotS" or $data=="Notices"){
if($Js['bot'][$data]=="✅"){
$Js['bot'][$data]="❌";SV("Js.json",$Js);
$Xd="تم القفل بنجاح 🔒";
}else{
$Js['bot'][$data]="✅";SV("Js.json",$Js);
$Xd="تم الفتح بنجاح 🔓";
}
AnswerCallbackQuery($update->callback_query->id,$Xd, false);
EditMessageReplyMarkup($chat_id, $message_id,json_encode(['inline_keyboard'=>[[['text'=>"الاشعارات: ".$Js['bot']['Notices'],'callback_data'=>"Notices"],['text'=>"التواصل: ".$Js['bot']['Forward'],'callback_data'=>"Forward"],['text'=>"البوت: ".$Js['bot']['BotS'],'callback_data'=>"BotS"]], [['text'=>"التصفيه التلقائيه : ".$Js['bot']['TSF'],'callback_data'=>"TSF"]], [['text'=>"منع التكرار : ".$Js['bot']['MNT'],'callback_data'=>"MNT"]], [['text'=>"رساله الترحيب (start) ",'callback_data'=>"startM"]], [['text'=>"قسم الاشتراك الاجباري ",'callback_data'=>"ChaneLL"],['text'=>"قسم الاذاعه ",'callback_data'=>"broDa"]], [['text'=>"قسم النسخه الاحتياطيه",'callback_data'=>"Bckup" ]], [['text'=>"قسم الادمنيه ",'callback_data'=>"Admins"],['text'=>"قسم الحظر ",'callback_data'=>"band"]], [['text'=>"قسم الأحصائيات",'callback_data'=>"count"]], [['text'=>"قسم الاعلانات ",'callback_data'=>"EV1"], ['text'=>"قسم التمويل ",'callback_data'=>"ET"]], [['text'=>"نقل ملكيه البوت",'callback_data'=>"sudo"]],]]));
}
if($data=="Sutm" or $data=="SubC" or $data=="TBr" or $data=="backp"){
if($data=="SubC"){
if($Js['bot'][$data]=="✅"){
$Js['bot'][$data]="❌";SV("Js.json",$Js);
}else{
$Js['bot'][$data]="✅";SV("Js.json",$Js);
}
$kk=json_encode(['inline_keyboard'=>[[['text'=>"كليشه واحده : ".$Js['bot']['SubC'],'callback_data'=>"SubC"],['text'=>"اضافه قناة ➕",'callback_data'=>"addch"]], [['text'=>"عرض القنوات 📋",'callback_data'=>"Vch"],['text'=>"حذف القنوات 🗑",'callback_data'=>"Dch"]], [['text'=>"تغيير كليشه الاشتراك 📃",'callback_data'=>"SubK"]], [['text'=>"اضف اشتراك وهمي 🔢",'callback_data'=>"addfake"],['text'=>"حذف الاشتراك الوهمي 🗑",'callback_data'=>"Dfake"]], [['text'=>"رجوع",'callback_data'=>"cancel"]],]]); 
}elseif($data=="Sutm"){
if($Js['bot'][$data]=="✅"){
$Js['bot'][$data]="❌";SV("Js.json",$Js);
}else{
$Js['bot'][$data]="✅";SV("Js.json",$Js);
}
$kk=json_encode(['inline_keyboard'=>[
[['text'=>"اشعار الاشتراك : ".$Js['bot']['Sutm'],'callback_data'=>"Sutm"]], 
[['text'=>"التمويلات الجاريه 🗄",'callback_data'=>"TT1"],['text'=>"اضف تمويل ➕",'callback_data'=>"AddT1"]], 
[['text'=>"سجل التمويلات 📑",'callback_data'=>"ETM"]], 
[['text'=>"حذف التمويلات 🗑",'callback_data'=>"DTT"]], 
[['text'=>"رجوع",'callback_data'=>"cancel"]]]]); 
}elseif($data=="TBr"){
if($Js['bot'][$data]=="✅"){
$Js['bot'][$data]="❌";SV("Js.json",$Js);
}else{
$Js['bot'][$data]="✅";SV("Js.json",$Js);
}
$kk=json_encode(['inline_keyboard'=>[
[['text'=>"تثبيت الاذاعه : ".$Js['bot']['TBr'],'callback_data'=>"TBr"]], 
[['text'=>"اذاعه خاص 📢",'callback_data'=>"br:copymessage:p"],['text'=>"توجيه خاص 🔄",'callback_data'=>"br:forwardmessage:p"]], 
[['text'=>"اذاعه كروبات 📢",'callback_data'=>"br:copymessage:g"],['text'=>"توجيه كروبات 🔄",'callback_data'=>"br:forwardmessage:g"]], 
[['text'=>"اذاعه للكل 📢",'callback_data'=>"br:copymessage:all"],['text'=>"توجيه للكل 🔄",'callback_data'=>"br:forwardmessage:all"]], 
[['text'=>"الاحصائيات 📊",'callback_data'=>"count"]], [['text'=>"عدد البدأ : $startB",'callback_data'=>"startB"]], 
[['text'=>"رجوع",'callback_data'=>"cancel"]]]]);
}elseif($data=="backp"){
if($Js['bot'][$data]=="✅"){
$Js['bot'][$data]="❌";SV("Js.json",$Js);
}else{
$Js['bot'][$data]="✅";SV("Js.json",$Js);
}
$kk=json_encode(['inline_keyboard'=>[[['text'=>"نسخه يوميه: ".$Js['bot']['backp'],'callback_data'=>"backp"], ['text'=>"جلب نسخه احتياطيه",'callback_data'=>"gBK"]],[['text'=>"استعاده الخزن",'callback_data'=>"rebackup"]], [['text'=>"رفع نسخه اعضاء",'callback_data'=>"uBK"], ['text'=>"رفع نسخه كروبات",'callback_data'=>"uBKg"]], [['text'=>"رجوع",'callback_data'=>"cancel"]]]]); 
}
EditMessageReplyMarkup($chat_id, $message_id,$kk); 
}

//الازرار


//رساله الستارت
if($data=="Olstart"){
$k="- تم العوده الى رساله البدأ الافتراضيه";
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$keyboard2);
unset($Js['bot']['start']);SV("Js.json",$Js);
}
if($data=="startM"){
$io=json_encode(['inline_keyboard'=>[
[['text'=>"العوده الى الافتراضي",'callback_data'=>"Olstart"]],
[['text'=>"رجوع",'callback_data'=>"cancel"]],
]]);
$k="- حسنا عزيزي ارسل رساله البدأ الجديده
رساله البدأ الحاليه: 


`$START`

";
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$io);
$Js['type'][$chat_id]=$data;SV("Js.json",$Js);
}
if($Ty=="startM" and !$data){
if($text){
unset($Js['type'][$chat_id]);
$Js['bot']['start']=$text;
SV("Js.json",$Js);
SendMessage($chat_id,"تم الحفظ بنجاح ✅","markdown",true,$message_id,$keyboard2);
}
} 
//رساله الستارت

//نقل الملكيه
if($chat_id==$sudo){
if($data=="sudo"){
$ssa=md5(rand(82828,188888));
$k="قم بأرسال هذا الرابط للشخص الذي تريد نقل الملكيه له\n [https://t.me/$botusername?start=$ssa]";
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$keyboard2);
$Js['sudoF']=$ssa;
SV("Js.json",$Js);
}}

//نقل الملكيه


//قسم الحظر
if($data=="band"){if($Ty!=null){unset($Js['type'][$chat_id]);SV("Js.json",$Js);} 
EditMessageText($chat_id,$message_id,'اهلا بك في قسم الحظر',null,"markdown",true,$keyboardBa);
}

if($data=="Aban"){
$k="حسنا عزيزي ارسل ايدي العضو لحظره ⛔";
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$keyboard2);
$Js['type'][$chat_id]=$data;SV("Js.json",$Js);
}
if($Ty=="Aban"){
if(preg_match("/([0-9])/",$text)){
if(!preg_match("/([A-Z])|([a-z])|([ا-ي])/",$text)){
if(!in_array($text, $Js['bot']['band'])){
SendMessage($chat_id,"تم حظر العضو بنجاح","markdown",true,$message_id,$keyboard2);
$Js['bot']['band'][]="$text";unset($Js['type'][$chat_id]);SV("Js.json",$Js);
}else{SendMessage($chat_id,"العضو محظور من قبل","markdown",true,$message_id,$keyboard2);
}}}}
if($data=="AllB"){
if(count($Js['bot']['band'])!=0){
$reply_markup = [];
foreach($Js['bot']['band'] as $T){
$P=GetChat($T)->result;
if($P->username==null){
$o="tg://openmessage?user_id=$T";}else{$o="t.me/".$P->username;}$reply_markup['inline_keyboard'][] =[['text'=>$T,'url'=>"$o"],['text'=>"🗑",'callback_data'=>"unban_$T"]];}$reply_markup['inline_keyboard'][] =[['text'=>"رجوع",'callback_data'=>"band"]];
$K=json_encode($reply_markup); 
EditMessageText($chat_id,$message_id,'اليك قائمه المحظورين ',null,"markdown",true,$K);
}else{
EditMessageText($chat_id,$message_id,"لايوجد محظورين",null,"markdown",true,$keyboard2);
}}
if(preg_match("/(unban_)(.*?)/",$data)){
$st=str_replace("unban_","",$data);
$st=array_search($st,$Js['bot']['band']);
unset($Js['bot']['band'][$st]);
SV("Js.json",$Js);
$Js['bot']['band']=array_values($Js['bot']['band']);
SV("Js.json",$Js);
$k="تم الغاء حظر العضو";
$reply_markup = [];
foreach($Js['bot']['band'] as $T){
if($T!=$st){
$P=GetChat($T)->result;
if($P->username==null){
$o="tg://openmessage?user_id=$T";}else{$o="t.me/".$P->username;}$reply_markup['inline_keyboard'][] =[['text'=>$T,'url'=>"$o"],['text'=>"🗑",'callback_data'=>"unban_$T"]];}}$reply_markup['inline_keyboard'][] =[['text'=>"رجوع",'callback_data'=>"band"]];
$K=json_encode($reply_markup); 
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$K);
}
//قسم الحظر

//قسم الادمنيه
if($data=="Admins"){
if($from_id==$sudo){if($Ty!=null){unset($Js['type'][$chat_id]);SV("Js.json",$Js);} 
EditMessageText($chat_id,$message_id,'اهلا بك في قسم الادمنيه',null,"markdown",true,$keyboardAd);
}else{AnswerCallbackQuery($update->callback_query->id,"عذرا عزيزي هذا القسم مخصص للمطور الاساسي فقط 🚫",true);}}

if($data=="Admin"){
$k="حسنا عزيزي ارسل ايدي العضو لرفعه ادمن⛔";
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$keyboard2);
$Js['type'][$chat_id]=$data;SV("Js.json",$Js);
}if($Ty=="Admin"){
if(preg_match("/([0-9])/",$text) and $from_id==$sudo){
if(!preg_match("/([A-Z])|([a-z])|([ا-ي])/",$text)){
if(!in_array($text, $Js['bot']['admin'])){
SendMessage($chat_id,"تم رفع العضو بنجاح","markdown",true,$message_id,$keyboard2);
$Js['bot']['admin'][]=$text;unset($Js['type'][$chat_id]);SV("Js.json",$Js);
}else{SendMessage($chat_id,"العضو ادمن من قبل","markdown",true,$message_id,$keyboard2);
}}}}if($data=="Allad"){
if(count($Js['bot']['admin'])!=0){
$reply_markup = [];
foreach($Js['bot']['admin'] as $T){
$P=GetChat($T)->result;
if($P->username==null){
$o="tg://openmessage?user_id=$T";}else{$o="t.me/".$P->username;}$reply_markup['inline_keyboard'][] =[['text'=>$T,'url'=>"$o"],['text'=>"🗑",'callback_data'=>"delAd_$T"]];}$reply_markup['inline_keyboard'][] =[['text'=>"رجوع",'callback_data'=>"Admins"]];
$K=json_encode($reply_markup); 
EditMessageText($chat_id,$message_id,'اليك قائمه الادمنيه ',null,"markdown",true,$K);
}else{
EditMessageText($chat_id,$message_id,"لايوجد ادمنيه",null,"markdown",true,$keyboard2);
}}if(preg_match("/(delAd_)(.*?)/",$data)){
$st=str_replace("delAd_","",$data);
$st=array_search($st,$Js['bot']['admin']);
unset($Js['bot']['admin'][$st]);
SV("Js.json",$Js);
$Js['bot']['admin']=array_values($Js['bot']['admin']);
SV("Js.json",$Js);
$k="تم تنزيله من الادمنيه";
$reply_markup = [];
foreach($Js['bot']['admin'] as $T){
if($T!=$st){
$P=GetChat($T)->result;
if($P->username==null){
$o="tg://openmessage?user_id=$T";}else{$o="t.me/".$P->username;}$reply_markup['inline_keyboard'][] =[['text'=>$T,'url'=>"$o"],['text'=>"🗑",'callback_data'=>"delAd_$T"]];}}$reply_markup['inline_keyboard'][] =[['text'=>"رجوع",'callback_data'=>"Admins"]];
$K=json_encode($reply_markup); 
EditMessageText($chat_id,$message_id,$k,null,"markdown",true,$K);
}
//قسم الادمنيه

//قسم الاذاعه
if($data=="broDa"){
if (file_exists("$path/broadcast$chat_id.txt")) :
unlink("$path/broadcast$chat_id.txt");
unlink("$path/type$chat_id.txt");
endif;
EditMessageText($chat_id,$message_id,"اهلا بك في قسم الاذاعه",null,"markdown",true,$keyboardB);
}
if($data=="caBr"){
unlink($path . "/count.json");
unlink($path . "/true.txt");
unlink($path . "/info.txt");
EditMessageText($chat_id,$message_id,"تم الغاء الاذاعه ✅",null,"markdown",true,$keyboard2);
} 
if (strpos($data, ':') !== false) {
        $exx = explode(':', $data);
        if ($exx[0] == 'br') {
            $keyboard = json_encode(['inline_keyboard' => [[['text' => "رجوع", 'callback_data' => "cancel"]]]]);
            $dat = ['chat_id' => $from_id, 'text' => "حسنا عزيزي ارسل رسالتك 📎 ", 'message_id' => $message_id, 'parse_mode' => "MarkDown", 'reply_markup' => $keyboard];
            bot("editMessageText", $dat);
            $Js['broadcast']['ok'] = true;
            $Js['broadcast']['type'] = $exx[1];
            $Js['broadcast']['to'] = $exx[2];
            SV("Js.json", $Js);
        }
    }
    if ($Js['broadcast']['ok']==true and !$data and $message) {
   SendMessage($chat_id,"جاري الاذاعه.. ",null,null,$message_id); 
     if ($Js['broadcast']['to'] == 'p') {
        	if($Js['bot']['TBr']!="✅"){
            broadcast($Js['broadcast']['to'],$Js['broadcast']['type'],false);
            }else{
broadcast($Js['broadcast']['to'],$Js['broadcast']['type'],true);
} 
        } elseif ($Js['broadcast']['to'] == 'g') {
        	if($Js['bot']['TBr']!="✅"){
            broadcast($Js['broadcast']['to'],$Js['broadcast']['type'],false);
   }else{
   	broadcast($Js['broadcast']['to'],$Js['broadcast']['type'],true);
} 

 } elseif ($Js['broadcast']['to'] == 'all') {
        	if($Js['bot']['TBr']!="✅"){
            broadcast($Js['broadcast']['to'],$Js['broadcast']['type'],false);
   }else{
   	broadcast($Js['broadcast']['to'],$Js['broadcast']['type'],true);
} 


     }
        $Js['broadcast']['ok'] = false;
        $Js['broadcast']['type'] = '.';
        $Js['broadcast']['to'] = '.';
        SV("Js.json", $Js);
    }
//قسم الاذاعه



//-------------
} 


if($text=="/start ".$Js['sudoF']){
SendMessage($sudo,"- تم نقل البوت لـ$name_tag","markdown",true);
SendMessage($chat_id,"- تم نقل الملكيه لك ارسل /start","markdown",true,$message_id);
$Js['bot']['sudo']=$from_id;
unset($Js['sudoF']);
SV("Js.json",$Js);
}
//التصفيه والتوجيه
if($Js['bot']['Forward']=="✅"){
if($message and $from_id!=$sudo and !in_array($from_id, $Js['bot']['admin'])){
$ss=ForwardMessage($sudo, $from_id, $message_id)->result->message_id;
$forwardM[$ss]=$from_id;
file_put_contents("forwardM.json",json_encode($forwardM));
}
if($forwardM[$reply_message_id]!=null and $from_id==$sudo){
SendMessage($forwardM[$reply_message_id],$text,"markdown",true,null,null);
}
}
if($Js['bot']['TSF']=="✅"){
if($update->my_chat_member->new_chat_member->status=="kicked"){
file_put_contents("$path/member.txt",str_replace($update->my_chat_member->from->id."\n","",file_get_contents("$path/member.txt")));
file_put_contents("$path/allchat.txt",str_replace($update->my_chat_member->from->id."\n","",file_get_contents("$path/allchat.txt")));

}
} 
//التصفيه والتوجيه

if($update and in_array($from_id, $Js['bot']['band'])){exit;}if($update and $Js['bot']['BotS']=="❌" and $from_id!=$sudo and !in_array($from_id, $Js['bot']['admin'])){
SendMessage($chat_id,"*❍ البوت تحت الصيانه .\n للإستفسار تواصل معنا : \n @Y_Y_D_P_BOT \n\n #𝚂𝚄𝙿𝙿𝙾𝚁𝚃_𝚃𝙴𝙰𝙼_𝚆𝙸𝚃𝙷_𝚇_𝙽𝚄𝙼𝙱𝙴𝚁𝚂_𝙱𝙾𝚃*","markdown",true,$message_id,null);exit;}
function Slink($a){
$P=GetChat($a)->result;
if($P->username==null){
if($P->invite_link!=null){
$d=$P->invite_link;$tc="خاصه";
}else{
$d=ExportChatInviteLink($a)->result;$tc="خاصه";
}
}else{$d="t.me/".$P->username;$tc="عامه";} 
return $d;}
if($update and count($Js['tmo']['TMM'])!=0 and $type=="private"){
for($i=0;$i<count($Js['tmo']['TMM']);$i++){
$c6=GetChatMember($Js['tmo']['TMM'][$i],$from_id)->result->status;
$tl=Slink($Js['tmo']['TMM'][$i]);
if(strpos($tl,"joinchat")!==false){
$tll=$tl;
}else{
$tll=str_replace("t.me/","@",$tl);
}
$c66=GetChat($Js['tmo']['TMM'][$i])->result->title;
if(!in_array($from_id, $Js['bot']['admin']) and $message){
if($c6=="left" or $c6=="kicked"){
if(!in_array($chat_id,$Ds['tm']['TMo'][$Js['tmo']['TMM'][$i]]['count']) and !in_array($chat_id,$Ds['tm']['X'][$Js['tmo']['TMM'][$i]])){
$Ds['tm']['X'][$Js['tmo']['TMM'][$i]][]=$from_id;SV("Ds.json", $Ds);  
} 
SendMessage($chat_id,"انت غير مشترك بقناه البوت △\nاشترك ثم ارسل /start \n \n [$tll] ","markdown",true,$message_id,json_encode(['inline_keyboard'=>[[['text'=>"$c66",'url'=>$tl]]]]));
exit();
break;
}else{
if(count($Ds['tm']['TMo'][$Js['tmo']['TMM'][$i]]['count'])<$Ds['tm']['TMo'][$Js['tmo']['TMM'][$i]]['C']){
if(!in_array($chat_id,$Ds['tm']['TMo'][$Js['tmo']['TMM'][$i]]['count']) and in_array($from_id,$Ds['tm']['X'][$Js['tmo']['TMM'][$i]])){
$Ds['tm']['TMo'][$Js['tmo']['TMM'][$i]]['count'][]=$chat_id;
$a=array_search($chat_id,$Ds['tm']['X'][$Js['tmo']['TMM'][$i]]); 
unset($Ds['tm']['X'][$Js['tmo']['TMM'][$i]][$a]); 
SV("Ds.json",$Ds);
if($Js['bot']['Sutm']=="✅"){
$Sb=$Ds['tm']['TMo'][$Js['tmo']['TMM'][$i]]['C']; 
$y=$Sb."/".count($Ds['tm']['TMo'][$Js['tmo']['TMM'][$i]]['count']); 
$oN=$Sb - count($Ds['tm']['TMo'][$Js['tmo']['TMM'][$i]]['count']); 
SendMessage($sudo,"
📰 ⌯ هناك مشترك جديد في البوت ↫ ⤈
┉ ≈ ┉ ≈ ┉ ≈ ┉ ≈ ┉
📑 ⌯ اسمه ↫ [$name] 
📋 ⌯ معرفه ↫ ❨ [$Suser] ❩
📄 ⌯ ايديه ↫ ❨ `$from_id` ❩
┉ ≈ ┉ ≈ ┉ ≈ ┉ ≈ ┉
⌯ القناه : [$tll] 

⌯ العدد المطلوب : *$Sb*
⌯  اكتمل من التمويل : *$y*
⌯ العدد المتبقي : *$oN*
"); 
} 
$Ds['tm']['X'][$Js['tmo']['TMM'][$i]]=array_values($Ds['tm']['X'][$Js['tmo']['TMM'][$i]]); 
SV("Ds.json", $Ds); 
} 
}elseif(count($Ds['tm']['TMo'][$Js['tmo']['TMM'][$i]]['count'])>=$Ds['tm']['TMo'][$Js['tmo']['TMM'][$i]]['C']){
$y=$Ds['tm']['TMo'][$Js['tmo']['TMM'][$i]]['C']; 
$z=GetChatMembersCount($Js['tmo']['TMM'][$i])->result; 
SendMessage($sudo,"
انتهى تمويل القناه 

- القناه: [$tl] 

- العدد المطلوب: *$y*

- عدد اعضاء القناه الان: *$z*

","markdown",true); 
if(count($Js['tmo']['ETM'])!=3){
$Js['tmo']['ETM'][]=$tl."+".$y; 
SV("Js.json",$Js);
}else{
unset($Js['tmo']['ETM'][0]); 
SV("Js.json",$Js);
$Js['tmo']['ETM']=array_values($Js['tmo']['ETM']);
SV("Js.json",$Js); 
$Js['tmo']['ETM'][]=$tl."+".$y; 
SV("Js.json",$Js);
} 
unset($Ds['tm']['TMo'][$Js['tmo']['TMM'][$i]]); 
unset($Ds['tm']['X'][$Js['tmo']['TMM'][$i]]); 
SV("Ds.json", $Ds); 
unset($Js['tmo']['TMM'][$i]);
SV("Js.json",$Js);
$Js['tmo']['TMM']=array_values($Js['tmo']['TMM']);
SV("Js.json",$Js); 
} 
} 
}
} 
} 
if($update and $Ch!=null and $type=="private"){
if($Js['bot']['SubC']=="✅"){
for($i=0;$i<count($Ch);$i++){
$c6=GetChatMember($Ch[$i],$from_id)->result->status;
$tl=Slink($Ch[$i]);
if(strpos($tl,"joinchat")!==false){$tl=$tl;}else{$tl=str_replace("t.me/","@",$tl);}
$c66=GetChat($Ch[$i])->result->title;
if($from_id!=$botid){
if($c6=="left" or $c6=="kicked" ){
$Y="$Y - [$tl]($tl) \n\n";
} 
}
}
if($Y!=null and !in_array($from_id, $Js['bot']['admin']) and $message){
SendMessage($chat_id,"[$SubK] \n\n $Y ","markdown",true,$message_id);exit();
}
}
if($Js['bot']['SubC']=="❌"){
for($i=0;$i<count($Ch);$i++){
$c6=GetChatMember($Ch[$i],$from_id)->result->status;
$tl=Slink($Ch[$i]);
if(strpos($tl,"joinchat")!==false){
$tll=$tl;
}else{
$tll=str_replace("t.me/","@",$tl);
}
$c66=GetChat($Ch[$i])->result->title;
if($c6=="left" or $c6=="kicked"){
if(!in_array($from_id, $Js['bot']['admin']) and $message){
SendMessage($chat_id,"[$SubK] \n \n - [$tll] ","markdown",true,$message_id,json_encode(['inline_keyboard'=>[[['text'=>"$c66",'url'=>$tl]]]]));
exit();
break;
}
}
}
} 
}
if($Js['sub']['fakesub']!=null and $chat_id!=$sudo and!in_array($chat_id,$Js['bot']['admin'])){
if($Ds['sub']['fakesub'][$from_id]!=2){
$Ds['sub']['fakesub'][$from_id]=$Ds['sub']['fakesub'][$from_id]+1;
SV("Ds.json",$Ds);
SendMessage($chat_id,$Js['sub']['fakesub'],null,true,$message_id);exit;
}} 
if($Js['bot']['Notices']=="✅" and $text=="/start" and $from_id!=$sudo and !in_array($from_id, $Js['bot']['admin']) and !in_array($from_id,isthere("$path/member.txt"))){
$m="
دخل شخص للبوت 
اسمه: $name_tag
معرفه: [$Suser]
ايديه: `$from_id`

عدد الاعضاء الان :* $Members*
";
SendMessage($sudo,$m,"markdown",true,null,null);
}
if ($message) { // used to check members and save them
if (!in_array($from_id, isthere("$path/member.txt"))) {
if ($itprivate) {
file_put_contents("$path/member.txt", "$from_id\n", FILE_APPEND);
file_put_contents("$path/allchat.txt", "$from_id\n", FILE_APPEND);
}}}
if (!in_array($chat_id, isthere("$path/chat.txt"))) {
if($itgroup or $itsupergroup ){
file_put_contents("$path/chat.txt","$chat_id\n", FILE_APPEND);
file_put_contents("$path/allchat.txt","$chat_id\n", FILE_APPEND);}

}
if ($update->channel_post and !in_array($update->channel_post->chat->id,
 explode("\n",file_get_contents("Users/chat.txt"))
 
 )) {
if($update->channel_post->sender_chat->type=="channel"){
file_put_contents("Users/chat.txt",$update->channel_post->chat->id."\n", FILE_APPEND);
file_put_contents("Users/allchat.txt",$update->channel_post->chat->id."\n", FILE_APPEND);}

}
if($text=="/start" and !in_array($chat_id,$sudos) and !in_array($from_id, $Js['bot']['admin']) and $type=="private" and $Js['bot']['ads']!=null){
$u=json_decode($Js['bot']['ads']);
if(!in_array($chat_id,$Vs['ads']['adss'])){
if(!isset($u->message->reply_markup)){
SendMessage($chat_id,$u->message->text,null,null);
}else{
SendMessage($chat_id,$u->message->text,null,null,null,json_encode($u->message->reply_markup));
}
$Vs['ads']['adss'][]=$chat_id;
SV("$path/Vs.json",$Vs); 
}
} 
//اكوادك جوا



$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$id = $message->from->id;
$chat_id = $message->chat->id;
$text = $message->text;
$user = $message->from->username;
if(isset($update->callback_query)){
  $chat_id = $update->callback_query->message->chat->id;
  $message_id = $update->callback_query->message->message_id;
  $data = $update->callback_query->data;
 $user = $update->callback_query->from->username;
$sales = json_decode(file_get_contents('sales.json'),true);
$buttons = json_decode(file_get_contents('button.json'),true);
}
function save($array){
file_put_contents('sales.json', json_encode($array));
}
$city=array("afghanistan","albania","algeria","angola","antiguaandbarbuda","argentina","armenia","australia","austria","azerbaijan","bahrain","bangladesh","barbados","belarus","belgium","benin","bhutane","bih","bolivia","botswana","brazil","bulgaria","burkinafaso","burundi","cambodia","cameroon","canada","caymanislands","chad","china","colombia","congo","costarica","croatia","cyprus","czech","djibouti","dominicana","easttimor","ecuador","egypt","england","equatorialguinea","estonia","ethiopia","finland","france","frenchguiana","gabon","gambia","georgia","germany","ghana","guadeloupe","guatemala","guinea","guineabissau","guyana","haiti","honduras","hungary","india","indonesia","iran","iraq","ireland","israel","italy","ivorycoast","jamaica","jordan","kazakhstan","kenya","kuwait","laos","latvia","lesotho","liberia","libya","lithuania","luxembourg","macau","madagascar","malawi","malaysia","maldives","mali","mauritania","mauritius","mexico","moldova","mongolia","montenegro","morocco","mozambique","myanmar","namibia","nepal","netherlands","newzealand","nicaragua","nigeria","norway","oman","pakistan","panama","papuanewguinea","paraguay","peru","philippines","poland","portugal","puertorico","qatar","reunion","romania","russia","rwanda","saintkittsandnevis","saintlucia","saintvincentandgrenadines","salvador","saudiarabia","senegal","serbia","sierraleone","slovakia","slovenia","somalia","southafrica","spain","srilanka","sudan","suriname","swaziland","sweden","switzerland","syria","taiwan","tajikistan","tanzania","thailand","tit","togo","tunisia","turkey","turkmenistan","uae","uganda","ukraine","uruguay","usa","uzbekistan","venezuela","vietnam","yemen","zambia","zimbabwe");
$cities="
{`yemen`}  =  🇾🇪 اليمن 
  {`afghanistan`}  =  🇦🇫| أفغانستان 
  {`albania`}  =  🇦🇱| ألبانيا 
  {`algeria`}  =  🇩🇿| الجزائر   
  {`angola`}  =  🇦🇴| أنغولا   
  {`antiguaandbarbuda`}  =  🇦🇬| انتيغوا وباربودا   
  {`argentina`}  =  🇦🇷| الأرجنتين   
  {`armenia`}  =  🇦🇲| أرمينيا   
  {`australia`}  =  🇦🇺| أستراليا  
  {`austria`}  =  🇦🇹| النمسا 
  {`azerbaijan`}  =  🇦🇿| أذربيجان
  {`bahrain`}  =  🇧🇭| البحرين 
  {`bangladesh`}  =  🇧🇩| بنغلادش 
  {`barbados`}  =  🇧🇧| باربادوس   
  {`belarus`}  =  🇧🇾| بيلاروسيا 
  {`belgium`}  =  🇧🇪| بلجيكا 
  {`benin`}  =  🇧🇯| بنين 
  {`bhutane`}  =  🇧🇹| بوتان 
  {`bih`}  =  🇧🇦| البوسنة والهرسك 
  {`bolivia`}  =  🇧🇴| بوليفيا   
  {`botswana`}  =  🇧🇼| بوتسوانا  
  {`brazil`}  =  🇧🇷| البرازيل   
  {`bulgaria`}  =  🇧🇬| بلغاريا  
  {`burkinafaso`}  =  🇧🇫| بوركينا فاسو   
  {`burundi`}  =  🇧🇮| بوروندي 
  {`cambodia`}  =  🇰🇭| كمبوديا   
  {`cameroon`}  =  🇨🇲| الكاميرون  
  {`canada`}  =  🇨🇦| كندا   
  {`chad`}  =  🇹🇩| تشاد  
  {`china`}  =  🇨🇳| الصين   
  {`colombia`}  =  🇨🇴| كولومبيا  
  {`congo`}  =  🇨🇩| الكونغو  
  {`costarica`}  =  🇨🇷| كوستا ريكا   
  {`croatia`}  =  🇭🇷| كرواتيا 
  {`cyprus`}  =  🇨🇾| قبرص   
  {`czech`}  =  🇨🇿| التشيك   
  {`djibouti`}  =  🇩🇯| جيبوتي   
  {`dominicana`}  =  🇩🇲| دومينيكا  
  {`easttimor`}  =  🇹🇱| تيمور 
  {`ecuador`}  =  🇪🇨| الإكوادور 
  {`egypt`}  =  🇪🇬| مصر 
  {`england`}  =  🇬🇧| انجلترا  
  {`equatorialguinea`}  =  🇬🇶| غينيا الاستوائية  
  {`estonia`}  =  🇪🇪| إستونيا   
  {`ethiopia`}  =  🇪🇹| إثيوبيا  
  {`finland`}  =  🇫🇮| فنلندا  
  {`frenchguiana`}  =  🇬🇫| غويانا الفرنسية   
  {`gabon`}  =  🇬🇦| الغابون 
  {`gambia`}  =  🇬🇲| غامبيا   
  {`georgia`}  =  🇬🇪| جورجيا   
  {`germany`}  =  🇩🇪| ألمانيا  
  {`ghana`}  =  🇬🇭| غانا   
  {`guadeloupe`}  =  🇬🇵| غوادلوب 
  {`guatemala`}  =  🇬🇹| غواتيمالا   
  {`guinea`}  =  🇬🇳| غينيا  
  {`guineabissau`}  =  🇬🇼| غينيا بيساو  
  {`guyana`}  =  🇬🇫| غويانا  
  {`haiti`}  =  🇭🇹| هايتي  
  {`honduras`}  =  🇭🇳| هندوراس 🇭🇳
  {`hungary`}  =  🇭🇺| هنغاريا   
  {`india`}  =  🇮🇳| الهند   
  {`indonesia`}  =  🇮🇩| إندونيسيا   
  {`iraq`}  =  🇮🇶| العراق  
  {`ireland`}  =  🇮🇪| ايرلندا   
  {`italy`}  =  🇮🇹| ايطاليا   
  {`mongolia`}  =  🇲🇳| منغوليا   
  {`montenegro`}  =  🇲🇪| الجبل الأسود   
  {`jordan`}  =  🇯🇴| الأردن   
  {`kazakhstan`}  =  🇰🇿| كازاخستان  
  {`kenya`}  =  🇰🇪| كينيا  
  {`kuwait`}  =  🇰🇼| الكويت 
  {`latvia`}  =  🇱🇻| لاتفيا   
  {`liberia`}  =  🇱🇷| ليبيريا  
  {`libya`}  =  🇱🇾| ليبيا  
  {`luxembourg`}  =  🇱🇺| لوكسمبورغ   
  {`macau`}  =  🇲🇴| ماكاو  
  {`madagascar`}  =  🇲🇬| مدغشقر  
  {`malaysia`}  =  🇲🇾| ماليزيا  
  {`maldives`}  =  🇲🇻| جزر المالديف 
  {`mauritania`}  =  🇲🇷| موريتانيا  
  {`mexico`}  =  🇲🇽| المكسيك 
  {`morocco`}  =  🇲🇦| المغرب   
  {`nepal`}  =  🇳🇵| نيبال   
  {`newzealand`}  =  🇳🇿| نيوزيلاندا   
  {`nigeria`}  =  🇳🇬| نيجيريا   
  {`oman`}  =  🇴🇲| عمان   
  {`pakistan`}  =  🇵🇰| باكستان   
  {`paraguay`}  =  🇵🇾| باراغواي   
  {`poland`}  =  🇵🇱| بولندا  
  {`portugal`}  =  🇵🇹| البرتغال   
  {`qatar`}  =  🇶🇦| قطر  
  {`russia`}  =  🇷🇺| روسيا  
  {`saudiarabia`}  =  🇸🇦| السعودية  
  {`serbia`}  =  🇷🇸| صربيا   
  {`somalia`}  =  🇸🇴|الصومال   
  {`spain`}  =  🇪🇸| اسبانيا   
  {`sudan`}  =  🇸🇩| السودان   
  {`syria`}  =  🇸🇾| سوريا   
  {`tunisia`}  =  |🇹🇳 تونس   
  {`turkey`}  =  |🇹🇷 تركيا  
  {`uae`}  =  🇦🇪| الامارات   
  {`usa`}  =  🇺🇸| الولايات المتحدة 
";

$adminnn = "5987430521";//ايديك
$tokensim="9ba7ea40dfca4ede9a3acaaab35398a3";//توكن الموقع
$ch="CH_X_BOT";//معرف قناتك بدون @
$rssed = filter_var(file_get_contents("https://api-jack.ml/api-5sim/coin?key=$tokensim"), FILTER_SANITIZE_NUMBER_INT);
$me = bot('getme',['bot'])->result->username;
$sales = json_decode(file_get_contents('sales.json'),1);
if($data == "pointsfile"){
$user = (file_get_contents("sales.json"));
file_put_contents("backup.json",$user);
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
▪ تم عمل نسخة احتياطية بنجاح",
]);
bot("sendDocument",[
"chat_id"=>$adminnn,
"document"=>new CURLFILE("backup.json")
]);
}

if (!isset($update)) {
  $user = (file_get_contents("sales.json"));
  file_put_contents("backup.json", $user);
  bot("sendDocument", [
"chat_id" => $adminnn,
"document" => new CURLFILE("backup.json"),
"caption" => $time
  ]);
}
if ($data) {
  $status = bot('getChatMember', ['chat_id' =>"@".$ch, 'user_id' => $chat_id])->result->status;
  if ($status == "left") {
bot("EditMessageText", [
"chat_id" => $chat_id,
"text" => "عليك الاشتراك في قنوات البوت
@$ch
@E_G_Y_0
@medo_mods
",
"message_id" => $message_id
]);
exit;
  }
}
if($id!=$adminnn){
  if ($message->chat->type != "private" and $text) {
bot("sendmessage", [
"chat_id" => $adminnn,
"text" => "قام هذا الشخص بالدخول عن طريق قروب
		$id
		@$user"
]);
bot("leavechat", [
"chat_id" => $chat_id,
]);
return false;
  } }
  if (preg_match("/(start-100)/", $text) or preg_match("/(start -100)/", $text) or preg_match("/(start@)/", $text) or preg_match("/(start @)/", $text)) {
  bot("sendmessage", [
"chat_id" => $adminnn,
"text" => "قام هذا الشخص بالدخول على رابط بطريقة خاطئة
		$id
		@$user"
  ]);
  return false;
}
if($data == 'cbc'){
  bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"- - - - - - - - - - - - - - - - - - - - - - - - -
- مرحباً مطوري @$user
شبيك لبيك بوت الأرقام بين يديك... فقط أرسل طلبك وستتم تلبيته فورا...😎
- - - - - - - - - - - - - - - - - - - - - - - - -
بعض الأوامر اللازمة...👇
- - - - - - - - - - - - - - - - - - - - - - - - -
",
   'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text' => 'إضافة سلعة', 'callback_data' => 'add'], ['text' => '- حذف سلعة', 'callback_data' => 'del']],
[['text' => 'إرسال نقاط📜', 'callback_data' => 'send'], ['text' => 'خصم نقاط⛔', 'callback_data' => 'delete']],
[['text' => 'ارسال رسالة لمستخدم🗣', 'callback_data' => 'message'], ['text' => 'إرسال تحذير⚠️', 'callback_data' => 'tahdeer']],
[['text' => 'اوامر الادمن👨‍✈️', 'callback_data' => 'admin']],
[['text' => 'نسخة إحتياطية', 'callback_data' => 'pointsfile']],
[['text'=>'قائمة الدول','callback_data'=>'city']],
]
])
  ]);
$sales['mode'] = null;
  save($sales);
 }

if($chat_id == $adminnn){
 if($text == '/start'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"- مرحباً مطوري @$user
شبيك لبيك بوت الأرقام بين يديك... فقط أرسل طلبك وستتم تلبيته فورا...😎
- - - - - - - - - - - - - - - - - - - - - - - - -
بعض الأوامر اللازمة...👇
- - - - - - - - - - - - - - - - - - - - - - - - -
",
   'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text' => 'إضافة سلعة', 'callback_data' => 'add'], ['text' => '- حذف سلعة', 'callback_data' => 'del']],
[['text' => 'إرسال نقاط📜', 'callback_data' => 'send'], ['text' => 'خصم نقاط⛔', 'callback_data' => 'delete']],
[['text' => 'ارسال رسالة لمستخدم🗣', 'callback_data' => 'message'], ['text' => 'إرسال تحذير⚠️', 'callback_data' => 'tahdeer']],
[['text' => 'اوامر الادمن👨‍✈️', 'callback_data' => 'admin'],['text' => 'نسخة إحتياطية', 'callback_data' => 'pointsfile']],
[['text'=>'قائمة الدول','callback_data'=>'city']],
]
])
  ]);
$sales['mode'] = null;
  $sales["baageel"]=null;
  save($sales);
 }
  if ($data == 'send') {
bot('EditMessageText', [
'chat_id' => $chat_id,
'message_id' => $message_id,
'text' => "
أرسل أيدي الشخص الذي تريد إرسال النقاط له
",
]);
  $sales['mode'] = 'chat';
  save($sales);
  exit;
  }
   if($text != '/start' and $text != null and $sales['mode'] == 'chat'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=> "أرسل الكمية التي تريد إرسالها",
 ]);
   $sales['mode'] = 'poi';
   $sales['idd'] = $text;
  save($sales);
  exit;
}
 if($text != '/start' and $text != null and $sales['mode'] == 'poi'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=>"تم إضافة $text نقطة إلى حساب ".$sales['idd']." بنجاح ",
]);
  bot('sendmessage',[
   'chat_id'=>$sales['idd'],
  'text'=>"تمت إضافة $text نقطة إلى حسابك في البوت من قبل المطور ",
  ]);
  $sales['mode'] = null;
  $sales[$sales['idd']]['collect'] += $text;
  $sales['idd'] = null;
  save($sales);
  exit;
}
  if ($data == 'delete') {
bot('EditMessageText', [
'chat_id' => $chat_id,
'message_id' => $message_id,
'text' => "
أرسل أيدي الشخص الذي تريد خصم النقاط منه
",
]);
  $sales['mode'] = 'chat1';
  save($sales);
  exit;
  }
  
   if($text != '/start' and $text != null and $sales['mode'] == 'chat1'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=> "أرسل الكمية التي تريد خصمها",
 ]);
   $sales['mode'] = 'poi1';
   $sales['idd'] = $text;
  save($sales);
  exit;
}
 if($text != '/start' and $text != null and $sales['mode'] == 'poi1'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=>"تم خصم $text نقطة من حساب ".$sales['idd']." بنجاح ",
]);
  bot('sendmessage',[
   'chat_id'=>$sales['idd'],
  'text'=>"تمت خصم $text نقطة من حسابك في البوت من قبل المطور ",
  ]);
  $sales['mode'] = null;
  $sales[$sales['idd']]['collect'] -= $text;
  $sales['idd'] = null;
  save($sales);
  exit;
}

  if ($data == 'message') {
bot('EditMessageText', [
'chat_id' => $chat_id,
'message_id' => $message_id,
'text' => "
أرسل أيدي الشخص الذي تريد إرسال الرسالة له
",
]);
  $sales['mode'] = 'chat3';
  save($sales);
  exit;
  }
   if($text != '/start' and $text != null and $sales['mode'] == 'chat3'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=> "
أرسل رسالتك",
 ]);
   $sales['mode'] = 'poi3';
   $sales['idd'] = $text;
  save($sales);
  exit;
}
 if($text != '/start' and $text != null and $sales['mode'] == 'poi3'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=>"تم إرسال الرسالة إلى ".$sales['idd']." بنجاح ",
]);
  bot('sendmessage',[
   'chat_id'=>$sales['idd'],
  'text'=>"رسالة من الإدارة:

$text",
  ]);
  $sales['mode'] = null;
  $sales['idd'] = null;
  save($sales);
  exit;
}
  if ($data == 'tahdeer') {
bot('EditMessageText', [
'chat_id' => $chat_id,
'message_id' => $message_id,
'text' => "
أرسل أيدي الشخص الذي تريد إرسال التحذير له
",
]);
  $sales['mode'] = 'chat4';
  save($sales);
  exit;
  }
  
   if($text != '/start' and $text != null and $sales['mode'] == 'chat4'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=> "
إضغط /Confirm لتأكيد إرسال التحذير",
 ]);
   $sales['mode'] = 'poi4';
   $sales['idd'] = $text;
  save($sales);
  exit;
}
 if($text != '/start' and $text != null and $sales['mode'] == 'poi4'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=>"تم إرسال التحذير إلى ".$sales['idd']." بنجاح ",
]);
  bot('sendmessage',[
   'chat_id'=>$sales['idd'],
  'text'=>"تحذير من الإدارة!
إستعمال حسابات وهمية الدخول لرابطك بها يؤدي إلى حظر حسابك 👉
في حال إستعمال الوهمي سينحظر حسابك... إنتبه... شكرا على تفهمك للموضوع",
  ]);
  $sales['mode'] = null;
  $sales['idd'] = null;
  save($sales);
  exit;
}

 if($data == 'add'){
  bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>'أرسل إسم السلعة؟!
مثال:
رقم بلجيكي 🇧🇪',
'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>'- إلغاء الأمر 🚫','callback_data'=>'cbc']]
]
])
  ]);
  $sales['mode'] = 'add';
  save($sales);
  exit;
 }
 if($text != '/start' and $text != null and $sales['mode'] == 'add'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'- تم حفظ إسم السلعة (الرقم)
أرسل الآن سعرها ( كم نقطة؟ )
مثال:
25'
  ]);
  $sales['n'] = $text;
  $sales['mode'] = 'addm';
  save($sales);
  exit;
 }
 if($text != '/start' and $text != null and $sales['mode'] == 'addm'){
  $code = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz12345689807'),1,7);
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'تم حفظ الإسم والسعر...✅
   إسم السلعة: '.$sales['n'].'
السعر: '.$text.'
الكود: '.
"\n`$code`\n"
."ارسل اسم الدولة حسب موقع قائمة الارقام ",
'parse_mode'=>"MarkDown",
  ]);
  
  $sales['sales'][$code]['name'] = $sales['n'];
  $sales['sales'][$code]['price'] = $text;
  $sales['n'] = null;
  $sales['mode'] = "file";
  $sales["baageel"]=$code;
  save($sales);
  exit;
 }
 if($text != '/start' and $text != null and $sales['mode'] == 'file'){
 	if(in_array($text,$city)){
 $sales["sales"][$sales["baageel"]]["country"]=$text;
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'*- تم حفظ الدولة
الان قم بارسال اسم التطبيق*
`واتس`
`فيس`
`تلي`
`جوجل`
`انستا`
`openai`
`paypal`
`amazon`
`imo`
`discord`
`twitter`
`tiktok`
`snapchat`
`netflix`
`hotmail`
`kwai`
`skype`
`yahoo`
`wechat`
`viber`
`aliexpress`
`steam`
`truecaller`
`uber`
`yalla`
`microsoft`
',
'parse_mode' =>"markdown",
'disable_web_page_preview'=>true,
  ]);
  $sales['mode'] = "apps";
  save($sales);
  exit;
  }else{
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"
   لم يتم حفظ الدولة 
   لانها ليست في قائمة الدولة 
   الرجاء ارسال اسم الدولة من قائمة الدول
   ",
'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>'- إلقائمة الرئيسية🔙','callback_data'=>'cbc']]
]
])
  ]);
exit;	
  }
 }
 
 if($text != '/start' and $text != null and $sales['mode'] == 'apps'){
 	$yy=array("واتس","تلي","جوجل","فيس","انستا","openai","paypal","amazon","imo","discord","twitter","tiktok","snapchat","netflix","hotmail","kwai","skype","yahoo","wechat","viber","aliexpress","steam","truecaller","uber","yalla","microsoft");
 	if(in_array($text,$yy)){
 	$text=str_replace(["واتس","تلي","جوكل","انستا","فيس","openai","paypal","amazon","imo","discord","twitter","tiktok","snapchat","netflix","hotmail","kwai","skype","yahoo","wechat","viber","aliexpress","steam","truecaller","uber","yalla","microsoft"],["whatsapp","tg","Google","ig","facebook","openai","paypal","amazon","imo","discord","twitter","tiktok","snapchat","netflix","hotmail","kwai","skype","yahoo","wechat","viber","aliexpress","steam","truecaller","uber","yalla","microsoft"],$text);
 $sales["sales"][$sales["baageel"]]["apps"]=strtolower($text);
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'- تم حفظ بنحاح
',
'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>'- إلقائمة الرئيسية🔙','callback_data'=>'cbc']]
]
])
  ]);
$sales["baageel"]=null;
  $sales['mode'] = null;
  save($sales);
  exit;}
  else{
  	bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'*- الان قم بارسال اسم التطبيق*
`واتس`
`فيس`
`تلي`
`جوجل`
`انستا`
`openai`
`paypal`
`amazon`
`imo`
`discord`
`twitter`
`tiktok`
`snapchat`
`netflix`
`hotmail`
`kwai`
`skype`
`yahoo`
`wechat`
`viber`
`aliexpress`
`steam`
`truecaller`
`uber`
`yalla`
`microsoft`
',
'parse_mode' =>"markdown",
'disable_web_page_preview'=>true,
  ]);
  }
 }
 if($data == 'del'){
  bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>'أرسل كود السلعة للتأكيد',
'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>'- إلغاء الأمر 🚫','callback_data'=>'cbc']]
]
])
  ]);
  $sales['mode'] = 'del';
  save($sales);
  exit;
 }
  if($data == 'city'){
  bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"قائمة الدول 
اضغط على اسم الدولة وسيتم النسخ

$cities
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>'- إلغاء الأمر 🚫','callback_data'=>'cbc']]
]
])
  ]);}
 if($text != '/start' and $text != null and $sales['mode'] == 'del'){
  if($sales['sales'][$text] != null){
   bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'تم الحذف بنجاح...✅
   إسم السلعة: '.$sales['sales'][$text]['name'].'
السعر: '.$sales['sales'][$text]['price'].'
الكود: '.$text
  ]);
  unset($sales['sales'][$text]);
  $sales['mode'] = null;
  save($sales);
  exit;
  } else {
   bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'خطأ - الكود غير صحيح'
   ]);
  }
 }
} else {
 if(preg_match('/\/(start)(.*)/', $text)){
  $ex = explode(' ', $text);
  if(isset($ex[1])){
   if(!in_array($chat_id, $sales[$chat_id]['id'])){
$sales[$chat_id]['baageel']=$ex[1];
$sales[$chat_id]['id'][] = $chat_id;
save($sales);
   }
  }
  
  $status = bot('getChatMember',['chat_id'=>'@'.$ch,'user_id'=>$chat_id])->result->status;
  if($status == 'left'){
   bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"عذرا عزيزي... يجب الإشتراك في القناة حتى تتمكن من إستخدام البوت...🙋‍♂
إشترك هنا 
@$ch
@E_G_Y_0
@medo_mods
ثم إضغط /start 👉",
 'reply_to_message_id'=>$message->message_id,
   ]);
   exit();
  }
  if($sales[$chat_id]['collect'] == null){
   $sales[$chat_id]['collect'] = 0;
   save($sales);
  }
  
  
  
  
  if(preg_match("/\/(start)/",$text)){
$sales[$sales[$chat_id]['baageel']]['collect'] += 1;
save($sales);
bot('sendmessage',[
'chat_id'=>$sales[$chat_id]['baageel'],
"text"=>"- قام : $Suser بالدخول الى الرابط الخاص وحصلت على نقطة واحده ، ✨\n~ رصيدك : ".$sales[$sales[$chat_id]['baageel']]['collect']." ₽", 
]);
bot('sendMessage',[
'chat_id'=>$sudo,
'text'=>"دخل شخص للبوت 
اسمه: $name_tag
معرفه: [$Suser]
ايديه: `$from_id`
بواسطه : [هذا](tg://user?id=$text)

`tg://user?id=$text`
عدد الاعضاء الان :* $Members*
",
'parse_mode' =>"markdown",
'disable_web_page_preview'=>'true',
]);
$sales[$chat_id]['baageel']=0;
save($sales);
  bot('sendmessage',[
   'chat_id'=>$chat_id,
   'text'=>"🎭 أهلا وسهلا بك في بوت الأرقام 《 تسليم تلقائي 》
🌹 يتوفر لدينا أرقام لمختلف الدول العربية  🇾🇪🇾🇪 والأجنبية🚩
♾ لتفعيل برامج التواصل الإجتماعي
💰 مجانا وبدون دفع مال 🤑
🤘 فقط كل ما عليك هو دعوة اصدقائك الى البوت عبر الرابط الخاص بك
💡 وستحصل على نقطة واحدة مقابل كل دخول عضو جديد الى البوت من طرفك
~ رصيدك الآن: ".$sales[$chat_id]['collect']." ₽",
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
 [['text'=>'شراء رقم جديد📞','callback_data'=>'numbers']],
 [['text'=>'جمع النقاط💰','callback_data'=>'col'],['text'=>'شرح البوت ⁉️','callback_data'=>'about']],[['text'=>'شراء نقاط 💸','callback_data'=>'buy'],['text'=>'أرقام بدون نقاط 🆓','callback_data'=>'numberfree']],[['text'=>'ملف البوت🤖','callback_data'=>'bot']],
] 
   ])
  ]);
 }}
 
if($data == 'back'){
if($sales[$chat_id]['collect'] == null){
   $sales[$chat_id]['collect'] = 0;
   save($sales);
  }
  bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
   'text'=>"🎭 أهلا وسهلا بك في بوت الأرقام 《 تسليم تلقائي 》
🌹 يتوفر لدينا أرقام لمختلف الدول العربية  🇾🇪🇾🇪 والأجنبية🚩
♾ لتفعيل برامج التواصل الإجتماعي
💰 مجانا وبدون دفع مال 🤑
🤘 فقط كل ما عليك هو دعوة اصدقائك الى البوت عبر الرابط الخاص بك
💡 وستحصل على نقطة واحدة مقابل كل دخول عضو جديد الى البوت من طرفك
~ رصيدك الآن: ".$sales[$chat_id]['collect']." ₽",

   'reply_markup'=>json_encode([
'inline_keyboard'=>[
 [['text'=>'شراء رقم جديد📞','callback_data'=>'numbers']],
 [['text'=>'جمع النقاط💰','callback_data'=>'col'],['text'=>'شرح البوت ⁉️','callback_data'=>'about']],[['text'=>'شراء نقاط 💸','callback_data'=>'buy'],['text'=>'أرقام بدون نقاط 🆓','callback_data'=>'numberfree']],[['text'=>'ملف البوت🤖','callback_data'=>'bot']],
] 
   ])
  ]);
 }
  if($data == 'numbers'){
  bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>'💯 الان قم باختيار التطبيق التي تريد تشغيل الرقم عليه
	👇 من الكيبورد أدناه',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'telegram','callback_data'=>'sales#tg']],
[['text'=>'facebook','callback_data'=>'sales#facebook'],['text'=>'instagram','callback_data'=>'sales#ig']],
[['text'=>'whatsapp','callback_data'=>'sales#whatsapp'],['text'=>'openai️','callback_data'=>'sales#openai'],['text'=>'google','callback_data'=>'sales#imo']],
[['text'=>'paypal','callback_data'=>'sales#paypal'],['text'=>'amazon','callback_data'=>'sales#amazon']],
[['text'=>'tiktok','callback_data'=>'sales#tiktok']],
[['text'=>'snapchat','callback_data'=>'sales#snapchat'],['text'=>'netflix','callback_data'=>'sales#netflix']],
[['text'=>'imo','callback_data'=>'sales#imo'],['text'=>'discord','callback_data'=>'sales#discord'],['text'=>'twitter','callback_data'=>'sales#twitter']],
[['text'=>'hotmail','callback_data'=>'sales#hotmail'],['text'=>'yahoo','callback_data'=>'sales#yahoo']],
[['text'=>'kwai','callback_data'=>'sales#kwai']],
[['text'=>'wechat','callback_data'=>'sales#wechat'],['text'=>'viber','callback_data'=>'sales#viber']],
[['text'=>'steam','callback_data'=>'sales#steam'],['text'=>'aliexpress','callback_data'=>'sales#aliexpress'],['text'=>'skype','callback_data'=>'sales#skype']],
[['text'=>'truecaller','callback_data'=>'sales#truecaller'],['text'=>'uber','callback_data'=>'sales#uber']],
[['text'=>'yalla','callback_data'=>'sales#yalla'],['text'=>'microsoft','callback_data'=>'sales#microsoft']],
[['text'=>'الرجوع الى القائمة الرئيسية🔙','callback_data'=>'back']],
 ] 
   ])
  ]);
 }
 
 if($data == 'buy'){
  bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>'❍ للشراء إضغط على زر شراء النقاط 
وسيحولك البوت إلى بوت التواصل مع المشرف قم بمراسلته للشراء فقط...💸

♢ وسائل الدفع المتوفره :- 
★ بايبال
★ فودافون كاش 
★ اسياسيل
★ باير 

#𝚂𝚄𝙿𝙿𝙾𝚁𝚃_𝚃𝙴𝙰𝙼_𝚆𝙸𝚃𝙷_𝚇_𝙽𝚄𝙼𝙱𝙴𝚁𝚂_𝙱𝙾𝚃
',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"شراء النقاط 💰",'url'=>"t.me/Y_Y_D_P_BOT"],['text'=>"القائمة الرئيسية 🔙",'callback_data'=>"back"]],
] 
   ])
  ]);
 }



if($data == "about"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
البوت بسيط ولا يحتاج لشرح أصلا...🗣

ولكن على كل حال هذا شرح سريع
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الخطوة الأولى",'callback_data'=>"k1"],['text'=>" القائمة الرئيسية 🔙",'callback_data'=>"back"]],
] 
   ])
  ]);
 }
$ex = explode('#', $data);
$code = explode(":", file_get_contents("https://api-jack.ml/api-5sim/code?key=$tokensim&id={$ex[1]}"));
$code99 = file_get_contents("https://api-jack.ml/api-5sim/code?key=$tokensim&id={$ex[1]}");

if ($ex[0] == "innnnn") {
if (preg_match("/(STATUS_WAIT_CODE)/", $code99)) {
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "* الكود لم يصل تأكد من ارساله*",
'parse_mode' => "MarkDown",
]);
bot('sendMessage', [
'chat_id' => $adminnn,
'text' => "
*لم يتم شراء رقم جديد*
*ايدي الرقم :* `$ex[1]`
*اسم الشخص :* `$name`
*ايدي العميل :* `$chat_id`
*معرف العميل :* `$Suser`
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
]);
}else{
bot('sendMessage', [
'chat_id' => $adminnn,
'text' => "
*تم شراء رقم جديد وتسليم الكود للعميل بنجاح*
*الكود :* `$code[1]`
*ايدي الرقم :* `$ex[1]`
*اسم الشخص :* `$name`
*ايدي العميل :* `$chat_id`
*معرف العميل :* `$Suser`
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
]);
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "*الكود الخاص بك هو:* 
`$code[1]` ",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true
]);
}


}

  if ($ex[0] == "band") {
file_get_contents("https://api-jack.ml/api-5sim/band?key=$tokensim&id={$ex[1]}");
bot('editmessagetext', [
'chat_id' => $chat_id,
'text' => "*❍ تم ارسال طلبك الى فريق الدعم بنجاح 
❍ قم بمراسلتنا عبر هذا البوت :
❍ [ @Y_Y_D_P_BOT ]
❍ وسيتم التحقق من هذا الرقم
❍ واذا كان طلبك صحيح سيتم اعادة نقاطك اليك مع 1 نقطه هديه
#𝚂𝚄𝙿𝙿𝙾𝚁𝚃_𝚃𝙴𝙰𝙼_𝚆𝙸𝚃𝙷_𝚇_𝙽𝚄𝙼𝙱𝙴𝚁𝚂_𝙱𝙾𝚃*",
"message_id"=>$message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true
]);
bot('sendmessage', [
'chat_id' => $adminnn,
'text' => "
*طلب اعادة النقاط لان الرقم محظور 
ايدي المرسل :* `$chat_id`
*معرف المرسل : $Suser
رقمه*
`+$ex[2]`
"
,'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true
  ]);}
if($data == "k1"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
بعد الدخول للبوت إضغط على زر تجميع النقاط وبعدها سيرسل البوت لك رابط خاص بك فقط قم بنشره وأي شخص يدخل على الرابط تحصل على 1 نقطة
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الخطوة الثانية",'callback_data'=>"k2"],['text'=>" القائمة الرئيسية 🔙",'callback_data'=>"back"]],
] 
   ])
  ]);
 }
 
if($data == "k2"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
بعد جمع عدد جيد من النقاط إضغط على زر طلب رقم وبعدها اختر الدولة (يجب أن يتوافق سعر الرقم مع نقاطك) بعدها تأكد أن لديك إسم مستخدم في إعدادات تيليجرام بعدها إضغط نعم لدي معرف - تأكيد
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الخطوة الثالثة",'callback_data'=>"k3"],['text'=>" القائمة الرئيسية 🔙",'callback_data'=>"back"]],
] 
   ])
  ]);
 }
if($data == "k3"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
ستستلم الرقم تلقائي عند الشراء 
بعدها ادخل البرنامج المحدد وسجل الرقم وسوي ارسال رساله
بعدها اضغط زر اجلب الكود في الرساله
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"لا أستطيع جمع النقاط",'callback_data'=>"k4"],['text'=>" القائمة الرئيسية 🔙",'callback_data'=>"back"]],
] 
   ])
  ]);
 }
if($data == "k4"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
إذا لا تستطيع جمع النقاط يمكنك شراؤها...??
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"شراء نقاط 💸",'callback_data'=>"buy"],['text'=>" القائمة الرئيسية 🔙",'callback_data'=>"back"]],
] 
   ])
  ]);
 }
if($data == "numberfree"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
أرقام بدون نقاط تعتمد على السرعة
حيث أننا نقوم بتوزيع أرقام في القناة وكل كود يعمل مع أول شخص فقط...🍃
لو نشرنا رقم مغربي 🇲🇦 مع الكود بالطبع سيعمل مع أول شخص يدخله ولن يعمل مع البقية - فالأرقام بدون نقاط تعتمد على السرعة
يمكنك الإشتراك بالقناة عن طريق الضغط على زر إشتراك 📢 في الأسفل…!
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"إشتراك 📢",'url'=>"http://t.me/$ch"],['text'=>" القائمة الرئيسية 🔙",'callback_data'=>"back"]],
] 
   ])
  ]);
 }
if($data == "bot"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
تواصل مع المطور 
👇👇
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اضغط هنا",'url'=>"https://t.me/Y_Y_D_P"],['text'=>" القائمة الرئيسية 🔙",'callback_data'=>"back"]],
] 
   ])
  ]);
 }
if($data == "done"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
شكرا لاستخدامك البوت
",
  ]);
 }

 if($data == 'col'){
  bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>'
* ❍ هذا هو الرابط الخاص بك
♢ طريقه الإستخدام :-
1 ـ شارك الرابط مع اصدقائك .
2 ـ بعد ان يقوم اصدقائك بالدخول للبوت والاشتراك في القنوات .
3 ـ يجب ان يقوم بالدخول مره اخري من رابطك .
4 ـ وبعد ذالك سيتم احتساب النقاط لك .

https://t.me/'.$me.'?start='.$chat_id.'
❍ قم بنشر هذا الرابط بين الأصدقاء .
❍ وكل شخص يشترك في البوت من خلال هذا الرابط  سوف تحصل على 1 نقطة .
❍ ولا تهمل اتباع الشروط .

#لا تحاول رشق روابط الدعوه لان سيتم التعرف علي الرشق بشكل تلقائي من البوت ولن يتم احتسابه #لقد_بلغتكم
للاستفسار :
@Y_Y_D_P_BOT
#𝚂𝚄𝙿𝙿𝙾𝚁𝚃_𝚃𝙴𝙰𝙼_𝚆𝙸𝚃𝙷_𝚇_𝙽𝚄𝙼𝙱𝙴𝚁𝚂_𝙱𝙾𝚃
*'
,'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة إلى القائمة الرئيسية 🔙",'callback_data'=>"back"]],
] 
   ])
  ]);
 }


 elseif(preg_match("/(sales)/",$data)){
 	$ex=explode("#",$data);
  $reply_markup = [];
  $reply_markup['inline_keyboard'][] = [['text'=>'⁉️الكمية','callback_data'=>'s'],['text'=>'💲السعر','callback_data'=>'s'],['text'=>'🚩دولة الرقم','callback_data'=>'s']];
  foreach($sales['sales'] as $code => $sale){
  	if($sales["sales"][$code]["apps"]==$ex[1]){
  	$co=$sales["sales"][$code]["country"];
  $ap=$sales["sales"][$code]["apps"];
  
  $count=json_decode(file_get_contents("https://api-jack.ml/api-5sim/get?key=$tokensim&country=$co"),1); 
  $a=$count[$ap."_0"];
  if($a==0){
  $a="⛔";	
  }else{
  	$a="متوفر✅";	
  } 
   $reply_markup['inline_keyboard'][] = [['text'=>"$a",'callback_data'=>$code],['text'=>$sale['price'],'callback_data'=>$code],['text'=>$sale['name'],'callback_data'=>$code]];
  }}
if($sales[$chat_id]['collect'] == null){
   $sales[$chat_id]['collect'] = 0;
   save($sales);
  }
$reply_markup['inline_keyboard'][] = [['text'=>'العودة إلى قائمة الخدمات🔙','callback_data'=>'numbers']];
  $reply_markup = json_encode($reply_markup);
  bot('editMessageText',[
   'chat_id'=>$chat_id,
   'message_id'=>$message_id,
   'text'=>"
🙋‍♂️ أهلآ عـزيـزي آلَمستخدم
	💯 إليك قائمة بالأرقام المتوفرةحاليا💯 قم بالضغط على احد الارقام لشرائه
~ رصيدك الآن: ".$sales[$chat_id]['collect']." ₽",
   'reply_markup'=>($reply_markup)
  ]);
  $sales[$chat_id]['mode'] = null;
   save($sales);
   exit;
 } elseif($data == 'yes'){
  $price = $sales['sales'][$sales[$chat_id]['mode']]['price'];
$name = $sales['sales'][$sales[$chat_id]['mode']]['name'];
$country=$sales['sales'][$sales[$chat_id]['mode']]['country'];
$apps=$sales['sales'][$sales[$chat_id]['mode']]['apps'];
if($name==null){
	exit;
}else{
	$z=$rssed;
	$api = json_encode(file_get_contents("https://api-jack.ml/api-5sim/get_num?key=$tokensim&apps=$apps&country=$country"));
	
if (preg_match("/(NO_NUMBERS)/", $api)) {
bot("EditMessageText", [
"chat_id" => $chat_id,
"text" => "لم يتم تنفيذ طلبك
نظراً لعدم توفر الارقام حاليا في الموقع
",
"message_id" => $message_id
]);
exit;
} elseif (preg_match("/(BAD_SERVICE)/", $api)) {
bot("EditMessageText", [
"chat_id" => $chat_id,
"text" => "لم يتم تنفيذ طلبك
نظراً لعدم ادخل المعلومات الصحيحه من قبل الادمن
",
"message_id" => $message_id
]);
exit;
} elseif (preg_match("/(NO_BALANCE)/", $api)) {
bot("EditMessageText", [
"chat_id" => $chat_id,
"text" => "لم يتم تنفيذ طلبك
نظرا لعدم توفر الرصيد الكافي في البوت
الرجاء الانتظار والمحاولة لاحقا
",
"message_id" => $message_id
]);
exit;
}
$num = explode(":", $api);
$numb = str_replace('"', "", $num[2]);
if($numb==null){
bot("EditMessageText", [
"chat_id" => $chat_id,
"text" => "لم يتم تنفيذ طلبك
نظراً لمشكلة في الموقع
",
"message_id" => $message_id
]);
exit;
}
bot("EditMessageText", [
"chat_id" => $chat_id,
"text" => "تم قبول طلبك للرقم",
"message_id" => $message_id
]);

bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "رقمك هو
`+$numb`
اطلب الكود خلال 15 دقيقة او لن تستطيع الحصول على الكود
في حال واجهتك مشكلة تواصل بالمطور 

[@Y_Y_D_P]
",
'parse_mode' => "MarkDown",
 'reply_markup' => json_encode([
'inline_keyboard' => [
  [['text' => 'اجلب الكود', 'callback_data' => "innnnn#$num[1]"]], [['text' => 'محظور', 'callback_data' => "band#$num[1]#$num[2]"]],[['text' => 'تم', 'callback_data' => "done"]],
]])
]);
$rssed = filter_var(file_get_contents("https://api-jack.ml/api-5sim/coin?key=$tokensim"), FILTER_SANITIZE_NUMBER_INT);
  bot('sendmessage',[
   'chat_id'=>$adminnn,
   'text'=>"- - - - - - - - - - - - - - - - - - - - - - - - -
الأيدي: $chat_id
المعرف إن وجد: $Suser
- - - - - - - - - - - - - - - - - - - - - - - - -
قام بشراء $name بسعر $price
- - - - - - - - - - - - - - - - - - - - - - - - -
رقمه هو 
`+$numb`
- - - - - - - - - - - - - - - - - - - - - - - - -
الرصيد السابق : $z
الرصيد الحالي : $rssed
- - - - - - - - - - - - - - - - - - - - - - - - -
"
]);
bot('sendmessage',[
'chat_id'=>"-1001600387125",
'text'=>"*❍ تم شراء رقم جديد بنجاح*
*❍ الرقم :* `+$numb`
*❍ النوع :* `$name`
*❍ السعر :* `$price`
*❍ ايدي المرسل :* `$chat_id`
*❍ معرف المرسل : $Suser
❍ معرف البوت : @X_NUMBERS_BOT*
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"𝚇 𝙽𝚄𝙼𝙱𝙴𝚁𝚂 𝙱𝙾𝚃",'url'=>"t.me/X_NUMBERS_BOT"]],
]])]);


  $sales[$chat_id]['mode'] = null;
  $sales[$chat_id]['collect'] -= $price;
  save($sales);
  exit;
 } }else {
   if($data == 's') { exit; }
   $price = $sales['sales'][$data]['price'];
   $name = $sales['sales'][$data]['name'];
   if($price != null){
if($price <= $sales[$chat_id]['collect']){
 bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
هل أنت متأكد وتريد إتمام الطلب...؟

طلبك هو:
رقم لدولة $name بسعر $price 👉",
'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>'نعم - أنا متأكد','callback_data'=>'yes'],['text'=>'لا - إلغاء الشراء','callback_data'=>'back']] 
 ] 
])
 ]);
 $sales[$chat_id]['mode'] = $data;
 save($sales);
 exit;
} else {
 bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>'نقاطك غير كافية لشراء هذا الرقم',
'show_alert'=>true
 ]);
}
   }
 }
}

$ary = array($adminnn);
$id = $message->chat->id;
$adminnns = in_array($id,$ary);
$data = $update->callback_query->data;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$chat_id2 = $update->callback_query->message->chat->id;
$cut = explode("\n",file_get_contents("stats/users.txt"));
$users = count($cut)-1;
$mode = file_get_contents("stats/bc.txt");
#Start code 

if ($update && !in_array($id, $cut)) {
mkdir('stats');
file_put_contents("stats/users.txt", $id."\n",FILE_APPEND);
  }

if(preg_match("/(admin)/",$text) && $adminnns) {
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
أهلا مطوري...
شبيك لبيك البوت بين يديك
إضغط على طلبك في القائمة وستتم تلبية الطلب تلقائيا...🌚 
-",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'عدد المشتركين 👥 ','callback_data'=>'users'],['text'=>'رسالة للكل 📩 ','callback_data'=>'set']],
[['text'=>'حالة البوت 🔋 ','callback_data'=>'stats']],
]
])
]);
}
if($data == 'admin'){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"
أهلا مطوري...
شبيك لبيك البوت بين يديك
إضغط على طلبك في القائمة وستتم تلبية الطلب تلقائيا...🌚 
-",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'عدد المشتركين 👥 ','callback_data'=>'users'],['text'=>'رسالة للكل 📩 ','callback_data'=>'set']],
[['text'=>'حالة البوت 🔋 ','callback_data'=>'stats']],
]
])
]);
file_put_contents('stats/bc.txt', 'no');
}

if($data == "users"){ 
bot('answercallbackquery',[
'callback_query_id'=>$update->callback_query->id,
'text'=>"
المشتركين $users
-",
'show_alert'=>true,
]);
}

if($data == "set"){ 
file_put_contents("stats/bc.txt","yas");
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$update->callback_query->message->message_id,
'text'=>"
أرسل رسالتك ليتم إرسالها إلى $users مشترك 👥
كتابة فقط...🌚
-
",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>' الغاء 🚫. ','callback_data'=>'cbc']]
]
])
]);
}
if($text and $mode == "yas" && $adminnns){
bot('sendMessage',[
  'chat_id'=>$chat_id,
  'text'=>"
تم قبول رسالتك!
ويتم إرسالها إلى $users مشترك 👥
-",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'رجوع ','callback_data'=>'cbc']]
]
])
]);
for ($i=0; $i < count($cut); $i++) { 
 bot('sendMessage',[
'chat_id'=>$cut[$i],
'text'=>"$text",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
]);
file_put_contents("stats/bc.txt","no");
} 
}


$getMe = bot('getMe')->result;
date_default_timezone_set("Africa/Cairo");
$date = $message->date;
$date = date('y/m/d');
$time = date('h:i:s');
$gettime = time();
$sppedtime = $gettime - $date;
$userbot = "{$getMe->username}";
$userb = strtoupper($userbot);
if($data == "stats"){
if ($sppedtime == 3  or $sppedtime < 3) {
$f = "سيئه جداً";
}
elseif($sppedtime == 9 or $sppedtime > 9 ) {
$f = "جيده";
}
elseif ($sppedtime == 10 or $sppedtime > 10) {
$f = "ممتازة";
}
elseif ($sppedtime == 50 or $sppedtime > 50) {
$f = "ممتازة جداً";
}
 bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$update->callback_query->message->message_id,
'text' =>"
معلومات البوت:

معرف البوت [ @$userb ]
حالة البوت $f
الوقت الآن: 20$date | $time 
-",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'رجوع ','callback_data'=>'cbc']]
]
])
 ]);
}
if($message->reply_to_message and $message->from->id==$adminnn and $text=="رفع"){
$a= $message->reply_to_message->document->file_id;
$get=bot("getfile",[
"file_id"=>$a
])->result->file_path; 
$v="sales.json";
$file=file_put_contents($v, file_get_contents("https://api.telegram.org/file/bot".API_KEY."/".$get));
bot("sendmessage",[
"chat_id"=>$chat_id,
"text"=>"تم الرفع"
]);
}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
$from_id = $message->from->id;
$type = $message->chat->type;
if(isset($update->callback_query)){
$chat_id = $update->callback_query->message->chat->id;
$from_id = $update->callback_query->message->from->id;
$message_id = $update->callback_query->message->message_id;
$data= $update->callback_query->data;
}
$ex = explode("#",$data);
$pr = str_replace("كشف ", "", $text);

$api = json_decode(file_get_contents("http://api.telegram.org/bot".$TOKEN."/getChat?chat_id=".$pr));
$first_name= $api->result->first_name;
$last_name= $api->result->last_name;
$username= $api->result->username;
$bio= $api->result->bio;
$id =$api->result->id;
$statt =$api->ok;
$api1=json_decode(file_get_contents("https://api.telegram.org/bot".$TOKEN."/getUserProfilePhotos?user_id=".$pr),true); 
$photo =$api1["result"]["total_count"];  

/* كليشه الايدي تقدر تغيرها*/
$test ="
*الاسم الاول : $first_name
الاسم الثاني : $last_name
الايدي :* `$id`
*المعرف : [@$username]
البايو :* `$bio`
*عدد الصور : $photo *
[دخول الشات عبر هاتف اندرويد](tg://openmessage?user_id=$pr)
[دخول الشات عبر هاتف ايفون](tg://user?id=$pr)
";

if($text=="كشف $pr" ){
if($statt == "true" ){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$test,
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
]);}
else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"البوت لم يتلقي رساله من هذا الشخص",
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
]);}}

?>

