/*  Карта yandex API и добавление меток*/

ymaps.ready(init);

var myMap,
    royalParkMark, sibmallMark, visotskogoMark, auraMark, gogolyaMark,
    nskChance01, nskChance02, nskLily01, nskLily02, nskAton, nskBeautyEmpire, nskTihonova,
    nskVictory01, nskVictory02, nskVictory03, nskVictory04, nskNProfi, nskBeauty, nskBeautyAlphabet,
    nskKabanov, nskAlekseeva, /*nskResultPlus, nskKiseleva, nskAlexandra, nskNoname,*/

    berdskStylePlus,
    barnaulExpressA,

    /* mskStepanova,*/ mskDyadkina, mskAnb, mskChuhrov, mskAstahov01, mskAstahov02, mskFourMercuries,
    mskDutka, mskAliev, mskKulieva, mskHappyFingers, mskMashkov, mskLupashko, mskZinushina, mskMangarova, mskExpress,

    norilskVladko, vladivostokNpGroup, /*ochiRecord,*/ sochiKotlyarova, sochiExpress01, sochiExpress02, piterSherbakova, piterSashina,
    tomskStM, sevastopolDgafarov01, sevastopolDgafarov02, sevastopolDgafarov03, kazanAish,
    /*voronegBeautySphere*/ lipetskDudnik01, lipetskDudnik02, yaltaKtg01, yaltaKtg02;

