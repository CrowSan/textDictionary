<?php 
include_once 'functions.php';

/*function names: 
remove_persian($mixNames),
make_Array_list_en($names,$fileName)
make_Array_list_fa($names,$fileName)
add_Number($text, $namesList),
make_numbered_text($rawFileName,$finalFileName,$enJsonName)
replace_number($text, $perList)
make_named_text($faNameList
$textFile,$finalOutputName)*/

#to list names and get numbers
// $dumpin = file_get_contents("json/En_Demonic-names.json");
// $dumpin_decode = json_decode($dumpin, true);
// var_dump($dumpin_decode);

// make_Array_list_fa("txt/name_Fa.txt","Demonic-names");
// make_numbered_text("txt/birth-1601-1700.txt","Demonic-numbered","json/En_Demonic-names.json");
// make_named_text("json/Fa_Demonic-names.json","txt/Demonic_number_translate.txt","Demonic_transled_new_style");


// $enNamesString = "noah,great builder,army,night,miss void,expert,divine demon,wilfred,luke,shandal,theodora,creature,iann,alexander,radiant eye,fergie,pearl,supreme thief,foolery,pyramid,aura,giant,sword saint,leader,puppet,parasite,hybrid,hybrids,duanlong,cultivator,cultivate,legion,harold,althea,hound,space hounds,daisy,devil,snore,other world,fay,gloria,otto,pterodactyl,moira,delbert,demonic sword,rebecca,melissa,robert,castor,breakthrough,experts,assets,inscription field,shadow domain,diagram,mental sea,workshop,dark matter,battle formation,jordan,rune,hydra,space ring,ethereal,bloodlust,lower plane,higher plane,imminent tournament,healing,isaac putgan,balvan,demon prince,thomas balvan,william,quinn,kevin,li neregnes mason,balor,captain,sandy,ethan,mark,orson,merger,uriah assea,lily,maxwell,valerie,lena,rhys,wayne,trevor,fabian,virginia shosti,grant,voydol,kirk,eddy,neil,elbas,hive,daniel,june balor,patriarch,eccentric thunder,amos,heilong,zac,adrian,drew,andrew,godright hand,bruce,god of the empire,king elbass,lord carner,octavia,lisa,thirty,seven,yang system,sinnell family,putgan family,monneay family,sailbrird family,rotway family,balrow family,carner family,udye family,sawler family,lansay family,divine deduction,beastessence,fire pill,dantian,black beart,nine headed hydra,thomas,thirty seven,divine architect,cecil,lady edna,sharp trunk,arthur,tisha,zave,gillian,icy cascade,wardens,mystical fog,elder,julia,clara,austin,cheryl,jason,duke,iris,doyle,laurel,chasing demon,flying demon,dreaming demon,charming demon,ravaging demon,exiled demon,bleeding demon,thieving demon,severing demon,suffering demon,enduring demon ,gods,inscription,blood companion,elite guard,inner circle,noble,yin yang system,mansion,dynasty,mages,credit,obsidian credits,azure credits,pharos stone,carriages,trials,dodge,level,orthodox,unorthodox,cause,tribulations,coral archipelago,utra nation,odrea nation,papral nation,afria nation,efrana nation,inheritance ground,martial art,secret art,granite abyss,cursed dragon,magical beast,magical beasts,creatures,azure ground,figure,formation,lava lake,earthwill,heaven will,royals,nourishments,primordial ice,forge,royal inheritance,divine beings,existence,mausoleum,council,empire,powerhouses,headquarters,higher ranks,automaton,danger zones, sect,terrain,junior,coast,azure plain,enlightenment,envoy,cry,separate dimension,teleportation matrix,teleport,inscribed item,forging of seven hells,elemental forging method,body inscription spell,demonic form,wind slash,black hole cultivation,ethereal form,dragonclaw martial art,ethereal claws,mental tremor spell,ethereal figure,dark blast spell,black hole spell,silver body spell,black body transformation spell,warp spell,shadow sprint martial art,will consuming runes,centers of power,dark ray spell,dark cover spell,ghostly claws spell,death area spell,inner fire pill,earth pill,space rings,saber,sabers,moon niddle,breath blessing,liquid dantian,fundamentals dantian,cultivation,cycle,body nourishing,seven hells method,mental energy,kesier rune,mental sphere,sea of consciousness,lowest tier,middle tier,upper tier,peak tier,gaseous stage,liquid stage,solid stage,human ranks,heroic ranks,divine ranks,four eyed wolf,ironclad spiders,thunder wolf,magical beasts packs,black bear,horned snake,sandworms,cloud eagle,evasive maneuver,singularities,singularity,defensive spell,dimensional tunnel,dimensional passage,immortal lands,kaiser species,copy,nation";
// $faNamesString = "noah - نوآ,great builder - سازنده بزرگ,army - ارتش,night - نایت,miss void - بانو ووید,expert - ارشد,divine demon - شیطان آسمانی,wilfred - ویلفرد,luke - لوک,shandal - شاندال,theodora - تئودورا,creature - موجودات,ian - ایان,alexander - الکساندر,radiant eye - چشم درخشان,fergie - فرجی,pearl - پرل,supreme thief - دزد ارشد,foolery - فولری,pyramid - هرم,aura - هاله,giant - غول,sword saint - قدیس شمشیر,leader - رهبر,puppet - عروسک,parasite - انگل,hybrid - دورگه,hybrids - دورگه‌ها,duanlong - دوان‌لونگ,cultivator - تهذیب‌گر,cultivate - تهذیب,legion - لژیون,harold - هرالد,althea - آلتیا,hound - سگ,space hounds - سگ فضایی,daisy - دیِزی,devil - شیطان,snore - اسنور,other world - دنیای دیگر,fay - فِی,gloria - گلوریا,otto - اوتو,pterodactyl - پتروداکتیل,moira - موریا,delbert - دلبرت,demonic sword - شمشیر شیطانی,rebecca - ربکا,melissa - ملیسا,robert - رابرت,castor - کستور,breakthrough - گذر از سطح,experts - ارشد,assets - نیروها,inscription field - علم حکاکی,shadow domain - دامنه سایه,diagram - دیاگرام,mental sea - دریای آگاهی,workshop - کارگاه,dark matter - ماده تاریک,battle formation - ساختار جنگی,jordan - جوردن,rune - رون,hydra - هایدرا,space ring - حلقه فضایی ,ethereal - اثیری,bloodlust - عطش خون,lower plane - سرزمین پایینی,higher plane - سرزمین‌های بالایی,imminent tournament - مسابقات حتمی,healing - درمانی,isaac putgan - آیزاک پوتگان,balvan - بالوان,demon prince - شاهزاده شیطانی,thomas balvan - توماس بالوان,william - ویلیام,quinn - کوئین,kevin - کوین,li neregnes mason - لی نرگنس منسون,balor - بالور,captain - کاپیتان,sandy - سندی,ethan - ایتن,mark - مارک,orson - اورسون,merger - مرجر,uriah assea - اوریا آسیا,lily - لیلی,maxwell - مکسول,valerie - والریا,lena - لنا,rhys - ریس,wayne - وین,trevor - ترور,fabian - فابیان,virginia shosti - ویرجینیا شونستی,grant - گرانت,voydol - وویدال,kirk - کیرک,eddy - ادی,neil - نیل,elbas - الباس,hive - هایو,daniel - دنیل,june - جون,patriarch - پدرسالار,eccentric thunder - رعد عجیب,amos - آموس لاچستر,heilong - هی‌لونگ,zac - زک,adrian - آدریان,drew - درو,andrew - اندرو,godright hand - دست راست یزدان,bruce - بروس,god of the empire - یزدان امپراتوری,king elbas - پادشاه الباس,lord carner - لرد کرنر,octavia - اوکتاویا,lisa - لیزا,thirty - ترتی,seven - سِوِن,yang system - یانک سیستم,sinnell family - خاندان سینل,putgan family - خاندان پوتگان,monneay family - خاندان مان‌نی,sailbrird family - خاندان سیل‌بریرد,rotway family - خاندان رات‌وی,balrow family - خاندان بارلو,carner family - خاندان کارنر,udye family - خاندان اودی,sawler family - خاندان ساولر,lansay family - خاندان لنسی,divine deduction - قضاوت آسمانی,beastessence - گوهر جانوری,fire pill - قرص آتش,dantian - دانتیان,black beart - قلب سیاه,nine headed hydra - هایدرای نه سر,thomas - توماس,thirty seven - سی و هفت,divine architect - معمار آسمانی,cecil - سسیل,lady edna - بانو ادنا,sharp trunk - تیزتن,arthur - آرتور,tisha - تیشا,zave - زِیو,gillian - جیلیان,icy cascade - آبشار یخی,wardens - محافظان,mystical fog - مه عرفانی,elder - ارشد,julia - جولیا,clara - کلارا,austin - آستین,cheryl - شریل,jason - جیسون,duke - دوک,iris - آیریس,doyle - دویل,laurel - لاورل,chasing demon - شیطان تعقیب‌گر,flying demon - شیطان پرنده,dreaming demon - شیطان رویابین,charming demon - شیطان دل‌ربا,ravaging demon - شیطان ویران‌گر,exiled demon - شیطان تبعیدی,bleeding demon - شیطانی خونین,thieving demon - شیطان غارت‌گر,severing demon - شیطان بی‌رحم,suffering demon - شیطان دردمند,enduring demon - شیطان صبور,gods - یزادان‌ها,inscription - حکاکی,blood companion - همراه خونی,elite guard - محافظ نخبه,inner circle - حلقه درونی,noble - نجیب,yin yang system - سیستم یین و یانگ,mansion - عمارت,dynasty - سلسله,mages - جادوگرها,credit - اعتبار,obsidian credits - اعتبارهای آبسیدینی,azure credits - اعتبار لاجوردی,martial arts - هنرهای رزمی,pharos stone - سنگ فاروح,trials - آزمون‌ها,dodge - جاخالی,level - سطح,orthodox - فرقه راست,unorthodox - فرقه چپ,cause - آرمان,tribulations - مصیب زمین و آسمان,coral archipelago - مجمع‌الجزایر مرجان,utra - اوترا,odrea - اودریا,papral - پاپرال,afria - آفریا,efrana - افرانا,inheritance ground - زمین ارثیه,martial art - هنرهای رزمی,secret art - هنرهای مخفی,granite abyss - آبیس گرانیتی,cursed dragon - اژدهای نفرین شده,magical beast - جانور جادویی,magical beasts - جانوران جادویی,creatures - موجودات,azure ground - سرزمین لاجوردی,figure - وجود,formation - ساختار,lava lake - دریاچه لاوا,earthwill - اراده زمین,heaven will - اراده آسمان,royals - اشرافی,nourishments - تغذیه,primordial ice - یخ بدوی,forge - خلق,royal inheritance - ارثیه سلطنتی,divine beings - موجودات آسمانی,existence - موجود,mausoleum - آرامگاه,council - شورا,empire - امپراتوری,powerhouses - ابرقدرت‌ها,headquarters - مراکز فرماندهی,higher ranks - رتبه بالاها,automaton - روح حلقه,danger zones - منطقه خطر,sect - فرقه,terrain - دشت,junior - جوان,coast - خط‌ساحلی,azure plain - دشت لاجوردی,enlightenment - روشن‌گری,envoy - فرستاده,cry - غرش,separate dimension - بُعد جداگانه,teleportation matrix - ماتریکس انتقال,teleport - تله‌پورت,inscribed item - آیتم‌های حکاکی شده,forging of seven hells - جعل هفت جهنم,elemental forging method - روش جعل عنصری,body inscription spell - طلسم حکاکی بدن,demonic form - فرم شیطانی,wind slash - برش بادی,black hole cultivation - تهذیب سیاه‌چاله,ethereal form - حالت اثیری,dragonclaw martial art - هنر رزمی پنجه اژدها,ethereal claws - پنجه‌های اثیری,mental tremor spell - طلسم لرزش ذهنی,ethereal figure - وجود اثیری,dark blast spell - طلسم انفجار سیاه,black hole spell - طلسم سیاه‌چال,silver body spell - طلسم بدن نقره‌ای,black body transformation spell - طلم تغییر شکل بدن سیاه,warp spell - طلسم جهش سریع,shadow sprint martial art - هنر رزمی قدم سایه,will consuming runes - رون‌های بلعنده اراده,centers of power - مراکز قدرت,dark ray spell - طلسم تابش تاریک,dark cover spell - طلسم پوشش تاریک,ghostly claws spell - طلسم پنجه‌های روحی,death area spell - طلسم منطقه مرگ,inner fire pill - قرص آتش درونی,earth pill - قرص زمین,space rings - حلقه فضایی,saber - شمشیر,sabers - شمشیر,moon niddle - سوزن ماه,breath blessing - برکت نفس,liquid dantian - دانتیان مایع,fundamentals dantian - پایه‌ریزی دانتیان,cultivation - تهذیب,cycle - چرخه,body nourishing - تغذیه بدن,seven hells method - روش هفت جهنم,mental energy - انرژی ذهنی,kesier rune - رون کایسر,mental sphere - حوزه ذهنی,sea of consciousness - دریای آگاهی,lowest tier - رده پایین,middle tier - رده متوسط,upper tier - رده بالا,peak tier - اوج رده,gaseous stage - مرحله گازی,liquid stage - مرحله مایع,solid stage - مرحله جامد,human ranks - رتبه‌های انسانی,heroic ranks - رتبه‌های قهرمانی,divine ranks - رتبه‌های آسمانی,four eyed wolf - گرگ چهار چشم,ironclad spiders - عنکبوت‌های پنجه آهنی,thunder wolf - گرگ تندر,magical beasts packs - دسته جانوران جادویی,black bear - خرس سیاه,horned snake - مار شاخ‌دار,sandworms - کرم خاکی,cloud eagle - عقاب آسمانی,evasive maneuver - حرکات فراری,singularities - فردیت‌ها,singularity - فردیت,defensive spell - طلسم دفاعی,dimensional tunnel - تونل ابعادی,dimensional passage - گذرگاه ابعادی,immortal lands - سرزمین‌های فانی,kaiser species - گونه کایسر,copy - کپی,nation - کشور";
// $enNamesArray = explode("," ,$enNamesString);
// $faNamesArray = explode("," , $faNamesString);

// $nameList = array_combine($enNamesArray, $faNamesArray);



// try {
//     $data = json_encode($nameList, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
//     $utf8Data = mb_convert_encoding($data, 'UTF-8');
//     file_put_contents("json/Demonic_nameList.json", $utf8Data);
// } catch (Exception $e) {
//     echo "Error saving data: " . $e->getMessage();
// }


$meArr = array(
    "zero",
    "one",
    array(
        "zero - in - zero",
        "one - in - zero "
    )
); 

echo "<pre>";
print_r($meArr);

?>
