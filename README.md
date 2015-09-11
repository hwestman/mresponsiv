MRESPONSIVE

PERMALINKS
-----------

[![Join the chat at https://gitter.im/hwestman/mresponsive](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/hwestman/mresponsive?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
Må være slått på
/%category%/%year%/%postname%/

Services og Products
------------------------

- Services er en tjeneste "Til lands" og forteller noe om en ting. 
- Product er en service som har flere ting under seg feks Container som skal liste opp mange containere. 
Huk av på for å gjøre en Service til et product i custom post type. 

En enkelt container er en post som tillhører en sub-category av en category med samme navn som respektiv custom post type. Det vil si: 

1. Man en service (custom post type) Container, den har da slug= "container"
2. Man legger til en category som heter Container og får slug "container" (JA SLUGS MÅ VÆRE LIKE)
3. Man lager så en underkategori til Container som skal gruppere produktet feks. "8-fot" (dette må gjøres, kan ikke bare legge post til i container category)
3. Man lager en post "High cube 8 fots container"
4. Legger til ny post i category 8-fot
5. Nå listets product opp i sidebar til service Container

Linkene i sidebar benytter en spesiell url og linker ikke til single.php for visning, men til samme url som service slik at den kan benytte samme sidebar. (ingen SEO her og det er litt dumt)


Tabeller
---------
Tabeller i poster blir stylet manuelt i css
Det skal bare være å kopiere inn en tabellstruktur (som feks er laget i excel) inn i en post også styles den som vist her:
http://localhost/wordpress/tjenester/containere/?product=8-fot-specialcontainer


Nyheter
---------

Alle nyheter er poster med kategori "news"


Headerimgages
--------------


Logo
-------





