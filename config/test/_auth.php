<?php

return [
    'class' => 'yii\rbac\DbManager',
    'itemTable' => 'user_auth_item',
    'itemChildTable' => 'user_auth_item_child',
    'assignmentTable' => 'user_auth_assignment',
    'ruleTable' => 'user_auth_rule'
];