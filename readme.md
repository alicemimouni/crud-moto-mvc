Partie théorique :

__get : permet d'accéder à un attribut privé ou qui n'existe pas, sans le modifier.

	ex: public function __get($price) {
		}

__set: permet de modifier un attribut privé ou qui n'existe pas.

	ex: public function __set($ancienneValeur, $nouvelleValeur){}

__isset: on l'appelle quand on utilise la fonction isset().

	ex: public function __isset($age) {
		return isset();
	}

__unset: on l'appelle qunad on utilise la fonction unset().

	ex: public function __unset($name) {
		unset();
	}

__sleep: permet de filtrer ce que l'on veut afficher, s'utilise avec serialize.

	ex: public function __sleep() {
		return ['name'];
	}