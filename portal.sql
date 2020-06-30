/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 8.0.20 : Database - portal
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`portal` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `portal`;

/*Table structure for table `korisnik` */

DROP TABLE IF EXISTS `korisnik`;

CREATE TABLE `korisnik` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ime` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prezime` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `korisnickoIme` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lozinka` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `razina` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `korisnickoIme` (`korisnickoIme`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `korisnik` */

insert  into `korisnik`(`id`,`ime`,`prezime`,`korisnickoIme`,`lozinka`,`razina`) values 
(10,'admin','admin','admin123','$2y$10$fTIhFXEuhjk5ugfvLY78Vu3V7Qm4YEFU5pKjj.BJb29O5pkQl6RPq',2),
(14,'asd','admin','ilirian','$2y$10$SDyTRPZSKvRcbvJJzgfp5.zw/JwF5HE.otTp.koV4U1/Huk.taQmu',0),
(15,'','','','$2y$10$BjY.mnuZBOLw6SMGIComAOxaYKSpDoGsubWiuRUyNDoonu.EWmSgq',0);

/*Table structure for table `vijesti` */

DROP TABLE IF EXISTS `vijesti`;

CREATE TABLE `vijesti` (
  `id` int NOT NULL AUTO_INCREMENT,
  `datum` date NOT NULL,
  `naslov` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sazetak` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tekst` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `slika` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kategorija` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `arhiva` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `vijesti` */

