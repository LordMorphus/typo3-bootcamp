# Installationsanweisung

> Bitte entscheide dich für eine von beiden Varianten, entweder die klassische Installation oder mit Containern

## Container
Sehr geehrte Teilnehmende,

bis zum Workshop, zum Thema “Extensionentwicklung für TYPO3” beim TYPO3Camp RheinRuhr, ist es nun nicht mehr lang. Damit wir reibungslos starten können, bitten wir euch vorab einige Programme zu installieren.

Hierzu zählen:

### Editor (IDE)
Empfehlenswerte Editoren sind IDE’s von JetBrains-Pakete oder VSCode von Microsoft.

### GIT (Versionskontrolle)
Zwischenstände versionieren hilft Probleme vorzubeugen.
Bitte installiere dir GIT.

- [Dokumentation](https://git-scm.com/)

#### Funktionale Prüfung
Versuche auf der Commandozeile:
```bash
git --version
```

Du solltest nun ein Ergebnis bekommen in dem steht welche deine aktuelle GIT Version ist. Falls nicht, durchsuche die GIT Application Logs um mehr zu erfahren.


### Docker (Container Engine)
Innerhalb des Workshops können wir mit Container arbeiten. Container bieten uns die Möglichkeit ein einheitliches Setup zu haben. Entscheide dich bitte ob du mit Docker oder Podman arbeiten möchtest, beide Varianten sind kompatibel.

Für Windows-Nutzer besteht hier eine pot. höhere Installationsproblematik. Für die Container Engine wird entweder WSL oder Hyper-V benötigt bzw entsprechend konfiguriert. Dies kann der folgenden Anleitung entnommen werden: 
- [WSL installieren](https://learn.microsoft.com/de-de/windows/wsl/install)

Sofern möglich, empfehlen wir aus diversen technischen Gründen auf WSL zu setzen. Hyper-V verlangsamt die Umgebung massiv und verbraucht Unmengen an Computer Kapazitäten.

Für Docker: [Docker Desktop](https://docs.docker.com/desktop/)

### Funktionale Prüfung
Um zu gewährleisten, dass alles reibungslos funktioniert, müssen wir folgende Punkte prüfen:

#### Firmeninterne Netzwerk Schicht / Proxy
Können wir Container Images von Registries wie [Docker Hub](https://hub.docker.com/) downloaden per Docker CLI?
Hierzu führen wir folgenden Befehl in einer der o.g. Terminal Programme aus:

```bash
docker pull nginx:latest
```

und einmal:

```bash
docker pull registry.mceikens-infra.de/external/php-dev-fpm-84:v1.7
```

Sollte hier kein erfolgreicher Download möglich sein, müssen die Proxy Settings im Docker angepasst werden. [Daemon proxy configuration](https://docs.docker.com/engine/daemon/proxy/)
> Sollte auch dies zu keinem Erfolg führen, melde dich bitte bei uns direkt: Kontakt dialog@mceikens.de

#### Lauffähiger Docker Daemon
Können Container Images, wie das NGINX, grundlegend ausgeführt werden?

Hierzu starten wir nun erst einmal ein Docker Image wie das soeben heruntergeladene NGINX Image:

```bash
docker run --name test -d nginx:latest
```
Entsprechend sollte nun eine Container ID in die Bash ausgegeben werden.
Danach, um ganz sicher zu gehen, führen wir folgenden Befehl aus:
```bash
docker ps
```
Ist auch hier entsprechendes Image zu sehen, so läuft der Container.
Im Zweifelsfall, wird eine klare Fehlermeldung in die Bash ausgeworfen, mit dieser kann man entsprechend den Fehler im Internet selbst finden.

Nach dem dieser Schritt durchlaufen ist, werden wir den Container einmal löschen müssen um die folgenden Schritte nicht zu stören.

```bash
docker rm test
```

### Lokale Netzwerkschicht
Kann ich meinen Container von meinem Host System heraus erreichen?
Die können wir mit folgendem Befehl prüfen:

```bash
docker run --name test -p 80:80 -d nginx:latest
```
Auch hier sollte nun eine entsprechende Container ID in die Bash ausgegeben werden und mittels des “docker ps” Befehls dürfte hier nun ebenfalls ein Container sichtbar sein.
Im Browser sollte nun über http://localhost eine Standard NGINX Seite sichtbar sein.

Sollte dies nicht der Fall sein, muss auch hier im Docker Daemon die IP Ranges für die jeweiligen Container eingestellt werden, sodass hier kein IP-Adressen Konflikt vorliegt.