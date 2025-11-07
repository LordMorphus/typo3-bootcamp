# Chapter 1 - TYPO3 Setup

Damit wir nun entsprechend eine TYPO3 Installation starten können müssen wir dafür sorgen, dass auf unserem Zielsystem 
- PHP 8.4
- MySQL > 8 oder MariaDB > 11
- NGINX / Apache2

installiert und aktuell am laufen haben.

Sobald wir das haben können wir nun mit der Installation der PHP Pakete starten:

Erstelle dir ein eigenes Projekt, sodass dein Umgebung, expliziter dein Webserver, entsprechend an das Projekt per Index Aufruf dran kommt.
z.B.:
Projektverzeichnis: /var/www/my-project
Webserver Documentroot: /var/www/my-project/public
Projekt Root Verzeichnis /var/www/my-project

Lege in dein Projekt Root Verzeichnis die composer.json ab.


FÜhre auf der Commandozeile in deinem Projekt Root Verzeichnis folgenden Befehl aus:
```bash
composer install
```

Dies installiert dir nun munter die gesamten Pakete und platziert diese in den Ordner vendor.

Sobald die Installation erfolgreich durchlaufen wurde, führe bitte folgenden Befehl aus:

```bash
php bin/typo3 install:setup
```

Vollziehe nun den entsprechenden Wizard der Installation.
Nach der Installation hast du nun eine vollwertige TYPO3 Umgebung aufgesetzt und diese ist nun über dein konfigurierten V-Host erreichbar.
z.B.: http://localhost

Dich wird nun ein TYPO3 Fehler "anlachen". Die trustedHostsPattern müssen ggf. gesetzt werden.
Pflege dazu in der `settings.php` im Verzeichnis `config/system` folgende Einstellung:
In z.B. Zeile 120 innerhalb des Array Blocks "SYS" pflege wir nun folgenden Eintrag ein:
```php
'trustedHostsPattern' => '.*'
```

Dies hat zur Folge, dass wir die trustedHostsPattern, mehr oder weniger "deaktivieren", diese lassen nun alles zu und nicht explizite Hosts.