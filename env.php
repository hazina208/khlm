Environment Setup:

Create or edit a .env file in your project root (if using a library like vlucas/phpdotenv, load it in config.php).
Add: API_BASE_URL=http://10.0.2.2:80/kanisahalisi/api (for emulator) or use your host's IP (e.g., http://192.168.1.100:80/kanisahalisi/api) for a physical device.
In config.php, ensure you load the .env if needed (e.g., $dotenv = Dotenv\Dotenv::createImmutable(__DIR__); $dotenv->load();).

Alternative: Detect Request Host (More Robust for Production)
If you don't want to rely on .env, auto-detect the host:

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'];
$baseUrl = $protocol . $host . '/kanisahalisi/api';
$imageBase = $protocol . $host . '/kanisahalisi/uploads/upendo';