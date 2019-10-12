import React from 'react';
import DateSelector from '../components/DateSelector';


function PassengerInfo({title="بزرگسال",passengerType=1}){
    return(
        <section className="tabs">
        <div className="tabs-title">
            <div className="tab-title">
                <i className="green fas fa-times-circle"></i>
                <label>{title}</label>
            </div>


        </div>
        
            <div className="tab-desctiption">
                <div className="fields">
                    {/* فیلدهای مخفی */}
                    {/* passengerType adt=1,chd=2,inf=3 */}
                    <input type="hidden" name="PassengerType[]" value={passengerType}/>
                    <div className="field">
                        <label >نام(لاتین)</label>
                        <input type="text" name="PassengerFirstName[]" id="fa-name"/>
                    </div>
                    <div className="field">
                        <label >نام خانوادگی(لاتین)</label>
                        <input type="text" name="PassengerLastName[]" id="fa-name"/>
                    </div>
                    <div className="field">
                        <label >جنسیت</label>
                        <select name="gender[]" id="gender1">
                            <option value="0">آقا</option>
                            <option value="1">خانم</option>
                        </select>
                    </div>
                    <div className="field">
                        <label >تاریخ تولد</label>
                        <DateSelector name="DateOfBirth[]" />
                    </div>
                    <div className="field">
                        <label >کشور صادر کننده پاسپورت</label>
                        <select className="select2" name="Country[]">
                            <option value="IRN">
                                        ایران
                                    </option><option value="AZE">
                                        آذربایجان
                                    </option><option value="ARG">
                                        آرژانتین
                                    </option><option value="ABW">
                                        آروبا
                                    </option><option value="ZAF">
                                        آفریقا جنوبی
                                    </option><option value="CAF">
                                        آفریقای مرکزی
                                    </option><option value="ALB">
                                        آلبانی
                                    </option><option value="DEU">
                                        آلمان
                                    </option><option value="ATG">
                                        آنتیگوا و باربودا
                                    </option><option value="BES">
                                        آنتیل هلند
                                    </option><option value="AND">
                                        آندورا
                                    </option><option value="AGO">
                                        آنگولا
                                    </option><option value="AIA">
                                        آنگویلا
                                    </option><option value="AUT">
                                        اتریش
                                    </option><option value="ETH">
                                        اتیوپی
                                    </option><option value="JOR">
                                        اردن
                                    </option><option value="ARM">
                                        ارمنستان
                                    </option><option value="URY">
                                        اروگوئه
                                    </option><option value="ERI">
                                        اریتره
                                    </option><option value="UZB">
                                        ازبکستان
                                    </option><option value="ESP">
                                        اسپانیا
                                    </option><option value="AUS">
                                        استرالیا
                                    </option><option value="EST">
                                        استونی
                                    </option><option value="SVK">
                                        اسلواکی
                                    </option><option value="SVN">
                                        اسلوونی
                                    </option><option value="AFG">
                                        افغانستان
                                    </option><option value="ECU">
                                        اکوادور
                                    </option><option value="DZA">
                                        الجزایر
                                    </option><option value="SLV">
                                        السالوادور
                                    </option><option value="ARE">
                                        امارات متحده عربی
                                    </option><option value="IDN">
                                        اندونزی
                                    </option><option value="GBR">
                                        انگلستان
                                    </option><option value="UKR">
                                        اوکراین
                                    </option><option value="UGA">
                                        اوگاندا
                                    </option><option value="FSM">
                                        ایالات فدرال میکرونزی
                                    </option><option value="USA">
                                        ایالات متحده
                                    </option><option value="UMI">
                                        ایالات متحده جزایر کوچک حاشیهای
                                    </option><option value="ITA">
                                        ایتالیا
                                    </option><option value="ISL">
                                        ایسلند
                                    </option><option value="BRB">
                                        باربادوس
                                    </option><option value="BHS">
                                        باهاما
                                    </option><option value="BHR">
                                        بحرین
                                    </option><option value="BRA">
                                        برزیل
                                    </option><option value="BMU">
                                        برمودا
                                    </option><option value="BRN">
                                        برونئی
                                    </option><option value="BLR">
                                        بلاروس
                                    </option><option value="BEL">
                                        بلژیک
                                    </option><option value="BGR">
                                        بلغارستان
                                    </option><option value="BLZ">
                                        بلیز
                                    </option><option value="BGD">
                                        بنگلادش
                                    </option><option value="BEN">
                                        بنین
                                    </option><option value="BWA">
                                        بوتسوانا
                                    </option><option value="BFA">
                                        بورکینافاسو
                                    </option><option value="BDI">
                                        بوروندی
                                    </option><option value="BIH">
                                        بوسنی و هرزگوین
                                    </option><option value="BOL">
                                        بولیوی
                                    </option><option value="BTN">
                                        پادشاهی بوتان
                                    </option><option value="PRY">
                                        پاراگوئه
                                    </option><option value="PAK">
                                        پاکستان
                                    </option><option value="PLW">
                                        پالائو
                                    </option><option value="PAN">
                                        پاناما
                                    </option><option value="PRT">
                                        پرتغال
                                    </option><option value="PER">
                                        پرو
                                    </option><option value="PYF">
                                        پلینزی فرانسه
                                    </option><option value="PRI">
                                        پورتوریکو
                                    </option><option value="TJK">
                                        تاجیکستان
                                    </option><option value="TZA">
                                        تانزانیا
                                    </option><option value="THA">
                                        تایلند
                                    </option><option value="TWN">
                                        تایوان
                                    </option><option value="TKM">
                                        ترکمنستان
                                    </option><option value="TUR">
                                        ترکیه
                                    </option><option value="CCK">
                                        ترینیداد و توباگو
                                    </option><option value="TTO">
                                        ترینیداد و توباگو
                                    </option><option value="TGO">
                                        توگو
                                    </option><option value="TUN">
                                        تونس
                                    </option><option value="TON">
                                        تونگا
                                    </option><option value="TUV">
                                        تووالو
                                    </option><option value="TLS">
                                        تیمور شرقی
                                    </option><option value="JAM">
                                        جامائیکا
                                    </option><option value="GIB">
                                        جبل الطارق
                                    </option><option value="TCA">
                                        جزایر ترک و کایکوس
                                    </option><option value="SLB">
                                        جزایر سلیمان
                                    </option><option value="FLK">
                                        جزایر فالکلند (مالویناس)
                                    </option><option value="FJI">
                                        جزایر فیجی
                                    </option><option value="COK">
                                        جزایر کوک
                                    </option><option value="CYM">
                                        جزایر کیمن
                                    </option><option value="MHL">
                                        جزایر مارشال
                                    </option><option value="MNP">
                                        جزایر ماریانای شمالی
                                    </option><option value="WLF">
                                        جزایر والیس و فوتونا
                                    </option><option value="VIR">
                                        جزایر ویرجین (آمریکا)
                                    </option><option value="VGB">
                                        جزایر ویرجین (بریتانیا)
                                    </option><option value="GLP">
                                        جزیره گوادلوپ
                                    </option><option value="IRL">
                                        جمهوری ایرلند
                                    </option><option value="CZE">
                                        جمهوری چک
                                    </option><option value="DOM">
                                        جمهوری دومینیکن
                                    </option><option value="DJI">
                                        جیبوتی
                                    </option><option value="TCD">
                                        چاد
                                    </option><option value="CHN">
                                        چین
                                    </option><option value="DNK">
                                        دانمارک
                                    </option><option value="DMA">
                                        دومینیکا
                                    </option><option value="RWA">
                                        رواندا
                                    </option><option value="RUS">
                                        روسیه
                                    </option><option value="ROU">
                                        رومانی
                                    </option><option value="REU">
                                        ریونیون
                                    </option><option value="ZMB">
                                        زامبیا
                                    </option><option value="ZWE">
                                        زیمباوه
                                    </option><option value="JPN">
                                        ژاپن
                                    </option><option value="STP">
                                        سائوتومه و پرینسیپ
                                    </option><option value="CIV">
                                        ساحل عاج
                                    </option><option value="WSM">
                                        ساموآ
                                    </option><option value="ASM">
                                        ساموآ آمریکا
                                    </option><option value="LKA">
                                        سریلانکا
                                    </option><option value="SPM">
                                        سنت پیر و میکلون
                                    </option><option value="KNA">
                                        سنت کیتس و نویس
                                    </option><option value="LCA">
                                        سنت لوسیا
                                    </option><option value="SHN">
                                        سنت هلن
                                    </option><option value="VCT">
                                        سنت وینسنت و گرنادین
                                    </option><option value="SGP">
                                        سنگاپور
                                    </option><option value="SEN">
                                        سنگال
                                    </option><option value="SWE">
                                        سوئد
                                    </option><option value="CHE">
                                        سوئیس
                                    </option><option value="SWZ">
                                        سوازیلند
                                    </option><option value="SDN">
                                        سودان
                                    </option><option value="SUR">
                                        سورینام
                                    </option><option value="SYR">
                                        سوریه
                                    </option><option value="SOM">
                                        سومالی
                                    </option><option value="SLE">
                                        سیرالئون
                                    </option><option value="SYC">
                                        سیشل
                                    </option><option value="CHL">
                                        شیلی
                                    </option><option value="SRB">
                                        صربستان
                                    </option><option value="IRQ">
                                        عراق
                                    </option><option value="SAU">
                                        عربستان سعودی
                                    </option><option value="OMN">
                                        عمان
                                    </option><option value="GHA">
                                        غنا
                                    </option><option value="FRA">
                                        فرانسه
                                    </option><option value="FIN">
                                        فنلاند
                                    </option><option value="PHL">
                                        فیلیپین
                                    </option><option value="CYP">
                                        قبرس
                                    </option><option value="KGZ">
                                        قرقیزستان
                                    </option><option value="KAZ">
                                        قزاقستان
                                    </option><option value="ATA">
                                        قطب جنوب
                                    </option><option value="QAT">
                                        قطر
                                    </option><option value="CRI">
                                        کاستاریکا
                                    </option><option value="NCL">
                                        کالدونیای جدید
                                    </option><option value="KHM">
                                        کامبوج
                                    </option><option value="CMR">
                                        کامرون
                                    </option><option value="CAN">
                                        کانادا
                                    </option><option value="KOR">
                                        کره جنوبی
                                    </option><option value="HRV">
                                        کرواسی
                                    </option><option value="COL">
                                        کلمبیا
                                    </option><option value="COG">
                                        کنگو
                                    </option><option value="COD">
                                        کنگو، جمهوری دمکراتیک
                                    </option><option value="KEN">
                                        کنیا
                                    </option><option value="CUB">
                                        کوبا
                                    </option><option value="COM">
                                        کومور
                                    </option><option value="KWT">
                                        کویت
                                    </option><option value="CPV">
                                        کیپ ورد
                                    </option><option value="KIR">
                                        کیریباتی
                                    </option><option value="GAB">
                                        گابون
                                    </option><option value="GMB">
                                        گامبیا
                                    </option><option value="GEO">
                                        گرجستان
                                    </option><option value="GRD">
                                        گرنادا
                                    </option><option value="GRL">
                                        گرینلند
                                    </option><option value="GTM">
                                        گواتمالا
                                    </option><option value="GUY">
                                        گویان
                                    </option><option value="GUF">
                                        گویان فرانسه
                                    </option><option value="GIN">
                                        گینه
                                    </option><option value="GNQ">
                                        گینه استوایی
                                    </option><option value="GNB">
                                        گینه بیسائو
                                    </option><option value="PNG">
                                        گینه جدید
                                    </option><option value="LAO">
                                        لائوس
                                    </option><option value="LBN">
                                        لبنان
                                    </option><option value="LVA">
                                        لتونی
                                    </option><option value="LSO">
                                        لسوتو
                                    </option><option value="POL">
                                        لهستان
                                    </option><option value="LUX">
                                        لوکزامبورگ
                                    </option><option value="LBR">
                                        لیبریا
                                    </option><option value="LBY">
                                        لیبی
                                    </option><option value="LTU">
                                        لیتوانی
                                    </option><option value="MDG">
                                        ماداگاسکار
                                    </option><option value="MTQ">
                                        مارتینیک
                                    </option><option value="MAC">
                                        ماکائو
                                    </option><option value="MWI">
                                        مالاوی
                                    </option><option value="MLT">
                                        مالت
                                    </option><option value="MDV">
                                        مالـــدیـــو
                                    </option><option value="MYS">
                                        مالزی
                                    </option><option value="MLI">
                                        مالی
                                    </option><option value="HUN">
                                        مجارستان
                                    </option><option value="MAR">
                                        مراکش
                                    </option><option value="EGY">
                                        مصر
                                    </option><option value="MNG">
                                        مغولستان
                                    </option><option value="MKD">
                                        مقدونیه
                                    </option><option value="MEX">
                                        مکزیک
                                    </option><option value="MRT">
                                        موریتانی
                                    </option><option value="MUS">
                                        موریس
                                    </option><option value="MOZ">
                                        موزامبیک
                                    </option><option value="MDA">
                                        مولداوی
                                    </option><option value="MSR">
                                        مونتسرات
                                    </option><option value="MNE">
                                        مونته‌نگرو
                                    </option><option value="MMR">
                                        میانمار
                                    </option><option value="NRU">
                                        نائورو
                                    </option><option value="NAM">
                                        نامیبیا
                                    </option><option value="NPL">
                                        نپال
                                    </option><option value="NOR">
                                        نروژ
                                    </option><option value="NER">
                                        نیجر
                                    </option><option value="NGA">
                                        نیجریه
                                    </option><option value="NIC">
                                        نیکاراگوئه
                                    </option><option value="NZL">
                                        نیوزیلند
                                    </option><option value="NIU">
                                        نیووی
                                    </option><option value="HTI">
                                        هائیتی
                                    </option><option value="NLD">
                                        هلند
                                    </option><option value="IND">
                                        هند
                                    </option><option value="HND">
                                        هندوراس
                                    </option><option value="HKG">
                                        هنگ کنگ
                                    </option><option value="VUT">
                                        وانواتو
                                    </option><option value="VEN">
                                        ونزوئلا
                                    </option><option value="VNM">
                                        ویتنام
                                    </option><option value="YEM">
                                        یمن
                                    </option><option value="GRC">
                                        یونان
                                    </option></select>
                    </div>
                
                    <div className="field">
                        <label >شماره پاسپورت</label>
                        <input type="text" name="PassportNumber[]"/>
                    </div>

                    <div className="field">
                        <label >تاریخ صدور پاسپورت</label>
                        <DateSelector name="IssueDate[]" />
                    </div>
                    <div className="field">
                        <label >تاریخ انقضا پاسپورت</label>
                        <DateSelector name="ExpiryDate[]" />
                    </div>

                </div>

            </div>
    </section>
    );
}

export default PassengerInfo;