import fs from 'fs';
import path from 'path';

export default function handler(req, res) {
  const ip = req.headers['x-forwarded-for']?.split(',')[0] || req.socket.remoteAddress;
  const dataFile = path.join(process.cwd(), 'data.json');

  // Đọc file data.json hoặc tạo mới nếu chưa có
  let db = {};
  if (fs.existsSync(dataFile)) {
    db = JSON.parse(fs.readFileSync(dataFile, 'utf8'));
  }

  const now = Date.now();
  const oneHour = 60 * 60 * 1000;

  // Nếu IP đã có trong DB và chưa hết hạn
  if (db[ip] && now < db[ip].expire) {
    return res.status(200).json({
      success: true,
      key: db[ip].key,
      createdAt: db[ip].createdAt,
      expireAt: db[ip].expire
    });
  }

  // Tạo key mới
  const chars = 'abcdef0123456789';
  let key = '';
  for (let i = 0; i < 32; i++) {
    key += chars[Math.floor(Math.random() * chars.length)];
  }

  db[ip] = {
    key,
    createdAt: now,
    expire: now + oneHour
  };

  // Ghi lại vào file
  fs.writeFileSync(dataFile, JSON.stringify(db, null, 2));

  res.status(200).json({
    success: true,
    key: db[ip].key,
    createdAt: db[ip].createdAt,
    expireAt: db[ip].expire
  });
}