function init() {

    myMap = new ymaps.Map("map", {
        center: [55.030199, 82.920430],
        zoom: 12
    });

/*    ymaps.geolocation.get({
    provider: 'yandex',
    autoReverseGeocode: true
}).then(function (result) {
    console.log(result.geoObjects.get(0).properties.get('metaDataProperty.GeocoderMetaData.AddressDetails.Country.AddressLine'));
});
*/


    /* ymaps.option.presetStorage.add('mystyle#userIcon', {
     iconLayout: "default#imageWithContent",
     iconImageHref: 'http://new.4hands.ru/wp-content/themes/cinderella/assets/images/tmp/4hands_map_icon2.png',
     iconImageSize: [36, 36],
     iconImageOffset: [-5, -38]
     });*/

    /* ymaps.layout.storage.add('my#theaterlayout');

     myMap.geoObjects.set({
     balloonContentBodyLayout: 'my#theaterlayout',
     balloonMaxWidth: 300,
     balloonMaxHeight: 150
     });*/

    royalParkMark = new ymaps.Placemark([55.055733, 82.911905], {
        hintContent: 'М Заельцовская, ТРЦ "Ройял Парк"',
        balloonContent: 'Красный проспект, 101, ТРЦ "Ройял Парк", Cтойка, +7 (383) 291-52-44, 10:00 - 22:00'
    });

    sibmallMark = new ymaps.Placemark([55.038970, 82.960728], {
        hintContent: 'М Березовая роща, ТРЦ "Сиб/Молл"',
        balloonContent: 'ул. Фрунзе, 238, 101, ТРЦ "Сиб/Молл, Cтойка, +7-923-124-79-24, 10:00 - 22:00'
    });

    visotskogoMark = new ymaps.Placemark([55.033249, 83.021149], {
        hintContent: 'ул. Высоцкого',
        balloonContent: 'ул. Высоцкого 39/5, Cалон, +7 (383) 214-44-84, 10:00 - 22:00'
    });

    auraMark = new ymaps.Placemark([55.028749, 82.936698], {
        hintContent: 'М Площадь Ленина, ТРЦ "Аура"',
        balloonContent: 'ул. Военная, 5, ТРЦ "Аура", Cалон, +7 (383) 310-63-88, 10:00 - 22:00'
    });

    gogolyaMark = new ymaps.Placemark([55.044743, 82.942870], {
        hintContent: 'М Маршала Покрышкина, Гоголя',
        balloonContent: 'ул. Гоголя 51, уч.центр, 9:00 - 20:00'
    });

    nskChance01 = new ymaps.Placemark([55.044753, 82.917375], {
        hintContent: 'М Красный проспект, Красный проспект, 74',
        balloonContent: 'Красный проспект, 74, Cалон, +7 (383) 286-31-12, 09:00 - 21:00'
    });

    nskChance02 = new ymaps.Placemark([54.860145, 83.105024], {
        hintContent: 'ТЦ "Эдем"',
        balloonContent: 'ул. Кутателадзе 4/4, Cтойка, +7-983-307-40-13, 10:00 - 22:00'
    });

    nskLily01 = new ymaps.Placemark([54.989280, 82.903775], {
        hintContent: 'М Студенческая, Геодезическая, 4',
        balloonContent: 'ул. Геодезическая, 4, Салон, +7-913-006-34-94, 09:00 - 21:00'
    });

    nskLily02 = new ymaps.Placemark([55.104311, 82.960692], {
        hintContent: 'ТРК "Голден Парк"',
        balloonContent: 'ул. Курчатова, 1, ТРК"Голден Парк", Cтойка, +7-913-713-92-34, 10:00 - 22:00'
    });

    nskAton = new ymaps.Placemark([54.966463, 82.852966], {
        hintContent: 'ТРЦ"Континент"',
        balloonContent: 'ул. Троллейная, 130а, ТРЦ"Континент", Cтойка, +7 (913) 007 00 73, 10:00 - 22:00'
    });

    nskBeautyEmpire = new ymaps.Placemark([54.999160, 83.010513], {
        hintContent: 'Выборная, 122',
        balloonContent: 'ул. Выборная, 122, Cалон, +7 (383) 239-57-95, 09:00 - 21:00'
    });

    nskTihonova = new ymaps.Placemark([54.988231, 82.806918], {
        hintContent: 'ТЦ "Cлобода"',
        balloonContent: 'ул. Забалуева 51а, ТЦ "Cлобода", Cалон, +7 (383) 239-57-95, 10:00 - 22:00'
    });

    nskVictory01 = new ymaps.Placemark([54.836072, 83.099347], {
        hintContent: 'Морской проспект, 44',
        balloonContent: 'Морской проспект,44, Cалон, +7 (383) 292-39-29, 09:00 - 21:00'
    });

    nskVictory02 = new ymaps.Placemark([54.984114, 82.891603], {
        hintContent: 'М Площадь Маркса, ТЦ "Версаль"',
        balloonContent: 'Пл. К. Маркса, 3, ТЦ "Версаль", Cтойка, 8 (913) 471 88 88, 10:00 - 22:00'
    });

    nskVictory03 = new ymaps.Placemark([55.023831, 82.918426], {
        hintContent: 'М Площадь Ленина, Советская, 8',
        balloonContent: 'ул. Советская, 8, Cалон, +7 (383) 263-70-17, 09:00 - 21:00'
    });

    nskVictory04 = new ymaps.Placemark([55.043721, 82.922334], {
        hintContent: 'М Красный проспект, ТРЦ "Галерея"',
        balloonContent: 'ул. Гоголя,13, ТРЦ "Галерея", Cтойка, +7 (383) 287-68-61, 10:00 - 22:00'
    });

    nskNProfi = new ymaps.Placemark([55.033409, 82.922846], {
        hintContent: 'М Площадь Ленина, Ядринцевская, 35',
        balloonContent: 'ул. Ядринцевская, 35, Cалон, +7 (383) 218-75-60, +7 (383) 218-75-30, +7-913-488-43-17, 09:00 - 21:00'
    });

    nskBeauty = new ymaps.Placemark([54.982079, 82.878209], {
        hintContent: 'М Площадь Маркса, Титова 17',
        balloonContent: 'ул. Титова 17, Cалон, +7 (383) 299-12-29, 09:00 - 21:00'
    });

    nskBeautyAlphabet = new ymaps.Placemark([55.044124, 82.906820], {
        hintContent: 'М Красный проспект, 1905 года, 69',
        balloonContent: 'ул. 1905 года, 69, Cалон, +7 (913) 010-42-97, 10:00 - 22:00'
    });

    nskKabanov = new ymaps.Placemark([55.036644, 82.916684], {
        hintContent: 'М Красный проспект, Фрунзе, 5',
        balloonContent: 'ул. Фрунзе, 5 217/2, Кабинет, +7 (923) 222-96-92, 10:00 - 22:00'
    });

    nskAlekseeva = new ymaps.Placemark([55.068767, 82.941154], {
        hintContent: 'М Заельцовская, Б.Хмельницкого, 14',
        balloonContent: 'ул. Б.Хмельницкого,14, Cалон, +7 (913) 915-95-55, 09:00 - 22:00'
    });

    berdskStylePlus = new ymaps.Placemark([54.764994, 83.080770], {
        hintContent: 'ТЦ "Астор"',
        balloonContent: 'ул. Ленина, 6/1, ТЦ "Астор", Cтойка, 205-29-05, 10:00 - 21:00'
    });

    barnaulExpressA = new ymaps.Placemark([53.352886, 83.772365], {
        hintContent: 'Пр-т Ленина, 78',
        balloonContent: 'Пр-т Ленина, 78, Cалон, +7 (3852) 58-10-62, 09:00 - 21:00'
    });

    mskDyadkina = new ymaps.Placemark([55.738591, 37.411005], {
        hintContent: 'М Молодежная, ТЦ "Кунцево-Плаза"',
        balloonContent: '1-й смоленский переулок 22/10, ТЦ "Кунцево-Плаза", Cалон, +7 (985) 427-48-70, 09:00 - 22:00'
    });

    mskAnb = new ymaps.Placemark([55.625567, 37.612290], {
        hintContent: 'M Южная, ТЦ "Акварель"',
        balloonContent: 'ул. Кировоградская, 9, к1, ТЦ "Акварель", Cалон, +7 (495) 762-78-08, 10:00 - 22:00'
    });

    mskChuhrov = new ymaps.Placemark([55.689355, 37.860234], {
        hintContent: 'М Жулебено, Генерала Кузнецова',
        balloonContent: 'ул. Генерала Кузнецова, 11 к1, Cалон, +7 (495) 706 50 06, 09:00 - 22:00'
    });

    mskAstahov01 = new ymaps.Placemark([55.845855, 37.662093], {
        hintContent: 'М Ростокино, ТРЦ "Золотой Вавилон"',
        balloonContent: 'ул. Мира 211 к2, ТРЦ "Золотой Вавилон", Cалон, +7 (929) 500-30-30, 10:00 - 22:00'
    });

    mskAstahov02 = new ymaps.Placemark([55.870157, 37.665938], {
        hintContent: 'М Бабушкинская, Менжинского',
        balloonContent: 'ул. Менжинского, 32 к3, Cалон, +7 (929) 500-50-20, 10:00 - 22:00'
    });

    mskFourMercuries = new ymaps.Placemark([55.790464, 37.530409], {
        hintContent: 'М Аэропорт, ТЦ "Авиапарк"',
        balloonContent: 'Ходынский бульвар 4, ТЦ "Авиапарк", Cалон, +7 (968) 828-24-44, 10:00 - 22:00'
    });

    mskDutka = new ymaps.Placemark([55.704981, 37.639994], {
        hintContent: 'М Автозаводская, ТРЦ "Ривьера"',
        balloonContent: 'ул. Автозаводская, 18, ТРЦ "Ривьера", Cалон, +7 (926) 586-81-11, 10:00 - 22:00'
    });

    mskAliev = new ymaps.Placemark([55.741784, 37.655894], {
        hintContent: 'М Марксистская, ТРЦ "Звездочка"',
        balloonContent: 'ул. Таганская, 1, ТРЦ "Звездочка", Cтойка, +7 (383) 310-63-88, 10:00 - 22:00'
    });

    mskKulieva = new ymaps.Placemark([55.705924, 37.931749], {
        hintContent: 'Рождественская',
        balloonContent: 'ул. Рождественская 35, Cалон, +7 (495) 768-50 08, 10:00 - 22:00'
    });

    mskHappyFingers = new ymaps.Placemark([55.780942, 37.601600], {
        hintContent: 'М Новослободская, Сущевская',
        balloonContent: 'ул. Сущевская 13-15, Cалон, +7 (916) 673-95-56, 10:00 - 21:00'
    });

    mskLupashko = new ymaps.Placemark([55.780942, 37.601600], {
        hintContent: 'М Коломенская, ДТРЦ "Нора"',
        balloonContent: 'ул. Андропова, 22, ДТРЦ "Нора", Cалон, +7 (977) 877-18-00, 10:00 - 22:00'
    });

    mskZinushina = new ymaps.Placemark([55.780942, 37.601600], {
        hintContent: 'М Митино, ТЦ "Ковчег"',
        balloonContent: 'ул. Митинская, 36 к1, ТРЦ "Аура", Cалон, +7 (495) 294-40-04, 10:00 - 22:00'
    });

    mskExpress = new ymaps.Placemark([55.687051, 37.603918], {
        hintContent: 'М Крымская, ТЦ "Капитолий"',
        balloonContent: 'Севастопольский пр-кт, 11Е, ТЦ "Капитолий", Cалон, +7 (985) 170-40-40, 10:00 - 22:00'
    });

    norilskVladko = new ymaps.Placemark([69.358603, 88.183372], {
        hintContent: 'СРК "Арена"',
        balloonContent: 'ул. Металлургов, 10, СРК "Арена", Стойка, +7 (3919) 415–144, 10:00 - 22:00'});

    vladivostokNpGroup = new ymaps.Placemark([43.117925, 131.888171], {
        hintContent: 'Краснознаменный пер',
        balloonContent: 'Краснознаменный пер, 4, Cалон, +7 (423) 202–51–01,  09:00 - 21:00'});

    sochiKotlyarova = new ymaps.Placemark([43.388880, 39.991496], {
        hintContent: 'Надежд бульвар',
        balloonContent: 'Надежд бульвар, 22, Кабинет, +7 (967) 321–98–70, 10:00 - 20:00'});

    sochiExpress01 = new ymaps.Placemark([43.588339, 39.724032], {
        hintContent: 'ТЦ "Атриум"',
        balloonContent: 'ул. Навагинская, 9д, 22, Салон, +7 (918) 205–77–55, 9:00 - 21:00'});

    sochiExpress02 = new ymaps.Placemark([43.574253, 39.725739], {
        hintContent: 'Приморская',
        balloonContent: 'ул. Приморская, 15а, Салон, +7 (918) 605–77–55, 10:00 - 20:00'});

    piterSherbakova = new ymaps.Placemark([59.929303, 30.347237], {
        hintContent: 'М Владимировская, Владимирский проспект',
        balloonContent: 'Владимирский проспект, 16, Салон, +7 (812) 984-57-62, 9:00 - 22:00'});

    piterSashina = new ymaps.Placemark([59.974707, 30.316335], {
        hintContent: 'М Петроградская, проспект Медиков',
        balloonContent: 'Проспект Медиков, 10 к.1, Салон, +7 812 960-26-82, 10:00 - 22:00'});

    tomskStM = new ymaps.Placemark([56.476453, 84.963441], {
        hintContent: 'Фрунзе',
        balloonContent: 'ул. Фрунзе 40, Салон, +7 (983) 232 40 04, 10:00 - 20:00'});

    sevastopolDgafarov01 = new ymaps.Placemark([44.552444, 33.529690], {
        hintContent: 'ТЦ "Sea Mall"',
        balloonContent: 'Проспект Генерала Острякова, д.260, ТЦ "Sea Mall", Стойка, +7 (978) 553 01 01, 10:00 - 20:00'});

    sevastopolDgafarov02 = new ymaps.Placemark([44.592422, 33.455678], {
        hintContent: 'ТЦ "NOVUS"',
        balloonContent: 'пр-т. Октябрьской революции, 24, Салон, ТЦ "NOVUS", Стойка, +7 (978) 552 01 01, 10.00 - 20.00 '});

    sevastopolDgafarov03 = new ymaps.Placemark([44.588725, 33.489796], {
        hintContent: 'ТРЦ "Муссон"',
        balloonContent: 'ул.Вакуленчука, 29, ТРЦ Муссон, Стойка, +7 (978) 551 01 01, 10:00 - 20:00'});

    kazanAish = new ymaps.Placemark([55.821350, 49.093406], {
        hintContent: 'ТЦ "Тандем"',
        balloonContent: 'проспект Ибрагимова, 56, ТЦ "Тандем", Салон, +7 (843) 296-07-44, 10:00 - 22:00'});

    lipetskDudnik01 = new ymaps.Placemark([52.605818, 39.577930], {
        hintContent: 'ТРЦ "Европа"',
        balloonContent: 'ул. Советская улица, 66, ТРЦ "Европа", Салон, + 7 (900) 591 73 73, 10:00 - 22:00'});

    lipetskDudnik02 = new ymaps.Placemark([52.592357, 39.504331], {
        hintContent: 'ТРЦ Ривьера',
        balloonContent: 'ул. Катукова 51, ТРЦ Ривьера, Салон, +7 (900) 592-67-67, 10:00 - 22:00'});

    yaltaKtg01 = new ymaps.Placemark([44.497755, 34.178328], {
        hintContent: 'Массандровский пляж',
        balloonContent: 'Массандровский пляж, павильон 4, Стойка, +7 (978) 116-91-99, 10:00 - 20:00'});

    yaltaKtg02 = new ymaps.Placemark([44.491461, 34.162957], {
        hintContent: 'Екатерининская',
        balloonContent: 'ул. Екатерининская, 3, Салон, +7 (978) 116-91-99, 10:00 - 20:00'});

    myMap.geoObjects.add(royalParkMark)
        .add(sibmallMark)
        .add(visotskogoMark)
        .add(auraMark)
        .add(gogolyaMark)

        .add(nskChance01)
        .add(nskChance02)
        .add(nskLily01)
        .add(nskLily02)
        .add(nskAton)
        .add(nskBeautyEmpire)
        .add(nskTihonova)
        .add(nskVictory01)
        .add(nskVictory02)
        .add(nskVictory03)
        .add(nskVictory03)
        .add(nskNProfi)
        .add(nskBeauty)
        .add(nskBeautyAlphabet)
        .add(nskKabanov)
        .add(nskAlekseeva)

        /* .add(nsk_result_plus)
         .add(nsk_kiseleva)
         .add(nsk_alexandra)
         .add(nsk_noname)*/

        .add(berdskStylePlus)
        .add(barnaulExpressA)

        /*   .add(mskStepanova)*/
        .add(mskDyadkina)
        .add(mskAnb)
        .add(mskChuhrov)
        .add(mskAstahov01)
        .add(mskAstahov02)
        .add(mskFourMercuries)
        .add(mskDutka)
        .add(mskAliev)
        .add(mskKulieva)
        .add(mskHappyFingers)
        /*      .add(mskMashkov)*/
        .add(mskLupashko)
        .add(mskZinushina)
        /*     .add(mskMangarova)*/
        .add(mskExpress)

        .add(norilskVladko)
        .add(vladivostokNpGroup)
        /*        .add(sochiRecord)*/
        .add(sochiKotlyarova)
        .add(sochiExpress01)
        .add(sochiExpress02)
        .add(piterSherbakova)
        .add(piterSashina)
        .add(tomskStM)
        .add(sevastopolDgafarov01)
        .add(sevastopolDgafarov02)
        .add(sevastopolDgafarov03)
        .add(kazanAish)
        /* .add(voronegBeautySphere)*/
        .add(lipetskDudnik01)
        .add(lipetskDudnik02)
        .add(yaltaKtg01)
        .add(yaltaKtg02);
}


