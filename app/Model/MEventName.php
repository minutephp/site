<?php
/**
 * Created by: MinutePHP Framework
 */
namespace App\Model {

    use Minute\Model\ModelEx;

    class MEventName extends ModelEx {
        protected $table      = 'm_event_names';
        protected $primaryKey = 'event_name_id';
    }
}