CREATE TYPE danger_level_enum AS ENUM (
    'Thấp',
    'Trung bình',
    'Cao',
    'Thảm họa'
);

CREATE TYPE anomaly_status_enum AS ENUM (
    'Đang hoạt động',
    'Đã vô hiệu'
);

CREATE TABLE anomalies (
    id SERIAL PRIMARY KEY,
    code VARCHAR(50) NOT NULL,
    danger_level danger_level_enum NOT NULL,
    description TEXT NOT NULL,
    status anomaly_status_enum DEFAULT 'Đang hoạt động',
    reported_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

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
