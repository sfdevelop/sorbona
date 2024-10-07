<?php

namespace App\Logging;

use App\Jobs\SendDiscordNotificationJob;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;

class DiscordLogger extends AbstractProcessingHandler
{
    protected $url;

    public function __construct($level = Logger::DEBUG, bool $bubble = true)
    {
        parent::__construct($level, $bubble);
        $this->url = config('logging.channels.discord.url');
    }

    public function __invoke(array $config): Logger
    {
        $logger = new Logger('discord');
        $logger->pushHandler(new self);

        return $logger;
    }

    protected function write(array|\Monolog\LogRecord $record): void
    {
        $message = 'Timestamp: '.$record['datetime']->format('d-m-Y H:i:s')."\n".
            'Error Message: '.$record['message']."\n".
            'Context: '.json_encode($record['context'])."\n".
            'Exception: '.(isset($record['context']['exception']) ? $record['context']['exception']->getMessage() : 'N/A')."\n".
            'File: '.(isset($record['context']['exception']) ? $record['context']['exception']->getFile() : 'N/A')."\n".
            'Line: '.(isset($record['context']['exception']) ? $record['context']['exception']->getLine() : 'N/A');

        SendDiscordNotificationJob::dispatch($this->url, $message);
    }
}
