<?php

namespace App\Presentation\Core\Controllers;

use App\Application\Core\Room\Delete\IRoomCreateInputPort;
use App\Application\Core\Room\Delete\RoomCreateInputData;
use App\Domain\Core\Model\Room\RoomName;
use App\Domain\Model\User\UserId;
use Slim\Http\Request;

class RoomController
{
    public function create(Request $request,IRoomCreateInputPort $input_port): void
    {
        $user_id = new UserId('aaa');
        $room_name = new RoomName('TestRoom');
        $members = ['tas', 'test'];
        $input_data = new RoomCreateInputData($user_id, $room_name, $members);

        $input_port->handle($input_data);
    }
}