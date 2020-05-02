<?php

namespace App\Application\Core\Room\Archive;

interface IRoomArchiveInputPort
{
    /**
     * @param RoomArchiveInputData $input_data
     * @return RoomArchiveOutputData
     */
    public function handle(RoomArchiveInputData $input_data): RoomArchiveOutputData;
}