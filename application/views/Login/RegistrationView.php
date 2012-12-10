<td width="778">
	<form method="post" action = "/Login/adduser/">
    <table> 
<tbody><tr>
        <td><table border="0" width="778" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td class="pageHeading">Мои данные</td>
            
          </tr>
          <tr>
            <td>
                         </td>
          </tr>
        </tbody></table></td>
      </tr>
      
      <tr>
        <td class="smallText"><br><font color="#FF0000"><small><b>ВНИМАНИЕ:</b></small></font> Если Вы уже зарегистрированы на нашем сайте, введите, пожалуйста, Ваш логин и пароль в форму на ниже списка категорий</a>.</td>
      </tr>
      <tr>
      <td><font color="#FF0000" size="4"><?php echo isset($_SESSION['error']) ? $_SESSION['error'] : '';?></font></td>
      </tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
          <tbody><tr>
            <td class="main"><b>Ваши персональные данные</b></td>
           <td class="inputRequirement" align="right">* Обязательно для заполнения</td>
          </tr>
        </tbody></table></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">
          <tbody><tr class="infoBoxContents">
            <td>
            <!-- msc start -->
            <table border="0" width="100%" cellspacing="0" cellpadding="0">
	          <tbody><tr>
		       <td>
		       <!-- msc end -->
		<table border="0" cellspacing="2" cellpadding="2">
              <tbody><tr>
               <td class="main"><input type="hidden" name="href"></td>
              </tr>
              <tr>
                <td class="main">Имя:</td>

                                <td class="main"><input type="text" name="firstname" value="<?php echo isset($_SESSION['firstname']) ? $_SESSION['firstname'] : '';?>">&nbsp;<span class="inputRequirement">*</span></td>
              </tr>
              <tr>
                <td class="main">Фамилия:</td>
                <td class="main"><input type="text" name="lastname" value="<?php echo isset($_SESSION['lastname']) ? $_SESSION['lastname'] : '';?>">&nbsp;<span class="inputRequirement">*</span></td>
              </tr>
              
              <tr>
                <td class="main">E-Mail:</td>
                <td class="main"><input type="text" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : '';?>">&nbsp;<span class="inputRequirement">*</span></td>
              </tr></tbody></table>
             <!-- msc start -->
             </td>
		     
        	</tr>
          </tbody></table>
            <!-- msc end -->
            </td>
          </tr>
        </tbody></table></td>
      </tr>
      
      <tr>
        <td class="main"><b>Ваш адрес</b></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">
          <tbody><tr class="infoBoxContents">
            <td><table border="0" cellspacing="2" cellpadding="2">


              <tbody><tr>

                <td class="main">Страна:</td>

                <td class="main"><select name="country"><option value="<?php echo isset($_SESSION['country']) ? $_SESSION['country'] : '';?>">Выберите</option><option value="13">Австралия</option><option value="14">Австрия</option><option value="15">Азербайджан</option><option value="2">Албания</option><option value="3">Алжир</option><option value="4">Американский Самоа</option><option value="7">Ангилья</option><option value="6">Ангола</option><option value="5">Андорра</option><option value="8">Антарктика</option><option value="9">Антигуа и Барбуда</option><option value="151">Антильские острова</option><option value="221">Арабские Эмираты</option><option value="10">Аргентина</option><option value="11">Армения</option><option value="12">Аруба</option><option value="1">Афганистан</option><option value="16">Багамские острова</option><option value="18">Бангладеш</option><option value="19">Барбадос</option><option value="17">Бахрейн</option><option value="20">Беларусь</option><option value="22">Белиз</option><option value="21">Бельгия</option><option value="23">Бенин</option><option value="24">Бермуды</option><option value="33">Болгария</option><option value="26">Боливия</option><option value="27">Босния и Герцеговина</option><option value="28">Ботсвана</option><option value="30">Бразилия</option><option value="31">Британские территории Индийского океана</option><option value="32">Бруней</option><option value="34">Буркина Фасо</option><option value="35">Бурунди</option><option value="25">Бутан</option><option value="227">Вануату</option><option value="228">Ватикан</option><option value="222">Великобритания</option><option value="97">Венгрия</option><option value="229">Венесуэла</option><option value="231">Виргинские острова (Британские)</option><option value="232">Виргинские острова (США)</option><option value="61">Восточный Тимур</option><option value="230">Вьетнам</option><option value="78">Габон</option><option value="93">Гаити</option><option value="92">Гайана</option><option value="79">Гамбия</option><option value="82">Гана</option><option value="87">Гваделупа</option><option value="89">Гватемала</option><option value="90">Гвинея</option><option value="91">Гвинея-Бисау</option><option value="81">Германия</option><option value="83">Гибралтар</option><option value="95">Гондурас</option><option value="96">Гонконг (Китай)</option><option value="86">Гренада</option><option value="85">Гренландия</option><option value="84">Греция</option><option value="80">Грузия</option><option value="88">Гуам</option><option value="57">Дания</option><option value="58">Джибути</option><option value="59">Доминика</option><option value="60">Доминиканская республика</option><option value="63">Египет</option><option value="237">Заир</option><option value="238">Замбия</option><option value="234">Западная Сахара</option><option value="239">Зимбабве</option><option value="104">Израиль</option><option value="99">Индия</option><option value="100">Индонезия</option><option value="108">Иордания</option><option value="102">Ирак</option><option value="101">Иран</option><option value="103">Ирландия</option><option value="98">Исландия</option><option value="195">Испания</option><option value="105">Италия</option><option value="235">Йемен</option><option value="109">Казахстан</option><option value="40">Каймановы острова</option><option value="36">Камбоджа</option><option value="37">Камерун</option><option value="38">Канада</option><option value="173">Катар</option><option value="110">Кения</option><option value="55">Кипр</option><option value="111">Кирибати</option><option value="44">Китайская Народная Республика</option><option value="46">Кокосовые острова</option><option value="47">Колумбия</option><option value="48">Коморские острова</option><option value="49">Конго</option><option value="112">Корейская Народная Демократическая республика</option><option value="113">Корея</option><option value="51">Коста Рика</option><option value="52">Кот-д Ивуар</option><option value="54">Куба</option><option value="114">Кувейт</option><option value="115">Кыргызстан</option><option value="116">Лаос</option><option value="117">Латвия</option><option value="119">Лесото</option><option value="120">Либерия</option><option value="118">Ливан</option><option value="121">Ливия</option><option value="123">Литва</option><option value="122">Лихтенштейн</option><option value="124">Люксембург</option><option value="136">Маврикий</option><option value="135">Мавритания</option><option value="127">Мадагаскар</option><option value="137">Майотта</option><option value="125">Макао (Китай)</option><option value="126">Македония</option><option value="128">Малави</option><option value="129">Малайзия</option><option value="131">Мали</option><option value="130">Мальдивские острова</option><option value="132">Мальта</option><option value="159">Марианские острова</option><option value="144">Марокко</option><option value="134">Мартиника</option><option value="133">Маршалловы острова</option><option value="138">Мексика</option><option value="139">Микронезия</option><option value="145">Мозамбик</option><option value="140">Молдова</option><option value="141">Монако</option><option value="142">Монголия</option><option value="143">Монтсеррат</option><option value="146">Мьянма</option><option value="147">Намибия</option><option value="148">Науру</option><option value="149">Непал</option><option value="155">Нигер</option><option value="156">Нигерия</option><option value="150">Нидерланды</option><option value="154">Никарагуа</option><option value="157">Ниуэ</option><option value="153">Новая Зеландия</option><option value="152">Новая Каледония</option><option value="160">Норвегия</option><option value="161">Оман</option><option value="29">остров Буве</option><option value="158">остров Норфолк</option><option value="169">остров Питкэрн</option><option value="45">остров Рождества</option><option value="197">остров Святой Елены</option><option value="233">острова Валлис и Футуна</option><option value="94">острова Герда и МакДональда</option><option value="39">острова Зеленого Мыса</option><option value="50">острова Кука</option><option value="181">острова Самоа</option><option value="201">острова Свалбард и Ян Майен</option><option value="217">острова Туркс и Кайкос</option><option value="224">Отдаленные Острова США</option><option value="162">Пакистан</option><option value="163">Палау</option><option value="164">Панама</option><option value="165">Папуа - Новая Гвинея</option><option value="166">Парагвай</option><option value="167">Перу</option><option value="170">Польша</option><option value="171">Португалия</option><option value="172">Пуэрто-Рико</option><option value="174">Реюньон</option><option value="176" selected="">Россия</option><option value="177">Руанда</option><option value="175">Румыния</option><option value="64">Сальвадор</option><option value="182">Сан-Марино</option><option value="183">Сан-Томе и Принсипи</option><option value="184">Саудовская Аравия</option><option value="202">Свазиленд</option><option value="186">Сейшельские острова</option><option value="198">Сен-Пьер и Микелон</option><option value="185">Сенегал</option><option value="180">Сент-Винсент и Гренадины</option><option value="178">Сент-Китс и Невис</option><option value="179">Сент-Люсия</option><option value="188">Сингапур</option><option value="205">Сирия</option><option value="189">Словакия</option><option value="190">Словения</option><option value="223">Соединенные Штаты Америки</option><option value="191">Соломоновы острова</option><option value="192">Сомали</option><option value="199">Судан</option><option value="200">Суринам</option><option value="187">Сьерра-Леоне</option><option value="207">Таджикистан</option><option value="206">Тайвань (Республика Китай)</option><option value="209">Тайланд</option><option value="208">Танзания</option><option value="210">Того</option><option value="211">Токелау</option><option value="212">Тонга</option><option value="213">Тринидад и Тобаго</option><option value="218">Тувалу</option><option value="214">Тунис</option><option value="216">Туркменистан</option><option value="215">Турция</option><option value="219">Уганда</option><option value="226">Узбекистан</option><option value="220">Украина</option><option value="225">Уругвай</option><option value="70">Фарерские острова</option><option value="71">Фиджи</option><option value="168">Филиппины</option><option value="72">Финляндия</option><option value="69">Фолклендские (Мальвинские) острова</option><option value="73">Франция</option><option value="74">Франция, Метрополия</option><option value="75">Французская Гвиана</option><option value="76">Французская Полинезия</option><option value="77">Французские Южные Территории</option><option value="53">Хорватия</option><option value="41">Центральная Африканская Республика</option><option value="42">Чад</option><option value="56">Чехия</option><option value="43">Чили</option><option value="204">Швейцария</option><option value="203">Швеция</option><option value="196">Шри Ланка</option><option value="62">Эквадор</option><option value="65">Экваториальная Гвинея</option><option value="66">Эритрея</option><option value="67">Эстония</option><option value="68">Эфиопия</option><option value="193">ЮАР</option><option value="236">Югославия</option><option value="194">Южная Георгия и Южные Сандвичевы острова</option><option value="106">Ямайка</option><option value="107">Япония</option></select>&nbsp;<span class="inputRequirement">*</span></td>

              </tr>

              <tr>

                <td class="main">Почтовый индекс:</td>
                                <td class="main"><input type="text" name="postcode" value="<?php echo isset($_SESSION['city']) ? $_SESSION['city'] : '';?>">&nbsp; для Москвы не обязателен &nbsp;<span class="inputRequirement">*</span></td>
                <!--td class="main"><input type="hidden" name="postcode" value="101000"></td-->

              </tr>
              <tr>
                <td class="main">Город:</td>
                
                <td class="main"><input type="text" name="city" value="<?php echo isset($_SESSION['city']) ? $_SESSION['city'] : '';?>">&nbsp;<span class="inputRequirement">*</span></td>
              </tr>
