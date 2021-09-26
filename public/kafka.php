
<?php

$rk = new RdKafka\Producer();
$rk->setLogLevel(LOG_DEBUG);
$rk->addBrokers("10.0.100.163:9092");

try {
    $topic = $rk->newTopic("auth_service_integrate");

    for ($i = 0; $i < 10; $i++) {
        $topic->produce(RD_KAFKA_PARTITION_UA, 0, "Message $i");
    }
} catch (Exception $exception) {
    print_r($exception);
}