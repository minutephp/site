<?php
/**
 * User: Sanchit <dev@minutephp.com>
 * Date: 11/5/2016
 * Time: 11:04 AM
 */
namespace Minute\Todo {

    use Minute\Config\Config;
    use Minute\Event\ImportEvent;

    class SiteTodo {
        /**
         * @var TodoMaker
         */
        private $todoMaker;

        /**
         * MailerTodo constructor.
         *
         * @param TodoMaker $todoMaker - This class is only called by TodoEvent (so we assume TodoMaker is be available)
         */
        public function __construct(TodoMaker $todoMaker, Config $config) {
            $this->todoMaker = $todoMaker;
        }

        public function getTodoList(ImportEvent $event) {
            $todos[] = $this->todoMaker->createManualItem("create-a-user-test", " Create a user test at peek.usertesting.com", 'To get quick feedback about site', 'http://peek.usertesting.com');

            $event->addContent(['Site testing' => $todos]);
        }
    }
}