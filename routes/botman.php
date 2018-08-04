<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});
$botman->hears('It works', function($bot) {
   $bot->reply('Yep 🤘');
});

$botman->hears('Start conversation', BotManController::class.'@startConversation');
//custom payloads
$botman->hears('GET_STARTED', function ($bot) {
	$bot->reply('Welcome to sawanshop chatbot, Please choose message type from the menu :)');
});
$botman->hears('QUICK_PAYLOAD', BotManController::class.'@quickReply');
$botman->hears('LIST_PAYLOAD', BotManController::class.'@listTemplate');
$botman->hears('GENERIC_PAYLOAD', BotManController::class.'@genericTemplate');
$botman->hears('MEDIA_PAYLOAD', BotManController::class.'@mediaTemplate');
