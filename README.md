# wp-blog

## Sass Development

### Cài đặt và Sử dụng Live Sass Compiler

1. Cài đặt extension "Live Sass Compiler" trong VSCode
2. Cấu hình Live Sass Compiler trong settings.json:
```json
{
    "liveSassCompile.settings.formats": [
        {
            "format": "expanded",
            "extensionName": ".css",
            "savePath": "/css"
        }
    ]
}
```
3. Click vào "Watch Sass" ở thanh trạng thái VSCode để bắt đầu biên dịch
4. File SCSS sẽ tự động được biên dịch thành CSS khi lưu

**Lưu ý:** Đảm bảo tạo thư mục `/css` để lưu các file CSS được biên dịch