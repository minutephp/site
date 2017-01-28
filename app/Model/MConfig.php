<?php
/**
 * User: Sanchit <dev@minutephp.com>
 * Date: 6/22/2016
 * Time: 8:22 AM
 */
namespace App\Model {

    use Minute\Model\ModelEx;

    class MConfig extends ModelEx {
        protected $table      = 'm_configs';
        protected $primaryKey = 'config_id';
    }
}