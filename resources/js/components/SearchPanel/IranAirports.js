import React from 'react';

const IranAirports = props =>(
    <select className={props.className} title="فرودگاه مبدا" name={props.name}>
    <optgroup label="شهرهای پرتردد">
    <option value="THR">تهران</option>
    <option value="MHD">مشهد</option>
    <option value="TBZ">تبریز</option>
    <option value="IFN">اصفهان</option>
    <option value="AWZ">اهواز</option>
    <option value="SYZ">شیراز</option>
    <option value="PGU">عسلویه</option>
    </optgroup>
    
    <optgroup label="سایر شهرها">
    <option value="ABD">آبادان</option>
    <option value="AKW">آغاجاری</option>
    <option value="AEU">ابوموسی</option>
    <option value="AJK">اراک</option>
    <option value="ADU">اردبیل</option>
    <option value="OMH">ارومیه</option>

    <option value="IHR">ایرانشهر</option>
    <option value="IIL">ایلام</option>
    <option value="BJB">بجنورد</option>
    <option value="BXR">بم</option>
    <option value="BUZ">بندر بوشهر</option>
    <option value="IAQ">بندر بهرگان</option>
    <option value="BDH">بندر لنگه</option>
    <option value="MRX">بندر ماهشهر</option>
    <option value="BND">بندرعباس</option>
    <option value="XBJ">بیرجند</option>
    <option value="PFQ">پارس آباد</option>
    <option value="KHA">پیرانشهر</option>

    <option value="KHK">جزیره خارگ</option>
    <option value="LVP">جزیره لاوان</option>
    <option value="TEW">جم</option>
    <option value="JAR">جهرم</option>
    <option value="JYR">جیرفت</option>
    <option value="ZBR">چابهار</option>
    <option value="KHD">خرم‌آباد</option>
    <option value="KHY">خوی</option>
    <option value="DEF">دزفول</option>
    <option value="RZR">رامسر</option>
    <option value="RAS">رشت</option>
    <option value="RJN">رفسنجان</option>
    <option value="ACZ">زابل</option>
    <option value="ZAH">زاهدان</option>
    <option value="JWN">زنجان</option>
    <option value="SRY">ساری</option>
    <option value="AFZ">سبزوار</option>
    <option value="CKT">سرخس</option>
    <option value="SDG">سنندج</option>
    <option value="SYJ">سیرجان</option>
    <option value="SXI">سیری</option>
    <option value="RUD">شاهرود</option>
    <option value="CQD">شهرکرد</option>

    <option value="TCX">طبس</option>
    <option value="GZW">قزوین</option>
    <option value="GSM">قشم</option>
    <option value="QQM">قم</option>
    <option value="KKS">کاشان</option>
    <option value="PYK">کرج</option>
    <option value="KER">کرمان</option>
    <option value="KSH">کرمانشاه</option>
    <option value="KLM">کلاله</option>
    <option value="KNR">کنگان</option>
    <option value="KIH">کیش</option>
    <option value="GCH">گچساران</option>
    <option value="GBT">گرگان</option>
    <option value="LRR">لارستان</option>
    <option value="LFM">لامرد</option>
    <option value="QOM">ماکو</option>
    <option value="ACP">مراغه</option>
    <option value="NSH">نوشهر</option>
    <option value="HDM">همدان</option>
    <option value="YES">یاسوج</option>
    <option value="AZD">یزد</option>
    <option value="" disabled selected>{props.Placeholder}</option>

    </optgroup>
</select>
);

export default IranAirports;