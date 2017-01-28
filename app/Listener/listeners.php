<?php

/** @var Binding $binding */
use Minute\Event\Binding;
use Minute\Event\ResponseEvent;
use Minute\Event\TodoEvent;
use Minute\Event\TrackerEvent;
use Minute\Info\TrackerInfo;
use Minute\Todo\SiteTodo;
use Minute\Tracking\Tracker;

$binding->addMultiple([
    //info
    ['event' => TrackerEvent::IMPORT_TRACKER_LIST, 'handler' => [TrackerInfo::class, 'getInstalled']],

    //tracking
    ['event' => ResponseEvent::RESPONSE_RENDER, 'handler' => [Tracker::class, 'insertTracker']],

    //tasks
    ['event' => TodoEvent::IMPORT_TODO_ADMIN, 'handler' => [SiteTodo::class, 'getTodoList']],
]);