<?php
$I = new ApiTester($scenario);

//test invalid id case
$I->haveHttpHeader('Content-Type', 'application/json');
$I->sendGET('/pet/z1');
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::BAD_REQUEST); // 400
$I->seeResponseIsJson();
$I->seeResponseContainsJson(['message' => 'Invalid ID supplied']);

//test not found case
$I->haveHttpHeader('Content-Type', 'application/json');
$I->sendGET('/pet/123144');
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::NOT_FOUND); // 404
$I->seeResponseIsJson();
$I->seeResponseContainsJson(['message' => 'Not Found']);

//test found case
$I->haveHttpHeader('Content-Type', 'application/json');
$I->sendPOST('/pet', jsonData);
$I->sendGET('/pet/111222');
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
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

