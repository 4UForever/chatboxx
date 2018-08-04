<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class QuickReplyConversation extends Conversation
{

    public function askBeer(){
        $question = Question::create('Which beer you most like to drink?')->addButtons([
            Button::create('Heineken')->value('heineken'),
            Button::create('Chang')->value('chang'),
            Button::create('Singha')->value('singha'),
        ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                $this->bot->types();
                if($answer->getValue() === 'heineken') {
                    $this->bot->reply('Wow! You like Heineken same as me');
                } else if($answer->getValue() === 'chang'){
                    $this->bot->reply('I think Chang more bitter than Heineken');
                } else {
                    $this->bot->reply('Singha is OK for me too');
                }
            }
        });
    }

    public function run()
    {
        $this->askBeer();
    }
}
