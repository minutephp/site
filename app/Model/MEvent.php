<?php
/**
 * Created by: MinutePHP Framework
 */
namespace App\Model {

    use Minute\Model\ModelEx;

    class MEvent extends ModelEx {
        protected $table      = 'm_events';
        protected $primaryKey = 'event_id';
    }
}