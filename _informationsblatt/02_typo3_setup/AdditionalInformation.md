# Composer

### Überblick

Die `composer.json` ist die Datei welche uns es ermöglicht PHP Pakete aus verschiedenen Quellen geordnet zu installieren.
Innerhalb der composer.json finden sich Informationen wie z.B.:
*repositories*
Hier wird angegeben aus welchen Quellen wollen wir welche Pakete beziehen
*requirements*
Die konkreten Angaben, welche Pakete in welcher Version installiert werden sollen.
> Wichtig! Hier müssen wir nicht die konkrete Version angeben, es reicht wenn wir hier mit Wildcards arbeiten.

Composer ermittelt auf Grundlage der jeweilig definierten Requirements eigenständig welche Version installiert werden soll / kann.
Circum-flex (^):
- Erlaubt alle nicht-brechenden Updates (nach SemanticVersioning)
- Das heißt: Alles bis aber nicht einschließlich der nächsten Major Version
- z.B.: ^13

Tilde (~):
- Erlaubt Updates innerhalb der gleichen Minor-Version (oder Major, wenn keine Minor angegeben ist).
- Du bekommst also Bugfixes, aber keine neuen Features aus der nächsten Minor.
- z.B.: ~13.4


Asterix (*):
- Platzhalter: erlaubt jede Version, die in das angegebene Schema passt.
- z.B.: 13.*


Klare Empfehlung: Immer mit dem Circum-flex arbeiten.
Asterix bietet keine klare Kontrolle über die konkrete Version, Tilde installiert dir nicht die aktuellsten Versionen mit ggf. Features.


### Versionierung
PHP hat das Problem, dass es zur Ausführung den Code der jeweiligen Bibliotheken benötigt, es wird am Ende des Tages keine vollertige Datei durch Kompiliierung erstellt o.ä.
Das heißt wir müssen dafür sorgen, dass die verwendeten Bibliotheken zur Laufzeit der Applikation vorhanden sind.

Composer ist so freundlich und erstellt und eine Datei mit den Informationen, welche alle Abhändigkeiten, mit der Herkunft, der konkret installierten Version und vieles mehr enthält.
Das heißt wir müssen nicht den gesamten Vendor Ordner in unsere Versionsverwalung (git, svn, etc) speichern, sondern müssen lediglich die composer.json und composer.lock speichern.

> Wichtig! Git ist vom Konzept so aufgebaut, dass jeglicher Commit, Branch und der gleichen entsprechende Git Objects erzeugt und die vorherigen "dupliziert".
> Das heißt wenn ihr den Vendor Ordner oder node_modules Ordner in Git versioniert, müllt ihr schnell eure Projekte unnötig zu.
> Diese Änderungen lassen sich auch nicht mehr aus einem bestehenden GIT Repository entfernen. Einmal drin, für immer verloren.

Mehr zum Thema Composer: [Dokumentation](https://getcomposer.org/)
