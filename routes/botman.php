<?php
use App\Http\Controllers\BotManController;
use BotMan\BotMan\BotMan;
use App\Conversations\AppConversation;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});

$botman->hears('inv', BotManController::class.'@welcome');

$botman->hears('Start conversation', BotManController::class.'@startConversation');

$botman->hears('/start ref-(\w+)', function (BotMan $bot) {
    $bot->startConversation(new AppConversation());
});

$botman->hears('/start', function (BotMan $bot) {
    $bot->startConversation(new AppConversation());
});
