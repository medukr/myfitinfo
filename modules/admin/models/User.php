<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $email
 * @property string $user_name
 * @property string $password
 * @property string $auth_key
 * @property int $is_admin
 * @property string $create_at
 * @property string $update_at
 */
class User extends \app\models\User
{

}
