<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Car;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadCarData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $m1 = new Car();
        $m1
            ->setName("Aston Martin")
            ->setPicture('astonmartindb9.jpg')
            ->setDescription("Aston Martin DB9, to samochód osobowy zliczany do segmentu G. Zadebiutował w 2003 roku, jako całkowicie nowa konstrukcja. Produkcja i sprzedaż rozpoczęły się rok później. W gamie Astona Martina zastąpił przestarzały już nieco model DB7. Stylistycznie model ten nawiązuje do poprzednika, choć kształty zyskały na nowoczesności, dynamice oraz stylu. Za projekt odpowiadają dwaj projektanci: Ian Callum i Henryk Fisker. Aston Martin DB9 to pierwszy model opracowany i zbudowany na nowej platformie podłogowej Forda VH, którą wykonano z całości z aluminium. ")
            ->setModel("DB9")
            ->setPrice(1200)
            ->addCategory($this->getReference('category-sportowy'));
        
        $manager->persist($m1);
        
		#dodanie nowego
		$m2 = new Car();
        $m2
            ->setName("Volkswagen")
            ->setPicture('volkswagengolf.jpg')
            ->setDescription("Volkswagen Golf, to samochód osobowy zaliczany od segmentu C, czyli klasy kompakt. Nazwa pochodzi od prądu morskiego - Golfsztrom. Jest to następca kultowego, legendarnego modelu Beetle Typ 1 (potocznie nazywanego Garbus). Podobnie jak poprzednik, Golf odniósł wielki sukces i niejako stworzył potęgę całej marki Volkswagen. Prace nad opracowaniem tego modelu rozpoczęły się jeszcze w 1967 roku, a produkcja ruszyła siedem lat później. Powstało do tej pory sześć generacji Golfa, które sprzedały się w ilości blisko 30 milionów egzemplarzy. To trzeci najlepszy wynik w całej historii motoryzacji na świecie. W tej chwili to najpopularniejszy model w gamie tego producenta.")
            ->setModel("Golf")
            ->setPrice(350)
            ->addCategory($this->getReference('category-hatchback'));
            
        $manager->persist($m2);
        
		$manager->flush();
        
		#nowy
        $m3 = new Car();
        $m3
            ->setName("BMW")
            ->setPicture('bmwx6.jpg')
            ->setDescription("BMW X6 E71, to luksusowe auto segmentu E grupy premium. Zadebiutowało w 2008 roku podczas salonu samochodowego w Detroit. W Europie zadebiutowało na targach w Genewie. Auto bazuje na rozwiązaniach technologicznych przejętych z BMW X5 z którym dzieli płytę podłogową. Producent jednak zaznacza, że nie jest to typowy SUV, a auto tworzy odrębną klasę - Sport Activity Coupe. Łączyć ma cechy samochodu sportowego, coupe oraz uterenowionego.")
            ->setModel("X6")
            ->setPrice(700)
            ->addCategory($this->getReference('category-jeep'));

        
        $manager->persist($m3);
		
		$manager->flush();
        
		#nowy
        $m4 = new Car();
        $m4
            ->setName("Alfa Romeo")
            ->setPicture('argiulietta.jpg')
            ->setDescription("Alfa Romeo Giulietta jest następczynią modelu Alfa Romeo 147. To samochód segmentu C klasy premium. Premiera odbyła się w 2010 roku, w okresie jubileuszu 100-lecia marki Alfa Romeo. Nazwa nawiązuje do poprzedniczki sprzed ponad 50 lat. Model ten budowany jest w miejscowości Cassino. Występuje wyłącznie w 5-drzwiowej wersji nadwoziowej typu hatchback o wymiarach: 4351 mm długości, 1465 mm wysokości oraz 1798 mm szerokości. Skonstruowano ją na nowej platformie Compact.")
            ->setModel("Giulietta")
            ->setPrice(420)
            ->addCategory($this->getReference('category-hatchback'));

        
        $manager->persist($m4);
        
        $manager->flush();
		
		#dodanie nowego
		$m5 = new Car();
        $m5
            ->setName("Suzuki")
            ->setPicture('suzukiswift.jpg')
            ->setDescription("Suzuki Swift, to samochód osobowy zaliczany do segmentu B, czyli klasy aut miejskich. Zadebiutował w 1983 roku jako zupełnie nowy model w gamie. Początkowo sprzedawany był jako SA-310, SA-413 lub Cultus. Nazwa Swift pojawiła się dopiero od 1986 roku, co w tłumaczeniu na język angielski oznacza szybki. Do tej pory powstały cztery generacje tego modelu. Na niektórych rynkach Swift oferowany był jako Chevrolet Sprint, Geo Metro, Pontiac Firefly lub Subaru Justy. Choć największe sukcesy auto odnosi na rynku rodzimym, to w pozostałych częściach świata również jego sprzedaż jest bardzo wysoka.")
            ->setModel("Swift")
            ->setPrice(400)
            ->addCategory($this->getReference('category-hatchback'));
            
        $manager->persist($m5);
        
		$manager->flush();
		
		#dodanie nowego
		$m6 = new Car();
        $m6
            ->setName("Volkswagen")
            ->setPicture('vwtouareg.jpg')
            ->setDescription("Volkswagen Touareg, to samochód osobowy zaliczany do segmentu I, w klasie SUV. Zadebiutował w 2002 roku, jako flagowe auto terenowe w gamie Volkswagena. To w zasadzie dopiero drugie auto tego typu w historii producenta, po dawnym modelu VW 181 Kurierwagen. Touareg opracowany jest wspólnie z niemieckim producentem samochodów sportowych, marką Porsche, a jego bliźniaczym modelem stał się model Porsche Cayenne. Oba auta dzielą niemal identyczną płytę technologiczną, ale dysponują całkowicie odmienną stylistyką nadwozia oraz wnętrza. ")
            ->setModel("Touareg")
            ->setPrice(600)
            ->addCategory($this->getReference('category-jeep'));
            
        $manager->persist($m6);
        
		$manager->flush();
		
		#dodanie nowego
		$m7 = new Car();
        $m7
            ->setName("Toyota")
            ->setPicture('toyotaland.jpg')
            ->setDescription("Toyota Land Cruiser, to terenowy samochód osobowy zaliczany do segmentu I. Zadebiutował w 1954 roku i szybko stał się jednym z najlepszych i najbardziej legendarnych modeli w swoim segmencie. To pierwszy terenowy samochód w gamie tego producenta. Stał się ogromnym sukcesem rynkowym marki Toyota. Pierwsze modele, które powstały niedługo po II Wojnie Światowej bazowały na rozwiązaniach amerykańskiego Jeep'a. Stał się również pierwszym modelem Toyoty, który był eksportowany na rynki poza Japonią. Do tej pory powstało dziewięć generacji Land Cruisera. Większość z nich zaprojektowały słynny projektant, Sadayoshi Koyari.")
            ->setModel("Land Cruiser")
            ->setPrice(750)
            ->addCategory($this->getReference('category-jeep'));
            
        $manager->persist($m7);
        
		$manager->flush();
		
		#dodanie nowego
		$m8 = new Car();
        $m8
            ->setName("Nissan")
            ->setPicture('nissangtr.jpg')
            ->setDescription("Nissan GT-R, to supersportowy samochód osobowy zaliczany do segmentu G+. Zadebiutował w 2007 roku, choć sprzedaż w Europie rozpoczęła się dopiero w 2009 roku. Odnosi się jednak do legendarnej linii modeli GT-R, której historia sięga jeszcze 1969 roku, oraz takich późniejszych modeli jak kultowy Skyline GT-R R34. Stylistycznie bazuje na koncepcie GT-R Proto z 2005 roku. Za projekt odpowiada Shiro Nakamura. Model GT-R zdobył wiele prestiżowych nagród, w tym: International Car of the Year 2009, World Performance Car 2009 czy Supercar of the Year 2007 Top Gear. ")
            ->setModel("GTR")
            ->setPrice(1100)
            ->addCategory($this->getReference('category-sportowy'));
            
        $manager->persist($m8);
        
		$manager->flush();
		
		#dodanie nowego
		$m9 = new Car();
        $m9
            ->setName("Porshe")
            ->setPicture('porshecarrera.jpg')
            ->setDescription("Porsche 911, to samochód osobowy zaliczany do segmentu G, czyli aut sportowych. Zadebiutował w 1963 roku. Jest to jeden z najsłynniejszych modeli samochodów sportowych, oraz najsłynniejszy i najważniejszy model w gamie oraz historii Porsche. Auto otrzymało nazwę 911, jako następca modelu Porsche 356. Początkowo nazywać się miał 901, jednak po protestach marki Peugeot, która zarezerwowała sobie trzycyfrowe nazwy numeryczne zerem w środku, zmieniono ją właśnie na 911. Charakterystyczny w tym modelu jest wygląd, którego linia boczna w zasadzie niewiele zmieniła się na przestrzeni tych wszystkich lat na rynku! ")
            ->setModel("Carrera")
            ->setPrice(1000)
            ->addCategory($this->getReference('category-sportowy'));
            
        $manager->persist($m9);
		
		$manager->flush();
    }
    
    public function getOrder()
    {
        return 3;
    }
}