<?php

namespace Huid\LaravelUeditor\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Http\UploadedFile;
use Illuminate\Queue\SerializesModels;

class Uploaded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    /**
     * @var UploadedFile
     */
    public $file;
    /**
     * @var array
     */
    public $result;

    /**
     * Create a new event instance.
     *
     * @param UploadedFile $file
     * @param array $result
     */
    public function __construct(UploadedFile $file, array $result)
    {
        //
        $this->file = $file;
        $this->result = $result;
    }

}
