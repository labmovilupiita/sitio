DROP TABLE asistencia;
DROP TABLE auditorio;
DROP TABLE ponentes;



CREATE TABLE `asistencia` (
  `id` int(5) NOT NULL auto_increment,
  `usuario` int(5) NOT NULL,
  `ponencia` int(5) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=161 DEFAULT CHARSET=latin1;

INSERT INTO asistencia VALUES("1","2010640034","4");
INSERT INTO asistencia VALUES("2","2010640034","6");
INSERT INTO asistencia VALUES("3","2009640208","8");
INSERT INTO asistencia VALUES("4","2009640208","1");
INSERT INTO asistencia VALUES("5","2009640208","4");
INSERT INTO asistencia VALUES("6","2009640208","7");
INSERT INTO asistencia VALUES("7","2009640208","6");
INSERT INTO asistencia VALUES("8","2009640208","2");
INSERT INTO asistencia VALUES("9","2009640208","9");
INSERT INTO asistencia VALUES("10","2011640063","8");
INSERT INTO asistencia VALUES("11","2011640063","1");
INSERT INTO asistencia VALUES("12","2011640063","7");
INSERT INTO asistencia VALUES("13","2011640063","6");
INSERT INTO asistencia VALUES("14","2011640063","2");
INSERT INTO asistencia VALUES("15","2011640063","10");
INSERT INTO asistencia VALUES("16","2011640063","9");
INSERT INTO asistencia VALUES("17","2011640063","11");
INSERT INTO asistencia VALUES("18","2011640063","3");
INSERT INTO asistencia VALUES("19","2008640064","8");
INSERT INTO asistencia VALUES("20","2008640064","1");
INSERT INTO asistencia VALUES("21","2008640064","7");
INSERT INTO asistencia VALUES("22","2008640064","6");
INSERT INTO asistencia VALUES("23","2008640064","3");
INSERT INTO asistencia VALUES("24","2011640256","8");
INSERT INTO asistencia VALUES("25","2011640256","1");
INSERT INTO asistencia VALUES("26","2011640256","4");
INSERT INTO asistencia VALUES("27","2011640256","7");
INSERT INTO asistencia VALUES("28","2011640256","6");
INSERT INTO asistencia VALUES("29","2011640256","2");
INSERT INTO asistencia VALUES("30","2011640256","10");
INSERT INTO asistencia VALUES("31","2011640256","5");
INSERT INTO asistencia VALUES("32","2011640256","9");
INSERT INTO asistencia VALUES("33","2011640256","11");
INSERT INTO asistencia VALUES("34","2011640256","3");
INSERT INTO asistencia VALUES("35","2007640053","8");
INSERT INTO asistencia VALUES("36","2007640053","1");
INSERT INTO asistencia VALUES("37","2007640053","7");
INSERT INTO asistencia VALUES("38","2007640053","6");
INSERT INTO asistencia VALUES("39","2007640053","2");
INSERT INTO asistencia VALUES("40","2007640053","10");
INSERT INTO asistencia VALUES("41","2007640053","9");
INSERT INTO asistencia VALUES("42","2007640053","11");
INSERT INTO asistencia VALUES("43","2006602322","8");
INSERT INTO asistencia VALUES("44","2006602322","1");
INSERT INTO asistencia VALUES("45","2006602322","4");
INSERT INTO asistencia VALUES("46","2006602322","7");
INSERT INTO asistencia VALUES("47","2006602322","6");
INSERT INTO asistencia VALUES("48","2006602322","2");
INSERT INTO asistencia VALUES("49","2006602322","5");
INSERT INTO asistencia VALUES("50","2006602322","9");
INSERT INTO asistencia VALUES("51","2006602322","11");
INSERT INTO asistencia VALUES("52","2006602322","3");
INSERT INTO asistencia VALUES("53","2007640141","8");
INSERT INTO asistencia VALUES("54","2007640141","6");
INSERT INTO asistencia VALUES("55","2007640141","2");
INSERT INTO asistencia VALUES("56","2007640141","9");
INSERT INTO asistencia VALUES("57","2009090072","4");
INSERT INTO asistencia VALUES("58","2011640084","8");
INSERT INTO asistencia VALUES("59","2011640084","1");
INSERT INTO asistencia VALUES("60","2011640084","4");
INSERT INTO asistencia VALUES("61","2011640084","7");
INSERT INTO asistencia VALUES("62","2011640084","6");
INSERT INTO asistencia VALUES("63","2011640084","2");
INSERT INTO asistencia VALUES("64","2011640084","10");
INSERT INTO asistencia VALUES("65","2011640084","5");
INSERT INTO asistencia VALUES("66","2011640084","9");
INSERT INTO asistencia VALUES("67","2011640084","11");
INSERT INTO asistencia VALUES("68","2011640084","3");
INSERT INTO asistencia VALUES("69","2011640124","8");
INSERT INTO asistencia VALUES("70","2011640124","1");
INSERT INTO asistencia VALUES("71","2011640124","4");
INSERT INTO asistencia VALUES("72","2011640124","7");
INSERT INTO asistencia VALUES("73","2011640124","6");
INSERT INTO asistencia VALUES("74","2011640124","2");
INSERT INTO asistencia VALUES("75","2011640124","10");
INSERT INTO asistencia VALUES("76","2011640124","5");
INSERT INTO asistencia VALUES("77","2011640124","9");
INSERT INTO asistencia VALUES("78","2011640124","11");
INSERT INTO asistencia VALUES("79","2011640124","3");
INSERT INTO asistencia VALUES("80","2011630292","8");
INSERT INTO asistencia VALUES("81","2011630292","1");
INSERT INTO asistencia VALUES("82","2011630292","7");
INSERT INTO asistencia VALUES("83","2011630292","6");
INSERT INTO asistencia VALUES("84","2011630292","2");
INSERT INTO asistencia VALUES("85","2011630292","5");
INSERT INTO asistencia VALUES("86","2011630292","9");
INSERT INTO asistencia VALUES("87","2011630292","11");
INSERT INTO asistencia VALUES("88","2011630292","3");
INSERT INTO asistencia VALUES("89","2012640093","8");
INSERT INTO asistencia VALUES("90","2012640093","1");
INSERT INTO asistencia VALUES("91","2012640093","10");
INSERT INTO asistencia VALUES("92","2012640093","9");
INSERT INTO asistencia VALUES("93","2012640093","11");
INSERT INTO asistencia VALUES("94","2012640093","3");
INSERT INTO asistencia VALUES("95","2006640207","8");
INSERT INTO asistencia VALUES("96","2006640207","1");
INSERT INTO asistencia VALUES("97","2006640207","4");
INSERT INTO asistencia VALUES("98","2006640207","7");
INSERT INTO asistencia VALUES("99","2006640207","6");
INSERT INTO asistencia VALUES("100","2006640207","2");
INSERT INTO asistencia VALUES("101","2006640207","10");
INSERT INTO asistencia VALUES("102","2006640207","5");
INSERT INTO asistencia VALUES("103","2006640207","9");
INSERT INTO asistencia VALUES("104","2006640207","11");
INSERT INTO asistencia VALUES("105","2006640207","3");
INSERT INTO asistencia VALUES("106","2011640107","8");
INSERT INTO asistencia VALUES("107","2011640107","1");
INSERT INTO asistencia VALUES("108","2011640107","4");
INSERT INTO asistencia VALUES("109","2011640107","7");
INSERT INTO asistencia VALUES("110","2011640107","6");
INSERT INTO asistencia VALUES("111","2011640107","2");
INSERT INTO asistencia VALUES("112","2011640107","10");
INSERT INTO asistencia VALUES("113","2011640107","5");
INSERT INTO asistencia VALUES("114","2011640107","9");
INSERT INTO asistencia VALUES("115","2011640107","11");
INSERT INTO asistencia VALUES("116","2011640107","3");
INSERT INTO asistencia VALUES("117","2012640119","5");
INSERT INTO asistencia VALUES("118","2012640119","9");
INSERT INTO asistencia VALUES("119","2012640119","11");
INSERT INTO asistencia VALUES("120","2012640055","8");
INSERT INTO asistencia VALUES("121","2012640055","1");
INSERT INTO asistencia VALUES("122","2012640055","7");
INSERT INTO asistencia VALUES("123","2012640055","2");
INSERT INTO asistencia VALUES("124","2012640055","10");
INSERT INTO asistencia VALUES("125","2012640055","5");
INSERT INTO asistencia VALUES("126","2012640055","9");
INSERT INTO asistencia VALUES("127","2012640055","11");
INSERT INTO asistencia VALUES("128","2012640055","3");
INSERT INTO asistencia VALUES("129","2008301108","8");
INSERT INTO asistencia VALUES("130","2008301108","1");
INSERT INTO asistencia VALUES("131","2008301108","4");
INSERT INTO asistencia VALUES("132","2008301108","7");
INSERT INTO asistencia VALUES("133","2008301108","6");
INSERT INTO asistencia VALUES("134","2008301108","2");
INSERT INTO asistencia VALUES("135","2008301108","10");
INSERT INTO asistencia VALUES("136","2008301108","5");
INSERT INTO asistencia VALUES("137","2008301108","9");
INSERT INTO asistencia VALUES("138","2008301108","11");
INSERT INTO asistencia VALUES("139","2008301108","3");
INSERT INTO asistencia VALUES("140","2012640042","8");
INSERT INTO asistencia VALUES("141","2012640042","1");
INSERT INTO asistencia VALUES("142","2012640042","4");
INSERT INTO asistencia VALUES("143","2012640042","7");
INSERT INTO asistencia VALUES("144","2012640042","6");
INSERT INTO asistencia VALUES("145","2012640042","2");
INSERT INTO asistencia VALUES("146","2012640042","10");
INSERT INTO asistencia VALUES("147","2012640042","5");
INSERT INTO asistencia VALUES("148","2012640042","9");
INSERT INTO asistencia VALUES("149","2012640042","11");
INSERT INTO asistencia VALUES("150","2012640042","3");
INSERT INTO asistencia VALUES("151","2008640057","1");
INSERT INTO asistencia VALUES("152","2008640057","2");
INSERT INTO asistencia VALUES("153","2008640057","3");
INSERT INTO asistencia VALUES("154","2008640057","4");
INSERT INTO asistencia VALUES("155","2008640057","5");
INSERT INTO asistencia VALUES("156","2008640057","6");
INSERT INTO asistencia VALUES("157","2008640057","7");
INSERT INTO asistencia VALUES("158","2008640057","8");
INSERT INTO asistencia VALUES("159","2008640057","9");
INSERT INTO asistencia VALUES("160","2008640057","11");




CREATE TABLE `auditorio` (
  `boleta` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellidos` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `plan` char(1) NOT NULL,
  `avance` int(11) NOT NULL,
  PRIMARY KEY  (`boleta`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO auditorio VALUES("2010640034","Juan Antonio","Legal","jomdu87@hotmail.com","n","2");
INSERT INTO auditorio VALUES("2009640208","Julio","Negrete Gomez","jnegrete0822@gmail.com","v","8");
INSERT INTO auditorio VALUES("2011640063","Jesus Samuel","Guevara Martínez","jesuz_klarck@hotmail.com","n","4");
INSERT INTO auditorio VALUES("2008640064","Fermín ","García Alvarez","fermin.garcia.alvarez@metrored.com.mx","v","7");
INSERT INTO auditorio VALUES("2011640256","Angel Fernando ","Martínez Martínez","angeltux@hotmail.com","n","2");
INSERT INTO auditorio VALUES("2007640053","Eric","Dominguez Casasola","edctele@gmail.com","v","9");
INSERT INTO auditorio VALUES("2006602322","Ivett","Medel Chilpa","tia_merol@yahoo.com.mx","v","6");
INSERT INTO auditorio VALUES("2007640141","Alin","Navarro","pangelvil@hotmail.com","v","1");
INSERT INTO auditorio VALUES("2009090072","DULCE GUADALUPE","BASILIO GONZALEZ","dulce_sorpre@hotmail.com","n","9");
INSERT INTO auditorio VALUES("2011640084","Brenda","Márquez León","adnerb_g2@hotmail.com","n","4");
INSERT INTO auditorio VALUES("2011640124","Alfonso ","Sandoval Rosas","exofernum_poncho@hotmail.com","n","5");
INSERT INTO auditorio VALUES("2011630292","Mitchel Joe","Torres Téllez","mjoe077@gmail.com","n","3");
INSERT INTO auditorio VALUES("2012640093","Oscar Eduardo","Licona García Rendón","ligo999@hotmail.com","n","2");
INSERT INTO auditorio VALUES("2006640207","ANGEL","GARCIA ALCANTARA","agarciaa0506@ipn.mx","v","10");
INSERT INTO auditorio VALUES("2011640107","Roy Azkary","Pineda Ibarra","rap.ibarra@gmail.com","n","5");
INSERT INTO auditorio VALUES("2012640119","Luis Alberto","Miranda Mozo","ipnluisluigi@hotmail.com","n","1");
INSERT INTO auditorio VALUES("2012640055","Osvaldo Uriel","Frias Pérez","osvaldourielfp@gmail.com","n","1");
INSERT INTO auditorio VALUES("2008301108","Jazmin","Antonio Cantor","jazminant@gmail.com","v","8");
INSERT INTO auditorio VALUES("2012640042","CARLOS ARTURO","DURÁN MANZANO","carlosadm12@gmail.com","n","1");
INSERT INTO auditorio VALUES("2008640057","Eduardo","Enriquez Vazquez","elalo_1251@hotmail.com","v","10");




CREATE TABLE `ponentes` (
  `id` int(6) NOT NULL auto_increment,
  `hora` char(11) default NULL,
  `nombre` varchar(250) default NULL,
  `empresa` varchar(250) default NULL,
  `email` varchar(250) NOT NULL default '',
  `pass` varchar(30) default NULL,
  `ponencia` varchar(250) default NULL,
  `clave` varchar(250) default NULL,
  `perfil` varchar(100) default NULL,
  `resumen` longtext,
  PRIMARY KEY  (`id`,`email`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO ponentes VALUES("1","12:15-12:45","David Fuentes","PricewaterhouseCoopers","asterium_metal@hotmail.com","david","Proyectos de Tecnologías de la Información y Comunicaciones en el ámbito de los negocios","Semi Senior Consultan & ITGC Audit","Actualización. Un enfoque a los proyectos de TI para dar respuesta a la planeación estratégica","En analogía con los organismos vivientes complejos contemporáneos, las tecnologías de la información y comunicaciones (TIC) han evolucionado pasando de simples y específicas entidades hasta convertirse en las soluciones de vida y negocio con las que contamos en nuestro tiempo.  A lo largo de su existencia, el ser humano ha dependido de su ingenio para poder sobrevivir y mejorar su calidad de vida  por tal motivo, la tecnología, producto del ingenio del ser humano, se ha convertido en pináculo de la civilización humana y en consecuencia, el perfil del especialista técnico o tecnólogo no puede seguir siendo excluyente de los principios de negocio que rigen a la sociedad vista a través de las organizaciones. La presente ponencia tiene por objetivo general el poder brindar al interesado una visión complementaria del entorno de las TIC a través de un enfoque de negocios y Top Management, cuya aplicación práctica se reflejará a través de los proyectos de inversión dentro de las organizaciones. De esta manera, se plantea abordar temas tales como la planeación estratégica, modelos de negocio y metodologías para la evaluación y gestión de proyectos de TIC con la finalidad de vender una idea que pueda germinar en el desarrollo individual de habilidades gerenciales que potencialicen su desarrollo profesional y les permitan ampliar su panorama particular.");
INSERT INTO ponentes VALUES("2","13:30-14:00","Julio Alberto Inclan","IBM","jinclang0500@gmail.com","julio","Vitaminas para tu TT o proyecto Empresarial","metaprogramación, java, framework, desarrollo agil, mixins, cloud computing","Desarrollo profesional","En esta charla buscaremos re-orientar la perspectiva hacia un pensamiento funcional, observando los problemas comunes y buscando encontrar nuevas formas para mejorar la codificación del día a día. Exploremos las tendencias en el desarrollo de sistemas orientado al mercado internacional, abordaremos usos, beneficios, casos de exito.\nAsi mismo hablaremos de la integración de estas tecnologias en un ambiente de alta disponibilidad y alta concurrencia.");
INSERT INTO ponentes VALUES("3","10:15-10:45","Raziel Rocha","ERCOM Technologies ","ra.rocha@alumni.ipade.mx","raziel","Emprender, una alternativa real","innovación, liderazgo e impacto social","Liderar e innovar","");
INSERT INTO ponentes VALUES("4","11:00-11:15","Fabian Mendieta","Intellego ","mateo3646@gmail.com","fabian","Hello, real world!!","derechos de autor, software libre, etica, becario, entrevista trabajo, desarrollo, certificación, maestría, sueldo, consultoría, idiomas, fabrica software, viajes.","Proyección profesional. Eres ingeniero y ¿Ahora qué?","En esta ponencia pretendo transmitir mi experiencia laboral las cosas a las que me he enfrentado y que me gustaría que no pasaran futuras generaciones. \n\nHablaré sobre la inteligencia emocional como catalizador para crecer en una organización.\n\nPretendo permear la necesidad de hablar otras lenguas para comprender otras culturas.\n\nMe gustaría sembrar la idea de que el dinero no necesariamente refleja el éxito de una persona.");
INSERT INTO ponentes VALUES("5","11:15-11:45","Luz Adriana Torres Ramos","OCESA","luzadrianat@gmail.com","luz","Data Minning: el valor de la información","Análisis de Información, Minería de Datos","Motivacional","Como el ser telemático me llevo al campo de la minería de datos. Como descubri mi pasión por este \"arte\", las satisfacciones que me ha dadoy las que me sigue dando y lo mejor, las aplicaciones y que impacto tienen y han tenido en el mercado.","Proyección profesional. Eres ingeniero y ¿Ahora qué?","En esta ponencia pretendo transmitir mi experiencia laboral; las cosas a las que me he enfrentado y que me gustaría que no pasaran futuras generaciones. \n\nHablaré sobre la inteligencia emocional como catalizador para crecer en una organización.\n\nPretendo permear la necesidad de hablar otras lenguas para comprender otras culturas.\n\nMe gustaría sembrar la idea de que el dinero no necesariamente refleja el éxito de una persona.");
INSERT INTO ponentes VALUES("6","11:45-12:15","José Alberto Juárez García ","Citibank - Banamex ","jalbertoj@gmail.com","alberto","La banca en México: las ITs y el campo laboral.","banca en México, ITs, experiencia profesional, oportunidades laborales","Las IT en tu desarrollo profesional","Te invito a conocer cómo se manejan las IT\'s en una institución bancaria transnacional y cuáles son las oportunidades de trabajo en uno de los sectores económicos de mayor crecimiento en América Latina.");
INSERT INTO ponentes VALUES("7","9:15-9:45","Gerardo Zamitis","Comertel argos SA de CV","gzamitis@gmail.com","gerardo","Proyectos de TIC en el ámbito de los negocio","Planeación y Modelos Financieros","Motivacional","Comertel argos SA de CV -Subgerente de Planeación y Modelos Financieros");
INSERT INTO ponentes VALUES("8","12:45-13:15","Daniel","NEOCENTER","daniel.ggm@hotmail.com","daniel","Telemáticos  creando oportunidades en la Telefonía IP","Telefonia, VoIP","motivacional","");
INSERT INTO ponentes VALUES("9","13:30-14:00","Mauricio Everardo de la Cruz","Banco Azteca ","mauricio_eve@hotmail.com ","mauricio","El Camino de la Certificación Java","Certificación Java, Niveles de Certificación, Oportunidades de Empleo, Crecimiento Profesional, Centros Certificadores","Perspectiva y motivacion para certificarse","La certificación acredita a nivel mundial los conocimientos y capacidades en diversas áreas de la programación Java. Existen varios niveles que certifican desde los conocimientos en POO hasta la Arquitectura de Sistemas con Java. Esto es un punto muy importante que toman en consideración los reclutadores, inclusive más que un título universitario.");
INSERT INTO ponentes VALUES("10","14:00-14:30","Luis Enrique Ramirez Chavez","CINVESTAV","sccluisx@gmail.com","luis","El posgrado : la visión de un estudiante telematico","","Despertar interes para hacer un posgrado","");
INSERT INTO ponentes VALUES("11","14:30-15:00","Rafael Olvera","MAPDATA ( hacemos mapas para google maps)","rafaelolverap@gmail.com","rafael"," Apps  para google maps:servicios de localización con software libre","apps, Mapas, empresa","Inquietar, motivar, despertar interes por el desarrollo colaborativo","");



