document.addEventListener("DOMContentLoaded", () => {
    // Sample farmers data
    const farmers = [
      {
        id: 1,
        name: "Олександра Харченко",
        slug: "oleksandra-harchenko",
        location: "Полтавська область",
        categories: ["dairy", "vegetables"],
        shortDescription: "Сімейна молочна ферма з традиціями, що передаються з покоління в покоління",
        description: `
          <p>Олександра Харченко — власниця сімейної ферми "Молочний край", яка розташована в мальовничому селі Великі Сорочинці на Полтавщині. Вже понад 15 років Олександра та її родина займаються виробництвом натуральних молочних продуктів найвищої якості.</p>
          
          <p>Ферма "Молочний край" — це не просто бізнес, а справжня сімейна справа, де традиції виробництва молочних продуктів передаються з покоління в покоління. Олександра успадкувала любов до фермерства від своїх батьків, які навчили її всіх тонкощів догляду за тваринами та виробництва молочних продуктів.</p>
          
          <p>На фермі утримується понад 50 корів голштинської та джерсейської порід, які відомі своїм високоякісним молоком. Тварини випасаються на екологічно чистих пасовищах та отримують збалансований раціон з натуральних кормів, вирощених на власних полях ферми.</p>
          
          <p>Олександра та її команда виробляють широкий асортимент молочних продуктів: свіже молоко, кефір, сметану, йогурти, сири та масло. Всі продукти виготовляються за традиційними рецептами без використання консервантів та штучних добавок.</p>
          
          <p>Окрім молочного господарства, на фермі також вирощують овочі та зелень, які використовуються для виробництва молочних продуктів з наповнювачами, а також продаються окремо.</p>
          
          <p>"Наша місія — забезпечити людей натуральними та корисними продуктами, виробленими з любов'ю та турботою про природу", — говорить Олександра.</p>
        `,
        history: `
          <h3>Історія ферми "Молочний край"</h3>
          
          <p>Історія ферми "Молочний край" почалася в 1995 році, коли батьки Олександри, Петро та Марія Харченки, придбали невелику ділянку землі в селі Великі Сорочинці та завели перших трьох корів.</p>
          
          <p>Спочатку це було невелике господарство для забезпечення власної родини молочними продуктами, але поступово, завдяки наполегливій праці та відданості справі, ферма почала розширюватися.</p>
          
          <p>У 2008 році, після закінчення аграрного університету, Олександра повернулася в рідне село та взяла на себе управління фермою. Вона впровадила нові технології та методи ведення господарства, що дозволило значно підвищити якість продукції та розширити асортимент.</p>
          
          <p>У 2012 році ферма отримала сертифікат органічного виробництва, що підтверджує високу якість та екологічність продукції.</p>
          
          <p>Сьогодні "Молочний край" — це сучасне фермерське господарство, яке поєднує традиційні методи виробництва з інноваційними технологіями, забезпечуючи споживачів натуральними та корисними продуктами.</p>
        `,
        mainImage: "https://images.unsplash.com/photo-1595438280062-5d39940cd900?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80",
        gallery: [
          "https://images.unsplash.com/photo-1594761051656-153faa48d5fd?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80",
          "https://images.unsplash.com/photo-1596797038530-2c107229654b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80",
          "https://images.unsplash.com/photo-1594761051656-153faa48d5fd?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80",
          "https://images.unsplash.com/photo-1596797038530-2c107229654b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
        ],
        products: [
          {
            name: "Фермерське молоко 3,4%",
            category: "Молочні продукти",
            image: "https://images.unsplash.com/photo-1563636619-e9143da7973b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
          },
          {
            name: "Сир кисломолочний 5%",
            category: "Молочні продукти",
            image: "https://images.unsplash.com/photo-1486297678162-eb2a19b0a32d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
          },
          {
            name: "Сметана домашня 20%",
            category: "Молочні продукти",
            image: "https://images.unsplash.com/photo-1588710929895-6ee7a0a4d6eb?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
          },
          {
            name: "Масло вершкове 73%",
            category: "Молочні продукти",
            image: "https://images.unsplash.com/photo-1589985270826-4b7bb135bc9d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
          }
        ]
      },
      {
        id: 2,
        name: "Віктор Литвинчук",
        slug: "viktor-lytvynchuk",
        location: "Київська область",
        categories: ["meat"],
        shortDescription: "Ферма з вирощування птиці та виробництва м'ясних продуктів найвищої якості",
        description: `
          <p>Віктор Литвинчук — власник ферми "Щасливий птах", яка спеціалізується на вирощуванні домашньої птиці та виробництві м'ясних продуктів. Ферма розташована в екологічно чистому районі Київської області, поблизу села Гора.</p>
          
          <p>Віктор розпочав свій фермерський шлях у 2010 році, коли придбав невелику ділянку землі та збудував перші пташники. Сьогодні його господарство налічує понад 1000 голів птиці різних порід: кури, качки, гуси та індики.</p>
          
          <p>На фермі "Щасливий птах" птиця вирощується в умовах, максимально наближених до природних. Тварини мають вільний доступ до вигулу на свіжому повітрі, отримують натуральні корми без антибіотиків та гормонів росту.</p>
          
          <p>"Наша філософія — це повага до природи та тварин. Ми створюємо для птиці комфортні умови утримання, забезпечуємо збалансоване харчування та дбайливий догляд. Це дозволяє нам отримувати м'ясо найвищої якості, яке цінують наші клієнти", — розповідає Віктор.</p>
          
          <p>Окрім свіжого м'яса, на фермі виробляють різноманітні м'ясні делікатеси: копчені та в'ялені продукти, ковбаси, паштети. Всі вони виготовляються за традиційними рецептами без використання штучних добавок та консервантів.</p>
          
          <p>Віктор постійно вдосконалює методи ведення господарства, впроваджує нові технології та розширює асортимент продукції, щоб задовольнити потреби найвибагливіших клієнтів.</p>
        `,
        history: `
          <h3>Історія ферми "Щасливий птах"</h3>
          
          <p>Історія ферми "Щасливий птах" почалася в 2010 році, коли Віктор Литвинчук, маючи досвід роботи в аграрному секторі, вирішив розпочати власну справу. Він придбав невелику ділянку землі в селі Гора Київської області та збудував перші пташники для утримання курей.</p>
          
          <p>Спочатку на фермі утримувалося лише 100 курей, але завдяки якісній продукції та сарафанному радіо, попит на м'ясо та яйця від "Щасливого птаха" швидко зростав. Це дозволило Віктору поступово розширювати господарство та збільшувати поголів'я птиці.</p>
          
          <p>У 2015 році на фермі було збудовано сучасний цех з переробки м'яса, що дозволило розширити асортимент продукції та почати виробництво м'ясних делікатесів.</p>
          
          <p>У 2018 році ферма отримала сертифікат відповідності стандартам якості ISO 22000, що підтверджує високу якість та безпечність продукції.</p>
          
          <p>Сьогодні "Щасливий птах" — це сучасне фермерське господарство, яке постійно розвивається та вдосконалюється, щоб забезпечувати споживачів якісною та натуральною продукцією.</p>
        `,
        mainImage: "https://images.unsplash.com/photo-1500937386664-56d1dfef3854?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80",
        gallery: [
          "https://images.unsplash.com/photo-1516467508483-a7212febe31a?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80",
          "https://images.unsplash.com/photo-1548550023-2bdb3c5beed7?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80",
          "https://images.unsplash.com/photo-1516467508483-a7212febe31a?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80",
          "https://images.unsplash.com/photo-1548550023-2bdb3c5beed7?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
        ],
        products: [
          {
            name: "Тушка домашньої курки",
            category: "М'ясо та птиця",
            image: "https://images.unsplash.com/photo-1587593810167-a84920ea0781?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
          },
          {
            name: "Філе куряче",
            category: "М'ясо та птиця",
            image: "https://images.unsplash.com/photo-1604503468506-a8da13d82791?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
          },
          {
            name: "Стегна курячі",
            category: "М'ясо та птиця",
            image: "https://images.unsplash.com/photo-1518492104633-130d0cc84637?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
          },
          {
            name: "Ковбаса домашня",
            category: "М'ясо та птиця",
            image: "https://images.unsplash.com/photo-1542901031-ec5eeb518e83?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
          }
        ]
      },
      {
        id: 3,
        name: "Олександр Орлов",
        slug: "oleksandr-orlov",
        location: "Львівська область",
        categories: ["meat", "bakery"],
        shortDescription: "Виробництво ковбас та м'ясних делікатесів за старовинними рецептами",
        description: `
          <p>Олександр Орлов — майстер-ковбасник та власник сімейної ферми "Смачний хутір", яка розташована в мальовничому селі Карпатського регіону. Вже понад 20 років Олександр займається виробництвом ковбас та м'ясних делікатесів за старовинними рецептами, які передаються в його родині з покоління в покоління.</p>
          
          <p>Ферма "Смачний хутір" — це невелике, але сучасне господарство, де утримуються свині, корови та птиця. Тварини вирощуються в екологічно чистих умовах, на натуральних кормах, без використання гормонів росту та антибіотиків.</p>
          
          <p>Особливістю продукції Олександра є те, що всі ковбаси та м'ясні делікатеси виготовляються вручну за традиційними рецептами з використанням натуральних спецій та прянощів. Процес виробництва включає тривале маринування м'яса, натуральне копчення на буковій та вишневій тріскі, а також тривале в'ялення.</p>
          
          <p>"Секрет наших ковбас — у поєднанні якісного м'яса, натуральних спецій та часу. Ми не поспішаємо та не використовуємо штучних прискорювачів процесу. Кожен продукт має свій час дозрівання, і ми поважаємо цей природний процес", — розповідає Олександр.</p>
          
          <p>Асортимент продукції "Смачного хутора" включає різноманітні ковбаси (варені, напівкопчені, сирокопчені), шинку, бекон, паштети, а також м'ясні консерви. Всі продукти виготовляються без консервантів та штучних добавок.</p>
          
          <p>Окрім м'ясного виробництва, на фермі також випікають хліб та булочки в традиційній дров'яній печі, використовуючи борошно власного помелу.</p>
        `,
        history: `
          <h3>Історія ферми "Смачний хутір"</h3>
          
          <p>Історія ферми "Смачний хутір" бере свій початок у 1990-х роках, коли Олександр Орлов, після закінчення кулінарного училища, вирішив відродити сімейні традиції виробництва ковбас та м'ясних делікатесів.</p>
          
          <p>Спочатку це була невелика домашня коптильня, де Олександр експериментував з рецептами, які залишилися йому від діда — відомого в регіоні майстра-ковбасника. Поступово, завдяки унікальному смаку продукції та відданості традиціям, невелике виробництво перетворилося на справжню ферму.</p>
          
          <p>У 2005 році Олександр придбав додаткову ділянку землі та розширив господарство, почавши самостійно вирощувати тварин для свого виробництва. Це дозволило повністю контролювати якість м'яса та гарантувати натуральність продукції.</p>
          
          <p>У 2010 році на фермі було збудовано сучасний цех з виробництва м'ясних делікатесів, який поєднує традиційні методи з сучасними стандартами безпеки та гігієни.</p>
          
          <p>У 2015 році асортимент продукції розширився завдяки відкриттю пекарні, де випікають хліб та булочки за старовинними рецептами в традиційній дров'яній печі.</p>
          
          <p>Сьогодні "Смачний хутір" — це сімейне підприємство, яке зберігає та розвиває традиції виробництва натуральних продуктів, радуючи своїх клієнтів неповторним смаком та якістю.</p>
        `,
        mainImage: "https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80",
        gallery: [
          "https://images.unsplash.com/photo-1560781290-7dc94c0f8f4f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80",
          "https://images.unsplash.com/photo-1591154669695-5f2a8d20c089?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80",
          "https://images.unsplash.com/photo-1560781290-7dc94c0f8f4f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80",
          "https://images.unsplash.com/photo-1591154669695-5f2a8d20c089?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
        ],
        products: [
          {
            name: "Ковбаса Салямі Італійська",
            category: "Ковбаси та делікатеси",
            image: "https://images.unsplash.com/photo-1542901031-ec5eeb518e83?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
          },
          {
            name: "Шинка домашня",
            category: "Ковбаси та делікатеси",
            image: "https://images.unsplash.com/photo-1588315029754-2dd089d39a1a?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
          },
          {
            name: "Бекон копчений",
            category: "Ковбаси та делікатеси",
            image: "https://images.unsplash.com/photo-1529856426070-e610ede5a2fd?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
          },
          {
            name: "Хліб на заквасці",
            category: "Хлібобулочні вироби",
            image: "https://images.unsplash.com/photo-1549931319-a545dcf3bc73?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
          }
        ]
      },
      {
        id: 4,
        name: "Марія Коваленко",
        slug: "maria-kovalenko",
        location: "Закарпатська область",
        categories: ["honey", "bakery"],
        shortDescription: "Виробництво натурального меду та продуктів бджільництва з гірських районів Закарпаття",
        description: `
          <p>Марія Коваленко — пасічниця у третьому поколінні та власниця пасіки "Медовий рай", яка розташована в мальовничих горах Закарпаття. Вже понад 10 років Марія займається бджільництвом та виробництвом натурального меду та інших продуктів бджільництва.</p>
          
          <p>Пасіка "Медовий рай" розташована на висоті понад 700 метрів над рівнем моря, в екологічно чистому районі, далеко від промислових об'єктів та автомагістралей. Це забезпечує унікальний склад та смак меду, який виробляють бджоли, збираючи нектар з диких гірських квітів та трав.</p>
          
          <p>На пасіці утримується понад 200 бджолиних сімей, які розміщені в традиційних дерев'яних вуликах. Марія практикує органічне бджільництво, не використовуючи антибіотики та хімічні препарати для лікування бджіл.</p>
          
          <p>"Бджоли — це дивовижні створіння, які потребують поваги та дбайливого ставлення. Ми намагаємося створити для них максимально комфортні умови, щоб вони могли виробляти мед найвищої якості", — розповідає Марія.</p>
          
          <p>Асортимент продукції "Медового раю" включає різні сорти меду (липовий, акацієвий, гречаний, лісовий, гірське різнотрав'я), а також прополіс, пергу, маточне молочко та медові композиції з горіхами, сухофруктами та спеціями.</p>
          
          <p>Окрім бджільництва, Марія також випікає медові пряники та інші солодощі за старовинними рецептами, використовуючи власний мед та натуральні інгредієнти.</p>
        `,
        history: `
          <h3>Історія пасіки "Медовий рай"</h3>
          
          <p>Історія пасіки "Медовий рай" почалася ще в 1950-х роках, коли дідусь Марії, Петро Коваленко, повернувшись з війни, вирішив зайнятися бджільництвом. Він збудував перші вулики та почав розводити бджіл у своєму саду.</p>
          
          <p>З часом пасіка розросталася, і вже батько Марії, Іван Коваленко, розширив господарство до 50 бджолиних сімей. Він також почав експериментувати з різними сортами меду, переміщуючи вулики в різні райони Закарпаття залежно від цвітіння медоносів.</p>
          
          <p>Марія з дитинства допомагала батькові на пасіці, а після закінчення аграрного університету вирішила продовжити сімейну справу. У 2010 році вона перейняла управління пасікою та почала впроваджувати нові методи органічного бджільництва.</p>
          
          <p>У 2015 році Марія заснувала бренд "Медовий рай" та почала активно розвивати виробництво не лише меду, але й інших продуктів бджільництва. Вона також відкрила невелику пекарню, де випікає традиційні медові пряники та інші солодощі за старовинними рецептами.</p>
          
          <p>У 2018 році продукція "Медового раю" отримала сертифікат органічного виробництва, що підтверджує її високу якість та екологічність.</p>
          
          <p>Сьогодні пасіка "Медовий рай" — це сімейне підприємство, яке зберігає традиції бджільництва та радує своїх клієнтів натуральними та корисними продуктами.</p>
        `,
        mainImage: "https://images.unsplash.com/photo-1587049352851-8d4e89133924?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80",
        gallery: [
          "https://images.unsplash.com/photo-1471943311424-646960669fbc?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80",
          "https://images.unsplash.com/photo-1558642891-54be180ea339?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80",
          "https://images.unsplash.com/photo-1471943311424-646960669fbc?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80",
          "https://images.unsplash.com/photo-1558642891-54be180ea339?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
        ],
        products: [
          {
            name: "Мед липовий натуральний",
            category: "Мед та продукти бджільництва",
            image: "https://images.unsplash.com/photo-1587049352851-8d4e89133924?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
          },
          {
            name: "Мед акацієвий",
            category: "Мед та продукти бджільництва",
            image: "https://images.unsplash.com/photo-1555211652-5c6222f9cf62?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
          },
          {
            name: "Прополіс",
            category: "Мед та продукти бджільництва",
            image: "https://images.unsplash.com/photo-1564940735784-b39a2e3f4cc8?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
          },
          {
            name: "Медові пряники",
            category: "Хлібобулочні вироби",
            image: "https://images.unsplash.com/photo-1607681034540-2c46cc71896d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
          }
        ]
      },
      {
        id: 5,
        name: "Іван Петренко",
        slug: "ivan-petrenko",
        location: "Херсонська область",
        categories: ["vegetables"],
        shortDescription: "Органічне вирощування овочів та фруктів на родючих землях Херсонщини",
        description: `
          <p>Іван Петренко — засновник та власник органічної ферми "Зелений сад", яка розташована в Херсонській області, відомій своїми родючими ґрунтами та сприятливим кліматом для вирощування овочів та фруктів.</p>
          
          <p>Іван має аграрну освіту та понад 15 років досвіду в органічному землеробстві. Він заснував свою ферму в 2008 році, коли придбав 10 гектарів землі та почав вирощувати овочі без використання хімічних добрив та пестицидів.</p>
          
          <p>Сьогодні ферма "Зелений сад" — це 30 гектарів органічних угідь, де вирощується широкий асортимент овочів (помідори, огірки, перець, баклажани, капуста, морква, буряк) та фруктів (яблука, груші, сливи, абрикоси, персики).</p>
          
          <p>На фермі використовуються сучасні методи органічного землеробства: сівозміна, компостування, мульчування, крапельне зрошення. Для боротьби зі шкідниками застосовуються біологічні методи захисту рослин.</p>
          
          <p>"Наша мета — вирощувати здорові та смачні продукти, які не шкодять ні людям, ні природі. Ми не використовуємо хімічні добрива, пестициди та ГМО. Натомість, ми працюємо в гармонії з природою, підтримуючи природну родючість ґрунту та біорізноманіття", — розповідає Іван.</p>
          
          <p>Ферма "Зелений сад" має сертифікат органічного виробництва, що підтверджує дотримання всіх стандартів та вимог до органічної продукції.</p>
          
          <p>Окрім вирощування овочів та фруктів, на фермі також виробляють натуральні соки, джеми, сушені фрукти та овочі, а також консервацію за традиційними рецептами.</p>
        `,
        history: `
          <h3>Історія ферми "Зелений сад"</h3>
          
          <p>Історія ферми "Зелений сад" почалася в 2008 році, коли Іван Петренко, маючи досвід роботи в аграрному секторі та бачення щодо розвитку органічного землеробства в Україні, придбав 10 гектарів землі в Херсонській області.</p>
          
          <p>Перші роки були непростими: доводилося відновлювати родючість ґрунту, який був виснажений попередніми власниками, експериментувати з різними сортами рослин, шукати ефективні методи боротьби зі шкідниками без використання хімікатів.</p>
          
          <p>У 2012 році ферма отримала перший сертифікат органічного виробництва, що дозволило розширити ринок збуту та знайти нових клієнтів, які цінують якість та екологічність продукції.</p>
          
          <p>У 2015 році Іван розширив господарство, придбавши додаткові 20 гектарів землі та заклавши фруктовий сад. Також було збудовано сучасне овочесховище з контрольованим мікрокліматом, що дозволило зберігати врожай протягом тривалого часу без втрати якості.</p>
          
          <p>У 2018 році на фермі було відкрито цех з переробки овочів та фруктів, де почали виробляти натуральні соки, джеми, сушені фрукти та овочі, а також консервацію.</p>
          
          <p>Сьогодні "Зелений сад" — це успішне органічне господарство, яке постійно розвивається та впроваджує нові технології, залишаючись вірним принципам органічного землеробства та сталого розвитку.</p>
        `,
        mainImage: "https://images.unsplash.com/photo-1500937386664-56d1dfef3854?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80",
        gallery: [
          "https://images.unsplash.com/photo-1471193945509-9ad0617afabf?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80",
          "https://images.unsplash.com/photo-1470091688026-38b8b661c126?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80",
          "https://images.unsplash.com/photo-1471193945509-9ad0617afabf?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80",
          "https://images.unsplash.com/photo-1470091688026-38b8b661c126?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
        ],
        products: [
          {
            name: "Помідори органічні",
            category: "Овочі",
            image: "https://images.unsplash.com/photo-1518977822534-7049a61ee0c2?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
          },
          {
            name: "Огірки органічні",
            category: "Овочі",
            image: "https://images.unsplash.com/photo-1449300079323-02e209d9d3a6?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
          },
          {
            name: "Яблука органічні",
            category: "Фрукти",
            image: "https://images.unsplash.com/photo-1567306226416-28f0efdc88ce?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
          },
          {
            name: "Сік яблучний натуральний",
            category: "Напої",
            image: "https://images.unsplash.com/photo-1576673442511-7e39b6545c87?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
          }
        ]
      }
    ];
  
    // DOM elements
    const farmersGrid = document.getElementById("farmers-grid");
    const farmersEmpty = document.getElementById("farmers-empty");
    const farmersSearchInput = document.getElementById("farmers-search-input");
    const farmersSearchClear = document.getElementById("farmers-search-clear");
    const resetFarmersSearch = document.getElementById("reset-farmers-search");
    const farmersFilter = document.getElementById("farmers-filter");
    const farmerProfileContainer = document.getElementById("farmer-profile-container");
    const relatedFarmersGrid = document.getElementById("related-farmers-grid");
  
    // Get farmer slug from URL
    const urlParams = new URLSearchParams(window.location.search);
    const farmerSlug = urlParams.get("farmer");
  
    // Initialize
    if (farmerSlug) {
      // We're on the farmer profile page
      renderFarmerProfile(farmerSlug);
    } else if (farmersGrid) {
      // We're on the farmers list page
      renderFarmers(farmers);
    }
  
    // Event listeners
    if (farmersSearchInput) {
      farmersSearchInput.addEventListener("input", handleSearch);
    }
  
    if (farmersSearchClear) {
      farmersSearchClear.addEventListener("click", clearSearch);
    }
  
    if (resetFarmersSearch) {
      resetFarmersSearch.addEventListener("click", clearSearch);
    }
  
    if (farmersFilter) {
      farmersFilter.addEventListener("change", handleFilter);
    }
  
    // Functions
    function renderFarmers(farmersToRender) {
      if (!farmersGrid) return;
  
      if (farmersToRender.length === 0) {
        farmersGrid.innerHTML = "";
        farmersEmpty.style.display = "flex";
        return;
      }
  
      farmersEmpty.style.display = "none";
      farmersGrid.innerHTML = farmersToRender.map(farmer => `
        <div class="farmer-card">
          <div class="farmer-image">
            <img src="${farmer.mainImage}" alt="${farmer.name}">
          </div>
          <div class="farmer-content">
            <h3 class="farmer-name">${farmer.name}</h3>
            <div class="farmer-location">
              <svg class="icon" viewBox="0 0 24 24">
                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                <circle cx="12" cy="10" r="3"></circle>
              </svg>
              <span>${farmer.location}</span>
            </div>
            <div class="farmer-categories">
              ${farmer.categories.map(category => `
                <span class="farmer-category">${getCategoryName(category)}</span>
              `).join("")}
            </div>
            <p class="farmer-description">${farmer.shortDescription}</p>
            <a href="farmer-profile.php?farmer=${farmer.slug}" class="btn btn-outline">Детальніше</a>
          </div>
        </div>
      `).join("");
    }
  
    function renderFarmerProfile(slug) {
      if (!farmerProfileContainer) return;
  
      const farmer = farmers.find(f => f.slug === slug);
      if (!farmer) {
        window.location.href = "farmers.php";
        return;
      }
  
      farmerProfileContainer.innerHTML = `
        <section class="farmer-hero">
          <div class="container">
            <div class="farmer-hero-content">
              <div class="farmer-hero-image">
                <img src="${farmer.mainImage}" alt="${farmer.name}">
              </div>
              <div class="farmer-hero-info">
                <h1 class="farmer-hero-title">${farmer.name}</h1>
                <div class="farmer-hero-location">
                  <svg class="icon" viewBox="0 0 24 24">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                    <circle cx="12" cy="10" r="3"></circle>
                  </svg>
                  <span>${farmer.location}</span>
                </div>
                <div class="farmer-hero-categories">
                  ${farmer.categories.map(category => `
                    <span class="farmer-category">${getCategoryName(category)}</span>
                  `).join("")}
                </div>
                <p class="farmer-hero-description">${farmer.shortDescription}</p>
              </div>
            </div>
          </div>
        </section>
  
        <section class="farmer-about">
          <div class="container">
            <div class="farmer-about-content">
              <div class="farmer-about-text">
                <h2 class="section-title">Про фермера</h2>
                <div class="farmer-description-text">
                  ${farmer.description}
                </div>
              </div>
            </div>
          </div>
        </section>
  
        <section class="farmer-gallery">
          <div class="container">
            <h2 class="section-title">Галерея</h2>
            <div class="farmer-gallery-grid">
              ${farmer.gallery.map(image => `
                <div class="gallery-item">
                  <img src="${image}" alt="${farmer.name}">
                </div>
              `).join("")}
            </div>
          </div>
        </section>
  
        <section class="farmer-products">
          <div class="container">
            <h2 class="section-title">Продукція</h2>
            <div class="farmer-products-grid">
              ${farmer.products.map(product => `
                <div class="product-card">
                  <div class="product-image">
                    <img src="${product.image}" alt="${product.name}">
                  </div>
                  <div class="product-content">
                    <div class="product-category">${product.category}</div>
                    <h3 class="product-title">${product.name}</h3>
                    <div class="product-farmer">
                      <svg class="icon icon-sm" viewBox="0 0 24 24">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                      </svg>
                      <span>від ${farmer.name}</span>
                    </div>
                    <div class="product-footer">
                      <a href="catalog.php" class="btn btn-outline btn-sm">Переглянути в каталозі</a>
                    </div>
                  </div>
                </div>
              `).join("")}
            </div>
          </div>
        </section>
  
        <section class="farmer-history">
          <div class="container">
            <div class="farmer-history-content">
              <div class="farmer-history-text">
                ${farmer.history}
              </div>
            </div>
          </div>
        </section>
      `;
  
      // Render related farmers
      if (relatedFarmersGrid) {
        const relatedFarmersData = farmers
          .filter(f => f.id !== farmer.id)
          .sort(() => 0.5 - Math.random())
          .slice(0, 3);
  
        relatedFarmersGrid.innerHTML = relatedFarmersData.map(relatedFarmer => `
          <div class="farmer-card">
            <div class="farmer-image">
              <img src="${relatedFarmer.mainImage}" alt="${relatedFarmer.name}">
            </div>
            <div class="farmer-content">
              <h3 class="farmer-name">${relatedFarmer.name}</h3>
              <div class="farmer-location">
                <svg class="icon" viewBox="0 0 24 24">
                  <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                  <circle cx="12" cy="10" r="3"></circle>
                </svg>
                <span>${relatedFarmer.location}</span>
              </div>
              <div class="farmer-categories">
                ${relatedFarmer.categories.map(category => `
                  <span class="farmer-category">${getCategoryName(category)}</span>
                `).join("")}
              </div>
              <p class="farmer-description">${relatedFarmer.shortDescription}</p>
              <a href="farmer-profile.php?farmer=${relatedFarmer.slug}" class="btn btn-outline">Детальніше</a>
            </div>
          </div>
        `).join("");
      }
    }
  
    function handleSearch() {
      const searchValue = farmersSearchInput.value.trim().toLowerCase();
  
      if (searchValue) {
        farmersSearchClear.style.opacity = "1";
        farmersSearchClear.style.visibility = "visible";
      } else {
        farmersSearchClear.style.opacity = "0";
        farmersSearchClear.style.visibility = "hidden";
      }
  
      const filteredFarmers = filterFarmers();
      renderFarmers(filteredFarmers);
    }
  
    function clearSearch() {
      farmersSearchInput.value = "";
      farmersSearchClear.style.opacity = "0";
      farmersSearchClear.style.visibility = "hidden";
      farmersFilter.value = "all";
      renderFarmers(farmers);
    }
  
    function handleFilter() {
      const filteredFarmers = filterFarmers();
      renderFarmers(filteredFarmers);
    }
  
    function filterFarmers() {
      const searchValue = farmersSearchInput.value.trim().toLowerCase();
      const filterValue = farmersFilter.value;
  
      return farmers.filter(farmer => {
        // Search filter
        const matchesSearch = !searchValue || 
          farmer.name.toLowerCase().includes(searchValue) || 
          farmer.shortDescription.toLowerCase().includes(searchValue) || 
          farmer.location.toLowerCase().includes(searchValue);
  
        // Category filter
        const matchesCategory = filterValue === "all" || farmer.categories.includes(filterValue);
  
        return matchesSearch && matchesCategory;
      });
    }
  
    function getCategoryName(categoryId) {
      const categories = {
        dairy: "Молочні продукти",
        meat: "М'ясо та птиця",
        vegetables: "Овочі та фрукти",
        honey: "Мед та продукти бджільництва",
        bakery: "Хлібобулочні вироби"
      };
      return categories[categoryId] || categoryId;
    }
  });
  