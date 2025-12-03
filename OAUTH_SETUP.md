# OAuth Setup Guide (Google & Facebook)

Hướng dẫn cấu hình đăng nhập qua Google và Facebook cho HealthBooker.

## 1. Google OAuth Setup

### Bước 1: Truy cập Google Cloud Console

1. Vào https://console.cloud.google.com/
2. Tạo project mới hoặc chọn project hiện có.
3. Vào **APIs & Services** > **Credentials**

### Bước 2: Tạo OAuth 2.0 Client ID

1. Click **Create Credentials** > **OAuth client ID**
2. Chọn **Web application**
3. Thêm Authorized JavaScript origins:
    ```
    http://localhost:8000
    http://127.0.0.1:8000
    https://yourdomain.com (for production)
    ```
4. Thêm Authorized redirect URIs:
    ```
    http://localhost:8000/auth/google/callback
    https://yourdomain.com/auth/google/callback (for production)
    ```
5. Copy **Client ID** và **Client Secret**

### Bước 3: Cập nhật .env

```dotenv
GOOGLE_CLIENT_ID=your-client-id-here
GOOGLE_CLIENT_SECRET=your-client-secret-here
GOOGLE_REDIRECT_URL=http://localhost:8000/auth/google/callback
```

---

## 2. Facebook OAuth Setup

> Facebook login has been removed from this project. The instructions below have been retained for archival purposes only.

---

## 3. Production Setup (Changeover from localhost)

Khi deploy lên production, cập nhật:

-   `.env` với domain thực tế (thay `localhost:8000` bằng `yourdomain.com`)
-   Google Cloud Console: thêm domain mới vào **Authorized JavaScript origins** và **redirect URIs**
-   Facebook Developers: thêm domain mới vào **Valid OAuth Redirect URIs**
-   Đảm bảo `APP_URL` trong `.env` = domain thực tế

---

## 4. Troubleshooting

**Lỗi: "Invalid redirect_uri"**

-   Kiểm tra `.env` callback URL match với Google/Facebook settings.
-   Kiểm tra `config/services.php` dùng key nào từ `.env`.

**Lỗi: "User doesn't have email"**

-   User có thể chưa verify email trên Google/Facebook.
-   Controller sẽ redirect về login với error message.

**Lỗi: "Route not found"**

-   Kiểm tra routes trong `routes/web.php` có tên đúng: `google.login`, `google.callback`, `facebook.login`, `facebook.callback`.

-   Kiểm tra routes trong `routes/web.php` có tên đúng: `google.login`, `google.callback`.

---

## 5. Testing Locally

1. Khởi động dev server:

    ```bash
    php artisan serve
    ```

2. Vào http://localhost:8000/login

3. Click "Google" hoặc "Facebook" button

4. Bạn sẽ bị redirect sang Google/Facebook login

5. Sau khi login, Socialite sẽ callback về `http://localhost:8000/auth/google/callback` (hoặc Facebook)

6. Controller sẽ tạo/update user và redirect theo role (ADMIN, DOCTOR, PATIENT, SUPPORTER)

---

## 6. Code Overview

-   **Controller**: `app/Http/Controllers/SocialController.php`
    -   `redirectGoogle()` / `callbackGoogle()`
    -   `redirectFacebook()` / `callbackFacebook()`
-   **Routes**: `routes/web.php` (lines 121-124)
-   **Config**: `config/services.php`
-   **View**: `resources/views/auth/login.blade.php` (social login buttons)

---

## 7. Features

✅ Auto-create user from social provider email  
✅ Assign default role (PATIENT)  
✅ Error handling (invalid email, callback failure)  
✅ Session injection for DOCTOR role  
✅ Role-based redirect (ADMIN → admin dashboard, DOCTOR → doctor dashboard, etc.)  
✅ Avatar fallback

---

Nếu có vấn đề, check `storage/logs/laravel.log` để xem error details.
