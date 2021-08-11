SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `admin_sessions` (
  `id` int(10) UNSIGNED NOT NULL,
  `token` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `companies` (`id`, `name`, `description`, `logo`) VALUES
(2, 'Amazon', 'Американская компания, крупнейшая в мире на рынках платформ электронной коммерции и публично-облачных вычислений по выручке и рыночной капитализации[9]. Штаб-квартира — в Сиэтле.<br><br>Основана Джеффом Безосом 5 июля 1994 года как интернет-магазин по продаже книг, но позже диверсифицировалась, начав продавать видео, MP3, аудиокниги (как потоковым способом, так и через возможность загрузки), программное обеспечение, видеоигры, электронику, одежду, мебель, еду, игрушки и ювелирные изделия. Компания также владеет издательским подразделением Amazon Publishing, киностудией Amazon Studios, производит линии бытовой электроники, включая электронные книги Kindle, планшеты Amazon Fire, Fire TV[en] и смарт-динамик Echo, и является крупнейшим в мире поставщиком услуг в моделях IaaS и PaaS (Amazon Web Services)[10]. Поддерживает отдельные розничные сайты для некоторых стран, а также предлагает международную доставку некоторых своих продуктов в некоторые другие страны[11]. Около 100 миллионов человек подписались на Amazon Prime[12][13]. ', '/images/companies/681562429126965613.jpg'),
(3, 'Ford', 'Компания основана в 1903 году Генри Фордом, который создал её, получив на развитие бизнеса $28 000 от пяти инвесторов. Компания Ford получила известность как первая в мире, применившая классический автосборочный конвейер, запущенный впервые 16 августа 1913 г.[источник не указан 987 дней].<br>Генри Форд в 1914 году<br><br>Первой получившей массовое признание моделью, выпускаемой компанией, стал Ford Model T, выпускавшийся в 1908—1927 годах.<br><br>В конце 1920-х годов с компанией руководством СССР был заключён договор о помощи при строительстве автозавода в Нижнем Новгороде. Первые автомобили нового советского автозавода — ГАЗ-А и ГАЗ-АА, были лицензионными копиями машин компании «Форд».<br><br>В конце 1930-х годов компания не пользовалась доверием американских военных из-за нескрываемых пронацистских симпатий основателя[6][7]. В 1930-х годах Ford построил на территории нацистской Германии производство, которое выпустило для нужд Вермахта 12 тыс. гусеничной и 48 тыс. единиц колёсной техники. Руководитель компании был награждён высшей наградой Третьего рейха. Тем не менее, со вступлением США во Вторую мировую войну компания начала выпуск армейских грузовиков и джипов для американских войск (уже не своей конструкции — Ford GPW был адаптированной версией Willys MB), выступала смежником в танкостроительной программе США.<br><br>В середине 2000-х годов из-за жёсткой конкуренции на мировом автомобильном рынке компания Ford испытывала серьёзный финансовый кризис. В 2006 году президентом компании стал Алан Малалли[8], который продал подразделения Aston Martin и Volvo Cars, провёл успешную реструктуризацию[9], запустив новую стратегию «Единый Ford», согласно которой Ford должен постепенно начать выпуск глобальных автомобилей, общих для всех рынков, что вернуло компанию к прибыльности[10]. ', '/images/companies/590391136912869962.jpg'),
(4, 'Microsoft', 'Одна из крупнейших транснациональных компаний по производству проприетарного программного обеспечения для различного рода вычислительной техники — персональных компьютеров, игровых приставок, КПК, мобильных телефонов и прочего. Разработчик наиболее широко распространённой на данный момент в мире программной платформы[7] — семейства операционных систем Windows.<br><br>Подразделения компании производят семейство игровых консолей Xbox, а также аксессуары для персональных компьютеров (клавиатуры, мыши и т. д.[8]). C 2012 года производит собственный планшетный компьютер — Surface. Продукция Microsoft продаётся более чем в 80 странах мира, программы переведены более чем на 45 языков.<br><br>Штаб-квартира компании находится в городе Редмонд, штат Вашингтон, США.<br><br>Штат сотрудников корпорации на 5 июня 2014 года составляет 127 104 человека, и 144 000 человек по информации 2-х летней давности[9]. В 2018 году заняла второе место в списке 500 лучших работодателей мира по мнению журнала Forbes[10].<br><br>На территории России с ноября 1992 года действует представительство Microsoft (с июля 2004 года — ООО «Майкрософт Рус»)[9].<br><br>Microsoft находится под надзором суда США в результате мирового соглашения 2002 года[11]. ', '/images/companies/81198461261506568.jpg'),
(5, 'Ubisoft', 'Ubisoft Entertainment (ранее Ubi Soft Entertainment) — французская компания, специализирующаяся на разработке и издании компьютерных игр, главный офис которой располагается в Монтрёй, Франция. Компания включает в себя студии в более чем в 20 странах, среди них Россия, США, Канада, Испания, Китай, Германия, Болгария, Украина, Румыния и Италия. Ubisoft является одним из крупнейших игровых издателей в Европе. По состоянию на сентябрь 2020 года Ubisoft является девятой по величине публичной компанией производителем компьютерных игр в Мире с точки зрения доходов и рыночной капитализации после Konami, Electronic Arts, Namco Bandai, Activision Blizzard, Sega, Nintendo, Microsoft, Sony и первой в Европе.[4][5]', '/images/companies/560385231617626916.jpg'),
(6, 'Apple', 'Американская корпорация, производитель персональных и планшетных компьютеров, аудиоплееров, смартфонов, программного обеспечения. Один из пионеров в области персональных компьютеров[11] и современных многозадачных операционных систем с графическим интерфейсом. Штаб-квартира — в Купертино, штат Калифорния. Благодаря инновационным технологиям и эстетичному дизайну, корпорация Apple создала в индустрии потребительской электроники уникальную репутацию, сравнимую с культом[12]. Является первой американской компанией, чья капитализация превысила 1,044 трлн долларов США. Это произошло во время торгов акциями компании 10 сентября 2018 года[13]. В тот же день компания стала самой дорогой публичной компанией за всю историю, превысив капитализацию предыдущего рекордсмена — компании PetroChina (1,005 трлн долларов в ноябре 2007 года)[14].<br><br>В 2018 году заняла третье место в списке 500 лучших работодателей мира по мнению журнала Forbes[15]. ', '/images/companies/606798812286672198.jpg'),
(7, 'IBM', '(от англ. International Business Machines) — американская компания со штаб-квартирой в Армонке (штат Нью-Йорк), один из крупнейших в мире производителей и поставщиков аппаратного и программного обеспечения, а также IТ-сервисов и консалтинговых услуг.<br><br>Распространённое прозвище компании — Big Blue, что можно перевести с английского как «большой синий» или «голубой гигант». Существует несколько версий относительно этого прозвища. По одной из них[9][10], название произошло от мейнфреймов, поставлявшихся компанией в 1950-х — 1960-х годах. Они были размером с комнату и имели голубую окраску. По другой теории, прозвище просто ссылается на логотип компании. Ещё по одной версии[9][11] это название идёт от бывшего дресс-кода компании, который требовал от многих работников ношения рубашек и костюмов голубого цвета. ', '/images/companies/337128569579696652.jpg'),
(8, 'Twitter', 'Cоциальная сеть для публичного обмена сообщениями при помощи веб-интерфейса, SMS, средств мгновенного обмена сообщениями или сторонних программ-клиентов для пользователей интернета любого возраста[7]. Публикация коротких заметок в формате блога получила название «микроблогинг». Пользование сервисом бесплатно. Пользование посредством SMS тарифицируется оператором согласно тарифному плану пользователя.<br><br>Владельцем системы «Твиттер» является компания Twitter Inc., главный офис которой находится в Сан-Франциско (штат Калифорния)[8], всего компания имеет больше 35 офисов по всему миру. По состоянию на апрель 2021 года в компании работает больше 5500 сотрудников[9].<br><br>Созданный Джеком Дорси[10] в 2006 году, «Твиттер» вскоре завоевал популярность во всём мире. По итогам 2020 года 192 миллиона человек пользуются «Твиттером» ежедневно[11].<br><br>В 2020 году выручка компании Twitter Inc. составила 3,72 млрд долларов[3]. ', '/images/companies/369865871683872168.jpg');

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `author` varchar(70) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `published` tinyint(3) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `reviews` (`id`, `author`, `photo`, `text`, `company_id`, `published`) VALUES
(8, 'Craig Federighi', '/images/reviews/28113674694948966.jpg', 'Craig Federighi was born on May 27, 1969 in San Leandro.[4] After graduating from Acalanes High School in Lafayette, California, Federighi earned a Bachelor of Science in Electrical Engineering and Computer Science from the University of California, Berkeley, and later a Master of Science degree in Computer Science from the University of California, Berkeley.<br><br>He is of Italian descent.[5] Federighi was married as of 2014[6] and he has four children.', 2, 1),
(9, 'Elon Musk', '/images/reviews/088612652672271681.jpg', 'Musk was born to a Canadian mother and South African father and raised in Pretoria, South Africa. He briefly attended the University of Pretoria before moving to Canada aged 17 to attend Queen\'s University. He transferred to the University of Pennsylvania two years later, where he received bachelor\'s degrees in economics and physics. He moved to California in 1995 to attend Stanford University but decided instead to pursue a business career, co-founding the web software company Zip2 with brother Kimbal. The startup was acquired by Compaq for $307 million in 1999. Musk co-founded online bank X.com that same year, which merged with Confinity in 2000 to form PayPal. The company was bought by eBay in 2002 for $1.5 billion.<br><br>In 2002, Musk founded SpaceX, an aerospace manufacturer and space transport services company, of which he is CEO and CTO. In 2004, he joined electric vehicle manufacturer Tesla Motors, Inc. (now Tesla, Inc.) as chairman and product architect, becoming its CEO in 2008. In 2006, he helped create SolarCity, a solar energy services company that was later acquired by Tesla and became Tesla Energy. In 2015, he co-founded OpenAI, a nonprofit research company that promotes friendly artificial intelligence. In 2016, he co-founded Neuralink, a neurotechnology company focused on developing brain–computer interfaces, and founded The Boring Company, a tunnel construction company. Musk has proposed the Hyperloop, a high-speed vactrain transportation system.<br><br>', 2, 1),
(10, 'Jonathan Ive', '/images/reviews/261685074016255084.jpg', 'Born in London, Ive lived there until his family moved to Stafford when he was 12. He studied design at Newcastle Polytechnic,[a] and was later hired by the London-based start-up design firm Tangerine.[2] He began working at Apple in the early 1990s, designing the decade\'s PowerBooks and Macs, finally taking up US citizenship in 2012 to become a dual British-American national.[3] He was invited to join the Royal College of Art in May 2017 as its head-of-college, serving a fixed five-year term until May 2022.<br><br>Ive has received a number of accolades and honours for his designs and patents. In the United Kingdom, he has been appointed a Royal Designer for Industry (RDI), an Honorary Fellow of the Royal Academy of Engineering (HonFREng), and a Knight Commander of the Order of the British Empire (KBE). In 2018, he was awarded the Professor Hawking Fellowship of the Cambridge Union Society.[4] In a 2004 BBC poll of cultural writers, Ive was ranked the most influential person in British culture.[5] His designs have been described as integral to the successes of Apple, which has gone on to become the world\'s largest information technology company by revenue and the largest company in the world by market capitalization.', 2, 1),
(11, 'Mark Zuckerberg', '/images/reviews/89412662975099165.jpg', 'Zuckerberg began using computers and writing software in middle school. His father taught him Atari BASIC Programming in the 1990s, and later hired software developer David Newman to tutor him privately. Zuckerberg took a graduate course in the subject at Mercy College near his home while still in high school. In one program, since his father\'s dental practice was operated from their home, he built a software program he called &quot;ZuckNet&quot; that allowed all the computers between the house and dental office to communicate with each other. It is considered a &quot;primitive&quot; version of AOL\'s Instant Messenger, which came out the following year.[21][22]<br><br>A New Yorker profile said of Zuckerberg: &quot;some kids played computer games. Mark created them.&quot; Zuckerberg himself recalls this period: &quot;I had a bunch of friends who were artists. They\'d come over, draw stuff, and I\'d build a game out of it.&quot; The New Yorker piece noted that Zuckerberg was not, however, a typical &quot;geek-klutz&quot;, as he later became captain of his prep school fencing team and earned a classics diploma. Napster co-founder Sean Parker, a close friend, notes that Zuckerberg was &quot;really into Greek odysseys and all that stuff&quot;, recalling how he once quoted lines from the Roman epic poem Aeneid, by Virgil, during a Facebook product conference.', 2, 0);


ALTER TABLE `admin_sessions`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`);


ALTER TABLE `admin_sessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;


ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
