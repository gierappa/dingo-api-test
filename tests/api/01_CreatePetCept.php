<?php
$I = new ApiTester($scenario);

//test with user token
$I->wantTo('Create new Pet');
$I->haveHttpHeader('Content-Type', 'application/json');
$I->sendPOST('/pet', jsonData);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED);
$I->seeResponseIsJson();
$I->seeResponseContainsJson([
    'id' => 111222,
    'name' => 'doggie',
    'photo_urls' => [
        0 => 'photo_url1',
        1 => 'photo_url2',
    ],
    'status' => 'available',
    'category' => [
        'id' => 1,
        'name' => 'category1',
    ],
    'tags' => [
        '0' => [
            'id' => '1',
            "name" => 'tag1'
        ]
    ]
]);

