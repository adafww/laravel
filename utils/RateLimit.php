class RateLimiter {
private $cache; // Объект кэша (Redis, Memcached и т.д.)
private $limit;
private $interval;

public function __construct($cache, $limit, $interval) {
$this->cache = $cache;
$this->limit = $limit;
$this->interval = $interval;
}

public function isAllowed($key) {
$timestamp = time();
$requests = $this->cache->get($key);

if ($requests === false) {
$requests = [['timestamp' => $timestamp, 'count' => 1]];
} else {
$requests = json_decode($requests, true);

// Удаляем старые запросы из истории
$requests = array_filter($requests, function($request) use ($timestamp) {
return $request['timestamp'] > ($timestamp - $this->interval);
});

// Добавляем текущий запрос в историю
$requests[] = ['timestamp' => $timestamp, 'count' => 1];
}

// Проверяем количество запросов
$count = array_reduce($requests, function($carry, $request) {
return $carry + $request['count'];
}, 0);

if ($count > $this->limit) {
return false; // Ограничение превышено
}

// Сохраняем обновленную историю запросов
$this->cache->set($key, json_encode($requests));

return true; // Запрос разрешен
}
}