<tr>
<td class="main">Область:</td>
<td class="main">
<select name="region" value=""><option value="">Выберите область</option><option value="Агинский Бурятский авт. округ">Агинский Бурятский авт. округ</option><option value="Адыгея респ.">Адыгея респ.</option><option value="Алтай респ.">Алтай респ.</option><option value="Алтайский край">Алтайский край</option><option value="Амурская обл.">Амурская обл.</option><option value="Архангельская обл.">Архангельская обл.</option><option value="Астраханская обл.">Астраханская обл.</option><option value="Башкортостан респ.">Башкортостан респ.</option><option value="Белгородская обл.">Белгородская обл.</option><option value="Брянская обл.">Брянская обл.</option><option value="Бурятия респ.">Бурятия респ.</option><option value="Владимирская обл.">Владимирская обл.</option><option value="Волгоградская обл.">Волгоградская обл.</option><option value="Вологодская обл.">Вологодская обл.</option><option value="Воронежская обл.">Воронежская обл.</option><option value="Дагестан респ.">Дагестан респ.</option><option value="Еврейская автономная обл.">Еврейская автономная обл.</option><option value="Ивановская обл.">Ивановская обл.</option><option value="Ингушская респ.">Ингушская респ.</option><option value="Иркутская обл.">Иркутская обл.</option><option value="Кабардино-Балкарская респ.">Кабардино-Балкарская респ.</option><option value="Калининградская обл.">Калининградская обл.</option><option value="Калмыкия-Хальмг Танч респ.">Калмыкия-Хальмг Танч респ.</option><option value="Калужская обл.">Калужская обл.</option><option value="Камчатская обл.">Камчатская обл.</option><option value="Карачаево-Черкесская респ.">Карачаево-Черкесская респ.</option><option value="Карелия респ.">Карелия респ.</option><option value="Кемеровская обл.">Кемеровская обл.</option><option value="Кировская обл.">Кировская обл.</option><option value="Коми респ.">Коми респ.</option><option value="Коми-Пермяцкий авт. округ">Коми-Пермяцкий авт. округ</option><option value="Корякский авт. округ">Корякский авт. округ</option><option value="Костромская обл.">Костромская обл.</option><option value="Краснодарский край">Краснодарский край</option><option value="Красноярский край">Красноярский край</option><option value="Курганская обл.">Курганская обл.</option><option value="Курская обл.">Курская обл.</option><option value="Ленинградская обл.">Ленинградская обл.</option><option value="Липецкая обл.">Липецкая обл.</option><option value="Магаданская обл.">Магаданская обл.</option><option value="Марий-Эл респ.">Марий-Эл респ.</option><option value="Мордовия респ.">Мордовия респ.</option><option value="Москва" selected="">Москва</option><option value="Московская обл.">Московская обл.</option><option value="Мурманская обл.">Мурманская обл.</option><option value="Ненецкий авт. округ">Ненецкий авт. округ</option><option value="Нижегородская обл.">Нижегородская обл.</option><option value="Новгородская обл.">Новгородская обл.</option><option value="Новосибирская обл.">Новосибирская обл.</option><option value="Омская обл.">Омская обл.</option><option value="Оренбургская обл.">Оренбургская обл.</option><option value="Орловская обл.">Орловская обл.</option><option value="Пензенская обл.">Пензенская обл.</option><option value="Пермская обл.">Пермская обл.</option><option value="Приморский край">Приморский край</option><option value="Псковская обл.">Псковская обл.</option><option value="Ростовская обл.">Ростовская обл.</option><option value="Рязанская обл.">Рязанская обл.</option><option value="Самарская обл.">Самарская обл.</option><option value="Санкт-Петербург">Санкт-Петербург</option><option value="Саратовская обл.">Саратовская обл.</option><option value="Саха респ.">Саха респ.</option><option value="Сахалинская обл.">Сахалинская обл.</option><option value="Свердловская обл.">Свердловская обл.</option><option value="Северная Осетия респ.">Северная Осетия респ.</option><option value="Смоленская обл.">Смоленская обл.</option><option value="Ставропольский край">Ставропольский край</option><option value="Таймырский авт. округ">Таймырский авт. округ</option><option value="Тамбовская обл.">Тамбовская обл.</option><option value="Татарстан респ.">Татарстан респ.</option><option value="Тверская обл.">Тверская обл.</option><option value="Томская обл.">Томская обл.</option><option value="Тульская обл.">Тульская обл.</option><option value="Тыва респ.">Тыва респ.</option><option value="Тюменская обл.">Тюменская обл.</option><option value="Удмуртская респ.">Удмуртская респ.</option><option value="Ульяновская обл.">Ульяновская обл.</option><option value="Усть-Ордынский авт. округ">Усть-Ордынский авт. округ</option><option value="Хабаровский край">Хабаровский край</option><option value="Хакасия респ.">Хакасия респ.</option><option value="Ханты-Мансийский авт. округ">Ханты-Мансийский авт. округ</option><option value="Челябинская обл.">Челябинская обл.</option><option value="Чечня респ.">Чечня респ.</option><option value="Читинская обл.">Читинская обл.</option><option value="Чувашия респ.">Чувашия респ.</option><option value="Чукотский авт. округ">Чукотский авт. округ</option><option value="Эвенкийский авт. округ">Эвенкийский авт. округ</option><option value="Ямало-Ненецкий авт. округ">Ямало-Ненецкий авт. округ</option><option value="Ярославская обл.">Ярославская обл.</option></select><span class="inputRequirement">*</span></td>
</tr>

              <tr>

                <td class="main">Улица, номер дома, квартира:</td>

                
                <td class="main"><input type="text" name="street_address" value="<?php echo isset($_SESSION['street_address']) ? $_SESSION['street_address'] : '';?>">&nbsp;<span class="inputRequirement">*</span></td>

              </tr>
            </tbody></table></td>
          </tr>
        </tbody></table></td>
      </tr>
     
      <tr>
        <td class="main"><b>Контактная информация</b></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">
          <tbody><tr class="infoBoxContents">
            <td><table border="0" cellspacing="2" cellpadding="2">
              <tbody><tr>
                <td class="main">Телефон:</td>
                <td class="main"><input type="text" name="phone" value="<?php echo isset($_SESSION['phone']) ? $_SESSION['phone'] : '';?>">&nbsp;<span class="inputRequirement" value="">*</span></td>
              </tr>
              <tr>
                <td class="main">Мобильный:</td>
                <td class="main"><input type="text" name="mobile_phone" value="<?php echo isset($_SESSION['mobile_phone']) ? $_SESSION['mobile_phone'] : '';?>">&nbsp;</td>
              </tr>
            </tbody></table></td>
          </tr>
        </tbody></table></td>
      </tr>
     
      
   
      
      <tr>
        <td class="main"><b>Ваш пароль</b></td>
      </tr>
<!-- -->
    <!--  -->
      <tr>
        <td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">
          <tbody><tr class="infoBoxContents">
            <td><table border="0" cellspacing="2" cellpadding="2">
              <tbody><tr>                <td class="main">Пароль:</td>
                <td class="main"><input type="password" name="password1" maxlength="40">&nbsp;<span class="inputRequirement">*</span></td>
              </tr>
              <tr>
                <td class="main">Подтвердите пароль:</td>
                <td class="main"><input type="password" name="password2" maxlength="40" >&nbsp;<span class="inputRequirement">*</span></td>                 </tr>
            </tbody></table></td>
          </tr>
        </tbody></table></td>
      </tr>
      
      <tr>
        <td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">
          <tbody><tr class="infoBoxContents">
            <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tbody><tr>
                
                <td align="right"><input type="submit" name="submit" value="submit" src="" border="0" alt="Продолжить" title=" Продолжить "></td>
                 
              </tr>
            </tbody></table></td>
          </tr>
        </tbody></table></td>
      </tr>
    </tbody>
    </table>

