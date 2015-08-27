<?php
// Active-Status
if ( $thisPage=="aktuelles") { $current = 'aktuelles' ;}
// Hotel
if ( $thisPage=="hotel") { $current = 'hotel' ;}
if ( $subPage=="zimmer") { $current = 'zimmer'; $hotel='open' ;}
if ( $subPage=="appartement") { $current = 'appartement'; $hotel='open' ;}
if ( $subPage=="fruehstueck") { $current = 'fruehstueck'; $hotel='open' ;}
if ( $subPage=="preise") { $current = 'preise'; $hotel='open' ;}
if ( $subPage=="galerie") { $current = 'galerie'; $hotel='open' ;}
// Gastronomie
if ( $subPage=="restaurant") { $current = 'restaurant'; $gastronomie='open' ;}
if ( $subPage=="bierstube") { $current = 'bierstube'; $gastronomie='open' ;}
if ( $subPage=="speisekarte") { $current = 'speisekarte'; $gastronomie='open' ;}
if ( $subPage=="gfeiern") { $current = 'gfeiern'; $gastronomie='open' ;}
if ( $subPage=="catering") { $current = 'catering'; $gastronomie='open' ;}
// Veranstaltungen
if ( $subPage=="feiern") { $current = 'feiern'; $veranstaltungen='open' ;}
if ( $subPage=="meeting") { $current = 'meeting'; $veranstaltungen='open' ;}
// Aktivitäten
if ( $subPage=="radfahren") { $current = 'radfahren'; $aktivitaeten='open' ;}
if ( $subPage=="wandern") { $current = 'wandern'; $aktivitaeten='open' ;}
if ( $subPage=="andere") { $current = 'andere'; $aktivitaeten='open' ;}
// Sehenswertes
if ( $subPage=="region") { $current = 'region'; $sehenswertes='open' ;}
if ( $subPage=="paderborn") { $current = 'paderborn'; $sehenswertes='open' ;}
if ( $subPage=="umgebung") { $current = 'umgebung'; $sehenswertes='open' ;}
// Anfrage
if ( $thisPage=="kontakt" OR $subPage=="anfrage") { $current = 'kontakt' ;}

?>