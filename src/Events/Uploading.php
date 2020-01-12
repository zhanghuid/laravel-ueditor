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

class Uploading
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    /**
     * @var UploadedFile
     */
    public $file;
    public $filename;
    /**
     * @var array
     */
    public $config;

    /**
     * Create a new event instance.
     *
     * @param UploadedFile $file
     * @param $filename
     * @param array $config
     */
    public function __construct(UploadedFile $file, $filename, array $config)
    {
        $this->file = $file;
        $this->filename = $filename;
        $this->config = $config;
    }

}
