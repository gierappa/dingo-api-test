<?php
$I = new ApiTester($scenario);

//test delete pet case
$I->haveHttpHeader('Content-Type', 'application/json');
$I->sendDELETE('/pet/z1');
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::BAD_REQUEST); // 400
$I->seeResponseIsJson();
$I->seeResponseContainsJson(['message' => 'Invalid ID supplied']);

//test not found case
$I->haveHttpHeader('Content-Type', 'application/json');
$I->sendDELETE('/pet/123144');
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::NOT_FOUND); // 404
$I->seeResponseIsJson();
$I->seeResponseContainsJson(['message' => 'Not Found']);

//test found case
$I->haveHttpHeader('Content-Type', 'application/json');
$I->sendPOST('/pet', jsonData);
$I->sendDELETE('/pet/111222');
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
$I->seeResponseIsJson();
$I->seeResponseContainsJson(['message' => 'Pet deleted']);

