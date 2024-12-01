# Mutations:
## gegevens-1:
* Aantal kolommen bij missende ID gelijk gemaakt middels het toevoegen van ',' karakters
* onbekend karakter: '�' vervangen door euro teken
* Semicolons verwijderd
* "-tekens kloppend gemaakt.


>[!NOTE]
Input file voor gegevens-1 handmatig kloppend gemaakt. Beargumentatie:
incidentele invoer bestanden mogen handmatig aangepast worden,
en in het geval dat het een uploadloadbaar bestand was geweest waren
er validaties in plaats geweest om te zorgen dat de inhoud conform de verwachtingen is.

## Transactie-* bestanden:
Amerikaanse datum notatie met '/' veranderd naar europese datum notatie met '-'
>[!NOTE] Deze operatie kan automatisch worden uitgevoerd door een eenvoudige check conditie, 
> echter is er voor gekozen dit handmatig te doen gezien het statisch aangeleverde bestanden betreft.