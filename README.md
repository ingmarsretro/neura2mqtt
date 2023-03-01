# neura2mqtt 
first release February 2023

php headless browser to parse Neura Waermepumpen with WebDialog System.
This script was written by Mario Wehr and adapted by Ingmar Bihlo
Tts purpose is to parse the webserver of the heatpump to send status
data via mqtt topics to a mqtt broker.

to be able to run this script, you need a e.g. raspberry server as communication 
device between the heatpump and the mqtt broker. This "raspberry server" needs at least
a php8 cli runtime and some modules.
edit the user.php file with your Neura Webdialog login data and place the ip adresses of your
heatpump and the mqttboker server.
example of user.php file 


// user and ip address settings
$mqttIpdaddress = '192.168.0.110';  //ip adress from mqtt broker
$ipaddressNeura = '192.168.0.233';  //ip address from neura server
$mqttPort = '1883';  //portnumber from mqtt broker
$neuraUser = 'neura'; //login name from Neura WebDialog
$neuraPass = 'test1234'; //password from Neura WebDialog


place the files of this project within a folder on your raspberry e.g. \home\neura2mqtt
and run the script like:  $pi> sudo php \home\neura2mqtt\neura2mqtt.php 
if you have the mqtt explorer running there should apply a new entry called Neura with some
topics containing your heatpump status data

to run it automated continued creat a cronjob on your raspi to trigger it eg. every 5 minutes


de:
php headless browser zum Parsen von Neura Waermepumpen mit WebDialog System.
Dieses Skript wurde von Mario Wehr geschrieben und von Ingmar Bihlo angepasst
Sein Zweck ist es, den Webserver der Wärmepumpe zu parsen, um Status
Daten über mqtt Topics an einen mqtt Broker zu senden.

Um dieses Skript ausführen zu können, benötigen Sie z.B. einen Raspberry Server als Kommunikations 
zwischen der Wärmepumpe und dem mqtt-Broker. Dieser "Raspberryserver" benötigt mindestens
eine php8 cli Laufzeitumgebung und ein paar Module.
Editieren Sie die Datei user.php mit Ihren Neura Webdialog Anmeldedaten und setzen Sie die IP-Adressen Ihrer
Wärmepumpe und des mqttboker-Servers ein.
Beispiel einer user.php Datei

// user and ip address settings
$mqttIpdaddress = '192.168.0.110';  //ip adress from mqtt broker
$ipaddressNeura = '192.168.0.233';  //ip address from neura server
$mqttPort = '1883';  //portnumber from mqtt broker
$neuraUser = 'neura'; //login name from Neura WebDialog
$neuraPass = 'test1234'; //password from Neura WebDialog

Legen Sie die Dateien dieses Projekts in einem Ordner auf Ihrem Raspberry ab, z.B. \home\neura2mqtt
und führen Sie das Skript wie folgt aus:  $pi> sudo php \home\neura2mqtt\neura2mqtt.php 
Wenn Sie den mqtt-Explorer laufen lassen, sollte ein neuer Eintrag namens Neura mit einigen
Themen, die Ihre Wärmepumpen-Statusdaten enthalten

um es automatisch weiterlaufen zu lassen, erstellen Sie einen Cronjob auf Ihrem Raspi, der es z.B. alle 5 Minuten auslöst


Übersetzt mit www.DeepL.com/Translator (kostenlose Version)