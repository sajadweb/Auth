<?php

$private=<<<EOD
-----BEGIN RSA PRIVATE KEY-----
MIIBOQIBAAJAdN9r3p5QQ1XMU9y1C/TDGwcn71v4uud9eKUVCIvUvYv10SnKGfbZ
7RRQuorS0xrVBmAxR5PDOba1+8AApGHd2QIDAQABAkBceTdxstQRIz8ED/sUlbsW
lKfthVkeEfI+Vmh5FaLjwlnRtOb4vgpiuXcJk/7kZP47hfXMbrcll9DGkm3tsKBd
AiEAwjq4GH3JSy8ITuHo9uTnYILQ+z1QtCNAlY5Lt4FxIEMCIQCaCqxwWgi5IZqg
/DJ2PAksQ/3ebIrGCmpsrhxunc0FswIgCb9ap9gANya4GwVZZLKeLgjCpikwmKnA
PwEyKZZ0b/MCIQCOG8Kxc54QjLvGQGOdSA1+VMtj4uazhPBhis6YDeQSmQIgLPYg
uPIBEHZ9Qd7nakad5qTj3Bkw89DeW7bTqscwA3I=
-----END RSA PRIVATE KEY-----
EOD;

$public=<<<EOD
-----BEGIN PUBLIC KEY-----
MFswDQYJKoZIhvcNAQEBBQADSgAwRwJAdN9r3p5QQ1XMU9y1C/TDGwcn71v4uud9
eKUVCIvUvYv10SnKGfbZ7RRQuorS0xrVBmAxR5PDOba1+8AApGHd2QIDAQAB
-----END PUBLIC KEY-----
EOD;

return [
    "name"=> "BUNDLE",
    "client_key" => "12345678-1234-1234-1234-4f7a75aa80f8",
    "server_key" => "83v65723-1234-1234-1234-4f7a75aa80b1",
    "JWT"=>  "RS256",
    "private_key" => $private,
    "public_key" => $public
];

