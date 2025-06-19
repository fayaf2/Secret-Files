<?php
require 'vendor/autoload.php';
use Workerman\Worker;
use PHPSocketIO\SocketIO;

$io = new SocketIO(2021);

$io->on('connection', function($socket) use($io) {
    $socket->on('message', function($msg) use($io) {
        $socket->broadcast->emit('message', $msg);
    });
});

Worker::runAll();
