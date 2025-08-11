<?php
header('Content-Type: application/json');
date_default_timezone_set("Asia/Ho_Chi_Minh");

$device_id = $_GET['device_id'] ?? null;

if (!$device_id) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Thiếu device_id'
    ]);
    exit;
}

$file = 'key.json';
$all_data = [];
$now = date("Y-m-d H:i:s");

// Nếu file không tồn tại thì tạo file rỗng
if (!file_exists($file)) {
    file_put_contents($file, json_encode([], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

// Đọc dữ liệu từ file
$json = file_get_contents($file);
$all_data = json_decode($json, true);
if (!is_array($all_data)) {
    $all_data = [];
}

$valid_data = [];
$device_found = false;

// Duyệt từng bản ghi để kiểm tra device_id
foreach ($all_data as $entry) {
    if (isset($entry['device_id']) && $entry['device_id'] === $device_id) {
        $device_found = true;

        // Nếu còn hạn sử dụng thì trả về link cũ
        if (isset($entry['time_left']) && $entry['time_left'] > $now) {
            echo json_encode([
                'status' => 'success',
                'link' => $entry['link'],
                'message' => 'Link đã tồn tại và còn hạn'
            ]);
            exit;
        }

        // Nếu hết hạn thì không thêm lại entry này
    } else {
        $valid_data[] = $entry; // Giữ lại entry khác
    }
}

// Nếu không tìm thấy hoặc hết hạn → tạo link mới
$new_key = md5($device_id . "_" . $now);
$link_goc = "}";

// API rút gọn link
$api_token = ';
$encoded_url = urlencode($link_goc);
$api_url = "";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);
$short_link = false;

if ($result && isset($result["status"]) && $result["status"] === 'success' && isset($result["shortenedUrl"])) {
    $short_link = $result["shortenedUrl"];
}

// Nếu không rút gọn được thì báo lỗi
if (!$short_link) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Không thể rút gọn link',
        'debug' => $result
    ]);
    exit;
}

// Tính thời gian hết hạn sau 24 tiếng
$expired_time = date("Y-m-d H:i:s", strtotime($now) + 86400);

// Tạo bản ghi mới
$new_entry = [
    'device_id' => $device_id,
    'link' => $short_link,
    'key' => $new_key,
    'type' => 'Free',
    'time_left' => $expired_time
];

// Thêm vào dữ liệu hợp lệ
$valid_data[] = $new_entry;

// Ghi lại file
file_put_contents($file, json_encode($valid_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

// Trả kết quả thành công
echo json_encode([
    'status' => 'success',
    'link' => $short_link,
    'message' => 'Tạo mới link và lưu thành công'
]);
