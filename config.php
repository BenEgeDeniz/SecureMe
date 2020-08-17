<?php

/*

  SecureMe Konfigürasyon Dosyası

  Aşağıdaki değerleri isteginize göre ayarlayın.

*/


// Kötü Bot Koruması 

$badBotDetection = true; // true = aktif, false = pasif
$badBotMsg = "<strong>SecureMe hatası: Kötü bot olarak algılandınız.</strong>"; // Kötü bot algılandığında istemciye döndürülecek mesajdır. HTML kullanılabilir.


// SQL Injection Korumasu

$sqlInjectionProtection = true; // true = aktif, false = pasif
$sqlInjectionRemove = true; // SQL injection sağlayan karakterleri silip işlemlere devam eder. Hata mesajı gösterilmez. true = aktif, false = pasif
$sqlInjectionMsg = "<strong>SecureMe hatası: Zaralı karakterler algılandı.</strong>"; // SQL injection algılandığında istemciye döndürülecek mesajdır. HTML kullanılabilir.


// XSS Koruması

$xssFiltration = true; // true = aktif, false = pasif
$xssFiltrationRemove = true; // XSS açığını sağlayan karakterleri silip işlemlere devam eder. Hata mesajı gösterilmez. true = aktif, false = pasif
$xssFiltrationMsg = "<strong>SecureMe hatası: Zaralı karakterler algılandı.</strong>"; // SQL injection algılandığında istemciye döndürülecek mesajdır. HTML kullanılabilir.

// HSTS Kuralı

$hstsStatus = true; // true = aktif, false = pasif


// Clickjaking Koruması

$clickjackingProtection = true; // true = aktif, false = pasif


// PHP Versiyon Gizleme

$phpVersionHide = true; // true = aktif, false = pasif

?>