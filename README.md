# Đồ án Tốt nghiệp Đại Học
# Xây dựng hệ thống diễn tập tấn công phòng thủ
## CTF AWD Caridinal x Wazuh x Snort x Web Vulner
## Mô tả
### Web 01
- SQL injection
- Upload file độc hại
## Web 02
- IDOR
## Kịch bản
- Kịch bản 1 : Tấn công và ngăn chặn cuộc tấn công DDOS
```
-	Attacker: Thực hiện tấn công DDos vào website của nạn nhân
-	Máy chủ tính điểm: Thực hiện kiểm tra hoạt động của các thử thách. Phát hiện máy chủ của đội 1 đã không còn hoạt động. Tiếng hành trừ điểm
-	Giám sát: Phát hiện tấn công DDos bằng Snort
-	Phòng thủ: Ngăn chặn bằng cách block IP của attacker bằng Snort. Không bị trừ điểm nữa
```
- Kịch bản 2 : Tấn công và ngăn chặn tấn công SQL injection
```
-	Attacker: Thực hiện tấn công lỗ hổng SQL injection vào website của nạn nhân. Thực hiện RCE để lấy flag. Gửi flag và tính điểm
-	Máy chủ tính điểm: Thực hiện kiểm tra hoạt động của các thử thách. Xác thực flag của thử thách. Thực hiện trừ điểm khi flag đúng
-	Giám sát: Phát hiện tấn công nhờ vào snort để phát hiện tấn công SQL injection. Và sử dụng Wazuh để phát hiện shell mà kẻ tấn công thực hiện
-	Phòng thủ: Thực hiện cấu hình WAF Modsecurity ngăn chặn tấn công SQL injection.
```
- Kịch bản 3 : Tấn công và ngăn chặn tấn công vào CSDL
```
-	Attacker: Dò tìm thấy máy chủ của đội khác đang mở port 3306 là port mysql. Thực hiện tấn công dò tìm mật khẩu. Tìm tài khoản mysql thành công, tiến hành RCE vào máy chủ và lấy flag có điểm
-	Máy chủ tính điểm: Thực hiện kiểm tra hoạt động của các thử thách. Xác thực flag của thử thách. Thực hiện trừ điểm khi flag đúng
-	Giám sát: Phát hiện tấn công nhờ Wazuh phát hiện thực thi lệnh từ xa. Tiến hành điều tra thêm ta thấy ứng dụng đã được đăng nhập remote từ xa qua mysql.
-	Phòng thủ: Thực hiện tắt truy cập từ xa của mysql trên máy chủ
```
- Kịch bản 4 : Tấn công và ngăn chặn tấn công Upload file độc hại
```
-	Attacker: Thực hiện tấn công lỗ hổng Upload file của ứng dụng. Khai thác thực thi lệnh từ xa RCE. Lấy flag và nhận điểm
-	Máy chủ tính điểm: Thực hiện kiểm tra hoạt động của các thử thách. Xác thực flag của thử thách. Thực hiện trừ điểm khi flag đúng
-	Giám sát: Wazuh để phát hiện shell mà kẻ tấn công thực hiện
-	Phòng thủ: Thực hiện điều tra chức năng có lỗ hổng. Xác định vấn đề và fix code để không khai thác được nữa
```
- Kịch bản 5 : Tấn công và ngăn chặn tấn công Nâng cao đặc quyền
```
-	Attacker: Thực hiện tấn công chiếm quyền truy cập của tài khoản admin thông qua lỗ hổng nâng cao đặc quyền. Thực hiện chức năng của Admin lấy flag và nhận điểm.
-	Máy chủ tính điểm: Thực hiện kiểm tra hoạt động của các thử thách. Xác thực flag của thử thách. Thực hiện trừ điểm khi flag đúng.
-	Phòng thủ: Thực hiện điều tra chức năng có lỗ hổng. Xác định vấn đề và fix code để không khai thác được nữa.
```
## Reference
https://cardinal.ink/
https://wazuh.com/blog/web-shell-attack-detection-with-wazuh/
https://documentation.wazuh.com/current/index.html
