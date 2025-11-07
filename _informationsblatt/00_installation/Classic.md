# Installation

> Bitte entscheide dich für eine von beiden Varianten, entweder die klassische Installation oder mit Containern

## Klassische Installation (Binaries auf dem Rechner)
Sehr geehrte Teilnehmende,

bis zum Workshop, zum Thema “Extensionentwicklung für TYPO3” beim TYPO3Camp RheinRuhr, ist es nun nicht mehr lang. Damit wir reibungslos starten können, bitten wir euch vorab einige Programme zu installieren.

Hierzu zählen:
- PHP in Version 8.4
- Webserver (Apache2 oder NGINX)
- SQL Server (MySQL oder MariaDB)

Dies kannst du mittels XAMPP oder LAMP umsetzen.
- [XAMPP](https://www.apachefriends.org/de/index.html)
- [LAMP](https://ampps.com/lamp/)

> Beachte bitte, dass alle notwendigen PHP Extension Module installiert und aktiv sind, die TYPO3 im Standard benötigt.
> Über die PHP Standard Extensions, welche TYPO3 benötigt wird darüber hinaus keine weiteren benötigt.


Des Weiteren benötigen wir:
- Composer [Dokumentation](https://getcomposer.org/)
- GIT [Dokumentation](https://git-scm.com/)


## Funktionale Prüfung
#### GIT
Versuche auf der Commandozeile:
```bash
git --version
```

Du solltest nun ein Ergebnis bekommen in dem steht welche deine aktuelle GIT Version ist. Falls nicht, durchsuche die GIT Application Logs um mehr zu erfahren.

#### XAMPP / LAMP
Applikation lässt sich über die GUI starten?
Webserver lässt sich starten und eine Beipielseite ist erreichbar?
Datenbank Server lässt sich starten und ist erreichbar?

Falls nicht bitte durchsuche die dir zur Verfügung gestellten Logs und behebe das Problem. 


#### Composer
Versuche auf der Commandozeile:
```bash
composer --version
```

Du solltest nun ein Ergebnis erhalten, welches dir die aktuell installierte Composer Version ausgibt.
