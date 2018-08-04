<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use App\Conversations\ExampleConversation;
//custom conversations
use App\Conversations\QuickReplyConversation;
// use App\Conversations\ListTemplateConversation;
// use App\Conversations\GenericTemplateConversation;
// use App\Conversations\MediaTemplateConversation;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');

        $botman->listen();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tinker()
    {
        return view('tinker');
    }

    /**
     * Loaded through routes/botman.php
     * @param  BotMan $bot
     */
    public function startConversation(BotMan $bot)
    {
        $bot->startConversation(new ExampleConversation());
    }

    //custom method
    public function quickReply(BotMan $bot)
    {
        $bot->quickReply(new QuickReplyConversation());
    }

    public function listTemplate(BotMan $bot)
    {
        // $bot->listTemplate(new ListTemplateConversation());
        $bot->reply(ListTemplate::create()
            ->useCompactView()
            ->addGlobalButton(ElementButton::create('view more')->url('http://test.at'))
            ->addElement(
                Element::create('BotMan Documentation')
                    ->subtitle('All about BotMan')
                    ->image('http://botman.io/img/botman-body.png')
                    ->addButton(ElementButton::create('tell me more')
                        ->payload('tellmemore')->type('postback'))
            )
            ->addElement(
                Element::create('BotMan Laravel Starter')
                    ->subtitle('This is the best way to start with Laravel and BotMan')
                    ->image('http://botman.io/img/botman-body.png')
                    ->addButton(ElementButton::create('visit')
                        ->url('https://github.com/mpociot/botman-laravel-starter')
                    )
            )
        );
    }

    public function genericTemplate(BotMan $bot)
    {
        // $bot->genericTemplate(new GenericTemplateConversation());
        $bot->reply(GenericTemplate::create()
            ->addImageAspectRatio(GenericTemplate::RATIO_SQUARE)
            ->addElements([
                Element::create('BotMan Documentation')
                    ->subtitle('All about BotMan')
                    ->image('http://botman.io/img/botman-body.png')
                    ->addButton(ElementButton::create('visit')->url('http://botman.io'))
                    ->addButton(ElementButton::create('tell me more')
                        ->payload('tellmemore')->type('postback')),
                Element::create('BotMan Laravel Starter')
                    ->subtitle('This is the best way to start with Laravel and BotMan')
                    ->image('http://botman.io/img/botman-body.png')
                    ->addButton(ElementButton::create('visit')
                        ->url('https://github.com/mpociot/botman-laravel-starter')
                    )
            ])
        );
    }

    public function mediaTemplate(BotMan $bot)
    {
        // $bot->mediaTemplate(new MediaTemplateConversation());
        $bot->reply(MediaTemplate::create()
            ->element(MediaUrlElement::create('video')
                ->url('https://www.facebook.com/liechteneckers/videos/10155225087428922/')
                ->addButtons([
                    ElementButton::create('Web URL')
                        ->url('http://liechtenecker.at'),
                    ElementButton::create('payload')
                        ->type('postback')
                        ->payload('test'),
                ])
            )
        );
    }
}
