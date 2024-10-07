<?php

namespace App\Jobs;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendDiscordNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string $url;

    protected string $message;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($url, $message)
    {
        $this->url = $url;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     *
     * @throws GuzzleException
     */
    public function handle(): void
    {
        $client = new Client;
        $client->post($this->url, [
            'json' => [
                'content' => $this->message,
            ],
        ]);
    }
}
