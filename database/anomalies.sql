CREATE TABLE anomalies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(50) NOT NULL,
    danger_level ENUM('Thấp', 'Trung bình', 'Cao', 'Thảm họa') NOT NULL,
    description TEXT CHARACTER SET utf8mb4 NOT NULL,
    status ENUM('Đang hoạt động', 'Đã vô hiệu') DEFAULT 'Đang hoạt động',
    reported_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

INSERT INTO anomalies (code, danger_level, description) VALUES
(
    'ANOM-017',
    'Trung bình',
    'Một chiếc gương khiến người soi thấy phiên bản đã chết của bản thân.'
),
(
    'ANOM-099',
    'Cao',
    'Âm thanh gõ cửa xuất hiện lúc 03:17 mỗi đêm, không xác định được nguồn.'
),
(
    'ANOM-X01',
    'Thảm họa',
    'Không thể mô tả bằng ngôn ngữ hiện tại. Hồ sơ bị niêm phong.'
);
