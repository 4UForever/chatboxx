<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use App\Conversations\ExampleConversation;
//quick reply
use App\Conversations\QuickReplyConversation;
//templates, elements
use BotMan\Drivers\Facebook\Extensions\ListTemplate;
use BotMan\Drivers\Facebook\Extensions\GenericTemplate;
use BotMan\Drivers\Facebook\Extensions\MediaTemplate;
use BotMan\Drivers\Facebook\Extensions\MediaUrlElement;
use BotMan\Drivers\Facebook\Extensions\Element;
use BotMan\Drivers\Facebook\Extensions\ElementButton;

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
        $bot->startConversation(new QuickReplyConversation());
    }

    public function listTemplate(BotMan $bot)
    {
        $bot->types();
        $bot->reply(ListTemplate::create()
            ->useCompactView()
            // ->addGlobalButton(ElementButton::create('view more')->url('http://test.at'))
            ->addElement(
                Element::create('Facebook profile page')
                    ->subtitle('Facebook profile about Sawai Chungsri')
                    ->image('https://scontent.fbkk2-1.fna.fbcdn.net/v/t1.0-9/23435272_10213853135339889_821511305178651636_n.jpg?_nc_cat=0&_nc_eui2=AeH3iA-6KO3opSplj05epGPzxgjnJXtX8_pZ80rkjHwb1iug5MHJ3Ezarkoyq1wYceq90GQAa6NF-_5RdYalbtyANQVEycA78tr9j-nb9nv-tQ&oh=a1990b4b30c091f13f63704a3d5437e9&oe=5C0E5027')
                    ->addButton(ElementButton::create('visit Facebook')
                        ->url('https://www.facebook.com/sawaic/')
                    )
            )
            ->addElement(
                Element::create('LinkedIn page')
                    ->subtitle('LinkedIn page about Sawai Chungsri')
                    ->image('https://media.licdn.com/dms/image/C5603AQFHXiLeIz0piQ/profile-displayphoto-shrink_200_200/0?e=1538611200&v=beta&t=EPJKGm78Ivxy7NMW3cTkIL0aBSVPFBp8NAF94XyFqjQ')
                    ->addButton(ElementButton::create('visit LinkedIn')
                        ->url('https://www.linkedin.com/in/sawai/')
                    )
            )
        );
    }

    public function genericTemplate(BotMan $bot)
    {
        $bot->types();
        $bot->reply(GenericTemplate::create()
            ->addImageAspectRatio(GenericTemplate::RATIO_SQUARE)
            ->addElements([
                Element::create('Korean-style Oxford Cloth plain men\'s shirt shirts')
                    ->subtitle('Promotion and price above are valid through 04/08/2018')
                    ->image('http://th-test-11.slatic.net/p/7/1006-11-2431-82950628-045e8b122b0386e99374c3e6ef95065f-catalog.jpg_340x340q80.jpg')
                    ->addButton(ElementButton::create('View Details')
                        ->url('https://www.lazada.co.th/products/1006-11-i162617508-s196042869.html')
                    ),
                Element::create('Super Black Jeans')
                    ->subtitle('Promotion and price above are valid through 04/08/2018')
                    ->image('http://th-test-11.slatic.net/p/7/100cotton-9184-36124055-a7cc8ba42a761028b8b28d290e6ae267-catalog.jpg_340x340q80.jpg')
                    ->addButton(ElementButton::create('View Details')
                        ->url('https://www.lazada.co.th/products/100cotton-i135652696-s153424314.html')
                    ),
                Element::create('Baoji BX644 Cute Shoes (Black)')
                    ->subtitle('Promotion and price above are valid through 04/08/2018')
                    ->image('http://th-test-11.slatic.net/p/7/baoji-baoji-bx644-4635-64594475-812447f2c6851a4aba11f4b9747c25a2-catalog.jpg_340x340q80.jpg')
                    ->addButton(ElementButton::create('View Details')
                        ->url('https://www.lazada.co.th/products/baoji-baoji-bx644-i140586600-s161473735.html')
                    )
            ])
        );
    }

    public function mediaTemplate(BotMan $bot)
    {
        $bot->types();
        $bot->reply('When you heard your boss call you on friday evening :D');
        $bot->types();
        $bot->reply(MediaTemplate::create()
            ->element(MediaUrlElement::create('video')
                ->url('https://business.facebook.com/NetflixTH/videos/515445098909486')
                ->addButtons([
                    ElementButton::create('Facebook NetflixTH')
                        ->url('https://business.facebook.com/NetflixTH'),
                ])
            )
        );
    }
}
