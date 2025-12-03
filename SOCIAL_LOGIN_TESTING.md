# Social Login Fix - Summary & Testing

## Changes Made

### 1. Enhanced SocialController (`app/Http/Controllers/SocialController.php`)

**Improvements:**

-   ✅ Added error handling (try-catch for OAuth failures)
-   ✅ Email validation (ensure provider returns email)
-   ✅ Role assignment (default PATIENT, auto-fetches from DB)
-   ✅ Session injection (if DOCTOR role, inject doctor data into session like AuthController)
-   ✅ Role-based redirect (ADMIN → admin dashboard, DOCTOR → doctor dashboard, PATIENT → patient dashboard, SUPPORTER → home)
-   ✅ Avatar fallback (uses placeholder if provider doesn't provide avatar)
-   ✅ Secure password generation (uses `Hash::make()` with unique token instead of hardcoded passwords)

### 2. Updated Routes (`routes/web.php`)

**Changes:**

-   Added route name `google.callback` to `/auth/google/callback`
-   Facebook login removed from the project; related routes were deleted.
-   This ensures routes can be referenced by name in redirects and configurations

### 3. Fixed .env Configuration

**Changes:**

-   Changed `GOOGLE_REDIRECT_URI` → `GOOGLE_REDIRECT_URL` (to match `config/services.php`)
-   Changed `FACEBOOK_REDIRECT_URI` → `FACEBOOK_REDIRECT_URL` (to match `config/services.php`)

### 4. Created OAuth Documentation (`OAUTH_SETUP.md`)

Comprehensive guide for setting up Google & Facebook OAuth apps with step-by-step instructions.

---

## How to Test

### Test Environment Setup

1. **Ensure dev server is running:**

    ```bash
    php artisan serve
    ```

    (Default: http://localhost:8000)

2. **Verify .env is configured** (check credentials are in `.env`):

    ```bash
    grep -E 'GOOGLE_' .env
    ```

3. **Clear caches** (to ensure new config is loaded):
    ```bash
    php artisan config:clear
    php artisan route:clear
    php artisan cache:clear
    ```

---

### Manual Testing Steps

#### Test 1: Google Login Flow

1. Go to http://localhost:8000/login
2. Click **Google** button
3. You will be redirected to Google login page
4. Login with your Google account
5. Google will ask for permission (first time)
6. You'll be redirected back to your app with user created/logged in
7. **Expected behavior:**
    - User created in DB with email from Google, role = PATIENT
    - Session should have `doctor` object if role = DOCTOR
    - Redirect based on role (should go to patient dashboard if PATIENT)
8. **Check logs** if any error:
    ```bash
    tail -f storage/logs/laravel.log
    ```

#### Test 2: Facebook Login Flow

> Facebook login flow removed — skip this test.

#### Test 3: Error Scenarios

**Scenario 1: Invalid OAuth Credentials**

-   Go to http://localhost:8000/login
-   Click Google
-   Should redirect to login with error message: "Đăng nhập Google thất bại. Vui lòng thử lại."

**Scenario 2: User Without Email**

-   Some OAuth providers might not return email
-   Controller will redirect to login with error: "Không thể lấy email từ tài khoản Google/Facebook..."

**Scenario 3: Existing User Login Again**

-   If you already have a user with the same email in DB
-   Social login should find existing user and log in (not create duplicate)
-   Check DB to verify only 1 user row

---

### Database Verification

**Check user created from social login:**

```sql
SELECT id, name, email, avatar, role_id, created_at FROM users WHERE email = 'your-social-email@example.com';
```

**Check role assignment:**

```sql
SELECT u.id, u.name, r.name as role_name FROM users u
LEFT JOIN roles r ON u.role_id = r.id
WHERE u.email = 'your-social-email@example.com';
```

**If you used doctor account** (with DOCTOR role), check session was injected:

```php
// In any controller/middleware after login
dd(session('doctor'));
```

---

### Browser Console / Network Testing

1. Open browser DevTools (F12)
2. Go to **Network** tab
3. Try social login
4. Look for requests:
    - `auth/google` or `auth/facebook` → should redirect (302)
    - `accounts.google.com` or `facebook.com` → OAuth provider redirect
    - `auth/google/callback` or `auth/facebook/callback` → final redirect from provider
5. Verify final redirect goes to expected dashboard (check 302/301 response `Location` header)

---

### Session Data Check

After social login, you can manually verify session data:

```bash
# In tinker
php artisan tinker

> auth()->user()  // Should show logged in user
> session('doctor')  // Should show doctor data if role is DOCTOR
> auth()->user()->role  // Should show role relation
```

---

### Full Integration Test (Automated)

If you want to write feature tests (optional):

```php
// tests/Feature/SocialLoginTest.php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class SocialLoginTest extends TestCase
{
    public function test_google_callback_creates_user()
    {
        // Simulate Socialite response
        $this->mock('Laravel\Socialite\Contracts\Provider', function ($mock) {
            $mock->shouldReceive('user')->andReturn((object)[
                'id' => 123,
                'name' => 'Test User',
                'email' => 'test@google.com',
                'avatar' => 'https://example.com/avatar.jpg',
            ]);
        });

        // Call callback
        $response = $this->get('/auth/google/callback');

        // Verify user was created
        $this->assertDatabaseHas('users', ['email' => 'test@google.com']);

        // Verify user is logged in
        $this->assertTrue(Auth::check());
    }
}
```

Run with: `php artisan test`

---

## Troubleshooting

### Issue: "Invalid redirect_uri"

**Solution:**

1. Check `.env` has correct redirect URLs:
    ```
    GOOGLE_REDIRECT_URL=http://localhost:8000/auth/google/callback
    ```
2. Go to Google Console / Facebook Developers and verify registered redirect URIs match

### Issue: "User doesn't have email"

**Solution:**

-   Some OAuth providers require email permission
-   In Google: Ensure `https://www.googleapis.com/auth/userinfo.email` scope
-   In Facebook: Ensure `email` permission in settings
-   Controller will show error message

### Issue: "Signed in user but no redirect"

**Solution:**

-   Check `$user->role` relation exists
-   Verify `role_id` is set in users table
-   Check routes `bacsilog`, `benhnhanlog`, `quantrivienlog` exist

### Issue: "Session empty after login"

**Solution:**

-   Only DOCTOR role gets session injection
-   For other roles, use `auth()->user()` instead
-   Check `session('doctor')` only in doctor-specific pages

---

## Production Checklist

-   [ ] Update `.env` redirect URLs to production domain (e.g., `https://yourdomain.com/auth/google/callback`)
-   [ ] Add production domain to Google OAuth Authorized redirect URIs
-   [ ] Add production domain to Google OAuth Authorized redirect URIs
-   [ ] Test on staging server before production
-   [ ] Monitor logs for any OAuth errors
-   [ ] Ensure HTTPS is enabled on production (OAuth requires HTTPS for production)
-   [ ] Update `APP_URL` in `.env` to production URL

---

Questions or issues? Check `storage/logs/laravel.log` for detailed error traces.
