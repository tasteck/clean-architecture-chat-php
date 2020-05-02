<?php

namespace App\Application\Core\Message\Delete\Sent;

interface IMessageSentInputPort
{
    public function handle(MessageSentInputData $input_data): MessageSentOutputData;
}