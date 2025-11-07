# Vorbereitung

Falls du dich für die Container Umgebung entschieden hast, kannst du gerne einmal das mitgelieferte Setup austesten.

> Bevor du das Setup mittels docker compose up -d o.ä. startest, musst du deine persönliche GID und UID ermitteln.

## Persönliche UID und GID ermitteln
Auf Unix Umgebung geht das wie folgt:
```bash
id -u
```
```bash
id -g
```

Auf Windows muss entsprechend geschaut werden.

Diese Informationen müssen dem entsprechend in der compose.yaml in die Environment Informationen des PHP Containers geschrieben werden.
Diese ersetzen die bestehenden Informationen PUID=1000 und PGID=1001

Diese Informationen werden für eine korrekte Ownership der Daten benötigt.

Sobald du das alles erledigt hast, kannst du mit dem Setup starten.

```bash
docker compose up -d
```