<?php
/**
 * User: Sanchit <dev@minutephp.com>
 * Date: 6/22/2016
 * Time: 8:22 AM
 */
namespace App\Model {

    use Minute\Model\ModelEx;

    class MUserGroup extends ModelEx {
        protected $table      = 'm_user_groups';
        protected $primaryKey = 'user_group_id';
    }
}