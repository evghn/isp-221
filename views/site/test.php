<?php

$a = 1;
$user = [];
$b = "ok";
// $user = array();
$user = ["user login" => 'aaa', 25];

class User
{

    public $login;
    static $user_name = 'vasya';

    public static function getTableName()
    {
        return 'application';
    }


    public function getUserLogin()
    {
        return $this->login;
    }


    public static function getUserName()
    {
        return self::$user_name;
    }
}

$user2 = new User();
$user2->login = "login2";
$user3 = new User();
$user3->login = "login22";

// Yii::debug($user2);

// $user2->login = "user login";

// Yii::debug($user2);

?>

<div class="text-white bg-primary">
    <div>
        <?= $user2::getUserName() ?>
        <?= $user2->login ?>
        <?= $user3::getUserName() ?>
        <?= $user3->login ?>

        <?= User::getUserName() ?>
    </div>
    <div>
        <? # $user2::TYPE_USER 
        ?>
    </div>
    <div id="user-name">
        <? # $user2->login 
        ?>
    </div>
    <div>
        <? # $user2->getUserLogin() 
        ?>
    </div>
    <div>
        <?php foreach ($user as $key => $i): ?>
            <?= $key . " => " . $i  . "<br>" ?>
        <?php endforeach ?>

    </div>



    <div>
        <?php echo $a ?>

    </div>

</div>
<script>
    // $(() => {
    //     const a = "text"
    //     console.log(a.toUpperCase())
    //     const $user = {
    //         "user login": 'aaa',
    //         age: 25
    //     }
    //     $("#user-name").html($user["user login"])

    // })
</script>

<?php

?>
<?php

?>