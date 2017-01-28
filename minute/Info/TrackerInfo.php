<?php
/**
 * User: Sanchit <dev@minutephp.com>
 * Date: 11/4/2016
 * Time: 9:30 AM
 */
namespace Minute\Info {

    use Minute\Event\ImportEvent;

    class TrackerInfo {
        public function getInstalled(ImportEvent $event) {
            $trackers = [
                [
                    'label' => 'Google analytics',
                    'value' => 'google',
                    'field' => 'Google Analytics ID',
                    'hint' => 'Your Google Analytics Id should be something like "UA-XXXXXXX-X"',
                ],
                [
                    'label' => 'Facebook tracking pixel',
                    'value' => 'facebook',
                    'field' => 'Tracking pixel ID',
                    'hint' => 'Your Facebook tracking pixel ID should be 16 digit number',
                ],
                [
                    'label' => 'Statcounter',
                    'value' => 'statcounter',
                    'field' => 'Image "Src" Url',
                    'hint' => 'Your url should be something like //c.statcounter.com/XXXXXXX/0/XXXXXXX/0/',
                ],
            ];

            $event->setContent($trackers);
        }
    }
}