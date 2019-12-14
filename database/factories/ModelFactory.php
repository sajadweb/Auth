<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define( \Api\Auth\Model\Client::class, function (Faker\Generator $faker) {
    $app=['HUMM','BUNDLE',"SKYE"];
    $type=['WEB','ANDROID',"IOS"];
    $version=['1.1','2.2',"3.3",'1'];
    return [
        "id"=> $faker->uuid,
        'name' => $app[array_rand($app)],
        'version' => $version[array_rand($version)] ,
        'type' =>$type[array_rand($type)],
        'agent' => $faker->userAgent,
        'ip' => $faker->ipv4,
    ];
});

$factory->define( \Api\Auth\Model\User::class, function (Faker\Generator $faker) {
    $type=$faker->randomElement(['email', 'phone',"link"]);
    $data=[];
    if($type=="phone"){
        $data=   [
            [
                "type" => $type,
                "phone" => $faker->phoneNumber,
            ]
        ];
    }else if($type=="email"){
        $data=[
            [
                "type" => $type,
                "email" => $faker->email,
            ]
        ];
    }else{
        $data=[
            [
                "type" => "phone",
                "phone" => $faker->phoneNumber,
            ],
            [
                "type" => "email",
                "email" => $faker->email,
            ]
        ];
    }
    return [
        "id"=> $faker->uuid,
        'name' =>$faker->name,
        'data' => $data,
        'password' =>  $faker->password,
        'remember_token' => $faker->randomLetter(10),
    ];
});
