<?php
return [
    'action' => [
        'GLOBAL'//全局匹配   也可部分匹配，如：'Index.index'
    ],
    'restrict' => 0//登录限制   0为允许多人同时登录    1为只允许1人登录，并且后登录者会踢掉前登录者
];