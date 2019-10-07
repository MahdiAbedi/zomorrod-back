//نام ایرلاین ها بر اساس کد یاتا
export function airlineName(code){
    
    let airlines = [];
    airlines['A3']='Aegean Airlines';
    airlines['AF']='Air France';
    airlines['AY']='Finnair';
    airlines['AZ']='Alitalia';
    airlines['BA']='British Airways';
    airlines['BE']='Flybe';
    airlines['BT']='Air Baltic';
    airlines['CZ']='China Southern Airlines';
    airlines['DY']='Norwegian Air Shuttle';
    airlines['EK']='Emirates Airline';
    airlines['EW']='Eurowings';
    airlines['EY']='Etihad Airways';
    airlines['G9']='Air Arabia';
    airlines['GF']='Gulf Air Bahrain';
    airlines['IB']='Iberia Airlines';
    airlines['J2']='Azerbaijan Airlines';
    airlines['KK']='Atlasjet';
    airlines['KL']='KLM';
    airlines['KU']='Kuwait Airways';
    airlines['LH']='Lufthansa';
    airlines['LX']='Swiss Air Lines';
    airlines['OS']='Austrian Airlines';
    airlines['OV']='Estonian Air';
    airlines['PC']='Pegasus Airlines';
    airlines['PS']='Ukraine Airlines';
    airlines['QR']='Qatar Airways';
    airlines['TK']='Turkish Airlines';
    airlines['VY']='Vueling Airlines';
    airlines['W5']='Mahan Air';
    airlines['WY']='Oman Air';

    if(code in airlines){
        return airlines[code];
    }
    return code;
}

//نام فرودگاه ها بر اساس کد یاتا
export function airportName(code){
    
    let airports = [];
    //فرودگاه های ایران
    airports['IKA']='امام خمینی';
    airports['ABD']='آبادان';
    airports['ACP']='سهند';
    airports['ACZ']='زابل';
    airports['ADU']='اردبیل';
    airports['AEU']='ابوموسی';
    airports['AFZ']='سبزوار';
    airports['AHW']='اهواز';
    airports['AJK']='اراک';
    airports['AKW']='آقاجاری';
    airports['AWZ']='اهواز';
    airports['AZD']='یزد';
    airports['BBL']='بابلسر';
    airports['BDH']='بندر لنگه';
    airports['BJB']='بجنورد';
    airports['BND']='بجنورد';
    airports['BUZ']='بوشهر';
    airports['BXR']='بام';
    airports['CKT']='سرخس';


    //فرودگاه های بین المللی
    airports['DXB']='دبی';
    airports['LGW']='لندن';
    airports['IST']='استانبول';
    airports['STN']='لندن';

    airports['DOH']='دوحه';
    airports['FRA']='فرانکفورت';
    airports['SAW']='استانبول';
    airports['KBP']='کی اف';
    airports['KWI']='کویت';
    airports['STN']='لندن';
    airports['LCY']='لندن';
    airports['LHR']='لندن';
    airports['LGW']='لندن';
    airports['SVO']='مسکو';
    airports['MUC']='مونیخ';
    airports['MCT']='مسقط';
    airports['VIE']='وی انا';
    airports['ZRH']='زوریخ';
    airports['GYD']='حیدر علی اف';



    if(code in airports){
        return airports[code];
    }
    return code;
}