insert  into `vijesti`(`id`,`datum`,`naslov`,`sazetak`,`tekst`,`slika`,`kategorija`,`arhiva`) values 
(28,'2020-06-11','Šeks mrtav pijan uzrokovao incident','23. OŽUJKA na premijeri filma Konjanik u zagrebačkom Cinestaru, Vladimir Šeks se toliko napio da nije mogao izaći iz WC-a gdje su ga čuvali njegovi tjelohranitelji koji su još izazvali fizički incident, piše Feral dodajući da su im istinitost priče potvrdili izvori u Saboru bliski Vladimiru Šeksu.\r\n','3. OŽUJKA na premijeri filma Konjanik u zagrebačkom Cinestaru, Vladimir Šeks se toliko napio da nije mogao izaći iz WC-a gdje su ga čuvali njegovi tjelohranitelji koji su još izazvali fizički incident, piše Feral dodajući da su im istinitost priče potvrdili izvori u Saboru bliski Vladimiru Šeksu.\r\n\r\nDok je Šeks grlio školjku u WC-u kina, njegovi tjelohranitelji čuvali su ulaz kako bi predsjednik Hrvatskog sabora mogao u miru doći k sebi.\r\n\r\nNo, čini se kako ga je u tome želio spriječiti jedan od uzvanika svečane premijere filma. On se, naime želio pomokriti, no Šeksovi tjelohranitelji nisu mu dozvolili ući u jedini WC na tom katu Cinestara.\r\n\r\nKako anonimni gospodin nije želio odustati od svog nauma došlo je do naguravanja između njega i tjelohranitelja. Je li netko ozlijeđen nije poznato, no u WC uzvanik, koji je želio ostati anoniman, nije mogao ući - piše Feral.\r\n\r\nOsim što je predsjednik Sabora ljubitelj alkohola, strastveni je i pušač. Od jučer je u Saboru strogo zabranjeno pušiti, no Šeks se izborio da se njegov radni kabinet, među još nekoliko prostorija parlamenta, izuzme iz zakonske odredbe koju je potpisao tajnik Sabora Josip Sesar.\r\n\r\nJe li Šeks, takav kakav jest, sposoban kvalitetno voditi saborske sjednice, zaključite sami.\r\n\r\nŠeks je i prije 5 godina bio prozivan zbog lošeg vođenja saborskih sjednica. Dok je tadašnji predsjednik Sabora Vlatko Pavletić bio na bolovanju potpredsjednik Valdimir Šeks kao njegov zamjenik nije valjano obavljao svoj posao, tvrdili su tada zastupnici.\r\n\r\nZastupnici su, između ostalog, tvrdili kako su samo HDZ-ovci dobivali na vrijeme dnevni red, pa su se samo oni mogli pripremiti za rasprave dok sa zastupnicima ostalih stranaka to nije bio slučaj.','img/placeholder.jpg','politika',0),
(30,'2020-06-12','Jeljcin pijan u gaćama zvao taksi ispred Bijele kuće','Bivši ruski predsjednik Boris Jeljcin se tijekom posjeta Washingtonu 1995. toliko napio da su ga tajni agenti u noći pronašli nedaleko od Bijele kuće odjevenog samo u donje rublje kako pokušava dozvati taksi.\r\n\r\nIzbezumljenim agentima, koji su za njim bjesomučno tragali nakon njegova kasnonoćnog druženja s čašicom, Jeljcin je objasnio da je izveo spomenuti podvig jer je želio naručiti pizzu.\r\n','WASHINGTON - Bivši ruski predsjednik Boris Jeljcin se tijekom posjeta Washingtonu 1995. toliko napio da su ga tajni agenti u noći pronašli nedaleko od Bijele kuće odjevenog samo u donje rublje kako pokušava dozvati taksi.\r\n\r\nIzbezumljenim agentima, koji su za njim bjesomučno tragali nakon njegova kasnonoćnog druženja s čašicom, Jeljcin je objasnio da je izveo spomenuti podvig jer je želio naručiti pizzu.\r\n\r\nNaime, to je samo jedna od “pikantnih pričica” iz 707 stranica duge knjige povjesničara Taylora Brancha, koja bi trebala biti objavljena idući tjedan pod naslovom “Clintonove vrpce: Povijesno hrvanje s predsjednikom”, a koja je napisana na temelju ukupno 79 snimljenih razgovora Brancha s&nbsp; Clintonom između 1993. i 2001. godine.\r\n\r\nIdeju za snimanje razgovora, objasnio je Branch u intervjuu za USA Today, predložio je sam bivši američki predsjednik, koji je želio imati intimniji, zakulisni prikaz svog predsjednikovanja. Snimljene vrpce Clinton je držao skrivene u Bijeloj kući.\r\n\r\nNova knjiga, odnosno materijal iz snimki, daje pogled i na Clintonovu aferu s Monicom Lewinsky. Doduše, ispričao je Branch, Clinton isprva nije baš bio voljan pričati o toj temi zbog straha da bi ih netko mogao iskoristiti protiv njega, no s vremenom se otvorio te je priznao da se afera zbila u vrijeme kad se samosažalijevao.\r\n\r\n- Puknuo sam. Samo sam puknuo - priznao je Clinton tijekom razgovora s Branchom, objašnjavajući da je podlegnuo privatnim i političkim pritiscima, poput smrti njegove majke te porazu demokarata u Kongresu 1994. godine.\r\n\r\nU knjizi se spominje i dvosatna svađa između Clintona i Ala Gorea, do koje je došlo nakon što je Gore izgubio od Georgea W. Busha u utrci za predsjednika SAD-a 2000. godine. Tijekom prepirke, navodi Branch, dvojica političara su se dobrano počastila optužbama, poput one Goreove da je afera Lewinsky bila pošast za njegovu kampanju.','img/yeltsin.jpg','politika',0),
(32,'2020-06-12','Rusi se već danima pitaju gdje je Putin','Epidemija koronavirusa pružila je Putinu priliku da testira političku elitu Rusije. Zapravo ga boli briga.\r\n','Ruski predsjednik Vladimir Putin najavio je danas produžetak \"neradnog tjedna\" do 30. travnja nakon što je u Rusiji zabilježen veliki porast broja zaraženih sa koronavirusom. Trenutno je više od 10 tisuća oboljelih u ovoj zemlji. Ujedno, Putin je potpisao i uredbu kojom se propisuju vrlo stroge kazne, uključujuči i kazne zatvora do pet godina, za one koji šire lažne vijesti i informacije o koronavirusu, dok je za one koji budu kršili mjere karantene predviđena kazna do sedam godina zatvora.\r\n\r\nOvo je rijetko pojavljivanje Putina u javnosti nakon što je počela pandemija, što za ruskog predsjednika svakako nije uobičajeno. Ovo je rijetka velika kriza u Rusiji u posljednjih dvadeset godina u kojoj se Putin nije osobno uključio. Posljednji takav slučaj zabilježen je u vrijeme kratkog Rusko-Gruzijskog sukoba 2008. godine. Već neko vrijeme Rusi nagađaju gdje je Vladimir Putin od izbijanja krize. Dio javnosti drži kako se povukao u predsjedničku daču, dok dio promatrača smatra kako je jednostavno prepustio stvar epidmiolozima. Ipak, istina bi mogla biti negdje u sredini. Posljednje teze političkih analitičara govore kako je Putin krizu oko epidemije koronavirusa iskoristio kako bi vidio na koji način i kako učinkovitu djeluju pojedini članovi ruske političke elite, kako bi si do kraja mogao \"posložiti\" tim za sljedeće razdoblje. Jednostavno, ovo je prvi ispit za sve pripadnike \"višeg političkog ešalona\" zemlje. Tko prođe test u krizi izazvanoj epidemijom ima mjesta u budućem putinovu okruženju, tko ne zadovolji svojim postupcima, taj jednostavno otpada.\r\n\r\nDrugi mogući razlog zbog kojeg Putin nije toliko eksponiran u posljednje vrijeme je i činjenica da Vladimir Putin ne voli da ga se povezuje sa nepopularnim odlukama. A zatvaranje vanjskih granica zemlje, ograničavanje kretanja, zatvaranje trgovina to svakako jesu. Sada ove mjere donosi i provodi novi premijer Sobjanin, koji je na toj poziciji nedavno zamjenio Medvedeva. No Sobjanin je ionako predviđen kao svojevrsno \"tehničko rješenje\" i ne mora se opterećivati popularnošću među biračima  nekim budućim izborima. U svakom slučaju, Putin nije javno eksponiran u epidemiji oko koronavirusa, no to nipošto ne znači da ne donosi ključne odluke. Pitanje je samo tko ih potpisuje i predstavlja javnosti.','putin.jpg','politika',0),
(45,'2020-06-12','Đokovićevi izgovori','Ivo Karlović jedan je od rijetkih igrača koji protiv Novaka Đokovića ima pozitivan skor.\r\n','Njegov učinak protiv trenutno vodećeg na ATP listi je 2-1 u pobjedama, ukoliko se računaju zvanični mečevi.\r\n\r\nIpak, Karlović je u razgovoru za Večernji list istakao da je Đokovića pobijedio tri puta.\r\n\r\n- Zapravo je 3:1. Pobijedio sam ga i u kvalifikacijama turnira u Madridu 2005. godine, samo što ATP to ne bilježi. Nije da ga zadirkujem, ali spomenem mu taj podatak s vremena na vrijeme. Na što on počne iznositi smiješne izgovore, poput \"duvao je vjetar\" ili \"to je bilo 1847.\". Ne znam zašto je baš tu godinu izabrao... - rekao je Karlović.\r\n\r\nKarlović ove godine slavi jubilej, 20 godina u profesionalnom tenisu.\r\n\r\n- Pa, eto, već je i to što sam proveo 20 godina u profesionalnom tenisu veliki uspjeh. Naravno, bilo je puno uspona i padova, ali ta konstanta je nešto čime se izuzetno ponosim. Istakao bih još i pobjede nad prvim igračima svijeta Lejtonom Hjuitom, Rodžerom Federerom i Novakom Đokovićem - kaže on.\r\n\r\nKarlović je otkrio i na koji je rekord posebno ponosi.\r\n\r\n- I ne znam koje sve rekorde držim po broju asova i koje sve što se godina tiče, ali ako bih morao izabrati, odlučio bih se za ove u godinama, starosne rekorde. Oni pokazuju karakter - zaključio je Karlović.','img/karlovic.jpg','sport',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
