<?php
/**
 * Demo target page — a real-looking little service page.
 * Exploitability is unaffected: the bug is in PHP itself, before this code runs.
 */
header('Content-Type: text/html; charset=utf-8');
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Ameen Demo Service</title>
<style>
  body{font-family:-apple-system,'Segoe UI',Roboto,sans-serif;background:#0f1115;color:#e8e6df;
       display:grid;place-items:center;min-height:100vh;margin:0}
  .card{background:#171a21;border:1px solid #262b36;border-radius:16px;padding:2.4rem 3rem;text-align:center;max-width:26rem}
  h1{margin:0 0 .3rem;font-size:1.5rem}
  p{color:#9aa1ad;margin:.3rem 0}
  .ok{color:#4ade80;font-weight:700}
  footer{margin-top:1.4rem;font-size:.75rem;color:#5b6270}
</style>
</head>
<body>
  <div class="card">
    <h1>Ameen Demo Service</h1>
    <p>Status: <span class="ok">● operational</span></p>
    <p>PHP <?= PHP_VERSION ?> · <?= php_sapi_name() ?> · up and serving</p>
    <footer>status page · mohamedameen.in · <?php echo date('Y-m-d H:i'); ?></footer>
  </div>
</body>
</html>
