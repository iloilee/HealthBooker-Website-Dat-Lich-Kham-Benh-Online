$base='http://127.0.0.1:8000'
$cookie='cookiejar.txt'
& 'curl.exe' -s -c $cookie "$base/login" -o login.html
$line = Select-String -Path $cookie -Pattern 'XSRF-TOKEN' | Select-Object -First 1
if ($line) {
    $parts = ($line.Line -split "\s+") | Where-Object { $_ -ne '' }
    $token = $parts[-1]
    $decoded = [System.Uri]::UnescapeDataString($token)
    Write-Output "Found CSRF token: $decoded"
    & 'curl.exe' -s -b $cookie -c $cookie -X POST "$base/login" -H "X-XSRF-TOKEN: $decoded" -F 'email=admin@gmail.com' -F 'password=123456' -L -i -o response.html
    Write-Output "----- Response headers+body -----"
    Get-Content response.html -Raw
} else {
    Write-Output 'No XSRF token found in cookiejar'
}
