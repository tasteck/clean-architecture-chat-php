<?php

namespace App\Application\Core\Message\Delete;

interface IMessageDeleteInputPort
{
    public function handle(MessageDeleteInputData $input_data): MessageDeleteOutputData;
}