# Chapter 2 - First steps

Nun haben wir eine vollwertige TYPO3 Installation am laufen, ggf. haben wir schon unsere ersten Seiten und Content Elemente angelegt.

Nun wollen wir aber eine eigene kleine Extension welche uns entsprechende Logiken mit bringt erstellen.

Hierzu habe ich dir einmal was vorbereitet.
Wir wollen uns in unserem Fall auf die entsprechende TYPO3 Extensionentwicklung fokussieren und nicht auf die TYPO3 Extension Integration, 
daher habe ich eine entsprechende Sitepackage Extension mit einem einfachen Bootstrap Template bereitgestellt, die wir für eine Visualisierung nehmen können.

## Installation
Wir legen doe entsprechenden Extensions "sitepackage" und "guestbook" in unserem Projekt Root in das Verzeichnis packages.
Nun haben wir die Möglichkeit eine Abhängigkeit in unserer Projekt composer.json zu definieren, welche dafür sorgt, dass die Extensions korrekt installiert werden.

In unserem Fall erzeugt Composer ein Symlink von packages/EXTENSION_NAME nach vendor/VENDOR_NAME/EXTENSION_NAME.

Wozu ist das gut?

Composer verwaltet nicht nur PHP Abhängigkeiten, sondern baut ebenfalls nach PSR-4 den Autoload auf. Der Autoload ist für die saubere Instanziierung von Klassen in der richtigen Reihnfolge notwendig.
Der Autoload kann von Composer nur mit dem Vendor Ordner erstellt werden.

Wir pflegen nun die Abhängigkeit in unserer Projekt composer.json und führen dannach ein composer update aus.

> Best-Practise Tipp:
> führe nicht ein `composer update` aus, sondern lediglich ein `composer update VENDOR_NAME/EXTENSION_NAME` und installiere die Pakete einzeln.
> Ein Composer Update aktualisiert alle angegebenen Abhängigkeiten. Es kann somit zu Breaking-Changes kommen oder anderen ungewollten Seiteneffekten.

## sitepackage Registrierung
> Das erst nach dem wir die Installation mittels composer vorgenommen haben.

Damit wir die Sitepackage Extension nicht innerhalb der Datenbank mittels static_file_includes oder TypoScript Import Statements importieren müssen,
erstellen wir uns lieber ein SiteSet und registrieren es für unsere entsprechende Base Domain.

Hierzu muss folgender Code in die Datei config/sites/SITE_IDENTIFIER/config.yaml
```yaml
dependencies:
  - mceikens/sitepackage
```