import React from 'react';

const InternationalAirlines = props =>(
    <select className={props.className} title="فرودگاه مبدا" name={props.name}>
    <optgroup label="شهرهای پرتردد">
    <option value="THR">تهران</option>
    <option value="TBZ">تبریز</option>
    <option value="IFN">اصفهان</option>
    <option value="AWZ">اهواز</option>
    <option value="SYZ">شیراز</option>
    <option value="PGU">عسلویه</option>
    </optgroup>
    
    <optgroup label="سایر شهرها">
    <option value="ABD">آبادان</option>
    <option value="ADU">اردبیل</option>
    <option value="MHD">مشهد</option>
    <option value="AZD">یزد</option>
    <option value="" disabled selected>{props.Placeholder}</option>

    </optgroup>
</select>
);

export default InternationalAirlines;